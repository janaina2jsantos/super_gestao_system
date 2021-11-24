@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Providers')

<style type="text/css">
    .page-title {
        padding: 30px 0px 20px 0px!important;
        margin-bottom: 10px;
    }
    .alert {
        padding: 2px!important;
        margin-bottom: -5px;
    }
</style>

@section('content')
    @include('app.includes._menu')
    <div id="general-content" style="margin-top: 65px;">
        <div class="page-content">
            <div class="page-title">
                <h1>Search Providers</h1>
            </div>

            <?php
            
                $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

                if ($msg != '') {
                    echo '<div class="col-md-6 alert alert-success" style="margin-left: auto; margin-right:auto;">'.$msg.'</div>';
                }
            ?>

            <div class="menu">
                <ul>
                    <li><a href="{{ route('app.providers.create') }}">Add New</a></li>
                </ul>
            </div>

            <div class="page-info">
                <div style="width: 30%; margin-left: auto; margin-right:auto;">
                    <form action="{{ route('app.providers.list') }}" method="POST">
                        @csrf
                        <input type="text" name="name" placeholder="Enter the name" class="black-border" autocomplete="none" value="{{ old('name') }}" />
                        @if($errors->has('name'))
                            <div class="alert alert-danger">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                        <input type="text" name="uf" placeholder="Enter the UF" class="black-border" value="{{ old('uf') }}" />
                        <input type="text" name="email" placeholder="Enter the email" class="black-border" autocomplete="off" value="{{ old('email') }}" />
                        <input type="text" name="site" placeholder="Enter the site" class="black-border" autocomplete="none" value="{{ old('site') }}" />
                        <button type="submit" class="black-border">SEARCH</button>
                    </form>
                </div>
            </div>  
        </div>
        @include('app.includes._footer')        
    </div>
@endsection