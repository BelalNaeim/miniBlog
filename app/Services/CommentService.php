<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Support\Facades\DB;

class CommentService{

    public function storeComment($data){
        DB::beginTransaction();
        try{
            $comment = Comment::create($data);
            DB::commit();
            return [
                'key'  => 'success',
                'msg'  => __( 'auth.post_created' ),
                'comment' => $comment,
            ];
        }catch(\Exception $e){
            DB::rollBack();
            return ['status' => 'fail', 'msg' => __('apis.some_thing_error'),];
        }
    }
}
