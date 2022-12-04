<?php

namespace mswco\User\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use mswco\Media\Services\ImageUploadService;
use mswco\Media\Services\MediaService;
use mswco\User\Models\User;
use mswco\User\Repositories\UserRepo;
use mswco\User\Requests\UpdatePhotoRequest;

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

    public function edit(User $user){
        return view('User::edit',compact('user'));
    }
    public function update(User $user , Request $request){
            $user::query()->update([
               'name' => $request->name,
               'email' => $request->email,
            ]);
            return redirect()->to(route('users.index'))
                ->with('status','update');
    }



    public function create(){
        return view('User::create');
    }



    public function store(Request $request){
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone_number = $request->phone_number;
        $user->save();
        return redirect()->to(route('users.index'))->with('status','created');
    }


    public function ban($id){
        $user = User::find($id);
        $user->status = "ban";
        $user->save();
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }
    public function unban($id){
        $user = User::find($id);
        $user->status = "unban";
        $user->save();
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }

    public function UpdatePhoto(UpdatePhotoRequest $request)
    {

        if (auth()->user()->profile == null)
        {
        $image =   ImageUploadService::upload($request->file('profile'));
        auth()->user()->profile = $image;
        auth()->user()->save();
            return back()->with('status', 'updatePhoto');
        }else {
            ImageUploadService::delete(auth()->user()->profile);
            auth()->user()->profile = null;
            auth()->user()->save();
            $image = ImageUploadService::upload($request->file('profile'));
            auth()->user()->profile = $image;
            auth()->user()->save();
            return back()->with('status', 'updatePhoto');
        }
        }


}
