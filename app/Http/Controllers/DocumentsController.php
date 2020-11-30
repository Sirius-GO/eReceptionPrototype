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
	
	public function showDoc(){
		
		//	get data
		$docs = Document::where('company_id', auth()->user()->company_id)->get();
		
		// return page
		return view('pages.documents')->with('docs', $docs);
	}	
	
    public function createdDoc(Request $request){
		//Validate the form
		  $this->validate($request, [
			'doc_no' => 'required',
			'title' => 'required',
			'content' => 'required',
			'sig_req' => 'required'
		]);
		
		
		//Insert new record into documents
        $doc =  new Document;
		$doc->company_id = auth()->user()->company_id;
        $doc->user_id = auth()->user()->id;
        $doc->title = $request->input('title');
        $doc->content = $request->input('content');
		$doc->sig_req = $request->input('sig_req');
        $doc->save();
		
		
		return back()->with('success', 'New Document Created Successfully!');
		
	}
	
	public function editDoc(Request $request){
		//Validate the form
		  $this->validate($request, [
			'doc_no' => 'required',
			'title' => 'required',
			'content' => 'required',
			'sig_req' => 'required',
			'id' => 'required'
		]);
		
		$id = $request->input('id');
		
		//Update document record
        $doc =  Document::find($id);
		$doc->company_id = auth()->user()->company_id;
        $doc->user_id = auth()->user()->id;
        $doc->title = $request->input('title');
        $doc->content = $request->input('content');
		$doc->sig_req = $request->input('sig_req');
        $doc->save();
		
		
		return back()->with('success', 'Document Updated Successfully!');		
		
		
		
	}
	
	
	
	
}
