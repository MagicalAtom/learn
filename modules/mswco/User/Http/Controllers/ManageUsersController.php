<?php

namespace mswco\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use mswco\User\Models\User;
use mswco\User\Repositories\UserRepo;

class ManageUsersController extends Controller
{
    public function index(UserRepo $userRepo)
    {
        $users = $userRepo->all();
        return view('User::index',compact('users'));
    }

    public function change($id){
//        $user::query()->update(['beteach','yes']);
        $user = User::find($id);
        $user->beteach = "yes";
        $user->save();
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }
    public function del($id){
//        $user::query()->update(['beteach','yes']);
        $user = User::find($id);
        $user->beteach = "no";
        $user->save();
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }


    public function delete($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }

}
