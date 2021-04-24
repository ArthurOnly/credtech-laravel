@extends('layouts.site')

@section('title', 'Empréstimo')

@section('css')
    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css')) }}">
    <link rel='stylesheet' href="{{ url(mix('css/loan-styles.css')) }}">
@endsection

@section('content')
    <section class='select-type'>
        <div class='select-type-container nav-margin container section-container t-fade-in-up active'>
            <div class='left-container container'>
                <div class='loan-card'>
                    <i class="fas fa-user"></i>
                    <h3>Pessoa física</h3>
                    <p>Se você é uma pessoa física que deseja usar nossos serviços prossiga por aqui.</p>
                    <button class='btn-fill btn' name='select-pysical'>
                        Pessoa física<i class="fas fa-arrow-circle-right"></i>
                    </button>
                </div>
            </div>
            <div class='right-container container'>
                <div class='loan-card'>
                    <i class="fas fa-building"></i>
                    <h3>Pessoa jurídica</h3>
                    <p>Se você busca nossos serviços por meio de uma pessoa jurídica prossiga por aqui.</p>
                    <button class='btn-fill btn' name='select-juridical'>
                        Pessoa jurídica<i class="fas fa-arrow-circle-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </section>
    <section class='loan-popup'>
        <div class='container section-container'>
            <div class='full-grid-container loan-popup-container'>
                <i class="fas fa-times-circle"></i>
                <h3>Condições do seu empréstimo</h3>
                <ul>
                    <li>Ciclo de pagamento: Semanal</li>
                    <li>Parcelas: 1</li>
                    <li>Taxa: 1</li>
                    <li>Valor de cada parcela: R$ 10,00</li>
                </ul>
                <button name='submit-loan' class='btn btn-fill'>Solicitar agora</button>
            </div>
        </div>
    </section>
    <div class='black-overlay'></div>
    <section class='physical-person'>
        <div class='header t-fade-in-up'>
            <div class='container section-container'>
                <h1><i class="fas fa-user"></i> Pessoa física</h1>
                <a class='return-to-select'><i class="fas fa-arrow-circle-left"></i>Voltar</a>
            </div>
        </div>
        <form name='physical-person-form' class='container section-container t-fade-in-up'>
            <div class='left-container form-container container'>
                <h5>Informações pessoais</h5>
                <div class='input-block light'>
                    <label>Nome</label>
                    <input require value='Arthur' placeholder='Isaac Danilo' name='name' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Nome inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CPF</label>
                    <input require value='103.948.454-98' name='cpf_cnpj' type='text'
                        placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Telefone</label>
                    <input require placeholder='(84) 9999-9999' value='' name='celphone' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Telefone inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Email</label>
                    <input require placeholder='meuemail@gmail.com' value='' name='email' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Email inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Endereço</label>
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
                <div class='input-block light'>
                    <label>Rendimento mensal</label>
                    <input require placeholder='1.000,00' value='' name='monthly_income' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Rendimento inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <h5>Documentos</h5>
                <div class='input-block input-upload light'>
                    <label>Selfie com RG ou CNH</label>
                    <label class='upload-label' for='doc_selfie'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_selfie' name='doc_selfie'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Arquivo inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Verso RG ou CNH</label>
                    <label class='upload-label' for='doc_rg_verse'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_rg_verse' name='doc_rg_verse'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Arquivo inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Comprovante de endereço</label>
                    <label class='upload-label' for='doc_address_comp'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_address_comp' name='doc_address_comp'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Arquivo inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Comprovante de renda</label>
                    <label class='upload-label' for='doc_monthly_income'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_monthly_income' name='doc_monthly_income'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Arquivo inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
            </div>
            <div class='right-container form-container container'>
                <h5>Informações de empréstimo</h5>
                <div class='input-block light'>
                    <label>Valor do empréstimo</label>
                    <input require value='' placeholder='1.000,00' name='value' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Valor inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Segmento de atuação</label>
                    <select require name='segment_id' value='1'>
                        <option value='1'>Comércio</option>
                        <option value='2'>Serviços</option>
                        <option value='3'>Indústria</option>
                        <option value='4'>Outros</option>
                    </select>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Ciclo</label>
                    <select require name='cicle' value='semanal'>
                        <option value='semanal'>Semanal</option>
                        <option value='quinzenal'>Quinzenal</option>
                        <option value='mensal'>Mensal</option>
                    </select>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Quantidade de parcelas</label>
                    <select require name='parcels' value='1'>
                        <option value='1'>1 parcela</option>
                        <option value='2'>2 parcelas</option>
                        <option value='3'>3 parcelas</option>
                        <option value='4'>4 parcelas</option>
                        <option value='5'>5 parcelas</option>
                        <option value='6'>6 parcelas</option>
                        <option value='7'>7 parcelas</option>
                        <option value='8'>8 parcelas</option>
                        <option value='9'>9 parcelas</option>
                        <option value='10'>10 parcelas</option>
                        <option value='11'>11 parcelas</option>
                        <option value='12'>12 parcelas</option>
                    </select>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Garantia</label>
                    <select require name='warranty_id' value='1'>
                        <option value='1'>Sem garantia</option>
                        <option value='2'>Semi garantia</option>
                        <option value='3'>Garantia parcial</option>
                        <option value='4'>Garantia integral</option>
                    </select>
                    <spam class='focus-decorator' />
                </div>
                <h5>Informações adicionais (Opcional)</h5>
                <div class='input-block light'>
                    <label>CPF devedor solidário 1</label>
                    <input value='' name='cpf_dev1' type='text' placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CPF devedor solidário 2</label>
                    <input value='' name='cpf_dev2' type='text' placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CPF devedor solidário 3</label>
                    <input value='' name='cpf_dev3' type='text' placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
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
                <button type='submit' class='btn btn-fill'>Finalizar pedido</button>
            </div>
        </form>
    </section>
    <section class='juridical-person'>
        <div class='header t-fade-in-up'>
            <div class='container section-container'>
                <h1><i class="fas fa-building"></i> Pessoa jurídica</h1>
                <a class='return-to-select'><i class="fas fa-arrow-circle-left"></i>Voltar</a>
            </div>
        </div>
        <form name='juridical-person-form' class='container section-container t-fade-in-up'>
            <div class='left-container form-container container'>
                <h5>Informações pessoais</h5>
                <div class='input-block light'>
                    <label>Nome</label>
                    <input require value='' placeholder='Isaac Danilo' name='name' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Nome inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CNPJ</label>
                    <input require value='' name='cpf_cnpj' type='text' placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CNPJ inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CPF do sócio requerente</label>
                    <input require value='' name='cpf_partner' type='text' placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Telefone</label>
                    <input require placeholder='(84) 9999-9999' value='' name='celphone' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Telefone inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Email</label>
                    <input require placeholder='meuemail@gmail.com' value='' name='email' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Email inválido</p>
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
                <div class='input-block light'>
                    <label>Faturamento mensal</label>
                    <input require placeholder='1.000,00' value='' name='monthly_income' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Faturamento inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <h5>Documentos</h5>
                <div class='input-block input-upload light'>
                    <label>Selfie com RG ou CNH</label>
                    <label class='upload-label' for='doc_selfie'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_selfie' name='doc_selfie'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Email inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Verso RG ou CNH</label>
                    <label class='upload-label' for='doc_rg_verse'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_rg_verse' name='doc_rg_verse'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Email inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Comprovante de endereço</label>
                    <label class='upload-label' for='doc_address_comp'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_address_comp' name='doc_address_comp'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Email inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Comprovante de endereço do sócio requerente</label>
                    <label class='upload-label' for='doc_address_comp_partner'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_address_comp_partner' name='doc_address_comp_partner'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Email inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block input-upload light'>
                    <label>Comprovante de faturamento</label>
                    <label class='upload-label' for='doc_monthly_income'><i class="fas fa-upload"></i>
                        <spam>Upload</spam>
                    </label>
                    <input require type='file' id='doc_monthly_income' name='doc_monthly_income'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Email inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
            </div>
            <div class='right-container form-container container'>
                <h5>Informações de empréstimo</h5>
                <div class='input-block light'>
                    <label>Valor do empréstimo</label>
                    <input require value='' placeholder='1.000,00' name='value' type='text'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Valor inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Segmento de atuação</label>
                    <select require name='segment_id' value='1'>
                        <option value='1'>Comércio</option>
                        <option value='2'>Serviços</option>
                        <option value='3'>Indústria</option>
                        <option value='4'>Outros</option>
                    </select>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Ciclo</label>
                    <select require name='cicle' value='semanal'>
                        <option value='semanal'>Semanal</option>
                        <option value='quinzenal'>Quinzenal</option>
                        <option value='mensal'>Mensal</option>
                    </select>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Quantidade de parcelas</label>
                    <select require name='parcels' value='1'>
                        <option value='1'>1 parcela</option>
                        <option value='2'>2 parcelas</option>
                        <option value='3'>3 parcelas</option>
                        <option value='4'>4 parcelas</option>
                        <option value='5'>5 parcelas</option>
                        <option value='6'>6 parcelas</option>
                        <option value='7'>7 parcelas</option>
                        <option value='8'>8 parcelas</option>
                        <option value='9'>9 parcelas</option>
                        <option value='10'>10 parcelas</option>
                        <option value='11'>11 parcelas</option>
                        <option value='12'>12 parcelas</option>
                    </select>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>Garantia</label>
                    <select require name='warranty_id' value='1'>
                        <option value='1'>Sem garantia</option>
                        <option value='2'>Semi garantia</option>
                        <option value='3'>Garantia parcial</option>
                        <option value='4'>Garantia integral</option>
                    </select>
                    <spam class='focus-decorator' />
                </div>
                <h5>Informações adicionais (Opcional)</h5>
                <div class='input-block light'>
                    <label>CPF devedor solidário 1</label>
                    <input value='' name='cpf_dev1' type='text' placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CPF devedor solidário 2</label>
                    <input value='' name='cpf_dev2' type='text' placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <label>CPF devedor solidário 3</label>
                    <input value='' name='cpf_dev3' type='text' placeholder='111.111.111-11'></input>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>CPF inválido</p>
                    </spam>
                    <spam class='focus-decorator' />
                </div>
                <div class='input-block light'>
                    <div class='checkbox'>
                        <label class='checkbox-visible' for='accept_data_2'>
                            <i class="fas fa-check"></i>
                        </label>
                        <input id='accept_data_2' name='accept_data_2' type='checkbox' />
                        <label class='text'>Aceito que meus dados sejam salvos para que a empresa possa contatar-me.</label>
                    </div>
                    <spam class='error-label'>
                        <i class="fas fa-times-circle"></i>
                        <p>Obrigatório</p>
                    </spam>
                </div>
                <input type='hidden' name='client-type' value='0' />
                <button type='submit' class='btn btn-fill'>Finalizar pedido</button>
            </div>
        </form>
    </section>
@endsection

@section('js')
    <script src='{{ url(mix('js/global-script.js')) }}'></script>
    <script src='{{ url(mix('js/jquery.js')) }}'></script>
    <script src='{{ url(mix('js/loan-script.js')) }}'></script>
@endsection
