<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Visitas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'ginasio',
        'utilizador'
    ];

    /**
     * Funcao para calcular a duraçao de uma visita
     */
    public function duracao()
    {
        // Verifique se a saída não é nula
        // Crie objetos Carbon para entrada e saída
        $entrada = Carbon::parse($this->momento);
        $saida = Carbon::now();

        // Calcula a diferença entre a entrada e a saída
        $diferenca = $saida->diff($entrada);

        // Calcula a diferença entre a entrada e a saída
        $diferenca = $saida->diff($entrada);

        // Obtém os componentes da diferença
        $anos = $diferenca->y;
        $meses = $diferenca->m;
        $dias = $diferenca->d;
        $horas = $diferenca->h;
        $minutos = $diferenca->i;
        $segundos = $diferenca->s;

        // Constrói a string de duração formatada
        $duracao = '';
        if ($anos > 0) {
            $duracao .= $anos . ' ano(s) ';
        }
        if ($meses > 0) {
            $duracao .= $meses . ' mês(es) ';
        }
        if (
            $dias > 0
        ) {
            $duracao .= $dias . ' dia(s) ';
        }
        if ($horas > 0) {
            $duracao .= $horas . ' hora(s) ';
        }
        if ($minutos > 0) {
            $duracao .= $minutos . ' minuto(s) ';
        }
        if (
            $segundos > 0
        ) {
            $duracao .= $segundos . ' segundo(s)';
        }

        // Retorna a duração formatada
        return $duracao;
    }

    public function getVisitante() {
        return $this->belongsTo(User::class, 'utilizador');
    }

    public function getGinasio() {
        return $this->belongsTo(Ginasios::class, 'ginasio');
    }
}
