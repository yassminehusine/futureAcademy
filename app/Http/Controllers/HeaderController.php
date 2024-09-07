<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTO\frontDTO;
use App\Repository\interface\IfrontRepository;
use RealRashid\SweetAlert\Facades\Alert;

class HeaderController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('layouts.dashboard.front.header.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $header = frontDTO::handleheader($request);
        // dd($header);
        $this->frontRepository->createheader($header);
        Alert::success('Success Toast','success');
        return redirect()->route('header.index');       }

 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $header = $this->frontRepository->getheaderById($id);
        return view('layouts.dashboard.front.header.edit', compact('header'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
      // Convert the request to a DTO
      $data = frontDTO::handleheader($request);
      $this->frontRepository->updateheader($data, $id);
      return redirect()->route('header.index')->with('success', 'header updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->frontRepository->deleteheader($id);
        return redirect()->back();

    }
}
