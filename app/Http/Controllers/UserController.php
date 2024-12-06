<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        dump($users);
        return view('lists', ['users' => $users]);
    }


    public function create()
    {
        $user = new User();
        return view('form', ['user' => $user, 'action' => 'Create', 'actionUrl' => '/']);
    }


    public function store(Request $request)
    {
        $validetionData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'age' => 'required|integer'
            ]
        );
        $user  = new User();
        $user->name = $validetionData['name'];
        $user->age = $validetionData['age'];
        $user->save();
        return redirect('/')->with('success', 'User create successfully!');
    }


    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        dump($user);
        return view('form', ['user' => $user, 'action' => 'Update', 'actionUrl' => '/' . $id]);
    }
    public function update(Request $request, string $id)
    {
        $validetionData = $request->validate(
            [
                'name' => 'required|string|max:255',
                'age' => 'required|integer'
            ]
        );
        $user = User::findOrFail($id);
        $user->name = $validetionData['name'];
        $user->age = $validetionData['age'];
        $user->save();
        return redirect('/')->with('success', 'User update successfully');
    }


    public function destroy(string $id)
    {
        // Find the user by ID or fail with a 404 error if not found
        $user = User::findOrFail($id);

        // You can remove the dump here, unless for debugging purposes
        // dump($user);

        // Attempt to delete the user
        try {
            $user->delete();

            // Return success message after successful deletion
            return redirect('/')->with('success', 'User deleted successfully');
        } catch (\Exception $e) {
            // In case of any error, return a failure message
            return redirect('/')->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }
}
