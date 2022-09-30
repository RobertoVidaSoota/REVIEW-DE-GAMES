<template>
    <nav id="menu" class="navbar navbar-expand-lg">

        <div class="container-fluid">

            <a href="/review" class="logo navbar-brand">
                REVIWW
            </a>
        
            <button class="nav-button navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar_id" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div id="navbar_id" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
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
                <div class="ms-auto">
                    <a href="/perfil" class="nav-link">perfil</a>
                </div>
            </div>
        </div>
    </nav>
  </template>

<script>
import route from '../../../vendor/tightenco/ziggy/src/js';

export default {
    name: "MenuCustom"
}
</script>


<style>
.logo
{
    margin: 0;
    padding: 20px 12px !important;
}
#menu
{
        background: var(--branco-menu);
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
        margin: 0 0 50px 0;
}
.nav-link
{
    padding: 20px 12px !important;
}
</style>