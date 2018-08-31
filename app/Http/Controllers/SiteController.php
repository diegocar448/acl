<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Post;
use Gate;

use App\Http\Controllers\Controller;


class SiteController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


 
    public function index(Post $post)
    {
        return view('portal.home.index');
    }
}
