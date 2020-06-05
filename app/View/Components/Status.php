<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Status extends Component
{
    /**
     * The status type.
     *
     * @var string
     */
    public $type;


    /**
     * The alert type.
     *
     * @var string
     */
    public $title;

    /**
     * The status number.
     *
     * @var string
     */
    public $number;

    /**
     * The status growth.
     *
     * @var string
     */
    public $growth;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type, $title, $number, $growth)
    {
        $this->type = $type;
        $this->title = $title;
        $this->number = $number;
        $this->growth = $growth;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.status');
    }
}
