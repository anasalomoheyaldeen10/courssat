<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MainCategory;
use App\Traits;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    use GeneralTrait;
    public function index($id)
    {
        $categories = Category::where('main_category_id',$id)->select('id','name','logo')->get();
        return $this->apiResponse($categories);
    }
}
