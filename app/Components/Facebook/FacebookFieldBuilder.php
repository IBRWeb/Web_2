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

    protected $cacheTime = 480;

    protected $defaultCssClasses = [
      'posts'       => 'fb-post',
      'comments'    => 'fb-comments',
      'albumPhotos' => 'fb-photos',
      'albums'      => 'fb-album',
      'default'     => 'fb-object'
    ];

    protected $defaultMethod = 'GET';

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
        if (isset($this->defaultCssClasses[$type])) {
            return $this->defaultCssClasses[$type];
        }

        return $this->defaultCssClasses['default'];
    }

    /**
     * @return string
     */
    public function getDefaultMethod()
    {
        return $this->defaultMethod;
    }


    protected function getRequestPath($request)
    {
        $requestParams = http_build_query($request->getParameters());
        $requestPath = $request->getPath();
        return $requestPath . '?' . $requestParams;
    }

    public function getResponse($request)
    {
        return $request->execute()->getGraphObject();
    }

    public function checkCache($request)
    {
        $requestPath = $this->getRequestPath($request);
        if(\Cache::has($requestPath))
        {
            return \Cache::get($requestPath);
        }

        return false;

    }

    public function storeCache($request)
    {
        $requestPath = $this->getRequestPath($request);
        $response = $this->getResponse($request);

        \Cache::put($requestPath, $response, $this->cacheTime);

        return $response;
    }

    public function buildMethod(&$attributes)
    {
        if(!isset($attributes['method'])) {
            $attributes['method'] = $this->getDefaultMethod();
        }

        return array_pull($attributes, 'method');

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
        return false;
    }

    public function buildPath($path, &$attributes)
    {
        if(!$path)
        {
            return '/' . getenv('FB_PAGE_ID');
        }

        $absolute = false;
        if(array_has($attributes, 'absolute'))
        {
            $absolute = array_pull($attributes, 'absolute');
        }

        if(!$absolute)
        {
            return '/' . getenv('FB_PAGE_ID') . '/' . $path;
        }
        else
        {
            return '/' . $path;
        }
    }

    public function buildParameters(&$attributes)
    {
        $parameters = [];
        foreach ($attributes as $parameter => $value)
        {
            if(is_array($value))
            {
                $values = $this->arrayToParameter($value);
                $nestedParameters[$parameter] = $values;
                dd($nestedParameters);
            }
            else
            {
                $parameters[$parameter] = $value;
            }
        }

        return $parameters;


    }

    public function buildRequest($method, $path, $parameters)
    {
        $session = $this->getSession(getenv('FB_APP_ID'), getenv('FB_APP_SECRET'));
        return  new FacebookRequest($session, $method, $path, $parameters);

    }

    public function buildResponse($request)
    {
        $cache = $this->checkCache($request);

        if(!$cache)
        {
            return $this->storeCache($request);
        }

        return $cache;


    }

    public function buildData($response, $type, $filter, $perPage)
    {
        $data = $response->getProperty('data')->asArray();
        return $this->resolveData($type, $data, $filter, $perPage);
    }

    public function resolveData($type, $data, $filter, $perPage)
    {
        $dataResolver = new FacebookDataResolver($type, $data, $filter, $perPage);
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


    public function graphObject($type, $path = null, $attributes = [], $perPage = null)
    {
        $method = $this->buildMethod($attributes);
        $class = $this->buildCssClasses($type, $attributes);
        $filter = $this->buildFilter($attributes);
        $requestPath = $this->buildPath($path, $attributes);
//        dd($requestPath);
        $parameters = $this->buildParameters($attributes);
//        dd($parameters);
        $request = $this->buildRequest($method, $requestPath, $parameters);
//        dd($request);
        $response = $this->buildResponse($request);
//        dd($response);
        $data = $this->buildData($response, $type, $filter, $perPage);
//        dd($data);
        $template = $this->buildTemplate($type);

        return $this->view->make($template, compact('data', 'class'));

    }

    public function albumPhotos($albumId, $attributes = [], $perPage = null)
    {
        $type = 'albumPhotos';

        $path = $albumId;

        return call_user_func_array([$this, 'graphObject'], compact('type', 'path', 'attributes', 'perPage'));
    }

    public function arrayToParameter($value)
    {
        $allString = true;
        $limit = '';
        foreach($value as $nestedValue)
        {
//            dd($nestedValue);
            $nestedParameter = [];
            if(is_array($nestedValue))
            {
                $allString = false;
                $nestedParameter[$nestedKey] = $this->arrayToParameter($nestedValue);
                array_pull($value, $nestedKey);

            }
            if($nestedKey == 'limit')
            {
              dd($nestedKey);
                $limit = '.limit('.$nestedValue.')';
                array_pull($value, 'limit');
            }
        }

        if($allString)
        {
            return implode(',', $value);
        }
        else
        {
            $simpleValues = implode(',', $value);
            $nestedValues = '';
            foreach($nestedParameter as $nestedKey => $nestedValue)
            {
                $nestedValues .= ',' . $nestedKey . $limit . '{' . $nestedValue . '}';
            }

            dd($nestedValues);

            return $simpleValues . $nestedValues;
        }

    }

    public function __call($method, $params)
    {
        array_unshift($params, $method);
        return call_user_func_array([$this, 'graphObject'], $params);
    }
}