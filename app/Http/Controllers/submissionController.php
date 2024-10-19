<?php

namespace App\Http\Controllers;

use App\Models\assignmentModel;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\submissionModel;
use Auth;
use App\Http\Requests\submissionRequest;
use App\DTO\submissionDTO;
use App\Repository\interface\IsubmissionRepository;
use App\Models\User;
use App\Notifications\UserActivityNotification;


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
        $notifications = auth()->user()->unreadNotifications();

        //dd($submissions);
        return view('layouts.dashboard.submissions.index',compact(['submissions','notifications']));
       
       }
       
    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $assignment = assignmentModel::where('id',$id)->first();
        $notifications = auth()->user()->unreadNotifications();


        return view('layouts.dashboard.submissions.create', ['id' => $id , 'assignment' => $assignment , 'notifications' => $notifications ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(submissionRequest $request , $id){
        $submission = submissionDTO::handleInputs($request , $id);
        $this->submissionRepository->create($submission);
        Alert::success('Success Toast','success');
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->route('submission.show',['id' => Auth::id()] );   
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       $submissions = submissionModel::where('user_id',"=",$id)->get();
       $notifications = auth()->user()->unreadNotifications();

       return view('layouts.dashboard.submissions.show', compact(['submissions','notifications']));
    }

    public function edit(string $id)
    {
        $assignment_id = $id;
        $submission = $this->submissionRepository->getById($id);
        $notifications = auth()->user()->unreadNotifications();

        return view('layouts.dashboard.submissions.edit', compact([$assignment_id,'submission','notifications']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(submissionRequest $request, string $id ,$assign_id)
    {
      // Convert the request to a DTO
      $data = submissionDTO::handleInputs($request, $assign_id);
      $this->submissionRepository->update($data, $id);
    //   $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
    //   $admin->notify(new UserActivityNotification('A new user was created.'));
      return redirect()->route('submission.index')->with('success', ' updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->submissionRepository->delete($id);
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->back();

    }
}
