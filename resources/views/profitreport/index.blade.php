<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Report</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" >
</head>
<body>
	<form action="{{route('profitreports.index') }}" method="Get" >
		<div class="row" style="margin-left: 150px;">


        <div class="col-md-2">
            <!-- <h4 style="margin-left: 250px;">Date to</h4> -->
          <br><input type="date" class="form-control" name="startdate" value="{{$startdate }}" id="datefilterfrom">
      </div>


        <div class="col-md-2">
            <!-- <h4 style="margin-left: 250px;">Date to</h4> -->
          <br><input type="date" class="form-control" name="enddate" id="datefilterto" value="{{$enddate }}" >
      </div>
      <div class="col-md-3">
<label for="productcategory_id"></label>
  <select name="product_category_id" id="productcategory_id" class="form-control">
    <option value="">Select Product Category</option>
    @foreach (App\Models\ProductCategory::pluck('name','id') as $id => $name)

    <option value="{{$id}}"@if ($id== request('product_category_id')) selected @endif>{{ $name}}</option>
    @endforeach
  </select>

      </div>


      <div class="col-md-2">

      <label for="product_id"></label>
      <select name="product_id" id="product_id" class="form-control">
           <option value="">Select Product</option>
      </select>
    </div>
  


          <div class="col-md-2">
<!-- <div class="form-group"> -->
	<br><center>
<button type="submit" class="btn btn-primary ml-3">Submit</button></center>
</div>
        <!-- </div> -->
        </div>
	</div>
</form>

<div class="row">

<div class="col-md-6"><br>
<h2 style="color:blue"><center><br>Sales Report</center></h2><br>

@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Date</th>

<th>Product Category</th>
<th>Product Name</th>
<th>Rate</th>
<th>Quantity</th>
<th>Sales Amount</th>
</tr>
@foreach ($profits as $profit)
<tr>
<td>{{ date('d-m-y',strtotime($profit->date))}}</td>
<td>{{ $profit->catname }}</td>
<td>{{ $profit->pname }}</td>
<td>{{ $profit->rate }}</td>
<td>{{ $profit->quantity }}</td>
@php $tot_sales += $profit->amount; @endphp
<td>{{ $profit->amount }}</td>
<!-- <td>{{ $profit->purchaseamount }}</td> -->
</tr>
@endforeach
</table>
@if ($tot_sales != 0)
<h2  style="color:green"><center>Total: {{$tot_sales}} Rs</center></h2>
@endif
</div>
<div class="col-md-6"><br>
<h2 style="color:blue"><center><br>Purchase Report</center></h2><br>
@if ($message = Session::get('success'))
<div class="alert alert-success">
<p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
<tr>
<th>Date</th>
<th>Product Category</th>
<th>Product Name</th>
<th>Rate</th>
<th>Quantity</th>
<!-- <th>Sales Amount</th> -->
<th>Purchase Amount</th>
</tr>
@foreach ($purchases as $purchase)
<tr>
<td>{{ date('d-m-y',strtotime($purchase->date))}}</td>
<td>{{ $purchase->catname }}</td>
<td>{{ $purchase->pname }}</td>
<td>{{ $purchase->rate }}</td>
<td>{{ $purchase->quantity }}</td>
@php  $tot_purchases += $purchase->amount; @endphp

<td>{{ $purchase->amount }}</td>
</tr>
@endforeach
</table>
@if ($tot_purchases != 0)
<h2 style="color:green"><center>Total: {{$tot_purchases}} Rs</center></h2>
@endif
</div>
</div>
@if ($tot_purchases != 0 && $tot_sales !=0)
@if ($tot_purchases > $tot_sales)
<div class="alert alert-danger">
<h1><center>Loss :   {{ $tot_purchases - $tot_sales}} Rs</center></h1>
</div>
@endif

@if ($tot_purchases < $tot_sales)
<div class="alert alert-success">
<h1><center>Profit :   {{ $tot_sales - $tot_purchases}} Rs</center></h1>
</div>
@endif

@if ($tot_purchases == $tot_sales)
<div class="alert alert-primary">
<h1><center>No profit or loss</center></h1>
</div>

@endif
@endif
<script type=text/javascript>
  $('#productcategory_id').change(function(){
    var categoryID = $(this).val();  
  if(categoryID){
    $.ajax({
      type:"GET",
      url:"{{url('getProduct')}}?productcategory_id="+categoryID,
      success:function(res){        
      if(res){
        $("#product_id").empty();
        $("#product_id").append('<option>Select Product</option>');
        $.each(res,function(key,value){
          $("#product_id").append('<option value="'+key+'" selected>'+value+'</option>');
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
</script>


</body>
</html>