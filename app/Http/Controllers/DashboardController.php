<?php

namespace App\Http\Controllers;

//use App\Charts\UserChart;
use Illuminate\Http\Request;
use App\User;
use App\Register;
use App\Departments;
use App\Location;
use DB;
use App\FireDrill;
use App\FireTest;



class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index2()
    {
        $borderColors = [
            "rgba(255, 99, 132, 1.0)",
            "rgba(22,160,133, 1.0)",
            "rgba(255, 205, 86, 1.0)",
            "rgba(51,105,232, 1.0)",
            "rgba(244,67,54, 1.0)",
            "rgba(34,198,246, 1.0)",
            "rgba(153, 102, 255, 1.0)",
            "rgba(255, 159, 64, 1.0)",
            "rgba(233,30,99, 1.0)",
            "rgba(205,220,57, 1.0)"
        ];
        $fillColors = [
            "rgba(255, 99, 132, 0.2)",
            "rgba(22,160,133, 0.2)",
            "rgba(255, 205, 86, 0.2)",
            "rgba(51,105,232, 0.2)",
            "rgba(244,67,54, 0.2)",
            "rgba(34,198,246, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
            "rgba(233,30,99, 0.2)",
            "rgba(205,220,57, 0.2)"

        ];

        $dep = auth()->user()->pluck('department_id');


        $dep1 = User::where('department_id', '1')->count();
        $dep2 = User::where('department_id', '2')->count();
        $dep3 = User::where('department_id', '3')->count();
        $dep4 = User::where('department_id', '4')->count();
        $dep5 = User::where('department_id', '5')->count();
        $dep6 = User::where('department_id', '6')->count();
        $dat = User::groupby('department_id')->pluck('department_id');

        $deps = array($dep1, $dep2, $dep3, $dep4, $dep5, $dep6);

        $label = DB::table('users')
        ->select(DB::raw('count(department_id)'))
        ->groupBy('department_id')
        ->get()->toArray();

        $data = User::get('id')->all();

        
        $usersChart = new UserChart;
        $usersChart
        ->title('Employees by Department', 25, "rgb(255, 255, 255)", true, 'Tahoma')
        ->barwidth(1.0)
        ->displaylegend(false)
        ->displayAxes(true);

        $usersChart->labels(['Finance', 'IT', 'HR', 'Admin', 'Operations', 'Management'])
        ->minimalist(false)
        ->height(300)
        ->width(100)
        ->options([
        'maintainAspectRatio'=>false,
        'tooltip' => [
            'show' => true // or false, depending on what you want.
        ]
        ]);

        $usersChart->dataset('Employees', 'bar', $deps)
        ->color($borderColors)
        ->backgroundcolor($fillColors);

        $usersChart1 = new UserChart;
        $usersChart1->minimalist(false)
        ->title('Visitor Types', 25, "rgb(255, 255, 255)", true, 'Tahoma');
        $usersChart1->labels(['Jan', 'Feb', 'Mar'])
        ->height(300);
        $usersChart1->dataset('Users by trimester', 'doughnut', [10, 25, 13, 22, 5, 14])
            ->color($borderColors)
            ->backgroundcolor($fillColors);

        //return $deps;
        return view('pages.dashboard', [ 'usersChart' => $usersChart, 'usersChart1' => $usersChart1 ]);
    }

    public function index()
    {


        $today = now();
        $this_month = substr($today, 0, 7);

        $users = User::select(\DB::raw("COUNT(department_id) as dep"))
                    ->leftjoin('departments', 'users.department_id', 'departments.id')
                    ->where('users.company_id', auth()->user()->company_id)
                    ->orderby('departments.department_name', 'asc')
                    ->groupBy(\DB::raw("users.department_id"))
                    ->pluck('dep');



        $labs = Departments::select(\DB::raw("DISTINCT department_name as dn"))
                            ->join('users', 'departments.id', '=', 'users.department_id')
                            ->where('departments.company_id', auth()->user()->company_id)
                            ->orderby('departments.department_name', 'asc') 
                            ->pluck('dn');

        $cnt = User::select(\DB::raw("COUNT(DISTINCT department_id) as cnt"))
                    ->where('company_id', auth()->user()->company_id)
                    ->pluck('cnt');


        //$labs = array('IT', 'Operations', 'Management', 'HR', 'Admin', 'Finance');

        $vis = Register::select(\DB::raw("COUNT(reg_type) as reg"))
                ->groupBy(\DB::raw("reg_type"))
                //->where('current_status', 'In')
                ->where('reg_type', '!=', 'Staff')
                ->where('reg_type', '!=', 'Delivery')
                ->where('reg_type', '!=', 'Collection')
                ->where('company_id', auth()->user()->company_id)
                ->orderby('reg_type', 'desc')
                //Add where clause for this month only
                ->where('created_at', 'LIKE', '%'.$this_month.'%')
                ->pluck('reg');

        $deliver = Register::select(\DB::raw("COUNT(current_status) as del, reg_type"))
            ->where('registers.current_status', 'NA')
            ->where('created_at', 'LIKE', '%'.$this_month.'%')
            ->where('company_id', auth()->user()->company_id)
            ->orderby('created_at', 'asc')
            ->groupBy(\DB::raw('reg_type'))
            ->pluck('del'); 

        $in = Register::select(\DB::raw("COUNT(current_status) as n"))
            ->where('current_status', '<>', 'NA')
            ->where('created_at', 'LIKE', '%'.$this_month.'%')
            ->where('company_id', auth()->user()->company_id)
            ->orderby('created_at', 'asc')
            ->groupBy(\DB::raw('Date(created_at)'))
            ->pluck('n'); 
       
        $out = Register::select(\DB::raw("COUNT(current_status) as o"))
            ->where('current_status', 'Out') // Necessary to determine if updated_at has been updated
            ->where('sign_out_time', 'LIKE', '%'.$this_month.'%')
            //->where('sign_out_type', '<>', 'FORCED')
            ->where('company_id', auth()->user()->company_id)
            ->orderby('sign_out_time', 'asc')
            ->groupBy(\DB::raw('Date(sign_out_time)'))
            ->pluck('o'); 
        
        $indat = Register::select(\DB::raw("DISTINCT DATE_FORMAT(sign_out_time, '%d') as d"))
            ->where('sign_out_time', 'LIKE', '%'.$this_month.'%')
            ->where('company_id', auth()->user()->company_id)
            ->groupBy(\DB::raw('d'))
            ->orderby('d', 'asc')
            ->pluck('d');        


        $location = Location::WHERE('company_id', auth()->user()->company_id)->get();


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




$myData = Register::select(\DB::raw("DATE_FORMAT(created_at, '%d') as d"), 
                           \DB::raw("count(current_status) as ins"))
            ->where('current_status', '<>', 'NA')
            ->where('created_at', 'LIKE', '%'.$this_month.'%')
            ->where('company_id', auth()->user()->company_id)
            ->groupby(\DB::raw('d'))
            ->orderby('d', 'asc')
            ->get();   

$myData2 = Register::select(\DB::raw("DATE_FORMAT(sign_out_time, '%d') as d"), 
                           \DB::raw("count(current_status) as outs"))
            ->where('current_status', 'Out') // Necessary to determine if updated_at has been updated
            ->where('sign_out_time', 'LIKE', '%'.$this_month.'%')
            ->where('company_id', auth()->user()->company_id)
            ->groupby(\DB::raw('d'))
            ->orderby('d', 'asc')
            ->get();   

            
if(count($myData) > 0){
    $arr = [];
    $inc = 0;
    foreach($myData as $d){

        $assoc_array1 = (array($d->d => $d->ins));
        $arr[$inc] = $assoc_array1;
        $inc++;
    }
$data = $arr;
}
if(count($myData2) > 0){
    $arr2 = [];
    $inc2 = 0;
    foreach($myData2 as $d2){

        $assoc_array2 = (array($d2->d => $d2->outs));
        $arr2[$inc2] = $assoc_array2;
        $inc2++;
    }
$data2 = $arr2;
}
//Make 2 x zeros arrays 
$days = date("t");

$zero_array = [];
$inc3 = 0;
for($dy = 0; $dy < $days; $dy++){
    $z = array_push($zero_array, 0);
    $inc3++;
}
$zero_array2 = [];
$inc4 = 0;
for($dy = 0; $dy < $days; $dy++){
    $z2 = array_push($zero_array2, 0);
    $inc4++;
}
//return $zero_array2;


$data_scale = [];
for($s = 1; $s < $days+1; $s++){
    $scl = array_push($data_scale, $s);
}

//return $data_scale;

if(count($myData) > 0){
    foreach($data as $dat){
        foreach($dat as $key => $val){
            array_splice($zero_array, intval($key)-1, 1, $dat);
        }
    }
}
//return $zero_array;
if(count($myData2) > 0){
    foreach($data2 as $dat2){
        foreach($dat2 as $key => $val){
            array_splice($zero_array2, intval($key)-1, 1, $dat2);
        }
    }
}

//return $data2;

$data = $zero_array;
$data2 = $zero_array2;
$data3 = $data_scale;


        return view('pages.dashboard')
                ->with('users', $users)
                ->with('labs', $labs)
                ->with('vis', $vis)
                ->with('in', $in)
                ->with('out', $out)
                ->with('indat', $indat)
                ->with('deliver', $deliver)
                ->with('cnt', $cnt)
                ->with('location', $location)
                ->with('fire', $fire)
                ->with('test_daily', $test_daily)
                ->with('test_weekly', $test_weekly)
                ->with('test_monthly', $test_monthly)
                ->with('test_yearly', $test_yearly)
                ->with('test_fra', $test_fra)
                ->with('data', $data)
                ->with('data2', $data2)
                ->with('data3', $data3);
    }

}
