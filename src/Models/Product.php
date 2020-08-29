<?php

namespace Rcborinaga\Ecommerce\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

	protected $guarded = [];


	public static function createProductForm() {
		return "
			<form action='/products/store' method='POST'>
			<input type='hidden' name='_token' value='". csrf_token() ."' />
			<div class='form-group'>
			<label for='title'> Title </label> 
			<input type='text' name='name' class='form-control' >
			</div>
			<div class='form-group'>
			<label for='quantity'>Quantity</label>
			<input type='number' class='form-control' name='quantity' />
			</div>
			<div class='form-group'>
			<label for='description'> Description </label>
			<textarea class='form-control' rows='10' name='description'></textarea>
			</div>
			<button class='btn btn-primary'> Create Product </button>
			</form>
		";
	}


	public static function text($name, $attr) {
		$uFname = ucfirst($name);
		$attr 	= str_replace("=", '="', http_build_query($attr, null, '" ', PHP_QUERY_RFC3986)).'"';
		return "<div class='form-group'><label for='{$name}'> {$uFname} </label> <input type='text' {$attr} /> </div>";

	}

}
