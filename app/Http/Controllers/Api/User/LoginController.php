<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use DB;
use Carbon\Carbon;
use App\Http\Controllers\Api\ApiController;

class LoginController extends ApiController
{
    // use ApiController;

    /**
     * Login as user
     *
     * @return json authentication code
     */
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $data['token'] =  $user->createToken('token')->accessToken;
            $data['user'] =  $user;
            return $this->successResponse($data, Response::HTTP_OK);
        }
        return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
    }

    /**
     * Logout user
     *
     * @return void
     */
    public function logout()
    {
        $user = Auth::user();
        $accessToken = $user->token();
        DB::table('oauth_refresh_tokens')
            ->where('access_token_id', $accessToken->id)
            ->update([
                'revoked' => true
            ]);
        $accessToken->revoke();
        $user->last_login_at = Carbon::now();
        $user->save();

        return $this->successResponse(null, Response::HTTP_NO_CONTENT);
    }
}
