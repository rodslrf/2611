<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'users';
    protected $fillable = [
        'name',
        'cpf',
        'status',
    ];
    public function solicitars()
    {
        return $this->hasMany(Solicitar::class, 'user_id', 'id');
    }

    public function userPhone()
{
    return $this->hasOne(Userphone::class, 'user_id', 'id');
}

}