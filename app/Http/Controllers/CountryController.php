<?php


namespace App\Http\Controllers;


use PragmaRX\Countries\Package\Countries;

class CountryController extends Controller
{
    /**
     * @OA\Tag(
     *     name="Countries",
     *     description="Routes for standardizing country data. These are not protected by authorization."
     * )
     */

    /**
     * Get all country data.
     *
     * @OA\Get(
     *     path="/api/v1/countries",
     *     operationId="index",
     *     tags={"Countries"},
     *     summary="Get list of countries",
     *     description="Returns a list of countries by CCA3 code",
     *     @OA\Response(
     *       response=200,
     *       description="successful operation"
     *     )
     * )
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json(Countries::all()->pluck('name.common', 'cca3'));
    }

    /**
     * Get country data for a specific country.
     *
     * @OA\Get(
     *     path="/api/v1/countries/{cca3}",
     *     operationId="show",
     *     tags={"Countries"},
     *     summary="Get single country data",
     *     description="Returns all data for a single country specified by CCA3 code",
     *     @OA\Parameter(
     *          name="cca3",
     *          description="Country CCA3 code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *       response=200,
     *       description="successful operation"
     *     )
     * )
     *
     * @param string $cca3
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(string $cca3)
    {
        return response()->json(Countries::where('cca3', strtoupper($cca3))->first());
    }

    /**
     * Get a list of states
     *
     * @OA\Get(
     *     path="/api/v1/countries/{cca3}/states",
     *     operationId="getStates",
     *     tags={"Countries"},
     *     summary="Get list of states",
     *     description="Returns a list of states for a given country specified by CCA3 code",
     *     @OA\Parameter(
     *          name="cca3",
     *          description="Country CCA3 code",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *     @OA\Response(
     *       response=200,
     *       description="successful operation"
     *     )
     * )
     *
     * @param string $cca3
     * @return \Illuminate\Http\JsonResponse
     */
    public function getStates(string $cca3)
    {
        $results = Countries::where('cca3', strtoupper($cca3))
            ->first()
            ->hydrateStates()
            ->states
            ->pluck('name')
            ->getItems();
        $states = [];

        foreach ($results as $state) {
            $states[] = ['name' => $state];
        }

        return response()->json($states);
    }
}
