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

    const formData = new FormData(document.querySelector('form'))
    formData.delete('accept_data')

    fetch('http://localhost:8000/api/simulations', {
        body: formData,
        method: 'POST'
    })

    currentStep +=1    
    updateStep(4)
    passResultsToFields(formData)
})

function passResultsToFields(data){
    const requestValue = document.querySelector('#request_value')
    const requestParcels = document.querySelector('#request_parcels')
    const requestParcelsValue = document.querySelector('#request_parcels_value')
    const requestIOF = document.querySelector('#request_iof')
    const requestTable = document.querySelector('#requested_table')
    const requestTax = document.querySelector('#request_tax')

    var warranty = ''
    
    switch(data.get('segment_id')){
        case'1': 
            warranty = 'Sem garantia'
            break
        case'2': 
            warranty = 'Semi garantia'
            break
        case'3': 
            warranty = 'Garantia parcial'
            break
        case'4': 
            warranty = 'Garantia integral'
            break
    }
    var segment = ''
    switch(data.get('segment_id')){
        case'1': 
            segment = 'Comércio'
            break
        case'2': 
            segment = 'Serviços'
            break
        case'3': 
            segment = 'Indústria'
            break
        case'4': 
            segment = 'Outros'
            break
    }

    const taxValue = taxas[segment][warranty][data.get('cicle')]
    const parcelValue = calculateParcels(data.get('value'), taxValue, data.get('parcels'))

    const personType = data.get("cpf_cnpj").length > 14 ? "juridical" : "physical"
    const fixedIOF = calculateFixedIOF(parcelValue, data.get('parcels'), personType)

    var cicleDays = 0
    switch (data.get('cicle')){
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
    const variableIOF = calculateVariableIOF(parcelValue, data.get('parcels'), cicleDays,personType)

    requestIOF.innerHTML = (variableIOF+fixedIOF).toFixed(2)
    requestTax.innerHTML = (taxValue*100).toFixed(2)
    requestParcels.innerHTML = data.get('parcels')
    requestParcelsValue.innerHTML = parcelValue
    requestValue.innerHTML = data.get('value')
    generateTable(requestTable, generateParcelsTable(parcelValue, data.get('parcels')))
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