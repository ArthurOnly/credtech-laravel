const allDots = document.querySelector('.slider-controller').querySelectorAll('li')
const allSlides = document.querySelector('.opinions-slider').querySelectorAll('.opinion-card')

//window.setInterval(()=>passToNext, 10000)
var changedBeforeInterval = false

window.setInterval(()=>{
  if (!changedBeforeInterval){
    passToNext()
  }
  changedBeforeInterval = false

}, 15000)

function passToNext(){
  var find = false
  allDots.forEach(dot => {
    if (dot.classList.contains('active') && !find){
      const slideNumber = Number(dot.attributes.ref.value.charAt(dot.attributes.ref.value.length-1))+1;
      if (slideNumber==6){
        toogleDotOn('slide-1')
      } else{
        toogleDotOn('slide-'+slideNumber)
      }
      find = true;
    }
  })
}

function toggleOfAll(){
  allSlides.forEach(slide => {
    if (!slide.classList.contains('d-none')){
      slide.classList.add('d-none')
      slide.classList.remove('active')
    }
  })
}

function toggleOnSelected(slideName){
  allSlides.forEach((slide)=> {
    if (slide.classList.contains(slideName)){
      slide.classList.remove('d-none')
      window.setTimeout(()=> slide.classList.add('active'),10)
    }
  })
}

function toggleAllDotsOf(){
  allDots.forEach(dot => {
    if (dot.classList.contains('active')){
      dot.classList.remove('active')
    }
  })
}

function toogleDotOn(dotRef){
  toggleAllDotsOf()
  allDots.forEach(dot => {
    if (dot.attributes.ref.value == dotRef){
      dot.click()
    }
  })
}

allDots.forEach(dot => {
  dot.addEventListener('click', ()=>{
    toggleOfAll()
    toggleOnSelected(dot.attributes.ref.value)
    toggleAllDotsOf()
    changedBeforeInterval = true
    dot.classList.add('active')
  })
})