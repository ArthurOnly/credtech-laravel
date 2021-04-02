const simulator = document.querySelector('.simulator')
const nextButton = document.querySelector('#next-button')
const previouslyButton = document.querySelector('#previously-button')
const simulateButton = document.querySelector('#simulate-button')

const step1 = document.querySelector('#step-1')
const step2 = document.querySelector('#step-2')
const step3 = document.querySelector('#step-3')

const stepController1 = document.querySelector('div[ref="step-1"]')
const stepController2 = document.querySelector('div[ref="step-2"]')
const stepController3 = document.querySelector('div[ref="step-3"]')

var currentStep = 1

function ofAllForms(){
    [step1, step2, step3].forEach(element => {
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
        case 'mensal':
            sliderTime.setAttribute('max', '3')
            sliderTime.setAttribute('value', '3')
            break
        case 'quinzenal':
            sliderTime.setAttribute('max', '6')
            sliderTime.setAttribute('value', '6')
            break
        case 'semanal':
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
})

simulateButton.addEventListener('click', ()=>{
    const data = formDataToJSON('form')
    console.log(data)
})