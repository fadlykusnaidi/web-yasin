<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pasien;
use App\Models\Dokter;
use App\Models\Obat;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Auth;


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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user=Auth::user();
        $pasien=Pasien::count();
        $laki=Pasien::where('jk','laki-laki')->count();
        $perempuan=Pasien::where('jk','perempuan')->count();
        $dokter=Dokter::count();
        $obat=Obat::count();
        $rekamMedis=RekamMedis::count();
        return view('dashboard',compact('pasien','laki','perempuan','dokter','obat','rekamMedis','user'));
    }

    
}
