const faqCards = document.querySelectorAll('.faq-card')

faqCards.forEach(faqCard => {
    const faqCardTitle = faqCard.querySelector('.title')
    const faqCardIcon = faqCard.querySelector('.title i')
    faqCardTitle.addEventListener('click', ()=>{
        if (faqCard.classList.contains('active')){
            faqCard.classList.remove('active')
            faqCardIcon.classList.remove('to-close')
            return
        } 
        faqCardIcon.classList.add('to-close')
        faqCard.classList.add('active')
    })
})