@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Clientes do sistema</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Início</a></li>
                    <li class="breadcrumb-item active">Clientes</li>
                </ol>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="padding-top: 6px">
                        Clientes
                        <small>
                            cadastrados no sistema
                        </small>
                    </h3>

                    <div class="float-right">
                        <a href="{{route('customers.create')}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            Adicionar
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table
                                id="customers-table"
                                class="table table-bordered table-striped dataTable"
                                role="grid"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th>Cliente</th>
                                        <th>CNPJ</th>
                                        <th>Telefone</th>
                                        <th>Contato</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($customers as $customer)
                                        <tr>
                                            <td>{{$customer->company_name}}</td>
                                            <td>{{$customer->cnpj}}</td>
                                            <td>{{$customer->phone_number}}</td>
                                            <td>{{$customer->contact_name}}</td>
                                            <td>
                                                <div class="btn-group btn-group-sm">
                                                    <a
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        href="{{route('customers.edit', ['customer' => $customer->id])}}"
                                                        title="editar"
                                                    >
                                                        <i class="fa fa-fw fa-user-edit"></i>
                                                        editar
                                                    </a>
                                                    <a href="#" type="button" class="btn btn-secondary"
                                                        title="renovar contrato">
                                                        <i class="fa fa-fw fa-undo"></i>
                                                        renovar
                                                    </a>
                                                    <a href="#" type="button" class="btn btn-danger btn-sm"
                                                        title="deletar">
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        deletar
                                                    </a>
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection

@section('js')
    <script>
        $('#customers-table').dataTable();
    </script>
@stop
