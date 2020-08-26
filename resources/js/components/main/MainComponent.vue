<style>
.stylemain {
  width:100%;
}
.mainBody {
  background-color:white;
  min-height:400px;
}
</style>
<template>
<main>
  <img class="stylemain" :src="'images/stylemain.png'">
  <div class="container-fluid mainBody">
    <section id="resume">
      <div class="col-lg-12">
        <h2 class="text-light">Présentation de Code Laïka</h2>
      </div>
    </section>
    <section id="funding">
      <h2 class="text-light">Go Funding</h2>
    </section>
    <section id="tool">
      <h2 class="text-light">Tool</h2>
    </section>
  </div>
</main>

</template>

<script>

export default {
    name: 'main-component'
}
</script>
