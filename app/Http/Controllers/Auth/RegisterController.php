<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


// namespace App\Http\Controllers\Auth;
// use App\Http\Controllers\Controller;
// use App\Models\User;
// use Illuminate\Foundation\Auth\RegistersUsers;
// use RealRashid\SweetAlert\Facades\Alert;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = '/dashboard';
    /**
     * Create a new controller instance.
     *
     * @return void
     **/
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
  
            // dd($data);
            return  Validator::make($data,[
                'name' => ['required'],
                'image' => ['required'],
                'role' => ['required'],
                'academic_level' => ['required'],
                'GPA' => ['nullable'],
                'phone' => ['required'],
                'address' => ['required'],
                'email' => ['required'],
                'department_id' => ['required'],
                'password' => ['required'],
            ]);
         
    }
    /**
     * Create a new user instance after a valid registration.
     *
     *@param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data){
        if (isset($data['image'])) {
            $image = $data['image'];
            $newImageName = time() . $image->getClientOriginalName();
            $image->move('image/userImage/', $newImageName);
            $data['image'] = 'image/userImage/' . $newImageName;
        } 
        $hashedPassword = Hash::make($data['password']);
        return User::create([
            'name' => $data['name'] ?? null,
            'image' => $data['image'],
            'role' => $data['role'] ?? null,
            'academic_level' => $data['academic_level'] ?? null,
            'GPA' => is_numeric($data['GPA']) ? $data['GPA'] : null,
            'phone' => $data['phone'] ?? null,
            'address' => $data['address'] ?? null,
            'email' => $data['email'],
            'department_id' => $data['department_id'] ?? null,
            'password' => $hashedPassword,
        ]);
      

    }
}
