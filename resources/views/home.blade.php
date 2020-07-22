@extends('adminlte::page')

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $total }}</h3>
                    <p>Clientes</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $open }}</h3>
                    <p>Contratos Abertos</p>
                </div>
                <div class="icon">
                    <i class="fa fa-check-double"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $close }}</h3>
                    <p>Contratos Finalizados</p>
                </div>
                <div class="icon">
                    <i class="fa fa-window-close"></i>
                </div>
            </div>
        </div>
        <!-- ./col -->
    </div>

    <div class="row">
        <div class="co-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title" style="padding-top: 6px">
                        Ultimos Contratos
                        <small>
                            cadastrados no sistema
                        </small>
                    </h3>

                    <div class="float-right">
                        <a href="{{route('agreements.create')}}" class="btn btn-sm btn-primary">
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
                                id="agreements-table"
                                class="table table-bordered table-striped dataTable"
                                role="grid"
                                aria-describedby="example1_info">
                                <thead>
                                <tr role="row">
                                    <th>Data</th>
                                    <th>Cliente</th>
                                    <th>Edição</th>
                                    <th>Total</th>
                                    <th>Entrega</th>
                                    <th>Vendedor</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($latests as $agreement)
                                    <tr>
                                        <td>{{$agreement->created_at->format('d-m-Y')}}</td>
                                        <td>{{$agreement->customer->company_name}}</td>
                                        <td>{{$agreement->created_at->format('Y')}}</td>
                                        <td>R$ {{number_format($agreement->totalValue(), 2, ',', '.')}}</td>
                                        <td>{{$agreement->deadline->format('d-m-Y')}}</td>
                                        <td>{{optional($agreement->employee)->name}}</td>
                                        <td>
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
                                                    href="{{route('agreements.edit', ['agreement' => $agreement->id])}}"
                                                    title="email"
                                                >
                                                    <i class="fa fa-fw fa-mail-bulk"></i>
                                                    email
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
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#agreements-table').dataTable();
    </script>
@stop
