<?php

use Illuminate\Database\Seeder;
use  App\Post;
use App\Tag;
use App\Category;
use App\User;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $author1 = User::create([
            'name' =>'carl',
            'email' =>'carl@yahoo.com',
            'password' =>  bcrypt('1234567'),
        ]);

        $author2 = User::create([
            'name' =>'rick',
            'email' =>'rick@yahoo.com',
            'password' =>  bcrypt('1234567'),
        ]);
            $author3 = User::create([
            'name' =>'Daryl',
            'email' =>'Daryl@yahoo.com',
            'password' =>  bcrypt('1234567'),
        ]);
        //
        $catrgory1 = Category::create([
        	'name' => 'php']);
        $catrgory2 = Category::create([
        	'name' => 'css']);
        $catrgory3 = Category::create([
        	'name' => 'laravel']);

        $tag1 = Tag::create(['name'=>'nice , excellent']);
         $tag2 = Tag::create(['name'=>'good']);
          $tag3 = Tag::create(['name'=>'cool , very good']);
        $post1 = Post::create([
'title' =>'Blocks',
'description' => 'Join over 3,400 companies that trust us.',
'content' =>'Try it yourself for a while. Request a refund if you did not find it useful and awesome as we advertised.',
'category_id' => $catrgory1->id,
'image' => 'public/posts/1.jpeg',
'user_id' =>$author1->id,

        ]);
        $post2 = $author2->posts()->create(['title' =>'csss',
'description' => 'Join o that trust us.',
'content' =>'Try it yourself for a while.  if you did not find it useful and awesome as we advertised.',
'category_id' => $catrgory2->id,
'image' => 'public/posts/2.jpeg',]);
        $post3 = Post::create(['title' =>'laravel 5.5',
'description' => 'companies that trust us.',
'content' =>'Try it  Request a refund if you did not find it useful and awesome as we advertised.',
'category_id' => $catrgory3->id,
'image' => 'public/posts/3.jpeg',
'user_id' => $author3->id,
]);
           $post1->tags()->attach([$tag1->id ,$tag2->id]);
     $post2->tags()->attach([$tag2->id ,$tag3->id]);
      $post3->tags()->attach([$tag3->id ,$tag1->id]);

    }
 
}
