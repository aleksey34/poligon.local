<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BlogCategory extends Model
{
	use SoftDeletes;

	protected $fillable = [
		'title', 'slug' , 'parent_id' , 'description'
	];

// root cateugory id  --- without category
	const ROOT = 1;


	public function  parentCategory(){
		return $this->belongsTo(BlogCategory::class , "parent_id" , "id");
	}

	/**
	 * @return string
	 * this is acsesor
	 * need start "get" end  "Attribute"
	 * middle  property- name   "ParentTitle"
	 * in view get -- {{$item->parent_title}} or {{$item->parentTitle}} -- all the same
	 *
	 */
	public function getParentTitleAttribute(){
		$title =  $this->parentCategory->title
		          ??
		          ( $this->isRoot() ? "Кореневая категория" : "???" );
		return $title;
	}

	private function  isRoot(){
return $this->id === self::ROOT;

	}

	/**
	 * WORKING - AUto!! for title
	 * Acsesor
	 * sample acsesor
	 * change data from object
	 * return string of title uppercase
	 * @
	 */
//	public function  getTitleAttribute($valueFromObject){
//return mb_strtoupper($valueFromObject);
//	}

	/**
	 * Working -- Auto!! for title
	 * Mutator -- sample Mutator
	 * change data in object
	 */
//	public function  setTitleAttribute($incomingValue){
//		$this->attributes["title"] = mb_strtolower($incomingValue)  ;
//	}






}
