<?php

namespace mswco\User\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

public function showLoginForm()
{
    return view('User::auth.login');
}

protected function credentials(Request $request)
{
    $username = $request->get($this->username());

    if(preg_match("/^9[0-9]{9}$/", $username)) {
        $field = "phone_number";
        return [
            $field => $username,
            'password' => $request->password,
        ];
    }elseif(preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$username))
    {
        $field = "email";

        return [
            $field => $username,
            'password' => $request->password,
        ];
    }else{
       die();
    }
}


}
