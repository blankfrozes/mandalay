<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Input extends Component
{
    public $label;

    public $placeholder;

    public $name;

    public $class;

    public $type;

    public $disabled;

    public $readonly;

    public $debounced;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($name, $label, $placeholder = '', $class = '', $type = 'text', $disabled = false, $debounced = false, $readonly = false)
    {
        $this->label = $label;
        $this->placeholder = $placeholder;
        $this->name = $name;
        $this->type = $type;
        $this->class = $class;
        $this->disabled = $disabled;
        $this->debounced = $debounced;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.input');
    }
}