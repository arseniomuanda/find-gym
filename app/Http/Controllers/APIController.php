<?php

namespace App\Http\Controllers;

use App\Models\Categorias;
use App\Models\Ginasios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    public function index(Request $request)
    {
        // return dd($request->all());
        $data = $request->only(['query', 'cat']);
        $gymQuerys = Ginasios::query();

        if ($request->query) {
            $gymQuerys->where('nome', 'LIKE', "%{$data['query']}%");
        }

        if (!empty($data['cat'])) {
            // return dd($request->all());
            if (count($request->cat) > 1) {
                $gymQuerys->whereIn('categoria', $data['cat']);
            } else {
                $gymQuerys->where('categoria', $request->cat[0]);
            }
        }
        $gyms = $gymQuerys->paginate(6);

        // var_dump($data);
        // $data = Ginasios::paginate();
        return response()->json($gyms);
    }


    public function findBI(string $bi)
    {
        try {
            $response = Http::get("https://www.sepe.gov.ao/ao/actions/bi.ajcall.php?bi=$bi");
            if (!isset($response->object('data')->error)) {
                $data["numero"] = $response->object('data')->data->numero;
                $data["nome"] = $response->object('data')->data->nome;
                $data["nif"] = $response->object('data')->data->nif;
                $data["data_nasc"] = $response->object('data')->data->data_nasc;
                $data["genero"] = $response->object('data')->data->genero;
                $data["naturalidade"] = $response->object('data')->data->naturalidade;
                $data["pai_nome_completo"] = $response->object('data')->data->pai_nome_completo;
                $data["mae_nome_completo"] = $response->object('data')->data->mae_nome_completo;
                $data["estado_civil"] = $response->object('data')->data->estado_civil;
                $data["data_emissao"] = $response->object('data')->data->data_emissao;
                $data["emissao_local"] = $response->object('data')->data->emissao_local;
                return response()->json($data);
            } else {
                return response()->json(404);
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 501);
        }
    }
}
