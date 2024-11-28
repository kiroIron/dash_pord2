<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\Product;
use Illuminate\Http\Request;

class admincontroller extends Controller
{
    function index(){
        return view('admin.index');
    }
    function viewproducts(){
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    function deleteproduct($id){
        product::find($id)->delete();
        return back();
    }
    function create(){
        $categories = category::all();
        return view('admin.products.create', compact('categories'));
    }
    function storeproduct (Request $request)
    { 
        $request->validate([
        "title"=>"required|min:6",
        "price"=>"required|integer",
        "description"=>"required|min:6"
        ]);

        $input =$request->except('image');
        
        if($request->hasFile('image')){
        $imagefile = $request->image; 
        $newimagename = uniqid() .".".$imagefile->getClientOriginalExtension();
        $imagefile->move("images/" ,$newimagename);
        $path = "images/$newimagename";
        $input['image'] = $path;
        }

        Product::create($input);
        
        return redirect()->route('viewproducts');
    }

 function edit($id){
 $product = Product::find($id);
 $categories =category::all();
  return view('admin.products.Edite', compact('product', '$categories'));
 }


 function update (Request $request ,$id)
 { 
     $request->validate([
     "title"=>"required|min:6",
     "price"=>"required|integer",
     "description"=>"required|min:6"
     ]);

     $input =$request->except('image');
     
     if($request->hasFile('image')){
     $imagefile = $request->image; 
     $newimagename = uniqid() .".". $imagefile->getClientOriginalExtension();
     $imagefile->move("images/" ,$newimagename);
     $path = "images/$newimagename";
     $input['image'] = $path;
     }
     $product = Product::find($id);
     $product->update($input); 
     return redirect()->route('viewproducts');
 }

}