<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css'))}}">
    <link rel='stylesheet' href="{{ url(mix('css/admin-styles.css'))}}">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Document</title>
</head>
<body>
    <x-admin-menu/>
    <div class='content-flow'>
        @foreach ($simulations as $simulation)
            <div class='content-card'>
                <h4>Simulação número: {{$simulation['simulation_request']['id']}}</h4>
                <div class='body'>
                    <h5>Dados da simulação</p>
                    @foreach ($simulation['loan_data'] as $key => $value)
                        @if ($value != '')
                            <p><strong>{{$key}}:</strong> {{$value}}</p>
                        @endif
                    @endforeach
                    <h5>Dados pessoais</p>
                    @foreach ($simulation['person_data']['main_data'] as $key => $value)
                        @if ($value != '')
                            <p><strong>{{$key}}:</strong> {{$value}}</p>
                        @endif
                    @endforeach
                    <h5>Dados adicionais</p>
                    @foreach ($simulation['person_data']['addicional_data'] as $key => $value)
                        @if ($value != '')
                            <p><strong>{{$key}}:</strong> {{$value}}</p>
                        @endif
                    @endforeach
                </div>
                <div class='options'>
                    <p class='delete'><i class="fas fa-trash-alt"></i> Deletar</p>
                </div>
            </div>
        @endforeach
    </div>
</body>
</html>