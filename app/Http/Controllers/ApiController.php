<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PragmaRX\Countries\Package\Countries;

class ApiController extends Controller
{
    public function getStates($cca3)
    {
        $results = Countries::where('cca3', $cca3)
            ->first()
            ->hydrateStates()
            ->states
            ->pluck('name')
            ->getItems();
        $states = [];

        foreach($results as $state) {
            $states[] = ['name' => $state];
        }

        return response()->json($states);
    }
}
