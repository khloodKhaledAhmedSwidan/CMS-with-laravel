<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Tag;
use App\Post;
use App\User;
class WelcomeController extends Controller
{
    // 
    public function index(User $user){

 $user = auth()->user();
    
    	return view('welcome')
    	->with('categories',Category::all())
    	->with('tags',Tag::all())
    	->with('posts',Post::searched()->paginate(2))
    	->with('user',User::all());
    }


}
