@extends('adminlte::page')

@section('content')
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
                                    @foreach($latests as $agreement)
                                        <tr>
                                            <td>{{$agreement->created_at->format('d-m-Y')}}</td>
                                            <td>{{$agreement->customer->company_name}}</td>
                                            <td>{{$agreement->created_at->format('Y')}}</td>
                                            <td class="text-right">
                                                <div class="btn-group btn-group-sm">
                                                    <a
                                                        type="button"
                                                        class="btn btn-secondary"
                                                        href="{{route('agreements.download', ['agreement' => $agreement->id])}}"
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
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $('#agreements-table').dataTable({
            responsive: true
        });
    </script>
@stop
