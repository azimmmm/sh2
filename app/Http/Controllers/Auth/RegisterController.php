<?php

namespace App\Http\Controllers\Auth;

use App\City;
use App\Http\Controllers\Controller;
use App\Province;
use App\User;
use App\Address;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
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
       return User::create([
            'name'=> $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
]);
    }

    public function index()
    {
        App::setLocale('fa');
//        dd(App::getLocale());
        $states=Province::all()->pluck('name','id');
        return view('Auth.register',compact('states'));
}
    public function getCities($id)
    {

        $cities=City::where('province_id',$id)->get()->pluck('name','id');

        return json_encode($cities);
    }
    public function indexPost(Request $request)

    {
        App::setLocale('fa');



        $validator = Validator::make($request->all(), [

            'first_name' => ['required', 'string', 'max:255'],

            'last_name' =>['required', 'string', 'max:255'],

            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],

            'address' =>['required','string'],
            'phone' => ['required'],
            'city' => 'required',
            'state' => 'required',
            'postcode' => 'required|digits:10',
            'national_code' => 'required|digits:10',
            'password' => ['required']


        ]);



        if ($validator->passes()) {

            $user = new User();
            $user->name = $request['first_name'];
            $user->last_name = $request['last_name'];
            $user->email = $request['email'];
            $user->national_code = $request['national_code'];
            $user->phone = $request['phone'];
            $user->password = Hash::make($request['password']);
            $user->save();
            $address=new Address();
            $address->post_code= $request['postcode'];
            $address->city_id= $request['city'];
            $address->state_id= $request['state'];
            $address->address= $request['address'];
            $address->user_id=$user->id;
            $address->save();

            return response()->json(['success'=>'Added new records.']);

        }



        return response()->json(['error'=>$validator->errors()->all()]);
//
   }
}
