<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Console\Scheduling\Event;
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
        //
    }

    public function blog()
    {
        $gannhat = Post::where('status',1)->limit(4)->orderBy('created_at','ASC')->get();
        $posts = Post::orderBy('created_at','DESC')->paginate(3);
        return view('user.blog',compact('posts','gannhat'));
    }
    public function blog_single($slug,$id)
    {
        // $post = Post::where('category_id',$slug->id)->where('status',1)->paginate(9);
        Post::where('id',$id)->increment('view_count');
        $view = Post::where('id',$id)->get();
        $slug = Post::where('slug',$slug)->first();
        $gannhat = Post::where('status',1)->limit(4)->orderBy('created_at','ASC')->get();
        $posts = Post::orderBy('created_at','DESC')->paginate(3);

        return view('user.blog_single',compact('view','slug','gannhat','posts'));
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
        //
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
}
