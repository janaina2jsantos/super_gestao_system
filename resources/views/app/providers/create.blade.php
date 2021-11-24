@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Providers')

<style type="text/css">
    .page-title {
        padding: 30px 0px 20px 0px!important;
        margin-bottom: 10px;
    }
    .alert {
        padding: 2px!important;;
        margin-bottom: -5px;
    }
</style>

@section('content')
    @include('app.includes._menu')
    <div id="general-content" style="margin-top: 65px;">
        <div class="page-content">
            <div class="page-title">
                @if(isset($provider))
                    <h1>Edit provider</h1>
                @else
                    <h1>Add new Provider</h1>
                @endif
            </div>

            @if($msg && $msg != '')
                <div class="col-md-6 alert alert-success" style="margin-left: auto; margin-right:auto;">
                    {{ $msg }} 
                </div>
            @endif
 
            <div class="menu">
                <ul>
                    <li><a href="{{ route('app.providers.index') }}">Search</a></li>
                </ul>
            </div>

            <div class="page-info">
                <div style="width: 30%; margin-left: auto; margin-right:auto;">
                    <form action="{{ route('app.providers.create') }}" method="POST">
                        <input type="hidden" name="id" value="{{ $provider->id ?? '' }}" />
                        @csrf
                        <input type="text" name="name" placeholder="Name" class="black-border" autocomplete="none" value="{{ $provider->name ?? old('name') }}" />
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <input type="text" name="uf" placeholder="UF" class="black-border" value="{{ $provider->uf ?? old('uf') }}" />
                        @if($errors->has('uf'))
                            <div class="alert alert-danger">
                                {{ $errors->first('uf') }}
                            </div>
                        @endif
                        <input type="text" name="email" placeholder="Email" class="black-border" autocomplete="off" value="{{ $provider->email ?? old('email') }}" />
                        @if($errors->has('email'))
                            <div class="alert alert-danger">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                        <input type="text" name="site" placeholder="Site" class="black-border" autocomplete="none" value="{{ $provider->site ?? old('site') }}" />
                        @if($errors->has('site'))
                            <div class="alert alert-danger">
                                {{ $errors->first('site') }}
                            </div>
                        @endif
                        <button type="submit" class="black-border">SAVE</button>
                    </form>
                </div>
            </div>  
        </div>
        @include('app.includes._footer')
    </div>
@endsection