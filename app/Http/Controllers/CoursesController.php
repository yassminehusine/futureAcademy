<?php
namespace App\Http\Controllers;
use App\Http\Requests\CourseRequest;
use App\DTO\coursesDTO;
use App\Models\coursesModel;
use App\Repository\interface\IcoursesRepository;
use App\Repository\interface\IdepartmentRepository;
use App\Notifications\AdminNotification;
use App\Enums\Rolse;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class CoursesController extends Controller
{
    protected $courseRepository;
    protected $departmentRepository;
    protected $userRepository;
    public function __construct(IcoursesRepository $courseRepository, IdepartmentRepository $departmentRepository){
        $this->middleware(['auth','Doctors']);
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
       return view('layouts.dashboard.courses.index',compact('courses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departments = $this->departmentRepository->getAll();
        return view('layouts.dashboard.courses.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CourseRequest $request){
        // dd($request);
        $courses = coursesDTO::handleInputs($request);
        // dd($course);
        $this->courseRepository->create($courses);
        Alert::success('Success Toast','success');
        // $user = User::where('role','Admin');
        // $user->notify(new AdminNotification());
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
        return view('layouts.dashboard.courses.edit', compact('course','departments'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CourseRequest $request, string $id)
    {
      // Convert the request to a DTO
      $data = coursesDTO::handleInputs($request);
      $this->courseRepository->update($data, $id);
      return redirect()->route('course.index')->with('success', 'Course updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->courseRepository->delete($id);
        return redirect()->back();

    }
}
