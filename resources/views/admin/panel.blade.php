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
    <x-admin-menu active-item='admin.panel'/>
    <div class='content-flow'>
        <div class='content-card'>
            <h4>Total de visitantes</h4>
            <div class='body'>
                <p>48 visitantes</p>
            </div>
            <div class='options'>
                <p class='delete'><i class="fas fa-trash-alt"></i> Deletar</p>
            </div>
        </div>
        <div class='content-card'>
            <h4>Total de simulações</h4>
            <div class='body'>
                <p>{{$totalSimulations}} simulações</p>
            </div>
            <div class='options'>
                <p class='delete'><i class="fas fa-trash-alt"></i> Deletar</p>
            </div>
        </div>
        <div class='content-card'>
            <h4>Total de pedidos de empréstimo</h4>
            <div class='body'>
                <p>48 pedidos de empréstimo</p>
            </div>
            <div class='options'>
                <p class='delete'><i class="fas fa-trash-alt"></i> Deletar</p>
            </div>
        </div>
        <div class='content-card'>
            <h4>Total de pedidos de desconto de títulos</h4>
            <div class='body'>
                <p>48 pedidos de desconto de títulos</p>
            </div>
            <div class='options disable'>
                <p class='delete'><i class="fas fa-trash-alt"></i> Deletar</p>
            </div>
        </div>
    </div>
</body>
</html>