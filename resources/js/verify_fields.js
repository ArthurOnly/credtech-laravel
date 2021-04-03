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