@extends('adminEvents::layouts.app')

@section('content')
	<form action="/products/store" role="form" method="POST">
		@csrf

		<div>
			<label> Product Name: </label>
			<input type="text" name="name">
		</div>
		<br>
		<div>
			<label> Quantity </label>
			<input type="number" name="quantity">
		</div>
		<br>
		<div>
			<label> Description </label>
			<textarea cols="50" rows="10" name="description">  </textarea>
		</div>
		
		<button type="submit"> Add Product </button>

	</form>
@endsection