;( function( $, window, document, undefined ) {
    "use strict";

    // Create the defaults once
    var infiniteScroller = "infiniteScroller",
        defaults = {
            maxSpeed: 20,
            speed: 1,
            scrollOnMouseOver: true,
            resetOnMouseOut: true,
            direction: "left"
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this.element = element;
        this.settings = $.extend( {}, defaults, options );
        this.controller = { currentSpeed: 0 };
        this.init();
    }

    // Avoid Plugin.prototype conflicts
    $.extend( Plugin.prototype, {
        init: function() {
            var settings = this.settings;
            var $scroller = $( this.element );
            $scroller.wrapInner( "<div class='slide-wrap'><div class='slide-data' /></div>" );
            var $data = $scroller.find( ".slide-data" );
            var $slideWrap = $scroller.find( ".slide-wrap" );
            var scrollerContent = $data.children( "ul" );
            var controller = this.controller;
            if ( settings.direction === "right" ) {
                settings.speed = settings.speed * -1;
            }
            var speed = settings.speed;
            $scroller.addClass( "slide-pane" );

            // Set height of the container
            var maxHeight = 0;
            scrollerContent.children().each( function() {
                if ( $( this ).height() > maxHeight ) {
                    maxHeight = $( this ).height();
                }
            } );
            $slideWrap.height( maxHeight );

            // Clone the scroller content
            scrollerContent.children().clone().appendTo( scrollerContent );

            // Shift the elements to the right
            var currentX = 0;
            scrollerContent.children().each( function() {
                var $this = $( this );
                $this.css( "left", currentX );
                currentX += $this.outerWidth( true );
            } );
            var fullWidth = currentX / 2;
            var viewportWidth = $data.width();

            // Scrolling management; start the automatical scrolling
            var doScroll = function() {
                var currentX = $data.scrollLeft();
                var newX = currentX + controller.currentSpeed;
                if ( newX > fullWidth * 2 - viewportWidth ) {
                    newX -= fullWidth;
                } else if ( newX < 0 ) {
                    newX += fullWidth;
                }
                $data.scrollLeft( newX );
            };
            setInterval( doScroll, 20 );
            this.tweenToNewSpeed( speed );

            if ( settings.scrollOnMouseOver ) {
                this.scrollOnMouseOver( $data );
            }

            $scroller.css( "visibility", "visible" );
        },
        tweenToNewSpeed: function( newSpeed, duration ) {
            if ( duration === undefined ) {
                duration = 0;
            }
            var $controller = $( this.controller );
            $controller.stop( true ).animate( { currentSpeed: newSpeed }, duration );
        },
        scrollOnMouseOver: function( $data ) {
            var settings = this.settings;
            var $this = this;

            // Adjust speed on mouse move
            $data.mousemove( function( event ) {
                var deviceWidth = $( window ).width();
                var halfDeviceWidth = deviceWidth / 2;
                var horizonalPos = event.pageX;
                var percentage = 0;
                var duration = settings.maxSpeed;

                if ( horizonalPos < halfDeviceWidth ) {
                    percentage = -( 100 - ( ( horizonalPos / halfDeviceWidth ) * 100 )
                        .toFixed( 2 ) );
                } else {
                    percentage = ( ( ( horizonalPos - halfDeviceWidth ) / halfDeviceWidth ) * 100 )
                        .toFixed( 2 );
                }

                duration = ( percentage / 100 ) * duration;
                $this.tweenToNewSpeed( duration );
            } );

            // Reset on mouse out
            if ( settings.resetOnMouseOut ) {
                $data.mouseout( function() {
                    $this.tweenToNewSpeed( settings.speed, 500 );
                } );
            }
        }
    } );

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[ infiniteScroller ] = function( options ) {
        return this.each( function() {
            if ( !$.data( this, "plugin_" + infiniteScroller ) ) {
                $.data( this, "plugin_" +
                    infiniteScroller, new Plugin( this, options ) );
            }
        } );
    };

} )( jQuery, window, document );

const simulator = document.querySelector('.simulator')
const nextButton = document.querySelector('#next-button')
const previouslyButton = document.querySelector('#previously-button')
const simulateButton = document.querySelector('#simulate-button')

const step1 = document.querySelector('#step-1')
const step2 = document.querySelector('#step-2')
const step3 = document.querySelector('#step-3')
const step4 = document.querySelector('#step-4')

const stepController1 = document.querySelector('div[ref="step-1"]')
const stepController2 = document.querySelector('div[ref="step-2"]')
const stepController3 = document.querySelector('div[ref="step-3"]')

var currentStep = 1

function ofAllForms(){
    [step1, step2, step3, step4].forEach(element => {
        if (!element.classList.contains('d-none')){
            element.classList.add('d-none')
        }
        if (element.classList.contains('active')){
            element.classList.remove('active')
        }
    })
}

function ofAllSteps(){
    [stepController1, stepController2, stepController3].forEach(element => {
        if (element.classList.contains('active')){
            element.classList.remove('active')
        }
    })
}

function updateStep(step){
    ofAllForms()
    ofAllSteps()
    switch (step){
        case 1:
            step1.classList.remove('d-none')
            window.setTimeout(()=> step1.classList.add('active'), 10)
            stepController1.classList.add('active')

            previouslyButton.classList.add('d-none')
            break
        case 2:
            step2.classList.remove('d-none')
            window.setTimeout(()=> step2.classList.add('active'), 10)
            stepController1.classList.add('active')
            stepController2.classList.add('active')

            previouslyButton.classList.remove('d-none')
            nextButton.classList.remove('d-none')
            simulateButton.classList.add('d-none')
            break
        case 3:
            step3.classList.remove('d-none')
            window.setTimeout(()=> step3.classList.add('active'), 10)
            stepController1.classList.add('active')
            stepController2.classList.add('active')
            stepController3.classList.add('active')

            nextButton.classList.add('d-none')
            simulateButton.classList.remove('d-none')
            break
        case 4:
            step4.classList.remove('d-none')
            window.setTimeout(()=> step4.classList.add('active'), 10)
            stepController1.classList.add('active')
            stepController2.classList.add('active')
            stepController3.classList.add('active')
    
            nextButton.classList.add('d-none')
            previouslyButton.classList.remove('d-none')
            simulateButton.classList.add('d-none')
            break
    }
}

previouslyButton.addEventListener('click', ()=>{
    currentStep -= 1;
    updateStep(currentStep)
})

nextButton.addEventListener('click', ()=>{
    currentStep += 1;
    updateStep(currentStep)
})

/*Control slider*/
const sliderAmmount = document.querySelector('input[name="value"]')
const labelAmmount = document.querySelector('h5[ref="value"]')
const sliderTime = document.querySelector('input[name="parcels"]')
const labelTime = document.querySelector('h5[ref="parcels"]')

const inputCicle = document.querySelector('select[name="cicle"]')

inputCicle.addEventListener('change', (event)=>{
    const newCicle = event.target.value
    switch (newCicle){
        case 'Mensal':
            sliderTime.setAttribute('max', '3')
            sliderTime.setAttribute('value', '3')
            break
        case 'Quinzenal':
            sliderTime.setAttribute('max', '6')
            sliderTime.setAttribute('value', '6')
            break
        case 'Semanal':
            sliderTime.setAttribute('max', '12')
            sliderTime.setAttribute('value', '12')
            break
    }
    labelTime.innerHTML = `${sliderTime.value} vezes`
})

sliderAmmount.addEventListener('input', (event)=>{
    labelAmmount.innerHTML = `R$ ${event.target.value}`
})

sliderTime.addEventListener('input', (event)=>{
    if (event.target.value == 1){
        labelTime.innerHTML = `${event.target.value} vez`
        return
    }
    labelTime.innerHTML = `${event.target.value} vezes`
})

/*Simulator calc*/
const form = $('form')
form.on('submit', (event)=>{
    event.preventDefault()

    var hasErrors = false
    
    if (verifyBlanks('form')) hasErrors = true
    if (verifyFields('form')) hasErrors = true

    if (hasErrors) return

    const data = formDataToJSON('form')
    delete data['accept_data']

    fetch('http://localhost:8000/api/simulations', {
        body: JSON.stringify(data),
        method: 'POST',
        headers: {
            "content-type":"application/json" 
        }
    })

    currentStep +=1    
    updateStep(4)
    passResultsToFields(data)
})

function passResultsToFields(data){
    const requestValue = document.querySelector('#request_value')
    const requestParcels = document.querySelector('#request_parcels')
    const requestParcelsValue = document.querySelector('#request_parcels_value')
    const requestIOF = document.querySelector('#request_iof')
    const requestTable = document.querySelector('#requested_table')
    const requestTax = document.querySelector('#request_tax')

    const taxValue = taxas[data.segment][data.warranty][data.cicle]
    const parcelValue = calculateParcels(data.value, taxValue, data.parcels)

    const personType = data["cpf/cnpj"].length > 14 ? "juridical" : "physical"
    const fixedIOF = calculateFixedIOF(parcelValue, data.parcels, personType)

    var cicleDays = 0
    switch (data['cicle']){
        case 'Mensal':
            cicleDays = 30
            break
        case 'Quinzenal':
            cicleDays = 15
            break
        case 'Semanal':
            cicleDays = 7
            break
    }
    const variableIOF = calculateVariableIOF(parcelValue, data.parcels, cicleDays,personType)

    requestIOF.innerHTML = (variableIOF+fixedIOF).toFixed(2)
    requestTax.innerHTML = (taxValue*100).toFixed(2)
    requestParcels.innerHTML = data.parcels
    requestParcelsValue.innerHTML = parcelValue
    requestValue.innerHTML = data.value
    generateTable(requestTable, generateParcelsTable(parcelValue, data.parcels))
}

function generateTable(table, json){
    table.innerHTML = ''
    json = {
        0:{
            index: '',
            value: 'Parcela',
            rest: 'Restante'
        },...json
    }
    Object.keys(json).map(key => {
        var tr = document.createElement('tr')
        
        var index = document.createElement('td')
        const indexText = json[key].index
        index.innerHTML = indexText

        var parcel = document.createElement('td')
        const parcelText = `R$ ${json[key].value}`
        parcel.innerHTML = parcelText

        var fullValue = document.createElement('td')
        const fullValueText =  `R$ ${json[key].rest}`
        fullValue.innerHTML = fullValueText

        tr.appendChild(index)
        tr.appendChild(parcel)
        tr.appendChild(fullValue)
        
        table.appendChild(tr)
    })
}

/*Simulator formules*/
const IOFtaxs = {
    'physical': {
        'fixed': 0.0038,
        'perDay': 0.000082
    },
    'juridical': {
        'fixed': 0.0038,
        'perDay': 0.000041
    }
}

const taxas = {
    "Comércio": {
        "Sem garantia": {
            "Semanal": 0.0145,
            "Quinzenal": 0.0340,
            "Mensal": 0.0880
        },
        "Semi garantia": {
            "Semanal": 0.0130,
            "Quinzenal": 0.0325,
            "Mensal": 0.0750
        },
        "Garantia parcial": {
            "Semanal": 0.0099,
            "Quinzenal": 0.0225,
            "Mensal": 0.0550
        },
        "Garantia integral": {
            "Semanal": null,
            "Quinzenal": null,
            "Mensal": 0.0450
        }
    },
    "Serviços": {
        "Sem garantia": {
            "Semanal": 0.0170,
            "Quinzenal": 0.0390,
            "Mensal": 0.0980
        },
        "Semi garantia": {
            "Semanal": 0.0150,
            "Quinzenal": 0.0350,
            "Mensal": 0.0850
        },
        "Garantia parcial": {
            "Semanal": 0.0115,
            "Quinzenal": 0.0248,
            "Mensal": 0.0590
        },
        "Garantia integral": {
            "Semanal": null,
            "Quinzenal": null,
            "Mensal": 0.0499
        }
    },
    "Indústria": {
        "Sem garantia": {
            "Semanal": 0.0120,
            "Quinzenal": 0.0290,
            "Mensal": 0.0780
        },
        "Semi garantia": {
            "Semanal": 0.0105,
            "Quinzenal": 0.0275,
            "Mensal": 0.065
        },
        "Garantia parcial": {
            "Semanal": 0.0090,
            "Quinzenal": 0.020,
            "Mensal": 0.0450
        },
        "Garantia integral": {
            "Semanal": null,
            "Quinzenal": null,
            "Mensal": 0.0399
        }
    },
    "Outros": {
        "Sem garantia": {
            "Semanal": 0.0170,
            "Quinzenal": 0.0390,
            "Mensal": 0.0980
        },
        "Semi garantia": {
            "Semanal": 0.0150,
            "Quinzenal": 0.0350,
            "Mensal": 0.0850
        },
        "Garantia parcial": {
            "Semanal": 0.0115,
            "Quinzenal": 0.0248,
            "Mensal": 0.059
        },
        "Garantia integral": {
            "Semanal": null,
            "Quinzenal": null,
            "Mensal": 0.0499
        }
    }
}

function calculateParcels(loanValue, loanTax, loanParcels){
    const multiply = ((1+loanTax)**loanParcels*loanTax)/((1+loanTax)**loanParcels-1)
    const parcel = loanValue*multiply
    return Number(parcel.toFixed(2))
}

function generateParcelsTable(parcelFixed, loanParcels){
    var fullValue = parcelFixed*loanParcels
    var parcelsJson = {}

    let index = 1
    for(loanParcels; loanParcels > 0; loanParcels-=1){
        fullValue-=parcelFixed
        parcelsJson[index] = {
            index: index,
            value: parcelFixed.toFixed(2),
            rest: fullValue.toFixed(2)
        }
        index+=1
    }
    return parcelsJson
}

function calculateFixedIOF(parcelFixed, loanParcels, personType){
    const fixedIOF = parcelFixed * loanParcels * IOFtaxs[personType]['fixed']
    return Number(fixedIOF.toFixed(2))
}

function calculateVariableIOF(parcelFixed, loanParcels, cicleDays, personType){
    var fullValue = parcelFixed*loanParcels
    var variableIOF = 0
    while (fullValue > 0){
        parcelIOF = fullValue * IOFtaxs[personType]['perDay'] * cicleDays
        variableIOF += parcelIOF
        fullValue -= parcelFixed
    }
    return Number(variableIOF.toFixed(2))
}
/*End*/
function formDataToJSON(form){
    let formJson = {}
    $(`${form} input,select`).each(function () {
        const fieldName = $(this).attr('name')
        const fieldValue = $(this).val()
        formJson[fieldName] = fieldValue
    });
    return formJson
}

function verifyBlanks(form){
    var hasErrors = false
    const formNodes = $(`${form} input,select`)

    formNodes.each(function() {
        if ($(this).val() == '' || $(this).val() == undefined){
            toggleErrorNode($(this), true)
            hasErrors = true
        } else{
            toggleErrorNode($(this), false)
        }
    })
    return hasErrors
}

function verifyFields(form){
    var hasErrors = false
    const formNodes = $(`${form} input,select`)
    
    formNodes.each(function() {
        const fieldName = $(this).attr('name')
        const fieldValue = $(this).val()
        
        let hasError
        switch (fieldName){
            case 'name':
                hasError = !correctName(fieldValue)
                toggleErrorNode($(this), hasError)
                break
            case 'name':
                hasError = !correctEmail(fieldValue)
                toggleErrorNode($(this), hasError)
                break
            case 'loan_value':
                hasError = !correctLoanVale(fieldValue)
                toggleErrorNode($(this), hasError, 'Valor mínimo R$ 100,00')
                break
            case 'cep':
                async function f(){
                    hasError = await!correctCEP(fieldValue)
                    toggleErrorNode($(this), hasError)
                }f()
                break
            case 'CPF':
                hasError = !correctCPF(fieldValue)
                toggleErrorNode($(this), hasError)
                break
        }
    })

    return hasErrors
}

function handleUploadFields(){
    const uploadFields = document.querySelectorAll('input[type="file"]')
    uploadFields.forEach(uploadField=>{
        const uploadLabel = document.querySelector(`label[for='${uploadField.getAttribute('id')}'] spam`)
        uploadField.addEventListener('change', (event)=>{
            uploadLabel.innerHTML = event.target.value.split(/(\\|\/)/g).pop()
        })
    })
}
handleUploadFields()

function handleCheckboxFields(){
    const checkboxDivs = document.querySelectorAll('div.checkbox')
    checkboxDivs.forEach(checkboxDiv => {
        const checkboxHidden = checkboxDiv.querySelector('input')
        checkboxHidden.addEventListener('change', (event)=>{
            if(checkboxHidden.checked){
                checkboxDiv.classList.add('active')
            } else{
                checkboxDiv.classList.remove('active')
            }
        })
    })
}handleCheckboxFields()

function addMaksInFields(){
    const inputsCelphone = $('input[name="celphone"]')
    inputsCelphone.each(function(){
        $(this).mask('(00) 00000-0000');
    })

    const inputsCPF = $('input[name="cpf"]')
    inputsCPF.each(function(){
        $(this).mask('000.000.000-00')
    })

    const inputsCNPJ = $('input[name="cnpj"]')
    inputsCNPJ.each(function(){
        $(this).mask('00.000.000/0000-00')
    })

    const inputsCPFcnpj = $('input[name="cpf/cnpj"]')
    inputsCPFcnpj.each(function(){
        var options =  {
            onKeyPress: function(inputText, e, field, options) {
              var masks = ['000.000.000-00', '00.000.000/0000-00'];
              var mask = (inputText.length>13) ? masks[1] : masks[0];
              $('input[name="cpf/cnpj"]').mask(mask, options);
            }
        }
          
        $(this).mask('000.000.000-00', options);
    })
}addMaksInFields()

function toggleErrorNode(node, hasError, message){
    const inputBlock = node.parent()
    if (hasError){
        inputBlock.addClass('error')
        if (message) {
            inputBlock.find('.error-label p').text(message)
        }
    } else{
        inputBlock.removeClass('error')
    }
}

function correctName(name){
    if (name == undefined || name.lenght<2){
        return true
    } else{
        return false
    }
}

function correctEmail(email){
    if (email == undefined || email.lenght<4 || !email.contains('@') || !email.contains('.')){
        return false
    } else{
        return true
    }
}

function correctLoanVale(value){
    if (value != undefined) value = value.replaceAll('.','')
    if (value != undefined) value = value.replace(',','.')
    value = Number(value)
    if (value < 100){
        return false
    } else{
        return true
    }
}

async function correctCEP(cep){
    let cepValue = cep.replace('-','')
    cepValue = cepValue ? cepValue : '00000000'
    const cepInfo = await (await fetch(`http://viacep.com.br/ws/${cepValue}/json/`)).json()
    
    if (cepInfo.erro) return false
    return true
}

function correctCPF(strCPF) {
    var Soma;
    var Resto;
    Soma = 0;
    strCPF = strCPF.replaceAll('.','')
    strCPF = strCPF.replace('-','')
    if (strCPF == "00000000000") return false;

    for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
    Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10)) ) return false;

    Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;

        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
}
var strCPF = "12345678909";