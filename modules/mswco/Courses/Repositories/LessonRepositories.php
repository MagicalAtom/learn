<?php

namespace mswco\Courses\Repositories;

use Illuminate\Support\Str;
use mswco\Courses\Models\Lesson;
use mswco\Courses\Models\Season;
use mswco\Media\Services\MediaService;

class LessonRepositories
{


    public function store($course,$request,$video){

        if ($request->periority == null) {
            $lesson = Lesson::all()->max('periority');
            $request->periority = $lesson += 1;
        }
        Lesson::query()->create([

            'title'=>$request->title,
            'slug' => $request->slug ? Str::slug($request->slug) : Str::slug($request->title),
            'time' => $request->time,
            'periority' => $request->periority,
            'season_id' => $request->season_id,
            'user_id' => auth()->user()->id,
            'media_id' => $video,
            'free' => $request->free,
            'course_id' => $course,
            'body' => $request->body,
            'confirmation_status' => 'pending',
            'lock' => 'unlock',
        ]);




    }



}
