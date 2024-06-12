<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse {
        try {
            $services = Service::all();
            return view('services', compact('services'));
        } catch (\Throwable $e) {
           return redirect()->back()->with('error', $e->getMessage());
        }
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View|RedirectResponse {
        try {
            $service = Service::find($id);
            return view('service-details', compact('service'));
        } catch (\Throwable $e) {
          return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
