<?php

namespace App\Http\Controllers;

use App\Models\assignmentModel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\submissionModel;
use Auth;
use App\Http\Requests\submissionRequest;
use App\DTO\submissionDTO;
use App\Repository\interface\IsubmissionRepository;


class submissionController extends Controller
{
    protected $assignmentRepository;
    protected $submissionRepository;


    public function __construct(IsubmissionRepository $submissionRepository){
        $this->middleware(['auth']);
        $this->submissionRepository = $submissionRepository;
    }
    /**
     * Display a listing of the resource.
     **/
    public function index()
    {            

        $submissions = submissionModel::with(['assignment'])->where('user_id',Auth::id())->get();
        //dd($submissions);
        return view('layouts.dashboard.submissions.index',compact('submissions'));
       
       }
       
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $assignment = assignmentModel::where('id',$id)->get();

        return view('layouts.dashboard.submissions.create', ['id' => $id , 'assignment' => $assignment ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(submissionRequest $request , $id){
        // dd($request);
        $submission = submissionDTO::handleInputs($request , $id);
        // dd($submission);
        $this->submissionRepository->create($submission);
        Alert::success('Success Toast','success');
        return redirect()->route('submission.index');   
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //$submission = $this->submissionRepository->getById($id);
       //return view('layouts.dashboard.submission.show', compact('submission'));
    }

    public function edit(string $id)
    {
        $assignment_id = $id;
        $submission = $this->submissionRepository->getById($id);
        return view('layouts.dashboard.submissions.edit', compact($assignment_id,'submission'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(submissionRequest $request, string $id ,$c_id)
    {
      // Convert the request to a DTO
      $data = submissionDTO::handleInputs($request, $c_id);
      $this->submissionRepository->update($data, $id);
      return redirect()->route('submission.index')->with('success', ' updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->submissionRepository->delete($id);
        return redirect()->back();

    }
}
