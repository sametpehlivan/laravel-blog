<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Page;
use Illuminate\View\Component;

class navbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string;
     */
    public function render()
    {

        $data['pages'] = Page::orderBy('order','ASC')->whereNull('deleted_at')->get();
        return view('components.navbar',$data);
    }
}
