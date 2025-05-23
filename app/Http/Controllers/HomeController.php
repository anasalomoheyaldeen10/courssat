<?php

namespace App\Http\Controllers;
use app\Traits;
use App\Models\Course;
use App\Models\CourseReview;
use App\Models\Lesson;
use App\Models\MainCategory;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use GeneralTrait;

    public function index()
    {
        $mainCourse=MainCategory::take(8)->get();
        $courses=Course::take(8)->withAvg('courseReviews', 'rating')->get();
        $countCourse=Course::count();
        $countUser=User::count();
        $countLesson=Lesson::count();
        $sumMinutes=Lesson::sum('duration_minutes');
        $sumHoure=Lesson::sum('duration_hours');
        $sum=$sumHoure+($sumMinutes/60);
        $data=[
            'عدد الكورسات '=>$countCourse,
            'عدد الطلاب '=>$countUser,
            'عدد الدروس '=>$countLesson,
            'مجموع عدد الساعات'=>$sum,
            'mainCourse'=>$mainCourse,
            'courses'=>$courses

        ];
        return $this->apiResponse($data);
    }
    public function search($data)
    {
        return $this->apiResponse(search($data));
    }
    //optimize this function
    public function reviews($id)
    {
        $reviews=CourseReview::where('course_id',$id)->get();
        return $this->apiResponse($reviews);
    }

    public function more()
    {
         $mainCourse = MainCategory::all();
         return $this->apiResponse($mainCourse);
    }

    public function auther($name)
    {
         $courses=Course::where('auther_name', $name)->get();
         return $this->apiResponse($courses);
    }


}
