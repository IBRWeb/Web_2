<?php namespace App\Components\Facebook;

use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Illuminate\Contracts\View\Factory as View;


/**
 * Class FacebookBuilder
 * @package App\Components
 */
class FacebookFieldBuilder
{
    protected $facebookSession;
    protected $facebookRequest;
    protected $facebookRequestException;
    protected $facebookResponse;
    protected $graphObject;
    protected $graphUser;
    protected $graphPage;
    protected $session;
    protected $request;
    protected $response;
    protected $data;

    protected $defaultCssClasses = [
      'posts'    => 'fb-post',
      'comments' => 'fb-comments',
      'photos'   => 'fb-photos',
      'albums'   => 'fb-album',
      'default'  => 'fb-object'
    ];

    protected $defaultMethod = 'GET';

    protected $defaultParameters = ['fields' => 'type', 'limit' => 15];

    protected $defaultFilter = ['filter' => ['type' => 'status']];




    public function __construct(View $view)
    {
        $this->view  = $view;
    }

    public function getSession($appId, $appSecret)
    {
        FacebookSession::setDefaultApplication($appId, $appSecret);

        // If you're making app-level requests:
        $session = FacebookSession::newAppSession();

        // To validate the session:
        try {
            $session->validate();
        } catch (FacebookRequestException $ex) {
            // Session not valid, Graph API returned an exception with the reason.
            echo $ex->getMessage();
        } catch (\Exception $ex) {
            // Graph API returned info, but it may mismatch the current app or have expired.
            echo $ex->getMessage();
        }

        return $session;
    }

    public function getDefaultCssClasses($type)
    {
        if(isset($this->defaultCssClasses[$type]))
        {
            return $this->defaultCssClasses[$type];
        }

        return$this->defaultCssClasses['default'];
    }

    /**
     * @return string
     */
    public function getDefaultUser()
    {
        return env('FB_PAGE_ID', 'id');
    }

    /**
     * @return string
     */
    public function getDefaultMethod()
    {
        return $this->defaultMethod;
    }

    /**
     * @return array
     */
    public function getDefaultParameters()
    {
       return $this->defaultParameters;
    }

    /**
     * @return array
     */
    public function getDefaultFilter()
    {
        return $this->defaultFilter;
    }

    public function buildMethod(&$attributes)
    {
        if(!isset($attributes['method'])) {
            $attributes['method'] = $this->getDefaultMethod();
        }

        return array_pull($attributes, 'method');

    }

    public function buildUser(&$attributes)
    {
        if(!isset($attributes['user'])) {
            $attributes['user'] = $this->getDefaultUser();
        }

        return array_pull($attributes,'user');
    }

    public function buildCssClasses($type, &$attributes)
    {
        $defaultCssClasses = $this->getDefaultCssClasses($type);
        if(!isset($attributes['class'])) {
            $attributes['class'] = $defaultCssClasses;
        }
        else
        {
            $attributes['class'] .= ' ' . $defaultCssClasses;
        }

        return array_pull($attributes,'class');
    }

    public function buildFilter(&$attributes)
    {
        if(isset($attributes['filter']))
        {
            $filter = array_pull($attributes, 'filter');
            return $filter;
        }

        $defaultFilter = $this->getDefaultFilter();

        return $defaultFilter['filter'];
    }

    public function buildParameters(&$attributes)
    {
        $defaultParameters = $this->getDefaultParameters();

        foreach(array_keys($defaultParameters) as $defaultParameter)
        {
            if(!isset($attributes[$defaultParameter]))
            {
                $attributes[$defaultParameter] = $defaultParameters[$defaultParameter];
            }
            else
            {
                $attributes[$defaultParameter] .= ','.$defaultParameters[$defaultParameter];
            }
        }

        foreach(array_keys($attributes) as $attribute)
        {
            if(strpos($attributes[$attribute],'null') !== false)
            {
                array_pull($attributes, $attribute);
            }
        }

        return $attributes;
    }

    public function buildPath($type, $user)
    {
        return '/' . $user . '/' . $type;
    }

    public function buildRequest($method, $path, $parameters)
    {
        $session = $this->getSession(getenv('FB_APP_ID'), getenv('FB_APP_SECRET'));
        return  new FacebookRequest($session, $method, $path, $parameters);

    }

    public function buildResponse($request)
    {
        return $request->execute()->getGraphObject();
    }

    public function buildData($response)
    {
        return $response->getProperty('data')->asArray();
    }

    public function resolveData($type, $data, $filter)
    {
        $dataResolver = new FacebookDataResolver($type, $data, $filter);
        return $dataResolver->getResolvedData();

    }

    public function buildTemplate($type)
    {
        if($this->view->exists('templates.facebook.' . $type ))
        {
            return 'templates.facebook.' . $type;
        }

        return 'templates.facebook.base';
    }


    public function graphObject($type, $attributes = [])
    {
        $method = $this->buildMethod($attributes);
        $class = $this->buildCssClasses($type, $attributes);
        $user = $this->buildUser($attributes);
        $filter = $this->buildFilter($attributes);
        $parameters = $this->buildParameters($attributes);
        $path = $this->buildPath($type, $user);
        $request = $this->buildRequest($method, $path, $parameters);
        $response = $this->buildResponse($request);
        $data = $this->buildData($response);
        $resolvedData = $this->resolveData($type, $data, $filter);
        $template = $this->buildTemplate($type);

        return $this->view->make($template, compact('resolvedData', 'class'));

    }

    public function __call($method, $params)
    {
        array_unshift($params, $method);
        return call_user_func_array([$this, 'graphObject'], $params);
    }
}