<template>
    <nav id="menu" class="navbar navbar-expand-lg">

        <div class="container-fluid">

            <a href="/" class="logo navbar-brand">
                REVIWW
            </a>
        
            <button class="nav-button navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar_id" type="button">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div id="navbar_id" class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link">Populares</a>
                        <div class="box_nav_item_down">
                            <p><a href="/get-reviews-group/collection/GTA">GTA</a></p>
                            <p><a href="/get-reviews-group/collection/Call of Duty">
                                Call of Duty
                            </a></p>
                            <p><a href="/get-reviews-group/collection/Watch Dogs">
                                Watch Dogs
                            </a></p>
                            <p><a href="/get-reviews-group/collection/Cyberpunk">
                                Cyberpunk</a></p>
                            <p><a href="/get-reviews-group/collection/FIFA">FIFA</a></p>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Categorias</a>
                        <div class="box_nav_item_down">
                            <p><a href="/get-reviews-group/gender/Mundo aberto">
                                Mundo aberto
                            </a></p>
                            <p><a href="/get-reviews-group/gender/Aventura">
                                Aventura
                            </a></p>
                            <p><a href="/get-reviews-group/gender/Esportes">Esportes</a></p>
                            <p><a href="/get-reviews-group/gender/Corrida">Corrida</a></p>
                            <p><a href="/get-reviews-group/gender/FPS">FPS</a></p>
                            <p><a href="/get-reviews-group/gender/RPG">RPG</a></p>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Ano de lançamento</a>
                        <div class="box_nav_item_down">
                            <p><a href="/get-reviews-group/year/2000-2005">2000 - 2005</a></p>
                            <p><a href="/get-reviews-group/year/2006-2010">2006 - 2010</a></p>
                            <p><a href="/get-reviews-group/year/2011-2015">2011 - 2015</a></p>
                            <p><a href="/get-reviews-group/year/2016-2020">2016 - 2020</a></p>
                            <p><a href="/get-reviews-group/year/2021-2025">2021 - 2025</a></p>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">Desenvolvedora</a>
                        <div class="box_nav_item_down">
                            <p><a href="/get-reviews-group/developer/EA">EA</a></p>
                            <p><a href="/get-reviews-group/developer/Activision">
                                Activision
                            </a></p>
                            <p><a href="/get-reviews-group/developer/Ubisoft">Ubisoft</a></p>
                            <p><a href="/get-reviews-group/developer/Sony">Sony</a></p>
                        </div>
                    </li>
                </ul>
                <div v-if="idUserContext" 
                class="ms-auto nav-item">
                    <a href="#" class="nav-link link_auth">
                       {{ this.user.name }}
                    </a>
                    <div class="box_nav_item_down">
                        <p><a @click.prevent="nav('/perfil/'+user.id)" href="#">
                            Perfil
                        </a></p>
                        <p><a @click.prevent="logOutUser()" href="#">Sair</a></p>
                    </div>
                </div>
                <div v-if="idUserContext==''" 
                class="ms-auto nav-item">
                    <a href="/login" class="nav-link">
                        Fazer login
                    </a>
                </div>
            </div>
        </div>
    </nav>
  </template>

<script>
export default {
    name: "MenuCustom",
    data()
    {
        return{
        }
    },
    mounted()
    {
    },
    methods:
    {
        logOutUser(){axios.post('/logout').then(res => this.nav("/login"))},
        nav(link){ location.href = link }
    },
    props: 
    {
      user: Object,
      idUserContext: String
    },
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
.navbar{padding:0;}
.link_auth
{
    margin: 0 30px 0 0;
}
.nav-link
{
    padding: 20px 12px !important;
}

.box_nav_item_down
{
    position: absolute;
    display: none;
    padding: 10px 15px;
    background: var(--branco);
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.25);
    border-top: 0;
}
.nav-item:hover .box_nav_item_down
{display: block;}
</style>