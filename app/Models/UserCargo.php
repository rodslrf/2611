<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCargo extends Model
{
    protected $table = 'user_cargos';  // Definir explicitamente o nome da tabela

    // Definir os campos que podem ser preenchidos via atribuição em massa (mass assignment)
    protected $fillable = ['cpf', 'cargo'];

    // Relacionamento com o modelo User, caso você precise (assumindo que o CPF é a chave estrangeira)
    public function user()
    {
        return $this->belongsTo(User::class, 'cpf', 'cpf');
    }
}