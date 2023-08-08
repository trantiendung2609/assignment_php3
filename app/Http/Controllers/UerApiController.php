<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UerApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, User $user)
    {
        $username = $request->input('name');
        $email = $request->input('email');
        $password = bcrypt($request->input('password'));
        $data = [
            'name' => $username,
            'email' => $email,
            'password' => $password,
        ];
        $user = User::create($data);
        return response()->json($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return response()->json($user);
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
    public function update(Request $request, User $user)
    {
        $id = $request->input('id');
        $username = $request->input('name'); //lấy thông tin name từ request
        $email = $request->input('email'); //lấy thông tin email từ request
        $password = $request->input('password'); //lấy password từ request
        //update user
        // $user->id = $id;
        $user->email = $email;
        $user->name = $username;
        $user->password = password_hash($password, PASSWORD_DEFAULT);
        $user->save();
        // dd($user);
        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['success' => 'delete successfully']);;
    }
}
