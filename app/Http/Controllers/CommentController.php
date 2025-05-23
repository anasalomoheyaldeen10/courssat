<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Traits;
use App\Traits\GeneralTrait;

class CommentController extends Controller
{
    use GeneralTrait;
    public function index($id){
        $comments=Comment::where('lesson_id',$id)->with('user:id,name,photo')->get();
        return $this->apiResponse($comments);

    }

    public function addComment($id,Request $request)
    {
        $idUser=Auth::user()->id;
        $comment=new Comment();
        $comment->user_id=$idUser;
        $comment->lesson_id=$id ;
        $comment->desccription= $request->desccription;
        $comment->save();
        return $this->apiResponse('تم إضافة العليق بنجاح');

    }


}
