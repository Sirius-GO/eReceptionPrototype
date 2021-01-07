<?php
	use App\Account;

	if(auth()->user()->id > 0){ //If your logged in


		$accounts_check = Account::where('company_id', auth()->user()->company_id)->get();
		
		//Do all testing here
		
		//Current URL
		$URL = $_SERVER['REQUEST_URI'];
		//echo '<span style="margin: auto; font-size: 50px;">'.$URL.'</span>';
		
		if(count($accounts_check) > 0){
			foreach($accounts_check as $a){
				//Get Vars
				$active = $a->status;
				$sub_type = $a->type;
				$classification = $a->classification;
				
				$created = $a->created_at;
				//Convert to Readable date
				$created_read = date('d/m/Y H:i:s', strtotime($created));
				
				$updated = $a->updated_at;
				//Convert to Readable date
				$updated_read = date('d/m/Y H:i:s', strtotime($updated));
			}
		}
		
		//============================================= Is your subscription Active?
		if($active === 'Active'){
			//Do nothing
		} else {
			//Check current page URL - depending on page choose what to do
			redirectToDest('/account', 'Access Denied! Your account is Inactive. Please update your subscription.');
		}

		//============================================= What is your subscription level?
		if($sub_type === 'Bronze'){
			//Check current page URL - depending on page choose what to do
			
		} elseif($sub_type === 'Silver') {
			//Check current page URL - depending on page choose what to do
			
			
		} elseif($sub_type === 'Gold') {
			//Check current page URL - depending on page choose what to do
			
			
		} else {
			//Deal with the error - Contact Administration
			
			
			//Redirect back to Login
			redirectToDest('/account', 'Access Denied! A subscription is required.');
		}
		
		//============================================= What is your classification?
		if($classification === 'Business'){
			
		} elseif($classification === 'Health') {
			//Check current page URL - depending on page choose what to do
			
		} elseif($classification === 'Education') {
			//Check current page URL - depending on page choose what to do
			
		} else {
			//Deal with the error - Contact Administration
			
			
			//Redirect back to Login
			redirectToDest('/account', 'Access Denied! No classification has been set. Please contact Administration.');
			
		}
		
		//============================================= What is your User level?
		if(auth()->user()->user_level === 10){
			//Check current page URL - depending on page choose what to do
			
		} elseif(auth()->user()->user_level === 5) {
			//Check current page URL - depending on page choose what to do
			
			
		} elseif(auth()->user()->user_level === 1) {
			//Check current page URL - depending on page choose what to do
			if($URL === '/administration' || 
			   $URL === '/preregister' ||
			   $URL === '/firesafety' ||
			   $URL === '/reports' ||
			   $URL === '/documents' ||
			   $URL === '/settings' ||
			   $URL === '/register_in_out' ||
			   $URL === '/hue_sat' ||
			   $URL === '/hue_sat_pass' ||
			   $URL === '/hue_sat_vis' ||
			   $URL === '/dashboard' ||
			   $URL === '/hub' ||
			   $URL === '/sign_in_options' ||
			   $URL === '/scan' ||
			   $URL === '/scanout' ||
			   $URL === '/visitor'
			  ){
				redirectToDest('/account', 'Access Denied! Your current User Level doesn\'t permit you access.');
			}
		} else {
			//Deal with the error - Contact Administration
			
			
			//Redirect back to Login
			redirectToDest('/contact', 'Access Denied! Error - User Level 0. Please contact us for support.');
		}
		//==========================================================================================
		
	} else {
		
		//Redirect back to login page
		redirectToDest('/login', 'Access Denied! Please login.');
	}

	//Function to redirect to desired page
	function redirectToDest($dest, $er){
		header('Refresh: 0;url='.$dest);
		Session::flash('error', $er);
	}
	

?>
