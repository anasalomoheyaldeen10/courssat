<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Traits;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    use GeneralTrait ;
    public function index($id)
    {

        $course=Course::where('id',$id)->select('id','name','auther_name','number_lesson','duration_hours',
          'duration_minutes','duration_seconds','laungue','url', 'description','category_id')
          ->withAvg('courseReviews', 'rating')->withCount('courseReviews')->with(['category:id,name'])->get();

        $lessons = Lesson::where('course_id',$id)->select('id','name','number','duration_hours','duration_minutes',
        'duration_seconds','course_id')->orderby('number','asc')->paginate(20);
        $array=[
            'course' =>$course,

           'lessons'=> $lessons];
        return $this->apiResponse($array);
    }
    public function show($id)
    {

        $lesson=Lesson::find($id);
         if (!$lesson) {
        return $this->apiResponse('الدرس غير موجود', 404);
    }
       $lesson->increment('views');
        return $this->apiResponse($lesson);
    }



}
