<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Service;
use Illuminate\Http\Request;

class TestingController extends Controller {
    /**
     * Relationships
     */
    public function ServiceToCategory($serviceId = 1) {
        // Get the category of a service
        $service = Service::first();

        $service->category;

        $service = $service->toArray();

        dd(compact("service"));
    }
    public function CategoryToService() {
        // Get all services belonging to a category
        $category = Category::first()->toArray();

        dd(compact("category"));
    }
}
