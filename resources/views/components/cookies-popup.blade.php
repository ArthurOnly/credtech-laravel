<div class='cookie-popup container d-none'>
    <p>Utilizamos ferramentas e serviços de terceiros que usam cookies. Elas nos ajudam a melhorar sua experiência no
        site. Ao clicar em "Certo" ou continuar navegando, você concorda com o nosso uso de cookies no nosso site.</p>
    <a href='#'>Certo</button>

    <style>
        .cookie-popup {
            position: fixed;
            background-color: var(--blue-4);
            color: #fff;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            padding: 16px;
            width: 100%;
            max-width: 450px;
            z-index: 11;
        }

        .cookie-popup p {
            font-size: 0.7rem !important;
        }

    </style>
</div>

<script>
    function setCookie(cname, cvalue) {
        document.cookie = cname + "=" + cvalue;
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    var acceptCookies = getCookie('acceptCookies')

    const cookiePop = document.querySelector('.cookie-popup')
    const cookieButton = document.querySelector('.cookie-popup a')

    if (!acceptCookies) {
        cookiePop.classList.remove('d-none')
        window.setTimeout(()=>setCookie('acceptCookies','true'), 20000)
    }

    cookieButton.addEventListener('click', (event)=>{
        event.preventDefault()
        setCookie('acceptCookies','true')
        cookiePop.classList.add('d-none')
    })

</script>
