<?php

namespace App\Http\Controllers\Api;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Services\CommentService;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\CommentResource;
use App\Http\Requests\Api\Comment\StoreRequest;

class CommentController extends Controller
{
    use ResponseTrait;

    public function index(){
        $comments = Comment::with('user','post')->select('id', 'comment')->paginate(10);
        return $this->response('success', __('apis.comment_list'), CommentResource::collection($comments));
    }
    public function store(StoreRequest $request){
        $data = $request->validated();
        $commentData = (new CommentService())->storeComment($data);
		return $this->response('success', __('apis.comment_create_successfully'), CommentResource::make($commentData['comment']));
    }

    public function show(Comment $comment){
        return $this->response('success', __('apis.comment_show'), CommentResource::make($comment));
    }
}
