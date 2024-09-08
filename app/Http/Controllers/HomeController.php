<?php
namespace App\Http\Controllers;
use App\Enums\Rolse;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Navbar;
use App\Models\Header;
use App\Models\Footer;
use App\Models\User;

class HomeController extends Controller

{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = Slider::all();
        $navbar= Navbar::all();
        $instructors = User::where('role','doctors')->with('department')->limit(3)->get();
        return view('welcome', compact(['sliders','instructors','navbar']));
    }
}
