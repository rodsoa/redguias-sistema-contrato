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
            <form id="customers-form" role="form" action="{{ $action }}" method="POST">
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
                            <label for="cnpj">CPF/CNPJ</label>
                            <input type="text" class="form-control document" id="cnpj" name="cnpj" placeholder="CNPJ" value="{{ optional($customer)->cnpj }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-2">
                            <label for="zipcode">Cep</label>
                            <input type="text" class="form-control cep" id="zipcode" name="zipcode" placeholder="CEP" value="{{ optional($customer)->zipcode }}">
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="city">Cidade</label>
                            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade" value="{{ optional($customer)->city }}">
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="uf">UF</label>
                            <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" value="{{ optional($customer)->uf }}">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="address">Endereço</label>
                            <input type="text" class="form-control" id="address" name="address" placeholder="Endereço" value="{{ optional($customer)->address }}">
                        </div>
                        <div class="form-group col-sm-1">
                            <label for="address_number">Número</label>
                            <input type="text" class="form-control" id="address_number" name="address_number" placeholder="Número" value="{{ optional($customer)->address_number }}">
                        </div>
                        <div class="form-group col-sm-2">
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
                        <button type="submit" class="btn btn-primary">{{ $btnSubmitLabel }}</button>
                        @if(!$isUpdate)
                            <button id="btnCreateAndMakeNewAgreement" type="button" class="btn btn-primary">{{ $btnSubmitLabel }} e criar cadastro</button>
                        @endif
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

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js" integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>
    <script>
        $('.cep').mask('00000-000');

        $('#cnpj').change(function(){
            const doc = $('#cnpj');
            mask = '000.000.000-00';
            cont = doc.val();
            console.log(cont.length)
            if (cont.length === 11 || cont.length === 14) {
                mask = '000.000.000-00';
            } else {
                mask = '00.000.000/0000-00'
            }
            $('.documente').mask(mask, {reverse: true});
        });

        $('#btnCreateAndMakeNewAgreement').click(function(){
            const form = $('#customers-form');
            form.attr('action', '/customers/store-and-create-contract');
            form.submit();
        })

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#address").val("");
            $("#address_complement").val("");
            $("#uf").val("");
        }

        //Quando o campo cep perde o foco.
        $("#zipcode").blur(function() {

            //Nova variável "cep" somente com dígitos.
            var cep = $(this).val().replace(/\D/g, '');

            //Verifica se campo cep possui valor informado.
            if (cep != "") {

                //Expressão regular para validar o CEP.
                var validacep = /^[0-9]{8}$/;

                //Valida o formato do CEP.
                if(validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#address").val("");
                    $("#city").val("");
                    $("#address_complement").val("");
                    $("#uf").val("");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                            //Atualiza os campos com os valores da consulta.
                            $("#address").val(dados.logradouro);
                            $("#address_complement").val(dados.complemento);
                            $("#city").val(dados.localidade);
                            $("#uf").val(dados.uf);
                        } //end if.
                        else {
                            //CEP pesquisado não foi encontrado.
                            limpa_formulário_cep();
                            alert("CEP não encontrado.");
                        }
                    });
                } //end if.
                else {
                    //cep é inválido.
                    limpa_formulário_cep();
                    alert("Formato de CEP inválido.");
                }
            } //end if.
            else {
                //cep sem valor, limpa formulário.
                limpa_formulário_cep();
            }
        });
    </script>
@stop
