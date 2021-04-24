@extends('layouts.site')

@section('title', 'FAQ')

@section('css')
    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css')) }}">
    <link rel='stylesheet' href="{{ url(mix('css/faq-styles.css')) }}">
@endsection

@section('content')
    <section class='faq nav-margin'>
        <div class='container section-container'>
            <div class='left-container container'>
                <img class='section-image' src='images/taxas.png'>
            </div>
            <div class='right-container container center-y'>
                <div class='faq-card'>
                    <div class='title'>
                        <h6>Quem é CredTech?</h6>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class='body'>
                        <p>Somos uma Empresa Simples de Crédito - ESC. Incentivamos o
                            fomento comercial e a expansão de pequenos e médios negócios, seja Autônomos, MEI,
                            Microempresa ou Empresa de Pequeno Porte através de operações de Empréstimo, Desconto
                            de Títulos e Financiamentos. </p>
                    </div>
                </div>
                <div class='faq-card'>
                    <div class='title'>
                        <h6>A CredTech é um correspondente bancário, Banco ou Financeira?</h6>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class='body'>
                        <p>Não. A CredTech é uma empresa de sociedade limitada totalmente independente da burocracia
                            dos Bancos e atua com recursos próprios para melhor atender nossos clientes. Por esse motivo
                            temos as melhores condições e taxas do mercado. </p>
                    </div>
                </div>
                <div class='faq-card'>
                    <div class='title'>
                        <h6>Como faço para solicitar um Empréstimo?</h6>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class='body'>
                        <p>Você pode utilizar nosso Simulador e logo em seguida preencher o formulário de solicitação
                            aqui no site. Em Até 48h úteis você receberá o resultado
                            da sua solicitação ou um dos nossos consultores entrará em contato. Você também pode entrar
                            em contato conosco via whatsapp, telefone ou e-mail.</p>
                    </div>
                </div>
                <div class='faq-card'>
                    <div class='title'>
                        <h6>Quais os requisitos para solicitar um Empréstimo, Desconto de Título ou Financiamento?</h6>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class='body'>
                        <p>Para aumentar as chances de seu crédito ser aprovado é desejável (não obrigatório) que você
                            ou sua empresa tenham:
                        </p>
                        <ul>
                            <li>Ponto comercial fixo consolidado próprio ou alugado;</li>
                            <li>Comprovante de Renda ou Faturamento;</li>
                            <li>CNPJ/CPF sem restrições;</li>
                            <li>Ter 1 ou mais devedores Solidários;</li>
                            <li>Ter cheque calção do Devedor Solidário;</li>
                            <li>Ter conta corrente com Cheque</li>
                        </ul>
                    </div>
                </div>
                <div class='faq-card'>
                    <div class='title'>
                        <h6>Qual o prazo para liberação do empréstimo?</h6>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class='body'>
                        <p>Caso seja aprovado, o dinheiro da operação de crédito estará em sua contra corrente em até
                            48h após a confirmação e assinatura do contrato.</p>
                    </div>
                </div>
                <div class='faq-card'>
                    <div class='title'>
                        <h6>Qual o prazo de pagamento de um empréstimo, Desconto de Título ou Financiamento?</h6>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class='body'>
                        <p>Nossos prazos variam de acordo com os valores solicitados, ciclos de reembolso (Semanal,
                            Quinzenal ou Mensal) e o tipo de garantia.
                            Você pode solicitar operações com prazo mínimo de uma semana e o prazo máximo de três meses.
                        </p>
                    </div>
                </div>
                <div class='faq-card'>
                    <div class='title'>
                        <h6>Qual a região de atuação da CredTech?</h6>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class='body'>
                        <p>A credtech está localizada no Rio Grande do Norte. Nossa matriz está localizada na cidade de
                            Natal-RN. Outras cidades de forte
                            atuação são: Parnamirim, Macaiba e extremoz. Em breve estaremos atuando na cidades de Caicó,
                            Santa Cruz e Currais novos.</p>
                    </div>
                </div>
                <div class='faq-card'>
                    <div class='title'>
                        <h6>Quais os valores mínimos e máximos que posso solicitar?</h6>
                        <i class="fas fa-plus-circle"></i>
                    </div>
                    <div class='body'>
                        <p>Os valores solicitados variam entre R$ 200,00 e R$ 1.000,00. Dependendo do porte da empresa
                            bem como o relacionamento e histórico de operações do cliente,
                            o valor do limite de crédito pode aumentar gradativamente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src='{{ url(mix('js/global-script.js')) }}'></script>
    <script src='{{ url(mix('js/faq-script.js')) }}'></script>
@endsection