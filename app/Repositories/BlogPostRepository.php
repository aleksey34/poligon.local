<?php
namespace  App\Repositories;


use App\Models\BlogPost as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogPostRepository extends  CoreRepository {


	/**
	 * @param int $per_page
	 *
	 * @return mixed  -- ojb with paginate from table posts
	 */
	public  function getAllWithPaginate($per_page = 25){

		$columns =[
			"id" ,
			"title" ,
			"slug" ,
			"is_published" ,
			"published_at",
			"user_id",
			"category_id"
		];
$result = $this->startConditions()
	->select($columns)
	//->with(['user' , 'category'])
		->with([
//			"category" => function($query){
//			$query->select(['id' , 'title']);
//			},
		"category:id,title" ,
		"user:id,name"
	])

	->orderBy("id" , "DESC")
	->paginate($per_page);

		return $result;
	}

	/**
	 * @param $id
	 *
	 * @return Model for edit - update
	 *
	 */
	public  function  getEdit($id){

		return  $this->startConditions()->find($id);
	}


	public  function  getModelClass(){

		return  Model::class;
	}





}





