<?php 
namespace App\Http\Controllers;
// use App\Http\Requests\departmentRequest;
// use App\Repository\departmentRepository;
// use App\Enums\Role;
use App\Enums\departmentRolse;
use App\Enums\Rolse;
use App\Http\Requests\UserRequest;
use App\DTO\UserDTO;
use App\Repository\interface\IUserRepository;
use App\Repository\interface\IdepartmentRepository;
use DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
class UsersController extends Controller{ 
    protected $userRepository;
    protected $departmentRepository;
    public function __construct(IUserRepository $userRepository,IdepartmentRepository  $departmentRepository)
    {
        $this->middleware(['auth','Admin'])->except([
            'main', 'show'
        ]);
        $this->userRepository = $userRepository;
        $this->departmentRepository = $departmentRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(){
      $users = $this->userRepository->getAllUsers();
        User::with('department')->get()->pluck('department');
        // dd($users);
       return view('layouts.dashboard.users.index' , compact('users'));
    }
    public function  main(){
        $doctors = $this->userRepository->getCount(Rolse::DOCTORS);
        $students = $this->userRepository->getCount(Rolse::STUDENTS);
        $admin = $this->userRepository->getCount(Rolse::ADMIN);
        $totalDepartments = 0;
        $totalDepartments = 0;
         foreach (departmentRolse::cases() as $role) {
             $totalDepartments += $this->departmentRepository->getCountByRole($role);
          }
            if (Auth::check()) {
                $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
            } else {
                $notifications = collect();
            }
            return view('layouts.dashboard.layout2', [
                'doctors' => $doctors,
                'students' => $students,
                'admin' => $admin,
                'totalDepartments' => $totalDepartments,
                'notifications' => $notifications,
            ]);

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = $this->departmentRepository->getAll();
        return view('layouts.dashboard.users.create', compact('departments'));
    }   
    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        // dd($request);
        $userDTO = UserDTO::handleInputs($request);
        $this->userRepository->create($userDTO);
        Alert::success('Success', 'User created successfully');
        return redirect()->route('user.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id){
        $user = User::findOrFail(Auth::id());
        // $department = DB::table('departments')->join('users','users.department_id','=','department_id')->select('department_name')->where('department_id',"=",$user->department_id)->first();
         $department = DB::table('departments')->join('users', 'users.department_id', '=', 'departments.id')->select('departments.department_name')->where('users.department_id', $user->department_id)->first();
        // dd($department);
        return view('layouts.dashboard.profile.index',compact('user','department'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = $this->userRepository->getUserById($id);
        $departments = $this->departmentRepository->getAll();
        return view('layouts.dashboard.users.edit', compact('user', 'departments'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, string $id)
    {
        $userDTO = UserDTO::handleInputs($request);
        $this->userRepository->update($userDTO, $id);
        Alert::success('Success', 'User updated successfully');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->userRepository->delete($id);
        Alert::success('Success', 'User deleted successfully');
        return redirect()->back();
    } 
}

?>
