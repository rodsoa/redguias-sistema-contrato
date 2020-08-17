@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edição de emails</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Início</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('configs.update') }}">Configurações</a></li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <!-- left column -->
        <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">Configurações de email</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="users-form" role="form" action="{{ route('configs.update') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="primary_email">Email Primário</label>
                                <input type="text" class="form-control" id="primary_email" name="primary_email" placeholder="email" value="{{ optional($config)->primary_email }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="secondary_email">Email Secundário</label>
                                <input type="text" class="form-control" id="secondary_email" name="secondary_email" placeholder="email" value="{{ optional($config)->secondary_email }}">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="float-right">
                            <button type="submit" class="btn btn-primary">Atualizar</button>
                            <a role="button" class="btn btn-danger" href="/">Cancelar</a>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>
        <!--/.col (left) -->
        <!-- right column -->
    </div>

@stop
