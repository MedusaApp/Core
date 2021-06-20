<?php

namespace App\Http\Controllers;

use App\Models\ShipClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ShipClassController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Ship Classes",
     *     description="Ship class control routes."
     * )
     */

    /**
     * Display a listing of ship classes.
     *
     * @OA\Get(
     *     path="/api/v1/shipclasses",
     *     operationId="index",
     *     tags={"Ship Classes"},
     *     summary="Get list of ship classes",
     *     description="Returns a list of ship classes ordered by abbreviation.",
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
        Gate::authorize('view-shipclasses');

        $shipclasses = ShipClass::orderBy('name')->get();

        return response()->json($shipclasses);
    }

    /**
     * Store a newly created ship class in storage.
     *
     * @OA\Post(
     *     path="/api/v1/shipclasses",
     *     operationId="store",
     *     tags={"Ship Classes"},
     *     summary="Create a new ship class",
     *     description="Creates a new ship class",
     *     security={{"bearer_token":{}}},
     *     @OA\RequestBody(
     *       request="Ship Class",
     *       description="Ship class object to be added",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/ShipClass")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="ship class successfully created"
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
        Gate::authorize('create-shipclasses');

        $attributes = $request->all();

        $shipclass = ShipClass::create($attributes);

        return response()->json($shipclass);
    }

    /**
     * Display the specified ship class.
     *
     * @OA\Get(
     *     path="/api/v1/shipclasses/{id}",
     *     operationId="show",
     *     tags={"Ship Classes"},
     *     summary="Retrieve the given ship class",
     *     description="Retrieves the given ship class",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the ship class to retrieve",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="ship class retrieved"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     *
     * @param  \App\Models\ShipClass  $shipclass
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(ShipClass $shipclass)
    {
        Gate::authorize('view-shipclasses');

        return response()->json($shipclass);
    }

    /**
     * Update the specified ship class in storage.
     *
     * @OA\Put(
     *     path="/api/v1/shipclasses/{id}",
     *     operationId="update",
     *     tags={"Ship Classes"},
     *     summary="Update the given ship class",
     *     description="Updates the given ship class",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the ship class to update",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\RequestBody(
     *       request="ShipClass",
     *       description="Ship class object to be modified",
     *       required=true,
     *       @OA\JsonContent(ref="#/components/schemas/ShipClass")
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="ship class successfully modified"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipClass  $shipclass
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, ShipClass $shipclass)
    {
        Gate::authorize('update-shipclasses');

        $attributes = $request->all();

        $shipclass->update($attributes);
        $shipclass->save();

        return response()->json($shipclass);
    }

    /**
     * Remove the specified ship class from storage.
     *
     * @OA\Delete(
     *     path="/api/v1/shipclasses/{id}",
     *     operationId="destroy",
     *     tags={"Ship Classes"},
     *     summary="Delete the given ship class",
     *     description="Deletes the given ship class. Note: this is a hard delete.",
     *     security={{"bearer_token":{}}},
     *     @OA\Parameter(
     *       name="id",
     *       description="The ID of the ship class to delete",
     *       required=true,
     *       in="path",
     *       @OA\Schema(
     *           type="integer"
     *       )
     *     ),
     *     @OA\Response(
     *       response=200,
     *       description="ship class successfully deleted"
     *     ),
     *     @OA\Response(
     *       response=403,
     *       description="permission denied"
     *     )
     * )
     *
     * @param  \App\Models\ShipClass  $shipclass
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(ShipClass $shipclass)
    {
        Gate::authorize('delete-shipclasses');

        $shipclass->delete();

        return response()->json(['message' => 'ship class successfully deleted'], 200);
    }
}
