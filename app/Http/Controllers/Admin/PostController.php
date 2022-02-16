<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.posts.index', compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validazione

           $request->validate([
                "title" => "required|string|max:100",
                "content"=>"required",
                "published" => "sometimes|accepted"
            ]);

            $data = $request->all();

            $newPost = new Post ();
            $newPost->title = $data['title'];
            $newPost->content = $data['content'];

            if( isset($data['published']) ) {
                $newPost->published = true;
            }

            $slug = Str::of($newPost->title)->slug("-");
            $count = 1;

            while( Post::where("slug",$slug)->first() ){
                $slug = Str::of($newPost->title)->slug("-") . "-{$count}";
                $count++;
            }
            $newPost->$slug = $slug;

            $newPost->save();

            return redirect()->route("admin.posts.show", $newPost->id);

        // creazione del post

        // redirect al post appena creato
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Post $post)
    {
         $request->validate([
                "title" => "required|string|max:100",
                "content"=>"required",
                "published" => "sometimes|accepted"
        ]);


            $data = $request->all();

            $post = new Post ();
            $post->title = $data['title'];
            $post->content = $data['content'];

            if( isset($data['published']) ) {
                $post->published = true;
            }

            $slug = Str::of($post->title)->slug("-");
            $count = 1;

            while( Post::where("slug",$slug)->first() ){
                $slug = Str::of($post->title)->slug("-") . "-{$count}";
                $count++;
            }
            $post->$slug = $slug;

            $post->save();

            return redirect()->route("admin.posts.show", $post->id);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
         $post->delete();
        return redirect()->route('posts.index');
    }
}
