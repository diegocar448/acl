<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{


    //retornar todas as funções que estão ligadas a permissão
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
}
