<?php

namespace mswco\Courses\Repositories;

use Illuminate\Support\Str;
use mswco\Courses\Models\Course;

class CoursesRepositories
{
            public function create($request,$image){
                Course::create(

                    [
                        'teacher_id' => $request->teacher_id,
                        'category_id' => $request->category_id,
                        'title' => $request->title,
                        'attachment' =>  $image,
                        'slug' => Str::slug($request->slug),
                        'priority' => $request->priority,
                        'price' => $request->price,
                        'percent' => $request->percent,
                        'type' => $request->type,
                        'status' => $request->status,
                        'body' => $request->body
                    ]

                );





            }

                public function paginate(){
                $courses = Course::paginate();
                return $courses;
                }

            public function get($id){
                return Course::find($id);
            }



            public function update($request,$courses,$image){
                $courses::query()->update(
                   [ 'teacher_id' => $request->teacher_id,
                        'category_id' => $request->category_id,
                        'title' => $request->title,
                        'attachment' =>  $image,
                        'slug' => Str::slug($request->slug),
                        'priority' => $request->priority,
                        'price' => $request->price,
                        'percent' => $request->percent,
                        'type' => $request->type,
                        'status' => $request->status,
                        'body' => $request->body
                ]);
            }


            public function Confirm($course){
            $course::query()->update(['confirm'=>'accepted']);
            }


        public function Reject($course){
                $course::query()->update(['confirm'=>'rejected']);
        }
    public function Lock($course){
        $course::query()->update(['status'=>'lock']);
    }





}
