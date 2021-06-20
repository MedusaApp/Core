<?php

namespace App\Http\Controllers;

use App\Models\ChapterType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ChapterTypeController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Chapter Types",
     *     description="Chapter type control routes."
     * )
     */

    /**
     * Display a listing of chapter types.
     *
     * @OA\Get(
     *     path="/api/v1/chaptertypes",
     *     operationId="index",
     *     tags={"Chapter Types"},
     *     summary="Get list of chapter types",
     *     description="Returns a list of chapter types ordered by abbreviation.",
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
        Gate::authorize('view-chaptertypes');

        $chaptertypes = ChapterType::orderBy('name')->get();

        return response()->json($chaptertypes);
    }

    /**
     * Store a newly created chapter type in storage.
     *
     * @OA\Post(
     *     path="/api/v1/chaptertypes",
     *     operationId="store",
     *     tags={"Chapter Types"},
     *     summary="Create a new chapter type",
     *     description="Creates a new chapter type",
     *     security={{"bearer_token":{}}},
     *     @OA\RequestBody(
     *       request="Chapter Type",
     *       description="Chapter type object to be added",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/ChapterType")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter type successfully created"
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
        Gate::authorize('create-chaptertypes');

        $attributes = $request->all();

        $chaptertype = ChapterType::create($attributes);

        return response()->json($chaptertype);
    }

    /**
     * Display the specified chapter type.
     *
     * @OA\Get(
     *     path="/api/v1/chaptertypes/{id}",
     *     operationId="show",
     *     tags={"Chapter Types"},
     *     summary="Retrieve the given chapter type",
     *     description="Retrieves the given chapter type",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the chapter type to retrieve",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter type retrieved"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     *
     * @param  \App\Models\ChapterType  $chaptertype
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ChapterType $chaptertype)
    {
        Gate::authorize('view-chaptertypes');

        return response()->json($chaptertype);
    }

    /**
     * Update the specified chapter type in storage.
     *
     * @OA\Put(
     *     path="/api/v1/chaptertypes/{id}",
     *     operationId="update",
     *     tags={"Chapter Types"},
     *     summary="Update the given chapter type",
     *     description="Updates the given chapter type",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the chapter type to update",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\RequestBody(
     *       request="ChapterType",
     *       description="Chapter type object to be modified",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/ChapterType")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter type successfully modified"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ChapterType  $chaptertype
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ChapterType $chaptertype)
    {
        Gate::authorize('update-chaptertypes');

        $attributes = $request->all();

        $chaptertype->update($attributes);
        $chaptertype->save();

        return response()->json($chaptertype);
    }

    /**
     * Remove the specified chapter type from storage.
     *
     * @OA\Delete(
     *     path="/api/v1/chaptertypes/{id}",
     *     operationId="destroy",
     *     tags={"Chapter Types"},
     *     summary="Delete the given chapter type",
     *     description="Deletes the given chapter type. Note: this is a hard delete.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the chapter type to delete",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="chapter type successfully deleted"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \App\Models\ChapterType  $chaptertype
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ChapterType $chaptertype)
    {
        Gate::authorize('delete-chaptertypes');

        $chaptertype->delete();

        return response()->json(['message' => 'chapter type successfully deleted'], 200);
    }
}
