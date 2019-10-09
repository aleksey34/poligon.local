<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Requests\BlogCategoryUpdateRequest;
use App\Models\BlogCategory;
use App\Repositories\BlogCategoryRepository;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;
use App\Http\Controllers\Blog\Admin\BaseController;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{

	/**
	 * @var $blogCategoryRepository
	 */
	private  $blogCategoryRepository;

	// this is for use validation without Request obj
	//use ValidatesRequests;


	public  function __construct() {

		parent::__construct();

		$this->blogCategoryRepository = app(BlogCategoryRepository::class);
	}


	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // $paginator = BlogCategory::paginate(5);
	    $paginator = $this->blogCategoryRepository->getAllWithPaginate(25);
       return view("blog.admin.categories.index" , compact('paginator'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

	    $item  =  new BlogCategory();

	    $categoryList= $this->blogCategoryRepository->getForComboBox();

// may use the same view  create and edit !!
        return view("blog.admin.categories.create" , compact("item" , "categoryList"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BlogCategoryUpdateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogCategoryUpdateRequest $request)
    {
       $data = $request->input();

       // go to observer
//	if(empty($data['slug'])){
//		$data['slug'] =  str_slug($data['title'] );
//	}


	    $item = (new BlogCategory())
		    ->create($data);

		if($item){
			return redirect()
				->route("blog.admin.categories.edit" , $item->id)
				->with(["success"=>"Категория успешно создана"]);
		}else{
			return back()
				->withErrors(['msg'=>"Ошибка сохранения"])
				->withInput();
		}

    }


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int $id
	 * @param BlogCategoryRepository $categoryRepository
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function edit($id , BlogCategoryRepository  $categoryRepository)
    {

//    	$item  = BlogCategory::findOrFail($id);
//    	$categoryList= BlogCategory::all();



	    $item = $categoryRepository->getEdit($id);
	    
//
//        $v['title_before'] = $item->title;
//
//	    $item->title = "aKJL;ljkLjkLLkjlKJKJLKJlJlk ";
//	    $v['title_after'] = $item->title;
//
//	    $v['getAttribute'] = $item->getAttribute("title");
//
//	    $v['attributesToArray'] = $item->attributesToArray();
//
//	    $v['attributes'] = $item->attributes['title']; // this only in class -- protected variable
//
//	    $v['getAttributeValue'] = $item->getAttributeValue("title");
//
//	    $v['getMutatedAttributes'] = $item->getMutatedAttributes();
//
//	    $v['hav get Mutator for title'] = $item->hasGetMutator("title");
//
//	    $v['toArray'] = $item->toArray();

//dd($v , $item);

// $item->title=  $v["title_after"];
//dd($item);


	    if(empty($item)){
	    	 abort("404");
	    }

	    $categoryList = $categoryRepository->getForComboBox();

    	return view("blog.admin.categories.edit" , compact( "item" , 'categoryList'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BlogCategoryUpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogCategoryUpdateRequest $request, $id)
    {

//    	$rules = [
//    		"title"=> "required|min:5|max:256",
//    		"slug"=> "max:256",
//    		"description"=> "string|max:500|min:3",
//    		"parent_id"=> "required|integer|exists:blog_categories,id"
//
//	    ];


    	// first method for validate
    //	$validateData =  $this->validate($request , $rules);

	    // second method for validate
    //$validateDate = $request->validate($rules);

// third method for validate
	/*    $validator = \Validator::make($request , $rules);

	    // check or not  -- true false
		$valetatedDate[] = $validator->passes();

		// validate like 1  , 2 methods
		$valetatedDate[] = $validator->validate();

		// return only valid data
		$valetatedDate[] = $validator->valid();

		// return only failed data
		$valetatedDate[] = $validator->failed();

		//  some errors in here
		$valetatedDate[] = $validator->errors();

		// true or false  --- fails or not
		$valetatedDate[] = $validator->fails();
	*/



    	//$item = BlogCategory::find($id);

	    $item = $this->blogCategoryRepository->getEdit($id);
    	if(empty($item)) {
    		return back()
			    ->withErrors(['msg'=> "запись id:= [$id] не найдена"])
			    -> withInput() ;
	    }

	    $data = $request->all();

//go to observer
//	    if(empty($data['slug'])){
//		    $data['slug'] =  Str::slug($data['title'] );
//	    }


    	//$result = $item->fill($data)->save();
    	$result = $item->update($data);

    	if($result){

    		return redirect()
			    ->route("blog.admin.categories.edit" , $item->id)
			    ->with(["success"=>"Успешно сохранено"]);
	    }else{
    		return back()
			    ->withErrors(["msg"=>"Ошибка сохранения"])
			    ->withInput();
	    }





    }


}
