<?php

namespace App\Http\Controllers\Api\User;

use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Http\Controllers\Api\ApiController;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Password;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class ResetPasswordController extends ApiController
{
    use ResetsPasswords;
    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }
    /**
     * Reset the given user's password.
     *
     * @param \Illuminate\Contracts\Auth\CanResetPassword $user     user
     * @param string                                      $password new password
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function resetPassword($user, $password)
    {
        $user->password = Hash::make($password);
        $user->setRememberToken(str_random(60));
        $user->save();
        event(new PasswordReset($user));
        return $this->showOne($user, Response::HTTP_OK);
    }
    /**
     * Get the response for a successful password reset.
     *
     * @param string $response response lang
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetResponse($response)
    {
        $message = [
            'message' => trans($response)
        ];
        return $this->successResponse($message, Response::HTTP_OK);
    }
    /**
     * Get the response for a failed password reset.
     *
     * @param \Illuminate\Http\Request $request  request
     * @param string                   $response response lang
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    protected function sendResetFailedResponse(Request $request, $response)
    {
        $message = [
            'message' => trans($response),
            'request' => $request->all()
        ];
        return $this->errorResponse($message, Response::HTTP_NOT_FOUND);
    }
}
