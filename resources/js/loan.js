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
const blackOverlay = $('.black-overlay')
const loanPopup = $('.loan-popup')
const loanPopupCloser = $('.loan-popup-container > i')

console.log(loanPopupCloser)

loanPopupCloser.click(function(){
    blackOverlay.removeClass('active')
    loanPopup.removeClass('active')
})

$(formPhysical).submit((event)=>{
    event.preventDefault()
    
    var hasErrors = false
    
    if (verifyBlanks(formPhysical)) hasErrors = true

    if (verifyFields(formPhysical)) hasErrors = true

    if (!hasErrors){
        return
    }

    blackOverlay.addClass('active')
    loanPopup.addClass('active')

    const data = formDataToJSON(formPhysical)
    delete data['accept_data']

    console.log(data);


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