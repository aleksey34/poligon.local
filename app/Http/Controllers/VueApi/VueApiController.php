<?php

namespace App\Http\Controllers\VueApi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Api\Cars;


class VueApiController extends Controller
{


	function  index(){

		// important for cross domain request !! need anyway!! for api!!
		header("Access-Control-Allow-Origin: *");
		header("Access-Control-Allow-Headers: *");

	$data  =  ["cars" => Cars::all() , 'csrf' => "test"];
		return  $data;
	}


	public  function  store(Request $request){

		// important for cross domain request !!
		header("Access-Control-Allow-Origin: * ");
		header("Access-Control-Allow-Headers: * ");

		$data = $request->all();

	$title = htmlspecialchars($data["title"]);
	$year = htmlspecialchars($data["year"]);
	$color = htmlspecialchars($data['color']);

		if(!empty($title) || !empty($year) || !empty($color) ){
			$newCar = new Cars();

			$newCar->title = $title;
			$newCar->year = $year;
			$newCar->color = $color;

			 $success = $newCar->save();

			if(isset($success) &&   !empty($success) ) {
				return ["result" => $newCar->toArray()];
			}else {
				return ["result"=> false];
			}

		}else{
			return ["result"=> false];
		}
}


	public  function  update(Request $request){
// important for cross domain request !!
		header("Access-Control-Allow-Origin: * ");
		header("Access-Control-Allow-Headers: * ");

		$car = Cars::get()->where("id" , "=" , $request->input("id"))->first();

		$car->title = $request->input("title");
		$car->year = $request->input("year");
		$car->color = $request->input("color");
		$success = $car->update();
		if($success){
			return ["result"=>$car->toArray()];
		}else{
			return ['result'=>false];
		}

	;
	}


	public  function  destroy(Request $request){
// important for cross domain request !!
		header("Access-Control-Allow-Origin: * ");
		header("Access-Control-Allow-Headers: * ");
    $id = $request->input("id");

   $success = Cars::destroy($id);
	if($success){
		$result = ["result"=>$id];
	}else{
		$result = ["result"=> false];
	}
return $result;
	}


	public function  destroy_custom(Request $request){
// important for cross domain request !!
		header("Access-Control-Allow-Origin: * ");
		header("Access-Control-Allow-Headers: * ");
		$id  =	$request->all()["id"];


  $success = Cars::destroy([$id]);
  if($success){
  $result = ['result'=> $id];
  }else{
  	$result = ["result"=>false];
  }

		return  $result;

}


}
