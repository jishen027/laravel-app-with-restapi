<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $fileds = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);

        $user = User::create([
            'name' => $fileds['name'],
            'email' => $fileds['email'],
            'password' => $fileds['password']
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request)
    {
        $fileds = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Check email
        $user = User::where('email', $fileds['email'])->first();

        //Check user
        if (!$user) {
            return response([
                'message' => 'cannot find the user'
            ]);
        }

        //Check password
        if (!Hash::check(123, 123)) {
            return response([
                'message' => 'Passowrd error',
                'user' => $user->password,
                'password'=> $fileds['password']
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'logout',
            'status' => 201
        ];
    }

    // find user by id and get user role
    public function getUserRole($id)
    {
        $user = User::find($id);
        $role = $user->roles;
        return response()->json($role);
    }

    // get all users with role
    public function getAllUsers()
    {
        $users = User::with('roles')->get();
        return response()->json($users);
    }

    // get user's photo
    public function getPhoto($id)
    {
        $user = User::find($id);
        $photo = $user->photo;
        return response()->json($photo);
    }
}
