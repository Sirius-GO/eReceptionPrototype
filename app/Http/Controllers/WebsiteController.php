<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class WebsiteController extends Controller
{

    public function index(){
        return view('website.index');
    }

    public function about(){
        return view('website.about');
    }

    public function services(){
        return view('website.services');
    }

    public function contact(){
        return view('website.contact');
    }

    public function contact_form(Request $request){
        $this->validate($request, [
          'name' => 'required',
          'email' => 'required',
          'tel_no' => 'required',
          'message' => 'required'
        ]);
  
      //Create new entry into Messages get_html_translation_table
      try{
        $chk = $request->input('name').$request->input('email').$request->input('message');
  
        $app = new Contact;
        $app->name = $request->input('name');
        $app->email = $request->input('email');
        $app->telephone = $request->input('tel_no');
        $app->message = $request->input('message');
        $app->chk = $chk;
        $app->save();
  
        //Send email to info@ereceptionhub.co.uk here
        //===========================================
        //


      } catch (\Illuminate\Database\QueryException $e) {
          $errorCode = $e->errorInfo[1];
          if($errorCode == 1062){
              return back()->with('error', 'We have already receieved this message from you! Duplicated messages can\'t be sent...');
          }
     }
  
        return back()->with('success', 'Your message has been sent successfully. Thank you!');
  
  
      }
}
