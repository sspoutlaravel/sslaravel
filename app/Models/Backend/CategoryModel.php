<?php

namespace ShoppingSpout\Models\Backend;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table = 'categories';
	
	public $timestamps = true;
	
	protected $primaryKey = 'category_id';
	
	public function setCategoryUrlAttribute($value)
    {
		$this->attributes['category_url'] = strtolower(str_slug($value));
    }
	
	 public function setMetaDescriptionAttribute($value)
    {
		$this->attributes['meta_description'] = e($value);
    }
	
	public static $rules = array(
        'category_name'             => 'required|unique:ss_categories',                       // just a normal required validation
        'meta_description'             => 'required',                       // just a normal required validation
        'meta_title'             => 'required',                      // just a normal required validation
        'meta_keywords'             => 'required'                      // just a normal required validation
        // 'email'            => 'required|email|unique:ducks',     // required and must be unique in the ducks table
        // 'password'         => 'required',
        // 'password_confirm' => 'required|same:password'           // required and has to match the password field
    );
	
	
	
}
