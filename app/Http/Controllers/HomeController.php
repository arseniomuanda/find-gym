<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Ginasios;
use App\Models\Inscricao;
use App\Models\User;
use App\Models\Visitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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
        if (auth()->user()->role === 1) {
            $users = User::where('id', '>=', 1)->get()->count();
            $gyms = Ginasios::all()->count();
            $subs = Inscricao::all()->count();
            $visitantes = Visitas::orderBy('created_at', 'desc')->take(10)->get();
            return view('admin.dashboard', compact('users', 'gyms', 'subs', 'visitantes'));
        }
        $categorias = Categorias::all();
        return view('site.home', compact('categorias'));
    }
}
