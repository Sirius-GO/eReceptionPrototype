<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layout;

class EnvironmentController extends Controller
{
    public function colourStore(Request $request){

                //Validate the form
                $this->validate($request, [
                    'myRange' => 'required',
                    'myRangeB' => 'required'
                ]);

                $rangeA = $request->input('myRange');
                $rangeB = $request->input('myRangeB');

                //Update Environment Settings
                $layouts = Layout::where('company_id', auth()->user()->company_id)->take(1)->get();
                
                foreach($layouts as $l){
                    $id = $l->id;
                
                    //Update Layputs Table
                    $layout = Layout::Find($id);
                    $layout->hue = $rangeA;
                    $layout->sat = $rangeB;
                    $layout->save();

                }


        return redirect('/settings')->with('success', 'Button Colours Successfully Updated.');
    }


    public function colourStorePass(Request $request){

      //Validate the form
      $this->validate($request, [
          'myRange' => 'required',
          'myRangeB' => 'required'
      ]);

      $rangeA = $request->input('myRange');
      $rangeB = $request->input('myRangeB');

      //Update Environment Settings
      $layouts = Layout::where('company_id', auth()->user()->company_id)->take(1)->get();
      
      foreach($layouts as $l){
          $id = $l->id;
      
          //Update Layputs Table
          $layout = Layout::Find($id);
          $layout->hue_pass = $rangeA;
          $layout->sat_pass = $rangeB;
          $layout->save();

      }


return redirect('/settings')->with('success', 'Employee Pass Colours Successfully Updated.');
}


public function colourStoreVis(Request $request){

  //Validate the form
  $this->validate($request, [
      'myRange' => 'required',
      'myRangeB' => 'required'
  ]);

  $rangeA = $request->input('myRange');
  $rangeB = $request->input('myRangeB');

  //Update Environment Settings
  $layouts = Layout::where('company_id', auth()->user()->company_id)->take(1)->get();
  
  foreach($layouts as $l){
      $id = $l->id;
  
      //Update Layputs Table
      $layout = Layout::Find($id);
      $layout->hue_vis = $rangeA;
      $layout->sat_vis = $rangeB;
      $layout->save();

  }


return redirect('/settings')->with('success', 'Visitor Pass Colours Successfully Updated.');
}


    public function wallpaperStore(Request $request)
    {

      //Validate the form
      $this->validate($request, [
        'wallpaper' => 'required|image'
      ]);

        // Trim all the incoming data:

        $data = date("Y-m-d h:i:sa");
        $data1 = strtotime($data);
        $name = $data1 . '-' . $_FILES["wallpaper"]["name"]; // The file name
        $url = "../public/storage/background_images/$name";
        $fileTmpLoc = $_FILES["wallpaper"]["tmp_name"]; // File in the PHP tmp folder
        $fileType = $_FILES["wallpaper"]["type"]; // The type of file it is
        $fileSize = $_FILES["wallpaper"]["size"]; // File size in bytes
        $fileErrorMsg = $_FILES["wallpaper"]["error"]; // 0 for false... and 1 for true
        if (!$fileTmpLoc) { // if file not chosen
          echo "ERROR: Max file size exceeded.";
          exit();
        }

        if(move_uploaded_file($fileTmpLoc, "/var/www/vhosts/ereceptionhub.co.uk/ereceptionhub/public/storage/background_images/$name")){


        //Get Company ID of from Auth and update background image in Layouts table
        $company_id = auth()->user()->company_id;

        $layout = Layout::where('company_id', $company_id)->take(1)->get();
        foreach($layout as $l){
            $id = $l->id;

        $wallpaper = Layout::Find($id);
        $wallpaper->bg_image = $name;
        $wallpaper->save();
        }
  
      } else {
        return back()->with('error', 'Upload Failed! Please try again...');
      }

        $message = $request->session()->flash('success', 'Your background Image has been successfully uploaded!');
        echo $message;
        $url = '../settings';
        echo "<script>window.open('".$url."', '_parent');</script>";
    }

    public function colourSelect(Request $request){

        //Validate the form
        $this->validate($request, [
            'colour' => 'required'
        ]);

        $colour = $request->input('colour');

        //Update Background Colour in Layouts Table
        $company_id = auth()->user()->company_id;

        $layout = Layout::where('company_id', $company_id)->take(1)->get();
        foreach($layout as $l){
            $id = $l->id;

        $bgcol = Layout::Find($id);
        $bgcol->bg_colour = $colour;
        $bgcol->save();
        }

        return redirect('/settings')->with('success', 'Background Colour Successfully Updated.');
    }

    public function choiceStore(Request $request){

                //Validate the form
                $this->validate($request, [
                    'bg' => 'required'
                ]);

                $bg = $request->input('bg');


                //Update Background Colour in Layouts Table
                $company_id = auth()->user()->company_id;

                $layout = Layout::where('company_id', $company_id)->take(1)->get();
                foreach($layout as $l){
                    $id = $l->id;

                $bg_ch = Layout::Find($id);
                $bg_ch->choice = $bg;
                $bg_ch->save();
                }

                return redirect('/settings')->with('success', 'Background Type: ' . $bg . ' Successfully Updated.');
        
    }


    public function txtChange(Request $request){

      //Validate the form
      $this->validate($request, [
        'colour' => 'required',
        'stc' => 'required',
        'stw' => 'required'
        ]);

        $colour = $request->input('colour');
        $stc = $request->input('stc');
        $stw = $request->input('stw');

      //Update Background Colour in Layouts Table
      $company_id = auth()->user()->company_id;

      $layout = Layout::where('company_id', $company_id)->take(1)->get();
      foreach($layout as $l){
          $id = $l->id;

      $txt = Layout::Find($id);
      $txt->welcome_col = $colour;
      $txt->welcome_stroke = $stw;
      $txt->welcome_stroke_col = $stc;
      $txt->save();
      }

      return redirect('/settings')->with('success', 'Hub Text Settings Successfully Updated.');
  }

  public function changeMsg(Request $request){
	  //Validate the form
      $this->validate($request, [
        'hub_msg' => 'required'
        ]);
	
	  $company_id = auth()->user()->company_id;

      $layout = Layout::where('company_id', $company_id)->take(1)->get();
      foreach($layout as $l){
          $id = $l->id;

      $msg = Layout::Find($id);
      $msg->hub_msg = $request->input('hub_msg');
      $msg->hub_msg_ctrl = $request->input('hub_msg_ctrl');
      $msg->save();
      }
	  
	  return redirect('/settings')->with('success', 'Hub Message Settings Successfully Updated.');
  }
	
	
	

}
