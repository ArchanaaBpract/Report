<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Purchase</title>
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
<h2><center><br>Purchase</center></h2><br>
</div>
<div class="pull-right">
<a class="btn btn-primary" href="{{ route('purchases.index') }}"> Back</a><br>
</div>
</div>
</div>
@if(session('status'))
<div class="alert alert-info" role="alert">
{{ session('status') }}
</div>
@endif
<form action="{{ route('purchases.store') }}" method="POST">
@csrf
<div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<br><strong>Date</strong>
<input type="date" name="date" class="form-control" placeholder="Date">
@error('date')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Vender Name:</strong>
<input type="text" name="vendorname" class="form-control" placeholder="Name">
@error('vendorname')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
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
      <label for="product_id"></label>
      <select name="product_id" id="product_id" class="form-control"></select>
    </div>
  </div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Quantity:</strong>
<input type="number" name="quantity" id="quantity" class="form-control" placeholder="Product Quantity">
@error('quantity')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Product Rate:</strong>
<input type="number" name="rate" id="rate" class="form-control" placeholder="Rate">
@error('rate')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<strong>Total amount</strong>
<input type="number" name="amount" id="amount" class="form-control" placeholder="Amount">
@error('amount')
<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
</div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
<div class="form-group">
<button type="submit" class="btn btn-primary ml-3">Submit</button>
</div>
  </form>

<script type=text/javascript>
  $('#productcategory_id').change(function(){
    var categoryID = $(this).val();  
  if(categoryID){
    $.ajax({
      type:"GET",
      url:"{{url('getProductt')}}?productcategory_id="+categoryID,
      success:function(res){        
      if(res){
        $("#product_id").empty();
        $("#product_id").append('<option>Select Product</option>');
        $.each(res,function(key,value){
          $("#product_id").append('<option value="'+key+'">'+value+'</option>');
        });
      
      }else{
        $("#product_id").empty();
      }
      }
    });
  }else{
    $("#product_id").empty();
   
  } 
  });


  $('#product_id').change(function(){
    var prodID = $(this).val();  
  if(prodID){
    $.ajax({
      type:"GET",
      url:"{{url('getProductRate')}}?product_id="+prodID,
      success:function(res){        
      if(res){
        $("#rate").empty();
        $("#rate").val(res);
        
      
      }else{
        $("#rate").val('');
      }
      }
    });
  }else{
    $("#rate").val('');
   
  } 
  });


$('#rate').keyup(function(){
  var rt= $(this).val();
  if(rt){


  var qty=$("#quantity").val();
  var amt= qty*rt;
  $('#amount').val(amt);
}
});



</script>
</body>
</html>