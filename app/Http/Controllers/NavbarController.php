<?php

namespace App\Http\Controllers;

use App\DTO\frontDTO;
use App\Repository\interface\IfrontRepository;
use RealRashid\SweetAlert\Facades\Alert;

class NavbarController extends Controller
{

    protected $frontRepository;

    public function __construct(IfrontRepository $frontRepository){
        $this->middleware(['auth','Doctors']);
        $this->frontRepository = $frontRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.front.navbar.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $navbar = frontDTO::handleNav($request);
        // dd($navbar);
        $this->frontRepository->createNav($navbar);
        Alert::success('Success Toast','success');
        return redirect()->route('navbar.index');       }

 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $navbar = $this->frontRepository->getNavById($id);
        return view('layouts.dashboard.navbars.edit', compact('navbar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
      // Convert the request to a DTO
      $data = frontDTO::handleNav($request);
      $this->frontRepository->updateNav($data, $id);
      return redirect()->route('navbar.index')->with('success', 'navbar updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->frontRepository->deleteNav($id);
        return redirect()->back();

    }
}
