<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Add Product Category Form - Laravel 8 CRUD</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
<div class="container mt-2">
<div class="row">
<div class="col-lg-12 margin-tb">
<div class="pull-left mb-2">
<h2><center><br>Add Student</center></h2><br>
</div>
<div class="pull-right">

</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-info" role="alert">
{{ session('status') }}
</div>
@endif
<form action="{{ route('testcreate.store') }}" method="POST">
@csrf

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Name:</strong>
<input type="text" name="name" class="form-control" placeholder="Name">
@error('name')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>

<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Class</strong>
<input type="number" name="class" id="class" class="form-control" placeholder="Class">
@error('class')
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