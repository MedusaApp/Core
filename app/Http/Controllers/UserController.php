<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Users",
     *     description="User control routes."
     * )
     */

    /**
     * Display a listing of users.
     *
     * @OA\Get(
     *     path="/api/v1/users",
     *     operationId="index",
     *     tags={"Users"},
     *     summary="Get list of users",
     *     description="Returns a list of users ordered by last name and first name",
     *     security={{"bearer_token":{}}},
     *     @OA\Response(
     *      response=200,
     *      description="successful operation"
     *     ),
     *     @OA\Response(
     *      response=400,
     *      description="bad request"
     *     )
     * )
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        Gate::authorize('view-users');

        $users = User::orderBy('last_name')->orderBy('first_name')->get();

        return response()->json($users);
    }

    /**
     * Store a newly created user in storage.
     *
     * @OA\Post(
     *     path="/api/v1/users",
     *     operationId="store",
     *     tags={"Users"},
     *     summary="Create a new user",
     *     description="Creates a new user",
     *     security={{"bearer_token":{}}},
     *     @OA\RequestBody(
     *       request="User",
     *       description="User object to be added",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="user successfully created"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        Gate::authorize('create-users');

        $attributes = $request->all();

        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'password does not meet requirements'], 400);
        }

        $attributes['password'] = Hash::make($attributes['password']);

        $user = User::create($attributes);

        return response()->json($user);
    }

    /**
     * Create an API token for a user.
     *
     * @param \App\Models\User $user
     * @param string $name
     * @return \Illuminate\Http\JsonResponse
     */
    public function createToken(User $user, string $name)
    {
        $token = $user->createToken($name);

        return response()->json(['token' => $token->plainTextToken]);
    }

    /**
     * Fetch all of the API tokens for a user.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTokens(User $user)
    {
        $tokens = $user->tokens;

        return response()->json(['tokens' => $tokens]);
    }

    /**
     * Display the specified user.
     *
     * @OA\Get(
     *     path="/api/v1/users/{id}",
     *     operationId="show",
     *     tags={"Users"},
     *     summary="Retrieve the given user",
     *     description="Retrieves the given user, without hidden fields like password",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the user to retrieve",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="user retrieved"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(User $user)
    {
        Gate::authorize('show-user', $user);

        return response()->json($user);
    }

    /**
     * Update the specified user in storage.
     *
     * @OA\Put(
     *     path="/api/v1/users/{id}",
     *     operationId="update",
     *     tags={"Users"},
     *     summary="Update the given user",
     *     description="Updates the given user",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the user to update",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\RequestBody(
     *       request="User",
     *       description="User object to be modified",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/User")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="user successfully modified"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, User $user)
    {
        Gate::authorize('update-user', $user);

        $attributes = $request->all();

        $user->update($attributes);
        $user->save();

        return response()->json($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *     path="/api/v1/users/{id}",
     *     operationId="destroy",
     *     tags={"Users"},
     *     summary="Delete the given user",
     *     description="Deletes the given user. Note: this is a hard delete.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the user to delete",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="user successfully deleted"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(User $user)
    {
        Gate::authorize('delete-users', $user);

        $user->delete();

        return response()->json(['message' => 'user successfully deleted'], 200);
    }
}
