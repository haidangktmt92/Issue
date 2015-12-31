<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use DB;
use Validator;
use App\User;

class LoginController extends Controller
{
    //
    public function getEmail()
    {
        return view('auth.signinEmail');
    }
    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postEmail(Request $request)
    {
        $this->validate($request, ['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'), function (Message $message) {
            $message->subject($this->getEmailSubject());
        });

        switch ($response) {
            case Password::RESET_LINK_SENT:
                return redirect()->back()->with('status', trans($response));

            case Password::INVALID_USER:
                return redirect()->back()->withErrors(['email' => trans($response)]);
        }
    }
    /**
     * Get the e-mail subject line to be used for the reset link email.
     *
     * @return string
     */
    protected function getEmailSubject()
    {
        return property_exists($this, 'subject') ? $this->subject : 'Your sign in Link';
    }
    
    public function getLogin($token = null)
    {
        if (is_null($token)) {
            throw new NotFoundHttpException;
        }

        $user = DB::table('password_resets')->where('token', $token)->first();
        if (is_null($user)) {
            echo 'Token do not exist';
        }else {
            $d = (time() - strtotime($user->created_at))/60;
            if ($d>1) {
                echo 'Token is not a valid date';
                DB::table('password_resets')->where('token', $token)->delete();
            }else {
                $userDB = User::where('email', $user->email)->first();
                DB::table('password_resets')->where('token', $token)->delete();
                Auth::login($userDB);
                return redirect('/');
            }   
        }   
    }

}
