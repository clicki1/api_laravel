<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $avatar = $data['avatar'];
        $name = $avatar->hashName();
        $filePath = Storage::disk('public')->putFileAs('/avatars', $avatar, $name);
        $data['avatar'] = $filePath;
        // $url = url('/storage/'.$filePath);
      //  dd($data);

        $user = User::create($data);

        return UserResource::make($user);

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return UserResource::make($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {

        $data = $request->validated();
        $avatar = $data['avatar'];
        $name = $avatar->hashName();
        $filePath = Storage::disk('public')->putFileAs('/avatars', $avatar, $name);
        $data['avatar'] = $filePath;
        $user->update($data);

       // $user = $user->fresh();

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return response()->json([
            'message' => 'done',
        ]);
    }
}
