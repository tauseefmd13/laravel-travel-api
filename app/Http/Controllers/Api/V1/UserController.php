<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @authenticated
     */
    public function index(Request $request)
    {
        return new UserResource($request->user());
    }
}
