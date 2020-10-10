<?php

namespace App\View\Components;

use Illuminate\View\Component;

class modalResponsive extends Component
{
    public $modalId;
    public $titleId;
    public $title;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalId, $titleId, $title)
    {
        $this->titleId = $titleId;
        $this->title = $title;
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
