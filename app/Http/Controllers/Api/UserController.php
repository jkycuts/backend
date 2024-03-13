<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return User::findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {

        $validated = $request->validated();

        $validated['password'] = Hash::make($validated['password']);

        $Users = User::create($validated);

        return $Users;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $validated = $request->validated();

        $Users = User::findORFail($id);

        $Users->name = $validated['name'];

        $Users->save();

        return $Users;
    }

    /**
     * Update the email of the specified resource in storage.
     */
    public function email(UserRequest $request, string $id)
    {
        $validated = $request->validated();

        $Users = User::findORFail($id);

        $Users->email = $validated['email'];

        $Users->save();

        return $Users;
    }

    /**
     * Update the password of the specified resource in storage.
     */
    public function password(UserRequest $request, string $id)
    {
        $validated = $request->validated();

        $Users = User::findORFail($id);

        $Users->password = Hash::make($validated['password']);

        $Users->save();

        return $Users;
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Users = User::findORFail($id);

        $Users->delete();

        return $Users;
    }
}
