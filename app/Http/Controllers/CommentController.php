<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Gate;
class CommentController extends Controller
{
    public function create(){
          $validator=validator(request()->all(),[
            'article_id' => 'required',
            'content' => 'required',

          ]);
          if($validator->fails()){
            return back()->withErrors($validator);
          }
          $comment=new Comment();
          $comment->article_id=request()->article_id;
          $comment->content=request()->content;
          $comment->user_id=auth()->user()->id;
          $comment->save();
          return back();
    }

    public function delete($id){
        $comment=Comment::find($id);
        if(Gate::allows('comment-delete',$comment)){
            $comment->delete();
            return back();
        }else{
            return back()->with('error','Unauthorize');
        }

    }
}
