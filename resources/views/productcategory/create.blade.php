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
<h2>Add ProductCategory</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('productcategory.index') }}"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-info" role="alert">
{{ session('status') }}
</div>
@endif
<form action="{{ route('productcategory.store') }}" method="POST" enctype="multipart/form-data">
@csrf
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>ProductCategory Name:</strong>
<input type="text" name="name" class="form-control" placeholder="Product Name">
@error('name')
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