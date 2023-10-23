<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{

    public function store(AuthRequest $request)
    {
        return  $request->authenticate();
    }

    public function destroy(): JsonResponse
    {
        $user = Auth::user();
        $user->tokens()->delete();
        return  response()->json([
            'message' => 'logged out.'
        ], 401);
    }
}
