const form = document.querySelector('form')

form.addEventListener('submit', (event)=>{
    event.preventDefault()

    const verifyAccept = document.querySelector(`#accept_data`)
    const isAccept = verifyAccept.checked

    if (!isAccept){
        verifyAccept.parentNode.parentNode.classList.add('error')
        return
    }
    
    var hasErrors = false
    
    if (verifyBlanks('form')) hasErrors = true

    if (verifyFields('form')) hasErrors = true

    if (hasErrors){
        return
    }

    blackOverlay.addClass('active')
    loanPopup.addClass('active')

    const formData = new FormData(form)
    formData.delete('accept_data');

    const request = await fetch('http://localhost:8000/api/tit-descount', {
        body: formData,
        method: 'post',
    })
})