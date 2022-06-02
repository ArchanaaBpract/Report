<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProfitReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 


        // $profits=Sale::join('product_categories','product_categories.id','sales.product_category_id')->join('products','products.id','sales.product_id')->select('sales.*',DB::raw("SUM(sales.amount) AS salesamount"),'products.name as pname','product_categories.name as catname')->groupBy('sales.id')->whereBetween('date',[$request->startdate, $request->enddate])->get();
        $profits=Sale::join('product_categories','product_categories.id','sales.product_category_id')->join('products','products.id','sales.product_id')->select('sales.*',DB::raw("SUM(sales.amount) AS salesamount"),'products.name as pname','product_categories.name as catname')->groupBy('sales.id')->where('sales.product_category_id',$request->product_category_id)->where('sales.product_id',$request->product_id)->whereBetween('date',[$request->startdate, $request->enddate])->get();
        // dd($profits);


         $purchases=Purchase::join('product_categories','product_categories.id','purchases.product_category_id')->join('products','products.id','purchases.product_id')->select('purchases.*',DB::raw("SUM(purchases.amount) AS purchaseamount"),'products.name as pname','product_categories.name as catname')->where('purchases.product_category_id',$request->product_category_id)->where('purchases.product_id',$request->product_id)->whereBetween('date',[$request->startdate, $request->enddate])->groupBy('purchases.id')->get();
        


        // if(!empty($request))
        
       // return $request->all();

        // $sales=Sale::join('product_categories','product_categories.id','sales.product_category_id')->whereBetween('date', [$request->startdate, $request->enddate])->select('sales.*','sales.customername as custname');
        // $profits=Purchase::join('product_categories','product_categories.id','purchases.product_category_id')->whereBetween('date',[$request->startdate, $request->enddate])->select('purchases.*','purchases.vendorname as vendname');
        // return $profits;
     // $profits=Product::join('product_categories','product_categories.id','products.product_category_id')->join('sales','sales.id','sales.product_category_id')->join('purchases','purchases.id','purchases.product_category_id')->select('sales.rate as salerate','sales.quantity as salequantity','purchases.rate as purchaserate','purchases.quantity as purchasequantity','purchases.date as purchasedate','products.name as pname','product_categories.name as catname')->get();
     // dd($profits);
     //    $profitreport=ProfitReport::get();




         $tot_sales = 0;
         $tot_purchases = 0;
         $startdate= $request->startdate;
         $enddate=$request->enddate;
         
         $productid=$request->product_id;
        return view('profitreport.index',compact('profits','purchases','tot_sales','tot_purchases','startdate','enddate','productid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {//
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfitReport  $profitReport
     * @return \Illuminate\Http\Response
     */
    public function show(ProfitReport $profitReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfitReport  $profitReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfitReport $profitReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfitReport  $profitReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfitReport $profitReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfitReport  $profitReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfitReport $profitReport)
    {
        // $profitReport->delete();
        // return redirect()->route('profitreports.index')->with('success','Deleted successfullly');
    }
}
