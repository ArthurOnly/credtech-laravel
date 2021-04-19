<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css')) }}">
    <link rel='stylesheet' href="{{ url(mix('css/taxas-styles.css')) }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Document</title>
</head>

<body>
    <x-navbar />
    <x-popup/>
    <section class='contact-form-section nav-margin'>
        <form class='container section-container'>
            <div class='left-container form-container container'>
                <h5>Dados pessoais</h5>
                <div class='input-block light'>
                    <label>Nome ou Razão Social</label>
                    <input require placeholder='Isaac Danilo' name='name' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Nome ou Razão Social inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CPF ou CNPJ</label>
                    <input require name='cpf_cnpj' placeholder='100.200.300-40' type='text' />
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Email</label>
                    <input require placeholder='emailcred@gmail.com' name='email' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Email inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Telefone</label>
                    <input require name='celphone' placeholder='(84) 9999-8888' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Telefone inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Endereço comercial</label>
                    <input require placeholder='Bairro X, Rua Y, 31. Natal/RN' value='' name='address'
                        type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Endereço inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CEP</label>
                    <input require placeholder='59010-000' value='' name='cep' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CEP inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
            </div>
            <div class='right-container form-container container'>
                <h5>Dados do cheque</h5>
                <div class='input-block light'>
                    <label>Valor do título</label>
                    <input require value='' placeholder='1.000,00' name='value' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Valor inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <?php
                        date_default_timezone_set('UTC');
                        $minDate = mktime (0, 0, 0, date("m")  , date("d")+7, date("Y"));
                        $maxDate = mktime (0, 0, 0, date("m")+3  , date("d"), date("Y"));

                        $minDate = date('Y-m-d',$minDate);
                        $maxDate = date('Y-m-d',$maxDate);
                    ?>
                    <label>Pré-datado para</label>
                    <label class='secondary-label'>No mínimo 7 dias no futuro e máximo de 90</label>
                    <input name='pre_dated' type='date' 
                        value={{$minDate}}
                        min={{$minDate}}
                        max={{$maxDate}}
                    ></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Data inválida</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Foto da frente do cheque</label>
                    <label class='upload-label' for='doc_check_front'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_check_front' name='doc_check_front'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Arquivo inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Foto de traz do cheque</label>
                    <label class='upload-label' for='doc_check_verse'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_check_verse' name='doc_check_verse'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Arquivo inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <div class='checkbox'>
                        <label class='checkbox-visible' for='accept_data'>
                            <i class="fas fa-check"></i>
                        </label>
                        <input require id='accept_data' name='accept_data' type='checkbox' />
                        <label class='text'>Aceito que meus dados sejam salvos para que a empresa possa contatar-me.</label>
                    </div>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Obrigatório</p>
                    </spam>
                </div>
                @csrf
                <button type='submit' class='btn-fill'>
                    Enviar
                    </submit>
            </div>
        </form>
    </section>

    <x-footer />
    <x-cookies-popup />

    <script src='{{ url(mix('js/global-script.js')) }}'></script>
    <script src='{{ url(mix('js/jquery.js')) }}'></script>
    <script src='{{ url(mix('js/desc-tit.js')) }}'></script>
</body>

</html>
