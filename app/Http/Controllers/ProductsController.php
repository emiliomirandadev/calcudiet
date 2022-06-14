<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.product',['product' => $products]);
        //return 'Hola Mundo';
        //return view('product.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('product.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product[] = request()->except('_token');
        
        $product[0]['kcal']=$product[0]['kcal']*100/$product[0]['gram'];
        unset($product[0]['gram']);

        if($request->hasFile('photo')){
            $product[0]['photo']=$request->file('photo')->store('uploads','public');
        }
        
        Product::insert($product[0]);
        $id = Product::where('name',$product[0]['name'])->value('id');
        //return response()->json($id);
        
        return redirect()->route('products.show', ['product' => $id]);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $products = Product::select('id','photo','name','kcal','comment')->where('id',$id)->orwhere('name','like','%'.$id.'%')->get();
        //var_dump($products[0]['id']);
        if(isset($products[0]['id']))
            return view('product.show',['products' => $products]);
            
        else
            return view('hello');
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view ('product.edit',['product' => $product]);
        //var_dump($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = request()->except(['_token','_method']);

        $product['kcal']=$product['kcal']*100/$product['gram'];
        unset($product['gram']);
        
        Product::where('id',$id)->update($product);

        return redirect()->route('products.show', ['product' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        return view('hello');
    }
}
