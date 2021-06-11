function inputFilesToFormData(form){
    var formData = new FormData()
    $(`${form} input,select`).each(function () {
        const fieldName = $(this).attr('name')
        var fieldValue = ''
        if ($(this).attr('type') == 'file'){
            fieldValue = $(this).get(0).files[0]
            formData.append(fieldName, fieldValue)
        } 
    });
    return formData
}

function verifyBlanks(form){
    var hasErrors = false
    const formNodes = $(`${form} input[require],select[require]`)

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
            case 'email':
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
        checkboxHidden.addEventListener('change', ()=>{
            if(checkboxHidden.checked){
                checkboxDiv.classList.add('active')
                checkboxDiv.parentNode.classList.remove('error')
            } else{
                checkboxDiv.classList.remove('active')
                checkboxDiv.parentNode.classList.add('error')
            }
        })
    })
}handleCheckboxFields()

function addMaksInFields(){
    const inputsCelphone = $('input[name="celphone"]')
    inputsCelphone.each(function(){
        $(this).mask('(00) 00000-0000');
    })

    const inputsValue = $('input[name="value"]')
    inputsValue.each(function(input){
        if ($(this).attr('type') != 'range') $(this).mask('000.000.000.000.000,00', {reverse: true})
    })

    const inputsCPF = $('input[name="cpf"]')
    inputsCPF.each(function(){
        $(this).mask('000.000.000-00')
    })

    const inputsCNPJ = $('input[name="cnpj"]')
    inputsCNPJ.each(function(){
        $(this).mask('00.000.000/0000-00')
    })

    const inputsCPFcnpj = $('input[name="cpf_cnpj"]')
    inputsCPFcnpj.each(function(){
        var options =  {
            onKeyPress: function(inputText, e, field, options) {
              var masks = ['000.000.000-000', '00.000.000/0000-00'];             
              var mask = inputText.length < 15 ? masks[0] : masks[1]

              $('input[name="cpf_cnpj"]').mask(mask, options);
            }
        }
          
        $(this).mask('000.000.000-000', options);
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
    if (name=="") return false
    if (name == undefined || name.lenght<2){
        return false
    } else{
        return true
    }
}

function correctEmail(email){
    if (email=="") return false
    if (email == undefined || email.lenght<4 || !email.includes('@') || !email.includes('.')){
        return false
    } else{
        return true
    }
}

function correctLoanVale(value){
    if (value=="") return false
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
    if (cep=="") return false
    let cepValue = cep.replace('-','')
    cepValue = cepValue ? cepValue : '00000000'
    const cepInfo = await (await fetch(`http://viacep.com.br/ws/${cepValue}/json/`)).json()
    
    if (cepInfo.erro) return false
    return true
}

function correctCPF(strCPF) {
    if (strCPF=="") return false
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
const formPhysical = 'form[name="physical-person-form"]'
const formJuridical = 'form[name="juridical-person-form"]'

const physicalCpf = $(`${formPhysical} input[name="cpf"]`)
const physicalMoney = $(`${formPhysical} input[name='loan_value']`)
const physicalMonthly_income = $(`${formPhysical} input[name='monthly_income']`)
const physicalCep = $(`${formPhysical} input[name='cep']`)
const physicalCelphone = $(`${formPhysical} input[name='celphone']`)

const juridicalCpf = $(`${formJuridical} input[name="cpf_partner"]`)
const juridicalMoney = $(`${formJuridical} input[name='loan_value']`)
const juridicalMonthly_income = $(`${formJuridical} input[name='monthly_income']`)
const juridicalCep = $(`${formJuridical} input[name='cep']`)
const juridicalCelphone = $(`${formJuridical} input[name='celphone']`)

/*masks*/
$(document).ready(function(){
    physicalCpf.mask('000.000.000-00');
    physicalCep.mask('00000-000');
    physicalCelphone.mask('(00) 00000-0000');
    physicalMoney.mask('000.000,00', {
        reverse: true,
    });
    physicalMonthly_income.mask('000.000.000,00', {reverse: true});

    juridicalCpf.mask('000.000.000-00');
    juridicalCep.mask('00000-000');
    juridicalCelphone.mask('(00) 00000-0000');
    juridicalMoney.mask('000.000,00', {
        reverse: true,
    });
    juridicalMonthly_income.mask('000.000.000,00', {reverse: true});
})

/*Physicial form handler*/
const popup = document.querySelector('.popup')
const popupBody = document.querySelector('.popup h4')

$(formPhysical).submit(async (event)=>{
    event.preventDefault()

    const verifyAccept = document.querySelector(`${formPhysical} #accept_data`)
    const isAccept = verifyAccept.checked

    if (!isAccept){
        verifyAccept.parentNode.parentNode.classList.add('error')
        return
    }
    
    var hasErrors = false
    
    if (verifyBlanks(formPhysical)) hasErrors = true

    if (verifyFields(formPhysical)) hasErrors = true

    if (hasErrors){
        return
    }

    popup.classList.add('active')
    popupBody.innerHTML = `<h4><i class="fas fa-spinner loading"></i></h4>`

    const formData = new FormData(document.querySelector(formPhysical))
    formData.delete('accept_data')

    const request = await fetch('http://localhost:8000/api/loan', {
        body: formData,
        method: 'post',
    })

    const response = await request.json()

    if (response.id){
        popupBody.innerHTML = `<h4 class='success'>Sucesso</h4>`
    } else{
        popupBody.innerHTML = `<h4 class='fail'>Falha na solicitação</h4>`
    }

    window.setTimeout(()=>popup.classList.remove('active'), 3000)
})

$(formJuridical).submit(async (event)=>{
    event.preventDefault()

    const verifyAccept = document.querySelector(`${formJuridical} #accept_data_2`)
    const isAccept = verifyAccept.checked

    if (!isAccept){
        verifyAccept.parentNode.parentNode.classList.add('error')
        return
    }
    
    var hasErrors = false
    
    if (verifyBlanks(formJuridical)) hasErrors = true

    if (verifyFields(formJuridical)) hasErrors = true

    if (hasErrors){
        return
    }

    popup.classList.add('active')
    popupBody.innerHTML = `<h4><i class="fas fa-spinner loading"></i></h4>`

    const formData = new FormData(document.querySelector(formJuridical))
    formData.delete('accept_data')

    const request = await fetch('http://localhost:8000/api/loan', {
        body: formData,
        method: 'post',
    })

    const response = await request.json()

    if (response.id){
        popupBody.innerHTML = `<h4 class='success'>Sucesso</h4>`
    } else{
        popupBody.innerHTML = `<h4 class='fail'>Falha na solicitação</h4>`
    }

    window.setTimeout(()=>popup.classList.remove('active'), 3000)
})


/*Form selector*/
const selectSection = $('.select-type-container')
const selectPhysical = $('button[name="select-pysical"]')
const selectJuridical = $('button[name="select-juridical"]')
const returnSelection = $('.return-to-select')

const physicalSection = $('section.physical-person form')
const physicalSectionHeader = $('section.physical-person .header')
const juridicalSection = $('section.juridical-person form')
const juridicalSectionHeader = $('section.juridical-person .header')

returnSelection.each(function(){
    $(this).click(()=>{
        selectSection.addClass('active nav-margin')

        juridicalSection.removeClass('active')
        juridicalSectionHeader.removeClass('active nav-margin')
        physicalSection.removeClass('active')
        physicalSectionHeader.removeClass('active nav-margin')
    })
})

selectPhysical.click(()=>{
    selectSection.removeClass('active nav-margin')
    
    physicalSection.addClass('active')
    physicalSectionHeader.addClass('active nav-margin')

    juridicalSectionHeader.removeClass('active nav-margin')
    juridicalSection.removeClass('active')
})

selectJuridical.click(()=>{
    selectSection.removeClass('active nav-margin')

    juridicalSection.addClass('active')
    juridicalSectionHeader.addClass('active nav-margin')

    physicalSection.removeClass('active')
    physicalSectionHeader.removeClass('active nav-margin')
})