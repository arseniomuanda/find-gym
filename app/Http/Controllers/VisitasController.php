<?php

namespace App\Http\Controllers;

use App\Models\Visitas;
use Illuminate\Http\Request;

class VisitasController extends Controller
{
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ginasio' => 'required',
            // 'utilizador',
        ]);

        $data = $request->all();

        $data['utilizador'] = auth()->id();

        $visita = Visitas::create($data);

        if (is_object($visita)) {
            return redirect("/site/detalhes/$visita->ginasio");
        }

        return redirect()->break();
    }
    /**
     * Display the specified resource.
     */
    public function show(Visitas $visitas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Visitas $visitas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Visitas $visitas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Visitas $visitas)
    {
        //
    }
}
