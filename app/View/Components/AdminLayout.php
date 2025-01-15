<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AdminLayout extends Component
{
    public $title;
    public $slot;  

    public function __construct($title = null)
    {
        $this->title = $title;
    }

    public function render()
    {
        return view('components.admin-layout');
    }
}
