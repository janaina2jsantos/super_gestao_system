@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Providers')

<style type="text/css">
    .page-title {
        padding: 30px 0px 20px 0px!important;
        margin-bottom: 10px;
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
                <h1>Providers List</h1>
            </div>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('app.providers.create') }}">Add New</a></li>
                    <li><a href="{{ route('app.providers.index') }}">Search</a></li>
                </ul>
            </div>

            <div class="page-info">
                <div style="width: 65%; margin-left: auto; margin-right:auto;">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">UF</th>
                          <th scope="col">Email</th>
                          <th scope="col">Site</th>
                          <th scope="col"></th>
                          <th scope="col"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @if($providers->count())
                            @foreach($providers as $provider)
                                <tr>
                                   <td>{{ $provider->id }}</td>
                                   <td>{{ $provider->name }}</td>
                                   <td>{{ $provider->uf }}</td>
                                   <td>{{ $provider->email }}</td>
                                   <td>{{ $provider->site }}</td>
                                   <td class="tb-smaller"><a href="{{ route('app.providers.show', ['id' => $provider->id]) }}" class="btn btn-sm btn-link">Details</a></td>
                                   <td><a href="{{ route('app.providers.edit', ['id' => $provider->id]) }}" class="btn btn-sm btn-link">Edit</a></td>
                                  <td><a href="{{ route('app.providers.destroy', ['id' => $provider->id]) }}" class="btn btn-sm btn-link">Delete</a></td>
                                </tr>
                            @endforeach
                        @endif
                      </tbody>
                    </table>
                    {{ $providers->appends($request)->links() }}
                    Total: {{ $providers->total() }} ({{ $providers->firstItem() }} de {{ $providers->total() }})
                    
                </div>
            </div>  
        </div>
        @include('app.includes._footer')
    </div>
@endsection