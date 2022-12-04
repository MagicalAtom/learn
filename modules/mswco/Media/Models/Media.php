<?php

namespace mswco\Media\Models;

use Illuminate\Database\Eloquent\Model;
use mswco\User\Models\User;

class Media extends Model
{
    protected $guarded = [];



    public function user(){
        return $this->belongsTo(User::class);
    }

}
