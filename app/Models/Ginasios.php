<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ginasios extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nome',
        'telefone',
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
        'imagem',
        'sobre'
    ];

    public function getCategoria(){
        return $this->belongsTo(Categorias::class, 'categoria');
    }

    public function inscritos()
    {
        return $this->hasMany(Inscricao::class, 'ginasio');
    }
}
