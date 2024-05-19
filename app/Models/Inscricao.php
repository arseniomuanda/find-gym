<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inscricao extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'bi',
        'nome',
        'telefone',
        'email',
        'provincia',
        'nacionalidade',
        'naturalidade',
        'residencia',
        'sexo',
        'estado_civil',
        'foto',
        'anexo',
        'is_aprovado',
        'data_nascimento',
        'peso',
        'ginasio',
        'utilizador'
    ];

    public function getGinasio()
    {
        return $this->belongsTo(Ginasios::class, 'ginasio');
    }
}
