<?php

namespace App\Livewire;

use App\Models\RequestModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Service extends Component {

    public $service;
    public $description;

    public function createNewRequest() {
        try {
            $request = RequestModel::create([
                'description' => $this->description,
                'user_id' => Auth::user()->id,
                'service_id' => $this->service->id,
            ]);
            return redirect()->route('dashboard');
        } catch (\Throwable $error) {
            return redirect()->withErrors($error->getMessage())->back();
        }
    }

    public function render() {
        return view('livewire.service');
    }
}
