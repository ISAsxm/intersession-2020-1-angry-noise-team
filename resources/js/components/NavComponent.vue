<style>
.navbar {
    background:rgba(0,0,0,0.4)
}

.navbar-nav .nav-link {
    transition:0.3s;
}

.navbar-nav .nav-link:hover {
color:#35c8c1!important;
transition:0.3s;
}

.nav-link {
font-size:18px;
font-family: 'Manrope', sans-serif;
margin: 0 0 10px 0;
}
</style>

<template>
<nav class="navbar navbar-expand-md navbar-light py-3">
    <div class="container">
        <div class="col-lg-12 d-inline-flex">
        <a href="#" class="navbar-brand">
            <img :src="'images/logo.png'" height="28" alt="CodeLaïkaLogo">
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ml-auto">
                <a href="#header" class="nav-item nav-link active text-light">Accueil</a>
                <a href="#aboutus" class="nav-item nav-link text-light">A propos</a>
                <a href="#tool" class="nav-item nav-link text-light">Analyser</a>
                <a href="#funding" class="nav-item nav-link text-light">Donations</a>
            </div>
        </div>
    </div>
    </div>
</nav>

</template>

<script>

export default {
    name: 'nav-component'
}
</script>
