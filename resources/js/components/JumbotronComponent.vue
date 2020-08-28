<style>

#formDonation {
  visibility: visible;
}

button,
.btn-secondary {
  background-color: #222a59;
  display: inline-block;
  font-weight: 700;
  text-align: center;
  white-space: nowrap;
  vertical-align: middle;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
  border: 2px solid transparent;
  padding: 6px 62px;
  font-size: 14px;
  line-height: 46px;
  color: white;
  cursor: pointer;
  z-index: 5;
  border: 2px solid white;
  border-radius: 10px;
  -webkit-transition: all 0.3s ease-out 0s;
  -moz-transition: all 0.3s ease-out 0s;
  -ms-transition: all 0.3s ease-out 0s;
  -o-transition: all 0.3s ease-out 0s;
  transition: all 0.3s ease-out 0s;
  position: relative;
  text-transform: uppercase;
  border: 2px solid #222a59;

}

.btn-secondary {
background-color:
transparent;
border: 2px solid
#36d9c8;
color:
#36d9c8;
}

.btn-secondary:hover {
background-color:
#222a59;
border: 2px solid
#222a59;
color:
white;
}

.lead {
  color:#222a59;
}
</style>

<template>
  <section id="funding">
    <div class="jumbotron">
      <h3>Go Funding</h3>
      <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
      <hr class="my-4" />
      <p class="lead">
        <div v-show=show>
        <donation :url-action="urlAction" :url-img="urlImg" :hash-value="hashValue"></donation>
        </div>
        <button class="btn btn-secondary" type="button" @click="formDonation" >Donation</button></p>
    </div>
  </section>
</template>

<script>
import Donation from "./DonationComponent";
export default {
  name: "Jumbotron",
  data() {
    return {
      show:false
    }
  },
  methods: {
    formDonation(){
      let form=document.getElementById('formDonation');
      form.submit();
    }
  },
  props: {
    urlAction: {
      type: String,
      required: true
    },
    urlImg: {
      type: String,
      required: true
    },
    hashValue: {
      type: String,
      required: true
    }
  },
  components: {
    Donation
  }
};
</script>

<style scoped>
</style>