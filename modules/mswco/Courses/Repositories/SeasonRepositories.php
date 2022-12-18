<?php

namespace mswco\Courses\Repositories;

use mswco\Courses\Models\Season;

class SeasonRepositories
{
public function create($request,$id)
{


    if ($request->number == null) {
        $seasons = Season::all()->max('number');
        $request->number = $seasons += 1;
    }
    Season::create([
            'course_id' => $id,
            'user_id' => auth()->user()->id,
            'name' => $request->name,
            'number' => $request->number,
        ]
    );
}
    public function update($id,$request){
        Season::query()->find($id)->update(
          [
           'name' => $request->name,
           'number' => $request->number,
          ]
        );


}

public function delete($id){
    Season::query()->find($id)->delete();
}



public function allSeasons($id){
    return Season::query()->where('course_id',$id)->where('confirmation_status','accepted')->get();
}


}
