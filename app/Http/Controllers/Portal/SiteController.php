<?php

namespace App\Http\Controllers\Portal;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class SiteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


 
    public function index(Post $post)
    {
        //return view('portal.home.index');

        return view('painel.templates.template');
    }
}
