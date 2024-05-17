<?php

namespace App\Livewire;

use App\Models\RequestModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RequestsTable extends Component {
    public $requests;

    public function __construct() {
        $this->requests = RequestModel::all()->where('user_id', Auth::user()->id);
    }

    public function render() {
        return view('livewire.requests-table', $this->requests);
    }
}
