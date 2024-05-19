<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\Request;

class RequestModelController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $requests = RequestModel::all()
            ->where(
                'user_id',
                $request->user()->id
            );

        return view(
            'dashboard',
            compact('requests')
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {
        try {
            $request = RequestModel::create($request->all());

            return redirect()->route('dashboard');
        } catch (\Throwable $error) {
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(RequestModel $requestModel) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id) {
        $request = RequestModel::find($id);
        // dd($request);
        return view(
            'edit-request',
            [
                'request' => $request,
                'description' => $request->description,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id) {
        try {
            $request = RequestModel::find($id);

            $request->update($request->all());

            return redirect()->route('dashboard');
        } catch (\Throwable $error) {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id) {
        try {
            $request = RequestModel::find($id);

            $request->delete();

            return redirect()->route('dashboard');
        } catch (\Throwable $error) {
            return redirect()->back();
        }
    }

    public function cancel($id) {
        try {
            $request = RequestModel::find($id);

            $status = $request->status;

            $request->status = $status == 'cancelled' ? 'pending' : 'cancelled';

            $request->save();

            return redirect()->route('dashboard');
        } catch (\Throwable $error) {
            return redirect()->back();
        }
    }
}