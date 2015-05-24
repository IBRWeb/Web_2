<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\Factory as View;
use SleepingOwl\Admin\Admin;

class AdminController extends Controller
{

    public function __construct(View $view, Admin $admin)
    {
        $this->view = $view;
        $this->admin  = $admin;
    }

    /*
     * Retrieve inforation for Home page in Admin  Panel
     * @return View
     */
    public function index()
    {
        $models = $this->admin->instance()->getModels();
        $content = $this->view->make('admin.indexContent', compact('models'));
        $title = "Panel de Control";

        return $this->view->make('admin::default._layout.inner', compact('content', 'title'));
    }

}