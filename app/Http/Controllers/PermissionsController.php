<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Permission;
use App\Role;
use Auth;
use App\User;

class PermissionsController extends Controller
{

   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function($request,$next){
            if( \Auth::user()->can('manage_privileges')){
                return $next($request);
            }
            return redirect()->back();
        });
    }  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions=Permission::latest('created_at')->paginate(5);
        // return $permissions;
        return view('admin.permissions.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.permissions.create');

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
    public function entrust_user(Request $request){
        $permissions=Permission::All();
        $users=User::with('permissions')->get();
        // return($users);
        // foreach ($users as $key => $value) {
        //     foreach ($value->permissions as $key => $v) {
        //         # code...
        //         return $v;
        //     }
        // }
        return view('admin.permissions.entrust_user',compact('permissions','users'));

    }
    public function entrust(Request $request){
        $permissions=Permission::All();
        $id=$_GET['user'];
        // return($id);
        $users=User::where('id',$id)->with('permissions')->first();
        return json_encode([$users,$permissions]);
        // return($users);
        // foreach ($users as $key => $value) {
        //     foreach ($value->permissions as $key => $v) {
        //         # code...
        //         return $v;
        //     }
        // }

    }
    public function entrust_user_permissions(Request $request){
        $user=User::where('id',$request->users)->with('permissions')->first();
        // dd($permission);
        $arr=$request->permission;
        $ar=array();
        foreach ($user as $key => $users) {
            if (!empty($arr)) {
                foreach ($arr as $key => $permission) {
                        foreach ($user->permissions as $key => $value) {
                    
                        // echo $value->id;
                        if ($value->id == $permission) {
                        $user->deletePermissions($value->id);
                        }
                        $user->deletePermissions($value->id);
                    }
                    // return $value->id;
                }
                $check=$user->givePermissionsTo($arr);
                if($check){

                    return redirect()->back()->with('message','successfull entrusted');
                }
                else{
                    return redirect()->back()->with('message','There Was an error during entrusting permission(s)');
                }
            }
            else {
                foreach ($user->permissions as $key => $value) {
                    $user->deletePermissions($value->id);
                }
                return redirect()->back()->with('message','User was successfull detached with Permission(s)');
            }
        }

        // return $arr;
        
        
       
       
    }
    public function entrust_role(){
        $roles=Role::All();
        return view('admin.permissions.entrust_role',compact('roles'));
    }
    public function entrust_roles(){
        $permissions=Permission::All();
        $id=$_GET['role'];
        // return($id);
        $roles=Role::where('id',$id)->with('permissions')->first();
        return json_encode([$roles,$permissions]);

    }
    public function entrust_role_permissions(Request $request){
        $role=Role::where('id',$request->roles)->with('permissions')->first();
        // return($role);
        $arr=$request->permission;
        // return $arr;
        $ar=array();
        foreach ($role as $key => $roles) {
            if (!empty($arr)) {
                foreach ($arr as $key => $permission) {
                        foreach ($role->permissions as $key => $value) {
                    
                        // return $value->id;
                        if ($value->id == $permission) {
                        $role->deletePermissions($value->id);
                        }
                        $role->deletePermissions($value->id);
                    }
                    // return $value->id;
                }
                $check=$role->givePermissionsTo($arr);
                if($check){

                    return redirect()->back()->with('message','successfull entrusted');
                }
                else{
                    return redirect()->back()->with('message','There Was an error during entrusting permission(s)');
                }
            }
            else {
                foreach ($role->permissions as $key => $value) {
                    $role->deletePermissions($value->id);
                }
                return redirect()->back()->with('message','Role was successfull detached with Permission(s)');
            }
        }

        // return $arr;
        
        
       
       
    }
}
