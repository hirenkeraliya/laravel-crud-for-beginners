<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    /**
     * Returns the list of the users
     *
     * @return \Illuminate\Http\Response
     **/
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }

    /**
     * Returns the create page
     *
     * @return \Illuminate\Http\Response
     **/
    public function create()
    {
        return view('users.create');
    }

    /**
     * Saves the user details
     *
     * @return \Illuminate\Http\RedirectResponse
     **/
    public function store()
    {
        $validatedData = request()->validate([
            'brand' => 'required|string',
            'model' => 'required|string',
            'quantity' => 'required|string',
        ]);
        $path = request()->file('avatar')->store('/uploads', ['disk' => 'public']);
        $validatedData['avatar'] = '/storage//'.$path;

        User::create($validatedData);

        return redirect()->route('users.index');
    }
}
