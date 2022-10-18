<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Role;
use App\Permission;
use App\UserStatus;
use Excel;
use App\ActivityLog;
use App\Industry;
use App\Sex;
use App\MaritalStatus;
use App\Dependant;
use App\Ownershipstatus;
use App\Membership;
use App\UserDetail;
use Auth;
use App\Region;
use App\District;
use App\Ward;

class RegistrationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function userProfile()
    {
        $customer_id = Auth::id();

        $userProfile = DB::table('user_details')
        ->join('users', 'user_details.user_id', '=', 'users.id')
        ->join('users_roles', 'users.id', '=', 'users_roles.user_id')
        ->join('roles', 'users_roles.role_id', '=', 'roles.id')
        ->join('roles_permissions', 'roles.id', '=', 'roles_permissions.role_id')
        ->join('permissions', 'roles_permissions.permission_id', '=', 'permissions.id')
        ->join('industries', 'user_details.industry_id', '=', 'industries.id')
        ->join('sexes', 'user_details.sex_id', '=', 'sexes.id')
        ->join('marital_statuses', 'user_details.maritalstatus_id', '=', 'marital_statuses.id')
        ->join('dependants', 'user_details.dependant_id', '=', 'dependants.id')
        ->join('ownershipstatuses', 'user_details.ownershipstatus_id', '=', 'ownershipstatuses.id')
        ->join('memberships', 'user_details.membership_id', '=', 'memberships.id')
        ->join('regions', 'user_details.region_id', '=', 'regions.id')
        ->join('districts', 'user_details.district_id', '=', 'districts.id')
        ->join('wards', 'user_details.ward_id', '=', 'wards.id')
        ->where('users.id', '=', $customer_id)
        ->select('user_details.id','user_details.created_at','users.first_name', 'users.last_name', 'users.email','users.phone_number','roles.slug','profile_photo_path', 
        'regions.region_name','districts.district_name','wards.ward_name','street','enrollment_date','date_of_birth','national_identity_number',
        'tin_number','industries.industry_name','sexes.sex_name','marital_statuses.maritalstatus_name',
        'dependants.dependant_name','ownershipstatuses.ownershipstatus_name',
        'memberships.membership_name')
        ->get();

        return view('userProfile.profile')
        ->with('userProfiles', $userProfile);
    }

    public function systemUserProfileInformation()
    {
        $imporantuser_id = Auth::id();

        $systemUserProfile = DB::select(
            "SELECT
            users.id,
            users.first_name,
            users.last_name,
            users.email,
            users.phone_number,
            roles.slug,
            users.created_at
        FROM
            users,
            roles,
            users_roles
        WHERE
            users_roles.role_id = roles.id
            AND users_roles.user_id = users.id
            AND users.id = $imporantuser_id"
        );

        return view('userProfile.systemUserProfile')
        ->with('systemUserProfiles', $systemUserProfile);
    }

    public function registerUser()
    {
        $industry = DB::table('industries')
            ->select('id', 'industry_name')
            ->get();

        $sex = DB::table('sexes')
        ->select('id', 'sex_name')
        ->get();

        $maritalstatus = DB::table('marital_statuses')
        ->select('id', 'maritalstatus_name')
        ->get();

        $dependant = DB::table('dependants')
        ->select('id', 'dependant_name')
        ->get();

        $ownershipStatus = DB::table('ownershipstatuses')
        ->select('id', 'ownershipstatus_name')
        ->get();

        $membership = DB::table('memberships')
        ->select('id', 'membership_name')
        ->get();

        $regions = DB::table("regions")->pluck("region_name","id");

        return view('registerNewUsers.registerNewuser')
        ->with('industries', $industry)
        ->with('sexes', $sex)
        ->with('maritalstatuses', $maritalstatus)
        ->with('dependants', $dependant)
        ->with('ownershipStatuses', $ownershipStatus)
        ->with('memberships', $membership)
        ->with('regions', $regions);
    }

    public function getAllDistrictList(Request $request)
    {
        $districts = DB::table("districts")
        ->where("region_id",$request->region_id)
        ->pluck("district_name","id");

        return $districts;
        return response()->json($districts);
    }

    public function getAllWardList(Request $request)
    {
            $wards = DB::table("wards")
            ->where("district_id",$request->district_id)
            ->pluck("ward_name","id");
            return response()->json($wards);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->middleware(function ($request, $next) {
            if (\Auth::user()->can('create_customer')) {
                return $next($request);
            }
            return redirect()->back();
        });
        $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'phonenumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:13',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6',
            'profilephoto' => 'mimes:jpeg,jpg,png,gif,svg|required|max:2048',
            'region_id' => 'required',
            'district' => 'required',
            'ward' => 'required',
            'street' => 'required',
            'industry' => 'required',
            'enrollmentDate' => 'required',
            'dob' => 'date_format:Y-m-d|before:2002-01-01',
            'sex' => 'required',
            'idnumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:20',
            'tinnumber' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:9',
            'maritalstatus' => 'required',
            'dependents' => 'required', 
            'ownerstatus' => 'required',
            'membership' => 'required',
            'terms' => 'required',
        ]);

        $dev_role = Role::where('slug', 'customer')->first();
        $dev_perm = Permission::where('slug', 'create')->first();

        $industryData =  Industry::where('id', $request->industry)->first();

        $SexData =  Sex::where('id', $request->sex)->first();

        $maritalStatusData =  MaritalStatus::where('id', $request->maritalstatus)->first();

        $dependantsData =  Dependant::where('id', $request->dependents)->first();

        $ownershipstatusData =  Ownershipstatus::where('id', $request->ownerstatus)->first();

        $membershipsData =  Membership::where('id', $request->membership)->first();

        $regionsData =  Region::where('id', $request->region_id)->first();

        $districtsData =  District::where('id', $request->district)->first();

        $wardsData =  Ward::where('id', $request->ward)->first();


        $registerusers = new User();

        $userDetail = new UserDetail();


        $registerusers->first_name = $request->firstname;
        $registerusers->last_name = $request->lastname;
        $registerusers->email = $request->email;
        $registerusers->phone_number = $request->phonenumber;
        $registerusers->password = bcrypt($request->password);

        $st = $registerusers->save();

        $registerusers->roles()->attach($dev_role);
        $registerusers->permissions()->attach($dev_perm);

        $userstatus = new UserStatus();
        $userstatus->user_id = $registerusers->id;
        $userstatus->slug = false;
        $st2 = $userstatus->save();

        if ($st2) {
            $usersId  = DB::table('users')->select('id')->where('first_name', '=', $request->firstname)->value('id');

            $userDetail->profile_photo_path = $request->profilephoto->store('UserDetailProfilePhoto', 'public');
            $userDetail->region_id = $regionsData->id;
            $userDetail->district_id = $districtsData->id;
            $userDetail->ward_id = $wardsData->id;
            $userDetail->street = $request->street;
            $userDetail->industry_id = $industryData->id;
            $userDetail->enrollment_date = $request->enrollmentDate;
            $userDetail->date_of_birth = $request->dob;
            $userDetail->sex_id = $SexData->id;
            $userDetail->national_identity_number = $request->idnumber;
            $userDetail->tin_number = $request->tinnumber;
            $userDetail->maritalstatus_id = $maritalStatusData->id;
            $userDetail->dependant_id = $dependantsData->id;
            $userDetail->ownershipstatus_id = $ownershipstatusData->id;
            $userDetail->membership_id = $membershipsData->id;
            $userDetail->user_id = $usersId;

            $st3 = $userDetail->save();

            if (!$st3) {
                return redirect()->back()->with('message', 'Failed to register');
             }
            else{
                return redirect('/login')->with('message', 'Registration Successfully, Please login');
            }
        }
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
        $customer_id = Auth::id();

        $user = User::findOrFail($id);
        $leve = Role::all();

        return view('systemUserProfile.editsystemProfile')
        ->with('users', $user)
        ->with('leve', $leve);
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
}
