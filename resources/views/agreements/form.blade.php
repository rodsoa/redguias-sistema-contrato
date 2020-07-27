@php
    $btnSubmitLabel = $isUpdate ? 'Atualizar' : 'Cadastrar';
    $customer = $agreement ? $agreement->customer : ($customer_id ? $customer : null);
    $isUpdate = $renew ? false : $isUpdate;
    $btnSubmitLabel = $renew ? 'Renovar' : $btnSubmitLabel;

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
            <form id="agreements-form" role="form" action="{{ $action }}" method="POST">
                @csrf
                @if($isUpdate)
                    @method('PUT')

                    @if($customer_id)
                        <input type="hidden" name="customer_id" value="{{$customer_id}}">
                    @endif
                @endif

                @if($renew)
                    <input type="hidden" name="customer_id" value="{{$agreement->customer_id}}">
                @endif
                <div class="card-body">
                    <div class="row">
                        @if(!$isUpdate && !$agreement)
                            <div class="form-group col-sm-3">
                                <label for="customer">Cliente</label>
                                <select type="text" class="form-control" id="customer_id" name="customer_id" readonly>
                                    @foreach($customers as $c)
                                        @if($c->id == $customer_id)
                                            <option value="{{ $c->id }}"  selected>{{ $c->company_name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="form-group col-sm-2">
                            <label for="deadline">Entrega</label>
                            <input
                                type="text"
                                class="form-control date"
                                id="deadline"
                                placeholder="00/00/0000"
                                value="{{ optional(optional($agreement)->deadline)->format('d-m-Y') }}"
                                name="deadline"
                            >
                        </div>
                        <div class="form-group col-sm-2">
                            <label for="deadline">Edição</label>
                            <input
                                type="text"
                                class="form-control"
                                id="version"
                                placeholder="Edição"
                                value="{{ optional($agreement)->version }}"
                                name="version"
                                required
                            >
                        </div>

                            <div class="form-group col-sm-2">
                                <label for="zipcode">Cep</label>
                                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="CEP" value="{{ optional(optional($customer))->zipcode }}" readonly>
                            </div>
                            <div class="form-group col-sm-1">
                                <label for="uf">Uf</label>
                                <input type="text" class="form-control" id="uf" name="uf" placeholder="UF" value="{{ optional(optional($customer))->uf }}" readonly>
                            </div>
                            <div class="form-group col-sm-2">
                                <label for="city">Cidade</label>
                                <input type="text" class="form-control" id="city" value="{{ optional(optional($customer))->city }}" readonly>
                            </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="company_name">Razação Social/Nome</label>
                            <input type="text" class="form-control disabled" id="company_name" placeholder="Nome do cliente/empresa" value="{{optional($customer)->company_name }}" readonly>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="cnpj">CPF/CNPJ</label>
                            <input type="text" class="form-control cnpj disabled" id="cnpj" placeholder="CNPJ" value="{{ optional($customer)->cnpj }}" readonly>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="deadline">Data</label>
                            <input
                                type="text"
                                class="form-control date"
                                @if($isUpdate)
                                    value="{{ $agreement->created_at->format('d/m/Y') }}"
                                @else
                                    value="{{ \Carbon\Carbon::now()->format('d/m/Y') }}"
                                @endif
                                readonly
                            >
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-3">
                            <label for="categories">Categorias</label>
                            <textarea class="form-control" id="categories" name="categories" placeholder="Categoria 1, Categoria 2, etc" required>{{ optional($agreement)->categories }}</textarea>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="address">Endereço Comercial</label>
                            <textarea class="form-control" id="address" placeholder="Endereço" name="comercial_address">{{ optional(optional($agreement))->comercial_address }}</textarea>
                        </div>
                        <div class="form-group col-sm-3">
                            <label for="phones">Telefones</label>
                            <textarea class="form-control" id="phones" name="phones" placeholder="(xx) xxxx-xxxx, (xx) xxxx-xxxx, etc">{{ optional($agreement)->phones }}</textarea>
                        </div>

                        <div class="col-sm-3" style="padding-left: 12px;padding-top: 38px">
                            @php
                                $ads = ['faixa', 'cartão', 'logo', '1/4 pág', '1/2 pág', '1 pág'];
                            @endphp
                            @foreach($ads as $ad)
                                <div class="form-check float-left" style="margin-right: 12px">
                                    <input
                                        class="form-check-input"
                                        type="checkbox"
                                        value="{{$ad}}"
                                        id="{{$ad}}"
                                        name="advertisement[]"
                                        @if(in_array($ad, explode(",", optional($agreement)->advertisement)))
                                            checked
                                        @endif
                                    >
                                    <label class="form-check-label" for="{{$ad}}">
                                        {{$ad}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="employee_id">Vendedor</label>
                            <select type="text" class="form-control" id="employee_id" name="employee_id" @if($isUpdate) readonly @endif>
                                @if($isUpdate)
                                    <option value="{{ optional($agreement)->employee_id }}" selected >{{ optional($agreement)->employee->name }}</option>
                                @else
                                    <option value="{{ auth()->user()->id }}" selected>{{ auth()->user()->name }}</option>
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="service_contractor">Autorizante</label>
                            <input
                                type="text"
                                class="form-control"
                                id="service_contractor"
                                name="service_contractor"
                                @if ($isUpdate)
                                    value="{{ optional($agreement)->service_contractor }}"
                                @else
                                    value="{{ optional($customer)->contact_name }}"
                                @endif
                                required
                            >
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="region">Local</label>
                            <input type="text" class="form-control" id="region" name="region" value="{{ optional($agreement)->region }}" required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label for="modifications">Modificações</label>
                            <input type="text" class="form-control" id="modifications" name="modifications" value="{{ optional($agreement)->modifications }}">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="observations">Observações</label>
                            <input type="text" class="form-control" id="observations" name="observations" value="{{ optional($agreement)->observations }}">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="form-group col-sm-3">
                                    @php
                                        $paymentForm = ['bank_check', 'credit_card'];
                                    @endphp
                                    <label for="owner">Pagamento</label>
                                    <select type="text" class="form-control" id="payment" name="payment" required>
                                        @foreach($paymentForm as $form)
                                            <option value="{{ $form }}" @if($form == optional($agreement)->payment) selected @endif>{{ $form == 'bank_check' ? 'Cheque' : 'Cartão' }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-sm-2">
                                    <label for="input_value" required>Sinal</label>
                                    <input type="text" class="form-control money2" id="input_value" name="input_value" value="{{ number_format(optional($agreement)->input_value, 2, ",", ".") }}">
                                </div>

                                <div class="form-group col-sm-2">
                                    <label for="installments" required>Parcelas</label>
                                    <input type="number" min="0" class="form-control" id="installments" name="installments" value="{{ optional($agreement)->installments }}" required>
                                </div>

                                <div class="form-group col-sm-2" required>
                                    <label for="installment_value">Valor</label>
                                    <input type="text" class="form-control money2" id="installment_value" name="installment_value" value="{{ number_format(optional($agreement)->installment_value, 2, ",", ".") }}">
                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="installment_value">Total</label>
                                    <input type="text" class="form-control bg-warning money2" value="{{ number_format(optional($agreement)->totalValue(), 2, ",", ".") }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-5">
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label>Assinatura</label>
                                    <canvas
                                        class="form-control"
                                        style="min-height: 120px;touch-action: none;"
                                    ></canvas>
                                    <input type="hidden" id="signature" name="signature" value="{{ optional($agreement)->signature }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <div class="float-right">
                        <button type="button" class="btn btn-default" onclick="clearSignaturePad()">Limpar Assinatura</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">{{ $btnSubmitLabel }}</button>
                        <button type="button" class="btn btn-primary" onclick="submitForm()">{{ $btnSubmitLabel }} e enviar</button>
                        <a role="button" class="btn btn-danger" href="{{ route('agreements.index') }}">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.card -->
    </div>
    <!--/.col (left) -->
    <!-- right column -->
</div>

@section("css")
@stop

@section("js")
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/signature_pad@3.0.0-beta.3/dist/signature_pad.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-mask-plugin@1.14.16/dist/jquery.mask.min.js" integrity="sha256-Kg2zTcFO9LXOc7IwcBx1YeUBJmekycsnTsq2RuFHSZU=" crossorigin="anonymous"></script>
    <script>
        var canvas = document.querySelector("canvas");
        var signaturePad = new SignaturePad(canvas);

        $('#customer_id').change(function(){
           location.href="/agreements/create?customer="+$(this).val();
        });

        if ( $('#signature').val() != null ||  $('#signature') != '') {
            signaturePad.fromDataURL($('#signature').val());
        }

        /**
         * MASCARAS
         */
        $('.date').mask('00/00/0000');
        $('.cep').mask('00000-000');
        $('.phone').mask('0000-0000');
        $('.phone_with_ddd').mask('(00) 0000-0000');
        $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
        $('.money2').mask("#.##0,00", {reverse: true});

        // Clears the canvas
        function clearSignaturePad() {
            signaturePad.clear();
        }

        // Submit Form with signature value
        function submitForm() {
            if (!signaturePad.isEmpty()) {
                $('#signature').val(
                    signaturePad.toDataURL()
                );
            }

            if(
                !$('input[name="advertisement[]"').is(':checked')
            ) {
                alert('Campo de anúncio precisa ser marcado ao menos um!');
            }

            if ( $('#agreements-form').valid() ) {
                $('#agreements-form').submit();
            } else {
                alert('Existem campos a serem preenchidos no formulário');
            }
        }
    </script>
@stop
