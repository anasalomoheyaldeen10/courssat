<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Course;
use App\Models\CoursesSubscription;
use App\Models\FavouriteCourse;
use App\Models\Lesson;
use App\Models\User;
use App\Models\Weatched;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use GuzzleHttp\Psr7\Response;
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
    $userId = Auth::user()->id;
    $user = User::find($userId);
    $courseIds = $user->coursesSubscription()->pluck('course_id');

    $courses = Course::whereIn('id', $courseIds)->get();

    foreach ($courses as $course) {
        // جلب الدروس التابعة للكورس
        $lessonIds = Lesson::where('course_id', $course->id)->pluck('id');

        // إجمالي عدد الدروس
        $course->totalLessons =$course->number_lesson   ;

        // عدد الدروس المشاهدة للمستخدم
        $course->watched = Weatched::where('user_id', $userId)
            ->where('weatched', 1)
            ->whereIn('lesson_id', $lessonIds)
            ->count();

        // عدد الدروس غير المشاهدة
        $course->unwatched = $course->totalLessons - $course->watched;

        // نسبة الإنجاز
        $course->progress = $course->totalLessons > 0
            ? round(($course->watched / $course->totalLessons) * 100, 2)
            : 0;
    }

    return $this->apiResponse($courses);
}



    // }



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
public function weatched(Request $request)
{

    $userId=Auth::user()->id;
    $x=CoursesSubscription::where('course_id',$request->id)->where('user_id',$userId)->get();
    if($x->isEmpty()){
          $lesson=Lesson::where('id', $request->id)->first();
          $lesson->views++ ;
          $lesson->save();
        return Response()->json('increased view');
    }
    else{
        $weatched1=CoursesSubscription::where('course_id',$request->id)->where('user_id',$userId)->first();
        $weatched1->weatched++;
        $weatched1->save();
       $lesson=Lesson::where('id', $request->id)->first();
          $lesson->views++ ;
          $lesson->save();
    }
    return Response()->json("increase views and weatched ");

}

}
