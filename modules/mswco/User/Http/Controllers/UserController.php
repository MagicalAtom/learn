<?php

namespace mswco\User\Http\Controllers;

use App\Http\Controllers\Controller;
use mswco\User\Models\User;
use mswco\User\Requests\UpdateProfileUserRequest;

class UserController extends Controller
{
    public function index()
    {
    return view('User::edit-profile');
    }

    public function update($id,UpdateProfileUserRequest $updateProfileUserRequest)
    {
        $user = User::find($id);
        $user->name = $updateProfileUserRequest->name;
        $user->email = $updateProfileUserRequest->email;
        $user->biography = $updateProfileUserRequest->biography;
        $user->card_number = $updateProfileUserRequest->card_number;
        $user->phone_number = $updateProfileUserRequest->phone_number;
        $user->user_name = $updateProfileUserRequest->user_name;
        $user->save();
        return redirect()->back();
    }



}
