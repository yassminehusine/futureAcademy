<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTO\frontDTO;
use App\Repository\interface\IfrontRepository;
use RealRashid\SweetAlert\Facades\Alert;

class FooterController extends Controller
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
         return view('layouts.dashboard.front.footer.create');
     }
 
     /**
      * Store a newly created resource in storage.
      */
     public function store($request)
     {
         $footer = frontDTO::handlefooter($request);
         // dd($footer);
         $this->frontRepository->createfooter($footer);
         Alert::success('Success Toast','success');
         return redirect()->route('footer.index');       }
 
  
     /**
      * Show the form for editing the specified resource.
      */
     public function edit(string $id)
     {
         $footer = $this->frontRepository->getfooterById($id);
         return view('layouts.dashboard.front.footer.edit', compact('footer'));
     }
 
     /**
      * Update the specified resource in storage.
      */
     public function update($request, string $id)
     {
       // Convert the request to a DTO
       $data = frontDTO::handlefooter($request);
       $this->frontRepository->updatefooter($data, $id);
       return redirect()->route('footer.index')->with('success', 'footer updated successfully');
         
     }
 
     /**
      * Remove the specified resource from storage.
      */
     public function destroy(string $id)
     {
         $this->frontRepository->deletefooter($id);
         return redirect()->back();
 
     }
 }
 