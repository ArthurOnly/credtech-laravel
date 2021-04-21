<?php

namespace App\View\Components;

use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class adminMenu extends Component
{
    public $activeRoute;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->activeRoute = Route::currentRouteName();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin-menu');
    }
}
