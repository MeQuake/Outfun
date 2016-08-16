<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use App\Post;
use App\Like;
use App\File;
use Storage;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', ['except' => [
            'show'
        ]]);
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
            'title' => 'bail|required|unique:posts|max:60',
            'content' => 'required',
            'file.*' => 'image|max:3000',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = $request->user()->id;
        $post->type = "img";
        $post->save();

        foreach($request->file as $file)
        {
            $_file = new File;
            $_file->name = uniqid(mt_rand(), true).'.'.$file->getClientOriginalExtension();
            $_file->post_id = $post->id;
            $_file->save();
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
        return view('post.index', ['post' => Post::findOrFail($id)]);
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
        $like = Like::where('user_id', $request->user()->id)
                    ->where('post_id', $id)
                    ->first();
        if($like) {
            $like->delete();
            return response()->json(['message' => 'unliked']);
        } else {
            Like::create(['user_id' => $request->user()->id, 'post_id' => $id])->save();
            return response()->json(['message' => 'liked']);
        }
    }
}
