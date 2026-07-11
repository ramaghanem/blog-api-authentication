<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
{
      Comment::create([
        'post_id' => $request->post_id,
       'author_name' => Auth::user()->name,
        'content' => $request->content,
    ]);
    return redirect()->back();
}
}
