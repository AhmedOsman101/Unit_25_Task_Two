<?php

namespace App\Http\Controllers;

use App\Models\RequestModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Throwable;

class RequestModelController extends Controller {
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View|RedirectResponse {
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
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse {
        try {
            $request = RequestModel::create($request->all());

            return redirect()->route('dashboard');
        } catch (Throwable $error) {
            redirect()->back()->with('error', $error->getMessage());
        }
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View {
        $request = RequestModel::find($id);

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
    public function update(Request $request, $id): RedirectResponse {
        try {
            $record = RequestModel::find($id);

            $record->update($request->all());

            return redirect()->route('dashboard');
        } catch (Throwable $error) {
            redirect()->back()->with('error', $error->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse {
        try {
            $request = RequestModel::find($id);

            $request->delete();

            return redirect()->route('dashboard');
        } catch (Throwable $error) {
            redirect()->back()->with('error', $error->getMessage());
        }
    }

    public function cancel($id): RedirectResponse {
        try {
            $request = RequestModel::find($id);

            $status = $request->status;

            $request->status = $status === 'cancelled' ? 'pending' : 'cancelled';

            $request->save();

            return redirect()->route('dashboard');
        } catch (Throwable $error) {
            redirect()->back()->with('error', $error->getMessage());
        }
    }
}
