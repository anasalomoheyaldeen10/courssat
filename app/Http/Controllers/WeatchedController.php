<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Lesson;
use App\Models\Weatched;
use App\Models\CoursesSubscription;
use App\Traits\GeneralTrait;
use WeakMap;

class WeatchedController extends Controller
{
    use GeneralTrait;
   public function authweatched(Request $request)
{

    $userId=Auth::user()->id;
    $courseId=Lesson::where('id',$request->id)->select('course_id')->first();
     $lesson=Lesson::where('id', $request->id)->first();
          $lesson->views++ ;
          $lesson->save();
    $x=CoursesSubscription::where('course_id',$request->id)->where('user_id',$userId)->get();
    if($x->isEmpty()){

        return Response()->json('increase view');
    }
    else{
        try{
        Weatched::create(['lesson_id'=> $request->id,
                                    'user_id'=>$userId ,
                                    'weatched'=> 1,   ]); }
                                    catch(\Exception $e){
                                        return Response()->json("ok");
                                    }
    }
}
public function weatched(Request $request)
{
$lesson=Lesson::where('id', $request->id)->first();
          $lesson->views++ ;
          $lesson->save();
          return $this->apiResponse('increase view');

}
public function complete(Request $request){
    $userId=Auth::user()->id;
   $watchedLessons = Weatched::where('user_id', $userId)
                        ->where('weatched', 1)
                        ->whereIn('lesson_id', function ($query) use ($request) {
                            $query->select('id')
                                  ->from('lessons')
                                  ->where('course_id', $request->id);
                        })->count();
     $countLesson=Lesson::where('course_id', $request->id)->count();

                        return $this->apiResponse(round(($watchedLessons*100)/$countLesson));

}
}
