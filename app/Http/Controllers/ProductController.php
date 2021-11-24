<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Provider;
use App\Models\Unit;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::with('unit')->paginate(5);
        return view('app.products.index', ['products' => $products, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $units = Unit::all();
        $providers = Provider::all();
        return view('app.products.create', compact('units', 'providers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        // getting all coming from request and saving in database
        $data = $request->all();
        Product::create($data);
        return redirect()->route('app.products.index', ['msg' => 'Product registered successfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id)
            ->with('productDetail')
            ->with('provider')
            ->find($id);
        $length = isset($product->productDetail->length) ? $product->productDetail->length : '--';
        $width = isset($product->productDetail->width) ? $product->productDetail->width : '--';
        $height = isset($product->productDetail->height) ? $product->productDetail->height : '--';
        $provider_name = isset($product->provider->name) ? $product->provider->name : '--';
        $provider_site = isset($product->provider->site) ? $product->provider->site : '--';

        return "Name: $product->name<br />Weight: $product->weight<br />Unit: $product->unit_id<br />Description: $product->description<br /><br />
            <strong>Details:</strong><br />
            Lenght: $length<br />
            Width: $width<br />
            height: $height<br /><br />
            <strong>Provider:</strong><br />
            Name: $provider_name<br />
            Site: $provider_site<br /><br />
            <a href='/app/products'>Return</a>";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $units = Unit::all();
        $providers = Provider::all();
        return view('app.products.edit', compact('units', 'product', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->all();
        $product->update($data);
        return redirect()->route('app.products.index', ['msg' => 'Product updated successfully!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('app.products.index', ['msg' => 'Product deleted successfully!']);
    }
}
