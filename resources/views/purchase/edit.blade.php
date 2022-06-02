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
<a class="btn btn-primary" href="{{ route('purchases.index') }}" enctype="multipart/form-data"> Back</a>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-success" role="alert">
{{ session('status') }}
</div>
@endif
<form action="{{ route('purchases.update',$purchase->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Date:</strong>
<input type="date" name="date" value="{{ old('date',$purchase->date) }}" class="form-control" placeholder="date">
@error('date')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
	<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Productcategory Name:</strong>
<input type="text" name="product_category_id" value="{{App\Models\ProductCategory::find($purchase->product_category_id)->name }}" class="form-control" placeholder="Product category name">
@error('product_category_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Name:</strong>
<input type="text" name="product_id" value="{{App\Models\Product::find($purchase->product_id)->name }}" class="form-control" placeholder="Product name">
@error('product_id')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Vendor Name:</strong>
<input type="text" name="vendorname" value="{{ old('vendorname',$purchase->vendorname) }}" class="form-control" placeholder="Product category name">
@error('vendorname')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Rate:</strong>
<input type="number" name="rate" class="form-control" placeholder="Rate" value="{{ old('rate',$purchase->rate) }}">
@error('rate')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Quantity:</strong>
<input type="number" name="quantity" class="form-control" placeholder="Quantity" value="{{ old('quantity',$purchase->quantity) }}">
@error('quantity')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror

</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Amount:</strong>
<input type="number" name="amount" class="form-control" placeholder="Amount" value="{{ old('amount',$purchase->amount) }}">
@error('amount')
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