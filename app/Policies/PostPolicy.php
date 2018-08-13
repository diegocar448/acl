<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;


class PostPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    { 
        /* $gate->define('update-post', function(User $user, Post $post){
            //verificar se o id do usuario logado é igual ao user_id // se for 
            return $user->id == $post->user_id;
        }); */
    }

    //Criar um método para representar uma politica
    public function updatePost(User $user, Post $post)
    {
        /* $gate->define('update-post', function(User $user, Post $post){
            //verificar se o id do usuario logado é igual ao user_id // se for 
            return $user->id == $post->user_id;
        }); */

        return $user->id == $post->user_id;
    }
}
