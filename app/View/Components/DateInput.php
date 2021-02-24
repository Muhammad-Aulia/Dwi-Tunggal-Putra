<?php

namespace App\View\Components;

use Illuminate\View\Component;

class DateInput extends Component
{
    public $name;
    public $label;
    public $required;
    public $value;
    public $disabled;
    public $readonly;
    public function __construct($value="",$name='',$label='',$required=false,$disabled=false,$readonly=false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->value = $value;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.date-input');
    }
}
