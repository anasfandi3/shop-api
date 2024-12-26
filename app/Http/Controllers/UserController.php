<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserStoreRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UsersResource;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = UsersResource::collection(User::all());
        return response()->json(compact('users'));
    }

    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();
        $user = User::create($validated);
        return response()->json([
            'success' => true,
            'message' => 'user created successfully',
            'user' => new UserResource($user)
        ], 201);
    }

    public function show(User $user)
    {
        return response()->json(['user' => new UserResource($user)]);
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $validated = $request->validated();
        $user->update($validated);
        $user->save();
        return response()->json([
            'success' => true,
            'message' => 'user updated successfully',
            'user' => new UserResource($user)
        ], 200);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json([
            'success' => true,
            'message' => 'user deleted successfully'
        ], 200);
    }
}
