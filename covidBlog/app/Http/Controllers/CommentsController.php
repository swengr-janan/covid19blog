<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Post;
use Session;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
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
    public function store(Request $request, $post_id)
    {
        if (Auth::user()){
        $this->validate($request, array(
            'comment'   =>  'required|min:5|max:2000'
            ));
        }else{
            $this->validate($request, array(
            'name'      =>  'required|max:255',
            'email'     =>  'required|email|max:255',
            'comment'   =>  'required|min:5|max:2000'
            ));        }
        $post = Post::find($post_id);

        $comment = new Comment();
        
        if (Auth::user()){
        $comment->name = Auth::user()->name;
        $comment->email = Auth::user()->email;
        }else{     
        $comment->name = $request->name;
        $comment->email = $request->email;
        }
        $comment->comment = $request->comment;
        $comment->approved = true;
        $comment->post()->associate($post);

        $comment->save();

        Session::flash('success', 'Comment was added');

        return redirect()->route('posts.show', [$post_id]);
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
        return view('posts.comment_list')->with('post', $post);
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

    public function delete($id)
    {
        $comment = Comment::find($id);
        return view('posts.comment_delete')->withComment($comment);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::find($id);
        $post_id = $comment->post->id;

        $comment->delete();

        Session::flash('success', 'Comment deleted!');

        return redirect()->route('posts.comment_list', $post_id);
    }
    
}
