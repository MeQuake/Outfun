<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;

class WallController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
    * Returns view with all posts
    *
    * @param Request $request
    * @return Response
    **/

    public function index(Request $request)
    {
        $posts = Post::all();

        return view('wall.index', ['posts' => $posts]);
    }
}
