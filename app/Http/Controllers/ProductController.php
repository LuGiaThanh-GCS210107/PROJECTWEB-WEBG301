<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    public function add()
    {   
        $data = Artist::get();
        return view('add', compact('data'));
    }
    public function save(Request $request)
    {   
        $request->validate(
        [
            'id' => 'required',
            'name' => 'required',
            'price' => 'required',
            'details' => 'required',
            'image1' => 'required',
            'artist' => 'required'
        ]);
        $prd = new Product();
        $prd->productID = $request->id;
        $prd->productName = $request->name;
        $prd->productPrice = $request->price;
        $prd->productDetails = $request->details;
        $prd->productImage1 = $request->image1;
        $prd->artistID = $request->artist;
        $prd->save();

        return redirect()->back()->with('success', 'Product Added Successfully!');
    }
    public function edit($id)
    {   
        $artists = Artist::get();
        $data = Product::where('productID','=',$id)->first();        
        return view('edit',compact('data', 'artists'));
    }
    public function update(Request $request)
    {   
        $request->validate(
            [
                'name' => 'required',
                'price' => 'required',
                'details' => 'required',
                'image1' => 'required',
                'artist' => 'required'
            ]);
        $id = $request->id;
        Product::where('productID','=',$id)->update(
            [
                'productName'=>$request->name,
                'productPrice'=>$request->price,
                'productDetails'=>$request->details,
                'productImage1'=>$request->image1,
                'artistID'=>$request->artist
            ]
        );
        return redirect()->back()->with('success', 'Product Updated Successfully!');
    }
    public function delete($id)
    {   
        $data = Product::where('ProductID', '=',$id)->delete();
        return redirect()->back()->with('success', 'Product Deleted Successfully!');
    }

}