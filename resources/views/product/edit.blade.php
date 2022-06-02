<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Managers Form - Laravel 8 CRUD Tutorial</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2>Edit Product</h2>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('product.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif
<form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Name:</strong>
<input type="text" name="name" value="{{ old('name',$product->name) }}" class="form-control" placeholder="Product category name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Sale Rate:</strong>
<input type="number" name="rate" class="form-control" placeholder="Sale Rate" value="{{ old('rate',$product->rate) }}">
@error('rate')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Purchase Rate:</strong>
<input type="number" name="rate2" class="form-control" placeholder=" Purchase Rate" value="{{ old('rate2',$product->rate2) }}">
@error('rate2')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>

<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
</form>
</div>
</body>
</html>