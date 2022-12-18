<?php

namespace mswco\Courses\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use mswco\Courses\Http\Request\LessonStoreRequest;
use mswco\Courses\Models\Course;
use mswco\Courses\Models\Lesson;
use mswco\Courses\Repositories\LessonRepositories;
use mswco\Courses\Repositories\SeasonRepositories;
use mswco\Media\Services\MediaService;

class LessonsController extends Controller
{

    public $lessonRepositories = '';

    public function __construct(LessonRepositories $lessonRepositories)
    {
        $this->lessonRepositories = $lessonRepositories;
    }

    public function create($id)
    {
    $seasons = resolve(SeasonRepositories::class)->allSeasons($id);
    $course = Course::find($id);

    return view('Courses::Lesson.lesson',compact('seasons','course'));
    }

    public function store($course,LessonStoreRequest $lessonStoreRequest){
        $video = MediaService::upload($lessonStoreRequest->file('lesson_file'));
        $this->lessonRepositories->store($course,$lessonStoreRequest,$video);
        return redirect()->back()->with('status','lesson.create');
    }



}
