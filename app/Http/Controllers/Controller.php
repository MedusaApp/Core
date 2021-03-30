<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * @OA\Info(
     *     version="1.0.0",
     *     title="Medusa Core API",
     *     description="This is the Medusa Core API. Most routes are protected with JWT authentication.",
     *     @OA\Contact(
     *       email="mdoc@trmn.org"
     *     ),
     *     @OA\License(
     *       name="GPL 3.0",
     *       url="https://www.gnu.org/licenses/gpl-3.0.html"
     *     )
     * )
     */

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
