<?php
namespace App\View\Components;

use Illuminate\View\Component;

class ProductModal extends Component
{
    public $title;
    public $modalId;
    public $formAction;

    public function __construct($title, $modalId, $formAction)
    {
        $this->title = $title;
        $this->modalId = $modalId;
        $this->formAction = $formAction;
    }

    public function render()
    {
        return view('components.product-modal');
    }
}
