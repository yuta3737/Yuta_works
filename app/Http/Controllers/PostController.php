<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest; // useする

class PostController extends Controller
{
    
public function index(Post $post)
{
    return view('index')->with(['posts' => $post->getPaginateByLimit(5)]);
} 

/**
 * 特定IDのpostを表示する
 *
 * @params Object Post // 引数の$postはid=1のPostインスタンス
 * @return Reposnse post view
 */
 
public function show(Post $post)
{
    return view('show')->with(['post' => $post]);
}

public function create()
{
    return view('create');
}




public function store(Post $post, PostRequest $request) // 引数をRequest->PostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }

public function edit(Post $post)
    {
        return view('edit')->with(['post' => $post]);
    }


public function update(PostRequest $request, Post $post)
{
    $input_post = $request['post'];
    $post->fill($input_post)->save();

    return redirect('/posts/' . $post->id);
}




}




?>
