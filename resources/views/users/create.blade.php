@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Novo Usuário</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Início</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuário</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('users.create') }}">Novo</a></li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    @include('users.form',[
        'formTitle' => 'Formulário de cadastro',
        'isUpdate' => false,
        'action' => route('users.store'),
        'user' => $user ?? null,
    ])
@stop
