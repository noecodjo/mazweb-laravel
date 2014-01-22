<?php

class ComponentController extends BaseController {
    protected $layout = 'baselayout';

    /*
    |--------------------------------------------------------------------------
    | Default Home Controller
    |--------------------------------------------------------------------------
    |
    | You may wish to use controllers instead of, or in addition to, Closure
    | based routes. That's great! Here is an example controller method to
    | get you started. To route to this controller, just add the route:
    |
    |	Route::get('/', 'HomeController@showWelcome');
    |
    */

    public function index()
    {
        $this->layout->content = View::make('component.index');
    }


    public function overlayModal() {
        return View::make('component.overlay-modal');
    }
} 