<?php
namespace App\Http\Controllers;
use App\DTO\postDTO;
use App\Http\Requests\postRequest;
use App\Repository\interface\IpostRepository;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
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
        $notifications = auth()->user()->unreadNotifications();

        return view('layouts.dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        $notifications = auth()->user()->unreadNotifications();

        return view('layouts.dashboard.posts.create');
    }

    public function store(postRequest $request)
    {
        
        $data = postDTO::handleInputs($request);
        $this->postRepository->create($data);
        Alert::success('Success Toast','success');
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->route('post.index');
      

    }
    public function show(string $id)
    {
        $post = $this->postRepository->getById($id);
        $notifications = auth()->user()->unreadNotifications();

        return view('layouts.dashboard.posts.show', compact('post'));
    }
    public function edit($id)
    {
        $post = $this->postRepository->getById($id);
        $notifications = auth()->user()->unreadNotifications();

        return view('layouts.dashboard.posts.edit', compact('post'));
    }
    public function update(postRequest $request, string $id)
    {
        $data = postDTO::handleInputs($request);
        $this->postRepository->update($data, $id);
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->route('post.index')->with('success', 'post updated successfully');
    }
    public function destroy($id){
        $this->postRepository->delete($id);
        Alert::success('Success', 'post deleted successfully');
        // $admin = User::where('role','=','Admin'); // Assuming admin user ID is 1
        // $admin->notify(new UserActivityNotification('A new user was created.'));
        return redirect()->back();
    }
}