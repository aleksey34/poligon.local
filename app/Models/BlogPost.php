<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogPost extends Model
{
    use SoftDeletes;

//    protected  $dates = [
//    	"published_ad"
//    	];

const UNKNOWN_USER = 1;

protected  $fillable = [
	"title" ,
	"slug" ,
	"category_id" ,
	"excerpt" ,
	"content_raw" ,
	"is_published" ,
	"published_at" ,
	///"user_id"   // why???
];



	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public  function  category(){

	return $this->belongsTo(BlogCategory::class);
}

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public  function  user(){

	return $this->belongsTo(User::class);
}



}
