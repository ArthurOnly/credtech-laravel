<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css')) }}">
    <link rel='stylesheet' href="{{ url(mix('css/quem-somos-styles.css')) }}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Document</title>
</head>

<body>
    <x-navbar />
    <section class='company-header nav-margin'>
        <div class='container section-container logo-container'>
            <img src='images/logoCredtech.png' />
        </div>
    </section>
    <section class='company-goals'>
        <div class='container section-container'>
            <div class='full-grid-container'>
                <div class='row-cards'>
                    <div class='outline-card'>
                        <i class="fas fa-bullseye"></i>
                        <h3>Nossa missão</h3>
                        <p>Oferecer soluções de crédito e serviços financeiros que superem as expectativas de nossos
                            clientes; construir um legado com uma marca forte, trazendo sempre inovações e diferenciais,
                            proporcionando vantagem competitiva para nossos clientes.</p>
                    </div>
                    <div class='outline-card'>
                        <i class="fas fa-compass"></i>
                        <h3>Nossa visão</h3>
                        <p>Ser reconhecida como a maior empresa em soluções de credito e na prestação de serviços
                            financeiros, com um portfólio diversificado e gerar impacto social, atendendo da melhor
                            forma as necessidades dos empreendedores. Atuar na prestação de serviços e soluções
                            atingindo a cidade de Natal-RN e os municípios limítrofes e, em breve, uma ampla rede de
                            fomento comercial.</p>
                    </div>
                    <div class='outline-card'>
                        <i class="fas fa-globe-americas"></i>
                        <h3>Nossos valores</h3>
                        <ul>
                            <li>Solidez financeira.</li>
                            <li> Velocidade e agilidade.</li>
                            <li> Credibilidade</li>
                            <li>Confiança e Ética.</li>
                            <li> Taxas acessíveis.</li>
                            <li> Equipe de alto nível.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class='taxas'>
        <div class='container section-container'>
            <div class='left-container container center-y'>
                <h2>A CredTech</h2>
                <p>A CREDTECH é uma Empresa Simples de Crédito (ESC) que está voltada à realização
                    de operações de empréstimo, de financiamento e de desconto de títulos de crédito, exclusivamente com
                    recursos próprios, tendo como beneficiados microempreendedores individuais, microempresas e empresas
                    de pequeno porte, nos termos da Lei Complementar (LC) 167/2019.

                    A empresa visa inserir dinheiro na economia por meio de fomento comercial através de microcrédito,
                    uma forma distinta da intermediação bancária e do contrato de factoring.
                </p>
            </div>
            <div class='right-container container'>
                <img class='section-image' src='images/taxas.png'>
            </div>
        </div>
    </section>
    <section class='features-section'>
        <div class='container section-container'>
            <div class='full-grid-container alng-center'>
                <div class='row-cards algn-center'>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-universal-access"></i>
                        </div>
                        <p>Transparência nas negociações.</p>
                    </div>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-users"></i>
                        </div>
                        <p>Equipe treinada.</p>
                    </div>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-chart-area"></i>
                        </div>
                        <p>Melhores taxas.</p>
                    </div>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <p>Análise ágil, rápida e eficaz.</p>
                    </div>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-smile-beam"></i>
                        </div>
                        <p>Grupo de confiança, ética<br>e credibilidade.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer/>
    <x-cookies-popup/>

    <script src='{{ url(mix('js/global-script.js')) }}'></script>
</body>

</html>
