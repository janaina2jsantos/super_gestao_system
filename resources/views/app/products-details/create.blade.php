@extends('app.layouts.basic')
@section('title', 'Super Gestão - Admin | Product Detail')

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
                <h1>Adicionar Detalhes do Produto</h1>
            </div>
 
            <div class="menu">
                <ul>
                    <li><a href="#">Voltar</a></li>
                </ul>
            </div>

            <div class="page-info">
                <div style="width: 30%; margin-left: auto; margin-right:auto;">
                   <!-- form-component -->
                    @component('app.components.form_produto_detalhe', ['borda' => 'borda-preta', 'unidades' => $unidades, 'produtos' => $produtos])
                    @endcomponent
                </div>
            </div>  
        </div>
        @include('app.includes._footer')
    </div>
@endsection