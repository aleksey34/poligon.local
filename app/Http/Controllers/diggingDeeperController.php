<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;

class diggingDeeperController extends Controller
{

    public  function  collections(){
    	$result = [];

    	$eloquentCollection = BlogPost::withTrashed()->get();

    	// create support/collections
    	$collection = collect($eloquentCollection->toArray());


    	$result = $collection->where("category_id" , "=" , "10")
	                         ->values(); // do keys 0 ,1 , 3 ...etc.
	                         //->keyBy("id"); // do keys like  id 

// method get_class() return name of collection class
dd( __METHOD__ ,get_class( $eloquentCollection) , get_class($collection) ,$result  );


    }









}
