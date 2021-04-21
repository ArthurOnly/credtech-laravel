const taxasCommerce = document.querySelector('#tax-comercio')
const taxasServices = document.querySelector('#tax-servicos')
const taxasIndustry = document.querySelector('#tax-industria')

const selectSegment = document.querySelector('select[name="witch-segment"]')

function offAllTax(){
    [taxasCommerce, taxasServices, taxasIndustry].forEach(element =>{
        if (element.classList.contains('active')){
            element.classList.remove('active')
        }
    })
}

selectSegment.addEventListener('change', (event)=>{
    const newSegment = event.target.value
    offAllTax()
    switch (newSegment){
        case 'servicos':
            taxasServices.classList.add('active')
            break
        case 'industria':
            taxasIndustry.classList.add('active')
            break
        case 'comercio':
            taxasCommerce.classList.add('active')
            break
    }
})