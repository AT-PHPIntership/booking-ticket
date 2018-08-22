<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\User\RegisterUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends ApiController
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user();
        return $this->showOne($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request)
    {
        if (Auth::check()) {
            $user = Auth::user();
            empty($request['full_name']) ?  '' : $user->full_name = $request['full_name'];
            empty($request['email']) ? '' : $user->email = $request['email'];
            empty($request['phone']) ? '' : $user->phone = $request['phone'];
            empty($request['address']) ? '' : $user->address = $request['address'];
            empty($request['password']) ? '' : $user->password = bcrypt($request['password']);
            $user->save();
            
            return $this->showOne($user);
        }
        return $this->errorResponse(config('define.login.unauthorised'), Response::HTTP_UNAUTHORIZED);
    }
}
