<?php

namespace App\View\Components;

use App\Models\Postingan;
use Illuminate\View\Component;

class PostTable extends Component
{
    public $posts;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->posts = Postingan::all();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.post-table');
    }
}
