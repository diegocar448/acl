<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Permission;
use Gate;


class PermissionController extends Controller
{
    private $permission;

    public function __construct(Permission $permission)
    {
        $this->permission = $permission;
    }

    public function index()
    {
        $permissions = $this->permission->all();

        if(Gate::denies('adm')){
            return redirect()->back();
            //abort(403, 'Not Permissions Lists Posts');            
        }

        return view('painel.permissions.index', compact('permissions'));
    }

    public function roles($id)
    {
        //Recupera a permission
        $permission = $this->permission->find($id);

        //recuperar permissões
        $roles = $permission->roles()->get();

        return view('painel.permissions.roles', compact('permission', 'roles'));
    }
}
