<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\Tag;
use App\User;
class Post extends Model
{
	
    //
   protected $fillable = [

    	'title',
    	'description',
    	'content',
    	'published_at',
    	'image',
    	'category_id',
        'user_id',
   
    ];


    public function category(){
    	return $this->belongsTo(Category::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function scopeSearched($query){
        $search = request()->query('search');
        if (!$search) {
            return $query;
        }
         return $query->where('title','LIKE',"%{$search}%");
    }
}
