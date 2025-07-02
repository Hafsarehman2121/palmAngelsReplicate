<?php
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Register User
     *
     * 
     * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        try{
            $validator = Validator::make($request->all(), [
                'name'     => 'required|string|max:255',
                'email'    => 'required|email|unique:users',
                'password' => 'required|min:6',
            ]);

            if ($validator->fails()) {
                return response()->json([
                    'status'  => false,
                    'errors'  => $validator->errors()
                ], 422);
            }

            $user = User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => Hash::make($request->password),
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'User registered successfully',
                'token'  => $token,
                'user'   => $user,
            ], JsonResponse::HTTP_OK);
        }catch (\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
            return false;
        }
    }

   /**
     * Login user
     *
     * 
     * @return \Illuminate\Http\Response
    */
    public function login(Request $request)
    {
        try{
            $user = User::where('email', $request->email)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Invalid credentials'
                ], 401);
            }

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'status' => true,
                'message' => 'Login successful',
                'token'   => $token,
                'user'    => $user
            ], JsonResponse::HTTP_OK);
        }catch (\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
            return false;
        }
    }

    // ✅ Logout (optional)
    public function logout(Request $request)
    {
        try{
            $request->user()->currentAccessToken()->delete();

            return response()->json([
                'status' => true,
                'message' => 'Logged out successfully'
            ], JsonResponse::HTTP_OK);
        }catch (\ErrorException $e) {
            throw new \ErrorException($e->getMessage());
            return false;
        }
    }
}
