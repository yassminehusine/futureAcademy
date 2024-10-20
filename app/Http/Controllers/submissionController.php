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


    public function __construct(IsubmissionRepository $submissionRepository)
    {
        $this->middleware(['auth']);
        $this->submissionRepository = $submissionRepository;
    }
    /**
     * Display a listing of the resource.
     **/
    public function index()
    {

        $submissions = submissionModel::with(['assignment'])->where('user_id', Auth::id())->get();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        //dd($submissions);
        return view('layouts.dashboard.submissions.index', compact(['submissions', 'notifications']));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $assignment = assignmentModel::where('id', $id)->first();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }

        return view('layouts.dashboard.submissions.create', ['id' => $id, 'assignment' => $assignment, 'notifications' => $notifications]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(submissionRequest $request, $id)
    {
        $submission = submissionDTO::handleInputs($request, $id);
        $this->submissionRepository->create($submission);
        Alert::success('Success Toast', 'success');
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'New Submission Created',
            'body' => 'A new submission for assigment ' . $id . ' has been created.',
            'icon' => 'fas fa-edit',
            'url' => route('submission.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->route('submission.show', ['id' => Auth::id()]);
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $submissions = submissionModel::where('user_id', "=", $id)->get();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.submissions.show', compact(['submissions', 'notifications']));
    }

    public function edit(string $id)
    {
        $assignment_id = $id;
        $submission = $this->submissionRepository->getById($id);
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.submissions.edit', compact([$assignment_id, 'submission', 'notifications']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(submissionRequest $request, string $id, $assign_id)
    {
        // Convert the request to a DTO
        $data = submissionDTO::handleInputs($request, $assign_id);
        $this->submissionRepository->update($data, $id);
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'Submission Updated',
            'body' => 'Submission for ' . $assign_id . ' has been updated.',
            'icon' => 'fas fa-edit',
            'url' => route('submission.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->route('submission.index')->with('success', ' updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->submissionRepository->delete($id);
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'Submission Deleted',
            'body' => 'Submission no ' . $id . ' has been deleted.',
            'icon' => 'fas fa-edit',
            'url' => route('submission.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->back();

    }
}
