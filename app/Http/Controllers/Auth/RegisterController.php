<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Group;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    //Override the showRegistrationForm function of the original "RegistersUsers" trait for pass variables to the form view
    public function showRegistrationForm()
    {
        $groups = Group::all();

        return view('auth.register', compact('groups'));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if ($data['cnpj']) {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'type' => ['required'],
                'cnpj' => ['max:18', 'unique:users'],
                'ie' => ['max:9'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
        }
        else
        {
            return Validator::make($data, [
                'name' => ['required', 'string', 'max:255'],
                'type' => ['required'],
                'cpf' => ['max:14', 'unique:users'],
                'rg' => ['max:12'],
                'password' => ['required', 'string', 'min:8', 'confirmed']
            ]);
        }
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $cnpj = $data['cnpj'] ? $data['cnpj'] : 'N/A';
        $cpf = $data['cpf'] ? $data['cpf'] : 'N/A';
        $ie = $data['ie'] ? $data['ie'] : 'N/A';
        $rg = $data['rg'] ? $data['rg'] : 'N/A';

        return User::create([
            'name' => $data['name'],
            'type' => $data['type'],
            'cpf' => $cpf,
            'cnpj' => $cnpj,
            'rg' => $rg,
            'ie' => $ie,
            'group_id' => $data['group'],
            'phone' => json_encode($data['phone']),
            'password' => Hash::make($data['password'])
        ]);
    }
}
