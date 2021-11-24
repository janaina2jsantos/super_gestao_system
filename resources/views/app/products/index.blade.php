@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Products')

<style type="text/css">
    .page-title {
        padding: 30px 0px 20px 0px!important;
        margin-bottom: 10px;
    }
    .tb-smaller {
        width: 25px;
    }
    .bt-delete {
        margin-top: 0px;
    }
    .bt-delete:hover {
        background-color: transparent;
    }
    .form-delete {
        height: 0;
    }
    .table {
        margin-top: 50px;
    }
</style>

@section('content')
    @include('app.includes._menu')
    <div id="general-content" style="margin-top: 65px;">
        <div class="page-content">
            <div class="page-title">
                <h1>Products List</h1>
            </div>

            <?php
            
                $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

                if ($msg != '') {
                    echo '<div class="col-md-6 alert alert-success" style="margin-left: auto; margin-right:auto;">'.$msg.'</div>';
                }
            ?>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('app.products.create') }}">Add New</a></li>
                </ul>
            </div>

            <div class="page-info">
                <div style="width: 65%; margin-left: auto; margin-right:auto;">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Weight</th>
                          <th scope="col">Unit</th>
                          <th scope="col">Description</th>
                          <th scope="col" colspan="3">Action</th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($products->count())
                            @foreach($products as $product)
                                <tr>
                                   <td>{{ $product->id }}</td>
                                   <td>{{ $product->name }}</td>
                                   <td>{{ $product->weight }}</td>
                                   <td>{{ $product->unit->unit }}</td>
                                   <td>{{ $product->description }}</td>
                                   <td class="tb-smaller"><a href="{{ route('app.products.show', ['id' => $product->id]) }}" class="btn btn-sm btn-link">Details</a></td>
                                   <td class="tb-smaller"><a href="{{ route('app.products.edit', ['id' => $product->id]) }}" class="btn btn-sm btn-link">Edit</a></td>
                                   <td class="tb-smaller">
                                        <form action="{{ route('app.products.destroy', ['id' => $product->id]) }}" method="POST" class="form-delete">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-link bt-delete">Delete</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('app.products-details.edit', ['id' => $product->id]) }}" title="add/edit product details">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
                                              <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3a.5.5 0 0 1 1 0z"/>
                                            </svg>
                                        </a>
                                    </td>
                                </tr>
                                @if(count($product->orders) > 0)
                                <tr>
                                    <td colspan="8">
                                        <p><strong>Orders</strong></p>
                                        @foreach($product->orders as $order)
                                            <a href="{{ route('app.order-product.create', $order->id) }}">Order: {{ $order->id }}</a>
                                        @endforeach
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endif
                      </tbody>
                    </table>
                    {{ $products->appends($request)->links() }}
                    Total: {{ $products->total() }} ({{ $products->firstItem() }} de {{ $products->total() }})
                </div>
            </div>  
        </div>
        @include('app.includes._footer')
    </div>
@endsection