<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use JWTAuth;
use App\User;

class AuthController extends Controller
{
    private $user;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->middleware('auth:api', ['except' => ['login']]);
        $this->user = $user;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if ($token = JWTAuth::attempt($credentials)) {
            return $this->respondWithToken($token);
        }
    
        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function user()
    {
        return  response()->json(auth()->user());
    }

    /**
     * Get the authenticated User professions.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function professions()
    {
        return response()->json(auth()->user()->professions);
    }

    public function userProfessions(){
       
        $user = auth()->user();
        $professions = $user->professions;

        return   response()->json($user);
    }

    public function userProfessionsId($id){
       
        $user = $this->user->findOrFail($id);
        $professions = $user->professions;

        return   response()->json($user);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60           
        ]);
    }
}
