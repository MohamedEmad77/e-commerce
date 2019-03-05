<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Product;

use Session;

class ProductsController extends Controller
{



    public function __construct(){
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index')->with('products', Product::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'image' => 'required|image',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();
        $image->move('uploads/products', $new_image);


        Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => 'uploads/products/'.$new_image
        ]);


        Session::flash('success', 'Product added');

        return redirect()->route('products.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('products.edit')->with('product', Product::find($id));
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
        $this->validate($request,[
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required'
        ]);

        $product = Product::find($id);

        if($request->hasFile('image')){
            $this->validate($request, ['image' => 'image']);
            $image = $request->image;
            $new_image = time().$image->getClientOriginalName();
            $image->move('uploads/products', $new_image);
            $product->image = 'uploads/products/'.$new_image;
            $product->save();
        }
        
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        Session::flash('success', 'Product updated');

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if(file_exists($product->image)) unlink($product->image);

        $product->delete();

        Session::flash('success', 'Product deleted');

        return redirect()->back();

    }
}
