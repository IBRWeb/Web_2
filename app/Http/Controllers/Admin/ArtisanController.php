<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\Factory as View;
use Illuminate\Contracts\Console\Kernel as Artisan;
use Illuminate\Http\Request;

class ArtisanController extends Controller{

    public function __construct(View $view, Request $request, Artisan $artisan)
    {
        $this->middleware('admin');
        $this->view = $view;
        $this->request = $request;
        $this->artisan = $artisan;
    }

    public function index()
    {
        if(!empty($this->request->has('command')))
        {
            $command = $this->request->get('command');
            call_user_func([ $this, $command]);
        }

        $content = $this->view->make('admin.artisan');
        $title = 'Artisan';
        return $this->view->make('admin::default._layout.inner', compact('content', 'title'));
    }

    public function migrate()
    {
        $this->artisan->call('migrate');
    }

    public function optimize()
    {
        $this->artisan->call('');
    }



}