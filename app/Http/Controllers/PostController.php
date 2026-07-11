<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function home(Request $request)
    {
        $featuredPosts = Post::with(['categories', 'user'])
            ->where('is_featured', true)
            ->get();
        $posts = Post::with(['categories', 'user'])->search($request->search)->get();

        return view('home', compact('featuredPosts', 'posts'));
    }

    public function category($id)
    {
        $category = Category::with('posts')->findOrFail($id);

        return view('category', compact('category'));
    }

    public function show($id)
    {
        $post = Post::with(['categories', 'user', 'comments'])->findOrFail($id);

        return view('single-post', compact('post'));
    }

    public function dashboard()
    {
        Gate::authorize('admin');
        $postsCount = Post::count();

        $categoriesCount = Category::count();

        $commentsCount = Comment::count();

        $featuredPostsCount = Post::where('is_featured', true)->count();

        return view('admin.dashboard', compact(
            'postsCount',
            'categoriesCount',
            'commentsCount',
            'featuredPostsCount'
        ));
    }

    public function create()
    {
        $categories = Category::all();

        return view('create-post', compact('categories'));
    }

    public function store(StorePostRequest $request)
    {
        $image = null;

        if ($request->hasFile('image')) {

            $image = $request->file('image')->store('posts', 'public');

        }

        $post = Post::create([

            'title'   => $request->title,

            'content' => $request->content,

            'image'   => $image,

            'user_id' => Auth::id(),

        ]);

        $post->categories()->attach($request->category);

        return redirect('/');
    }



    public function edit(Post $post)
{
    $categories = Category::all();

    return view('edit-post', compact('post', 'categories'));
}
public function update(StorePostRequest $request, Post $post)
{
    if ($request->hasFile('image')) {

        $image = $request->file('image')->store('posts', 'public');

        $post->image = $image;
    }

    $post->title = $request->title;
    $post->content = $request->content;

    $post->save();

    $post->categories()->sync($request->category);

    return redirect('/');
}

    public function destroy(Post $post)
{
    $post->categories()->detach();

    $post->delete();

    return redirect('/');
}
}

