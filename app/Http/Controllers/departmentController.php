<?php
namespace App\Http\Controllers;
use App\DTO\departmentDTO;
use App\Http\Requests\departmentRequest;
use App\Repository\interface\IdepartmentRepository;
use RealRashid\SweetAlert\Facades\Alert;
use Auth;
use App\Models\User;
use App\Notifications\UserActivityNotification;
class departmentController extends Controller
{
    protected $departmentRepository;

    public function __construct(IdepartmentRepository $departmentRepository)
    {
        $this->middleware(['auth', 'Admin']);

        $this->departmentRepository = $departmentRepository;
    }

    public function index()
    {
        $departments = $this->departmentRepository->getAll();
        return view('layouts.dashboard.department.index', compact('departments'));
    }

    public function create()
    {
        return view('layouts.dashboard.department.create');
    }

    public function store(departmentRequest $request)
    {
        
        $data = departmentDTO::handleInputs($request);
        $this->departmentRepository->create($data);
        Alert::success('Success Toast','success');
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->route('department.index');
      

    }
    public function show(string $id)
    {
        $department = $this->departmentRepository->getById($id);
        return view('layouts.dashboard.department.show', compact('department'));
    }
    public function edit($id)
    {
        $department = $this->departmentRepository->getById($id);
        return view('layouts.dashboard.department.edit', compact('department'));
    }
    public function update(departmentRequest $request, string $id)
    {
        $data = departmentDTO::handleInputs($request);
        $this->departmentRepository->update($data, $id);
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->route('department.index')->with('success', 'Department updated successfully');
    }
    public function destroy($id){
        $this->departmentRepository->delete($id);
        Alert::success('Success', 'Department deleted successfully');
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->back();
    }
}