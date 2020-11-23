<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Company;
use App\Layout;
use App\Account;
use App\Departments;
use App\Location;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:191'],
            'last_name' => ['required', 'string', 'max:191'],
            'company' => ['required', 'string', 'max:191'],
            'account_type' => ['required', 'string', 'max:191'],
            'email' => ['required', 'string', 'email', 'max:191', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {


        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'user_level' => '10',
            'company_id' => '0',
            'department_id' => '0',
            'avatar' => 'avatar.png',
            'current_status' => 'Out',
            'last_time' => time(),
            'reg_id' => '0',
            'account_id' => '0',
            'dob' => '',
            'gender' => '',
            'rfid' => sha1($data['first_name'].'|'.$data['last_name'].'|'.$data['email']),
            'mobile_no' => '',
            'job_title' => '',
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        
        $company = Company::create([
            'company_name' => $data['company'],
            'company_logo' => '',
            'ho_address' => '',
            'company_number' => '',
            'vat_number' => ''
        ]);

        $layout = Layout::create([
            'company_id' => $company->id,
            'hue' => '1',
            'sat' => '1',
            'hue_pass' => '1',
            'sat_pass' => '1',
            'hue_vis' => '1',
            'sat_vis' => '1',
            'welcome_col' => '#eee',
            'welcome_stroke' => '2.5',
            'welcome_stroke_col' => '#333',
            'choice' => 'image',
            'bg_image' => 'wallpaper_C4D.jpg',
            'bg_colour' => '#eee'
        ]);

        $account = Account::create([
            'company_id' => $company->id,
            'status' => 'Inactive',
            'type' => '',
            'classification' => $data['account_type']
        ]);

        $departments = Departments::create([
            'user_id' => $user->id,
            'company_id' => $company->id,
            'department_name' => 'Admin'
        ]);

        $locaion = Location::create([
            'user_id' => $user->id,
            'company_id' => $company->id,
            'location_name' => 'Default',
            'location_address' => 'Default',
            'location_code' => '1'
        ]);


        $users = User::Find($user->id);
        $users->company_id = $company->id;
        $users->save();

        $users2 = User::Find($user->id);
        $users2->account_id = $account->id;
        $users2->save();

        $users3 = User::Find($user->id);
        $users3->department_id = $departments->id;
        $users3->save();


        return $user;   


    }
}
