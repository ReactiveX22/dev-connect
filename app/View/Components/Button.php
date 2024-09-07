<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{
    public $variant;
    public $type;
    public $href;

    /**
     * Create a new component instance.
     *
     * @param  string  $variant
     * @param  string  $type
     * @param  string|null  $href
     * @return void
     */
    public function __construct($variant = 'primary', $type = 'button', $href = null)
    {
        $this->variant = $variant;
        $this->type = $type;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.button');
    }
}
