<style>
#laika {
width: 400px;
height: 400px;
border: 1.5px solid
rgb(59, 89, 152);
border-radius: 100%;
object-fit: cover;
}

#aboutus span {
  color:#35c8c1;
  font-size:12px;
  display:block;
}

#aboutus button:active , #aboutus button:focus{
background-color:#35c8c1;
}
</style>

<template>
  <section id="aboutus">
    <div class="row">
      <div class="col-lg-6">
        <img id="laika" :src="'images/laika.png'"/>
      </div>

      <div class="col-lg-6 text-center align-self-center">
        <h3>Code Laïka</h3>
        <p class="text">
          Code Laïka est un outil vous permettant d'analyser votre code PHP. Grâce à son analyse robuste, votre PHP deviendra une oeuvre d'art en seulement quelques minutes. Plus besoin de recherches <a href="https://stackoverflow.com/" target="_blank">Stackoverflow</a> ou de demander à Fabieng<b>*</b> de vous sauver, vous avez bien mérité cette petite pause, profitez en pour prendre un café <i class="fas fa-coffee"></i>
        </p>
        <p class="text">
          Il suffit pour cela d'indiquer l'URL de votre repo puis de patienter quelques minutes. Une fois l'analyse terminée vous pouvez recevoir les résultats en indiquant votre adresse email.
        </p>
        <span class="pb-3">*Fabieng : A remplacer par le nom de votre supérieur</span>
        <button type="button" class="btn btn-primary my-2"><a href="#tool">Découvrir</a></button>
      </div>
    </div>
  </section>
</template>