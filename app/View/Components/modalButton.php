<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalButton extends Component
{
    public $id;
    public $color;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $color)
    {
        $this->id = $id;
        $this->color = $color;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-button');
    }
}
