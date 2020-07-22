@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Novo Contrato</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Início</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('agreements.index') }}">Contratos</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('agreements.create') }}">Novo</a></li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    @include('agreements.form',[
        'formTitle' => 'Formulário de cadastro',
        'isUpdate' => false,
        'action' => route('agreements.store'),
        'agreement' => null,
        'employees' => $employees,
        'customers' => $customers,
        'customer' => $customer,
        'customer_id' => $customer_id,
    ])
@stop
