<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|string|min:6',
            'password' => 'required|string|min:8'
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        } 
        if (!$user = User::where('email', $request->email)->first()) {
            return response()->json(['message' => 'User Not Found'], 404);
        }
    
        if (!Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 404);
        }
        
        return response()->json([
            'user' => $user,
            'token' => $user->createToken('User-Token')->plainTextToken
        ]);
    }
}
