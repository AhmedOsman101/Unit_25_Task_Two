<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class EditRequest extends Component {

    public $request;

    #[Validate('required')]
    public $description;


    public function update() {
        $this->validate();
        $this->request->update([
            'description' => $this->description,
        ]);
        return redirect()->route('dashboard');
    }

    public function back() {
        return redirect()->route('dashboard');
    }

    public function render() {
        return view('livewire.edit-request');
    }
}
