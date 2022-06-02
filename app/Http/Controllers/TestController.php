<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\Product;
use Illuminate\Http\Request;

class TestController extends Controller
{
public function testFunction() {
        // dd('abcd');

    $product=Product::join('product_categories','product_categories.id','products.product_category_id')->select('products.*','product_categories.name as catname')->get();
        return view('product.index',compact('product'));
     }

     public function index()
     {
     	$tests=Test::get();
     	return view('test.index',compact('tests'));

     }
     public function create(){

     	return view('test.create');
     }
     public function testStore(Request $request){
          $request->validate([

          	'name'=>'required',
          	'class' =>'required'

          ]);

     	 Test::create($request->all());
     	 return redirect()->route('testcreate.index')->with('success','Student Added');
     }

     public function testedit($id)
    {
    	$test = Test::find($id);
        return view('test.edit',compact('test'));

    }

    public function testupdate(Request $request,$id)
    {
    	$test = Test::find($id);
        $request->validate(['name'=>'required',
            'class' => 'required'
        ]);
        $test->update($request->all());
         
        return redirect()->route('testcreate.index')->with('succeess','Student record has been updated successfully');
    }

    public function testdelete($id)
    {
    	$test=Test::find($id);
    	$test->delete();
    	return redirect()->route('testcreate.index')->with('success','Student record deleted successfully');
    }

}