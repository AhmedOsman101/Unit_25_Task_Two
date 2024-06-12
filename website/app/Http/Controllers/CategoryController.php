<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(): View|RedirectResponse {
        try {
            $categories = Category::select(['id', 'name'])
                ->withCount('services')
                ->get();
            return view('categories', compact('categories'));
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View|RedirectResponse {
        try {
            $services = Service::all()->where('category_id', $id);

            return view('services', compact('services'));
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }
}
