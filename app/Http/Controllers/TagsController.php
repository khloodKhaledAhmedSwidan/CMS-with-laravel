<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use App\Tag;
use App\Http\Requests\tags\CreateTagRequest;
use App\Http\Requests\tags\UpdateTagRequest;
class TagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Responsse
     */
    public function index()
    {
        //

        $tags = Tag::all();
        return view('tags.index',compact('tags'));
        // return view('categories.index')->with('categories',Category::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTagRequest $request)
    {
        //
     
        // $category = new Category;
        // Category::create([$request->all()]);



 $input = $request->all();

    Tag::create($input);
    session()->flash('success','Tag Created Succesfully');
        return redirect(route('tags.index'));
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
      $tag = Tag::find($id);

        return view('tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTagRequest $request, $id)
    {
        //

            $request->validate([
        'name'=>'required',
     
      ]);

      $tag = Tag::find($id);
      $tag->name = $request->get('name');
   
      $tag->save();

      return redirect('/tags')->with('success', 'Tag has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {


       $tag = Tag::findOrFail($id);
       if($tag->posts->count() > 0){
        session()->flash('error','tag cannot be deleted, because it is associated to some posts.');
return redirect()->back();
       }
       $tag->delete();
      
        return redirect('/tags')->with('success','Tag has been deleted successfully');

     
    }
}
