<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CoursesSubscription;
use App\Models\FavouriteCourse;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    use GeneralTrait;
    public function index($id)
    {
         $categoryname=Category::where('id',$id)->select('name')->get();
        $courses = Course::where('category_id',$id)->select('id','auther_name','number_lesson','photo','duration_hours',
        'duration_minutes','duration_seconds','laungue','category_id')->withAvg('courseReviews', 'rating')->orderBy('created_at', 'desc')
       ->get();
       $data=['اسم الصنف'=> $categoryname ,'courses'=> $courses];
        return $this->apiResponse($data);
    }



    public function last($id)
    {
         $categoryname=Category::where('id',$id)->select('name')->get();
        $courses = Course::where('category_id',$id)->select('id','auther_name','number_lesson','duration_hours',
        'duration_minutes','duration_seconds','laungue','category_id')->withAvg('courseReviews', 'rating')->orderBy('created_at', 'asc')->get();
        $data=['اسم الصنف'=> $categoryname ,'courses'=> $courses];
        return $this->apiResponse($data);
    }


    // there you should add top rating courses

    public function topRating($id){
         $categoryname=Category::where('id',$id)->select('name')->get();
    $courses = Course::where('category_id', $id)
    ->select('id','auther_name','number_lesson','duration_hours',
        'duration_minutes','duration_seconds','laungue','category_id')
    ->withAvg('courseReviews', 'rating')
    ->orderBy('course_reviews_avg_rating', 'desc')  // ترتيب حسب متوسط التقييم الأعلى
    ->get();

 $data=['اسم الصنف'=> $categoryname ,'courses'=> $courses];
        return $this->apiResponse($data);
     }

    public function mycourse()
    {
       $id=Auth::user()->id;
       $user=User::find($id);
       $data=$user->coursesSubscription()->pluck('course_id');
       $courses = Course::whereIn('id', $data)->get();
       return $this->apiResponse($courses);
    }

    public function myfavourite()
    {
        $id=Auth::user()->id;
         $user=User::find($id);
       $data=$user->favouriteCourses()->pluck('course_id');
       $courses = Course::whereIn('id', $data)->withavg('courseReviews','rating')->get();
       return response()->json($courses);
    }
  public function addcourseSubs(Request $request)
  {
    $id=Auth::user()->id;
    $data =CoursesSubscription::create([
        'user_id'=>$id,
        'course_id'=>request('course_id')

    ]);
     return $this->apiResponse('تم الاشتراك بنجاح ');
  }

public function addfavorite()
{
     $id=Auth::user()->id;
    $data =FavouriteCourse::create([
        'user_id'=>$id,
        'course_id'=>request('course_id')

    ]);
     return $this->apiResponse('تمت الإضافة إلى المفضلة بنجاح ');
}

}
