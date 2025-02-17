<?php

namespace App\Http\Controllers\Api;

use App\Models\Post;
use App\Traits\ResponseTrait;
use Illuminate\Http\Request;
use App\Services\PostService;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Cache\Store;
use App\Http\Resources\Api\PostResource;
use App\Http\Requests\Api\Post\StoreRequest;

class PostController extends Controller
{
    use ResponseTrait;

    public function index(){
        $posts = Post::with('user')->select('id', 'title', 'description', 'created_at')->paginate(10);
        return $this->response('success', __('apis.post_list'), PostResource::collection($posts));
    }
    public function store(StoreRequest $request){
        $data = $request->validated();
        $postData = (new PostService())->storePost($data);
		return $this->response('success', __('apis.post_create_successfully'), PostResource::make($postData['post']));
    }

    public function show(Post $post){
        return $this->response('success', __('apis.post_show'), PostResource::make($post));
    }
}
