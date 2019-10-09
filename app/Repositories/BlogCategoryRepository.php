<?php
namespace  App\Repositories;


use App\Models\BlogCategory as Model;
use Illuminate\Database\Eloquent\Collection;

class BlogCategoryRepository extends  CoreRepository {


	/**
	 * @param $count
	 *get all categories and pagination for  perPage
	 * @return mixed
	 */
	public  function getAllWithPaginate($perPage = null){

		$columns =['id' , "title" , "parent_id"];


//directive -- with -- for less request in the DB
		$result = $this
			->startConditions()
			->select($columns)
			->with(
				[
				"parentCategory:id,title"
				]
			)
			->paginate($perPage);  // paginate($perPage , $columns); // the same

		return $result;
	}


/**
 * @param int $parent_id
 * get list categories for option -- select for choose parent category
 */
	public  function  getForComboBox(){
		$columns =implode("," ,["id" ,'CONCAT(id , ". " , title) AS id_title']);

	/*	$result[] = $this->startConditions()->all();

        $result[] = $this->startConditions()
            ->select("blog_categories.*" , \DB::raw('CONCAT(id , ". ", title)  AS id_title'))
	        ->toBase()
	        ->get();
	*/

        $result= $this->startConditions()
	        ->selectRaw($columns)
	        ->toBase()
	        ->get();


		return $result;

	}

//	public  function  getForComboBox(){
//
//		return $this->startConditions()->all();
//
//	}

	public  function  getEdit($id){

 return $this->startConditions()->find($id);
	}



	public  function  getModelClass(){

		return  Model::class;
	}





}





