@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Welcome')
@section('content')
    @include('app.includes._menu')
    <div id="general-content" style="margin-top: 65px;">
        <div class="page-content">
            <div class="page-title">
                <h1>Welcome {{ $user_name ? $user_name : ''}}</h1>
            </div>

            <div class="page-info">
                <p>Super Gestão is the online administrative control system that can transform and enhance your company's business.</p>
                <p>Developed with the latest technology for you to take care of what is most important, your business!</p>
            </div>  
        </div>
        @include('app.includes._footer')
    </div>
@endsection