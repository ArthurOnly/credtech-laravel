<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel='stylesheet' href="{{ url(mix('css/global-styles.css'))}}">
    <link rel='stylesheet' href="{{ url(mix('css/home-styles.css'))}}">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://use.typekit.net/nnx6nqd.css">
    <title>Cretech - Home</title>
</head>

<body>
    <x-navbar/>
    <section class='page-header'>
        <div class='container section-container'>
            <div class='left-container container'>
                <img class='cred-logo' src='images/credtechB.png' />
                <h1>Conheça a melhor empresa de crédito do RN</h1>
                <p>Faça empréstimos com as melhores taxas do mercado!</p>
            </div>
            <div class='right-container container'>
                <div class='simulator'>
                    <h3>Simulador</h3>
                    <div class='simulator-controller'>
                        <div ref='step-1' class='active'>
                            <div>
                                <p>1</p>
                            </div>
                        </div>
                        <div ref='step-2'>
                            <div>
                                <p>2</p>
                            </div>
                        </div>
                        <div ref='step-3'>
                            <div>
                                <p>3</p>
                            </div>
                        </div>
                    </div>
                    <div class='simulator-step active' id='step-1'>
                        <div class='input-block'>
                            <label for="">De quanto você precisa?</label>
                            <input type="range" min="200" max="3000" value="200" step="200" class="slider" name="ammount">
                            <h5 ref='ammount'>R$ 200</h5>
                        </div>
                        <div class='input-block'>
                            <label>Qual o seu ciclo de pagamento?</label>
                            <select name='cicle'>
                                <option value='mensal'>Mensal</option>
                                <option value='quinzenal'>Quinzenal</option>
                                <option value='semanal'>Semanal</option>
                            </select>
                        </div>
                        <div class='input-block'>
                            <label for="">Em quantas vezes deseja pagar?</label>
                            <input type="range" min="1" max="12" value="1" step="1" class="slider" name="how-times">
                            <h5 ref='how-times'>1 vez</h5>
                        </div>
                    </div>
                    <div class='simulator-step d-none' id='step-2'>
                        <div class='input-block'>
                            <label>Qual o seu segmento de atuação?</label>
                            <select>
                                <option>Comércio</option>
                                <option>Serviços</option>
                                <option>Indústria</option>
                                <option>Outros</option>
                            </select>
                        </div>
                        <div class='input-block'>
                            <label>Selecione uma garantia</label>
                            <select>
                                <option>Sem garantia</option>
                                <option>Semi garantia</option>
                                <option>Garantia parcial</option>
                                <option>Garantia integral</option>
                            </select>
                        </div>
                    </div>
                    <div class='simulator-step d-none' id='step-3'>
                        <div class='input-block'>
                            <label>Razão social ou Nome</label>
                            <input placeholder='Isaac Danilo' type='text'/>
                        </div>
                        <div class='input-block'>
                            <label>CPF ou CNPJ</label>
                            <input placeholder='100.200.300-40' type='text'/>
                        </div>
                        <div class='input-block'>
                            <label>Email</label>
                            <input placeholder='emailcred@gmail.com' type='text'/>
                        </div>
                        <div class='input-block'>
                            <label>Telefone</label>
                            <input placeholder='(84) 9999-8888' type='text'/>
                        </div>
                    </div>

                    <div class='buttons'>
                        <button class='btn btn-outline d-none' id='previously-button'>
                            <i class="fas fa-arrow-circle-left"></i>Anterior
                        </button>
                        <button class='btn btn-fill' id='next-button'>
                            Próximo<i class="fas fa-arrow-circle-right"></i>
                        </button>
                        <button class='btn btn-fill d-none' id='simulate-button'>
                            Ver simulação
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class='how-work'>
        <div class='container section-container'>
            <div class='full-grid-container'>
                <h1>Como funciona</h1>
                <div class='row-cards'>
                    <div class='outline-card'>
                        <i class='far fa-address-card'></i>
                        <h3>1. Cadastre-se</h3>
                        <p>Faça um cadastro gratuitamente, nos passando apenas algumas informações para podermos avaliar
                            seu
                            pedido e entrar em contato com você rapidamente.</p>
                    </div>
                    <div class='outline-card'>
                        <i class='far fa-clock'></i>
                        <h3>2. Aguarde nossa avaliação</h3>
                        <p>Após enviado os dados, nossa equipe fará uma análise de crédito e entrará em contato com você
                            o mais
                            rápido possível.</p>
                    </div>
                    <div class='outline-card'>
                        <i class="fas fa-file-contract"></i>
                        <h3>3. Assine o contrato</h3>
                        <p>Feita a análise de crédito, enviaremos um contrato para que você possa assinar e confirmar
                            todos os
                            dados da operação.</p>
                    </div>
                    <div class='outline-card'>
                        <i class='far fa-money-bill-alt'></i>
                        <h3>4. Receba seu dinheiro!</h3>
                        <p>Depois de confirmarmos todas as informações enviaremos o valor solicitado para sua conta em
                            até 24
                            horas.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class='features-section'>
        <div class='container section-container'>
            <div class='full-grid-container'>
                <div class='row-cards algn-center'>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-universal-access"></i>
                        </div>
                        <p>Para microempresas, MEI, lojistas, comerciantes, autônomos ou liberais.</p>
                    </div>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-money-check"></i>
                        </div>
                        <p>Sem burocracia através de cheque, promissória ou cartão.</p>
                    </div>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-file-contract"></i>
                        </div>
                        <p>Com ou sem garantia através de contrato, carnê ou penhora.</p>
                    </div>
                    <div class='feat-card'>
                        <div class='round-icon'>
                            <i class="fas fa-sticky-note"></i>
                        </div>
                        <p>Planos fexíveis: Semanais, quinzenais ou mensais.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class='quem-somos'>
        <div class='container section-container'>
            <div class='left-container container center-y'>
                <h4 class='font-regular'>Buscamos oferecer soluções de crédito e serviços financeiros que superem as
                    expectativas, tragam
                    inovações, diferenciais e principalmente vantagens competitivas para nossos clientes.
                </h4>
                <a href='#'><i class="fas fa-arrow-right rotate-arrow"></i>Saiba mais</a>
            </div>
            <div class='right-container container'>
                <img class='section-image' src='images/pc-pen.png'>
            </div>
        </div>
    </section>
    <section class='taxas'>
        <div class='container section-container'>
            <div class='left-container container center-y'>
                <h2>Porque nossas taxas são tão baixas?</h2>
                <h4 class='font-regular'>A CredTech é uma empresa de sociedade limitada totalmente independente da
                    burocracia dos Bancos e atua com recursos próprios para melhor atender nossos clientes. Por esse
                    motivo temos as melhores condições e taxas do mercado.
                </h4>
                <a href='#'><i class="fas fa-arrow-right rotate-arrow"></i>Saiba mais</a>
            </div>
            <div class='right-container container'>
                <img class='section-image' src='images/taxas.png'>
            </div>
        </div>
    </section>
    <section class='taxas'>
        <div class='container section-container'>
            <div class='full-grid-container container'>
                <p class='partners-text'>- PARCEIROS -</p>
                <div class='part-logos'>
                    <img class='section-image' src='images/sebrae.png'>
                    <img class='section-image' src='images/anfac.png'>
                    <img class='section-image' src='images/serasa.png'>
                    <img class='section-image' src='images/f5tec.png'>
                </div>
            </div>
        </div>
    </section>
    <section class='opinions-desktop desktop-only'>
        <div class='container section-container'>
            <div class='full-grid-container container'>
                <div class='opinions-slider-desktop'>
                    <ul>
                        <li>
                            <div class='opinion-card active'>
                                <div class='text-section'>
                                    <p>"Trabalhamos juntos desde 2018 e até então vem sendo consolidada uma parceria
                                        fantástica.
                                        Sinceramente, o Isaac Danilo é um cara idôneo, preparado, inteligente,
                                        disponível e
                                        muito compreensível. A sua empresa é séria, confiável e que vale a pela fechar
                                        negócio.
                                        Recomendo a todos."</p>
                                </div>
                                <div class='footer-section active'>
                                    <img src='images/braulio.png' />
                                    <h5><i class="fas fa-user"></i>Braúlio Castillo</h5>
                                    <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEO Mulambo Novo -
                                        Natal/RN</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class='opinion-card active'>
                                <div class='text-section'>
                                    <p>"Trabalhamos juntos desde 2018 e até então vem sendo consolidada uma parceria
                                        fantástica.
                                        Sinceramente, o Isaac Danilo é um cara idôneo, preparado, inteligente,
                                        disponível e
                                        muito compreensível. A sua empresa é séria, confiável e que vale a pela fechar
                                        negócio.
                                        Recomendo a todos."</p>
                                </div>
                                <div class='footer-section'>
                                    <img src='images/alexandre.jpg' />
                                    <h5><i class="fas fa-user"></i>Alexandre Pinto</h5>
                                    <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEO Colégio Ciências
                                        Aplicadas - Natal/RN</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class='opinion-card active'>
                                <div class='text-section'>
                                    <p>"O que procuramos em um parceiro de negocios encontramos na CredTech:
                                        transparência no
                                        processo, agilidade no atendimento, disponibilidade no atendimento e
                                        principalmente a
                                        confiança, elemento essencial para o fechamento de um bom negócio. Altamente
                                        recomendada!"</p>
                                </div>
                                <div class='footer-section'>
                                    <img src='images/marcos.jpg' />
                                    <h5><i class="fas fa-user"></i>Marcos Oliveira</h5>
                                    <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEO NatalMakers -
                                        Natal/RN</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class='opinion-card active'>
                                <div class='text-section'>
                                    <p>"A CredTech é uma grande parceira sempre que precisamos fazer expansão ou
                                        investir no
                                        nosso negócio. É uma empresa coerente e a indico porque tem operações rápidas,
                                        taxa
                                        justa, bom atendimento e flexibilidade para o empresário."</p>
                                </div>
                                <div class='footer-section'>
                                    <img src='images/maximo.jpg' />
                                    <h5><i class="fas fa-user"></i>Manassés Máximo</h5>
                                    <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEO Pastelouco -
                                        Parnamirim/RN</p>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class='opinion-card active'>
                                <div class='text-section'>
                                    <p>"Indicamos a CredTech porque consideramos uma Fintech sólida que agiliza a
                                        liquidez da
                                        nossa empresa de forma rápida e sem a burocracia dos bancos. Sem falar que
                                        podemos
                                        antecipar cheques online de forma segura com a credibilidade e confiança de
                                        profissionais fantásticos. Parceiro excelente!”</p>
                                </div>
                                <div class='footer-section '>
                                    <img src='images/dinah.jpg' />
                                    <h5><i class="fas fa-user"></i>Luciano Nascimento e Dinah Ciriaco</h5>
                                    <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEOs Presentei -
                                        Natal/RN</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section class='opinions mobile-only'>
        <div class='container section-container'>
            <div class='full-grid-container container'>
                <div class='opinions-slider'>
                    <div class='opinion-card active slide-1'>
                        <div class='text-section'>
                            <p>"Trabalhamos juntos desde 2018 e até então vem sendo consolidada uma parceria fantástica.
                                Sinceramente, o Isaac Danilo é um cara idôneo, preparado, inteligente, disponível e
                                muito compreensível. A sua empresa é séria, confiável e que vale a pela fechar negócio.
                                Recomendo a todos."</p>
                        </div>
                        <div class='footer-section'>
                            <img src='images/braulio.png' />
                            <h5><i class="fas fa-user"></i>Braúlio Castillo</h5>
                            <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEO Mulambo Novo - Natal/RN
                            </p>
                        </div>
                    </div>
                    <div class='opinion-card d-none slide-2'>
                        <div class='text-section'>
                            <p>"Trabalhamos juntos desde 2018 e até então vem sendo consolidada uma parceria fantástica.
                                Sinceramente, o Isaac Danilo é um cara idôneo, preparado, inteligente, disponível e
                                muito compreensível. A sua empresa é séria, confiável e que vale a pela fechar negócio.
                                Recomendo a todos."</p>
                        </div>
                        <div class='footer-section'>
                            <img src='images/alexandre.jpg' />
                            <h5><i class="fas fa-user"></i>Alexandre Pinto</h5>
                            <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEO Colégio Ciências Aplicadas
                                - Natal/RN</p>
                        </div>
                    </div>
                    <div class='opinion-card d-none slide-3'>
                        <div class='text-section'>
                            <p>"O que procuramos em um parceiro de negocios encontramos na CredTech: transparência no
                                processo, agilidade no atendimento, disponibilidade no atendimento e principalmente a
                                confiança, elemento essencial para o fechamento de um bom negócio. Altamente
                                recomendada!"</p>
                        </div>
                        <div class='footer-section'>
                            <img src='images/marcos.jpg' />
                            <h5><i class="fas fa-user"></i>Marcos Oliveira</h5>
                            <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEO NatalMakers - Natal/RN</p>
                        </div>
                    </div>
                    <div class='opinion-card d-none slide-4'>
                        <div class='text-section'>
                            <p>"A CredTech é uma grande parceira sempre que precisamos fazer expansão ou investir no
                                nosso negócio. É uma empresa coerente e a indico porque tem operações rápidas, taxa
                                justa, bom atendimento e flexibilidade para o empresário."</p>
                        </div>
                        <div class='footer-section'>
                            <img src='images/maximo.jpg' />
                            <h5><i class="fas fa-user"></i>Manassés Máximo</h5>
                            <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEO Pastelouco - Parnamirim/RN
                            </p>
                        </div>
                    </div>
                    <div class='opinion-card d-none slide-5'>
                        <div class='text-section'>
                            <p>"Indicamos a CredTech porque consideramos uma Fintech sólida que agiliza a liquidez da
                                nossa empresa de forma rápida e sem a burocracia dos bancos. Sem falar que podemos
                                antecipar cheques online de forma segura com a credibilidade e confiança de
                                profissionais fantásticos. Parceiro excelente!”</p>
                        </div>
                        <div class='footer-section'>
                            <img src='images/dinah.jpg' />
                            <h5><i class="fas fa-user"></i>Luciano Nascimento e Dinah Ciriaco</h5>
                            <p class='opinions-func'><i class="fas fa-map-marker-alt"></i>CEOs Presentei - Natal/RN</p>
                        </div>
                    </div>
                </div>
                <ul class='slider-controller'>
                    <li ref='slide-1' class='active'>.</li>
                    <li ref='slide-2'>.</li>
                    <li ref='slide-3'>.</li>
                    <li ref='slide-4'>.</li>
                    <li ref='slide-5'>.</li>
                </ul>
            </div>
        </div>
    </section>
    <x-footer/>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src='{{ url(mix('js/global-script.js'))}}'></script>
    <script src='{{ url(mix('js/home-script.js'))}}'></script>

    <script type='text/javascript'>
        $('.opinions-slider-desktop').infiniteScroller({
            speed: 1,
            maxSpeed: 5,
            direction: 'left',
        })
    </script>
</body>

</html>