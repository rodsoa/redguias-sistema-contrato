<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Aloha!</title>

    <style type="text/css">
        * {
            font-family: Verdana, Arial, sans-serif;
        }

        table {
            font-size: x-small;
        }

        tfoot tr td {
            font-weight: bold;
            font-size: x-small;
        }

        .gray {
            background-color: lightgray
        }
    </style>

</head>
<body>

<table width="100%">
    <tr>
        <td valign="top">
            <img src="{{asset('img/logo.png')}}" alt="" width="150"/>
        </td>
        <td align="right" width="100%">
            <b>CONTRATO DE AUTORIZAÇÃO DE PRESTAÇÃO DE SERVIÇOS</b>
        </td>
    </tr>

    <tr>
        <p style="text-align: justify">
            A empresa / pessoa natural abaixo-assinada, contrata, em caráter irrevogável, obrigando-se herdeiros
            e sucessores, a <b>Editora RedGuias., CNPJ 08.956.117/0001-55</b>, estabelecida na Av. Paraná, 373 - Sala 05 - Centro
            CEP: 30.120-120 - Belo Horizonte - MG para publicar / veicular o anúncio abaixo no guia comercial  pelo de
            12 (doze) meses, estando ciente que o prazo de entrega do mesmo na praça é de no máximo 180 dias, a contar
            da autorização. Por estarem justos e contratados firmam o presente e elegem o foro de Belo Horizonte para dirimir
            eventual conflito.
        </p>
    </tr>
</table>

<hr>

<table width="100%">
    <tr style="margin-top: 12px">
        <td><strong>Razão Social:</strong> {{ $agreement->customer->company_name }}</td>
        <td><strong>Cidade:</strong> {{ $agreement->customer->city }}</td>
        <td><strong>Estado:</strong> {{ $agreement->customer->uf }}</td>
        <td><strong>CEP:</strong> {{ $agreement->customer->zipcode }}</td>
    </tr>

    <tr style="margin-top: 6px">
        <td><strong>CNPJ/CPF:</strong> {{ $agreement->customer->cnpj }}</td>
        <td><strong>Autorizante:</strong> {{ $agreement->service_contractor }}</td>
        <td><strong>Data:</strong> {{ $agreement->created_at->format('d/m/Y') }}</td>
        <td><strong>Edição:</strong> {{ $agreement->version }}</td>
    </tr>
</table>

<br/>

<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th>Destaque</th>
        <th>Endereço Comercial</th>
        <th>Telefone</th>
    </tr>
    </thead>
    <tbody>

    @php
        $categories = explode(',', $agreement->categories) ?? [];
        $addresses = explode(',', $agreement->comercial_address) ?? [];
        $phones = explode(',', $agreement->phones) ?? [];
    @endphp

    @for($i = 0; $i < count($categories); $i++)
        <tr>
            <td>{{ $categories[$i] }}</td>
            <td align="center">
                @if(isset($addresses[$i]))
                    {{$addresses[$i]}}
                @endif
            </td>
            <td align="right">
                @if(isset($phones[$i]))
                    {{$phones[$i]}}
                @endif
            </td>
        </tr>
    @endfor
    </tbody>

    <!--tfoot>
    <tr>
        <td colspan="3"></td>
        <td align="right">Subtotal $</td>
        <td align="right">1635.00</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">Tax $</td>
        <td align="right">294.3</td>
    </tr>
    <tr>
        <td colspan="3"></td>
        <td align="right">Total $</td>
        <td align="right" class="gray">$ 1929.3</td>
    </tr>
    </tfoot-->
</table>
<br>
<table width="100%">
    <thead style="background-color: lightgray;">
    <tr>
        <th colspan="7" align="center">Anúncio</th>
    </tr>
    <tr>
        <th>Faixa</th>
        <th>Cartão</th>
        <th>Logo</th>
        <th>1/4 Pag</th>
        <th>1/2 Pag</th>
        <th>1 Pag</th>
        <th>Local</th>
    </tr>
    </thead>
    <tbody>
        @php
            $ads = ['faixa', 'cartão', 'logo', '1/4 pág', '1/2 pág', '1 pág'];
        @endphp
        <tr>
            @foreach($ads as $ad)
                <td align="center">
                    @if(in_array($ad, explode(",", optional($agreement)->advertisement)))
                        X
                    @endif
                </td>
            @endforeach
            <td align="center">{{ $agreement->region }}</td>
        </tr>

        @if($agreement->modifications)
        <tr colspan="7">
            <td>
                <strong>Modificações:</strong> {{ $agreement->modifications }}
            </td>
        </tr>
        @endif
    </tbody>
</table>

<br>

<table width="100%">
    <tr>
        <td>
            <strong>SINAL R$:</strong>
            <i>
                {{ number_format($agreement->input_value, 2, ',', '.') }}
            </i>
        </td>
        <td>
            <strong>PARCELAS RESTANTES:</strong>
            {{$agreement->installments}}
            <strong> x R$</strong>
            <i>
                {{ number_format($agreement->installment_value, 2, ',', '.') }}
            </i>
        </td>
        <td>
            <strong>TOTAL R$:</strong>
            <i>
                {{ number_format($agreement->totalValue(), 2, ',', '.') }}
            </i>
        </td>
        <td>
            <strong>VENDEDOR:</strong> {{ $agreement->employee->name }}
        </td>
    </tr>
</table>

<table with="100%">
    @php
        $ads = ['credit_card' => 'CARTÃO', 'bank_check' => 'CHEQUE'];
    @endphp
    <tr>
        <td>
            <strong>FORMA DE PAGAMENTO:</strong> {{ $ads[$agreement->payment] }}
        </td>
        <td><strong>OBS</strong>{{ $agreement->observations }}</td>
    </tr>
</table>

<table width="100%">
    <tr style="margin-top: 6px">
        <td><strong>ENTREGA:</strong> {{ optional(optional($agreement)->deadline)->format('d-m-Y') }}</td>
    </tr>
</table>

<div style="text-align: center; margin-top: 30%">
    <img src="{{ $agreement->signature }}" width="300">
    <br>
    <b>Assinatura</b>
</div>

</body>
</html>
