<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UserService;   

class UserController extends Controller
{
    public function show()
    {
        $users = [
            ['name' => 'John Doe', 'gender' => 'male'],
            ['name' => 'Jane Doe', 'gender' => 'female'],
        ];
        return response()->json($users);
    }

    public function index(UserService $userService)
    {
        return response()->json($userService->listUsers());
    }
}