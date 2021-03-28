<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css'))}}">
    <link rel='stylesheet' href="{{ url(mix('css/taxas-styles.css'))}}">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Document</title>
</head>
<body>
    <x-navbar/>
    <section class='contact-form-section'>
        <div class='container section-container'>
            <div class='left-container'>
                <form class='container form-container'>
                    <h4>Entre em contato conosco</h4>
                    <div class='input-block light'>
                        <label>Nome</label>
                        <input type='text'></input>
                        <spam class='focus-decorator'/>
                    </div>
                    <div class='input-block light'>
                        <label>Email</label>
                        <input type='text'></input>
                        <spam class='focus-decorator'/>
                    </div>
                    <div class='input-block light'>
                        <label>Telefone</label>
                        <input type='text'></input>
                        <spam class='focus-decorator'/>
                    </div>
                    <div class='input-block light'>
                        <label>Mensagem</label>
                        <textarea type='text'></textarea>
                        <spam class='focus-decorator'/>
                    </div>
                    <button type='submit' class='btn-fill'>
                        Enviar
                    </submit>
                </form>
            </div>
            <div class='right-container'>
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1984.4171034321585!2d-35.19642911597899!3d-5.878911353766508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2f8b5bf88a621%3A0x4ff30b6dc85a6293!2sR.%20Orlando%20Lima%20-%20Ponta%20Negra%2C%20Natal%20-%20RN!5e0!3m2!1spt-BR!2sbr!4v1616954393646!5m2!1spt-BR!2sbr" 
                width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>
    <section class='informations'>
        <div class='container section-container'>
            <div class='full-grid-container'>

            </div>
        </div>
    </section>

    <x-footer/>

    <script src='{{ url(mix('js/global-script.js'))}}'></script>
</body>
</html>