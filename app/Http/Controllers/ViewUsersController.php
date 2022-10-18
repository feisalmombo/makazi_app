<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use DB;
use App\Role;
use App\Permission;
use App\UserStatus;
use Excel;
use App\ActivityLog;
use Barryvdh\DomPDF\Facade as PDF;

class ViewUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }  
     
    
    public function index()
    {
        $this->middleware(function($request,$next){
        if(\Auth::user()->can('view_user')){
            return $next($request);
        }
        return redirect()->back();
    });
        $userData =DB::select(
            "SELECT
            users.first_name,users.id,
            users.last_name,
            users.email,
            users.phone_number,
            roles.slug
        FROM
            users,
            roles,
            users_roles
        WHERE
            users_roles.role_id = roles.id AND users_roles.user_id = users.id
        ORDER BY users.created_at"
        );
            // dd($userData);
           // return $userData;
        return view('viewUser.viewuser')->with('userData',$userData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         $this->middleware(function($request,$next){
            if(\Auth::user()->can('create_user')){
                return $next($request);
            }
            return redirect()->back();
        });
       $role = DB::table('roles')
       ->select('id','slug')
       ->get();
       return view('viewUser.createuser')->with('roles',$role);
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware(function($request,$next){
            if(\Auth::user()->can('create_user')){
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'fname'=> 'required',
            'lname'=> 'required',
            'phonenumber'=> 'required',
            'privilege'=> 'required',
        ]);

        $dev_role = Role::where('slug',$request->privilege)->first();
        $dev_perm = Permission::where('slug','create')->first();
       
        $users = new User();
        $users->first_name = $request->fname;
        $users->last_name = $request->lname;
        $user_email=$users->email = strtolower($request->fname).".".strtolower($request->lname)."@Makaziapp.com";
        $users->phone_number = $request->phonenumber;
        $users->password =bcrypt(strtolower($user_email).'1234');
        $st=$users->save();
        $users->roles()->attach($dev_role);
        $users->permissions()->attach($dev_perm);
        $userstatus=new UserStatus();
        $userstatus->user_id=$users->id;
        $userstatus->slug=false;
        $userstatus->save();
        if (!$st) {
          return redirect()->back()->with('message', 'Failed to insert User data');
      }
      return redirect()->back()->with('message', 'User is successfully added with username:'.strtolower($user_email).'  Password: '.strtolower($user_email).'1234');
  }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       //$user = User::findOrFail($id);
        // return view('viewUser.showuser',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {      
         $this->middleware(function($request,$next){
            if(\Auth::user()->can('edit_user')){
                return $next($request);
            }
            return redirect()->back();
        });
       $user = User::findOrFail($id);

       $leve = Role::all();

       return view('viewUser.edituser')->with('users',$user)->with('leve',$leve) ;
   }

   public function resetpwd($id){
        $this->middleware(function($request,$next){
            if(\Auth::user()->can('edit_user')){
                return $next($request);
            }
            return redirect()->back();
        });
        // dd($id);
        $user = User::findOrFail($id);
     $st = User::findOrFail($id)->update(['password'=>bcrypt('123456')]);
     if (!$st) {
        return redirect()->back()->with('message', 'Failed to Reset User Password for '.$user->first_name);
    }

    return redirect('/applicant/view/users/')->with('message', 'Password is Successfully Reseted to 123456 for User  '.$user->first_name);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->middleware(function($request,$next){
            if(\Auth::user()->can('edit_user')){
                return $next($request);
            }
            return redirect()->back();
        });
     $user = User::findOrFail($id);
     $this->validate(request(), [
        'fname'=> 'required',
        'lname'=> 'required',
        'phonenumber'=> 'required',
        'useremail'=> 'required',
    ]);

     $user->first_name = $request->fname;
     $user->last_name = $request->lname;
     $user->email = $request->useremail;
     $user->phone_number = $request->phonenumber;
     $st = $user->save();
     if (!$st) {
        return redirect()->back()->with('message', 'Failed to Update User data');
    }

    return redirect('/applicant/view/users/')->with('message', 'User is successfully updated');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
          $this->middleware(function($request,$next){
            if(\Auth::user()->can('delete_user')){
                return $next($request);
            }
            return redirect()->back();
        });
        $uid=\Auth::id();
        $user = User::findOrFail($id);
        $user->delete();
        ActivityLog::where('task_id',$id)->where('changetype','Delete User')->update(['user_id'=>$uid]);

        
        $request->session()->flash('message', 'User is successfully deleted');
        return back();
    }

    public function report(Request $request)
    {
         $str_var = $_POST['tad'];
         $userData = unserialize(base64_decode($str_var));

       if($request->view_type === 'downloadPdf'){
        $pdf = PDF::loadView('viewUser.report', ['userData' => $userData]);
        return $pdf->download('users.pdf');
    }
    
}

public function downloadExcel(Request $request)
{
     $str_var = $_POST['tadas'];
     $data = unserialize(base64_decode($str_var));

     $count = 0;
   // Initialize the array which will be passed into the Excel
    // generator.
    $userArray = []; 

    // Define the Excel spreadsheet headers
    $userArray[] = ['S/N','FIRST NAME', 'LAST NAME','EMAIL', 'PHONE NUMBER', 'PRIVILEGE'];

    // Convert each member of the returned collection into an array,
    // and append it to the atms array.
    foreach ($data as $datas) {
      $count++;
        $userArray[] = [$count, $datas->first_name, $datas->last_name, $datas->email, $datas->phone_number, $datas->slug];
    }


    // Generate and return the spreadsheet
    Excel::create('User(s)', function($excel) use ($userArray) {

        // Set the spreadsheet title, creator, and description
        $excel->setTitle('User');
        $excel->setCreator(\Auth::user()->first_name.' '.\Auth::user()->last_name)->setCompany('GetPesa PLC');
        $excel->setDescription('User file');

        // Build the spreadsheet, passing in the task array
        $excel->sheet('sheet1', function($sheet) use ($userArray) {
            $sheet->fromArray($userArray, null, 'A1', false, false);
        });

    })->download('xlsx');
}
}
