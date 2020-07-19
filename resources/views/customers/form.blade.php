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
            <form role="form" action="{{ $action }}" method="POST">
                @csrf
                @if($isUpdate)
                    @method('PUT')
                @endif
                <div class="card-body">
                    <div class="row">
                        <div class="form-group col-sm-8">
                            <label for="company_name">Cliente</label>
                            <input type="text" class="form-control" id="company_name" placeholder="Nome do cliente/empresa" name="company_name" value="{{ optional($customer)->company_name }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ" value="{{ optional($customer)->cnpj }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="zipcode">Cep</label>
                            <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="CEP" value="{{ optional($customer)->zipcode }}">
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" value="{{ optional($customer)->uf }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" value="{{ optional($customer)->address }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="address_number">Número</label>
                            <input type="text" class="form-control" id="address_number" name="address_number" placeholder="Número" value="{{ optional($customer)->address_number }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="address_complement">Complemento</label>
                            <input type="text" class="form-control" id="address_complement" name="address_complement" placeholder="Complemento" value="{{ optional($customer)->address_complement }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="phone_number">Telefone</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="(xx) xxxx-xxxx" value="{{ optional($customer)->phone_number }}">
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cellphone_number">Celular</label>
                            <input type="text" class="form-control" id="cellphone_number" name="cellphone_number" placeholder="(xx) xxxxx-xxxx" value="{{ optional($customer)->cellphone_number }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="contact_name">Contato</label>
                            <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Nome do contato" value="{{ optional($customer)->contact_name }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="email">Endereço de email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="cliente@email.com" value="{{ optional($customer)->email }}">
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <a role="button" class="btn btn-danger" href="{{ route('customers.index') }}">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
</div>
