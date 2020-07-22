@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Usuários do sistema</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Início</a></li>
                    <li class="breadcrumb-item active">Usuarios</li>
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
                        <a href="{{route('users.create')}}" class="btn btn-sm btn-primary">
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
                                id="users-table"
                                class="table table-bordered table-striped dataTable"
                                role="grid"
                                aria-describedby="example1_info">
                                <thead>
                                    <tr role="row">
                                        <th>Nome</th>
                                        <th>Email</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$user->name}}</td>
                                            <td>{{$user->email}}</td>
                                            <td class="text-right">
                                                <div class="btn-group btn-group-sm">
                                                    <a
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        href="{{route('users.edit', ['user' => $user->id])}}"
                                                        title="editar"
                                                    >
                                                        <i class="fa fa-fw fa-user-edit"></i>
                                                        editar
                                                    </a>
                                                    <button
                                                        type="button"
                                                        class="btn btn-danger"
                                                        title="deletar"
                                                        onclick="deleteuser({{$user->id}})"
                                                    >
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        deletar
                                                    </button>
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

    @include('shared.delete_form')
@endsection

@section('js')
    <script>
        $('#users-table').dataTable();

        function deleteuser(id) {
            if (confirm('Tem certeza dessa ação ? Caso o usuário tenha contrato associado o mesmo será deletado.')) {
                const form = $('form[name="delete-form"]');
                form.attr('action', `/users/${id}`);
                form.submit();
            }
        }
    </script>
@stop
