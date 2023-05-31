<?php

namespace App\Http\Controllers\Secureadmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Cards;
use App\Models\Orders;
use Exception;
use Validator;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function __construct()
    {
         $this->middleware('auth'); 
    }

    public function dashboard(Request $request){ 
         $userCounts = User::where('user_role',2)->where('is_deleted',0)->count('id');
         $cardsCounts = Cards::count('id');
         $ordersCounts = Orders::count('id');
         //echo $cardsCounts ; die;
         return view('Admin.dashboard.dashboard', compact('userCounts', 'cardsCounts', 'ordersCounts'));
    }



    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();   
        $request->session()->flush(); 
        return redirect('admin/');
    }




}
