<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Product Category Form - Laravel 8 CRUD</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2>Add Product</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-info" role="alert">
{{ session('status') }}
</div>
@endif
<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Category:</strong>
<label for="productcategory_id"></label>
  <select name="product_category_id" id="productcategory_id" class="form-control">
    <option value="">select category</option>
    @foreach (App\Models\ProductCategory::pluck('name','id') as $id => $name)

    <option value="{{ $id}}">{{ $name}}</option>
    @endforeach
  </select>
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Name:</strong>
<input type="text" name="name" class="form-control" placeholder="Product Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product SalesRate:</strong>
<input type="number" name="rate" class="form-control" placeholder="Rate">
@error('rate')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product PurchaseRate:</strong>
<input type="number" name="rate2" class="form-control" placeholder="Rate">
@error('rate2')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</body>
</html>