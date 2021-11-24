@extends('site.layouts.basic')
@section('title', 'Super Gestão - Login')
@section('content')
    @include('site.includes._menu')
    <div id="general-content" style="margin-top: 65px;">
        <div class="page-content">
            <div class="page-title">
                <h1>Login</h1>
            </div>
            <div class="page-info col-md-6" style="margin-left: auto; margin-right: auto;">
                <div class="main-contact">
                    <!-- form-component -->
                    @component('site.components.form_login', ['border' => 'black-border'])
                        <p>Login to access the restricted area.</p>
                    @endcomponent
                </div>
                @if($error && $error != '')
                    <div class="alert alert-danger" role="alert">
                      {{ $error }}
                    </div>
                @endif
            </div>  
        </div>
        @include('site.includes._footer')
    </div>
@endsection

