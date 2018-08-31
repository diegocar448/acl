@extends('painel.templates.template')


@section('content')

<div class="relatorios">
    <div class="container">
        <ul class="relatorios">
            <li class="col-md-6 text-center">
                <a href="/painel/posts">                    
                    <img src={{url("assets/painel/imgs/noticias-acl.png")}} alt="Posts" class="img-menu">
                    <h1>Postagens - {{$totalPosts}}</h1>
                </a>
            </li>
            <li class="col-md-6 text-center">
                <a href="/painel/roles">
                    <img src={{url("assets/painel/imgs/funcao-acl.png")}} alt="Roles" class="img-menu">                    
                    <h1>Papéis - {{$totalRoles}}</h1>
                </a>
            </li>
            <li class="col-md-6 text-center">
                <a href="/painel/permissions">
                    <img src={{url("assets/painel/imgs/permissao-acl.png")}} alt="Permissions" class="img-menu">                    
                    <h1>Permissões - {{$totalPermissions}}</h1>
                </a>
            </li>
            <li class="col-md-6 text-center">
                <a href="/painel/users">
                    <img src={{url("assets/painel/imgs/perfil-acl.png")}} alt="Users" class="img-menu">                    
                    <h1>Usuários - {{$totalUsers}}</h1>
                </a>
            </li>
        </ul>
    </div>
</div><!--Relatorios-->
@endsection