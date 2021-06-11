const form = document.querySelector('form')
const popup = document.querySelector('.popup')
const popupBody = document.querySelector('.popup h4')

form.addEventListener('submit', async(event)=>{
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

    popup.classList.add('active')
    popupBody.innerHTML = `<h4><i class="fas fa-spinner loading"></i></h4>`

    const formData = new FormData(form)
    formData.delete('accept_data');

    const request = await fetch('http://localhost:8000/api/checks', {
        body: formData,
        method: 'post',
    })

    const response = await request.json()

    if (response.success){
        popupBody.innerHTML = `<h4 class='success'>Sucesso</h4>`
    } else{
        popupBody.innerHTML = `<h4 class='fail'>Falha na solicitação</h4>`
    }

    window.setTimeout(()=>popup.classList.remove('active'), 3000)
})