<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RootController extends Controller
{
    public function index() {
        return response()->json([
            'message' => 'MEDUSA v3',
            'documentation' => '/api/documentation',
        ]);
    }
}
