<?php
namespace App\Http\Controllers;
use App\DTO\postDTO;
use App\Http\Requests\postRequest;
use App\Repository\interface\IpostRepository;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Auth;
use App\Notifications\UserActivityNotification;

class postController extends Controller
{
    protected $postRepository;

    public function __construct(IpostRepository $postRepository)
    {
        $this->middleware(['auth', 'Admin']);
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.posts.index', compact(['posts','notifications']));
    }

    public function create()
    {
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.posts.create',compact('notifications'));
    }

    public function store(postRequest $request)
    {
        
        $data = postDTO::handleInputs($request);
        $this->postRepository->create($data);
        Alert::success('Success Toast','success');
        $users = User::where('role','Admin')->get();
        $notification = new UserActivityNotification();
        foreach ($users as $admin) {
            $admin->notify($notification);
        }
        return redirect()->route('post.index');
      

    }
    public function show(string $id)
    {
        $post = $this->postRepository->getById($id);
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.posts.show', compact(['post','notifications']));
    }
    public function edit($id)
    {
        $post = $this->postRepository->getById($id);
        if (Auth::check()) {
            $notifications = auth()->user()->notifications()->orderBy('created_at', 'desc')->limit(15)->get();
        } else {
            $notifications = collect();
        }
        return view('layouts.dashboard.posts.edit', compact(['post','notifications']));
    }
    public function update(postRequest $request, string $id)
    {
        $data = postDTO::handleInputs($request);
        $this->postRepository->update($data, $id);
        $users = User::where('role','Admin')->get();
        $notification = new UserActivityNotification();
        foreach ($users as $admin) {
            $admin->notify($notification);
        }
        return redirect()->route('post.index')->with('success', 'post updated successfully');
    }
    public function destroy($id){
        $this->postRepository->delete($id);
        Alert::success('Success', 'post deleted successfully');
        $users = User::where('role','Admin')->get();
        $notification = new UserActivityNotification();
        foreach ($users as $admin) {
            $admin->notify($notification);
        }
        return redirect()->back();
    }
}