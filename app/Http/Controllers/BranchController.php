<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class BranchController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Branches",
     *     description="Branch control routes."
     * )
     */

    /**
     * Display a listing of branches.
     *
     * @OA\Get(
     *     path="/api/v1/branches",
     *     operationId="index",
     *     tags={"Branches"},
     *     summary="Get list of branches",
     *     description="Returns a list of branches ordered by abbreviation.",
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
        Gate::authorize('view-branches');

        $branches = Branch::orderBy('abbreviation')->get();

        return response()->json($branches);
    }

    /**
     * Store a newly created branch in storage.
     *
     * @OA\Post(
     *     path="/api/v1/branches",
     *     operationId="store",
     *     tags={"Branches"},
     *     summary="Create a new branch",
     *     description="Creates a new branch",
     *     security={{"bearer_token":{}}},
     *     @OA\RequestBody(
     *       request="Branch",
     *       description="Branch object to be added",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/Branch")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="branch successfully created"
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
        Gate::authorize('create-branches');

        $attributes = $request->all();

        $branch = Branch::create($attributes);

        return response()->json($branch);
    }

    /**
     * Display the specified branch.
     *
     * @OA\Get(
     *     path="/api/v1/branches/{id}",
     *     operationId="show",
     *     tags={"Branches"},
     *     summary="Retrieve the given branch",
     *     description="Retrieves the given branch",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the branch to retrieve",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="branch retrieved"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Branch $branch)
    {
        Gate::authorize('view-branches');

        return response()->json($branch);
    }

    /**
     * Update the specified branch in storage.
     *
     * @OA\Put(
     *     path="/api/v1/branches/{id}",
     *     operationId="update",
     *     tags={"Branches"},
     *     summary="Update the given branch",
     *     description="Updates the given branch",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the branch to update",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\RequestBody(
     *       request="Branch",
     *       description="Branch object to be modified",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/Branch")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="branch successfully modified"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Branch $branch)
    {
        Gate::authorize('update-branches');

        $attributes = $request->all();

        $branch->update($attributes);
        $branch->save();

        return response()->json($branch);
    }

    /**
     * Remove the specified branch from storage.
     *
     * @OA\Delete(
     *     path="/api/v1/branches/{id}",
     *     operationId="destroy",
     *     tags={"Branches"},
     *     summary="Delete the given branch",
     *     description="Deletes the given branch. Note: this is a hard delete.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the branch to delete",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="branch successfully deleted"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \App\Models\Branch  $branch
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Branch $branch)
    {
        Gate::authorize('delete-branches');

        $branch->delete();

        return response()->json(['message' => 'branch successfully deleted'], 200);
    }
}
