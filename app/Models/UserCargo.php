<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserCargo extends Model
{
    use HasFactory;

    protected $table = 'user_cargos';  // Definir explicitamente o nome da tabela

    // Definir os campos que podem ser preenchidos via atribuição em massa (mass assignment)
    protected $fillable = ['cpf', 'cargo'];

    // Relacionamento com o modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_cargo_id');
    }
}