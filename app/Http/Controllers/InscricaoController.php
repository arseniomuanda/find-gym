<?php

namespace App\Http\Controllers;

use App\Models\Inscricao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class InscricaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $inscricoes = Inscricao::all();
        return view('admin.inscricoes.listar', compact('inscricoes'));
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
            /* 'bi' => 'required|string|max:14',
            'nome' => 'required|string|min:2|max:100',
            'telefone' => 'required|string',
            'email' => 'required|email',
            'provincia' => 'required',
            'nacionalidade' => 'required',
            'naturalidade' => 'required',
            'residencia' => 'required',
            'sexo' => 'required',
            'estado_civil' => 'required',
            'foto',
            'anexo',
            'is_aprovado',
            'data_nascimento',
            'peso',
            'ginasio' => 'required', */]);

        $data = $request->all();

        if ($request->foto) {
            $data['foto'] = $request->foto->store('inscricao');
        }
        if ($request->anexo) {
            $data['anexo'] = $request->foto->store('anexo');
        }

        $data['utilizador'] = auth()->id();
        // return dd($data);

        Inscricao::create($data);
        return redirect()->back()->withSucess('Inscricão concluida');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $inscricao = Inscricao::find($id);
        // return dd($inscricao);
        return view('admin.inscricoes.show', compact('inscricao'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscricao $inscricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $inscricao = Inscricao::find($id);

        $request->validate([
            /* 'bi' => 'required|string|max:14',
            'nome' => 'required|string|min:2|max:100',
            'telefone' => 'required|string',
            'email' => 'required|email',
            'provincia' => 'required',
            'nacionalidade' => 'required',
            'naturalidade' => 'required',
            'residencia' => 'required',
            'sexo' => 'required',
            'estado_civil' => 'required',
            'foto',
            'anexo',
            'is_aprovado',
            'data_nascimento',
            'peso',
            'ginasio' => 'required', */
        ]);

        $data = $request->all();

        // return dd($data);

        $inscricao->update($data);
        return redirect()->back()->withSucess('Inscricão actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $inscricao = Inscricao::find($id);
        // return dd($inscricao);
        if (!Gate::allows('is_admin')) {
            abort(403);
        }

        $inscricao->delete();
        return redirect()->back()->withSucess('Inscricão eliminada');
    }
}
