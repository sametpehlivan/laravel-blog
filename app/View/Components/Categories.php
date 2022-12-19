<?php

namespace App\View\Components;

use App\Models\Category;
use Illuminate\View\Component;

class Categories extends Component
{

    public $slug ;
    public function __construct($slug)
    {
        $this->slug = $slug;

    }

    public function render()
    {
        $data['categories'] = Category::whereNull('deleted_at')->get();
        return view('components.categories',$data);
    }
}
