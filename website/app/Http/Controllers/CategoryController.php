<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class CategoryController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $categories = Category::all();

            return view('categories', compact('categories'));
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id) {
        try {
            $services = Service::all()->where('category_id', $id);

            return view('services', compact('services'));
        } catch (\Throwable $e) {
            return redirect()->back();
        }
    }
}
