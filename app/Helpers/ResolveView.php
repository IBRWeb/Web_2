<?php namespace App\Helpers;

class ResolveView {

    protected $view;
    protected  $viewPath;

    public function __construct($view) {
        $this -> view = $view;
        $this -> resolveViewPath();
        $this -> lookForView();
    }

    public function resolveViewPath(){
        $this -> viewPath = base_path()."/resources/views/webpage/$this->view.blade.php";
//        dd($this -> viewPath);
    }

    public function lookForView() {
        if(!file_exists($this->viewPath)) {
            abort(404);
        }else {
            $this -> viewPath = "webpage.$this->view";
        }
    }

    public function getViewPath() {
        return $this -> viewPath;
    }

}