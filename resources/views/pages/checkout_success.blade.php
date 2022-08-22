@extends('layouts.app2')
<?php
use App\Transaction;
use App\Account;

//Update transactions with cancellation
if(!empty($_GET['tx'])){
	$amt = $_GET['amt'];
	$cc = $_GET['cc'];
	$item_name = (isset($_GET['item_name'])) ? $_GET['item_name'] : 'Monthly Subscription Plan';
	$st = $_GET['st'];
	$tx = $_GET['tx'];
	$cid = auth()->user()->company_id;
	
	if($amt === '0.01'){ $expiry = 365; $ptype = 'Gold'; }
	if($amt === '365.00'){ $expiry = 365; $ptype = 'Bronze'; }
	if($amt === '498.00'){ $expiry = 365; $ptype = 'Silver'; }
	if($amt === '650.00'){ $expiry = 365; $ptype = 'Gold'; }
	if($amt === '35.00'){ $expiry = 99999; $ptype = 'Bronze'; } // 99999 - good until cancelled
	if($amt === '45.00'){ $expiry = 99999; $ptype = 'Silver'; } // 99999 - good until cancelled
	if($amt === '60.00'){ $expiry = 99999; $ptype = 'Gold'; } // 99999 - good until cancelled
	
	try{
		$trans = New Transaction;
		$trans->user_id = auth()->user()->id;
		$trans->package_type = $ptype;
		$trans->expiry_days = $expiry;
		$trans->package_description = $item_name;
		$trans->package_price = $amt;
		$trans->tx_code = $tx;
		$trans->save();
	} catch(\Illuminate\Database\QueryException $e){
		$errorCode = $e->errorInfo[1]; 
		if($errorCode === 1062){
			Session::flash('error', 'Error - Attempted Duplicate Transaction.');
		}
	}
	

	
	$a_id = Account::where('company_id', $cid)->pluck('id');
	$id = $a_id[0];
	
	try{
		$acc = Account::find($id);
		$acc->company_id = $cid;
		$acc->status = 'Active';
		$acc->type = $ptype;
		$acc->classification = 'Business';
		$acc->save();
	} catch(\Illuminate\Database\QueryException $e){
		Session::flash('error', 'Error - Account Failed to Update.');
	}	
	
	
} else {
	Session::flash('error', 'Error - Transaction has no ID.');			
}

?>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="panel" style="background-color: rgba(0,0,0,0.5); color: #fff; padding: 20px; max-width: 90vw; margin: auto;">
                <div class="panel-header"><h2>{{ __('messages.checkout_success') }}</h2></div>
                    <div class="panel-body">

                        <center>
							<p>DO NOT CLICK BACK OR CLOSE YOUR BROWSER .........PLEASE WAIT!</p>
                            <br><br>
							
							<?php
								header("Refresh:3; url=/account");
							?>
                    </center>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection