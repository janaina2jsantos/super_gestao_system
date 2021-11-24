<?php

namespace App\Http\Controllers;

use App\Models\OrderProduct;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class OrderProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $order = Order::findOrFail($id)
            ->with('client')
            ->with('products')->find($id);
        $products = Product::all();
        return view('app.order-products.create', compact('order', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {   
        // validation
        $rules = [
            'product_id' => 'exists:products,id',
            'quantity'   => 'required'
        ];

        $messages = [
            'product_id.exists'   => 'The selected product doesn´t exist.'
        ];

        $request->validate($rules, $messages);

        $order = Order::findOrFail($id);
        $order->products()->attach($request->get('product_id'), ['quantity' => $request->get('quantity')]);
        return redirect()->route('app.order-product.create', ['id' => $order->id, 'msg' => 'Product added to order succesfully!']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function show(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function edit(PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PedidoProduto $pedidoProduto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PedidoProduto  $pedidoProduto
     * @return \Illuminate\Http\Response
     */
    public function destroy($idOrderProduct, $idOrder)
    {
        $orderProduct = OrderProduct::findOrFail($idOrderProduct);
        $orderProduct->delete();
        return redirect()->route('app.order-product.create', ['id' => $idOrder, 'msg' => 'Item deleted successfully!']);
    }
}
