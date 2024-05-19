<?php

namespace App\Http\Controllers;

use App\Models\Ginasios;
use App\Models\Inscricao;
use App\Models\Visitas;
use Illuminate\Http\Request;

class GinasiosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ginasios = Ginasios::all();
        return view('admin.ginasios.listar', compact('ginasios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.ginasios.perfil');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome',
            'telefone' => 'numeric|digits:9',
            'email',
            'empresa',
            'endereco',
            'latitude',
            'longitude',
            'segunda',
            'terca',
            'quarta',
            'quinta',
            'sexta',
            'sabado',
            'domingo',
            'categoria',
            'imagem'
        ]);

        $data = $request->all();

        if ($request->imagem) {
            $data['imagem'] = $request->imagem->store('ginasio');
        }

        Ginasios::create($data);

        return redirect()->route('admin.ginasios')->withSuccess('Ginasio adicionado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $ginasio = Ginasios::find($id);
        return view('site.detalhes', compact('ginasio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ginasios $ginasio)
    {
        return view('admin.ginasios.perfil', compact('ginasio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ginasios $ginasio)
    {
        $request->validate([
            'nome',
            'telefone' => 'numeric|digits:9',
            'email',
            'empresa',
            'endereco',
            'sobre',
            'latitude',
            'categoria',
            'longitude',
        ]);


        $data = $request->all();

        if ($request->imagem) {
            $data['imagem'] = $request->imagem->store('ginasio');
        }
        $ginasio->update($data);

        return redirect()->back()->withSuccess('Ginasio actualizado!');
    }

    public function hours(Request $request, Ginasios $ginasio)
    {
        $request->validate([
            'segunda1',
            'segunda2',
            'segunda3',
            'terca1',
            'terca2',
            'terca3',
            'quarta1',
            'quarta2',
            'quarta3',
            'quinta1',
            'quinta2',
            'quinta3',
            'sexta1',
            'sexta2',
            'sexta3',
            'sabado1',
            'sabado2',
            'sabado3',
            'domingo1',
            'domingo2',
            'domingo3',
        ]);

        $segunda = $request->segunda1 == null ? 'off' : ("on;" . ($request->segunda2 == '' ? '07:30' : $request->segunda2) . ";" . ($request->segunda3 == '' ? '18:00' : $request->segunda3));
        $terca = $request->terca1 == null ? 'off' : ("on;" . ($request->terca2 == '' ? '07:30' : $request->terca2) . ";" . ($request->terca3 == '' ? '18:00' : $request->terca3));
        $quarta = $request->quarta1 == null ? 'off' : ("on;" . ($request->quarta2 == '' ? '07:30' : $request->quarta2) . ";" . ($request->quarta3 == '' ? '18:00' : $request->quarta3));
        $quinta = $request->quinta1 == null ? 'off' : ("on;" . ($request->quinta2 == '' ? '07:30' : $request->quinta2) . ";" . ($request->quinta3 == '' ? '18:00' : $request->quinta3));
        $sexta = $request->sexta1 == null ? 'off' : ("on;" . ($request->sexta2 == '' ? '07:30' : $request->sexta2) . ";" . ($request->sexta3 == '' ? '18:00' : $request->sexta3));
        $sabado = $request->sabado1 == null ? 'off' : ("on;" . ($request->sabado2 == '' ? '07:30' : $request->sabado2) . ";" . ($request->sabado3 == '' ? '18:00' : $request->sabado3));
        $domingo = $request->domingo1 == null ? 'off' : ("on;" . ($request->domingo2 == '' ? '07:30' : $request->domingo2) . ";" . ($request->domingo3 == '' ? '18:00' : $request->domingo3));

        $data['segunda'] = $segunda;
        $data['terca'] = $terca;
        $data['quarta'] = $quarta;
        $data['quinta'] = $quinta;
        $data['sexta'] = $sexta;
        $data['sabado'] = $sabado;
        $data['domingo'] = $domingo;

        $ginasio->update($data);

        return redirect()->back()->withSuccess('Ginasio actualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ginasios $ginasios)
    {
        //
    }
}
