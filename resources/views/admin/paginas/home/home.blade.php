@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Usuários</span>
                    <span class="info-box-number"> <small> {{$totalUsuarios}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-tablet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Mesas</span>
                    <span class="info-box-number"> <small> {{$totalMesas}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-tablet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Categorias</span>
                    <span class="info-box-number"> <small> {{$totalCategorias}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-tablet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Produtos</span>
                    <span class="info-box-number"> <small> {{$totalProdutos}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        @admin()
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-tablet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Empresas</span>
                    <span class="info-box-number"> <small> {{$totalEmpresas}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-tablet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Planos</span>
                    <span class="info-box-number"> <small> {{$totalPLanos}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-tablet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Cargos</span>
                    <span class="info-box-number"> <small> {{$totalCargos}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-tablet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Perfis</span>
                    <span class="info-box-number"> <small> {{$totalPerfis}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fas fa-tablet"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Permisões</span>
                    <span class="info-box-number"> <small> {{$totalPermissoes}}</small></span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endadmin()
    </div>
@stop
