<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/', function () {
    return view('welcome');
});

// for learning Collections!!
Route::group(['prefix'=>"digging_deeper"] , function (){
	Route::get("collections" , "diggingDeeperController@collections")
		->name("digging_deeper.collections");
});

// end learning collections

// for blog
Route::group(['namespace'=>"Blog" , 'prefix'=>'blog'] , function (){
	Route::resource("posts" , "PostController")->names("blog-posts");
});



// admin blog

// admin
$groupData = [
	"namespace"=>"Blog\Admin" ,
	"prefix"   =>"admin/blog"
];
Route::group($groupData ,  function (){
	$methods = ["index" , "edit" , "update" , "create" , "store" ];

//categories
	Route::resource("categories" , "CategoryController" )
	->only($methods)
	->names("blog.admin.categories");

	//posts
	Route::resource("posts" , "PostController")
     ->except(["show"])
     ->names("blog.admin.posts");


});






// end admin


// for vue api
//Route::get("/vue-json-data" , ["as"=>"vue_json_get_cars" , "uses"=>"VueApi\VueApiController@index"]);
//Route::get("/vue-json-data-create" , ["as"=>"vue_json_create_car" , "uses"=>"VueApi\VueApiController@createCar"]);



// for api
//Route::resource("rest" , "RestTestController")->names("testApi");

//Route::get("/rest-api" , ['as'=>'rest-api' , 'uses'=>'RestTestController@index']);


