<?php


namespace mswco\Courses\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use mswco\Courses\Http\Request\SeasonsRequest;
use mswco\Courses\Models\Season;
use mswco\Courses\Repositories\SeasonRepositories;

class SeasonsController extends Controller
{

    public function store($id,SeasonsRequest $seasonsRequest)
    {
    $r = resolve(SeasonRepositories::class)->create($seasonsRequest,$id);

        return redirect()->back()->with(['status','season.created']);


    }
    public function edit(Season $season){
        return view('Courses::Seasons.seasons-edit',compact('season'));
    }

    public function update(Request $request,$id){
    $update = resolve(SeasonRepositories::class)->update($id,$request);
    }

    public function destroy($id){
        $delete = resolve(SeasonRepositories::class)->delete($id);
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);

    }
    public function accept($id){
        $find = Season::find($id);
        $find->update(['confirmation_status'=>'accepted']);
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }

    public function reject($id){
        $find = Season::find($id);
        $find->update(['confirmation_status'=>'rejected']);
        return response()->json(['message'=>'با موفقیت انجام شد'],Response::HTTP_OK);
    }
}
