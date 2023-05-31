<?php

namespace App\Http\Controllers\Secureadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       /* if (Auth::guard('admin')->check()) {
            return redirect()->route("admin.dashboard");
        }*/
    }

    protected $redirectTo = 'admin/dashboard';
    protected function guard() {
        return Auth::guard("admin");
    }


     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        if (Auth::check()) {
            return redirect()->route("admin.dashboard");
        }
        if ($request->isMethod('post')) {
            $validator = Validator::make($request->all(), ['email' => 'required|email', 'password' => 'required', ]);
            if ($validator->fails()) {
                $message = $validator->errors($request[0])->first();
                return redirect('/admin')->with('status', $message);
            }
            Auth::guard('admin')->logout();
            $request->session()->invalidate();
            $request->session()->flush();
            $credentials = $request->only('email', 'password');
            $credentials['user_role'] = 1;
            $user = User::where('email', $request->email)->where('user_role', 1)->first();
            $remember = $request->input('remember') ? true : false;
            if (!empty($user)) {
                if (Hash::check($request->password, $user->password)) {
                    if ($user->status == 1) {
                        Auth::login($user, true);
                        return redirect('admin/dashboard');
                    } else {
                        $message = "Your account is not activated, Please activate your account.";
                        return redirect('/admin')->with('status', $message);
                    }
                } else {
                    $message = "Email or password is incorrect.";
                    return redirect('/admin')->with('status', $message);
                }
            } else {
                $message = "Email or password is incorrect.";
                return redirect('/admin')->with('status', $message);
            }
        }
        return view('Admin.signup.login', []);
    }

     public function login()
    {
        return view('Admin.signup.login',[]);
    }

}
