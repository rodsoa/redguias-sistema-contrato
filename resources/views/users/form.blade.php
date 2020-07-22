@php
    $btnSubmitLabel = $isUpdate ? 'Atualizar' : 'Cadastrar'
@endphp

<div class="row">
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">{{ $formTitle }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="users-form" role="form" action="{{ $action }}" method="POST">
                @csrf
                @if($isUpdate)
                    @method('PUT')
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" placeholder="Nome do cliente/empresa" name="name" value="{{ optional($user)->name }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="email" value="{{ optional($user)->email }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="password">Senha</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">{{ $btnSubmitLabel }}</button>
                        <a role="button" class="btn btn-danger" href="{{ route('users.index') }}">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
</div>
