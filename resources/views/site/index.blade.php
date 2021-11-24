@extends('site.layouts.basic')
@section('title', 'Super Gestão - Home')
<style type="text/css">
    .alert-success {
        padding: 10px!important;
        margin-bottom: 20px!important;
    }
</style>
@section('content')
    @include('site.includes._menu')
    <div id="general-content" style="margin-top: 65px; height: 100%;">
        <div class="high-content">
            <div class="left">
                <div class="informations">
                    <?php
            
                        $msg = isset($_GET['msg']) ? $_GET['msg'] : '';

                        if ($msg != '') {
                            echo '<div class="col-md-12 alert alert-success" style="margin-left: auto; margin-right:auto;">'.$msg.'</div>';
                        }
                    ?>

                    <h1>Super Gestão System</h1>
                    <p>Business management software ideal for your company.<p>
                    <div class="call">
                        <img src="{{ asset('img/check.png') }}" />
                        <span class="white-text">Complete and uncomplicated management</span>
                    </div>
                    <div class="call">
                        <img src="{{ asset('img/check.png') }}" />
                        <span class="white-text">Your company in the cloud</span>
                    </div>
                </div>
                <div class="video">
                    <iframe width="620" height="350" src="https://www.youtube.com/embed/5c9SapE_YNU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
            <div class="right">
                <div class="contact">
                    <h1>Contact</h1>
                    <p>If you have any questions, please contact our team using the form below.<p>
                    <!-- form-component -->
                    @component('site.components.form_contact', ['border' => 'white-border', 'contact_reasons' => $contact_reasons])
                    @endcomponent
                </div>
            </div>
        </div>
    </div>
@endsection






