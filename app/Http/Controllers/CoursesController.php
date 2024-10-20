<?php
namespace App\Http\Controllers;
use App\Http\Requests\CourseRequest;
use App\DTO\coursesDTO;
use App\Models\coursesModel;
use App\Repository\interface\IcoursesRepository;
use App\Repository\interface\IdepartmentRepository;
use App\Models\User;
use Auth;
use App\Notifications\UserActivityNotification;
use RealRashid\SweetAlert\Facades\Alert;

class CoursesController extends Controller
{
    protected $courseRepository;
    protected $departmentRepository;
    protected $userRepository;
    public function __construct(IcoursesRepository $courseRepository, IdepartmentRepository $departmentRepository)
    {
        $this->middleware(['auth', 'Doctors']);
        $this->courseRepository = $courseRepository;
        $this->departmentRepository = $departmentRepository;
    }
    /**
     * Display a listing of the resource.
     **/
    public function index()
    {
        $courses = $this->courseRepository->getAll();
        coursesModel::with('department')->get();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.courses.index', compact(['courses', 'notifications']));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = $this->departmentRepository->getAll();
        // $notifications = auth()->user()->notifications()->get();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.courses.create', compact(['departments', 'notifications']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request)
    {
        // dd($request);
        $courses = coursesDTO::handleInputs($request);
        // dd($course);
        $this->courseRepository->create($courses);
        Alert::success('Success Toast', 'success');
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'New Course Created',
            'body' => 'A new Course named ' . $request->title . ' has been created.',
            'icon' => 'fas fa-presentation',
            'url' => route('course.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->route('course.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$courses = $this->courseRepository->getById($id);
        //return view('layouts.dashboard.department.show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $course = $this->courseRepository->getById($id);
        $departments = $this->departmentRepository->getAll();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.courses.edit', compact(['course', 'departments', 'notifications']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
        // Convert the request to a DTO
        $data = coursesDTO::handleInputs($request);
        $this->courseRepository->update($data, $id);
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'Course Updated',
            'body' => 'Course named ' . $request->title . ' has been updated.',
            'icon' => 'fas fa-presentation',
            'url' => route('course.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->route('course.index')->with('success', 'Course updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->courseRepository->delete($id);
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'Course Deleted',
            'body' => 'Course no ' . $id . ' has been deleted.',
            'icon' => 'fas fa-presentation',
            'url' => route('course.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->back();

    }
}
