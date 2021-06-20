<?php

namespace App\Http\Controllers;

use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChapterController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Chapter",
     *     description="Chapter control routes."
     * )
     */

    /**
     * Display a listing of chapters.
     *
     * @OA\Get(
     *     path="/api/v1/chapters",
     *     operationId="index",
     *     tags={"Chapter"},
     *     summary="Get list of chapters",
     *     description="Returns a list of chapters ordered by name.",
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
        Gate::authorize('view-chapters');

        $chapters = Chapter::orderBy('name')->get();

        return response()->json($chapters);
    }

    /**
     * Store a newly created chapter in storage.
     *
     * @OA\Post(
     *     path="/api/v1/chapters",
     *     operationId="store",
     *     tags={"Chapter"},
     *     summary="Create a new chapter",
     *     description="Creates a new chapter",
     *     security={{"bearer_token":{}}},
     *     @OA\RequestBody(
     *       request="Chapter Type",
     *       description="Chapter object to be added",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/Chapter")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter successfully created"
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
        Gate::authorize('create-chapters');

        $attributes = $request->all();

        $chapter = Chapter::create($attributes);

        return response()->json($chapter);
    }

    /**
     * Display the specified chapter.
     *
     * @OA\Get(
     *     path="/api/v1/chapters/{id}",
     *     operationId="show",
     *     tags={"Chapter"},
     *     summary="Retrieve the given chapter",
     *     description="Retrieves the given chapter",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the chapter to retrieve",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter retrieved"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Chapter $chapter)
    {
        Gate::authorize('view-chapters');

        return response()->json($chapter);
    }

    /**
     * Display the specified chapter's member list.
     *
     * @OA\Get(
     *     path="/api/v1/chapters/{id}/members",
     *     operationId="members",
     *     tags={"Chapter"},
     *     summary="Retrieve the given chapter's member list",
     *     description="Retrieves the given chapter's member list",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the chapter to retrieve",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter member list retrieved"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\JsonResponse
     */
    public function members(Chapter $chapter)
    {
        Gate::authorize('view-chapter-members');

        return response()->json($chapter->members);
    }

    /**
     * Update the specified chapter in storage.
     *
     * @OA\Put(
     *     path="/api/v1/chapters/{id}",
     *     operationId="update",
     *     tags={"Chapter"},
     *     summary="Update the given chapter",
     *     description="Updates the given chapter",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the chapter to update",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\RequestBody(
     *       request="Chapter",
     *       description="Chapter object to be modified",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/Chapter")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter successfully modified"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Chapter $chapter)
    {
        Gate::authorize('update-chapters');

        $attributes = $request->all();

        $chapter->update($attributes);
        $chapter->save();

        return response()->json($chapter);
    }

    /**
     * Remove the specified chapter from storage.
     *
     * @OA\Delete(
     *     path="/api/v1/chapters/{id}",
     *     operationId="destroy",
     *     tags={"Chapter"},
     *     summary="Delete the given chapter",
     *     description="Deletes the given chapter. Note: this is a hard delete.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the chapter to delete",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter successfully deleted"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Chapter $chapter)
    {
        Gate::authorize('delete-chapters');

        $chapter->delete();

        return response()->json(['message' => 'chapter successfully deleted'], 200);
    }
}
