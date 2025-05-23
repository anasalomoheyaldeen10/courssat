<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable=['auther_name','number_lesson','duration_hours',
                         'duration_minutes','duration_seconds',
                        'laungue','url','description','category_id'];

                        public function category(){
                    return $this->belongsTo(Category::class);
                        }


                        public function favouriteCourses()
                        {
                             $this->hasMany(FavouriteCourse::class);
                        }
                        public function coursesSubscription()
                        {
                           return  $this->hasMany(CoursesSubscription::class);
                        }
                        public function courseReviews()
{
                            return  $this->hasMany(CourseReview::class);
}
public function lessons(){
    return $this->hasMany(Lesson::class);
}

}


