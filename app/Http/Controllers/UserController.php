<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;
use Auth;
use Hash;

class UserController extends Controller
{
    protected $service;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function show(Request $request, $userId)
    {
        $user = $this->userService->findUser($userId);

        return response()->json([
            'code' => 200,
            'data' => $user
        ], 200);
    }
}