<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\Unit;
use Illuminate\Http\Request;

class ProductDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Home Product Detail.";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $products = Product::all();
        $units = Unit::all();
        return view('app.products-details.create', compact('units', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // pega tudo que vem do request e faz a inserção no banco
        $data = $request->all();
        ProductDetail::create($data);
        return redirect()->route('app.products-details.index', ['msg' => 'Product details registered successfully!']);
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
    {        // $productDetail = ProductDetail::findOrFail($id);
        $products = Product::all();
        $product  = Product::findOrFail($id)->with('productDetail')->find($id);
        $units    = Unit::all();
        return view('app.products-details.edit', compact('units', 'products', 'product'));
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
        $product = Product::findOrFail($id);
        $productDetail = ProductDetail::where('product_id', $product->id)->get();

        // if there is a record in database to the product, we´ll update
        if (count($productDetail) > 0) {
            ProductDetail::where('product_id', $product->id)
           ->update([
                'unit_id' => $request->get('unit_id'),
                'length'  => $request->get('length'),
                'width'   => $request->get('width'),
                'height'  => $request->get('height')
            ]);
        }
        // if there is not, we´ll crete a new one
        else {
            $productDetail = new ProductDetail();
            $productDetail->product_id = $product->id;
            $productDetail->unit_id = $request->get('unit_id');
            $productDetail->length = $request->get('length');
            $productDetail->width = $request->get('width');
            $productDetail->height = $request->get('height');
            $productDetail->save();
        }

        return redirect()->route('app.products.index', ['msg' => 'Product details updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
