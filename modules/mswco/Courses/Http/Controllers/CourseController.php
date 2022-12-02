<?php

namespace mswco\Courses\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use mswco\Category\Repositories\CategoryRepository;
use mswco\Courses\Http\Request\CoursesStoreRequest;
use mswco\Courses\Models\Course;
use mswco\Courses\Repositories\CoursesRepositories;
use mswco\Media\Models\Media;
use mswco\Media\Services\ImageUploadService;
use mswco\Media\Services\MediaService;
use mswco\User\Repositories\UserRepo;

class CourseController extends Controller
{
    public function index(CoursesRepositories $coursesRepositories)
    {
    $courses = $coursesRepositories->paginate();
    return view('Courses::index',compact('courses'));
    }

    public function create()
    {
            $teachers = resolve(UserRepo::class)->getTeacher();
            $Category = resolve(CategoryRepository::class)->all();
            return view('Courses::create',compact('teachers','Category'));
    }

    public function store(CoursesStoreRequest $request)
    {
      $image =   MediaService::upload($request->file('attachment'));
      $repo = resolve(CoursesRepositories::class)->create($request,$image);
      return redirect()->route('courses.index');
    }

    public function show($id)
    {
    }

    public function edit(Course $course)
    {
        $teachers = resolve(UserRepo::class)->getTeacher();
        $Category = resolve(CategoryRepository::class)->all();
        $find = resolve(CoursesRepositories::class)->get($course->id);
        return view('Courses::edit',compact('teachers','Category','find'));
    }

    public function update(Request $request,Course $course)
    {
        $request->validate([
            'title' => ['required','min:3','max:199'],
            'slug' => ['required','min:3','max:199'],
            'priority' => ['nullable','numeric'],
            'price' => ['required','numeric','min:3','max:1000000'],
            'percent' => ['required','numeric','min:3','max:100'],
            'teacher_id' => ['required','exists:users,id'],
            'type' => ['required'],
            'status' => ['required'],
            'category_id' => ['required'],
            'attachment' => ['image'],
            'body' => ['required']
        ]);
        if (isset($request->attachment)) {
            ImageUploadService::delete($course->attachment);
           $image =  ImageUploadService::upload($request->file('attachment'));
            resolve(CoursesRepositories::class)->update($request,$course,$image);
        }else{
            resolve(CoursesRepositories::class)->update($request,$course,$image);
        }
        return redirect()->to(route('courses.index'))->with('status','update');
    }

    public function destroy(Course $course)
    {
    $courseitem = $course->attachment;
    ImageUploadService::delete($courseitem);
    $course->delete();
    }
    public function accept(Course $course){

        $course = resolve(CoursesRepositories::class)->Confirm($course);
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }


    public function reject(Course $course){

    $course = resolve(CoursesRepositories::class)->Reject($course);
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);

        {  }

}
public function lock(Course $course){
        $course = resolve(CoursesRepositories::class)->Lock($course);
    return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);

}

}
