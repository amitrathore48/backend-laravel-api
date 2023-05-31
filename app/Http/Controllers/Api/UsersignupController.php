<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;
use Validator;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersignupController extends Controller
{
     

     /** 
     * Register api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function registration(Request $request)
    {
         try{  
            $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name' => 'required',
                'email' => 'required|email',
                'password' => 'required',
                'gender' => 'required',
            ]);
            
            if ($validator->fails()) {
                return response()->json(['success' => false, 'result' => null, 'error' => $validator->errors()->first()], 402);
            }
                $SaveUserData = array(
                        'first_name' => $request->first_name,                 
                        'last_name' => $request->last_name, 
                        'name' => $request->first_name . ' ' . $request->last_name ,
                        'mobile' => $request->mobile, 
                        'email' => $request->email, 
                        'password' => Hash::make($request->password), 
                        'gender' => $request->gender, 
                        'user_role' => 2,
                        'city' =>$request->city,
                        'address' =>$request->address,
                        'confirm_status' => 1,
                        'status' => 1,                   
                    );           
                    $userData = User::create($SaveUserData);
                    if(Auth::attempt(['email' => $request->email, 'password' =>$request->password, 'confirm_status' =>1, 'user_role' => 2])) {
                    $user = Auth::user();
                    $userData['auth_token'] =  $user->createToken('MyApp')->accessToken;
                    return response()->json(['success' => true, 'result' => $userData, 'error' => null], 200);
                    } else {
                    return response()->json(['success' => false, 'result' => "somthing went worng!", 'error' => null], 402);
                    }     
            } catch (Exception $e) {
                    return response()->json(['success' => false, 'result' => null, 'error' => $e->getMessage()], 402);
            } 
    }



    /** 
     * login api 
     * 
     * @return \Illuminate\Http\Response 
     */
    public function login(Request $request)
    {
       try {
        $validator = Validator::make($request->all(), [
        	'email' => 'required',
            'password' => 'required',            
        ]);
        if ($validator->fails()) {
            return response()->json(['success' => false, 'result' => null, 'error' => $validator->errors()->first()], 402);
        }
        if(Auth::attempt(['email' => $request->email, 'password' =>$request->password, 'confirm_status' =>1, 'user_role' => 2])) {  // For host login code
            $userData = Auth::user();
            DB::table('oauth_access_tokens')->where('user_id', Auth::user()->id)->delete(); 
            $data['auth_token'] =  $userData->createToken('MyApp')->accessToken;
            $data['first_name'] =  $userData->first_name;
            $data['last_name'] =  $userData->last_name;
            $data['name'] =  $userData->first_name . ' '. $userData->last_name;
            $data['mobile'] = $userData->mobile;
            $data['email'] =$userData->email;
           
            return response()->json(['success' => true, 'result' => $data, 'error' => null], 200);
        }  else {
            return response()->json(['success' => false, 'result' => null, 'error' => 'Unauthorised'], 401);
        }

        }catch (Exception $e) {
            return response()->json(['success' => false, 'result' => null, 'error' => $e->getMessage()], 401);
        }
    }
}
