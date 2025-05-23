<?php

namespace App\Http\Controllers;

use App\Models\CourseReview;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\GeneralTrait;
class ReviewController extends Controller
{
    use GeneralTrait;
    public function addreview($id)
    {
          $userId=Auth::user()->id;
        $Review= new CourseReview();
        $Review->rating=request('rating');
        $Review->description=request('description');
        $Review->user_id=$userId;
        $Review->course_id=$id;
        $Review->save();
        return $this->apiResponse("شكرا لك تم تقييم الكورس بنجاح " );
    }
    public function reviews($id)
    {
        $reviews=CourseReview::where('course_id',$id)->with(['user:id,name,photo'])->get();
        return $this->apiResponse($reviews);
    }


}
