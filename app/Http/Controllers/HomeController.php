<?php

namespace App\Http\Controllers;
use App\Models\Criteria;
use App\Models\Alternative;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $userId = auth()->user()->id;
    
        $jumlahKriteria = Criteria::where('user_id', $userId)->count();
        $jumlahAlternatif = Alternative::where('user_id', $userId)->count();
        
        return view('dashboard', compact('jumlahKriteria', 'jumlahAlternatif'));

    }
}
