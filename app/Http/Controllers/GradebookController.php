<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddGradebookRequest;
use App\Http\Requests\EditGradebookRequest;
use App\Models\Gradebook;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Undefined;

class GradebookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = $request->input('per_page', 10);
        $gradebooks = Gradebook::with('user')->latest()->paginate($perPage);
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
        $gradebook = Gradebook::with('user', 'comments.user', 'students')
            ->findOrFail($id)
            ->load(['students' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }]);
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
    public function update(EditGradebookRequest $request, string $id)
    {
        $oldGradebook = Gradebook::findOrFail($id);
        $user_id = Auth::user()->id;
        return response()->json([$gradebook]);
        if ($oldGradebook->user_id == $user_id) {
            $oldGradebook->update($request->validated());
            return response()->json($oldGradebook);
        }
        return response()->json([
            'error' => 'You are not authorized to edit this gradebook',
            'user_id' => $user_id,
            'gradebook[0]->id' => $gradebook[0]->id,
            '$request' => $request
        ], 403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $gradebook = Gradebook::findOrFail($id);
        $user_id = Auth::user()->id;
        if ($gradebook->user_id == $user_id) {
            $gradebook->delete();
            return response()->json([], 200);
        }
        return response()->json([
            'error' => 'You are not authorized to delete this gradebook',
            'user_id' => $user_id,
            'gradebook[0]->id' => $gradebook->user_id,
        ], 403);
    }
}
