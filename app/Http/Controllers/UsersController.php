<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $utilizadores = User::all();
        return view('admin.utilizadores.listar', compact('utilizadores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }
    public function admin(int $id)
    {
        $utilizador = User::find($id);
        return view('admin.utilizadores.perfil', compact('utilizador'));
    }

    public function site(int $id)
    {
        $utilizador = User::find($id);
        return view('site.userPerdil', compact('utilizador'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'old_pass' => ['required'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        $utilizador = User::find($id);

        if (password_verify($request->old_pass, $utilizador->password)) {
            // return dd($utilizador);
            $utilizador->password = Hash::make($request->password);
            $utilizador->save();
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
