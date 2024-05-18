<?php

namespace App\Livewire;

use App\Models\RequestModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Service extends Component {

    public $service;

    #[Validate('required')]
    public $description;

    public function createNewRequest() {

        $this->validate();
        $request = RequestModel::create([
            'description' => $this->description,
            'user_id' => Auth::user()->id,
            'service_id' => $this->service->id,
        ]);
        return redirect()->route('dashboard');
    }

    public function render() {
        return view('livewire.service');
    }
}
