<?php
namespace App\Http\Controllers;
use App\Http\Requests\MaterialRequest;
use App\DTO\materialDTO;
use App\Models\materialModel;
use App\Repository\interface\ImaterialRepository;
use App\Repository\interface\IcoursesRepository;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class materialController extends Controller
{
    protected $courseRepository;
    protected $departmentRepository;
    protected $userRepository;
    public function __construct(IcoursesRepository $courseRepository, ImaterialRepository $materialRepository){
        $this->middleware(['Admin','doctors']);
        $this->courseRepository = $courseRepository;
        $this->materialRepository = $materialRepository;
    }
    /**
     * Display a listing of the resource.
     **/
    public function index()
    {
        $materials = $this->materialRepository->getAll();
        materialModel::with('course')->get();
       return view('layouts.dashboard.materials.index',compact('materials'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->courseRepository->getAll();
        return view('layouts.dashboard.material.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialRequest $request){
        // dd($request);
        $material = materialsDTO::handleInputs($request);
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
        return view('layouts.dashboard.material.edit', compact('courses','material'));

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
