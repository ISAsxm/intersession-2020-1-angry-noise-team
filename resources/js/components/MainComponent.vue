<style>
.stylemain {
  width: 100%;
}
#content {
  background: white;
  padding: 2%;
}

.text {
  font-weight: 400;
  color: #303e8c;
  text-align: justify;
  text-align-last: left;
  font-size: 15px;
}
.wrapper input[type="text"] {
  position: relative;
}

.add-on {
  padding: 0 10px 0 0;
}

.input-prepend {
  border-radius: 10px;
  border: 1px solid #222a59;
  padding: 6px 15px;
  margin-bottom: 1rem;
  max-width: 380px;
  background-color: white;
  color: #191f40;
}

.divider {
  position: absolute;
  left: 40%;
  top: 10%;
  bottom: 10%;
  border-left: 1px solid #222a59;
  opacity: 0.5;
}
button,
.btn-primary {
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

button,
.btn-primary:hover {
  background-color: transparent;
  border: 2px solid #36d9c8;
  color: #36d9c8;
}

.btn-outline-success {
  color: #222a59;
  border-color: #222a59;
  -webkit-transition: all 0.3s ease-out 0s;
  -moz-transition: all 0.3s ease-out 0s;
  -ms-transition: all 0.3s ease-out 0s;
  -o-transition: all 0.3s ease-out 0s;
  transition: all 0.3s ease-out 0s;
}

.btn-outline-success:hover {
  color: white;
  background-color: #222a59;
  border-color: transparent;
  -webkit-transition: all 0.3s ease-out 0s;
  -moz-transition: all 0.3s ease-out 0s;
  -ms-transition: all 0.3s ease-out 0s;
  -o-transition: all 0.3s ease-out 0s;
  transition: all 0.3s ease-out 0s;
}

b,
a {
  color: #36d9c8;
  transition: 0.2s;
}

a:hover {
  color: #ebebf2;
  transition: 0.2s;
  text-decoration: none;
}

section {
  min-height: 50vh;
}

.statut {
  font-weight: 700;
}

span {
  display: inline-block;
  text-align: justify;
}

#return-to-top {
  position: fixed;
  bottom: 3%;
  right: 2%;
  background: rgb(0, 0, 0);
  background: rgba(0, 0, 0, 0.7);
  width: 50px;
  height: 50px;
  display: block;
  text-decoration: none;
  -webkit-border-radius: 35px;
  -moz-border-radius: 35px;
  border-radius: 35px;
  -webkit-transition: all 0.3s linear;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  color: white;
}
#return-to-top i {
  color: #fff;
  margin: 0;
  position: relative;
  left: 16px;
  top: 13px;
  font-size: 19px;
  -webkit-transition: all 0.3s ease;
  -moz-transition: all 0.3s ease;
  -ms-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
}
#return-to-top:hover {
  background: rgba(0, 0, 0, 0.9);
}
#return-to-top:hover i {
  color: #fff;
  top: 5px;
}

.fa-chevron-up {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  font-size:20px;
}
</style>
<template>
  <main>
    <span class="fa-stack fa-2x">
      <a href="#app" id="return-to-top">
        <i class="fas fa-chevron-up"></i>
      </a>
    </span>
    <img class="stylemain" :src="'images/stylemain.png'" />
    <div id="content">
      <div class="container mainBody">
        <aboutus-component></aboutus-component>
        <jumbotron :url-action="urlAction" :url-img="urlImg" :hash-value="hashValue"></jumbotron>
        <tool-component></tool-component>
      </div>
    </div>
    <img class="stylemain" :src="'images/stylemainbottom.png'" />
  </main>
</template>

<script>
import Jumbotron from "./JumbotronComponent";
export default {
  name: "main-component",
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
    Jumbotron
  }
};
</script>
