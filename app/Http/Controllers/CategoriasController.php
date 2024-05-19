<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categorias.listar');
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
        $request->validate([
            'nome',
            'descricao'
        ]);

        $data = $request->all();

        Categorias::create($data);
        return redirect()->back()->withSuccess('Salvo com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorias $categorias)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorias $categorias)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorias $categoria)
    {
        $request->validate([
            'nome',
            'descricao'
        ]);

        $data = $request->all();

        $categoria->update($data);
        
        return redirect()->back()->withSuccess('Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorias $categoria)
    {
        $categoria->delete();
        return redirect()->back()->withSuccess('Categoria eliminado');
    }
}
