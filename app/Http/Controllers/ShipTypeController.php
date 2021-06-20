<?php

namespace App\Http\Controllers;

use App\Models\ShipType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShipTypeController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Ship Types",
     *     description="Ship type control routes."
     * )
     */

    /**
     * Display a listing of ship types.
     *
     * @OA\Get(
     *     path="/api/v1/shiptypes",
     *     operationId="index",
     *     tags={"Ship Types"},
     *     summary="Get list of ship types",
     *     description="Returns a list of ship types ordered by abbreviation.",
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
        Gate::authorize('view-shiptypes');

        $shiptypes = ShipType::orderBy('abbreviation')->get();

        return response()->json($shiptypes);
    }

    /**
     * Store a newly created ship type in storage.
     *
     * @OA\Post(
     *     path="/api/v1/shiptypes",
     *     operationId="store",
     *     tags={"Ship Types"},
     *     summary="Create a new ship type",
     *     description="Creates a new ship type",
     *     security={{"bearer_token":{}}},
     *     @OA\RequestBody(
     *       request="Ship Type",
     *       description="Ship type object to be added",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/ShipType")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="ship type successfully created"
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
        Gate::authorize('create-shiptypes');

        $attributes = $request->all();

        $shiptype = ShipType::create($attributes);

        return response()->json($shiptype);
    }

    /**
     * Display the specified ship type.
     *
     * @OA\Get(
     *     path="/api/v1/shiptypes/{id}",
     *     operationId="show",
     *     tags={"Ship Types"},
     *     summary="Retrieve the given ship type",
     *     description="Retrieves the given ship type",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the ship type to retrieve",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="ship type retrieved"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     *
     * @param  \App\Models\ShipType  $shiptype
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShipType $shiptype)
    {
        Gate::authorize('view-shiptypes');

        return response()->json($shiptype);
    }

    /**
     * Update the specified ship type in storage.
     *
     * @OA\Put(
     *     path="/api/v1/shiptypes/{id}",
     *     operationId="update",
     *     tags={"Ship Types"},
     *     summary="Update the given ship type",
     *     description="Updates the given ship type",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the ship type to update",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\RequestBody(
     *       request="ShipType",
     *       description="Ship type object to be modified",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/ShipType")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="ship type successfully modified"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipType  $shiptype
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ShipType $shiptype)
    {
        Gate::authorize('update-shiptypes');

        $attributes = $request->all();

        $shiptype->update($attributes);
        $shiptype->save();

        return response()->json($shiptype);
    }

    /**
     * Remove the specified ship type from storage.
     *
     * @OA\Delete(
     *     path="/api/v1/shiptypes/{id}",
     *     operationId="destroy",
     *     tags={"Ship Types"},
     *     summary="Delete the given ship type",
     *     description="Deletes the given ship type. Note: this is a hard delete.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the ship type to delete",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="ship type successfully deleted"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \App\Models\ShipType  $shiptype
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ShipType $shiptype)
    {
        Gate::authorize('delete-shiptypes');

        $shiptype->delete();

        return response()->json(['message' => 'ship type successfully deleted'], 200);
    }
}
