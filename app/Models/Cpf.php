<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cpf extends Model
{
    use HasFactory;

    protected $table = 'cpf_verifications';  // Definir explicitamente o nome da tabela

    // Definir os campos que podem ser preenchidos via atribuição em massa (mass assignment)
    protected $fillable = ['cpf'];

    // Relacionamento com o modelo User, caso você precise (assumindo que o CPF é a chave estrangeira)
    public function user()
    {
        return $this->belongsTo(User::class, 'cpf_verification_id');
    }
}
