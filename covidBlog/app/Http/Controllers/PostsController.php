<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

use App\Post;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show'] ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
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
        'title' => 'required',
        'body' => 'required',
        'cover_image' => 'image|nullable|max:1999'
    ]);

        //File upload handling

        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }
        
        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success', 'New Post Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post= Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error', 'Unauthorized action!');
        }
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);
        //File upload
        if($request->hasFile('cover_image')){
            //Get file name with the extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //Get just extension
            $fileExt = $request->file('cover_image')->getClientOriginalExtension();
            //Filename to store
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            //Upload Image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        }else{
            $fileNameToStore = 'noimage.jpg';
        }    
            $post = Post::find($id);
            $post->title = $request->input('title');
            $post->body = $request->input('body');
            if($request->hasFile('cover_image')){
                $post->cover_image = $fileNameToStore;
            }
            $post->save();
    
            return redirect('/dashboard')->with('success', 'Changes has been applied!');
    }

    public function delete($id)
    {
        $posts = Post::find($id);
        return view('posts.post_delete')->with('posts', $posts);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        if(auth()->user()->id !== $post->user_id){
            return redirect('posts')->with('error', 'Unauthorized action!');
        }
        
        if($post->cover_image != 'noimage.jpg'){
            //Delete image
            Storage::delete('public/cover_images/'.$post->cover_image);
        }

        $post->delete();
        return redirect('/dashboard')->with('success', 'Post Deleted!');
    }

    public function showComments($id)
    {
        $post= Post::find($id);
        return view('posts.comment_list')->with('post', $post);
    }

}


