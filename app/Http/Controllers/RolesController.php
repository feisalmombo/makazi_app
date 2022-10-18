<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Permission;
use App\User;

class RolesController extends Controller
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
        $permissions=Role::latest('created_at')->paginate(5);
        return view('admin.roles.index',compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::All();
        return view('admin.roles.entrust_user',compact('users'));
    }
    public function add()
    {
        $permissions=Permission::All();
        return view('admin.roles.create',compact('permissions'));
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
    public function get_roles(Request $request){
        $roles=Role::All();
        $id=$_GET['user'];
        // return($id);
        $users=User::where('id',$id)->with('roles')->first();
        return json_encode([$users,$roles]);
        

    }
    public function post_roles(Request $request){
        $user=User::where('id',$request->users)->with('roles')->first();
        // dd($permission);
        $arr=$request->role;
        $ar=array();
        foreach ($user as $key => $users) {
            if (!empty($arr)) {
                foreach ($arr as $key => $role) {
                        foreach ($user->roles as $key => $value) {
                    
                        // echo $value->id;
                        if ($value->id == $role) {
                        $user->deleteRoles($value->id);
                        }
                        $user->deleteRoles($value->id);
                    }
                    // return $value->id;
                }
                $check=$user->giveRolesTo($arr);
                if($check){

                    return redirect()->back()->with('message','successfull entrusted');
                }
                else{
                    return redirect()->back()->with('message','There Was an error during entrusting Role(s)');
                }
            }
            else {
                foreach ($user->roles as $key => $value) {
                    $user->deleteRoles($value->id);
                }
                return redirect()->back()->with('message','User was successfull detached with Role(s)');
            }
        }

        // return $arr;
        
        
       
       
    }
}
