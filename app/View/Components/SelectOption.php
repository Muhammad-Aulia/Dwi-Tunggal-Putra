<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SelectOption extends Component
{
    public $name;
    public $value;
    public $label;
    public $options;
    public $required;
    public $readonly;
    public function __construct($label="",$name="",$value="",$options=array(),$required=false,$readonly=false)
    {
        $this->name = $name;
        $this->value = $value;
        $this->options = $options;
        $this->label = $label;
        $this->required = $required;
        $this->readonly = $readonly;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.select-option');
    }
}
