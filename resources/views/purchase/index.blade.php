<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Purchase</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2><center><br>Purchase</center></h2><br>
</div>

<div class="pull-right mb-2">
	<a class="btn btn-success" href="{{ route('purchases.create') }}"> Add</a>
<a class="btn btn-primary"  href="{{route('sales.index')}}">Sales</a>

<a class="btn btn-primary" href="{{ route('profitreports.index') }}"> Report</a><br>

<form action="{{route('logout')}}" method="POST">
    @csrf
    <button style="margin-left: 700px;" class="btn btn-danger"  type="submit">Logout</button>
</form>



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
<th>Date</th>
<th>Vendor Name</th>

<th>Product Category</th>
<th>Product Name</th>
<th>Rate</th>
<th>Quantity</th>

<th>Total Amount</th>

</tr>
@foreach ($purchases as $purchase)
<tr>
<td>{{ $purchase->id }}</td>
<td>{{ date('d-m-Y', strtotime($purchase->date))}}</td>
<td>{{ $purchase->vendorname }}</td>
<td>{{ $purchase->catname }}</td>
<td>{{ $purchase->pname }}</td>
<td>{{ $purchase->rate }}</td>

<td>{{ $purchase->quantity }}</td>

<td>{{ $purchase->amount }}</td>
<td>
<form action="{{ route('purchases.destroy',$purchase->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('purchases.edit',$purchase->id) }}">Edit</a>
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