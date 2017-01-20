<?php

namespace ShoppingSpout\Http\Controllers\Backend;

use Illuminate\Http\Request;
use ShoppingSpout\Http\Controllers\Controller;
use ShoppingSpout\Models\Backend\CategoryModel as Categories;
use Carbon\Carbon;
use Validator;
use Input;
use App;
use Lang;
class CategoryController extends Controller
{
	
	

	// View All Categories //
	public function all_categoreis(){
		
		
		 return view('backend.categories.allcategories', ['categories' => Categories::all()]);
		//dd($categories);
	
	}
	
	// End View All Categories //
	
	
	
	///////////////////////////////////////////////// Add Category /////////////////////////////////////////
	public function add_categoreis(Request $request){
		
			
			//echo trans('validation.required');
				
		//	dd( Lang::get('validation.required'));
		
		 
		
		
		if ($request->isMethod('post')) {
			
			
			
			$validator = Validator::make(Input::all(), Categories::$rules);
			if ($validator->fails()) {
				 
				 return redirect()->back()
						->withInput($request->all())
						->withErrors($validator);
			 }
			 
			 
			
			$addCategory = new Categories;
			
			if($request->active == 'on')
				$active = 1;
			else
				$active = 0;
			
			$addCategory->category_name = $request->category_name;
			$addCategory->url = $request->category_name;
			$addCategory->parent_id = $request->parent_id;
			$addCategory->meta_title = $request->meta_title;
			$addCategory->meta_keywords = $request->meta_keywords;
			$addCategory->meta_description = $request->meta_description;
			$addCategory->active = $active;
			$addCategory->added_by = 'raj040492';
			
			
			$addCategory->save();
			
			return redirect('admin/allcategories');
			exit;
			
			
			
		}

       
		$category = array();
		$child_categories = array();
		$parent_categories = $this->parent_categories();
		
		//$i=0;
		// foreach($parent_categories as $key => $cat){
			// $category['parent'][$i]['id'] = $cat->category_id;
			// $category['parent'][$i]['name'] = $cat->category_name;
			
			// $child_categories = $this->child_category($cat->category_id);
			// if(is_array($child_categories) && count($child_categories)>0){
				// $category['parent'][$i]['subcat'] = $child_categories;
			// }
			// $i++;
		// }
		// echo "<pre>";
		 // print_r($category);
		// echo "</pre>";
			 // exit;
		
		return view('backend.categories.addcategories',['parent_categories' => $parent_categories]);
		
	
	}
	
	///////////////////////////////////////////////// Add Category /////////////////////////////////////////
	/*******************************************************************************************************
	**********************************************************************************************************/
	/////////////////////////////////////////////Edit Category edit_categories/////////////////////////////////
	
	
	public function edit_categories($id,Request $request){
		
		
		
		
		if ($request->isMethod('get')) {
			$editCategoryGet =  Categories::find($id);
			
			//dd($editCategory);
			//exit;
			
			
			if($request->in_active =='on')
				$in_active = 1;
			else
				$in_active = 0;
			
			$editCategoryGet->category_name;
			$editCategoryGet->category_name;
			$editCategoryGet->category_description;
			$editCategoryGet->meta_description;
			$editCategoryGet->parent_category;
			$editCategoryGet->category_icon;
			$editCategoryGet->category_banner;
			$editCategoryGet->lang_code;
			$editCategoryGet->meta_title;
			$editCategoryGet->meta_keywords;
			$editCategoryGet->in_active;
			$editCategoryGet->added_by;
			$editCategoryGet->added_date;
			$editCategoryGet->modified_by;
			$editCategoryGet->modified_date;
			
			
			dd($editCategoryGet);
			//$addCategory->save();
			
			
			return redirect('admin/allcategories');
			exit;
			
			
			//$addCategory->category_banner = $request->category_banner;
			
			
		}

       
		
		return view('backend.categories.addcategories',['parent_categories' => $parent_categories]);
		
	
	}
	
	
	
	
	
	
	
	
	
	
	
	/////////////////////////////////////////////End Edit Category ///////////////////////////////////////////////
	
	
	
	
	
	
	
	public function parent_categories(){
		
		return $parent_categories = Categories::where('parent_id',0)->get();
		 // return $parent_categories = Categories::all();
		
		
		
	}
	
	public function child_category($id){
		
		$child_categories = Categories::where('parent_category_id',$id)->get();
		
		
			$i=0;
			$child_category_array = array();
			foreach($child_categories as $key => $cat){
				$child_category_array[$i]['child_category_id'] = $cat->category_id;
				$child_category_array[$i]['child_category_name'] = $cat->category_name	;
				$i++;
			}
		
		return $child_category_array;
	}
	
	
	
	public function rules()
{
    return [
        'category_name' => 'required|unique:ss_categories|max:255'
        
    ];
}
}
