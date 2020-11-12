<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Auth;
use App\Category;
use App\Image;
use File;

class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderby('id', 'DESC')->get();
        return view('post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::orderby('id', 'DESC')->get();
        return view('post.created', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
        'title'=>'required|max:150|string',
        'description'=>'required|string',
        'category'=>'required|string'
       ]);

         $title=$request->title;
         $description=$request->description;
         $category_id=$request->category;


         $post = new Post;
         $post->title=$title;
         $post->description=$description;
         $post->user_id=Auth::user()->id;
         $post->category_id=$category_id;
         $post->save();

        $lastid = $post->id;
        

    if ($request->hasFile('image')){

        $files=$request->file('image');


        foreach ($files as $file) {
        $path=public_path('/storage/uploads/');
        $name=time()."_".$file->getClientOriginalName();
        $file->move($path, $name);

        $images = new Image;
        $images->image=$name;
        $images->post_id=$lastid;

        $images->save();

        }
    }


            return redirect('/posts');


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
        return view('post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        $categories=Category::all();
        return view('post.edit', compact('categories','post'));
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
        $request->validate([
        'title'=>'required|max:150|string',
        'description'=>'required|string',
        'category'=>'required|string',
       ]);
       $title=$request->title;
       $description=$request->description;
       $category_id=$request->category;


       $post = Post::findOrFail($id);

        $post->title=$title;
        $post->description=$description;
        $post->category_id=$category_id;

       ($post->save());

       return redirect()->back()->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $images=Image::where('post_id', '$id')->get();
        
        if (Post::where('id', $id)->delete()) {

            foreach ($images as $image) {
            $path=public_path('/storage/uploads/');
            $name=$image->image;
            File::delete($path.''.$name);

            }
             return redirect()->back()->with('success', 'Record deleted successfully');

          

      }
        
         return redirect()->back();
    }
}
