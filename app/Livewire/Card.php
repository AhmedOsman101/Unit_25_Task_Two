<?php

namespace App\Livewire;

use Livewire\Component;

class Card extends Component {

    public $item;

    public $type;

    public function render() {
        return view('livewire.card');
    }
}
