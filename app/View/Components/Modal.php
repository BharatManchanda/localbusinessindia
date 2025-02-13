<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Modal extends Component
{
    /**
     * Create a new component instance.
     */

     public $id;
    public $title;
    public $size;
    public $footer;

    public function __construct($id = 'defaultModal', $title = 'Default Modal Title', $size = 'modal-md', $footer = null) {
        $this->id = $id;
        $this->title = $title;
        $this->size = $size;
        $this->footer = $footer ?? '<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>';
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
