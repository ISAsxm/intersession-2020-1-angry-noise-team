<style>
#laika {
width: 400px;
height: 400px;
border: 1.5px solid
rgb(59, 89, 152);
border-radius: 100%;
object-fit: cover;
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
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo enim, vestibulum condimentum ligula et, hendrerit iaculis nulla. Proin ut elementum tellus. Sed eu elit eget massa aliquet mattis.
          <a href="#">Phasellus nec arcu accumsan</a>, bibendum sapien volutpat, finibus leo. Aliquam quis maximus libero. Morbi imperdiet scelerisque aliquet. In eget tincidunt erat, eget semper nisl. Nulla condimentum hendrerit neque. Etiam aliquet elit a dui bibendum, eu tempus magna scelerisque. Aliquam neque dui, pharetra a mauris a, mattis faucibus velit.
        </p>
        <button type="button" class="btn btn-primary my-2">Découvrir</button>
      </div>
    </div>
  </section>
</template>