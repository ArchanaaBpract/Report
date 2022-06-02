<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Student</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left">
<h2><center><br>Student</center></h2><br>
</div>
<div class="pull-right mb-2">
<a class="btn btn-success" href="{{ route('testcreate.create') }}"> Add</a><br>
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
<th>Name</th>
<th>Class</th>
</tr>
@foreach ($tests as $test)
<tr>
<td>{{ $test->id }}</td>
<td>{{ $test->name }}</td>
<td>{{ $test->class }}</td>
<td>
<form action="{{ route('testcreate.delete',$test->id) }}" method="Post">
<a class="btn btn-primary" href="{{ route('testcreate.edit',$test->id) }}">Edit</a>
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