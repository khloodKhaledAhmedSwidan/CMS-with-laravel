<?php




 // use App\Http\Controllers\BlogPostsController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middlew
are group. Now create something great!
|
*/

Route::get('/','WelcomeController@index')->name('welcome');
Route::get('blog/post/{post}','PostsController@showSinglePost')->name('post.show');
// Route::get('blog/posts/{post}',BlogPostsController::class.'@show')->name('blog.show');
// Route::get('blog/posts/{post}',[PostsController::class,'show'])->name('blog.show');

Route::get('blog/category/{category}','PostsController@category')->name('category.show');
Route::get('blog/tag/{tag}','PostsController@tag')->name('tag.show');
Auth::routes();
Route::middleware(['auth'])->group(function(){


Route::get('/home', 'HomeController@index')->name('home');
Route::resource('categories','CategoriesController');
Route::resource('tags','TagsController');
Route::resource('posts','PostsController')->middleware(['auth','VerifyCategoriesCount']);	
});




Route::middleware(['auth','admin'])->group(function(){
	Route::get('users','UsersController@index')->name('users.index');
	Route::patch('users/{user}/make-admin','UsersController@makeAdmin')->name('users.make-admin');

Route::get('users/profile','UsersController@edit')->name('users.edit-profile');
Route::put('users/profile','UsersController@update')->name('users.update-profile');

});

