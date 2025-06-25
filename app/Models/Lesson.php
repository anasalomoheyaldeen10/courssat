<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Lesson extends Model
{
    use HasFactory;
    protected $guarded=[];
    public function comments()
    {
        $this->hasMany(Comment::class);
    }
    public function course()
    {
        $this->belongsTo(Course::class);
    }
    public function weatched()
    {
        $this->hasMany(Weatched::class);
    }

}
