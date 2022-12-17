<?php

namespace mswco\Courses\Models;

use Illuminate\Database\Eloquent\Model;
use mswco\User\Models\User;

class Season extends Model
{

protected $guarded = [];

    public function course(){
        return $this->belongsTo(Course::class);
    }


    public function user(){
        return $this->belongsTo(User::class);
    }
}
