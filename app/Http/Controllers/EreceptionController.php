<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;
use App\User;
use App\Company;
use App\Location;
use App\Departments;
use App\Register;
use App\Previsitor;
use App\Document;
use DB;

class EreceptionController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');

	}
	
	
  public function department(Request $request)
  {
      //Validate the form
      $this->validate($request, [
        'dept' => 'required'
    ]);

        $dept = $request->input('dept');
        $people = User::orderby('first_name', 'asc')
        ->where('company_id', auth()->user()->company_id)
        ->where('current_status', 'Out')
        ->where('department_id', $dept)
        ->get();

        $dep = Departments::where('id', $dept)->take(1)->get();

        //return $people;
        return view('pages.search_by_dep')->with('people',  $people)->with('dep', $dep);
  }

  public function name(Request $request)
  {
      //Validate the form
      $this->validate($request, [
        'name' => 'required'
    ]);

    $name = $request->input('name');
    $people = User::orderby('first_name', 'asc')
    ->where('company_id', auth()->user()->company_id)
    ->where('current_status', 'Out')
    ->where(DB::raw('concat(first_name," ",last_name)') , 'LIKE', '%'.$name.'%')
    ->get();

    //return $people;
    return view('pages.search_by_name')->with('people',  $people)->with('name', $name);
  }

  public function nameout(Request $request)
  {
      //Validate the form
      $this->validate($request, [
        'name' => 'required'
    ]);


    $t = time();
    $tcheck = ($t-86400);
    $name = $request->input('name');
    $people = Register::orderby('name', 'asc')
    ->where(DB::raw('UNIX_TIMESTAMP(created_at)'), '>', $tcheck)
    ->where('current_status', 'In')
    ->where('name', 'LIKE', '%'.$name.'%')
    ->get();

    // return $people;
    return view('pages.sign_out')->with('people',  $people)->with('name', $name);
  }


    public function signin($id)
    {


      $t = now();
      $userinfo = User::where('id', $id)->take(1)->get();

      if(session('location')){
        $loc = session('location');
      } else {
        $loc = '0';
      }

      foreach($userinfo as $u){
        $name = $u->first_name . ' ' . $u->last_name;
        $checker = $id . ' | ' . $name . ' | ' .  substr($t, 0 , 10);
        $img = $u->avatar;
        $cid = $u->company_id;
        //Are you cureently signed in?
        $check_status = $u->current_status;
      }

      $company = Company::where('id', $cid)->take(1)->get();
      foreach($company as $c){
        $cname = $c->company_name;
      }
      
      if($check_status === 'Out'){
        //Insert new record into registers
        $signin =  new Register;
        $signin->user_id = $id;
        $signin->name = $name;
        $signin->reg_type = 'Staff';
        $signin->current_status = 'In';
        $signin->sign_out_type = 'MANUAL';
        $signin->who = '0';
        $signin->location_id = $loc;
        $signin->car_reg = NULL;
        $signin->from_company = $cname;
        $signin->company_id = auth()->user()->company_id;
        $signin->img = $img;
        $signin->doc_id_1 = '|';
        $signin->signature_1 = NULL;
        $signin->doc_id_2 = '|';
        $signin->signature_2 = NULL;
        $signin->doc_id_3 = '|';
        $signin->signature_3 = NULL;
        $signin->checker = $checker;
        $signin->sign_out_time = now();
        $signin->save();


        $reg = Register::orderby('id', 'desc')->where('user_id', $id)->take(1)->get();
        foreach($reg as $r){
          $reg_id = $r->id;
        }
        //Update users table for user($id) - current_status and last_time
        $users = User::find($id);
        $users->current_status = 'In';
        $users->last_time = time();
        $users->reg_id = $reg_id;
        $users->save();
      
      } else {
        return redirect('/hub')->with('error', 'You are already signed in!');
      }

      //Redirect back to home ready for the next users to sign in or out
      return redirect('/hub')->with('success', 'You have signed in successfully!');

    }
	
	

	
	
	
	

    public function scan_in(Request $request)
    {

      $id = $request->input('rfid');
      $t = now();
      if(session('location')){
        $loc = session('location');
      } else {
        $loc = '0';
      }

		//Determine if a previsitor or member of staff
		$userinfocheck = User::where('rfid', $id)->get('rfid');
		if(count($userinfocheck) > 0){
			// Do Nothing
		} else {
			return $this->visitor_scan_in($id, $t, $loc);
		}
		
		
      if(date("H") < 12){
 
        $salutation = "Good morning";
    
      }elseif(date("H") > 11 && date("H") < 18){
    
        $salutation = "Good afternoon";
    
      }elseif(date("H") > 17){
    
        $salutation = "Good evening";
    
      }
  
      //Check the users table for the existence of the QR Code in the RFID column
      $userinfo = User::where('rfid', $id)->take(1)->get();

      foreach($userinfo as $u){
        $name = $u->first_name . ' ' . $u->last_name;
        $checker = $id . ' | ' . $name . ' | ' .  substr($t, 0 , 10);
        $img = $u->avatar;
        $cid = $u->company_id;
        $uid = $u->id;
        $fname = $u->first_name;
        //Are you cureently signed in?
        $check_status = $u->current_status;
		$vis_com = $u->vis_company;
		$staff_id = $u->account_id;
      }


		  $company = Company::where('id', $cid)->take(1)->get();
		  foreach($company as $c){
			$cname = $c->company_name;
		  }

      if($check_status === 'Out'){
        //Insert new record into registers
        $signin =  new Register;
        $signin->user_id = $uid;
        $signin->name = $name;
        $signin->reg_type = 'Staff';
        $signin->current_status = 'In';
        $signin->sign_out_type = 'SCAN';
        $signin->who = '0';
        $signin->location_id = $loc;
        $signin->car_reg = NULL;
        $signin->from_company = $cname;
        $signin->company_id = auth()->user()->company_id;
        $signin->img = $img;
        $signin->doc_id_1 = '|';
        $signin->signature_1 = NULL;
        $signin->doc_id_2 = '|';
        $signin->signature_2 = NULL;
        $signin->doc_id_3 = '|';
        $signin->signature_3 = NULL;
        $signin->checker = $checker;
        $signin->sign_out_time = now();
        $signin->save();

        $reg = Register::orderby('id', 'desc')->where('user_id', $uid)->take(1)->get();
        foreach($reg as $r){
          $reg_id = $r->id;
        }
		  
        //Update users table for user($id) - current_status and last_time
        $users = User::find($uid);
        $users->current_status = 'In';
        $users->last_time = time();
        $users->reg_id = $reg_id;
        $users->save();
      
      } else {
        return redirect('/hub')->with('error', $salutation . ' ' . $fname . ', you are already signed in!');
      }

      //Redirect back to home ready for the next users to sign in or out
      	return redirect('/hub')->with('success',  $salutation . ' ' . $fname . ', you have signed in successfully!');

    }


	
	
	public function visitor_scan_in($id, $t, $loc)
    {
      if(date("H") < 12){
 
        $salutation = "Good morning";
    
      }elseif(date("H") > 11 && date("H") < 18){
    
        $salutation = "Good afternoon";
    
      }elseif(date("H") > 17){
    
        $salutation = "Good evening";
    
      }
  
      //Check the previsitor table for the existence of the QR Code in the RFID column
      $vis_info = Previsitor::where('rfid', $id)->take(1)->get();
	  if(count($vis_info) > 0){
		  foreach($vis_info as $v){
			$name = $v->first_name . ' ' . $v->last_name;
			$checker = $id . ' | ' . $name . ' | ' .  substr($t, 0 , 10);
			$img = $v->avatar;
			$cid = $v->company_id;
			$uid = $v->id;
			$fname = $v->first_name;
			//Are you currently signed in?
			$check_status = $v->current_status;
			$vis_com = $v->vis_company;
			$staff_id = $v->account_id; // Who is being visited
			$car_reg = $v->car_reg;
		  }
	  } else {
		   return redirect('/hub')->with('error', 'The scanned QR Code does not exist on our systems.');
	  }
		
      if($check_status === 'Out'){
        //Insert new record into registers
        $signin =  new Register;
        $signin->user_id = $uid;
        $signin->name = $name;
        $signin->reg_type = 'Visitor';
        $signin->current_status = 'In';
        $signin->sign_out_type = 'SCAN';
        $signin->who = $staff_id;
        $signin->location_id = $loc;
        $signin->car_reg = $car_reg;
        $signin->from_company = $vis_com;
        $signin->company_id = auth()->user()->company_id;
        $signin->img = $img;
        $signin->checker = $checker;
        $signin->sign_out_time = now();
        $signin->save();
		  
		  
		  
			//Inform Staff Member of Visitor Arrival
			$staff_fn = User::where('id', $staff_id)->pluck('first_name');
			$staff_ln = User::where('id', $staff_id)->pluck('last_name');
			$staff_email = User::where('id', $staff_id)->pluck('email');
			$staff = $staff_fn[0] . ' ' . $staff_ln[0];
		    $to = $staff_email[0];
			$subject = 'eReception Hub Notification Message';
			$addressee = $staff_fn[0];
			$from = 'notifications@ereceptionhub.co.uk';
		  
		 //Send email notification
		 //=======================
		 //
			  
		
		  $txt = '<html><head><title>eReceptionHub Mail</title><style>body { font-family: tahoma, sans-serif; width: 100%; background-color: #ddd;}</style></head><body><img src="https://ereceptionhub.co.uk/storage/images/banner1.jpg" style="margin-top: -10px;"><span style="max-width: 90%; margin: 0px 5% 0px 5%;"><br><br>';
		  $txt .= 'Hello ';
		  $txt .= $addressee;
		  $txt .= ', <br><br> You have a visitor waiting for you. <br><br> Your visitor is ';
		  $txt .= $name;
		  $txt .= ', from ';
		  $txt .= $vis_com;
		  $txt .= '.<br><br>Thank you,<br><br><b>eReception Hub<br><span style="color: #777;">System Messaging Service</span></b><br><br><br>Need to report this message? Please forward it to admin@ereceptionhub.co.uk with your comments.<br>';
		  $txt .= '</span></body></html>';
		  // To send HTML mail, the Content-type header must be set
		  $headers = 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		  //SEND MAIL
		  mail($to,$subject,$txt,$headers,"-f ".$from); 


        $reg = Register::orderby('id', 'desc')->where('user_id', $uid)->take(1)->get();
        foreach($reg as $r){
          $reg_id = $r->id;
        }
        //Update Previsitor table for visitor($id) - current_status and last_time
        $vis = Previsitor::find($uid);
        $vis->current_status = 'In';
        $vis->last_time = time();
        $vis->reg_id = $reg_id;
        $vis->save();
      
      } else {
        return redirect('/hub')->with('error', $salutation . ' ' . $fname . ', you are already signed in!');
      }
		
		//Determine if there are any documents to read
		$docs = Document::where('company_id', auth()->user()->company_id)->where('on_off', '1')->orderby('doc_no', 'asc')->get();
		if(count($docs)>0){
			foreach($docs as $d){
				//Update Docs to Register Record
				$reg_doc = Register::Find($reg_id);
				if($d->doc_no === 1){
					$reg_doc->doc_id_1 = $d->title . '|' . $d->content;
				}
				if($d->doc_no === 2){
					$reg_doc->doc_id_2 = $d->title . '|' . $d->content;
				}
				if($d->doc_no === 3){
					$reg_doc->doc_id_3 = $d->title . '|' . $d->content;
				}
				$reg_doc->save();
			}
			//Display Docs and Pass Vars
			return view('pages.hub_docs')->with('docs', $docs)->with('reg_id', $reg_id)->with('success',  $salutation . ' ' . $fname . ', you have signed in successfully and ' . $staff . ' has been informed of your arrival. Please read the following information.');
		} else {	
		 	return redirect('/hub')->with('success',  $salutation . ' ' . $fname . ', you have signed in successfully and ' . $staff . ' has been informed of your arrival.'); 	
		}
		
		
    }
	
	
	
    public function visitor_sign_in(Request $request)
    {

        //Validate the form
        $this->validate($request, [
          'name' => 'required',
          'who' => 'required',
          'from_company' => 'required'
      ]);

      $name = $request->input('name');
      $name = strtolower($name);
      $name = ucwords($name);
      $who = $request->input('who');
      $car_reg = $request->input('car_reg') ?? NULL;
      $car_reg = strtoupper($car_reg);
      $company = $request->input('from_company');
      $company = strtolower($company);
      $company = ucwords($company);
      $img = 'avatar.png';
		

      $t = now();
      $checker = '0' . ' | ' . $name . ' | ' .  $company . ' | ' . substr($t, 0 , 10);
      if(session('location')){
        $loc = session('location');
      } else {
        $loc = '0';
      }

      $check_reg = Register::where('checker', $checker)->where('current_status', 'In')->take(1)->get();

      if(count($check_reg) === 0){
        //Insert new record into registers
        $signin =  new Register;
        $signin->user_id = '0';
        $signin->name = $name;
        $signin->reg_type = 'Visitor';
        $signin->current_status = 'In';
        $signin->sign_out_type = 'MANUAL';
        $signin->who = $who;
        $signin->location_id = $loc; // Needs to be included from session data
        $signin->car_reg = $car_reg;
        $signin->from_company = $company;
        $signin->company_id = auth()->user()->company_id;
        $signin->img = $img;
        $signin->doc_id_1 = '|';
        $signin->signature_1 = NULL;
        $signin->doc_id_2 = '|';
        $signin->signature_2 = NULL;
        $signin->doc_id_3 = '|';
        $signin->signature_3 = NULL;
        $signin->checker = $checker;
        $signin->sign_out_time = now();
        $signin->save();
		  
		  
		  
	  	//Get Register ID
		$reg = Register::orderby('id', 'desc')->where('reg_type', 'Visitor')->where('name', $name)->take(1)->get();
        foreach($reg as $r){
          $reg_id = $r->id;
        }		  
		  
		//================================= SEND AN EMAIL NOTIFICATION ==============================
		  
			//Email Vars
		  	  $visiting_email = User::where('id', $who)->pluck('email');
			  $visiting_name = User::where('id', $who)->pluck('first_name');
		  	  $visiting_name2 = User::where('id', $who)->pluck('last_name');
		      $staff = $visiting_name[0] . ' ' . $visiting_name2[0];
		   	  $to = $visiting_email[0];
			  $subject = 'eReception Hub Notification Message';
			  $addressee = $visiting_name[0];
			  $from = 'notifications@ereceptionhub.co.uk';
		  
		 //Send email notification
		 //=======================
		 //
			  
		
		  $txt = '<html><head><title>eReceptionHub Mail</title><style>body { font-family: tahoma, sans-serif; width: 100%; background-color: #ddd;}</style></head><body><img src="https://ereceptionhub.co.uk/storage/images/banner1.jpg" style="margin-top: -10px;"><span style="max-width: 90%; margin: 0px 5% 0px 5%;"><br><br>';
		  $txt .= 'Hello ';
		  $txt .= $addressee;
		  $txt .= ', <br><br> You have a visitor waiting for you. <br><br> Your visitor is ';
		  $txt .= $name;
		  $txt .= ', from ';
		  $txt .= $company;
		  $txt .= '.<br><br>Thank you,<br><br><b>eReception Hub<br><span style="color: #777;">System Messaging Service</span></b><br><br><br>Need to report this message? Please forward it to admin@ereceptionhub.co.uk with your comments.<br>';
		  $txt .= '</span></body></html>';
		  // To send HTML mail, the Content-type header must be set
		  $headers = 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		  //SEND MAIL
		  mail($to,$subject,$txt,$headers,"-f ".$from); 
		  
      
      } else {
        return redirect('/hub')->with('error', 'You are already signed in!');
      }
		
		
		//Determine if there are any documents to read
		$docs = Document::where('company_id', auth()->user()->company_id)->where('on_off', '1')->orderby('doc_no', 'asc')->get();
		if(count($docs)>0){
			foreach($docs as $d){
				//Update Docs to Register Record
				$reg_doc = Register::Find($reg_id);
				if($d->doc_no === 1){
					$reg_doc->doc_id_1 = $d->title . '|' . $d->content;
				}
				if($d->doc_no === 2){
					$reg_doc->doc_id_2 = $d->title . '|' . $d->content;
				}
				if($d->doc_no === 3){
					$reg_doc->doc_id_3 = $d->title . '|' . $d->content;
				}
				$reg_doc->save();
			}
			//Display Docs and Pass Vars
			return view('pages.hub_docs')->with('docs', $docs)->with('reg_id', $reg_id)->with('success',  'Thank you ' . $name . ', you have signed in successfully and ' . $staff . ' has been informed of your arrival. Please read the following information.');
		} else {	
		 	return redirect('/hub')->with('success',  'Thank you ' . $name . ', you have signed in successfully and ' . $staff . ' has been informed of your arrival.'); 	
		}

    }

    public function delivery_notice(Request $request)
    {

        //Validate the form
        $this->validate($request, [
          'del_type' => 'required',
          'who' => 'required',
          'from_company' => 'required'
      ]);

      $name = 'Delivery';
      $reg_type = $request->input('del_type');
      $who = $request->input('who');
      $company = $request->input('from_company');
      $company = strtolower($company);
      $company = ucwords($company);
      $img = 'parcel.png';

      $t = now();
      $checker = '0' . ' | ' . $name . ' | ' .  $company . ' | ' . substr($t, 0 , 16);
      if(session('location')){
        $loc = session('location');
      } else {
        $loc = '0';
      }

      $check_reg = Register::where('checker', $checker)->take(1)->get();

      if(count($check_reg) === 0){
        //Insert new record into registers
        $signin =  new Register;
        $signin->user_id = '0';
        $signin->name = $name;
        $signin->reg_type = $reg_type;
        $signin->current_status = 'NA';
        $signin->sign_out_type = 'AUTO';
        $signin->who = $who;
        $signin->location_id = $loc; // Needs to be included from session data
        $signin->car_reg = NULL;
        $signin->from_company = $company;
        $signin->company_id = auth()->user()->company_id;
        $signin->img = $img;
        $signin->doc_id_1 = '|';
        $signin->signature_1 = NULL;
        $signin->doc_id_2 = '|';
        $signin->signature_2 = NULL;
        $signin->doc_id_3 = '|';
        $signin->signature_3 = NULL;
        $signin->checker = $checker;
        $signin->sign_out_time = now();
        $signin->save();
		  
		  
		//================================= SEND AN EMAIL NOTIFICATION ==============================
		  
			//Email Vars
		  	  $visiting_email = User::where('id', $who)->pluck('email');
			  $visiting_name = User::where('id', $who)->pluck('first_name');
		   	  $to = $visiting_email[0];
			  $subject = 'eReception Hub ' . $reg_type . ' Notification Message';
			  $addressee = $visiting_name[0];
			  $from = 'notifications@ereceptionhub.co.uk';
		  
		 //Send email notification
		 //=======================
		 //
			  
		
		  $txt = '<html><head><title>eReceptionHub Mail</title><style>body { font-family: tahoma, sans-serif; width: 100%; background-color: #ddd;}</style></head><body><img src="https://ereceptionhub.co.uk/storage/images/banner1.jpg" style="margin-top: -10px;"><span style="max-width: 90%; margin: 0px 5% 0px 5%;"><br><br>';
		  $txt .= 'Hello ';
		  $txt .= $addressee;
		  $txt .= ', <br><br> You have a ';
		  $txt .= $reg_type;
		  $txt .= ' waiting for you. <br><br> The courier company is ';
		  $txt .= $company;
		  $txt .= '.<br><br>Thank you,<br><br><b>eReception Hub<br><span style="color: #777;">System Messaging Service</span></b><br><br><br>Need to report this message? Please forward it to admin@ereceptionhub.co.uk with your comments.<br>';
		  $txt .= '</span></body></html>';
		  // To send HTML mail, the Content-type header must be set
		  $headers = 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		  //SEND MAIL
		  mail($to,$subject,$txt,$headers,"-f ".$from); 		  
      
      } else {
        return redirect('/hub')->with('error', 'You have already registered your delivery / collection. The recipient has been notified!');
      }

      //Redirect back to home ready for the next users to sign in or out
      return redirect('/hub')->with('success', 'Thank you, your delivery / collection has been successfully recorded and the recipient has been notified!');

    }

    public function contractor_sign_in(Request $request)
    {

        //Validate the form
        $this->validate($request, [
          'name' => 'required',
          'who' => 'required',
          'from_company' => 'required'
      ]);

      $name = $request->input('name');
      $name = strtolower($name);
      $name = ucwords($name);
      $who = $request->input('who');
      $car_reg = $request->input('car_reg') ?? NULL;
      $car_reg = strtoupper($car_reg);
      $company = $request->input('from_company');
      $company = strtolower($company);
      $company = ucwords($company);
      $img = 'contractor_avatar.png';

      $t = now();
      $checker = '0' . ' | ' . $name . ' | ' .  $company . ' | ' . substr($t, 0 , 10);
      if(session('location')){
        $loc = session('location');
      } else {
        $loc = '0';
      }

      $check_reg = Register::where('checker', $checker)->where('current_status', 'In')->take(1)->get();

      if(count($check_reg) === 0){
        //Insert new record into registers
        $signin =  new Register;
        $signin->user_id = '0';
        $signin->name = $name;
        $signin->reg_type = 'Contractor';
        $signin->sign_out_type = 'MANUAL';
        $signin->current_status = 'In';
        $signin->who = $who;
        $signin->location_id = $loc; // Needs to be included from session data
        $signin->car_reg = $car_reg;
        $signin->from_company = $company;
        $signin->company_id = auth()->user()->company_id;
        $signin->img = $img;
        $signin->doc_id_1 = '|';
        $signin->signature_1 = NULL;
        $signin->doc_id_2 = '|';
        $signin->signature_2 = NULL;
        $signin->doc_id_3 = '|';
        $signin->signature_3 = NULL;
        $signin->checker = $checker;
        $signin->sign_out_time = now();
        $signin->save();
		  
	  	//Get Register ID
		$reg = Register::orderby('id', 'desc')->where('reg_type', 'Contractor')->where('name', $name)->take(1)->get();
        foreach($reg as $r){
          $reg_id = $r->id;
        }			  
		//================================= SEND AN EMAIL NOTIFICATION ==============================
		  
			//Email Vars
		  	  $visiting_email = User::where('id', $who)->pluck('email');
			  $visiting_name = User::where('id', $who)->pluck('first_name');
		  	  $visiting_name2 = User::where('id', $who)->pluck('last_name');
		      $staff = $visiting_name[0] . ' ' . $visiting_name2[0];
		   	  $to = $visiting_email[0];
			  $subject = 'eReception Hub Contractor Notification Message';
			  $addressee = $visiting_name[0];
			  $from = 'notifications@ereceptionhub.co.uk';
		  
		 //Send email notification
		 //=======================
		 //
			  
		
		  $txt = '<html><head><title>eReceptionHub Mail</title><style>body { font-family: tahoma, sans-serif; width: 100%; background-color: #ddd;}</style></head><body><img src="https://ereceptionhub.co.uk/storage/images/banner1.jpg" style="margin-top: -10px;"><span style="max-width: 90%; margin: 0px 5% 0px 5%;"><br><br>';
		  $txt .= 'Hello ';
		  $txt .= $addressee;
		  $txt .= ', <br><br> You have a contractor waiting for you. <br><br> Your visitor is ';
		  $txt .= $name;
		  $txt .= ', from ';
		  $txt .= $company;
		  $txt .= '.<br><br>Thank you,<br><br><b>eReception Hub<br><span style="color: #777;">System Messaging Service</span></b><br><br><br>Need to report this message? Please forward it to admin@ereceptionhub.co.uk with your comments.<br>';
		  $txt .= '</span></body></html>';
		  // To send HTML mail, the Content-type header must be set
		  $headers = 'Content-type: text/html; charset=iso-8859-1' . '\r\n';
		  //SEND MAIL
		  mail($to,$subject,$txt,$headers,"-f ".$from); 
      
      } else {
        return redirect('/hub')->with('error', 'You are already signed in!');
      }
		
		
		//Determine if there are any documents to read
		$docs = Document::where('company_id', auth()->user()->company_id)->where('on_off', '1')->orderby('doc_no', 'asc')->get();
		
		//return $docs;
		
		if(count($docs)>0){
			foreach($docs as $d){
				//Update Docs to Register Record
				$reg_doc = Register::Find($reg_id);
				if($d->doc_no === 1){
					$reg_doc->doc_id_1 = $d->title . '|' . $d->content;
				}
				if($d->doc_no === 2){
					$reg_doc->doc_id_2 = $d->title . '|' . $d->content;
				}
				if($d->doc_no === 3){
					$reg_doc->doc_id_3 = $d->title . '|' . $d->content;
				}
				$reg_doc->save();
			}
			//Display Docs and Pass Vars
			return view('pages.hub_docs')->with('docs', $docs)->with('reg_id', $reg_id)->with('success',  'Thank you ' . $name . ', you have signed in successfully and ' . $staff . ' has been informed of your arrival. Please read the following information.');
		} else {	
		 	return redirect('/hub')->with('success',  'Thank you ' . $name . ', you have signed in successfully and ' . $staff . ' has been informed of your arrival.'); 	
		}

    }


    public function signout($id)
    {

      $reginfo = Register::where('id', $id)->take(1)->get();

      foreach($reginfo as $u){
        //Are you currently signed out?
        $check_status = $u->current_status;
        $user_id = $u->user_id;
		$reg_type = $u->reg_type; 
      }
		
	  //Determine if a Previsitor
	  if($reg_type === 'Visitor'){
		  //Check if a previsitor recor exists
		  $prev = Previsitor::where('id', $user_id)->get();
	  }

      if($check_status === 'In'){
        //Update registers
        $signout = Register::find($id);
        $signout->current_status = 'Out';
        $signout->sign_out_type = 'MANUAL';
        $signout->sign_out_time = now();
        $signout->save();

        if($user_id > 0 && $reg_type === 'Staff'){
          //Update users table for user($id) - current_status and last_time
          $users = User::find($user_id);
          $users->current_status = 'Out';
          $users->last_time = time();
          $users->reg_id = $id;
          $users->save();
        }
		
		if($reg_type === 'Visitor'){
			if(count($prev)>0){
			  //Update users table for user($id) - current_status and last_time
			  $users = Previsitor::find($user_id);
			  $users->current_status = 'Out';
			  $users->last_time = time();
			  $users->reg_id = $id;
			  $users->save();
			}
		}
        
      } else {
        return redirect('/hub')->with('error', 'You are already signed out!');
      }

      //Redirect back to home ready for the next users to sign in or out
      return redirect('/hub')->with('success', 'You have signed out successfully!');

    }

    public function scan_out(Request $request)
    {

      $id = $request->input('rfid');

      if(date("H") < 12){
 
        $salutation = "Good morning";
    
      }elseif(date("H") > 11 && date("H") < 18){
    
        $salutation = "Good afternoon";
    
      }elseif(date("H") > 17){
    
        $salutation = "Good evening";
    
      }

		//Determine if visitor or staff

      $user_info = User::where('rfid', $id)->take(1)->get();
	  
		
		if(count($user_info)>0){
		  foreach($user_info as $u){
			$reg_id = $u->reg_id;
			$fname = $u->first_name;
			$x = 1;
		  }
		} else {
		  $vis_info = Previsitor::where('rfid', $id)->take(1)->get();
		  foreach($vis_info as $v){
			$reg_id = $v->reg_id;
			$fname = $v->first_name;
			$x = 0;
		  }
		}

		
      $reginfo = Register::where('id', $reg_id)->take(1)->get();

	  if(count($reginfo)>0){
		  foreach($reginfo as $u){
			//Are you currently signed out?
			$check_status = $u->current_status;
			$user_id = $u->user_id;
		  }
	  } else {
		  return redirect('/hub')->with('error', 'You either previously signed out or the QR Code doesn\'t exist.');
	  }
		
      if($check_status === 'In'){
        //Update registers
        $signout = Register::find($reg_id);
        $signout->current_status = 'Out';
        $signout->sign_out_type = 'SCAN';
        $signout->sign_out_time = now();
        $signout->save();
  
		if($user_id > 0 && $x === 1){
          //Update users table for user($id) - current_status and last_time
          $users = User::find($user_id);
          $users->current_status = 'Out';
          $users->last_time = time();
          $users->reg_id = $reg_id;
          $users->save();
        }
		  
		if($user_id > 0 && $x === 0){
          //Update users table for user($id) - current_status and last_time
          $users = Previsitor::find($user_id);
          $users->current_status = 'Out';
          $users->last_time = time();
          $users->reg_id = $reg_id;
          $users->save();
        }
        
      } else {
        return redirect('/hub')->with('error', $salutation . ' ' . $fname . ', you are already signed out!' . $reg_id.' ' .$user_id);
      }

      //Redirect back to home ready for the next users to sign in or out
      return redirect('/hub')->with('success',  $salutation . ' ' . $fname . ', you have signed out successfully!');

    }


    public function user_cred(Request $request)
    {
        //Validate the form
        $this->validate($request, [
          'first_name' => 'required|max:100',
          'last_name' => 'required|max:100',
          'email' => 'required|max:100',
          'mobile_no' => 'max:100',
          'rfid' => 'max:100'
      ]);

      //Do update here
      $name = User::find(auth()->user()->id);
      $name->first_name = $request->input('first_name');
      $name->last_name = $request->input('last_name');
      $name->email = $request->input('email');
      $name->mobile_no = $request->input('mobile_no');
      $name->rfid = $request->input('rfid');
      $name->dob = $request->input('dob');
      $name->gender = $request->input('gender');
      $name->save();

      return back()->with('success', 'User Credentials Updated');

    }

    public function comp_cred(Request $request)
    {
        //Validate the form
        $this->validate($request, [
          'company_name' => 'required|max:100',
          'job_title' => 'max:100',
          'department_id' => 'required|max:100',
          'ho_address' => 'max:100',
          'company_number' => 'max:100',
          'vat_number' => 'max:100'
      ]);

      //Do users table update here
      $comp = User::find(auth()->user()->id);
      $comp->job_title = $request->input('job_title');
      $comp->department_id = $request->input('department_id');
      $comp->save();

      $comp_id = $request->input('company_id');
      //Do company table update here
      $comp2 = Company::find($comp_id);
      $comp2->company_name = $request->input('company_name');
      $comp2->ho_address = $request->input('ho_address');
      $comp2->company_number = $request->input('company_number');
      $comp2->vat_number = $request->input('vat_number');
      $comp2->save();
      



      return back()->with('success', 'Company Credentials Updated');

    }

    public function account_cred(Request $request)
    {
        //Validate the form
        $this->validate($request, [
          'classification' => 'required|max:100',
          'company_id' => 'required'
      ]);

      //Do update here
      $acc = Account::find($request->input('company_id'));
      $acc->classification = $request->input('classification');
      $acc->save();

      return back()->with('success', 'Account Credentials Updated');

    }

    public function loc_add(Request $request)
    {
        //Validate the form
        $this->validate($request, [
          'user_id' => 'required',
          'company_id' => 'required',
          'location_name' => 'required|max:100',
          'location_address' => 'required|max:100'
      ]);

      //Insert New Location Here
      $loc = new Location;
      $loc->user_id = $request->input('user_id');
      $loc->company_id = $request->input('company_id');
      $loc->location_name = $request->input('location_name');
      $loc->location_code = $request->input('location_code');
      $loc->location_address = $request->input('location_address');
      $loc->save();

      return back()->with('success', 'New Location Added!');

    }

    public function loc_edit(Request $request)
    {

      //Do update here
      foreach($request->get('location', []) as $loc) {
        Location::where('id', $loc['location_id'])->update(array_except($loc, ['location_id']));
      }


      return redirect('account')->with('success', 'Locations Updated!');

    }

    public function dep_add(Request $request)
    {
        //Validate the form
        $this->validate($request, [
          'user_id' => 'required',
          'company_id' => 'required',
          'department_name' => 'required|max:100'
      ]);

      //Insert New Location Here
      $dep = new Departments;
      $dep->user_id = $request->input('user_id');
      $dep->company_id = $request->input('company_id');
      $dep->department_name = $request->input('department_name');
      $dep->save();

      return back()->with('success', 'New Department Added!');

    }

    public function dep_edit(Request $request)
    {

      foreach($request->get('department', []) as $dep) {
        Departments::where('id', $dep['department_id'])->update(array_except($dep, ['department_id']));
      }

      return redirect('account')->with('success', 'Departments Updated!');

    }


    public function location(Request $request){

          $this->validate($request, [
              'loc' => 'required'
          ]);
  
          $loc = $request->input('loc');
          session()->put('location', $loc);

          return redirect('dashboard')->with('info', 'Hub Location Set Successfully!');
      }

}