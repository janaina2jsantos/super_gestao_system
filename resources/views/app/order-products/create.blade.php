@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Product Order')

<style type="text/css">
    .page-title {
        padding: 30px 0px 20px 0px!important;
        margin-bottom: 10px;
    }
    .alert {
        padding: 2px!important;;
        margin-bottom: -5px;
    }
    .center {
        width: 50%; 
        margin-left: auto; 
        margin-right:auto;
    }
    .clear {
        clear: both;
    }
</style>

@section('content')
    @include('app.includes._menu')
    <div id="general-content" style="margin-top: 65px;">
        <div class="row" style="margin-right: 0; margin-left: 0;">
            <div class="col-md-12" style="padding-right: 0; padding-left: 0;">
                <div class="page-content">
                    <div class="page-title">
                        <h1>Add Products to Order</h1>
                    </div>

                    <?php
                    
                        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

                        if ($msg != '') {
                            echo '<div class="col-md-6 alert alert-success" style="margin-left: auto; margin-right:auto;">'.$msg.'</div>';
                        }
                    ?>
         
                    <div class="menu">
                        <ul>
                            <li><a href="{{ route('app.orders.index') }}">Return</a></li>
                        </ul>
                    </div>

                    <div class="page-info">
                        <div class="center">
                            <h6 style="font-weight: bold;">Order Details</h6>
                            <p>ID: {{ $order->id }}</p>
                            <p>Client: {{ $order->client->name }}</p>
                        </div>
                        <br />

                        <div class="center">
                            <h6 style="font-weight: bold;">Order Items</h6>
                            @if(count($order->products) > 0)
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">Product ID</th>
                                  <th scope="col">Product Name</th>
                                  <th scope="col">Purchase Date</th>
                                  <th></th>
                                </tr>
                              </thead>
                              <tbody>
                                @foreach($order->products as $product)
                                    <tr>
                                       <td>{{ $product->id }}</td>
                                       <td>{{ $product->name }}</td>
                                       <td>{{ $product->pivot->created_at->format('d/m/Y') }}</td>
                                       <td>
                                            <form id="form_{{ $product->pivot->id }}" action="{{ route('app.order-product.destroy', ['idOrderProduct' => $product->pivot->id, 'idOrder' => $order->id]) }}" method="POST" class="form-delete">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <a href="#" onclick="document.getElementById('form_{{ $product->pivot->id }}').submit()">Delete</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                              </tbody>
                            </table>
                            @else
                                <p>No items added</p>
                            @endif
                        </div>
                        <br />

                        <div class="center">
                            <h6 style="font-weight: bold;">Add Item</h6>
                            <!-- form-component -->
                            @component('app.components.form_order_product', ['border' => 'black-border', 'order' => $order, 'products' => $products])
                            @endcomponent
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        @include('app.includes._footer')
    </div>
@endsection