<aside class='active'>
    <div class='menu-container container'>
        <a class='menu-item active'>
            <i class="fas fa-map-marker-alt"></i>
            Painel
        </a>
        <a class='menu-item'>
            <i class="fas fa-map-marker-alt"></i>
            Simulações
        </a>
        <a class='menu-item'>
            <i class="fas fa-map-marker-alt"></i>
            Empréstimos
        </a>
        <a class='menu-item'>
            <i class="fas fa-map-marker-alt"></i>
            Desconto de títulos
        </a>
        <a class='menu-item'>
            <i class="fas fa-map-marker-alt"></i>
            Configurações
        </a>
        <a class='menu-item danger' href={{ route('auth.logout') }}>
            <i class="fas fa-map-marker-alt"></i>
            Sair
        </a>
        <div class='closer close-state '>
            <i class="fas fa-chevron-circle-right"></i>
        </div>
    </div>
</aside>
<script>
    const menu = document.querySelector('aside')
    const menuToggler = document.querySelector('aside .closer')
    var contentFlow = null
    window.addEventListener('load', ()=>{
        contentFlow = document.querySelector('body > div')
        console.log(contentFlow)
    })
    menuToggler.addEventListener('click', () => {
        if (menu.classList.contains('active')) {
            menu.classList.remove('active')
            menuToggler.classList.remove('close-state')
            contentFlow.classList.add('full')
        } else {
            menu.classList.add('active')
            menuToggler.classList.add('close-state')
            contentFlow.classList.remove('full')
        }
    })

</script>
