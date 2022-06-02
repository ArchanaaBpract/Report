<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $sales=Sale::get();
        // return $sales;
        // $productcategory=DB::table("product_categories")->pluck("name","id");

        $sales=Sale::join('product_categories','product_categories.id','sales.product_category_id')->join('products','products.id','sales.product_id')->select('sales.*','products.name as pname','product_categories.name as catname')->groupBy('sales.id')->orderBy('id','ASC')->get();
        return view('sale.index',compact('sales'));
    }



    public function getProduct(Request $request)
    {
        $products = Product::where("product_category_id",$request->productcategory_id)->pluck("name","id");
         return response()->json($products);
    }

    public function getProductRate(Request $request)
    {
        $rate = Product::where("id",$request->product_id)->pluck("rate");
         return response()->json($rate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Sale::create([

        //     'product_category_id' => 2,
        //     'product_id' => 2,
        //     'quantity' => 10,
        //     'rate' => 100,
        //     'amount' => 200,
        //     'date' => '2022-05-22',
        //     'customername' => 'Sidhu'

        // ]);
        return view('sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        $request->validate(['product_category_id'=>'required','product_id' => 'required', 'quantity' => 'required', 'rate' =>'required','date' =>'required','customername' => 'required|regex:/^[a-zA-Z]+$/u']);
        Sale::create($request->all());
        // Sale::create([

        //     'product_category_id' => 2,
        //     'product_id' => 2,
        //     'quantity' => 10,
        //     'rate' => 100,
        //     'amount' => 200,
        //     'date' => '2022-05-22',
        //     'customername' => 'Sidhu'

        // ]);
        return redirect()->route('sales.index')->with('success','Sale record added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sale)
    {
        return view('sale.edit',compact('sale'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sale)
    {
        $request->validate(['product_category_id'=>'required',
            'product_id' => 'required', 
            'quantity' => 'required', 
            'rate' =>'required','date' =>'required',
            'customername' => 'required|regex:/^[a-zA-Z]+$/u'
        ]);
        $sale->update($request->all());
         
        return redirect()->route('sales.index')->with('success','Sales record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sale)
    {
        $sale->delete();
        return redirect()->route('sales.index')->with('success','Sales record has been deleted successfully');
    }
}
