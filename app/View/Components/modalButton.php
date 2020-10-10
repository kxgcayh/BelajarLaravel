<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalButton extends Component
{
    public $color;
    public $targetId;
    public $onclick;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($color, $targetId, $onclick)
    {
        $this->color = $color;
        $this->targetId = $targetId;
        $this->onclick = $onclick;
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
