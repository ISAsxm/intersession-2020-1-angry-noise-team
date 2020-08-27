<style>
.stylemain {
  width: 100%;
}
.mainBody {
  background-color: white;
  min-height: 400px;
}
</style>
<template>
  <main>
    <img class="stylemain" :src="'images/stylemain.png'" />
    <div class="container-fluid mainBody">
      <section id="resume">
        <div class="row">
          <div class="col"><p>img</p></div>
          <div class="col">
            <h2 class="text-light">Présentation de Code Laïka</h2>
          </div>
        </div>
      </section>
      <section id="funding">
        <jumbotron :url-action=urlAction :url-img=urlImg :hash-value=hashValue></jumbotron>
      </section>
      <section id="tool">
        <h2 class="text-light">Tool</h2>
      </section>
      <section>

      </section>
    </div>
  </main>
</template>

<script>
  import Jumbotron from './JumbotronComponent'
export default {
  name: "main-component",
  props:{
    urlAction : {
      type:String,
      required:true
    },
    urlImg : {
      type:String,
      required:true
    },
    hashValue:{
      type:String,
      required:true
    }
  },
  components: {
    Jumbotron
  }
};
</script>
