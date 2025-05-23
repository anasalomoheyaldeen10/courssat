<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class User extends Model
{
    use HasFactory;
    use HasApiTokens;
    protected $guarded=[];

    public function favouriteCourses()
    {
        return  $this->hasMany(FavouriteCourse::class);
    }
    public function coursesSubscription()
                        {
                          return    $this->hasMany(CoursesSubscription::class);
                         }
public function courseReiews()
{
   return  $this->hasMany(CourseReview::class);
}

}
