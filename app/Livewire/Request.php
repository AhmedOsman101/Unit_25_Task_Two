<?php

namespace App\Livewire;

use Livewire\Component;

class Request extends Component {

    public $request;

    public function render() {
        $this->request->service;
        $this->request->user;
        return view('livewire.request', $this->request);
    }
}
