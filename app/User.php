<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Role;
use App\Permission;



class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //Metodo que retorna todas as funções que o usuario possui
    public function roles()
    {
        //Pegar todos os papeis que o cliente tem no sistema
        return $this->belongsToMany(Role::class);
    }



    public function hasPermission(Permission $permission)
    {
        //Vamos recuperar todas as nossas funções que temos para essa permissão
         //view_post -> Manager, Admin
         //o usuario logado ele têm acesso, se têm retorna true, se não bloqueia acesso
         return $this->hasAnyRoles($permission->roles);
    }

    public function hasAnyRoles($roles)
    {
        //aqui vamos verificar se o usuario logado têm essa permissão especifica
        if(is_array($roles) || is_object($roles)){
            foreach($roles as $role){
                var_dump($this->roles->contains('name', $role->name));
                //pega o nome da regra
                return $this->roles->contains('name', $role->name);
            }
        }
        //Se existe alguma função/papel então retorna true
        return $this->roles->contains('name', $roles);

    }
}
