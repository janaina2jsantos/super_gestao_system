@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Orders')

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
                <h1>Orders List</h1>
            </div>

            <?php
            
                $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

                if ($msg != '') {
                    echo '<div class="col-md-6 alert alert-success" style="margin-left: auto; margin-right:auto;">'.$msg.'</div>';
                }
            ?>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('app.orders.create') }}">Add New</a></li>
                </ul>
            </div>
            <div class="page-info">
                <div style="width: 65%; margin-left: auto; margin-right:auto;">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Client</th>
                          <th scope="col"></th>
                          <th scope="col" colspan="3">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($orders->count())
                            @foreach($orders as $order)
                                <tr>
                                   <td>{{ $order->id }}</td>
                                   <td>{{ $order->client->name }}</td>
                                   <td><a href="{{ route('app.order-product.create', ['id' => $order->id]) }}">Add Products</a></td>
                                   <td class="tb-smaller"><a href="{{ route('app.orders.edit', ['id' => $order->id]) }}" class="btn btn-sm btn-link">Edit</a></td>
                                   <td class="tb-smaller">
                                       <form action="{{ route('app.orders.destroy', ['id' => $order->id]) }}" method="POST" class="form-delete">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-link bt-delete">Delete</button>
                                        </form>
                                   </td>
                                </tr>
                            @endforeach
                        @endif
                      </tbody>
                    </table>
                    {{ $orders->appends($request)->links() }}
                    Total: {{ $orders->total() }} ({{ $orders->firstItem() }} de {{ $orders->total() }})
                </div>
            </div>  
        </div>
        @include('app.includes._footer')
    </div>
@endsection