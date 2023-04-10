<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddGradebookRequest;
use App\Models\Gradebook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GradebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gradebooks = Gradebook::with('user')->get();
        return response()->json($gradebooks);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AddGradebookRequest $request)
    {
        $gradebook = Gradebook::create($request->validated());

        return response()->json($gradebook);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $gradebook = Gradebook::with('user', 'comments.user', 'students')->findOrFail($id);
        return response()->json($gradebook);
    }

    public function myGradebook()
    {
        $userId = Auth::user()->id;
        $myGradebook = Gradebook::where('user_id', $userId)->with('user', 'comments', 'students')->firstOrFail();

        return response()->json($myGradebook);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $gradebook = Gradebook::findOrFail($id);
        $gradebook->update($request->all());
        return response()->json($gradebook);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gradebook = Gradebook::findOrFail($id);
        $gradebook->delete();
    }
}
