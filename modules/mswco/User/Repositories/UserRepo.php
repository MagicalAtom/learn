<?php

namespace mswco\User\Repositories;

use mswco\User\Models\User;

class UserRepo
{
    // repositories pattern work with database
public function findByEmail($email){
    $user = User::query()->where('email',$email)->first();
    return $user;
}


public function getTeacher(){
    $teacher = User::query()->where('beteach','yes')->get();
    return $teacher;
}

public function all(){
    return User::query()->paginate(10);
}

public function delete($user){
    $user::query()->delete();
}


public function add($user){

}


    public function del($user){
        return $user::query()->update(['beteach','no']);
    }




}
