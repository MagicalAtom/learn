<?php

namespace mswco\Courses\Models;

use Illuminate\Database\Eloquent\Model;
use mswco\User\Models\User;
class Course extends Model
{
protected $guarded = [];


public static function teacher($id){
        return User::find($id)->name;
}


public function seasons(){
    return $this->hasMany(Season::class);
}
public function lessons(){
    return $this->hasMany(Lesson::class);
}

}
