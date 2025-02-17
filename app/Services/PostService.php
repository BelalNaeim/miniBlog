<?php
namespace App\Services;

use App\Models\Post;
use Illuminate\Support\Facades\DB;

class PostService{

    public function storePost($data){

        DB::beginTransaction();
        try{
            $post = Post::create($data);
            return [
                'key'  => 'success',
                'msg'  => __( 'auth.post_created' ),
                'post' => $post,
            ];
        }catch(\Exception $e){
            DB::rollBack();
            return ['status' => 'fail', 'msg' => __('apis.some_thing_error'),];
        }

    }

}
