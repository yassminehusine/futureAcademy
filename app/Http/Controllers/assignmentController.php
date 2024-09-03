<?php
namespace App\Http\Controllers;
use App\Http\Requests\assignmentRequest;
use App\DTO\assignmentDTO;
use App\Models\assignmentModel;
use App\Repository\interface\IassignmentRepository;
use App\Repository\interface\IcoursesRepository;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class assignmentController extends Controller
{
    protected $courseRepository;
    protected $assignmentRepository;
    protected $userRepository;
    public function __construct(IcoursesRepository $courseRepository, IassignmentRepository $assignmentRepository){
        $this->middleware(['Doctors']);
        $this->courseRepository = $courseRepository;
        $this->assignmentRepository = $assignmentRepository;
    }
    /**
     * Display a listing of the resource.
     **/
    public function index()
    {            
         $assignments = $this->assignmentRepository->getAll();

        if (Auth::user()->role == "Admin"){
        // assignmentModel::with('course')->get();
       return view('layouts.dashboard.assignments.index',compact('assignments'));}
       else {
        $assignmentForCourse = assignmentModel::with('user_courses')->having('year','=',$assignments->year)->get();
        dd($assignmentForCourse);
        return view('layouts.dashboard.assignments.index',compact('assignmentForCourse'));};
       }
       
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->courseRepository->getAll();
        return view('layouts.dashboard.assignment.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(assignmentRequest $request){
        // dd($request);
        $assignment = assignmentDTO::handleInputs($request);
        // dd($assignment);
        $this->assignmentRepository->create($assignment);
        Alert::success('Success Toast','success');
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
        return view('layouts.dashboard.assignment.edit', compact('courses','assignment'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(assignmentRequest $request, string $id)
    {
      // Convert the request to a DTO
      $data = assignmentDTO::handleInputs($request);
      $this->assignmentRepository->update($data, $id);
      return redirect()->route('assignment.index')->with('success', 'Course updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->assignmentRepository->delete($id);
        return redirect()->back();

    }
}
