<?php
namespace App\Http\Controllers;
use App\DTO\postDTO;
use App\Http\Requests\postRequest;
use App\Repository\interface\IpostRepository;
use RealRashid\SweetAlert\Facades\Alert;

class postController extends Controller
{
    protected $postRepository;

    public function __construct(IpostRepository $postRepository)
    {
        $this->middleware(['auth', 'Admin']);
        // $this->middleware('Admin')->only([
        //     'create', 'store', 'edit', 'update', 'destroy'
        // ]);
        $this->postRepository = $postRepository;
    }

    public function index()
    {
        $posts = $this->postRepository->getAll();
        return view('layouts.dashboard.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('layouts.dashboard.posts.create');
    }

    public function store(postRequest $request)
    {
        
        $data = postDTO::handleInputs($request);
        $this->postRepository->create($data);
        Alert::success('Success Toast','success');
        return redirect()->route('post.index');
      

    }
    public function show(string $id)
    {
        $post = $this->postRepository->getById($id);
        return view('layouts.dashboard.posts.show', compact('post'));
    }
    public function edit($id)
    {
        $post = $this->postRepository->getById($id);
        return view('layouts.dashboard.posts.edit', compact('post'));
    }
    public function update(postRequest $request, string $id)
    {
        $data = postDTO::handleInputs($request);
        $this->postRepository->update($data, $id);
        return redirect()->route('post.index')->with('success', 'post updated successfully');
    }
    public function destroy($id){
        $this->postRepository->delete($id);
        Alert::success('Success', 'post deleted successfully');
        return redirect()->back();
    }
}