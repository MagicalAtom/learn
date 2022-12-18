<?php

namespace mswco\Courses\Models;

use Illuminate\Database\Eloquent\Model;

use mswco\Courses\Models\Course;
use mswco\Courses\Models\Season;
class Lesson extends Model
{
    protected $guarded = [];
    public function season(){
        return $this->belongsTo(Season::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
