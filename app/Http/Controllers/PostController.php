<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Repositories\PostRepository;
use Illuminate\Http\Response;
use Storage;

class PostController extends Controller
{
    protected $posts;

    public function __construct(PostRepository $posts)
    {
        $this->middleware('auth', ['except' => [
            'show'
        ]]);
        $this->posts = $posts;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'bail|required|max:60',
            'content' => 'required',
            'file.*' => 'image|max:3000',
        ]);

        $post = $request->user()->posts()->create([
            'title' => $request->title,
            'content' => $request->content,
            'type' => "img",
        ]);

        foreach($request->file as $file)
        {
            $_file = $post->files()->create([
                'name' => uniqid(mt_rand(), true).'.'.$file->getClientOriginalExtension()
            ]);
            Storage::disk('images')->put($_file->name, \File::get($file));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('post.index', ['post' => $this->posts->getPostById($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
    * Like or unlike specified Post
    * @param Request $request
    * @param int $id (post_id)
    * @return \Illuminate\Http\Response
    */
    public function like(Request $request, $id)
    {
        if($this->posts->userLiked($request->user()->id, $id))
        {
            $this->posts->deleteLike($request->user()->id, $id);
            return response()->json(['message' => 'unliked']);
        }
        else
        {
            $this->posts->saveLike($request->user()->id, $id);
            return response()->json(['message' => 'liked']);
        }
    }
}
