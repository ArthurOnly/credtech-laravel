<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css')) }}">
    <link rel='stylesheet' href="{{ url(mix('css/auth-styles.css')) }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Cadastro</title>
</head>

<body>
    <div class='login-container'>
        <form class='form-container container' method='post' action={{ route('auth.signup') }}>
            @csrf
            <h4>Cadastro</h4>
            <div class='input-block dark'>
                <label>Nome</label>
                <input name='name' type='text'></input>
                <spam class='error-label'>
                    <i class="fas fa-times-circle"></i>
                    <p>Nome inválido</p>
                </spam>
                <spam class='focus-decorator' />
            </div>
            <div class='input-block dark'>
                <label>Email</label>
                <input name='email' type='text'></input>
                <spam class='error-label'>
                    <i class="fas fa-times-circle"></i>
                    <p>Email inválido</p>
                </spam>
                <spam class='focus-decorator' />
            </div>
            <div class='input-block dark'>
                <label>senha</label>
                <input name='password' type='password'></input>
                <spam class='error-label'>
                    <i class="fas fa-times-circle"></i>
                    <p>senha inválido</p>
                </spam>
                <spam class='focus-decorator' />
            </div>
            <button type='submit' class='btn-fill'>
                Enviar
                </submit>
        </form>
    </div>
</body>

</html>
