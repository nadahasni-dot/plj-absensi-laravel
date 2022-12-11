<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthApiController extends Controller
{
    public function index(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken(env('APP_KEY', 'base64:PJUxpvucERPN3rYRy6r7lS85Pzxda+1nusOUNhuzn8o='))->plainTextToken;

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Sign in succeess',
                    'data' => $user,
                    'token' => $token,
                ],
                200
            );
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'Credentials not valid',
            ],
            401
        );
    }

    public function show(Request $request)
    {
        $user = User::where('id', $request->user()->id)->first();

        return response()->json(
            [
                'success' => true,
                'message' => 'get user success',
                'data' => $user,
            ],
            200
        );
    }

    public function update(Request $request)
    {
        $param = $request->validate([
            'name' => 'required',
        ]);

        $userId = $request->user()->id;

        User::where('id', $userId)->update($param);

        return response()->json(
            [
                'success' => true,
                'message' => 'update user success',
                'data' => User::where('id', $userId)->first(),
            ],
            200
        );
    }

    public function avatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required'
        ]);

        $userId = $request->user()->id;
        $file = $request->file('avatar');
        $avatar = time() . "_" . $file->getClientOriginalName();
        $file->move('storage/avatar', $avatar);

        User::where('id', $userId)->update([
            'avatar' => $avatar
        ]);

        return response()->json(
            [
                'success' => true,
                'message' => 'update user success',
                'data' => User::where('id', $userId)->first(),
            ],
            200
        );
    }
}
