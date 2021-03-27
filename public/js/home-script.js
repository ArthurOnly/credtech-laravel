;( function( $, window, document, undefined ) {
    "use strict";

    // Create the defaults once
    var infiniteScroller = "infiniteScroller",
        defaults = {
            maxSpeed: 20,
            speed: 1,
            scrollOnMouseOver: true,
            resetOnMouseOut: true,
            direction: "left"
        };

    // The actual plugin constructor
    function Plugin( element, options ) {
        this.element = element;
        this.settings = $.extend( {}, defaults, options );
        this.controller = { currentSpeed: 0 };
        this.init();
    }

    // Avoid Plugin.prototype conflicts
    $.extend( Plugin.prototype, {
        init: function() {
            var settings = this.settings;
            var $scroller = $( this.element );
            $scroller.wrapInner( "<div class='slide-wrap'><div class='slide-data' /></div>" );
            var $data = $scroller.find( ".slide-data" );
            var $slideWrap = $scroller.find( ".slide-wrap" );
            var scrollerContent = $data.children( "ul" );
            var controller = this.controller;
            if ( settings.direction === "right" ) {
                settings.speed = settings.speed * -1;
            }
            var speed = settings.speed;
            $scroller.addClass( "slide-pane" );

            // Set height of the container
            var maxHeight = 0;
            scrollerContent.children().each( function() {
                if ( $( this ).height() > maxHeight ) {
                    maxHeight = $( this ).height();
                }
            } );
            $slideWrap.height( maxHeight );

            // Clone the scroller content
            scrollerContent.children().clone().appendTo( scrollerContent );

            // Shift the elements to the right
            var currentX = 0;
            scrollerContent.children().each( function() {
                var $this = $( this );
                $this.css( "left", currentX );
                currentX += $this.outerWidth( true );
            } );
            var fullWidth = currentX / 2;
            var viewportWidth = $data.width();

            // Scrolling management; start the automatical scrolling
            var doScroll = function() {
                var currentX = $data.scrollLeft();
                var newX = currentX + controller.currentSpeed;
                if ( newX > fullWidth * 2 - viewportWidth ) {
                    newX -= fullWidth;
                } else if ( newX < 0 ) {
                    newX += fullWidth;
                }
                $data.scrollLeft( newX );
            };
            setInterval( doScroll, 20 );
            this.tweenToNewSpeed( speed );

            if ( settings.scrollOnMouseOver ) {
                this.scrollOnMouseOver( $data );
            }

            $scroller.css( "visibility", "visible" );
        },
        tweenToNewSpeed: function( newSpeed, duration ) {
            if ( duration === undefined ) {
                duration = 0;
            }
            var $controller = $( this.controller );
            $controller.stop( true ).animate( { currentSpeed: newSpeed }, duration );
        },
        scrollOnMouseOver: function( $data ) {
            var settings = this.settings;
            var $this = this;

            // Adjust speed on mouse move
            $data.mousemove( function( event ) {
                var deviceWidth = $( window ).width();
                var halfDeviceWidth = deviceWidth / 2;
                var horizonalPos = event.pageX;
                var percentage = 0;
                var duration = settings.maxSpeed;

                if ( horizonalPos < halfDeviceWidth ) {
                    percentage = -( 100 - ( ( horizonalPos / halfDeviceWidth ) * 100 )
                        .toFixed( 2 ) );
                } else {
                    percentage = ( ( ( horizonalPos - halfDeviceWidth ) / halfDeviceWidth ) * 100 )
                        .toFixed( 2 );
                }

                duration = ( percentage / 100 ) * duration;
                $this.tweenToNewSpeed( duration );
            } );

            // Reset on mouse out
            if ( settings.resetOnMouseOut ) {
                $data.mouseout( function() {
                    $this.tweenToNewSpeed( settings.speed, 500 );
                } );
            }
        }
    } );

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[ infiniteScroller ] = function( options ) {
        return this.each( function() {
            if ( !$.data( this, "plugin_" + infiniteScroller ) ) {
                $.data( this, "plugin_" +
                    infiniteScroller, new Plugin( this, options ) );
            }
        } );
    };

} )( jQuery, window, document );

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
const sliderAmmount = document.querySelector('input[name="ammount"]')
const labelAmmount = document.querySelector('h5[ref="ammount"]')
const sliderTime = document.querySelector('input[name="how-times"]')
const labelTime = document.querySelector('h5[ref="how-times"]')

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
