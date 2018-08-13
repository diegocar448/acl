<?php

namespace App\Providers;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Post;
use App\User;
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

        Post::class  => PostPolicy::class,
       
        
    ];

    /** 
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(GateContract $gate)
    { 
        $this->registerPolicies($gate);

        /* $gate->define('update-post', function(User $user, Post $post){
            //verificar se o id do usuario logado é igual ao user_id // se for 
            return $user->id == $post->user_id;
        }); */
        

        
    }
}
