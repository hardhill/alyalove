<?php


namespace App\Http\Controllers\Api;
use App\Http\Requests\RequestComment;
use App\Jobs\AddNewComment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;


class CommentController extends Controller
{
    public function store(RequestComment $request){

        AddNewComment::dispatch($request['subject'], $request['body'],$request['article_id']);

        return response()->json([
           'status'=>'success',
        ],201);
    }
}
