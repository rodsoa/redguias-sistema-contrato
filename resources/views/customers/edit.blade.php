@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edição de Cliente</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Início</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Clientes</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('customers.edit', ['customer' => $customer->id]) }}">Edição</a></li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    @include('customers.form',[
        'formTitle' => 'Formulário de cadastro',
        'isUpdate' => true,
        'customer' => $customer,
        'action' => route('customers.update', ['customer' => $customer->id])
    ])
@stop
