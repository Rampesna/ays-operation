<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FailedLogin;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

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

    protected function credentials(Request $request)
    {
        $credentials = $request->only($this->username(), 'password');
        $credentials['suspend'] = 0;
        return $credentials;
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            FailedLogin::where('user_id', User::where('email', $request->email)->first()->id)->where('cancel', 0)->update(['cancel' => 1]);
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);


        return $this->sendFailedLoginResponse($request);
    }

    protected function sendFailedLoginResponse(Request $request)
    {
//        $errors = [$this->username() => trans('auth.failed')];

        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {
            $errors = ['error' => 'Böyle Bir Kullanıcı Sistemde Kayıtlı Değil!'];
        } else if ($user->suspend == 1) {
            $errors = ['error' => 'Hesabınız Engellenmiş! Lütfen Yöneticiniz İle İletişime Geçin.'];
        } else if (!Hash::check($request->password, $user->password)) {

            $failedLogin = new FailedLogin;
            $failedLogin->user_id = $user->id;
            $failedLogin->date = date('Y-m-d H:i:s');
            $failedLogin->ip = $request->ip();
            $failedLogin->user_agent = serialize($request->userAgent());
            $failedLogin->cookie = serialize($request->cookie());
            $failedLogin->save();

            $failedLoginControl = FailedLogin::where('user_id', $user->id)->where('cancel', 0)->count();

            if ($failedLoginControl >= 3) {
                $errors = ['error' => '3 Defa Hatalı Giriş Yaptığınız İçin Hesabınız Engellendi! Lütfen Yöneticiniz İle İletişime Geçin.'];
                $user->suspend = 1;
                $user->save();
            } else {
                $errors = ['error' => 'Kullanıcı Adı ve Şifreniz Uyuşmuyor! ' . (3 - $failedLoginControl) . ' Defa Daha Hatalı Giriş Yaparsanız Hesabınız Engellenecektir!'];
            }
        }

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors($errors);
    }

    public function logout(Request $request)
    {

        $login = 'login';

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? new Response('', 204)
            : redirect()->route($login);
    }
}
