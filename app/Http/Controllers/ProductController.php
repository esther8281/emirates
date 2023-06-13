<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function productList()
    {
        $produtLists = Product::all();
        return view('pages.product.list',['products'=>$produtLists]);
    }

    public function productCreate(){
        return view('pages.product.create');
    }

    public function productSave(Request $request)
    {
        $pname = $request->get('pname');
        $psku = $request->get('psku');
        $pprice= $request->get('price');
        $pstatus= $request->get('status');
        $file = $request->file('image');
        if($file){
            $imageName = time().'.'.$request->file('image')->extension();
            $file->move(public_path('images'), $imageName); 
        }else{
            $imageName ='';
        }
        
        $product = new Product;
        $product->name = $pname;
        $product->sku = $psku;
        $product->price = $pprice;
        $product->status = $pstatus;
        $product->image = $imageName;
        $product->save();
        return redirect()->back()->with('success', 'Product Added Successfully');   
    }

    public function productEdit(Product $product){
        return view('pages.product.edit',['product'=>$product]);
    }

    public function productUpdate($id,Request $request){
        $product = Product::where('id', $id)->first();
        

        $pname = $request->get('pname');
        $psku = $request->get('psku');
        $pprice= $request->get('price');
        $pstatus= $request->get('status');
        $file = $request->file('image');
        if($file){
            $imageName = time().'.'.$request->file('image')->extension();
            $file_path = public_path().'/images/'.$product->image;
            unlink($file_path);
            $file->move(public_path('images'), $imageName); 
        }else{
            $imageName = $product->image;
        }

        $product->name = $pname;
        $product->sku = $psku;
        $product->price = $pprice;
        $product->status = $pstatus;
        $product->image = $imageName;
        $product->save();
        return redirect('product');

    }
    public function productDelete($id)
    {
        $product =  Product::find($id);
        if($product){
            $file_path = public_path().'/images/'.$product->image;
            unlink($file_path);
            $product->delete();
        }
        return redirect('product');
    }
}
