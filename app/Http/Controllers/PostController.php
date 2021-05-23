<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

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

}


?>
