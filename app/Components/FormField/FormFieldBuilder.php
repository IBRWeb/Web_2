<?php namespace App\Components\FormField;

use Collective\Html\FormBuilder as Form;
use Illuminate\View\Factory as View;
use Illuminate\Translation\Translator as Lang;
use Illuminate\Session\Store as Session;
use Illuminate\Filesystem\Filesystem as File;

class FormFieldBuilder {

    protected $defaultClasses = [
      'default'  => 'form_input',
      'textarea' => 'form_textarea',
      'select'   => 'form_select'
    ];

    public function __construct(Form $form, View $view, Lang $lang, Session $session, File $file)
    {
        $this->form = $form;
        $this->view= $view;
        $this->lang = $lang;
        $this->session = $session;
        $this->file = $file;

        $this->control = [
            'text'     =>  function($type, $name, $value, $attributes, $options)
            {
                return $this->form->text($name, $value, $attributes);
            },
            'default'  => function($type, $name, $value, $attributes, $options)
            {
                return $this->form->input($type, $name, $value, $attributes);
            },
            'textarea' => function($type, $name, $value, $attributes, $options)
            {
                return $this->form->textarea($name, $value, $attributes);
            },
            'select'   => function($type, $name, $value, $attributes, $options)
            {
                return $this->form->select($name, $options, $value, $attributes);
            }
        ];
    }

    public function getDefaultClass($type)
    {
        if(isset($this->defaultClasses[$type]))
        {
            return $this->defaultClasses[$type];
        }

        return$this->defaultClasses['default'];
    }

    public function buildCssClasses($type, &$attributes)
    {
        $defaultClasses = $this->getDefaultClass($type);

        if(isset($attributes['class'])) {
            $attributes['class'] .= ' ' . $defaultClasses;
        }
        else
        {
            $attributes['class'] = $defaultClasses;
        }
    }

    public function buildLabel($name)
    {
        if($this->lang->has('validation.attributes.' . $name))
        {
            $label = $this->lang->get('validation.attributes.' . $name);
        }
        else
        {
            $label = str_replace('_', ' ',$name);
        }

        return ucfirst($label. ':');
    }
    public function buildControl($type, $name, $value = null, $attributes = [], $options = [])
    {
        if(array_key_exists($type, $this->control))
        {
            return call_user_func_array($this->control[$type], compact('type', 'name', 'value', 'attributes', 'options'));
        }
        else
        {
            return call_user_func_array($this->control['default'], compact('type', 'name', 'value', 'attributes', 'options'));
        }
    }

    public function buildError($name)
    {
        $error = null;

        if($this->session->has('errors'))
        {
            $errors = $this->session->get('errors');

            if($errors->has($name))
            {
                $error = $errors->first($name);
            }
        }

        return $error;
    }

    public function buildTemplate($type)
    {
        if($this->view->exists('templates.formFields.' . $type ))
        {
            return 'templates.formFields.' . $type;
        }

        return 'templates.formFields.default';
    }

    public function input($type, $name, $value = null, $attributes = [], $options = [] )
    {
        $this->buildCssClasses($type, $attributes);
        $label = $this->buildLabel($name);
        $control = $this->buildControl($type, $name, $value, $attributes, $options);
        $error = $this->buildError($name);
        $template = $this->buildTemplate($type);

        return $this->view->make($template, compact('name', 'label', 'control', 'error'));
    }

    public function __call($method, $params)
    {
        array_unshift($params, $method);
        return call_user_func_array([$this, 'input'], $params);
    }
}