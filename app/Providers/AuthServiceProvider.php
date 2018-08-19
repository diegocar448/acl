<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;
use App\User;
use App\Permission;
use App\Policies\PostPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */

    //definir a politica 
    protected $policies = [
        /*
        Post::class  => PostPolicy::class,
       */
  
        
    ];

    /** 
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    { 
        $this->registerPolicies($gate);



        /* 
        $gate->define('update-post', function(User $user, Post $post){
            //verificar se o id do usuario logado é igual ao user_id // se for 
            return $user->id == $post->user_id;
        }); 
        */

        //aqui ele recupera todas as permissões e retorna um objeto
       $permissions = Permission::with('roles')->get();
        //view_post => Manager, Editor
        //delete_post => Manager
        //edit_post => Manager


        foreach($permissions as $permission)
        {
            $gate->define($permission->name, function(User $user) use ($permission){
                //verificar se o id do usuario logado é igual ao user_id // se for 
                return $user->hasPermission($permission);
            }); 
        }
        //ability == view_post, edit_post .....
        //vai entrar aqui antes de fazer a verificação
        //se existe adm ja terá previlegio antes de passar pelo gate
        $gate->before(function(User $user, $ability){
            if($user->hasAnyRoles('adm')) {
                return true;
            }
        });

        

        

        
    }
}
