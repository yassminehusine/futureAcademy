<?php
namespace App\Http\Controllers;
use App\DTO\user_courseDTO;
use App\Http\Requests\user_coursesRequest;
use App\Repository\interface\IcoursesRepository;
use App\Repository\interface\Iuser_coursesRepository;
use App\Repository\interface\IUserRepository;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Models\user_course;
class user_coursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected    $user_coursesRepository;
     protected    $userRepository;
     protected    $coursesRepository;
     public function __construct(Iuser_coursesRepository $user_coursesRepository,IUserRepository $userRepository,IcoursesRepository  $coursesRepository) {
         $this->middleware(['auth', 'Admin']);
         $this->user_coursesRepository = $user_coursesRepository;
         $this->userRepository = $userRepository;
         $this->coursesRepository = $coursesRepository;
     }
    public function index(){ 
        $user_courses = user_course::with(['user', 'course'])->get();
        return view('layouts.dashboard.user_courses.index',compact('user_courses'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
       $users = $this->userRepository->getAllUsers();
       $courses = $this->coursesRepository->getAll();
       return  view('layouts.dashboard.user_courses.create',compact('users', 'courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(user_coursesRequest $request){
        $user_courses = user_courseDTO::handleInputs($request);
        // dd($user_courses);
        $this->user_coursesRepository->create($user_courses);
        Alert::success('Success', 'User Course created successfully');
        return redirect()->route('user_course.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
