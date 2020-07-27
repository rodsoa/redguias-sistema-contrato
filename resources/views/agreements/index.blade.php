@extends('adminlte::page')

@section('content_header')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Contratos do sistema</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/">Início</a></li>
                    <li class="breadcrumb-item active">Contratos</li>
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
                        Contratos
                        <small>
                            cadastrados no sistema
                        </small>
                    </h3>

                    <!--div class="float-right">
                        <a href="{{route('agreements.create')}}" class="btn btn-sm btn-primary">
                            <i class="fa fa-fw fa-plus-circle"></i>
                            Adicionar
                        </a>
                    </div-->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <table
                                    id="agreements-table"
                                    class="table table-bordered table-striped dataTable"
                                    role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                    <tr role="row">
                                        <th>Data</th>
                                        <th>Cliente</th>
                                        <th>Edição</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($agreements as $agreement)
                                        <tr>
                                            <td>{{$agreement->created_at->format('d-m-Y')}}</td>
                                            <td>{{$agreement->customer->company_name}}</td>
                                            <td>{{$agreement->version}}</td>
                                            <td class="text-right">
                                                <div class="btn-group btn-group-sm">
                                                    <a href="{{route('agreements.renew',['agreement' => $agreement->id])}}" type="button" class="btn btn-secondary"
                                                       title="renovar">
                                                        <i class="fa fa-fw fa-file-pdf"></i>
                                                        renovar
                                                    </a>
                                                    <a
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        href="{{route('agreements.edit', ['agreement' => $agreement->id])}}"
                                                        title="editar"
                                                    >
                                                        <i class="fa fa-fw fa-user-edit"></i>
                                                        editar
                                                    </a>
                                                    <a
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        href="{{route('agreements.download', ['agreement' => $agreement->id])}}"
                                                        title="email"
                                                    >
                                                        <i class="fa fa-fw fa-mail-bulk"></i>
                                                        email
                                                    </a>
                                                    @role('admin')
                                                    <button
                                                        type="button"
                                                        class="btn btn-danger"
                                                        title="deletar"
                                                        onclick="deleteAgreement({{$agreement->id}})"
                                                    >
                                                        <i class="fa fa-fw fa-trash"></i>
                                                        deletar
                                                    </button>
                                                    @endrole
                                                </div>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
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
        $('#agreements-table').dataTable({
            responsive: true
        });

        function deleteAgreement(id) {
            if (confirm('Tem certeza dessa ação ?')) {
                const form = $('form[name="delete-form"]');
                form.attr('action', `/agreements/${id}`);
                form.submit();
            }
        }
    </script>
@stop
