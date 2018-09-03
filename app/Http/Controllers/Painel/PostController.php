<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->all();

        //se não tiver permissão ele redireciona para a url anterior
        if(Gate::denies('view_post')){
            return redirect()->back();
            //abort(403, 'Not Permissions Lists Posts');            
        }

        return view('painel.posts.index', compact('posts'));
    }
}
