<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css'))}}">
    <link rel='stylesheet' href="{{ url(mix('css/contact-styles.css'))}}">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Document</title>
</head>
<body>
    <x-navbar/>
    <x-popup/>
    <section class='contact-form-section nav-margin'>
        <div class='container section-container'>
            <div class='left-container'>
                <form class='container form-container'>
                    <h4>Entre em contato conosco</h4>
                    <div class='input-block light'>
                        <label>Nome</label>
                        <input value='' required placeholder='Isaac Danilo' name='name' type='text'></input>
                        <spam class='error-label'>
                            <i class="fas fa-times-circle"></i>
                            <p>Nome inválido</p>
                        </spam>
                        <spam class='focus-decorator'/>
                    </div>
                    <div class='input-block light'>
                        <label>Email</label>
                        <input required name='email' type='text' placeholder='emailcred@gmail.com'></input>
                        <spam class='error-label'>
                            <i class="fas fa-times-circle"></i>
                            <p>Email inválido</p>
                        </spam>
                        <spam class='focus-decorator'/>
                    </div>
                    <div class='input-block light'>
                        <label name='celphone'>Telefone</label>
                        <input name='celphone' required placeholder='(84) 9999-8888' type='text'></input>
                        <spam class='error-label'>
                            <i class="fas fa-times-circle"></i>
                            <p>Telefone inválido</p>
                        </spam>
                        <spam class='focus-decorator'/>
                    </div>
                    <div class='input-block light'>
                        <label>Mensagem</label>
                        <textarea required placeholder='Olá, gostaria de saber...' name='message' type='text'></textarea>
                        <spam class='error-label'>
                            <i class="fas fa-times-circle"></i>
                            <p>Digite uma mensagem</p>
                        </spam>
                        <spam class='focus-decorator'/>
                    </div>
                    <div class='input-block light'>
                    <div class='checkbox'>
                        <label class='checkbox-visible' for='accept_data'>
                            <i class="fas fa-check"></i>
                        </label>
                        <input id='accept_data' name='accept_data' type='checkbox' />
                        <label class='text'>Aceito que meus dados sejam salvos para que a empresa possa contatar-me.</label>
                    </div>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Obrigatório</p>
                    </spam>
                </div>
                    <button type='submit' class='btn-fill'>
                        Enviar
                    </submit>
                </form>
            </div>
            <div class='right-container container'>
                <h4>Nossas informações de contato</h1>
                <p>Caso prefira, você pode entrar em contato conosco
                por telefone, email ou a partir de nossa localização física.</p>
                <div class='contact-block'>
                    <div class='contact-circle'>
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h6>credtechnatal@gmail.com</h6>
                </div>
                <div class='contact-block'>
                    <div class='contact-circle'>
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h6>(84) 99408-4212 ou (84) 99970-2626</h6>
                </div>
                <div class='contact-block'>
                    <div class='contact-circle'>
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h6>Rua Orlando De Lima, 465,
Bloco D – Ponta Negra, Natal – RN.</h6>
                </div>
            </div>
        </div>
    </section>
    <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1984.4171034321585!2d-35.19642911597899!3d-5.878911353766508!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x7b2f8b5bf88a621%3A0x4ff30b6dc85a6293!2sR.%20Orlando%20Lima%20-%20Ponta%20Negra%2C%20Natal%20-%20RN!5e0!3m2!1spt-BR!2sbr!4v1616954393646!5m2!1spt-BR!2sbr" 
                width="100%" height="350px" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    <x-footer/>
    <x-cookies-popup/>

    <script src='{{ url(mix('js/jquery.js')) }}'></script>
    <script src='{{ url(mix('js/contact-script.js'))}}'></script>
    <script src='{{ url(mix('js/global-script.js'))}}'></script>
</body>
</html>