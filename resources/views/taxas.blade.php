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
    <section class='taxs nav-margin'>
        <div class='container section-container'>
            <div class='left-container container'>
                <h2>Nossas taxas</h2>
                <div class='input-block light'>
                    <label>Qual o seu segmento de atuação?</label>
                    <select name='witch-segment'>
                        <option value='comercio'>Comércio</option>
                        <option value='servicos'>Serviços</option>
                        <option value='industria'>Indústria</option>
                        <option value='servicos'>Outros</option>
                    </select>
                    <spam class='focus-decorator'/>
                </div>
                <h4 class='desktop-only'>Legenda:</h4>
                <ul class='desktop-only'>
                    <li><strong>a.s</strong>: A semanal.</li>
                    <li><strong>a.q</strong>: A quinzena.</li>
                    <li><strong>Sem garantia</strong>: Cheque-promissória + Contrato.</li>
                    <li><strong>Semi garantia</strong>: Cheque-Promissória, Cheque-calção (Outra titularidade) + contrato.</li>
                    <li><strong>Garantia parcial</strong>: Cheque-Promissória + Posse de Bens (Joias, Equipamentos, Veículos, imóveis) + Contrato.</li>
                    <li><strong>Garantia integral</strong>: Cartão de Crédito ou Cartão CredTech + Contrato.</li>
                </ul>
            </div>
            <div class='table-wrapper'>
                <table id='tax-comercio' class='t-fade-in-up active'>
                    <tbody>
                        <tr>
                            <td></td>
                            <th>Sem garantia</th>
                            <th>Semi garantia</th>
                            <th>Garantia parceial</th>
                            <th>Garantia integral</th>
                        </tr>
                        <tr>
                            <th>Semanal (Até 12x)</th>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                        </tr>
                        <tr>
                            <th>Quinzenal (Até 6x)</th>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                        </tr>
                        <tr>
                            <th>Mensal (Até 3x)</th>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                            <td>1.10% a.s</td>
                        </tr>
                    </tbody>
                </table>
                <table id='tax-servicos' class='t-fade-in-up'>
                    <tbody>
                        <tr>
                            <td></td>
                            <th>Sem garantia</th>
                            <th>Semi garantia</th>
                            <th>Garantia parceial</th>
                            <th>Garantia integral</th>
                        </tr>
                        <tr>
                            <th>Semanal (Até 12x)</th>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                        </tr>
                        <tr>
                            <th>Quinzenal (Até 6x)</th>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                        </tr>
                        <tr>
                            <th>Mensal (Até 3x)</th>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                            <td>2.20% a.s</td>
                        </tr>
                    </tbody>
                </table>
                <table id='tax-industria' class='t-fade-in-up'>
                    <tbody>
                        <tr>
                            <td></td>
                            <th>Sem garantia</th>
                            <th>Semi garantia</th>
                            <th>Garantia parceial</th>
                            <th>Garantia integral</th>
                        </tr>
                        <tr>
                            <th>Semanal (Até 12x)</th>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                        </tr>
                        <tr>
                            <th>Quinzenal (Até 6x)</th>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                        </tr>
                        <tr>
                            <th>Mensal (Até 3x)</th>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                            <td>3.30% a.s</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h4 class='mobile-only'>Legenda:</h4>
            <ul class='mobile-only'>
                <li><strong>a.s</strong>: A semanal.</li>
                <li><strong>a.q</strong>: A quinzena.</li>
                <li><strong>Sem garantia</strong>: Cheque-promissória + Contrato.</li>
                <li><strong>Semi garantia</strong>: Cheque-Promissória, Cheque-calção (Outra titularidade) + contrato.</li>
                <li><strong>Garantia parcial</strong>: Cheque-Promissória + Posse de Bens (Joias, Equipamentos, Veículos, imóveis) + Contrato.</li>
                <li><strong>Garantia integral</strong>: Cartão de Crédito ou Cartão CredTech + Contrato.</li>
            </ul>
        </div>
    </section>
    <section class='taxs-credit'>
        <div class='container section-container'>
            <div class='left-container container'>
                <h2>Empréstimo com cartão de crédito</h2>
                <p>Todas as taxas são ao mês, ou seja, em um empréstimo em 4 vezes com Visa a taxa final será 4 x 3.69%.</p>
            </div>
            <table class='credit-card-loan'>
                <thead>
                    <tr>
                        <th>Vezes</th>
                        <th>Visa - Mastercard</th>
                        <th>Elo</th>
                        <th>Hiper - Hipercad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td></td>
                        <td><img class='card-image' src='images/visa.png' alt='Visa - Mastercard'/></td>
                        <td><img class='card-image' src='images/elo.png' alt='Elo'/></td>
                        <td><img class='card-image' src='images/hiper.png' alt='Hiper - Hipercad'/></td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>3.69%</td>
                        <td>3.99%</td>
                        <td>3.92%</td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>3.12%</td>
                        <td>3.69%</td>
                        <td>3.30%</td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>2.74%</td>
                        <td>2.93%</td>
                        <td>2.89%</td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>2.55%</td>
                        <td>2.66%</td>
                        <td>2.70%</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>2.33%</td>
                        <td>2.47%</td>
                        <td>2.43%</td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td>2.17%</td>
                        <td>2.28%</td>
                        <td>2.25%</td>
                    </tr>
                    <tr>
                        <td>10</td>
                        <td>2.03%</td>
                        <td>2.14%</td>
                        <td>2.11%</td>
                    </tr>
                    <tr>
                        <td>11</td>
                        <td>1.92%</td>
                        <td>2.02%</td>
                        <td>1.99%</td>
                    </tr>
                    <tr>
                        <td>12</td>
                        <td>1.83%</td>
                        <td>1.92%</td>
                        <td>1.89%</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

    <x-footer/>
    <x-cookies-popup/>

    <script src='{{ url(mix('js/global-script.js'))}}'></script>
    <script src='{{ url(mix('js/taxas-script.js'))}}'></script>
</body>
</html>