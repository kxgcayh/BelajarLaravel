<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalButton extends Component
{
    public $id;
    public $color;
    public $href;
    public $targetId;
    public $onclick;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $color, $href, $targetId, $onclick)
    {
        $this->id = $id;
        $this->color = $color;
        $this->href = $href;
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
