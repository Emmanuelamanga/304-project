<?php

namespace App\Http\Controllers\TeacherAuth;

use App\Teacher;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;

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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('teacher.guest');
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
            'name' => 'required|max:255',
            'tel' => 'required|max:255',
            'id_no' => 'required|max:255',
            'email' => 'required|email|max:255|unique:teachers',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return Teacher
     */
    // protected function create(array $data)
    // {
    //     return Teacher::create([
    //         'name' => $data['name'],
    //         'tel' => $data['tel'],
    //         'id_no' => $data['id_no'],
    //         'email' => $data['email'],
    //         'password' => bcrypt($data['password']),
    //     ]);
    // }

    protected function create(array $data)
    {
        $user =  User::create([
            'name' => $data['name'],
            'tel' => $data['tel'],
            'id_no' => $data['id_no'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
 
        Mail::to('46b8b6bc41-266416@inbox.mailtrap.io')->send(new WelcomeMail($user));
 
        return $user;
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('admin.pages.register-teacher');
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('teacher');
    }
}
