<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Show all tasks with related users and creator
        $tasks = Task::with(['users', 'assignedBy'])->latest()->where('assigned_user_id', auth()->user()->id)->get();
        return view('task-management', compact('tasks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $authUser = Auth::user();
        if ($authUser->hasRole('Headmaster')) {
            // Headmaster sees all users
            $users = User::whereHas('roles', function ($q) {
                $q->whereIn('name', ['Teacher', 'Student']);
            })->get();
        } elseif ($authUser->hasRole('Teacher')) {

            // Teacher sees only teachers and students
            $users = User::whereHas('roles', function ($q) {
                $q->whereIn('name', ['Student']);
            })->get();
        } else {
            // Others see nothing or you can customize it
            $users = collect(); // empty collection
        }
        return view('task-create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'user_ids' => 'required|array', // list of teachers or students
        ]);

        $task = Task::create([
            'assigned_user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
        ]);

        $task->users()->attach($request->user_ids);

        return back()->with('success', 'Task assigned successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = auth()->user();
        $tasks = Task::with(['users', 'assignedBy'])
            ->whereHas('users', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            })
            ->latest()
            ->get();
        return view('task-receive', compact('tasks'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
