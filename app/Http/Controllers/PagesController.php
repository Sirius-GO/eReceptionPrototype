<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Account;
use App\Departments;
use App\Location;
use App\Register;
use App\User;
use App\Previsitor;
use App\Layout;
use App\FireDrill;
use App\FireTest;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

            /*$this->middleware('auth', 
                        ['except' => 
                            ['index', 'show',
                            'sign_in_options', 'show',
                            'policies', 'show',
                            'scan', 'show',
                            'sign_in', 'show'
                            ]
                        ]);*/

    }

    // ====================== Public Accessable Pages ========================

    //index
    public function hub(){

        $company = Company::WHERE('id', auth()->user()->company_id)->get();
		$layout = Layout::WHERE('id', auth()->user()->company_id)->get();

        return view('pages.hub')->with('company', $company)->with('layout', $layout);
    }

    //sign_in_options
    public function sign_in_options(){

        $department = Departments::WHERE('company_id', auth()->user()->company_id)->get();
        $company = Company::WHERE('id', auth()->user()->company_id)->get();
        $people = User::WHERE('company_id', auth()->user()->company_id)->get();
        $location = Location::WHERE('company_id', auth()->user()->company_id)->get();


        return view('pages.sign_in_options')
                ->with('department', $department)
                ->with('company', $company)
                ->with('people', $people);
    }

    //policies
    public function policies(){
        return view('pages.policies');
    }

    // ====================== Authenticated Accessable Pages ========================

    //hue_sat
    public function hue_sat(){

        $layout = Layout::WHERE('company_id', auth()->user()->company_id)->get();

        return view('pages.hue_sat')->with('layout', $layout);
    }

        //hue_sat_pass
        public function hue_sat_pass(){

            $layout = Layout::WHERE('company_id', auth()->user()->company_id)->get();
    
            return view('pages.hue_sat_pass')->with('layout', $layout);
        }
    

        //hue_sat_vis
        public function hue_sat_vis(){

            $layout = Layout::WHERE('company_id', auth()->user()->company_id)->get();
    
            return view('pages.hue_sat_vis')->with('layout', $layout);
        }

    //settings
    public function settings(){

        $layout = Layout::WHERE('company_id', auth()->user()->company_id)->get();

        return view('pages.settings')->with('layout', $layout);
    }


        //fire safety
        public function fireSafety(){

            $fire = FireDrill::orderby('id', 'desc')
                        ->where('company_id', auth()->user()->company_id)
                        ->take(1)
                        ->get();

            $test_daily = FireTest::orderby('id', 'desc')
                            ->where('company_id', auth()->user()->company_id)
                            ->where('report_type', 'Daily')
                            ->take(1)
                            ->get();

            $test_weekly = FireTest::orderby('id', 'desc')
                            ->where('company_id', auth()->user()->company_id)
                            ->where('report_type', 'Weekly')
                            ->take(1)
                            ->get();


            $test_monthly = FireTest::orderby('id', 'desc')
                            ->where('company_id', auth()->user()->company_id)
                            ->where('report_type', 'Monthly')
                            ->take(1)
                            ->get();


            $test_yearly = FireTest::orderby('id', 'desc')
                            ->where('company_id', auth()->user()->company_id)
                            ->where('report_type', 'Yearly')
                            ->take(1)
                            ->get();

            $test_fra = FireTest::orderby('id', 'desc')
                            ->where('company_id', auth()->user()->company_id)
                            ->where('report_type', 'FRA')
                            ->take(1)
                            ->get();


            return view('pages.fire_safety')->with('fire', $fire)
                                            ->with('test_daily', $test_daily)
                                            ->with('test_weekly', $test_weekly)
                                            ->with('test_monthly', $test_monthly)
                                            ->with('test_yearly', $test_yearly)
                                            ->with('test_fra', $test_fra);
        }


    //fire
    public function fire(){

            $entries = Register::select(\DB::raw("*, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
                        ->leftJoin('users', 'registers.user_id', '=', 'users.id')
                        ->leftJoin('locations', 'registers.location_id', 'locations.id')
                        ->leftJoin('companies', 'users.company_id', 'companies.id')
                        ->leftJoin('departments', 'users.department_id', 'departments.id')
                        ->where('registers.current_status', 'In')
                        ->where('registers.current_status', '<>', 'NA')
                        ->where('registers.company_id', auth()->user()->company_id)
                        ->orderby('registers.id', 'desc')
                        ->get();



	
            return view('pages.fire')->with('entries', $entries);
    }

    //fire Present at Drill
    public function firePresent($id){


        $register = Register::Find($id);
        $user_id = $register->user_id;
        $register->current_status = 'Out';
        $register->sign_out_type = 'FIRE DRILL';
        $register->sign_out_time = now();
        $register->save();

        if($user_id){
            $user = User::Find($user_id);
            $user->current_status = 'Out';
            $user->last_time = time();
            $user->save();
        }

        $fire = New FireDrill;
        $fire->user_id = auth()->user()->id;
        $fire->register_id = $id;
        $fire->company_id = auth()->user()->company_id;
        $fire->call_status ='Present';
        $fire->report = 'Nothing to report';
        $fire->save();

        return back()->with('User Details successfully added to the Fire Drill report');
    }


        //fire Not Present at Drill
        public function fireNotPresent(Request $request){

                //Validate the form
                $this->validate($request, [
                    'reason' => 'required',
                    'id' => 'required'
                ]);
              
            $reason = $request->input('reason');
            $more_info = $request->input('more_info');
            $id = $request->input('id');

            $register = Register::Find($id);
            $user_id = $register->user_id;
            $register->current_status = 'Out';
            $register->sign_out_type = 'FIRE DRILL';
            $register->sign_out_time = now();
            $register->save();
    
            if($user_id){
                $user = User::Find($user_id);
                $user->current_status = 'Out';
                $user->last_time = time();
                $user->save();
            }


            $fire = New FireDrill;
            $fire->user_id = auth()->user()->id;
            $fire->register_id = $id;
            $fire->company_id = auth()->user()->company_id;
            $fire->call_status ='Not Present';
            $fire->report = $reason . ' - ' . $more_info;
            $fire->save();

            

            return back()->with('User Details successfully added to the Fire Drill report');
        }
    


    public function fireReports(){

        $firedrill = FireDrill::select(\DB::raw("*, DATE(created_at) as part, count(id) as people"))
                                ->where('company_id', auth()->user()->company_id)
                                ->groupBy('part')
                                ->orderby('part', 'desc')
                                ->get();

        $firetest = FireTest::select(\DB::raw("*, DATE(created_at) as part"))
                                ->where('company_id', auth()->user()->company_id)
                                ->groupBy('part', 'report_type')
                                ->orderby('part', 'desc')
                                ->get();

        return view('pages.firereports')->with('firedrill', $firedrill)->with('firetest', $firetest);
    }

    public function fireReportShow($id){

        $firedate = FireDrill::where('fire_drills.id', $id)->take(1)->get();
        foreach($firedate as $fd){
            $fdate = substr($fd->created_at, 0, 10);
        }

        //return $fdate;

        $firedrill = FireDrill::select(\DB::raw("fire_drills.*, fire_drills.created_at as cdt, registers.*"))
                                ->where('fire_drills.created_at', 'LIKE', '%'. $fdate . '%')
                                ->leftjoin('registers', 'fire_drills.register_id', 'registers.id')
                                ->where('fire_drills.company_id', auth()->user()->company_id)
                                ->get();

        //return $firedrill;
        return view('pages.firereportsdetails')->with('firedrill', $firedrill);
    }

    public function fireCheckReportShow($id){

        $firedate = FireTest::where('fire_tests.id', $id)->take(1)->get();
        foreach($firedate as $fd){
            $fdate = substr($fd->created_at, 0, 10);
            $rtype = $fd->report_type;
        }

        //return $fdate;

        $firetest = FireTest::select(\DB::raw("fire_tests.*, fire_tests.created_at as cdt, users.*"))
                                ->where('fire_tests.created_at', 'LIKE', '%'. $fdate . '%')
                                ->where('report_type', $rtype)
                                ->leftjoin('users', 'fire_tests.user_id', 'users.id')
                                ->where('fire_tests.company_id', auth()->user()->company_id)
                                ->get();

        //return $firedrill;
        return view('pages.firecheckreportdetails')->with('firetest', $firetest);
    }


    //Daily Checklist SHOW
    public function daily_checklist()
    {
        return view('pages.daily_checklist');
    }
    //Daily Checklist POST
    public function dailyChecklist(Request $request)
    {

        //Check if a Daily Fire Check has already been completed
        $today = substr(now(), 0, 10);
        $daily_check = FireTest::where('created_at', 'LIKE', '%' . $today . '%')->where('report_type', 'Daily')->take(1)->get();

        if(count($daily_check) > 0){
            return redirect('firesafety')->with('warning', 'The Daily Fire Checklist has already been completed for today!!');
        } else {

            $response1 = $request->input('response1');
            $report1 = $request->input('report1');
            $response2 = $request->input('response2');
            $report2 = $request->input('report2');
            $response3 = $request->input('response3');
            $report3 = $request->input('report3');
            $response4 = $request->input('response4');
            $report4 = $request->input('report4');
            $response5 = $request->input('response5');
            $report5 = $request->input('report5');
            $response6 = $request->input('response6');
            $report6 = $request->input('report6');
            $response7 = $request->input('response7');
            $report7 = $request->input('report7');
            $response8 = $request->input('response8');
            $report8 = $request->input('report8');
            $response9 = $request->input('response9');
            $report9 = $request->input('report9');
            $response10 = $request->input('response10');
            $report10 = $request->input('report10');
            $response11 = $request->input('response11');
            $report11 = $request->input('report11');
            $response12 = $request->input('response12');
            $report12 = $request->input('report12');

            $location_id = session('location');
            //Default to 0 if not set (TEMPORARY FIX FOR TESTING - REQUIRES QUESTION ON FORMS TO ESTABLISH)
            if($location_id = ''){ $location_id = "0"; }

            if($response1 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ1";
                $daily->response = $response1;
                $daily->report = $report1 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response2 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ2";
                $daily->response = $response2;
                $daily->report = $report2 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response3 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ3";
                $daily->response = $response3;
                $daily->report = $report3 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response4 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ4";
                $daily->response = $response4;
                $daily->report = $report4 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response5 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ5";
                $daily->response = $response5;
                $daily->report = $report5 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response6 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ6";
                $daily->response = $response6;
                $daily->report = $report6 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response7 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ7";
                $daily->response = $response7;
                $daily->report = $report7 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response8 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ8";
                $daily->response = $response8;
                $daily->report = $report8 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response9 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ9";
                $daily->response = $response9;
                $daily->report = $report9 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response10 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ10";
                $daily->response = $response10;
                $daily->report = $report10 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response11 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ11";
                $daily->response = $response11;
                $daily->report = $report11 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            if($response12 !=''){
                $daily = New FireTest;
                $daily->user_id = auth()->user()->id;
                $daily->location_id = $location_id; 
                $daily->company_id = auth()->user()->company_id;
                $daily->area_checked = "DQ12";
                $daily->response = $response12;
                $daily->report = $report12 ?? "Clear";
                $daily->report_type = "Daily";
                $daily->img_evidence = "N/A";
                $daily->save();
            }

            return redirect('firesafety')->with('success', 'The Daily Fire Checklist has been completed successfully');

        }

    }

    //Weekly Checklist SHOW
    public function weekly_checklist()
    {
        return view('pages.weekly_checklist');
    }
    //Weekly Checklist POST
    public function weeklyChecklist(Request $request)
    {

        //Check if a Weekly Fire Check has already been completed
        $today = substr(now(), 0, 10);
        $weekly_check = FireTest::where('created_at', 'LIKE', '%' . $today . '%')->where('report_type', 'Weekly')->take(1)->get();

        if(count($weekly_check) > 0){
            return redirect('firesafety')->with('warning', 'The Weekly Fire Checklist has already been completed today!!');
        } else {
        

        $response1 = $request->input('response1');
        $report1 = $request->input('report1');
        $response2 = $request->input('response2');
        $report2 = $request->input('report2');
        $response3 = $request->input('response3');
        $report3 = $request->input('report3');
        $response4 = $request->input('response4');
        $report4 = $request->input('report4');
        $response5 = $request->input('response5');
        $report5 = $request->input('report5');
        $response6 = $request->input('response6');
        $report6 = $request->input('report6');
        $response7 = $request->input('response7');
        $report7 = $request->input('report7');

        $location_id = session('location');
        //Default to 0 if not set (TEMPORARY FIX FOR TESTING - REQUIRES QUESTION ON FORMS TO ESTABLISH)
        if($location_id = ''){ $location_id = "0"; }

        if($response1 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "WQ1";
            $daily->response = $response1;
            $daily->report = $report1 ?? "Clear";
            $daily->report_type = "Weekly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response2 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "WQ2";
            $daily->response = $response2;
            $daily->report = $report2 ?? "Clear";
            $daily->report_type = "Weekly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response3 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "WQ3";
            $daily->response = $response3;
            $daily->report = $report3 ?? "Clear";
            $daily->report_type = "Weekly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response4 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "WQ4";
            $daily->response = $response4;
            $daily->report = $report4 ?? "Clear";
            $daily->report_type = "Weekly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response5 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "WQ5";
            $daily->response = $response5;
            $daily->report = $report5 ?? "Clear";
            $daily->report_type = "Weekly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response6 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "WQ6";
            $daily->response = $response6;
            $daily->report = $report6 ?? "Clear";
            $daily->report_type = "Weekly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response7 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "WQ7";
            $daily->response = $response7;
            $daily->report = $report7 ?? "Clear";
            $daily->report_type = "Weekly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        return redirect('firesafety')->with('success', 'The Weekly Fire Checklist has been completed successfully');

        }

    }

    //Monthly Checklist SHOW
    public function monthly_checklist()
    {
        return view('pages.monthly_checklist');
    }
    //Monthly Checklist POST
    public function monthlyChecklist(Request $request)
    {
        //Check if a Monthly Fire Check has already been completed
        $today = substr(now(), 0, 10);
        $monthly_check = FireTest::where('created_at', 'LIKE', '%' . $today . '%')->where('report_type', 'Monthly')->take(1)->get();

        if(count($monthly_check) > 0){
            return redirect('firesafety')->with('warning', 'The Monthly Fire Checklist has already been completed today!!');
        } else {
        

        $response1 = $request->input('response1');
        $report1 = $request->input('report1');
        $response2 = $request->input('response2');
        $report2 = $request->input('report2');
        $response3 = $request->input('response3');
        $report3 = $request->input('report3');
        $response4 = $request->input('response4');
        $report4 = $request->input('report4');
        $response5 = $request->input('response5');
        $report5 = $request->input('report5');
        $response6 = $request->input('response6');
        $report6 = $request->input('report6');
        $response7 = $request->input('response7');
        $report7 = $request->input('report7');

        $location_id = session('location');
        //Default to 0 if not set (TEMPORARY FIX FOR TESTING - REQUIRES QUESTION ON FORMS TO ESTABLISH)
        if($location_id = ''){ $location_id = "0"; }

        if($response1 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "MQ1";
            $daily->response = $response1;
            $daily->report = $report1 ?? "Clear";
            $daily->report_type = "Monthly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response2 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "MQ2";
            $daily->response = $response2;
            $daily->report = $report2 ?? "Clear";
            $daily->report_type = "Monthly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response3 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "MQ3";
            $daily->response = $response3;
            $daily->report = $report3 ?? "Clear";
            $daily->report_type = "Monthly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response4 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "MQ4";
            $daily->response = $response4;
            $daily->report = $report4 ?? "Clear";
            $daily->report_type = "Monthly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response5 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "MQ5";
            $daily->response = $response5;
            $daily->report = $report5 ?? "Clear";
            $daily->report_type = "Monthly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response6 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "MQ6";
            $daily->response = $response6;
            $daily->report = $report6 ?? "Clear";
            $daily->report_type = "Monthly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response7 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "MQ7";
            $daily->response = $response7;
            $daily->report = $report7 ?? "Clear";
            $daily->report_type = "Monthly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        return redirect('firesafety')->with('success', 'The Monthly Fire Checklist has been completed successfully');

        }

    }

        //Yearly Checklist SHOW
    public function yearly_checklist()
    {
        return view('pages.yearly_checklist');
    }
    //Yearly Checklist POST
    public function yearlyChecklist(Request $request)
    {
        //Check if a Yearly Fire Check has already been completed
        $today = substr(now(), 0, 10);
        $yearly_check = FireTest::where('created_at', 'LIKE', '%' . $today . '%')->where('report_type', 'Yearly')->take(1)->get();

        if(count($yearly_check) > 0){
            return redirect('firesafety')->with('warning', 'The Yearly Fire Checklist has already been completed today!!');
        } else {
        

        $response1 = $request->input('response1');
        $report1 = $request->input('report1');

        $response2 = $request->input('response2');
        $report2 = $request->input('report2');

        $response3 = $request->input('response3');
        $report3 = $request->input('report3');

        $response4 = $request->input('response4');
        $report4 = $request->input('report4');
        $name4 = $request->input('name4');
        $company4 = $request->input('company4');
        $telephone4 = $request->input('telephone4');
        if($name4 !=''){ $report4 = 'Competent Person Name: ' . $name4 . ' | Company: ' . $company4 . ' | Telephone No: '. $telephone4; }

        $response5 = $request->input('response5');
        $report5 = $request->input('report5');
        $name5 = $request->input('name5');
        $company5 = $request->input('company5');
        $telephone5 = $request->input('telephone5');
        if($name5 !=''){ $report5 = 'Competent Person Name: ' . $name5 . ' | Company: ' . $company5 . ' | Telephone No: '. $telephone5; }

        $response6 = $request->input('response6');
        $report6 = $request->input('report6');
        $name6 = $request->input('name6');
        $company6 = $request->input('company6');
        $telephone6 = $request->input('telephone6');
        if($name6 !=''){ $report6 = 'Competent Person Name: ' . $name6 . ' | Company: ' . $company6 . ' | Telephone No: '. $telephone6; }

        $response7 = $request->input('response7');
        $report7 = $request->input('report7');
        $name7 = $request->input('name7');
        $company7 = $request->input('company7');
        $telephone7 = $request->input('telephone7');
        if($name7 !=''){ $report7 = 'Competent Person Name: ' . $name7 . ' | Company: ' . $company7 . ' | Telephone No: '. $telephone7; }


        $location_id = session('location');
        //Default to 0 if not set (TEMPORARY FIX FOR TESTING - REQUIRES QUESTION ON FORMS TO ESTABLISH)
        if($location_id = ''){ $location_id = "0"; }

        if($response1 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "YQ1";
            $daily->response = $response1;
            $daily->report = $report1 ?? "Clear";
            $daily->report_type = "Yearly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response2 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "YQ2";
            $daily->response = $response2;
            $daily->report = $report2 ?? "Clear";
            $daily->report_type = "Yearly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response3 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "YQ3";
            $daily->response = $response3;
            $daily->report = $report3 ?? "Clear";
            $daily->report_type = "Yearly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response4 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "YQ4";
            $daily->response = $response4;
            $daily->report = $report4 ?? "Clear";
            $daily->report_type = "Yearly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response5 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "YQ5";
            $daily->response = $response5;
            $daily->report = $report5 ?? "Clear";
            $daily->report_type = "Yearly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response6 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "YQ6";
            $daily->response = $response6;
            $daily->report = $report6 ?? "Clear";
            $daily->report_type = "Yearly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        if($response7 !=''){
            $daily = New FireTest;
            $daily->user_id = auth()->user()->id;
            $daily->location_id = $location_id; 
            $daily->company_id = auth()->user()->company_id;
            $daily->area_checked = "YQ7";
            $daily->response = $response7;
            $daily->report = $report7 ?? "Clear";
            $daily->report_type = "Yearly";
            $daily->img_evidence = "N/A";
            $daily->save();
        }

        return redirect('firesafety')->with('success', 'The Yearly Fire Checklist has been completed successfully');

        }


    }

    //Fire Risk Assessment SHOW
    public function fire_risk_assessment()
    {
        return view('pages.fire_risk_assessment');
    }
    //Fire Risk Assessment POST
    public function fireRiskAssessment(Request $request)
    {
        //Check if a Yearly Fire Check has already been completed
        $today = substr(now(), 0, 10);
        $fra = FireTest::where('created_at', 'LIKE', '%' . $today . '%')->where('report_type', 'FRA')->take(1)->get();

        if(count($fra) > 0){
            return redirect('firesafety')->with('warning', 'A Fire Risk Assessment has already been completed today!!');
        } else {
        


            $location1 = $request->input('location1');
            $hazard1 = $request->input('hazard1');
            $people1 = $request->input('people1');
            $evaluate1 = $request->input('evaluate1');
            $action1 = $request->input('action1');
            if($location1 !=''){ $report1 = $people1 . ' | ' . $evaluate1 . ' | '. $action1; }

            $location2 = $request->input('location2');
            $hazard2 = $request->input('hazard2');
            $people2 = $request->input('people2');
            $evaluate2 = $request->input('evaluate2');
            $action2 = $request->input('action2');
            if($location2 !=''){ $report2 = $people2 . ' | ' . $evaluate2 . ' | '. $action2; }

            $location3 = $request->input('location3');
            $hazard3 = $request->input('hazard3');
            $people3 = $request->input('people3');
            $evaluate3 = $request->input('evaluate3');
            $action3 = $request->input('action3');
            if($location3 !=''){ $report3 = $people3 . ' | ' . $evaluate3 . ' | '. $action3; }

            $location4 = $request->input('location4');
            $hazard4 = $request->input('hazard4');
            $people4 = $request->input('people4');
            $evaluate4 = $request->input('evaluate4');
            $action4 = $request->input('action4');
            if($location4 !=''){ $report4 = $people4 . ' | ' . $evaluate4 . ' | '. $action4; }

            $location5 = $request->input('location5');
            $hazard5 = $request->input('hazard5');
            $people5 = $request->input('people5');
            $evaluate5 = $request->input('evaluate5');
            $action5 = $request->input('action5');
            if($location5 !=''){ $report5 = $people5 . ' | ' . $evaluate5 . ' | '. $action5; }

            $location6 = $request->input('location6');
            $hazard6 = $request->input('hazard6');
            $people6 = $request->input('people6');
            $evaluate6 = $request->input('evaluate6');
            $action6 = $request->input('action6');
            if($location6 !=''){ $report6 = $people6 . ' | ' . $evaluate6 . ' | '. $action6; }

            $location7 = $request->input('location7');
            $hazard7 = $request->input('hazard7');
            $people7 = $request->input('people7');
            $evaluate7 = $request->input('evaluate1');
            $action7 = $request->input('action7');
            if($location7 !=''){ $report7 = $people7 . ' | ' . $evaluate7 . ' | '. $action7; }

            $location8 = $request->input('location8');
            $hazard8 = $request->input('hazard8');
            $people8 = $request->input('people8');
            $evaluate8 = $request->input('evaluate8');
            $action8 = $request->input('action8');
            if($location8 !=''){ $report8 = $people8 . ' | ' . $evaluate8 . ' | '. $action8; }

            $location9 = $request->input('location9');
            $hazard9 = $request->input('hazard9');
            $people9 = $request->input('people9');
            $evaluate9 = $request->input('evaluate9');
            $action9 = $request->input('action9');
            if($location9 !=''){ $report9 = $people9 . ' | ' . $evaluate9 . ' | '. $action9; }

            $location10 = $request->input('location10');
            $hazard10 = $request->input('hazard10');
            $people10 = $request->input('people10');
            $evaluate10 = $request->input('evaluate10');
            $action10 = $request->input('action10');
            if($location10 !=''){ $report10 = $people10 . ' | ' . $evaluate10 . ' | '. $action10; }

            //return $location1 . ' 2 ' . $location2;

        $location_id = session('location');
        //Default to 0 if not set (TEMPORARY FIX FOR TESTING - REQUIRES QUESTION ON FORMS TO ESTABLISH)
        if($location_id = ''){ $location_id = "0"; }

        if($location1 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location1;
            $risk->response = $hazard1;
            $risk->report = $report1 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location2 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location2;
            $risk->response = $hazard2;
            $risk->report = $report2 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location3 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location3;
            $risk->response = $hazard3;
            $risk->report = $report3 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location4 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location4;
            $risk->response = $hazard4;
            $risk->report = $report4 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location5 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location5;
            $risk->response = $hazard5;
            $risk->report = $report5 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location6 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location6;
            $risk->response = $hazard6;
            $risk->report = $report6 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location7 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location7;
            $risk->response = $hazard7;
            $risk->report = $report7 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location8 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location8;
            $risk->response = $hazard8;
            $risk->report = $report8 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location9 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location9;
            $risk->response = $hazard9;
            $risk->report = $report9 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        if($location10 !=''){
            $risk = New FireTest;
            $risk->user_id = auth()->user()->id;
            $risk->location_id = $location_id; 
            $risk->company_id = auth()->user()->company_id;
            $risk->area_checked = $location10;
            $risk->response = $hazard10;
            $risk->report = $report10 ?? "Clear";
            $risk->report_type = "FRA";
            $risk->img_evidence = "N/A";
            $risk->save();
        }

        return redirect('firesafety')->with('success', 'The Fire Risk Assessment has been completed successfully');

        }

    }
    

    public function RegisterDetails($id)
    {

        $staff_details = Register::select(\DB::raw("*, registers.created_at as crestat"))
                                ->where('registers.id', $id)
                                ->leftjoin('locations', 'registers.location_id', 'locations.id')
                                ->leftjoin('users', 'registers.user_id', 'users.id')
                                ->leftjoin('departments', 'users.department_id', 'departments.id')
                                ->take(1)->get();


        $details = Register::select(\DB::raw("*, registers.created_at as crestat"))
                            ->where('registers.id', $id)
                            ->leftjoin('locations', 'registers.location_id', 'locations.id')
                            ->leftjoin('users', 'registers.who', 'users.id')
                            ->take(1)->get();

        //return $details;

        return view('pages.fire_details')->with('staff_details', $staff_details)->with('details', $details);

    }


    //account
    public function account(){

        $company = Company::WHERE('id', auth()->user()->company_id)->take(1)->get();
        $account = Account::WHERE('company_id', auth()->user()->company_id)->take(1)->get();
        $department = Departments::WHERE('company_id', auth()->user()->company_id)->get();
        $location = Location::WHERE('company_id', auth()->user()->company_id)->get();

        return view('pages.account')
                ->with('company', $company)
                ->with('account', $account)
                ->with('department', $department)
                ->with('location', $location);
    }


    //QR Code
    public function qr(){
        return view('pages.qr-code');
    }
    //Scan QR
    public function scan(){
        return view('pages.scan');
    }

    //Scan QR OUT
    public function scanout(){
        return view('pages.scanout');
    }
    
    public function sign_in(){
        return view('pages.sign_in');
    }

    public function scan_out(){
        return view('pages.scan_out');
    }

    public function register_in_out(){

        if(isset($_POST['dt'])){
            $today = $_POST['dt'];
            session()->put('dt', $today);
            session()->put('page', 'hold');
        } elseif(!isset($_POST['dt']) && session('dt') != '' && session('page') == 'hold'){
            $today = session('dt');
        } else {
            $today = now();
        }
        
        if(isset($_POST['io'])){
            $in_out = $_POST['io'];
            session()->put('io', $in_out);
        } elseif(!isset($_POST['io']) && session('io') !='' && session('page') == 'hold'){
            $in_out = session('io');
        } else {
            $in_out = 'In';
        }

    

        $ca = substr($today, 0, 10);

        if($in_out ==='In'){
            $entries = Register::select(\DB::raw("*, registers.id as rid, registers.user_id as uuu, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
                        ->leftJoin('users', 'registers.user_id', '=', 'users.id')
                        ->leftJoin('locations', 'registers.location_id', 'locations.id')
                        ->leftJoin('companies', 'users.company_id', 'companies.id')
                        ->leftJoin('departments', 'users.department_id', 'departments.id')
                        ->where('registers.created_at', 'LIKE', '%'.$ca.'%')
                        //->where('registers.current_status', '%'.$in_out.'%')
                        ->where('registers.current_status', '<>', 'NA')
                        ->where('registers.company_id', auth()->user()->company_id)
                        ->orderby('registers.id', 'desc')
                        ->get();
        } elseif($in_out === 'Out'){
            $entries = Register::select(\DB::raw("*, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
                        ->leftJoin('users', 'registers.user_id', '=', 'users.id')
                        ->leftJoin('locations', 'registers.location_id', 'locations.id')
                        ->leftJoin('companies', 'users.company_id', 'companies.id')
                        ->leftJoin('departments', 'users.department_id', 'departments.id')
                        ->where('registers.sign_out_time', 'LIKE', '%'.$ca.'%')
                        ->where('registers.current_status', 'Out')
                        //->where('registers.current_status', '!=', 'NA')
                        ->where('registers.company_id', auth()->user()->company_id)
                        ->orderby('registers.id', 'desc')
                        ->get();
        } else { //in or out
            $entries = Register::select(\DB::raw("*, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
                        ->leftJoin('users', 'registers.user_id', '=', 'users.id')
                        ->leftJoin('locations', 'registers.location_id', 'locations.id')
                        ->leftJoin('companies', 'users.company_id', 'companies.id')
                        ->leftJoin('departments', 'users.department_id', 'departments.id')
                        ->where('registers.company_id', auth()->user()->company_id)
                        ->where('registers.created_at', 'LIKE', '%'.$ca.'%')
                        ->where('registers.current_status', '<>', 'NA')
                        ->orwhere('registers.sign_out_time', 'LIKE', '%'.$ca.'%')
                        ->where('registers.company_id', auth()->user()->company_id)
                        ->where('registers.current_status', '<>', 'NA')
                        ->orderby('registers.id', 'desc')
                        ->get();
        }


        //return $entries;

                return view('register_in_out.index')
                    ->with('entries', $entries);
    }


    public function forceSignout(Request $request)
    {

        //Validate the form
        $this->validate($request, [
            'sign_out_date' => 'required',
            'sign_out_time' => 'required',
            'id' => 'required'
        ]);
        
        $sod = $request->input('sign_out_date');
        $sot = $request->input('sign_out_time');
        $id = $request->input('id');

        //Set Sign Out Time from form
        $time_out = $sod . ' ' . $sot; //now(); // Change this for  from form chosen by administrator


        //return $time_out;

        $reginfo = Register::where('id', $id)->take(1)->get();

        foreach($reginfo as $u){
        //Are you currently signed out?
        $check_status = $u->current_status;
        $user_id = $u->user_id;
        $reg_id = $u->id;
        }

        if($check_status === 'In'){
        //Update registers
        $signout = Register::find($id);
        $signout->current_status = 'Out';
        $signout->sign_out_type = 'FORCED';
        $signout->sign_out_time = $time_out;
        $signout->save();

        $reg_user = User::where('reg_id', $reg_id)->take(1)->get();

        foreach($reg_user as $r){
            $rid = $r->id;
            // This update must only occur if there is only 1 occurence of person signed In on register
            if($rid > 0){ //If the register ID is found in the users table ONLY
                //Update users table for $rid - current_status and last_time
                $users = User::find($rid);
                $users->current_status = 'Out';
                $users->last_time = time();
                $users->reg_id = $id;
                $users->save();
            }
        }
     
        } else {
        return redirect('register_in_out')->with('error', 'User signed out!');
        }

        //Go back and display success message
        return redirect('register_in_out')->with('success', 'Forced Sign Out Successful!');

    }



    public function capture_cam(){
        return view('pages.capture_cam');
    }
        
    public function subscriptions(){
        return view('pages.subscriptions');
    }

    public function checkout_success(){
        return view('pages.checkout_success');
    }

    public function checkout_cancel(){
        return view('pages.checkout_cancel');
    }

    //Reports
    public function reports(){

            $entries = Register::select(\DB::raw("*, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
                        ->leftJoin('users', 'registers.user_id', '=', 'users.id')
                        ->leftJoin('locations', 'registers.location_id', 'locations.id')
                        ->leftJoin('companies', 'users.company_id', 'companies.id')
                        ->leftJoin('departments', 'users.department_id', 'departments.id')
                        ->where('registers.current_status', 'In')
                        ->where('registers.current_status', '<>', 'NA')
                        ->where('registers.company_id', auth()->user()->company_id)
                        ->orderby('registers.id', 'desc')
                        ->get();



	
            return view('pages.reports')->with('entries', $entries);
    }
	

	public function downloadReport(Request $request){
		
			//Validate the form
			$this->validate($request, [
				'start_date' => 'required',
				'end_date' => 'required',
				'report_type' => 'required'
			]);

			$sd = $request->input('start_date'). ' 00:00:00';
			$ed = $request->input('end_date'). ' 23:59:59';
			$rt = $request->input('report_type');
				

		
	
		
			if($rt == 'All'){
				$entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
					->leftJoin('users', 'registers.user_id', '=', 'users.id')
					->leftJoin('locations', 'registers.location_id', 'locations.id')
					->leftJoin('companies', 'users.company_id', 'companies.id')
					->leftJoin('departments', 'users.department_id', 'departments.id')
					
					->whereBetween('registers.created_at', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					
					->orwhereBetween('registers.sign_out_time', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					
					->orderby('registers.id', 'asc')
					->get();
			}
			if($rt == 'Hourly_Paid'){
				$entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
					->leftJoin('users', 'registers.user_id', '=', 'users.id')
					->leftJoin('locations', 'registers.location_id', 'locations.id')
					->leftJoin('companies', 'users.company_id', 'companies.id')
					->leftJoin('departments', 'users.department_id', 'departments.id')
					
					->whereBetween('registers.created_at', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('hourly_rate', '>', '0')		
					
					->orwhereBetween('registers.sign_out_time', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('hourly_rate', '>', '0')
					
					->orderby('users.id', 'asc')
					->orderby('registers.id', 'asc')
					->get();
			}
			if($rt == 'All_Staff'){
				$entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
					->leftJoin('users', 'registers.user_id', '=', 'users.id')
					->leftJoin('locations', 'registers.location_id', 'locations.id')
					->leftJoin('companies', 'users.company_id', 'companies.id')
					->leftJoin('departments', 'users.department_id', 'departments.id')
					
					->whereBetween('registers.created_at', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'staff')
					
					->orwhereBetween('registers.sign_out_time', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'staff')				
					
					->orderby('registers.id', 'asc')
					->get();
			}
			if($rt == 'Visitors'){
				$entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
					->leftJoin('users', 'registers.user_id', '=', 'users.id')
					->leftJoin('locations', 'registers.location_id', 'locations.id')
					->leftJoin('companies', 'users.company_id', 'companies.id')
					->leftJoin('departments', 'users.department_id', 'departments.id')
					
					->whereBetween('registers.created_at', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'visitor')
					
					->orwhereBetween('registers.sign_out_time', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'visitor')			
					
					->orderby('registers.id', 'asc')
					->get();
			}
			if($rt == 'Del_Collect'){
				$entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
					->leftJoin('users', 'registers.user_id', '=', 'users.id')
					->leftJoin('locations', 'registers.location_id', 'locations.id')
					->leftJoin('companies', 'users.company_id', 'companies.id')
					->leftJoin('departments', 'users.department_id', 'departments.id')
					
					->whereBetween('registers.created_at', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'delivery')
					
					->orwhereBetween('registers.sign_out_time', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'collection')
					
					->orwhereBetween('registers.created_at', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'delivery')
					
					->orwhereBetween('registers.sign_out_time', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'collection')
					
					->orderby('registers.id', 'asc')
					->get();
			}
			if($rt == 'Contractors'){
				$entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
					->leftJoin('users', 'registers.user_id', '=', 'users.id')
					->leftJoin('locations', 'registers.location_id', 'locations.id')
					->leftJoin('companies', 'users.company_id', 'companies.id')
					->leftJoin('departments', 'users.department_id', 'departments.id')
					
					->whereBetween('registers.created_at', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'contractor')
					
					->orwhereBetween('registers.sign_out_time', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('reg_type', 'contractor')
					
					->orderby('registers.id', 'asc')
					->get();
			}
		
			if($rt == 'Forced'){
				$entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
					->leftJoin('users', 'registers.user_id', '=', 'users.id')
					->leftJoin('locations', 'registers.location_id', 'locations.id')
					->leftJoin('companies', 'users.company_id', 'companies.id')
					->leftJoin('departments', 'users.department_id', 'departments.id')
					
					->where('registers.company_id', auth()->user()->company_id)
					->whereBetween('registers.created_at', [$sd, $ed])
					->where('sign_out_type', 'FORCED')
					
					->orwhereBetween('registers.sign_out_time', [$sd, $ed])
					->where('registers.company_id', auth()->user()->company_id)
					->where('sign_out_type', 'FORCED')
					
					->orderby('users.id', 'asc')
					->get();
			}

		//return $entries;

			$dt = date('dmY');
		    $sd1 = strtotime($sd);
			$sd2 = date('jS F, Y H:i:sa', $sd1);
		    $ed1 = strtotime($ed);
			$ed2 = date('jS F, Y H:i:sa', $ed1);

			header("Content-Type: application/vnd.ms-excel;");
			header("Content-disposition: attachment; filename=$rt.$dt.xls");

			echo '<html>';
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
			echo '<br /><br />';
			echo '<body style="background-color: #ffffff;">';
			echo '<table><tr style="background-color: #ffff00; font-size: 15px;"><td colspan="6"><b>Report Date Range - From: </b> ' . $sd2 . '  <b>To: </b>' . $ed2 . '</td></tr></table>';
			echo '<table border="1" style="font-family: tahoma, sans-serif; font-size:12px;">';
			echo '<tr>';
			echo '<td bgcolor="#1b95cd" style="width:60px; vertical-align:middle;" align="center"><b>ID</b></td>';
			echo '<td bgcolor="#1b95cd" style="width:150px; vertical-align:middle;"align="center"><b>Name</b></td>';
			if($rt == 'Hourly_Paid'){
				echo '<td bgcolor="#1b95cd" style="width:100px; vertical-align:middle;"align="center"><b>Clock Number</b></td>';
				echo '<td bgcolor="#1b95cd" style="width:100px; vertical-align:middle;"align="center"><b>Payroll Number</b></td>';
			}
			if($rt != 'Hourly_Paid'){
				echo '<td bgcolor="#1b95cd" style="width:100px; vertical-align:middle;"align="center"><b>Reg Type</b></td>';
			}
			echo '<td bgcolor="#1b95cd" style="width:60px; vertical-align:middle;"align="center"><b>Status</b></td>';
			echo '<td bgcolor="#1b95cd" style="width:100px; vertical-align:middle;"align="center"><b>Sign Type</b></td>';
			if($rt != 'Hourly_Paid' && $rt != 'All_Staff'){
				echo '<td bgcolor="#1b95cd" style="width:150px; vertical-align:middle;"align="center"><b>Visiting Who</b></td>';
			}
			echo '<td bgcolor="#1b95cd" style="width:120px; vertical-align:middle;" align="center"><b>Sign Location</b></td>';
			if($rt != 'Hourly_Paid' && $rt != 'All_Staff'){
				echo '<td bgcolor="#1b95cd" style="width:80px; vertical-align:middle;"align="center"><b>Car Reg</b></td>';
			}
			echo '<td bgcolor="#1b95cd" style="width:250px; vertical-align:middle;"align="center"><b>Company</b></td>';
			echo '<td bgcolor="#1b95cd" style="width:90px; vertical-align:middle;"align="center"><b>In Date</b></td>';
			echo '<td bgcolor="#1b95cd" style="width:70px; vertical-align:middle;"align="center"><b>In Time</b></td>';
			echo '<td bgcolor="#1b95cd" style="width:90px; vertical-align:middle;"align="center"><b>Out Date</b></td>';
			echo '<td bgcolor="#1b95cd" style="width:70px; vertical-align:middle;"align="center"><b>Out Time</b></td>';
			echo '<td bgcolor="#1b95cd" style="width:140px; vertical-align:middle;"align="center"><b>Time On-site (D:H:M:S)</b></td>';
			if($rt == 'Hourly_Paid'){
				echo '<td bgcolor="#1b95cd" style="width:80px; vertical-align:middle;"align="center"><b> Hourly Rate</b></td>';
		    	echo '<td bgcolor="#1b95cd" style="width:80px; vertical-align:middle;"align="center"><b>Earnings</b></td>';
			}
			echo '<br />';
			echo '</tr>';

		if(count($entries)> 0){
			foreach($entries as $ent){
				$a = $ent->uid .' | '.$ent->rid;;
				$b = $ent->name;
				$c = $ent->reg_type;
				$d = $ent->curstat;
				$e = $ent->sign_out_type;
				$f = $ent->first_name . ' ' . $ent->last_name;
				$g = $ent->location_name;
				$h = $ent->car_reg;
				$i = $ent->from_company;
				$j = $ent->crestat;
				$jj = strtotime($j);
				$k = $ent->upstat;
				$kk = strtotime($k);
				$diff = $kk - $jj;
				$l = number_format(($kk - $jj)/60);
				$ll = number_format(($kk - $jj)/60/60);
				$m = $ent->hourly_rate;
				$n = number_format((float)$ll*$m,2);
				$rate = number_format((float)$m,2);
				$cn = $ent->clock_no;
				$pn = $ent->payroll_no;
				
				
				$days = floor($diff / (60 * 60 * 24));
				$diff -= $days * (60 * 60 * 24);

				$hours = floor($diff / (60 * 60));
				$diff -= $hours * (60 * 60);

				$minutes = floor($diff / 60);
				$diff -= $minutes * 60;

				$seconds = floor($diff);
				$diff -= $seconds;

				$onsite = "{$days}d {$hours}h {$minutes}m {$seconds}s";
				$earnings = number_format((float)(($days * 24) + $hours + ($minutes / 60) + ($seconds / 3600))*$m,2);
				
				
				echo '<tr>';
						echo '<td bgcolor="#eeeeee" align="center">' . $a . '</td><td bgcolor="#eeeeee" align="left">' . $b . '</td>';
						echo ($rt === 'Hourly_Paid')?'<td bgcolor="#eeeeee"  align="center">' . $cn . '</td>':'';
						echo ($rt === 'Hourly_Paid')?'<td bgcolor="#eeeeee"  align="center">' . $pn . '</td>':'';
						echo ($rt != 'Hourly_Paid')?'<td bgcolor="#eeeeee">' . $c . '</td>':'';
						echo '<td bgcolor="#eeeeee" align="center">' . $d . '</td>';
						echo '<td bgcolor="#eeeeee" align="left">' . $e . '</td>';
						echo ($rt != 'Hourly_Paid' && $rt != 'All_Staff')?'<td bgcolor="#eeeeee" align="left">' . $f . '</td>':'';
						echo '<td bgcolor="#eeeeee" align="left">' . $g . '</td>';
						echo ($rt != 'Hourly_Paid' && $rt != 'All_Staff')?'<td bgcolor="#eeeeee" align="center">' . $h . '</td>':'';
						echo '<td bgcolor="#eeeeee" align="left">' . $i . '</td>';
						echo '<td bgcolor="#eeeeee" align="center" style="vnd.ms-excel.dateformat:dd.mm.yy">' . substr($j, 0, 10) . '</td>';
						echo '<td bgcolor="#eeeeee" align="center">' . substr($j, 11, 8) . '</td>';
						echo '<td bgcolor="#eeeeee" align="center" style="vnd.ms-excel.dateformat:dd.mm.yy">' . substr($k, 0, 10) . '</td>';
						echo '<td bgcolor="#eeeeee" align="center">' . substr($k, 11, 8) . '</td>';
						echo '<td bgcolor="#eeeeee" align="center">' . $onsite .'</td>';
						if($rt == 'Hourly_Paid'){
							echo '<td bgcolor="#eeeeee" align="center" style="vnd.ms-excel.numberformat:0.00">' . $rate . '</td>';
							echo '<td bgcolor="#eeeeee" align="center" style="vnd.ms-excel.numberformat:0.00">' . $earnings . '</td>';
						}
						echo '<br />';
				echo '</tr>';				
			}//End of foreach
				//return redirect('reports')->with('success', 'Your Report has been prepared and downoaded - Double-Click to open. Thank you. '.$sd .' - ' . $ed);
		} else {
				return redirect('reports')->with('error', 'No Entries have been found for your search. '.$sd .' - ' . $ed);
		}
		
		echo '</table>';
		echo '</body>';
		echo '</html>';
		
		
		

	}

	


	public function downloadFailed(Request $request){
		

	
		
		            $entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
                        ->leftJoin('users', 'registers.user_id', '=', 'users.id')
                        ->leftJoin('locations', 'registers.location_id', 'locations.id')
                        ->leftJoin('companies', 'users.company_id', 'companies.id')
                        ->leftJoin('departments', 'users.department_id', 'departments.id')
                        ->where('registers.company_id', auth()->user()->company_id)
						->where('registers.current_status', 'in')
                        ->orderby('registers.id', 'asc')
                        ->get();



			$rt = 'Failed_to_Sign_Out';
			$dt = date('dmY');


			header("Content-Type: application/vnd.ms-excel");
			header("Content-disposition: attachment; filename=$rt.$dt.xls");
		

			echo '<html>';
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
			echo '<br /><br />';
			echo '<body style="background-color: #ffffff;">';
			echo '<br><br><table border="1" style="font-family: tahoma, sans-serif; font-size:12px;">';
			echo '<tr>';
			echo '<td bgcolor="#ff0000" style="color: #fff; width:60px; vertical-align:middle;" align="center"><b>ID</b></td>';
			echo '<td bgcolor="#ff0000" style="color: #fff; width:150px; vertical-align:middle;"align="center"><b>Name</b></td>';
			echo '<td bgcolor="#ff0000" style="color: #fff; width:100px; vertical-align:middle;"align="center"><b>Sign Type</b></td>';
			echo '<td bgcolor="#ff0000" style="color: #fff; width:120px; vertical-align:middle;" align="center"><b>Sign Location</b></td>';
			echo '<td bgcolor="#ff0000" style="color: #fff; width:250px; vertical-align:middle;"align="center"><b>Company</b></td>';
			echo '<td bgcolor="#ff0000" style="color: #fff; width:90px; vertical-align:middle;"align="center"><b>In Date</b></td>';
			echo '<td bgcolor="#ff0000" style="color: #fff; width:70px; vertical-align:middle;"align="center"><b>In Time</b></td>';
			echo '<td bgcolor="#ff0000" style="color: #fff; width:140px; vertical-align:middle;"align="center"><b>Time On-site (D:H:M:S)</b></td>';
			echo '<br />';
			echo '</tr>';

		if(count($entries)> 0){
			foreach($entries as $ent){
				$a = $ent->uid .' | '.$ent->rid;;
				$b = $ent->name;
				$e = $ent->sign_out_type;
				$g = $ent->location_name;
				$i = $ent->from_company;
				$j = $ent->crestat;
				$jj = strtotime($j);
				$kk = time();
				$diff = $kk - $jj;
				$check = $kk - $jj;
				
				$days = floor($diff / (60 * 60 * 24));
				$diff -= $days * (60 * 60 * 24);
				$hours = floor($diff / (60 * 60));
				$diff -= $hours * (60 * 60);
				$minutes = floor($diff / 60);
				$diff -= $minutes * 60;
				$seconds = floor($diff);
				$diff -= $seconds;

				$onsite = "{$days}d {$hours}h {$minutes}m {$seconds}s";
				
				if($check > 54000){
					
					echo '<tr>';
							echo '<td bgcolor="#eeeeee" align="center">' . $a . '</td>';
							echo '<td bgcolor="#eeeeee" align="left">' . $b . '</td>';
							echo '<td bgcolor="#eeeeee" align="left">' . $e . '</td>';
							echo '<td bgcolor="#eeeeee" align="left">' . $g . '</td>';
							echo '<td bgcolor="#eeeeee" align="left">' . $i . '</td>';
							echo '<td bgcolor="#eeeeee" align="center" style="vnd.ms-excel.dateformat:dd.mm.yy">' . substr($j, 0, 10) . '</td>';
							echo '<td bgcolor="#eeeeee" align="center">' . substr($j, 11, 8) . '</td>';
							echo '<td bgcolor="#eeeeee" align="center">' . $onsite .'</td>';
							echo '<br />';
					echo '</tr>';	
				} else {
					echo '<tr><td colspan="8"> This Record Doesn\'t Match </td></tr>';
				}

			}// End of foreach
		}//end of main if
		echo '</table>';
		echo '</body>';
		echo '</html>';	
		
		
	//return back()->with('success', 'Your Report has been prepared and downoaded - Double-Click to open. Thank you.');

	}
	



	public function downloadSignedIn(Request $request){
		

		
		            $entries = Register::select(\DB::raw("*, users.id as uid, registers.id as rid, registers.current_status as curstat, registers.created_at as crestat, registers.sign_out_time as upstat"))
                        ->leftJoin('users', 'registers.user_id', '=', 'users.id')
                        ->leftJoin('locations', 'registers.location_id', 'locations.id')
                        ->leftJoin('companies', 'users.company_id', 'companies.id')
                        ->leftJoin('departments', 'users.department_id', 'departments.id')
                        ->where('registers.company_id', auth()->user()->company_id)
						->where('registers.current_status', 'in')
                        ->orderby('registers.id', 'asc')
                        ->get();



			$rt = 'Currently_Signed_In';
			$dt = date('dmY');


			header("Content-Type: application/vnd.ms-excel");
			header("Content-disposition: attachment; filename=$rt.$dt.xls");
		

			echo '<html>';
			echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
			echo '<br /><br />';
			echo '<body style="background-color: #ffffff;">';
			echo '<br><br><table border="1" style="font-family: tahoma, sans-serif; font-size:12px;">';
			echo '<tr>';
			echo '<td bgcolor="#1c971c" style="color: #fff; width:60px; vertical-align:middle;" align="center"><b>ID</b></td>';
			echo '<td bgcolor="#1c971c" style="color: #fff; width:150px; vertical-align:middle;"align="center"><b>Name</b></td>';
			echo '<td bgcolor="#1c971c" style="color: #fff; width:100px; vertical-align:middle;"align="center"><b>Sign Type</b></td>';
			echo '<td bgcolor="#1c971c" style="color: #fff; width:120px; vertical-align:middle;" align="center"><b>Sign Location</b></td>';
			echo '<td bgcolor="#1c971c" style="color: #fff; width:250px; vertical-align:middle;"align="center"><b>Company</b></td>';
			echo '<td bgcolor="#1c971c" style="color: #fff; width:90px; vertical-align:middle;"align="center"><b>In Date</b></td>';
			echo '<td bgcolor="#1c971c" style="color: #fff; width:70px; vertical-align:middle;"align="center"><b>In Time</b></td>';
			echo '<td bgcolor="#1c971c" style="color: #fff; width:140px; vertical-align:middle;"align="center"><b>Time On-site (D:H:M:S)</b></td>';
			echo '<br />';
			echo '</tr>';

		if(count($entries)> 0){
			foreach($entries as $ent){
				$a = $ent->uid .' | '.$ent->rid;;
				$b = $ent->name;
				$e = $ent->sign_out_type;
				$g = $ent->location_name;
				$i = $ent->from_company;
				$j = $ent->crestat;
				$jj = strtotime($j);
				$kk = time();
				$diff = $kk - $jj;
				$m = $ent->hourly_rate;
				
				$days = floor($diff / (60 * 60 * 24));
				$diff -= $days * (60 * 60 * 24);

				$hours = floor($diff / (60 * 60));
				$diff -= $hours * (60 * 60);

				$minutes = floor($diff / 60);
				$diff -= $minutes * 60;

				$seconds = floor($diff);
				$diff -= $seconds;

				$onsite = "{$days}d {$hours}h {$minutes}m {$seconds}s";
					echo '<tr>';
							echo '<td bgcolor="#eeeeee" align="center">' . $a . '</td>';
							echo '<td bgcolor="#eeeeee" align="left">' . $b . '</td>';
							echo '<td bgcolor="#eeeeee" align="left">' . $e . '</td>';
							echo '<td bgcolor="#eeeeee" align="left">' . $g . '</td>';
							echo '<td bgcolor="#eeeeee" align="left">' . $i . '</td>';
							echo '<td bgcolor="#eeeeee" align="center" style="vnd.ms-excel.dateformat:dd.mm.yy">' . substr($j, 0, 10) . '</td>';
							echo '<td bgcolor="#eeeeee" align="center">' . substr($j, 11, 8) . '</td>';
							echo '<td bgcolor="#eeeeee" align="center">' . $onsite .'</td>';
							echo '<br />';
					echo '</tr>';	


			}// End of foreach
		}//end of main if
		echo '</table>';
		echo '</body>';
		echo '</html>';	
		
		
	//return back()->with('success', 'Your Report has been prepared and downoaded - Double-Click to open. Thank you.');

	}

	
	public function preregister(){

		return view('pages.preregister');

	}

    public function storePreRegister(Request $request)
    {

      //Validate the form
      $this->validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'email' => 'required',
          'mobile' => 'required',
		  'company' => 'required',
          'job_title' => 'required',
		  'mdate' => 'required',
		  'mtime' => 'required'
      ]);
		
			$mdate = $request->input('mdate');
			$mtime = $request->input('mtime');
	
		
            //Create New Visitor Pre Registration
		
			try{


              //User Table
              $reg = new Previsitor;
              $reg->first_name = $request->input('first_name');
              $reg->last_name = $request->input('last_name');
              $reg->user_level = 0;
              $reg->company_id = 0;
              $reg->department_id = 0;
              $reg->avatar = 'avatar.png';
              $reg->current_status = 'Out';
              $reg->last_time = time();
              $reg->reg_id = NULL;
              $reg->account_id = auth()->user()->account_id;
              $reg->dob = '0000-00-00';
              $reg->gender = '';
              $reg->mobile_no = $request->input('mobile');
              $reg->job_title = $request->input('job_title');
              $reg->rfid = sha1($request->input('first_name').'|'.$request->input('last_name').'|'.$request->input('email').'|'. $mdate .'|'. $mtime);
              $reg->email = $request->input('email');
              $reg->email_verified_at = now();
              $reg->password = bcrypt($request->input('mobile'));
			  $reg->vis_company = $request->input('company');
			  $reg->car_reg = $request->input('car_reg');
              $reg->save();
		
			} catch (\Illuminate\Database\QueryException $e) {
				$errorCode = $e->errorInfo[1];
				if($errorCode == 1062){

					$vis_id = Previsitor::where('email', $request->input('email'))->pluck('id');
					$cmp_id = Previsitor::where('email', $request->input('email'))->pluck('company_id');
					
					
					if($cmp_id[0] === 0){
					  //Update Pre Visit Record
					  $reg = Previsitor::Find($vis_id[0]);
					  $reg->last_time = time();
					  $reg->account_id = auth()->user()->account_id;
					  $reg->mobile_no = $request->input('mobile');
					  $reg->job_title = $request->input('job_title');
					  $reg->rfid = sha1($request->input('first_name').'|'.$request->input('last_name').'|'.$request->input('email').'|'. $mdate .'|'. $mtime);
					  $reg->email = $request->input('email');
					  $reg->email_verified_at = now();
					  $reg->password = bcrypt($request->input('mobile'));
					  $reg->vis_company = $request->input('company');
					  $reg->car_reg = $request->input('car_reg');
					  $reg->save();
					} else {
						return back()->with('error', 'You entered a staff members email address. You cannot register a staff member as a visitor.');
					}
				}
            }	
		
			//================================== EMAIL CLIENT WITH PRE REGISTRATION DETAILS =====================================
		  
			//Email Vars
			  $company_name = Company::where('id', auth()->user()->company_id)->pluck('company_name');
			  $company_address = Company::where('id', auth()->user()->company_id)->pluck('ho_address');
		   	  $to = $request->input('email');
			  $subject = 'eReception Hub Notification Message from ' . $company_name[0];
			  $addressee = $request->input('first_name');
			  $from_mail = User::where('id', auth()->user()->id)->pluck('email');
			  $from = $from_mail[0];
		
			  $mdate = $request->input('mdate');
			  $mdate2 = strtotime($mdate);
		      $mdt = date('jS F, Y', $mdate2);
		
		      $mtime = $request->input('mtime');
			  $mtime2 = strtotime($mtime);
		      $mtm = date('h:i:sa', $mtime2);
		
		      $with_name = User::where('id', auth()->user()->id)->pluck('first_name');
		      $with_name2 = User::where('id', auth()->user()->id)->pluck('last_name');
			  $wname = $with_name[0] . ' ' . $with_name2[0];
			  
			  $qrC = sha1($request->input('first_name').'|'.$request->input('last_name').'|'.$request->input('email').'|'. $mdate .'|'. $mtime);
		  
		 //Send email notification
		 //=======================
		 //
		
		  $txt = '<html><head><title>eReceptionHub Mail</title><style>body { font-family: tahoma, sans-serif; width: 100%; background-color: #ddd;}</style></head><body><img src="https://ereceptionhub.co.uk/storage/images/banner1.jpg" style="margin-top: -10px;"><span style="max-width: 90%; margin: 0px 5% 0px 5%;"><br><br>'. "\r\n";
		  $txt .= 'Hello ';
		  $txt .= $addressee;
		  $txt .= ', <br><br> You are invited to a meeting with ';
		  $txt .= $wname;
		  $txt .= ' at: <br><br><b>'. "\r\n";
		  $txt .= $company_name[0];
		  $txt .= '</b>, our address is: <br> ';
		  $txt .= $company_address[0];
		  $txt .= '. <br><br>The meeting will be held on ';
		  $txt .= $mdt;
		  $txt .= ' at ';
		  $txt .= $mtm;
		  $txt .= '.'. "\r\n";
		  $txt .= '<br><br>On arrival, please click  the <b>Scan In</b> button on our Reception Console and scan the QR code below. You can do this either directly from your smartphone or alternatively you can print this email and scan the printed copy.<br><br>We look forward to seeing you on the day. '. "\r\n";
		  $txt .= '<br><br><img style="width: 100px;" src="https://ereceptionhub.co.uk/qr-code.php?text=';
		  $txt .= $qrC;
		  $txt .= '&size=200" alt="QR Code">';
		  $txt .= '<br><br>Thank you,<br><br><b>eReception Hub<br><span style="color: #777;">System Messaging Service</span></b>';
		  $txt .= '<br><br><b>PP ';
		  $txt .= $wname;
		  $txt .= '</b><br>';		  
		  $txt .= '<br><br><br>Need to report this message? Please forward it to admin@ereceptionhub.co.uk with your comments.<br>'. "\r\n";
		  $txt .= '</span></body></html>';
		
		  // To send HTML mail, the Content-type header must be set
		  $headers = 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		  //SEND MAIL
		  mail($to,$subject,$txt,$headers,"-f ".$from); 

          return back()->with('success', 'Pre Registration Successful');

    }


}
