<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class InputDate extends Component
{
    public $label;

    public $name;

    public $class;

    public $value;

    public $placeholder;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($label, $name, $class = '', $placeholder = '')
    {
        $this->label = $label;
        $this->name = $name;
        $this->class = $class;
        $this->placeholder = $placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.input-date');
    }
}
