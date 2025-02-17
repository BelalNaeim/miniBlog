<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\AuthService;
use App\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Resources\Api\UserResource;
use App\Http\Requests\Api\AuthUser\LoginRequest;
use App\Http\Requests\Api\AuthUser\RegisterRequest;

class AuthController extends Controller
{
    use ResponseTrait;
    public function register(RegisterRequest $request){
        $data = $request->validated();
        (new AuthService())->register($data);
        return $this->response($data['key'], $data['msg'], $data['user'] == [] ? [] : UserResource::make($data['user']));

    }

    public function login(LoginRequest $request)
	{
		$data = (new AuthService())->login($request->validated());

		if ($data['key'] == 'fail') {
			return $this->failMsg($data['msg']);
		}

		$token        = $data['user']->login();

		return $this->response('success', __('apis.signed'), UserResource::make($data['user'])->setToken($token)->setType($point_member));
	}


    public function logout(){
        auth()->user()->logout();
        return $this->response('success', __('auth.logout'));
    }

}
