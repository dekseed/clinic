<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use Session;

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

    public function login(Request $request)

    {

        $input = $request->all();

        // dd($input);
        $this->validate($request, [

            'val_email' => 'required|email',
            'val_password' => 'required',

        ]);

        $remember = $request->remember;



        // $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'first_name';

        if($remember == '1'){
            if(auth()->attempt(['email' => $input['val_email'], 'password' => $input['val_password']], true))
            {
                $request->session()->regenerate();

                if(auth()->user()->is_admin == 1){
                    // Session::flash('success');
                    return redirect()->route('manage.dashboard');
                    // return response()->json(['success' => 'success']);

                }else{
                    // Session::flash('success');
                    return redirect()->route('home');
                    // return response()->json(['success' => 'success']);
                }

            }else{
                // Session::flash('error');
                // return redirect()->route('login')

                //     ->with('error','อีเมล์ หรือ รหัสผ่านไม่ถูกต้อง!');
                return redirect()->route('login')->with('error','อีเมล์ หรือ รหัสผ่านไม่ถูกต้อง!');

            }
        }else{
            if(auth()->attempt(['email' => $input['val_email'], 'password' => $input['val_password']]))
            {

                $request->session()->regenerate();

                if(auth()->user()->is_admin == 1){
                    return redirect()->route('manage.dashboard');
                    dd('admin');
                    // Session::flash('success');
                    // return redirect()->back();
                    return response()->json(['success' => 'success']);
                }else{
                    return redirect()->route('home');
                    dd('user');
                    // Session::flash('success');
                    // return redirect()->back();
                    return response()->json(['success' => 'success']);
                }

            }else{
                // dd('error');
                // Session::flash('error');
                return redirect()->route('login')->with('error','error');
                // return response()->json(['error' => 'error']);

            }
        }
    }
}
