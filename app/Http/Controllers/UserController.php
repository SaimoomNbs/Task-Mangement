<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(Request $request){

        $headmasterCount = User::role('Headmaster')->count();
        $teacherCount = User::role('Teacher')->count();
        $studentCount = User::role('Student')->count();
    
        return view('dashboard', compact('headmasterCount', 'teacherCount', 'studentCount'));
    }

    public function all(Request $request)
    {
        $authUser = Auth::user();
        if ($authUser->hasRole('Headmaster')) {
            // Headmaster sees all users
            $users = User::all();
        } elseif ($authUser->hasRole('Teacher')) {

            // Teacher sees only teachers and students
            $users = User::whereHas('roles', function ($q) {
                $q->whereIn('name', ['Student']);
            })->get();
        } else {
            // Others see nothing or you can customize it
            $users = collect(); // empty collection
        }
        return view('user-management', compact('users'));
    }


    public function destroy($id)
    {
        $user = User::find($id);
        if (!$user) {
            return back()->with('error', 'User not found.');
        }
        $user->delete();
        return back()->with('success', 'User removed successfully.');
    }
}
