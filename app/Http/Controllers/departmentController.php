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
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.department.index', compact(['departments','notifications']));
    }

    public function create(){
    if (Auth::check()) {
        $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
    } else {
        $notifications = collect();
    }
        return view('layouts.dashboard.department.create', compact('notifications'));
    }

    public function store(departmentRequest $request)
    {
        
        $data = departmentDTO::handleInputs($request);
        $this->departmentRepository->create($data);
        Alert::success('Success Toast','success');
        $users = User::where('role','Admin')->get();
        $notification = new UserActivityNotification();
        foreach ($users as $admin) {
            $admin->notify($notification);
        }
        return redirect()->route('department.index');
      

    }
    public function show(string $id)
    {

        $department = $this->departmentRepository->getById($id);
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.department.show', compact(['department','notifications']));
    }
    public function edit($id)
    {
        $department = $this->departmentRepository->getById($id);
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.department.edit', compact(['department','notifications']));
    }
    public function update(departmentRequest $request, string $id)
    {
        $data = departmentDTO::handleInputs($request);
        $this->departmentRepository->update($data, $id);
        $users = User::where('role','Admin')->get();
        $notification = new UserActivityNotification();
        foreach ($users as $admin) {
            $admin->notify($notification);
        }
        return redirect()->route('department.index')->with('success', 'Department updated successfully');
    }
    public function destroy($id){
        $this->departmentRepository->delete($id);
        Alert::success('Success', 'Department deleted successfully');
        $users = User::where('role','Admin')->get();
        $notification = new UserActivityNotification();
        foreach ($users as $admin) {
            $admin->notify($notification);
        }
        return redirect()->back();
    }
}