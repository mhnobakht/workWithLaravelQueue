<?php

namespace App\Http\Controllers;

use App\Jobs\AddDislike;
use App\Jobs\AddLike;
use App\Jobs\UpdateView;
use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact(['post']));
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

    public function updateView($id)
    {
        UpdateView::dispatch($id);
        return response()->json(['response' => 'ok']);
    }

    public function addLike($id)
    {
        $data = AddLike::dispatch($id);
        return response()->json(['likes' => $data]);
    }

    public function addDislike($id)
    {
        AddDislike::dispatch($id);
        return response()->json(['response' => 'ok']);
    }

    public function allLikes($id)
    {
        $post = Post::findOrFail($id);
        $data = [
            'likes' => $post->likes,
            'dislikes' => $post->dislikes
        ];
        return response()->json($data);
    }
}
