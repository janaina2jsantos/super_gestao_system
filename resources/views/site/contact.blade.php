@extends('site.layouts.basic')
@section('title', 'Super Gestão - Contact')
@section('content')
    @include('site.includes._menu')
    <div id="general-content" style="margin-top: 65px;">
        <div class="page-content">
            <div class="page-title">
                <h1>Contact us</h1>
            </div>
            <div class="page-info col-md-6" style="margin-left: auto; margin-right: auto;">
                <div class="main-contact">
                    <!-- form-component -->
                    @component('site.components.form_contact', ['border' => 'black-border', 'contact_reasons' => $contact_reasons])
                        <p>Fill the form below. Our team will return soon!</p>
                        <p>Our average response time is 48 hours.</p>
                    @endcomponent
                </div>
            </div>  
        </div>
        @include('site.includes._footer')
    </div>
@endsection

