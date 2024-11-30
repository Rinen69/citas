<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'ap' => ['nullable', 'string', 'max:255'], // Apellido paterno
            'am' => ['nullable', 'string', 'max:255'], // Apellido materno
            'telefono' => ['nullable', 'string', 'max:15'], // Teléfono
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
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'ap' => $data['ap'], // Guardar apellido paterno
            'am' => $data['am'], // Guardar apellido materno
            'telefono' => $data['telefono'], // Guardar teléfono
            'rol' => ['required', 'in:medico,paciente'],
        ]);
        //DB::statement('CALL insertausuarios(?, ?)', [$user->id, $request->input('rol')]);
        if (!empty($data['rol'])) {
            DB::statement('CALL insertausuarios(?, ?)', [$user->id, $data['rol']]);
        }
    
        return $user;
        
    }
    
}
