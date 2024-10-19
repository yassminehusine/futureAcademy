<?php
namespace App\Http\Controllers;
use App\Http\Requests\MaterialRequest;
use App\DTO\materialDTO;
use App\Models\assignmentModel;
use App\Models\materialModel;
use App\Repository\interface\ImaterialRepository;
use App\Repository\interface\IcoursesRepository;
use App\Repository\interface\IUserRepository;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Auth;
use App\Notifications\UserActivityNotification;

class materialController extends Controller
{
    protected $courseRepository;
    protected $materialRepository;
    protected $userRepository;
    public function __construct(IcoursesRepository $courseRepository, ImaterialRepository $materialRepository, IUserRepository $userRepository)
    {
        $this->middleware(['auth']);
        $this->courseRepository = $courseRepository;
        $this->materialRepository = $materialRepository;
        $this->userRepository = $userRepository;

        // Replace 1 with the actual admin ID
    }
    /**
     * Display a listing of the resource.
     **/
    public function index()
    {
        $materials = $this->materialRepository->getAll();

        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.material.index', compact(['materials', 'notifications']));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = $this->courseRepository->getAll();
        $users = $this->userRepository->getAllUsers();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.material.create', compact(['courses', 'users', 'notifications']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MaterialRequest $request)
    {
        // dd($request);
        $material = materialDTO::handleInputs($request);
        // dd($material);
        $this->materialRepository->create($material);
        Alert::success('Success Toast', 'success');
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'New Material Created',
            'body' => 'A new material named ' . $request->title . ' has been created.',
            'icon' => 'fas fa-folder-open',
            'url' => route('material.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->route('material.index');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $materials = materialModel::where('courses_id', '=', $id)->get();
        $assignments = assignmentModel::where('course_id', '=', $id)->get();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.material.show', compact(['materials', 'assignments', 'notifications']));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $material = $this->materialRepository->getById($id);
        $courses = $this->courseRepository->getAll();
        $users = $this->userRepository->getAllUsers();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.material.edit', compact(['courses', 'material', 'users', 'notifications']));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MaterialRequest $request, string $id)
    {
        // Convert the request to a DTO
        $data = materialDTO::handleInputs($request);
        $this->materialRepository->update($data, $id);
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'Material Updated',
            'body' => 'Material named ' . $request->title . ' has been updated.',
            'icon' => 'fas fa-folder-open',
            'url' => route('material.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->route('material.index')->with('success', 'Course updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->materialRepository->delete($id);
        $users = User::where('role', 'Admin')->get();
        $notificationData = [
            'title' => 'Material Deleted',
            'body' => 'Material no ' . $id . ' has been deleted.',
            'icon' => 'fas fa-folder-open',
            'url' => route('material.index'),
        ];

        foreach ($users as $admin) {
            $admin->notify(new UserActivityNotification($notificationData));
        }
        return redirect()->back();

    }

    public function download($filename)
    {
        // Ensure the file path is valid and exists
        $filePath = storage_path('app/public/materials/' . $filename);
        if (!file_exists($filePath)) {
            return response()->json(['error' => 'File not found'], 404);
        }

        // Generate a download response with appropriate headers
        return response()->download($filePath, $filename, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ]);
    }
}
