const formPhysical = 'form[name="physical-person-form"]'

const physicalCpf = $(`${formPhysical} input[name="cpf"]`)
const physicalMoney = $(`${formPhysical} input[name='loan_value']`)
const physicalMonthly_income = $(`${formPhysical} input[name='monthly_income']`)
const physicalCep = $(`${formPhysical} input[name='cep']`)
const physicalCelphone = $(`${formPhysical} input[name='celphone']`)

/*masks*/
$(document).ready(function(){
    physicalCpf.mask('000.000.000-00');
    physicalCep.mask('00000-000');
    physicalCelphone.mask('(00) 00000-0000');
    physicalMoney.mask('000.000,00', {
        reverse: true,
    });
    physicalMonthly_income.mask('000.000.000,00', {reverse: true});
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