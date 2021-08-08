<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\StudentClasse;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\UserProfile;
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
    protected $redirectTo = '/panel';

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
        // return Validator::make($data, [
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);

        return Validator::make($data, [
            'usr' => 'required|string|min:3|max:255|unique:users',
            'n_full' => 'required|string|min:3|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'class_code' => 'exists:classes,class_id|string',
        ],
        [
            'n_full.required' => 'The fullname is required.',
            'n_full.min' => 'The fullname must be at least 3 characters.',
            'usr.min' => 'The username must be at least 3 characters.',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $out = User::create([
            'usr' => $data['usr'],
            'permissions' => 2,
            'password' => bcrypt($data['password']),
        ]);

        $usr = User::select('usr_id')->where('usr', $data['usr'])->first();

        UserProfile::create([
            'usr_id' => $usr->usr_id,
            // 'given_name' => $data['n_given'],
            'usr_identification_numb' => $usr->usr_id + 171200000,
            'full_name' => $data['n_full'],
            // 'middle_name' => $data['n_middle'],
            'ext_name' => $data['n_ext'],
        ]);

        StudentClasse::create([
            'student_id' => $usr->usr_id,
            'class_id' => $data['class_code'],
        ]);

        return $out;
    }
}
