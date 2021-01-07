<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Company;
use App\Location;
use App\Departments;
use App\Layout;
use Exception;
use App\Account;
use App\Register;

class RegistrationsController extends Controller
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
        $registrations = User::orderby('created_at', 'desc')
                        ->where('company_id', auth()->user()->company_id)
                        //->where('user_level', '<=', auth()->user()->user_level)
                        ->paginate(12);
        $company = Company::WHERE('id', auth()->user()->company_id)->take(1)->get();
        $department = Departments::WHERE('id', auth()->user()->department_id)->get();
        $layout = Layout::WHERE('company_id', auth()->user()->company_id)->get();
    
        return view('admin.index')
                ->with('company', $company)
                ->with('department', $department)
                ->with('registrations', $registrations)
                ->with('layout', $layout);

    }
	
	
	public function visitor_index()
    {
        $registrations = Register::orderby('created_at', 'desc')
                        ->where('company_id', auth()->user()->company_id)
                        ->where('reg_type', 'Visitor')
						->where('current_status', 'In')
						->orWhere('reg_type', 'Contracrtor')
						->where('company_id', auth()->user()->company_id)
						->where('current_status', 'In')
                        ->get();
        $layout = Layout::WHERE('company_id', auth()->user()->company_id)->get();
    
        return view('admin.visitors_index')
                ->with('registrations', $registrations)
                ->with('layout', $layout);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if(auth()->user()->user_level < '5'){
            return redirect('/account')->with('error', 'Unauthorised Page');
        }

        $company = Company::WHERE('id', auth()->user()->company_id)->take(1)->get();
        $department = Departments::WHERE('company_id', auth()->user()->company_id)->get();

        return view('admin.create')
                ->with('company', $company)
                ->with('department', $department);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if(auth()->user()->user_level < '5'){
            return redirect('/account')->with('error', 'Unauthorised Page');
        }

      //Validate the form
      $this->validate($request, [
          'first_name' => 'required',
          'last_name' => 'required',
          'user_level' => 'required',
          'dob' => 'required',
          'gender' => 'required',
          'email' => 'required',
          'mobile_no' => 'required',
          'job_title' => 'required',
          'department_id' => 'required'
      ]);

              //Create New Registration

              //User Table
              $reg = new User;
              $reg->first_name = $request->input('first_name');
              $reg->last_name = $request->input('last_name');
              $reg->user_level = $request->input('user_level');
              $reg->company_id = auth()->user()->company_id;
              $reg->department_id = $request->input('department_id');
              $reg->avatar = 'avatar.png';
              $reg->current_status = 'Out';
              $reg->last_time = time();
              $reg->reg_id = NULL;
              $reg->account_id = auth()->user()->account_id;
              $reg->dob = $request->input('dob');
              $reg->gender = $request->input('gender');
              $reg->mobile_no = $request->input('mobile_no');
              $reg->job_title = $request->input('job_title');
			  $reg->hourly_rate = $request->input('hourly_rate');
			  $reg->clock_no = $request->input('clock_no');
		      $reg->payroll_no = $request->input('payroll_no');
              $reg->rfid = sha1($request->input('first_name').'|'.$request->input('last_name').'|'.$request->input('email'));
              $reg->email = $request->input('email');
              $reg->email_verified_at = now();
              $reg->password = bcrypt($request->input('mobile_no'));
              $reg->save();

              return redirect('/administration')->with('success', 'New Registration Successful');

    }



    public function bulkUploadStore(Request $request){

        if(auth()->user()->user_level < '10'){
            return redirect('/account')->with('error', 'Unauthorised Page');
        }

      //Validate the form
      $this->validate($request, [
          'file_name' => 'required',
      ]);


        $name = $_FILES["file_name"]["name"]; // The file name


        //$path = '../ereceptionhub/storage/app/public/excel_csv/';
        //$fileName = $path.$name;
        $fileName = asset("storage/excel_csv/$name");


            $my_file = fopen($fileName,"r");
            $column=fgetcsv($my_file);

            $flag = true;
            while(!feof($my_file)){
                if($flag) { $flag = false; continue; }
                $rowData[]=fgetcsv($my_file);

            foreach ($rowData as $key => $value) {
                $inserted_data=array(
                    'first_name'         =>  $value[0],
                    'last_name'          =>  $value[1],
                    'user_level'         =>  '1',
                    'company_id'         =>  auth()->user()->company_id,
                    'department_id'      =>  $value[4],
                    'avatar'             =>  'avatar.png',
                    'current_status'     =>  'Out',
                    'last_time'          =>  time(),
                    'reg_id'             =>  NULL,
                    'account_id'         =>  auth()->user()->account_id,
                    'dob'                =>  $value[10],
                    'gender'             =>  $value[11],
                    'mobile_no'          =>  $value[12],
                    'job_title'          =>  $value[13],
                    'rfid'               =>  sha1($value[0].'|'.$value[1].'|'.$value[15]),
                    'email'              =>  $value[15],
                    'email_verified_at'  =>  NULL, //now(), would make accessible immediately without email verification
                    'password'           =>  bcrypt($value[12]),
            );
            
                try{

                    User::insertOrIgnore($inserted_data);

                } catch(Exception $e){

                    return back()->with('error', 'User already exists');
                }

            }

        }
                print_r($rowData);
            

            

            return redirect('/administration')->with('success', 'Bulk Registrations Successful');


    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(auth()->user()->user_level < '5'){
            return redirect('/account')->with('error', 'Unauthorised Page');
        }

        $registration = User::orderby('created_at', 'desc')->where('id', $id)->get();
        foreach($registration as $reg){
            $dep_id = $reg->department_id;
            $department = Departments::WHERE('id', $dep_id)->get();

        }
        $company = Company::WHERE('id', auth()->user()->company_id)->take(1)->get();

        return view('admin.show')
                ->with('company', $company)
                ->with('department', $department)
                ->with('registration', $registration);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if(auth()->user()->user_level < '5'){
            return redirect('/account')->with('error', 'Unauthorised Page');
        }

        $registration = User::find($id);
        $department = Departments::WHERE('company_id', auth()->user()->company_id)->get();
        $company = Company::WHERE('id', auth()->user()->company_id)->take(1)->get();


        return view('admin.edit')
                ->with('company', $company)
                ->with('department', $department)
                ->with('registration', $registration);

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

        if(auth()->user()->user_level < '5'){
            return redirect('/account')->with('error', 'Unauthorised Page');
        }

      //Validate the form
      $this->validate($request, [
        'first_name' => 'required',
        'last_name' => 'required',
        'user_level' => 'required',
        'dob' => 'required',
        'gender' => 'required',
        'email' => 'required',
        'mobile_no' => 'required',
        'job_title' => 'required',
        'department_id' => 'required'
      ]);

            //Update Registration

            //User Table
            $reg = User::find($id);
            $reg->first_name = $request->input('first_name');
            $reg->last_name = $request->input('last_name');
            $reg->user_level = $request->input('user_level');
            $reg->company_id = auth()->user()->company_id;
            $reg->department_id = $request->input('department_id');
            //$reg->avatar = 'avatar.png';
            //$reg->current_status = 'Out';
            $reg->last_time = time();
            $reg->account_id = auth()->user()->account_id;
            $reg->dob = $request->input('dob');
            $reg->gender = $request->input('gender');
            $reg->mobile_no = $request->input('mobile_no');
            $reg->job_title = $request->input('job_title');
			$reg->hourly_rate = $request->input('hourly_rate');
			$reg->clock_no = $request->input('clock_no');
			$reg->payroll_no = $request->input('payroll_no');		
            $reg->rfid = sha1($request->input('first_name').'|'.$request->input('last_name').'|'.$request->input('email'));
            $reg->email = $request->input('email');
            $reg->email_verified_at = now();
            $reg->password = bcrypt($request->input('mobile_no'));
            $reg->save();

            return redirect('/administration')->with('success', 'Registration Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Delete Registration
        $reg = User::find($id);

        if(auth()->user()->user_level !='10'){
            return redirect('/account')->with('error', 'Unauthorised Page');
        }

        if($reg->avatar !='avatar.png'){
            //Delete Image
            Storage::delete('public/mug_shots/'.$reg->avatar);
        }
        $reg->delete();

        return redirect('/administration')->with('success', 'Registration Deleted');
    }    



    public function companyLogoStore(Request $request)
    {

      //Validate the form
      $this->validate($request, [
        'c_logo' => 'required|image'
      ]);

        // Trim all the incoming data:

        $data = date("Y-m-d h:i:sa");
        $data1 = strtotime($data);
        $name = $data1 . '-' . $_FILES["c_logo"]["name"]; // The file name
        $url = "../public/storage/company_logos/$name";
        $fileTmpLoc = $_FILES["c_logo"]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES["c_logo"]["type"]; // The type of file it is
        $fileSize = $_FILES["c_logo"]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES["c_logo"]["error"]; // 0 for false... and 1 for true
        if (!$fileTmpLoc) { // if file not chosen
          echo "ERROR: Max file size exceeded.";
          exit();
        }

        if(move_uploaded_file($fileTmpLoc, "/var/www/vhosts/ereceptionhub.co.uk/ereceptionhub/public/storage/company_logos/$name")){


        //Get Company ID of from Auth and update company logo in Companies table
        $company_id = auth()->user()->company_id;

        $c_logo = Company::Find($company_id);
        //$c_logo->user_id = auth()->user()->id;
        $c_logo->company_logo = '/company_logos/' . $name;
        $c_logo->save();
          
      } else {
        return back()->with('error', 'Upload Failed! Please try again...');
      }

        $message = $request->session()->flash('success', 'Your Company Logo has been successfully uploaded!');
        echo $message;
        $url = '../account';
        echo "<script>window.open('".$url."', '_parent');</script>";
    }


    public function mugShotStore(Request $request){


        //Validate the form
        $this->validate($request, [
            'image1' => 'required'
        ]);


        $img = $request->input('image1');
        $folderPath = "/var/www/vhosts/ereceptionhub.co.uk/ereceptionhub/public/storage/mug_shots/";
        $image_parts = explode(";base64,", $img);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $fileName = uniqid() . '.jpeg';
        $file = $folderPath . $fileName;
        file_put_contents($file, $image_base64);

        $im = imagecreatefromjpeg($file);
        $size = min(imagesx($im), imagesy($im));
        $im2 = imagecrop($im, ['x' => 30, 'y' => 0, 'width' => $size, 'height' => $size]);
        if ($im2 !== FALSE) {
            imagejpeg($im2, $file);
            //return $im2;
            imagedestroy($im2);
        }
        imagedestroy($im);

        //Write File location into Users Table for Logged in User
        $mug = User::Find(auth()->user()->id);
        $mug->avatar = $fileName;
        $mug->save();

        return redirect('account');
    }
	
	
	
	
	

}
