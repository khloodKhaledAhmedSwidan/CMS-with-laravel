<?php

namespace App\Http\Controllers;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use Illuminate\Support\Facades\Storage;
use App\Category;
class PostsController extends Controller
{

    public function __constructor(){
        $this->middleware('VerifyCategoriesCount')->only(['create','store']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 


        return view('posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('posts.create')->with('categories',Category::all())->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        //
        // upload image
        $image = $request->image->store('posts');
        // create post

//      $image = request()->file('image');

// $image->store('posts');



      $post =  Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,

        'published_at' => $request->published_at,
        'image' => $image,
        'category_id' => $request->category, 
        'user_id' =>auth()->user()->id,
        ]);
      if ($request->tags) {
        $post->tags()->attach($request->tags);
      }
        //flash message 
        session()->flash('success','posts creates successfully');
        // redirect
        return redirect(route('posts.index'));

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
      $post = Post::find($id);
      $tag = Tag::findOrFail($id);
      return view('posts.edit',compact('post','tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, $id)
    {
        //
        $post = Post::find($id);

            $image = $request->image->store('posts');
   
        // create post
        Post::get([
            'title'=>$request->title,
            'description'=>$request->description,
            'content'=>$request->content,

        'published_at'=>$request->published_at,
        'image'=>$image,
        ]);

     
        $post->save();
        session()->flash('success','Post updates successfully');
        return redirect(route('posts.index'));
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
         $post = Post::findOrFail($id);
         $post->delete();
      Storage::delete($post->image);
        return redirect('/posts')->with('success','Post deleted successfully');
    }


public function showSinglePost($id){
    $post = Post::findOrFail($id);
    return view('blog.show',compact('post'));
}


public  function category($id){
    $category = Category::findOrFail($id);
  
    
    return view('blog.category')
    ->with('category',$category)
    ->with('posts', Post::searched()->paginate(2))
    ->with('categories',Category::all())
    ->with('tags',Tag::all());
}

public function tag($id){
    $tag = Tag::findOrFail($id);
$posts = Post::searched()->paginate(2);
    $categories = Category::all();
    $tags = Tag::all();
return view('blog.tag',compact('tags','categories','posts','tag'));
    
}

}

