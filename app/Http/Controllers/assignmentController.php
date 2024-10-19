<?php
namespace App\Http\Controllers;
use App\Http\Requests\assignmentRequest;
use App\DTO\assignmentDTO;
use App\Models\assignmentModel;
use App\Models\user_course;
use App\Repository\interface\IassignmentRepository;
use App\Repository\interface\IcoursesRepository;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use App\Notifications\UserActivityNotification;

class assignmentController extends Controller
{
    protected $courseRepository;
    protected $assignmentRepository;
    protected $userRepository;
    public function __construct(IcoursesRepository $courseRepository, IassignmentRepository $assignmentRepository)
    {
        $this->middleware(['Doctors'])->except('show');
        $this->courseRepository = $courseRepository;
        $this->assignmentRepository = $assignmentRepository;
    }
    /**
     * Display a listing of the resource.
     **/
    public function index()
    {

        if (Auth::user()->role == "Admin") {
            $assignments = assignmentModel::with(['course', 'user'])->get();
            return view('layouts.dashboard.assignments.index', compact('assignments'));
        } else if (Auth::user()->role == "doctors") {
            $assignments = assignmentModel::with(['course', 'user'])->where('user_id', Auth::id())->get();
            if (Auth::check()) {
                $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
            } else {
                $notifications = collect();
            }
            return view('layouts.dashboard.assignments.index', compact(['assignments', 'notifications']));
        }
        ;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $course = user_course::where('user_id', $id)->with(['user', 'course'])->get();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.assignments.create', compact(['course', 'notifications']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(assignmentRequest $request)
    {
        // dd($request);
        $assignment = assignmentDTO::handleInputs($request);
        // dd($assignment);
        $this->assignmentRepository->create($assignment);
        Alert::success('Success Toast', 'success');
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'New Assigment Created',
            'body' => 'A new Assigment named ' . $request->title . ' has been created.',
            'icon' => 'fas fa-file',
            'url' => route('assigment.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->route('assignment.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //$assignment = $this->assignmentRepository->getById($id);
        //return view('layouts.dashboard.assignment.show', compact('assignment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $assignment = $this->assignmentRepository->getById($id);
        $courses = $this->courseRepository->getAll();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.assignments.edit', compact(['courses', 'assignment', 'notifications']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(assignmentRequest $request, string $id)
    {
        // Convert the request to a DTO
        $data = assignmentDTO::handleInputs($request);
        $this->assignmentRepository->update($data, $id);
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'Assignment Updated',
            'body' => 'Assignment named ' . $request->title . ' has been updated.',
            'icon' => 'fas fa-file',
            'url' => route('assignment.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->route('assignment.index')->with('success', 'Course updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->assignmentRepository->delete($id);
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'Assignment Deleted',
            'body' => 'Assignment no ' . $id . ' has been deleted.',
            'icon' => 'fas fa-file',
            'url' => route('assignment.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->back();

    }
}
