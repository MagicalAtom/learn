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



}
