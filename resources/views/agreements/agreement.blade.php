<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CONTRATO DE PRESTAÇÃO DE SERVIÇOS - REDGUIAS - {{ date('Y') }}</title>
<style>
#imagem {
width: 1000px;
height: 670px;
}

#nome {
	position: absolute;
	margin-top: -30px;
	left: 183px;
	top: 227px;
	width: 279px;
	height: 24px;
}
#cidade {
	position: absolute;
	margin-top: -30px;
	left: 530px;
	top: 226px;
	width: 254px;
	height: 23px;
}

#estado {
	position: absolute;
	margin-top: -30px;
	left: 831px;
	top: 226px;
	width: 56px;
	height: 23px;
}

#cep {
	position: absolute;
	margin-top: -30px;
	left: 934px;
	top: 226px;
	width: 56px;
	height: 23px;
}

#cnpj {
	position: absolute;
	margin-top: -30px;
	left: 109px;
	top: 258px;
	width: 317px;
	height: 23px;
}
#autorizante {
	position: absolute;
	margin-top: -30px;
	left: 558px;
	top: 259px;
	width: 150px;
	height: 23px;
}
#data {
	position: absolute;
	margin-top: -30px;
	left: 776px;
	top: 259px;
	width: 124px;
	height: 23px;
}
#edicao {
	position: absolute;
	margin-top: -30px;
	left: 980px;
	top: 258px;
	width: 58px;
	height: 23px;
}
#entrega {
	position: absolute;
	margin-top: -30px;
	left: 864px;
	top: 145px;
	width: 156px;
	height: 23px;
}
#destaques {
	position: absolute;
	margin-top: -30px;
	left: 54px;
	top: 325px;
	width: 482px;
	height: 229px;
}
#endereco {
	position: absolute;
	margin-top: -30px;
	left: 568px;
	top: 323px;
	width: 349px;
	height: 229px;
}
#telefone {
	position: absolute;
	margin-top: -30px;
	left: 934px;
	top: 323px;
	width: 95px;
	height: 229px;
}
#modificacoes {
	position: absolute;
	margin-top: -30px;
	left: 567px;
	top: 584px;
	width: 464px;
	height: 46px;
}
#local {
	position: absolute;
	margin-top: -30px;
	left: 265px;
	top: 603px;
	width: 288px;
	height: 20px;
}
#sinal {
	position: absolute;
	margin-top: -30px;
	left: 113px;
	top: 648px;
	width: 89px;
	height: 20px;
}
#parcelas {
	position: absolute;
	margin-top: -30px;
	left: 288px;
	top: 649px;
	width: 31px;
	height: 20px;
}
#valorparcelas {
	position: absolute;
	margin-top: -30px;
	left: 357px;
	top: 649px;
	width: 93px;
	height: 20px;
}
#total {
	position: absolute;
	margin-top: -30px;
	left: 522px;
	top: 649px;
	width: 93px;
	height: 20px;
}
#vendedor {
	position: absolute;
	margin-top: -30px;
	left: 692px;
	top: 649px;
	width: 112px;
	height: 20px;
}
#obs {
	position: absolute;
	margin-top: -30px;
	left: 386px;
	top: 709px;
	width: 419px;
	height: 20px;
}
#ass {
	position: absolute;
	margin-top: -30px;
	left: 822px;
	top: 641px;
	width: 191px;
	height: 20px;
}
.style2 {
	font-size: 11px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.style3 {font-size: 14px; font-weight: bold; font-family: Arial, Helvetica, sans-serif; }
</style>

</head>

<body>

<img style="margin-left:30px; margin-top:30px; " id="imagem" src="{{ public_path('img/contrato.png') }}"/>
<div id="entrega" class="style3">
  <div align="center">{{ optional(optional($agreement)->deadline)->format('d-m-Y') }}</div>
</div>
<div id="nome" class="style2">{{ $agreement->customer->company_name }}</div>
<div id="cidade" class="style2">{{ $agreement->customer->city }}</div>
<div id="estado" class="style2">{{ $agreement->customer->uf }}</div>
<div id="cep" class="style2">{{ $agreement->customer->zipcode }}</div>
<div id="cnpj" class="style2">{{ $agreement->customer->cnpj }}</div>
<div id="autorizante" class="style2">{{ $agreement->service_contractor }}</div>
<div id="data" class="style2">{{ $agreement->created_at->format('d/m/Y') }}</div>
<div id="edicao" class="style2">{{ $agreement->version }}</div>


<div id="destaques" class="style2"><p> {{ $agreement->categories }}</p></div>
<div id="endereco" class="style2"> {{ $agreement->comercial_address }}</div>
<div id="telefone" class="style2">{{ $agreement->phones }}</div>
<div id="modificacoes" class="style2">{{ $agreement->modifications }}</div>
<div id="local" class="style2">{{ $agreement->region }}</div>
<div id="sinal" class="style2">{{ number_format($agreement->input_value, 2, ',', '.') }}</div>
<div id="parcelas" class="style2">{{$agreement->installments}}</div>
<div id="valorparcelas" class="style2">{{ number_format($agreement->installment_value, 2, ',', '.') }}</div>
<div id="total" class="style3">{{ number_format($agreement->totalValue(), 2, ',', '.') }}</div>
<div id="vendedor" class="style2">{{ $agreement->employee->name }}</div>
<div id="obs" class="style2">{{ $agreement->observations }}</div>
<div id="ass" class="style2"><img src="{{ $agreement->signature }}" width="300"></div>
</body>
</html>
