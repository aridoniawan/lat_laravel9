<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Mail\BlogPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use function Laravel\Prompts\table;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class Postcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //tanpa eloquent
        // $posts = DB::table('posts')
        //         ->select('id', 'title', 'content', 'created_at', 'updated_at')
        //         ->where('active', true)
        //         ->get();

        if(!Auth::check())
        {
            return redirect('login');
            
        }
        // $posts = Post::active()->get();
        $posts = Post::active()->withTrashed()->get(); // dengan trash

        // $view_data=[
        //     'posts' => $posts
        // ];
        return view('posts.index', compact('posts'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if(!Auth::check())
        {
            return redirect('login');

        }
       return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(!Auth::check())
        {
            return redirect('login');

        }
        $title = $request->input('title');
        $content = $request->input('content');
        // tanpa eloquent
        // DB::table('posts')->insert([
        // Post::insert([
        //     'title'=> $title,
        //     'content' => $content,
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        $post = Post::create([
            'title'=> $title,
            'content' => $content,
            
        ]);
        Mail::to(Auth::user()->email)->send(new BlogPosted($post)); 
        return redirect('posts');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // tanpa eloquent
        // $post = DB::table('posts')
        //         ->select('id', 'title', 'content', 'created_at', 'updated_at')
        //         ->where('id', '=', $id)
        //         ->first();

        if(!Auth::check())
        {
            return redirect('login');

        }
        $post = Post::where('id', $id)->first();
        $comments = $post->comments()->limit(2)->get();
        $total_comments = $post->total_comments();

        $view_data=[
            'post'=> $post,
            'comments' => $comments,
            'total_comments' => $total_comments
        ];

        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if(!Auth::check())
        {
            return redirect('login');

        }
        // tanpa eloquent
        //  $post = DB::table('posts')
        //         ->select('id', 'title', 'content', 'created_at', 'updated_at')
        //         ->where('id', '=', $id)
        //         ->first();

        $post = Post::where('id', $id)->first();
        $view_data=[
            'post'=> $post
        ];
        return view('posts.edit', $view_data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(!Auth::check())
        {
            return redirect('login');

        }
        $title = $request->input('title');
        $content = $request->input('content');
        // tanpa eloquent
        // DB::table('posts')

        Post::where('id', $id)
            ->update([
                'title' => $title,
                'content' => $content,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

        return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(!Auth::check())
        {
            return redirect('login');

        }
        // tanpa eloquent
        // DB::table('posts')
        Post::where('id', $id)
            ->delete();
        return redirect('posts');
    }
}
