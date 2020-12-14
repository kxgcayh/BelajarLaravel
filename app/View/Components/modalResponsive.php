<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalResponsive extends Component
{
    public $modalId;
    public $titleId;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalId, $titleId)
    {
        $this->modalId = $modalId;
        $this->titleId = $titleId;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal-responsive');
    }
}
