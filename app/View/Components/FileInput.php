<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FileInput extends Component
{
    public $name;
    public $label;
    public $required;
    public $readonly;
    public $disabled;
    public function __construct($name='',$label='',$required=false,$readonly=false,$disabled=false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->required = $required;
        $this->readonly = $readonly;
        $this->disabled = $disabled;
        
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.file-input');
    }
}
