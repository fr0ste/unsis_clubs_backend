<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

/**
 * Class AuthController
 * @package App\Http\Controllers\API
 *
 * Controller for handling user authentication and registration.
 */
class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     * Set up middleware to exclude login and register methods from the 'api' guard.
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

    /**
     * Authenticate the user and return a JWT token upon successful login.
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->input('Email'),
            'password' =>$request->input('password'),
        ];

        $token = Auth::attempt($credentials);

        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    /**
     * Register a new user and return a JWT token upon successful registration.
     *
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        try {
            // Encrypt the password before storing it in the database
            $encryptedPassword = Hash::make($request->input('password'));

            // Create a new user and assign the encrypted password
            $userData = $request->except('password');
            $userData['password'] = $encryptedPassword;

            $user = User::create($userData);

            // Generate a JWT token for the registered user
            $token = JWTAuth::fromUser($user);

            return response()->json([
                'message' => 'User successfully registered',
                'user' => $user,
                'token' => $token,
            ], 200);

        } catch (\Exception $e) {
            // Log and return an error response
            Log::error('Error occurred in userController@store: ' . $e->getMessage(), ['exception' => $e]);
            return response()->json(['error' => 'Error occurred while creating the user.'], 500);
        }
    }

    /**
     * Retrieve the authenticated user's account information.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getaccount()
    {
        return response()->json(auth()->user());
    }

    /**
     * Logout the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh the JWT token for the authenticated user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return response()->json([
            'user' => Auth::user(),
            'authorization' => [
                'token' => Auth::refresh(),
                'type' => 'bearer',
            ]
        ]);
    }
}
