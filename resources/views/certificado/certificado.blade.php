<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Título Opcional</title>

    <!--Custon CSS (está em /public/assets/site/css/certificate.css)-->
    <!--<link rel="stylesheet" href="{{ url('assets/site/css/certificate.css') }}">-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
         
<h1 class="text-center">Certificado</h1>

<h3>Certificamos que {{ $nome }} realizou o curso de {{ mb_strtoupper($curso->curso) }} realizando o seguinte conteudo:</h3>

<ol>
    @foreach( $curso->modulos as $modulo )
    <li>
        {{ $modulo->modulo }}
        <ol>
            @foreach( $modulo->conteudo as $conteudo )
                
                <li>{{ $conteudo->conteudo }} {{ $conteudo->realizado->count() == 0 ? ' - NÃO VISTO' : '' }}</li>
                
            @endforeach        
        </ol>
    </li>
    @endforeach
</ol>

<br>
<br>

<div class="text-center">
    <p>_____________________________________________</p>
    <p>{{ $dataExtenso }}</p>
    <p>Training System</p>
</div>
 
 
</body>
</html>