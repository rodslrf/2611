<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Userphone extends Model
{
    protected $table = 'user_phones';  // Definir explicitamente o nome da tabela

    // Definir os campos que podem ser preenchidos via atribuição em massa (mass assignment)
    protected $fillable = ['user_id','telefone', 'email'];

    // Relacionamento com o modelo User, caso você precise (assumindo que o CPF é a chave estrangeira)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
