<?php

namespace App\Http\Controllers\Auth;

use App\User;

use Uuid;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller{
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

    protected $redirectTo = '/jobs';

    /* Create a new controller instance. */
    public function __construct(){
        $this->middleware('guest');
    }

    /* Validate User. */
    protected function validator(array $data){
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employers',
            'state' => 'required|string|in:vic,nsw,qld,wa,sa,tas,act,nt,oth',
            'city' => 'required|string|regex:/^[a-zA-Z ]+$/|max:255',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    /* Create User. */
    protected function create(array $data){
        return User::create([
            'id' => Uuid::generate(),
            'name' => $data['name'],
            'email' => $data['email'],
            'state' => $data['state'],
            'city' => $data['city'],
            'password' => bcrypt($data['password'])
        ]);
    }
}
