<aside class='active'>
    <div class='menu-container container'>
        <a class='menu-item {{$activeRoute === "admin.panel" ? "active" : ""}}' href={{ route('admin.panel') }}>
            <i class="fas fa-map-marker-alt"></i>
            Painel
        </a>
        <a class='menu-item {{$activeRoute === "admin.simulacoes" ? "active" : ""}}' href={{ route('admin.simulacoes') }}>
            <i class="fas fa-map-marker-alt"></i>
            Simulações
        </a>
        <a class='menu-item {{$activeRoute === "admin.emprestimos" ? "active" : ""}}' href={{ route('admin.emprestimos')}}>
            <i class="fas fa-map-marker-alt"></i>
            Empréstimos
        </a>
        <a class='menu-item {{$activeRoute === "admin.cheques" ? "active" : ""}}' href={{ route('admin.cheques')}}>
            <i class="fas fa-map-marker-alt"></i>
            Desconto de títulos
        </a>
        <a class='menu-item {{$activeRoute === "admin.contatos" ? "active" : ""}}' href={{ route('admin.contatos')}}>
            <i class="fas fa-map-marker-alt"></i>
            Contatos
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
