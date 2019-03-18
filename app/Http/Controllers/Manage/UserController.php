<?php

namespace App\Http\Controllers\Manage;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{

    public function index(Request $request)
    {
        $limit = $request->input('limit', 15);
        $count = User::filter($request->all())->count();
        $users = new UserCollection(User::filter($request->all())->with('roles')->limit($limit)->get());
        return $this->success([
            'users' => $users,
            'count' => $count
        ]);
    }

    public function show(User $user)
    {
        return $this->success(new UserResource($user));
    }

    public function store(UserRequest $request)
    {
        return $this->success(new UserResource(User::create($request->all())));
    }


    public function update(UserRequest $request, User $user)
    {
        $user->update($request->all());
        return $this->success(new UserResource($user));
    }


    public function delete(User $user)
    {
        $user->delete();
        return $this->success($user);
    }
}
