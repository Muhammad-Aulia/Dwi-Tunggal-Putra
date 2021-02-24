<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Textarea extends Component
{
    public $name;
    public $label;
    public $totalRow;
    public $value;
    public $required;
    public $disabled;
    public function __construct($name="",$label="",$totalRow=3,$value="",$required=false,$disabled=false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->totalRow = $totalRow;
        $this->value = $value;
        $this->required = $required;
        $this->disabled = $disabled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.textarea');
    }
}
