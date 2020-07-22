@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edição de Contrato <b>#{{ $agreement->id }}</b></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Início</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('agreements.index') }}">Contratos</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('agreements.edit', ['agreement' => $agreement->id]) }}">Edição</a></li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    @include('agreements.form',[
        'formTitle' => $renew ? 'Renovação de contrato': 'Formulário de cadastro',
        'isUpdate' => true,
        'agreement' => $agreement,
        'employees' => $employees,
        'customer_id' => null,
        'customer' => null,
        'renew' => $renew,
        'action' => $renew ? route('agreements.store', ['agreement' => $agreement->id]) : route('agreements.update', ['agreement' => $agreement->id])
    ])
@stop
