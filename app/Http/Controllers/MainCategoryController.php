<?php

namespace App\Http\Controllers;

use App\Models\MainCategory;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;


class MainCategoryController extends Controller
{
    use GeneralTrait;
    public function index()
    {
           $mainCategory=MainCategory::all()->select(['id','name','logo']);
        return $this->apiResponse($mainCategory);
    }
}
