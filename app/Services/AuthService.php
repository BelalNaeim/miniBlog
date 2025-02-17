<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\Api\UserResource;

class AuthService
{
    public function register ( $request )
    {
        DB::beginTransaction();
        try {
            $user = User::create( $request );
            DB::commit();
            return [
                'key'  => 'success',
                'msg'  => __( 'auth.registered' ),
                'user' => new UserResource( $user->refresh() )
            ];
        } catch (\Exception $e) {
            DB::rollback();
            return [
                'key'  => 'fail',
                'msg'  => __( 'apis.some_thing_error' ),
                'user' => []
            ];
        }
    }

    public function login ( $request )
    {
        $user = User::where( [
            'email'        => $request['email'],
        ] )->first();
        if ( !$user ) {
            return [
                'key'  => 'fail',
                'msg'  => __( 'auth.incorrect_key_or_phone' ),
                'user' => []
            ];
        }
        if ( !Hash::check( $request['password'], $user->password ) ) {
            return [
                'key'  => 'fail',
                'msg'  => __( 'auth.incorrect_pass' ),
                'user' => []
            ];
        }
        return [
            'key'  => 'success',
            'msg'  => __( 'auth.signed' ),
            'user' => $user
        ];
    }

    public function logout(){
        auth()->user()->logout();
        return $this->response('success', __('auth.logout'));
    }



}
