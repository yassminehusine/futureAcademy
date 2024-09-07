<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DTO\frontDTO;
use App\Repository\interface\IfrontRepository;
use RealRashid\SweetAlert\Facades\Alert;

class SliderController extends Controller
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
        return view('layouts.dashboard.front.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($request)
    {
        $slider = frontDTO::handleSlider($request);
        // dd($slider);
        $this->frontRepository->createSlider($slider);
        Alert::success('Success Toast','success');
        return redirect()->route('slider.index');       }

 
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $slider = $this->frontRepository->getSliderById($id);
        return view('layouts.dashboard.front.slider.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($request, string $id)
    {
      // Convert the request to a DTO
      $data = frontDTO::handleSlider($request);
      $this->frontRepository->updateSlider($data, $id);
      return redirect()->route('slider.index')->with('success', 'slider updated successfully');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->frontRepository->deleteSlider($id);
        return redirect()->back();

    }
}
