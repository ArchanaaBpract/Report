<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchases=Purchase::join('product_categories','product_categories.id','purchases.product_category_id')->join('products','products.id','purchases.product_id')->select('purchases.*','products.name as pname','product_categories.name as catname')->groupBy('purchases.id')->orderBy('id','ASC')->get();
        return view('purchase.index',compact('purchases'));
    }


    public function getProductt(Request $request)
    {
        $products = Product::where("product_category_id",$request->productcategory_id)->pluck("name","id");
         return response()->json($products);
    }

    public function getProductRate(Request $request)
    {
        $rate = Product::where("id",$request->product_id)->pluck("rate2");
         return response()->json($rate);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('purchase.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
         $request->validate(['product_category_id'=>'required','product_id' => 'required', 'quantity' => 'required', 'rate' =>'required','date' =>'required','vendorname' => 'required|regex:/^[a-zA-Z]+$/u']);
         Purchase::create($request->all());
         return redirect()->route('purchases.index')->with('success','Purchase Record Added successfully');



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
          return view('purchase.edit',compact('purchase'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        $purchase->update($request->except('product_category_id','product_id'));
         
        return redirect()->route('purchases.index')->with('succeess','Sales record has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        $purchase->delete();
        return redirect()->route('purchases.index')->with('success','Deleted Successfullly');
    }
}
