<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Industry;
use App\Sex;
use App\MaritalStatus;
use App\Dependant;
use App\Ownershipstatus;
use App\UserDetail;
use Auth;

class UsersDetailsController extends Controller
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        return view('manageDetailsUsers.adduserdetails')
        ->with('industries', $industry)
        ->with('sexes', $sex)
        ->with('maritalstatuses', $maritalstatus)
        ->with('dependants', $dependant)
        ->with('ownershipStatuses', $ownershipStatus);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'profilephoto' => 'mimes:jpeg,jpg,png,gif,svg|required|max:10000',
            'region' => 'required',
            'ward' => 'required',
            'district' => 'required',
            'street' => 'required',
            'industry' => 'required',
            'enrollmentDate' => 'required',
            'dob' => 'required',
            'sex' => 'required',
            'idnumber' => 'required',
            'tinnumber' => 'required',
            'maritalstatus' => 'required',
            'dependents' => 'required',
            'ownerstatus' => 'required',
            'terms' => 'required',
        ]);

        $industryData =  Industry::where('id', $request->industry)->first();

        $SexData =  Sex::where('id', $request->sex)->first();

        $maritalStatusData =  MaritalStatus::where('id', $request->maritalstatus)->first();

        $dependantsData =  Dependant::where('id', $request->dependents)->first();

        $ownershipstatusData =  Ownershipstatus::where('id', $request->ownerstatus)->first();

        $userDetail = new UserDetail();

        $userDetail->profile_photo_path = $request->profilephoto->store('ProfilePhoto', 'public');
        $userDetail->region = $request->region;
        $userDetail->ward = $request->ward;
        $userDetail->district = $request->district;
        $userDetail->street = $request->street;
        $userDetail->industry_id = $industryData->id;
        $userDetail->enrollment_date = $request->enrollmentDate;
        // $userDetail->description = $request->description;
        $userDetail->date_of_birth = $request->dob;
        $userDetail->sex_id = $SexData->id;
        $userDetail->national_identity_number = $request->idnumber;
        $userDetail->tin_number = $request->tinnumber;
        $userDetail->maritalstatus_id = $maritalStatusData->id;
        $userDetail->dependant_id = $dependantsData->id;
        $userDetail->ownershipstatus_id = $ownershipstatusData->id;
        $userDetail->user_id =  \Auth::user()->id;

        // return $userDetail;
        $st = $userDetail->save();
        if (!$st) {
            return redirect()->back()->with('message', 'Failed to insert User Detail data');
        } else {
            return redirect()->back()->with('message', 'User Detail is successfully added');
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
    public function edit()
    {
    //    $customer_id = Auth::id();

    //    return \json_encode($customer_id);

    //    $userDetail = UserDetail::findOrFail($id);

       return view('manageDetailsUsers.edituserdetails');
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
