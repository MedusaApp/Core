<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Auth",
     *     description="Authentication routes."
     * )
     */

    public function __construct()
    {
        return auth()->shouldUse('api');
    }

    /**
     * Authenticate with the given credentials
     *
     * @OA\Post(
     *     path="/api/v1/login",
     *     operationId="login",
     *     tags={"Auth"},
     *     summary="Login",
     *     description="Attempts to login",
     *     @OA\Parameter(
      *         name="email",
      *         in="query",
      *         description="The email for login",
      *         required=true,
      *         @OA\Schema(
      *             type="string"
      *         )
      *     ),
      *     @OA\Parameter(
      *         name="password",
      *         in="query",
      *         required=true,
      *         @OA\Schema(
      *             type="string",
      *         )
      *     ),
     *     @OA\Response(
     *       response=200,
     *       description="Successful login"
     *     ),
     *     @OA\Response(
     *       response=401,
     *       description="failed to login"
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = Auth::attempt($credentials)) {
            $jsonResponse = $this->respondWithToken($token);
            $jsonContent = json_decode($jsonResponse->getContent());
            $jsonContent->user_id = Auth::user()->id;
            $jsonResponse->setContent(json_encode($jsonContent));
            return $jsonResponse;
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Log out the user.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        Auth::logout();

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
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
