<?php


namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UpdatePasswordController extends Controller
{
    /**
     * Update the password for the user.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => 'password does not meet requirements'], 400);
        }

        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();

        return response()->json(['message' => 'password updated successfully']);
    }
}
