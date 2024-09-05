<?php
namespace App\Http\Controllers;
use App\Http\Requests\MaterialRequest;
use App\DTO\materialDTO;
use App\Models\materialModel;
use App\Repository\interface\ImaterialRepository;
use App\Repository\interface\IcoursesRepository;
use App\Repository\interface\IUserRepository;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class materialController extends Controller
{
    protected $courseRepository;
    protected $materialRepository;
    protected $userRepository;
    public function __construct(IcoursesRepository $courseRepository, ImaterialRepository $materialRepository , IUserRepository $userRepository){
        $this->middleware(['auth']);
        $this->courseRepository = $courseRepository;
        $this->materialRepository = $materialRepository;
        $this->userRepository = $userRepository;
    }
    /**
     * Display a listing of the resource.
     **/
    public function index()
    {
        $materials = $this->materialRepository->getAll();
        
       return view('layouts.dashboard.material.index',compact('materials'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->courseRepository->getAll();
        $users = $this->userRepository->getAllUsers();
        return view('layouts.dashboard.material.create', compact('courses','users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialRequest $request){
        // dd($request);
        $material = materialDTO::handleInputs($request);
        // dd($material);
        $this->materialRepository->create($material);
        Alert::success('Success Toast','success');
        return redirect()->route('material.index');   
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //$material = $this->materialRepository->getById($id);
       //return view('layouts.dashboard.material.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = $this->materialRepository->getById($id);
        $courses = $this->courseRepository->getAll();
          $users = $this->userRepository->getAllUsers();
        return view('layouts.dashboard.material.edit', compact('courses','material','users'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialRequest $request, string $id)
    {
      // Convert the request to a DTO
      $data = materialDTO::handleInputs($request);
      $this->materialRepository->update($data, $id);
      return redirect()->route('material.index')->with('success', 'Course updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->materialRepository->delete($id);
        return redirect()->back();

    }
}
