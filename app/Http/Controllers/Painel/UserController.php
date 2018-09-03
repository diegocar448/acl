<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Gate;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();

        if(Gate::denies('user')){
            return redirect()->back();
            //abort(403, 'Not Permissions Lists Posts');            
        } 

        return view('painel.users.index', compact('users'));
    }

    public function roles($id)
    {
        //Recupera o usuário
        $user = $this->user->find($id);

        //recuperar as funções roles
        $roles = $user->roles()->get();

        return view('painel.users.roles', compact('user', 'roles'));
    }
}
