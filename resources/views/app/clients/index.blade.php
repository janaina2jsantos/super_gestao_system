@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Clients')

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
                <h1>Clients List</h1>
            </div>

            <?php
            
                $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

                if ($msg != '') {
                    echo '<div class="col-md-6 alert alert-success" style="margin-left: auto; margin-right:auto;">'.$msg.'</div>';
                }
            ?>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('app.clients.create') }}">Add New</a></li>
                </ul>
            </div>

            <div class="page-info">
                <div style="width: 65%; margin-left: auto; margin-right:auto;">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col" colspan="3">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($clients->count())
                            @foreach($clients as $client)
                                <tr>
                                   <td>{{ $client->id }}</td>
                                   <td>{{ $client->name }}</td>
                                   <td class="tb-smaller"><a href="{{ route('app.clients.show', ['id' => $client->id]) }}" class="btn btn-sm btn-link">Details</a></td>
                                   <td class="tb-smaller"><a href="{{ route('app.clients.edit', ['id' => $client->id]) }}" class="btn btn-sm btn-link">Edit</a></td>
                                   <td class="tb-smaller">
                                        <form action="{{ route('app.clients.destroy', ['id' => $client->id]) }}" method="POST" class="form-delete">
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
                    {{ $clients->appends($request)->links() }}
                    Total: {{ $clients->total() }} ({{ $clients->firstItem() }} de {{ $clients->total() }})
                </div>
            </div>  
        </div>
        @include('app.includes._footer')        
    </div>
@endsection