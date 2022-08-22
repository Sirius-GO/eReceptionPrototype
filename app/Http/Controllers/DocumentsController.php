<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use App\Account;
use App\Departments;
use App\Location;
use App\Register;
use App\User;
use App\Layout;
use App\Document;

class DocumentsController extends Controller
{

	
	public function __construct()
    {
        $this->middleware('auth');

    }
	
	
	public function showDoc(){
		
		//	get data
		$docs = Document::where('company_id', auth()->user()->company_id)->orderby('doc_no', 'asc')->get();
		
		// return page
		return view('pages.documents')->with('docs', $docs);
	}	
	
    public function createDoc(Request $request){
		//Validate the form
		  $this->validate($request, [
			'doc_no' => 'required',
			'title' => 'required',
			'content' => 'required',
			'on_off' => 'required'
		]);
		
		if($request->input('sig_req')){
			$sig = $request->input('sig_req');
		} else {
			$sig = 0;
		}
		
		try{
			//Insert new record into documents
			$doc =  new Document;
			$doc->company_id = auth()->user()->company_id;
			$doc->user_id = auth()->user()->id;
			$doc->doc_no = $request->input('doc_no');
			$doc->title = $request->input('title');
			$doc->content = $request->input('content');
			$doc->sig_req = $sig;
			$doc->checker = auth()->user()->company_id .' | ' . $request->input('doc_no');
			$doc->on_off = $request->input('on_off');
			$doc->save();
		} catch (\Illuminate\Database\QueryException $e) {
			$errorCode = $e->errorInfo[1];
			if($errorCode == 1062){
				//Update Record Instead
				$get_id = Document::where('checker', auth()->user()->company_id .' | ' . $request->input('doc_no'))->pluck('id');
				$id = $get_id[0];
				
				//Overwrite a document
				$doc =  Document::find($id);
				$doc->user_id = auth()->user()->id;
				$doc->title = $request->input('title');
				$doc->content = $request->input('content');
				$doc->sig_req = $request->input('sig_req');
				$doc->save();
				
				return back()->with('warning', 'Document Overwritten Successfully!');
			}
		}
				
		
		return back()->with('success', 'New Document Created Successfully!');
		
	}
	
	public function editDoc(Request $request){
		//Validate the form
		  $this->validate($request, [
			'doc_no' => 'required',
			'title' => 'required',
			'content' => 'required',
			'on_off' => 'required',
			'id' => 'required'
		]);
		
			$id = $request->input('id');
		
			if($request->input('sig_req')){
				$sig = $request->input('sig_req');
			} else {
				$sig = 0;
			}
		
		
			//Update document record
			$doc =  Document::find($id);
			$doc->company_id = auth()->user()->company_id;
			$doc->user_id = auth()->user()->id;
			$doc->doc_no = $request->input('doc_no');
			$doc->title = $request->input('title');
			$doc->content = $request->input('content');
			$doc->sig_req = $sig;
			$doc->checker = auth()->user()->company_id .' | ' . $request->input('doc_no');
		    $doc->on_off = $request->input('on_off');
			$doc->save();	
		
		return back()->with('success', 'Document Updated Successfully!');		
		
		
		
	}
	
	public function esign_show($id){
		
		//show eSign page
		$registration = Register::where('id', $id)->get();
		
		return view('pages.esign')->with('registration', $registration);
		
	}
	
	public function hub_docs(){
		
		$company_id = auth()->user()->company_id;
		$docs = Document::where('company_id', $company_id)->where('on_off', '1')->orderby('doc_no', 'asc')->get();
		
		return view('pages.hub_docs')->with('docs', $docs);	
		
	}
	
	public function esign_store(Request $request){
		
		//Validate the form
		  $this->validate($request, [
			'confirm' => 'required',
			'id' => 'required',
			'image1' => 'required'
		]);
		
		//Works best on a touch screen device - however can use a mouse or graphic pen
		$id = $request->input('id');
		$confirm = $request->input('confirm');
		$imagefile = $request->input('image1');

		function base64_to_png($base64_string, $output_file) {
			$ifp = @fopen($output_file, "wb");
			$data = explode(',', $base64_string);
			@fwrite($ifp, base64_decode($data[1]));
			@fclose($ifp);
			return $output_file;
		}

		function add_stp($inputfile, $outputfile) {
			$im = @imagecreatefrompng($inputfile);
			$bg = @imagecolorallocate($im, 255, 255, 255);
			$textcolor = @imagecolorallocate($im, 0, 61, 124);
			list($x, $y, $type) = getimagesize($inputfile);
			$txtpos_x = $x - 365;
			$txtpos_y = $y - 20;
			@imagestring($im, 5, $txtpos_x, $txtpos_y, 'eReception Hub', $textcolor);
			$txtpos_x = $x - 145;
			$txtpos_y = 10;
			@imagestring($im, 3, $txtpos_x, $txtpos_y, date("d-m-Y H:i:s"), $textcolor);
			@imagepng($im, $outputfile);
			@imagedestroy($im);
		}
		
		$get_name = Register::where('id', $id)->pluck('name');
		$name = str_replace(" ", "_", $get_name[0]);
		$output_file = "captured/signature" . date("d-m-Y-H-i-s-").time().'_'.$name. ".png";
		base64_to_png($imagefile, $output_file);
		add_stp($output_file, $output_file);

		$reg = Register::Find($id);
		$reg->signature_1 = $output_file;
		$reg->signature_2 = $output_file;
		$reg->signature_3 = $output_file;
		$reg->save();
		
		return redirect('/hub')->with('success', 'Thank you! Please take a seat. We\'ll be with you shortly.');	
		
	}
	
	public function tas(){
		//Take a seat notification after confirmimg a document
		return redirect('/hub')->with('success', 'Thank you! Please take a seat. We\'ll be with you shortly.');
	}
	
	
}
