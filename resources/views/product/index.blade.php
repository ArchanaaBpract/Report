<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Product</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2><center><br>Product</center></h2>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('product.create') }}"> Add Product Page</a><br>
</div>
</div>
</div>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>S.No</th>

<th>Product Category</th>
<th>Product Name</th>
<th>Product SaleRate</th>
<th>Product PurchaseRate</th>

</tr>
@foreach ($product as $prod)
<tr>
<td>{{ $prod->id }}</td>
<td>{{ $prod->catname }}</td>
<td>{{ $prod->name }}</td>
<td>{{ $prod->rate }}</td>
<td>{{ $prod->rate2 }}</td>
<td>
<form action="{{ route('product.destroy',$prod->id)}}" method="Post">
<a class="btn btn-primary" href="{{ route('product.edit',$prod->id) }}">Edit</a>
@csrf
@method('DELETE')
<button type="submit" class="btn btn-danger">Delete</button>
</form>
</td>
</tr>
@endforeach
</table>

</body>
</html>