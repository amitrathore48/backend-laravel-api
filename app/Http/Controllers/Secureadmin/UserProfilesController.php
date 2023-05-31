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
use Redirect;
use DB;
use App\Helpers\Helper;

class UserProfilesController extends Controller
{
     public function __construct()
    {
         $this->middleware('auth'); 
    }

    public function users(Request $request){ 
         return view('Admin.users.index');
    }


    public function userHostAjaxList(Request $request){  
         try {  
            //die("checking");
                $limit=$request->jtPageSize;
                $offset=$request->jtStartIndex; 
                $order=isset($request->jtSorting)?$request->jtSorting:'id DESC';
                $orderBy = explode(" ", $order);  
                $userQuery = User::query();
                   if(isset($request->status) && $request->status!=''){
                            if(isset($request->is_company_id) && $request->is_company_id!=''){
                                   $userQuery->where(function ($query) use($request){
                                    $query->where('is_block',$request->status)
                                          ->where('is_deleted',0)
                                          ->where('is_verify',1)
                                          ->where('user_role',2);
                                });  
                            } else {
                                $userQuery->where(function ($query) use($request){
                                    $query->where('is_block',$request->status)
                                          ->where('is_deleted',0)
                                          ->where('is_verify',1)
                                          ->where('user_role',2);
                                }); 
                            }                            
                    } else if(isset($request->is_company_id) && $request->is_company_id!=''){
                                   $userQuery->where(function ($query) use($request){
                                    $query->where('is_deleted',0)
                                           ->where('is_verify',1)
                                          ->where('user_role',2);
                                });                              
                    } else {
                           $userQuery->where(function ($query){
                           $query->where('is_deleted',0)
                           ->where('is_verify',1)
                           ->where('user_role',2);
                       });
                    } 
                   if(isset($request->keyword) && $request->keyword!=''){
                     $userQuery->where(function ($query) use($request){
                          $query->orWhere( 'id', 'LIKE', '%'. $request->keyword .'%')
                              ->orWhere('card_no', 'LIKE', '%' . $request->keyword . '%')
                              ->orWhere('first_name', 'LIKE', '%' . $request->keyword . '%')
                              ->orWhere('email', 'LIKE', '%' . $request->keyword . '%');
                    });  
                   } 
                  $usersCountArray = $userQuery->get();
                  $users = $userQuery->offset($offset)->limit($limit)->orderBy($orderBy[0], $orderBy[1])->get()->toArray();
                  $UserCount = $usersCountArray->count(); 
        
                $sno=$offset;
                $user_data=array();
                foreach($users as $user){ 
                    $sno++;
                    $user['sno']=$sno; 
                    array_push($user_data,$user);
                }
                /*  
                echo "<pre>";
                 print_r($user_data);
                 echo "</pre>"; 
                */
                $data["Result"] = "OK";
                $data["Records"] = Helper::html_filterd_data($user_data);
                $data["TotalRecordCount"] = $UserCount;
                echo json_encode($data);
                die;   
            }catch (\Exception $e) { 
                return ['success'=> 0, 'message' => [$e->getMessage()]];
            }
    }



    public function uncompleteusers(Request $request){ 
         return view('Admin.uncompleteusers.index');
         
    }


    public function uncompleteusersAjaxList(Request $request){  
         try {  
            //die("checking");
                $limit=$request->jtPageSize;
                $offset=$request->jtStartIndex; 
                $order=isset($request->jtSorting)?$request->jtSorting:'id DESC';
                $orderBy = explode(" ", $order);  
                $userQuery = User::query();
                   if(isset($request->status) && $request->status!=''){
                            if(isset($request->is_company_id) && $request->is_company_id!=''){
                                   $userQuery->where(function ($query) use($request){
                                    $query->where('is_block',$request->status)
                                          ->where('is_deleted',0)
                                          ->where('is_verify',0)
                                          ->where('user_role',2);
                                });  
                            } else {
                                $userQuery->where(function ($query) use($request){
                                    $query->where('is_block',$request->status)
                                          ->where('is_deleted',0)
                                          ->where('is_verify',0)
                                          ->where('user_role',2);
                                }); 
                            }                            
                    } else if(isset($request->is_company_id) && $request->is_company_id!=''){
                                   $userQuery->where(function ($query) use($request){
                                    $query->where('is_deleted',0)
                                          ->where('is_verify',0)
                                          ->where('user_role',2);
                                });                              
                    } else {
                           $userQuery->where(function ($query){
                           $query->where('is_deleted',0)
                           ->where('is_verify',0)
                           ->where('user_role',2);
                       });
                    } 
                   if(isset($request->keyword) && $request->keyword!=''){
                     $userQuery->where(function ($query) use($request){
                          $query->orWhere( 'id', 'LIKE', '%'. $request->keyword .'%')
                              ->orWhere('card_no', 'LIKE', '%' . $request->keyword . '%')
                              ->orWhere('first_name', 'LIKE', '%' . $request->keyword . '%')
                              ->orWhere('email', 'LIKE', '%' . $request->keyword . '%');
                    });  
                   } 
                  $usersCountArray = $userQuery->get();
                  $users = $userQuery->offset($offset)->limit($limit)->orderBy($orderBy[0], $orderBy[1])->get()->toArray();
                  $UserCount = $usersCountArray->count(); 
        
                $sno=$offset;
                $user_data=array();
                foreach($users as $user){ 
                    $sno++;
                    $user['sno']=$sno; 
                    array_push($user_data,$user);
                }
                /*  
                echo "<pre>";
                 print_r($user_data);
                 echo "</pre>"; 
                */
                $data["Result"] = "OK";
                $data["Records"] = Helper::html_filterd_data($user_data);
                $data["TotalRecordCount"] = $UserCount;
                echo json_encode($data);
                die;   
            }catch (\Exception $e) { 
                return ['success'=> 0, 'message' => [$e->getMessage()]];
            }
    }


   public function cards(Request $request){ 
         return view('Admin.cards.index');
    }

    public function cardsAjaxList(Request $request){  
         try {  
          //  die("checking");
                $limit=$request->jtPageSize;
                $offset=$request->jtStartIndex; 
                $order=isset($request->jtSorting)?$request->jtSorting:'id DESC';
                $orderBy = explode(" ", $order);  
                $userQuery = Cards::query();
                   if(isset($request->status) && $request->status!=''){
                            if(isset($request->is_company_id) && $request->is_company_id!=''){
                                   $userQuery->where(function ($query) use($request){
                                    $query->where('status',$request->status);
                                });  
                            } else {
                                $userQuery->where(function ($query) use($request){
                                    $query->where('status',$request->status);
                                }); 
                            }                            
                    }  else {
                           $userQuery->where(function ($query){
                          // $query->where('is_deleted',0);
                       });
                    } 
                   if(isset($request->keyword) && $request->keyword!=''){
                     $userQuery->where(function ($query) use($request){
                          $query->orWhere( 'id', 'LIKE', '%'. $request->keyword .'%')
                              ->orWhere('card_no', 'LIKE', '%' . $request->keyword . '%')
                              ->orWhere('distributor_name', 'LIKE', '%' . $request->keyword . '%');
                    });  
                   } 
                  $usersCountArray = $userQuery->get();
                  $users = $userQuery->offset($offset)->limit($limit)->orderBy($orderBy[0], $orderBy[1])->get()->toArray();
                  $UserCount = $usersCountArray->count(); 
        
                $sno=$offset;
                $user_data=array();
                foreach($users as $user){ 
                    $sno++;
                    $user['sno']=$sno; 
                    array_push($user_data,$user);
                }
                  
              /*  echo "<pre>";
                 print_r($user_data);
                 echo "</pre>"; */
                
                $data["Result"] = "OK";
                $data["Records"] = Helper::html_filterd_data($user_data);
                $data["TotalRecordCount"] = $UserCount;
                echo json_encode($data);
                die;   
            }catch (\Exception $e) { 
                return ['success'=> 0, 'message' => [$e->getMessage()]];
            }
    }


    public function orders(Request $request){ 
         return view('Admin.orders.index');
    }


    public function ordersAjaxList(Request $request){  
         try {  
            //die("checking");
                $limit=$request->jtPageSize;
                $offset=$request->jtStartIndex; 
                $order=isset($request->jtSorting)?$request->jtSorting:'id DESC';
                $orderBy = explode(" ", $order);  
                $userQuery = Orders::query();
                   if(isset($request->status) && $request->status!=''){
                            if(isset($request->is_company_id) && $request->is_company_id!=''){
                                   $userQuery->where(function ($query) use($request){
                                    $query->where('status',$request->status);
                                });  
                            } else {
                                $userQuery->where(function ($query) use($request){
                                    $query->where('status',$request->status);
                                }); 
                            }                            
                    } else {
                           $userQuery->where(function ($query){
                           /*$query->where('is_deleted',0)
                           ->where('is_verify',1)
                           ->where('user_role',2);*/
                       });
                    } 
                   if(isset($request->keyword) && $request->keyword!=''){
                     $userQuery->where(function ($query) use($request){
                          $query->orWhere( 'id', 'LIKE', '%'. $request->keyword .'%')
                              ->orWhere('voucher_name', 'LIKE', '%' . $request->keyword . '%')
                              ->orWhere('registered_name', 'LIKE', '%' . $request->keyword . '%')
                              ->orWhere('registered_email', 'LIKE', '%' . $request->keyword . '%');
                    });  
                   } 
                  $usersCountArray = $userQuery->get();
                  $users = $userQuery->offset($offset)->limit($limit)->orderBy($orderBy[0], $orderBy[1])->get()->toArray();
                  $UserCount = $usersCountArray->count(); 
        
                $sno=$offset;
                $user_data=array();
                foreach($users as $user){ 
                    $sno++;
                    $user['sno']=$sno; 
                    array_push($user_data,$user);
                }
                /*  
                echo "<pre>";
                 print_r($user_data);
                 echo "</pre>"; 
                */
                $data["Result"] = "OK";
                $data["Records"] = Helper::html_filterd_data($user_data);
                $data["TotalRecordCount"] = $UserCount;
                echo json_encode($data);
                die;   
            }catch (\Exception $e) { 
                return ['success'=> 0, 'message' => [$e->getMessage()]];
            }
    }


}
