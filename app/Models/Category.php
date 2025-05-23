<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MainCategory;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['name','logo','main_category_id'];

    public function maincourse()
    {
       return $this->belongsTo(MainCategory::class);
    }
    public function courses()
    {
        return $this->hasMany(Course::class);
    }

}
