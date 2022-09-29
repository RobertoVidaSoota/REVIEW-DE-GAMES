<template>
  <div id="menu" class="navbar container-fluid">

    <a href="#" class="logo">
        REVIWW
    </a>

    <button class="nav-button navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar_id">
        <span class="navbar-toggler-icon"></span>
    </button>
    
    <div id="navbar_id" class="collapse navbar-collapse">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="nav-link">Populares</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Categorias</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Ano de lançamento</a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">Desenvolvedora</a>
            </li>
        </ul>
    </div>
  </div>
</template>

<script>
export default {
    name: "MenuCustom"
}
</script>




<style>
    #menu
    {
        background: var(--branco-menu);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
    }
</style>