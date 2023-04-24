<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Login
     *
     * @param LoginRequest $request
     *
     * @return array
     */
    public function login(LoginRequest $request)
    {
        $data = $request->validated();
        $login = $data['email'];
        $password = $data['password'];
        $deviceName = $data['device_name'];

        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'password' => ['The provided credentials are incorrect.'],
            ]);
        }

        Auth::login($user);
        $user->tokens()
            ->where('name', $deviceName)
            ->delete();
        $token = $user->createToken($deviceName)->plainTextToken;
        return [
            'token' => $token,
            'user' => new UserResource($user),
        ];
    }


    public function register(registerRequest $request)
    {
        $data = $request->validated();
        $login = $data['email'];
        $name = $data['name'];
        $password = $data['password'];
        $password_confirmation = $data['password_confirmation'];
        $deviceName = $data['device_name'];


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id'=> 3,
        ]);

        $user->tokens()
            ->where('name', $deviceName)
            ->delete();
        $token = $user->createToken($deviceName)->plainTextToken;

        return response([
            'token' => $token,
            'user' => new UserResource($user),
        ])->withHeaders([
            "Authorization" => "Bearer $token"
        ]);
    }

    /**
     * Logout
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['message' => 'Logged out']);
        }
        $user->tokens()->delete();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return response()->json(['message' => 'Logged out']);
    }

    public function user(Request $request)
    {
        if (Auth::check()) {
            return [
                'user' => new UserResource(Auth::user()),
                'x-xsrf-token' => $request->headers->get('x-xsrf-token')];
        } else {
            return response()->json(['error' => 'Unauthenticated.'], 401);
        }
    }
}

