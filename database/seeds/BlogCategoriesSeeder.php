<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class BlogCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =[];
        $cName = "Без Категории";
        $categories[] = [
        	'title' => $cName ,
	        'slug'=> Str::slug($cName) ,
	        'parent_id' => 0
        ];

        for($i = 2 ; $i< 17 ; $i++){
        	$cName = "Категория № ".$i;
        	//$parent_id = ($i < 4) ?  rand(1 ,4): 1 ;
	        $parent_id = (rand(1 ,10) > 6) ?  rand(1 ,16): 1 ;
        	$categories[]=[
        		'title'=>$cName ,
		        'slug'=> Str::slug($cName),
		        'parent_id' => $parent_id
	        ];
        }

DB::table("blog_categories")->insert($categories);


    }



}
