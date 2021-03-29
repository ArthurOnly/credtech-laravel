<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css'))}}">
    <link rel='stylesheet' href="{{ url(mix('css/loan-styles.css'))}}">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Document</title>
</head>
<body>
    <x-navbar/>

    <section class='select-type'>
        <div class='container section-container'>
            <div class='left-container container'>
                <div class='loan-card'>
                    <i class="fas fa-user"></i>
                    <h3>Pessoa física</h3>
                    <p>Se você é uma pessoa física que deseja usar nossos serviços prossiga por aqui.</p>
                    <button class='btn-fill btn'>
                        Pessoa física<i class="fas fa-arrow-circle-right"></i>
                    </button>
                </div>
            </div>
            <div class='right-container container'>
                <div class='loan-card'>
                    <i class="fas fa-building"></i>
                    <h3>Pessoa jurídica</h3>
                    <p>Se você busca nossos serviços por meio de uma pessoa jurídica prossiga por aqui.</p>
                    <button class='btn-fill btn'>
                        Pessoa jurídica<i class="fas fa-arrow-circle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class='physical-person'>
        <form name='physical-person-form' class='container section-container'>
            <div class='left-container form-container container'>
                <h5>Informações pessoais</h5>
                <div class='input-block light'>
                    <label>Nome</label>
                    <input name='name' type='text'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block light'>
                    <label>CPF</label>
                    <input name='cpf' type='text'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block light'>
                    <label>Telefone</label>
                    <input name='celphone' type='text'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block light'>
                    <label>Email</label>
                    <input name='email' type='text'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block light'>
                    <label>Endereço</label>
                    <input name='address' type='text'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block light'>
                    <label>CEP</label>
                    <input name='cep' type='text'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block light'>
                    <label>Rendimento mensal</label>
                    <input name='monthly_income' type='text'></input>
                    <spam class='focus-decorator'/>
                </div>
            </div>
            <div class='right-container form-container container'>
                <h5>Documentos</h5>
                <div class='input-block input-upload light'>
                    <label>Selfie com RG ou CNH</label>
                    <label class='upload-label' for='selfie_doc'><i class="fas fa-upload"></i>Upload</label>
                    <input type='file' id='selfie_doc' name='selfie_doc'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block input-upload light'>
                    <label>Verso RG ou CNH</label>
                    <label class='upload-label' for='doc_verse'><i class="fas fa-upload"></i>Upload</label>
                    <input type='file' id='doc_verse' name='doc_verse'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block input-upload light'>
                    <label>Comprovante de endereço</label>
                    <label class='upload-label' for='addr_comp'><i class="fas fa-upload"></i>Upload</label>
                    <input type='file' id='addr_comp' name='addr_comp'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block input-upload light'>
                    <label>Comprovante de renda</label>
                    <label class='upload-label' for='income_comp'><i class="fas fa-upload"></i>Upload</label>
                    <input type='file' id='income_comp' name='income_comp'></input>
                    <spam class='focus-decorator'/>
                </div>
                <h5>Informações de empréstimo</h5>
                <div class='input-block light'>
                    <label>Valor do empréstimo</label>
                    <input name ='loan_value' type='text'></input>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block input-upload light'>
                    <label>Segmento de atuação</label>
                    <select name='segment'>
                        <option value='comercio'>Comércio</option>
                        <option value='servicos'>Serviços</option>
                        <option value='industria'>Indústria</option>
                        <option value='servicos'>Outros</option>
                    </select>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block input-upload light'>
                    <label>Ciclo</label>
                    <select name='cicle'>
                        <option value='semanal'>Semanal</option>
                        <option value='quinzenal'>Quinzenal</option>
                        <option value='mensal'>Mensal</option>
                    </select>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block input-upload light'>
                    <label>Quantidade de parcelas</label>
                    <select name='parcel'>
                        <option value='1x'>1 parcela</option>
                        <option value='2x'>2 parcelas</option>
                        <option value='3x'>3 parcelas</option>
                        <option value='4x'>4 parcelas</option>
                        <option value='5x'>5 parcelas</option>
                        <option value='6x'>6 parcelas</option>
                        <option value='7x'>7 parcelas</option>
                        <option value='8x'>8 parcelas</option>
                        <option value='9x'>9 parcelas</option>
                        <option value='10x'>10 parcelas</option>
                        <option value='11x'>11 parcelas</option>
                        <option value='12x'>12 parcelas</option>
                    </select>
                    <spam class='focus-decorator'/>
                </div>
                <div class='input-block input-upload light'>
                    <label>Garantia</label>
                    <select name='warranty'>
                        <option value='comercio'>Sem garantia</option>
                        <option value='servicos'>Semi garantia</option>
                        <option value='industria'>Garantia parcial</option>
                        <option value='servicos'>Garantia integral</option>
                    </select>
                    <spam class='focus-decorator'/>
                </div>
                <input type='hidden' name='client-type' value='physical-person'/>
                <button type='submit' class='btn btn-fill'>Finalizar pedido</button>
            </div>
        </form>
    </section>

    <x-footer/>

    <script src='{{ url(mix('js/global-script.js'))}}'></script>
    <script src='{{ url(mix('js/jquery.js'))}}'></script>
    <script src='{{ url(mix('js/loan-script.js'))}}'></script>
</body>
</html>