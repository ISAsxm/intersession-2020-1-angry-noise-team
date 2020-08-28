<style>
.stylemain {
  width: 100%;
}
#content {
  background: linear-gradient(to bottom, white, rgb(243, 243, 247));
  padding: 4%;
}

.title {
  font-weight: 600;
  font-size: 35px !important;
  text-align: left;
  text-transform: uppercase;
  color: #222a59;
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

input {
  font-family: "Manrope", sans-serif;
  border: none;
  background: none;
  color: #222a59;
}

.wrapper:before {
  font-family: "FontAwesome";
  color: red;
  position: relative;
  left: -5px;
  content: "\f007";
}

.title-form {
  text-align: left;
  font-weight: 500;
  font-size: 16px;
  padding-bottom: 0.8rem;
}

#analyseTool {
  min-height: 300px;
  border: 1px solid #222a59;
  padding: 2rem;
  border-radius: 15px;
  position: relative;
  background-color: white;
}

.add-on {
  padding: 0 10px 0 0;
}

.input-prepend {
  border-radius: 10px;
  padding: 6px 15px;
  margin-bottom: 1rem;
  max-width: 280px;
  background-color: white;
  color: #191f40;
}

.divider {
  position: absolute;
  left: 40%;
  top: 10%;
  bottom: 10%;
  border-left: 1px solid #36d9c8;
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
  -webkit-transition: all 0.4s ease-out 0s;
  -moz-transition: all 0.4s ease-out 0s;
  -ms-transition: all 0.4s ease-out 0s;
  -o-transition: all 0.4s ease-out 0s;
  transition: all 0.4s ease-out 0s;
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
  color: #36d9c8;
  border-color: #36d9c8;
  -webkit-transition: all 0.4s ease-out 0s;
  -moz-transition: all 0.4s ease-out 0s;
  -ms-transition: all 0.4s ease-out 0s;
  -o-transition: all 0.4s ease-out 0s;
  transition: all 0.4s ease-out 0s;
}

.btn-outline-success:hover {
  color: white;
  background-color: #222a59;
  border-color: transparent;
  -webkit-transition: all 0.4s ease-out 0s;
  -moz-transition: all 0.4s ease-out 0s;
  -ms-transition: all 0.4s ease-out 0s;
  -o-transition: all 0.4s ease-out 0s;
  transition: all 0.4s ease-out 0s;
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

h4 {
  color: #222a59;
}

section {
  margin-bottom: 10rem;
}

.statut {
  font-weight: 700;
}

h5 {
  font-weight: 300;
  font-size: 14px;
  text-transform: initial;
}

span {
  display: inline-block;
  text-align: justify;
}

#commentTool span .fa-check,
#commentTool span .fa-times,
#commentTool span .fa-info-circle {
  float: inline-start;
  margin-right:1rem;
  width:20px;
}
.fa-check {
  color:green;
}

.fa-times {
  color:darkred;
}

.fa-info-circle {
  color:gray;
}

</style>
<template>
  <main>
    <img class="stylemain" :src="'images/stylemain.png'" />
    <div id="content">
      <div class="container mainBody">
        <section id="resume">
          <div class="row">
            <div class="col-lg-7">
              <img src="https://via.placeholder.com/630x390" />
            </div>
            <div class="col-lg-5 text-center">
              <h2 class="title">Code Laïka</h2>
              <p class="text">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur leo enim, vestibulum condimentum ligula et, hendrerit iaculis nulla. Proin ut elementum tellus. Sed eu elit eget massa aliquet mattis.
                <a
                  href="#"
                >Phasellus nec arcu accumsan</a>, bibendum sapien volutpat, finibus leo. Aliquam quis maximus libero. Morbi imperdiet scelerisque aliquet. In eget tincidunt erat, eget semper nisl. Nulla condimentum hendrerit neque. Etiam aliquet elit a dui bibendum, eu tempus magna scelerisque. Aliquam neque dui, pharetra a mauris a, mattis faucibus velit.
              </p>
              <button type="button" class="btn btn-primary my-2">Découvrir</button>
            </div>
          </div>
        </section>

        <section id="funding">
          <h2 class="title">Go Funding</h2>
        </section>

        <section id="tool">
          <div class="col-lg-12">
            <h2 class="py-4 title">Analyser votre code</h2>
            <h3 class="title-form">1.- Entrez votre nom de compte Github :</h3>
            <form class="text-left">
              <div class="input-prepend">
                <span class="add-on">
                  <i class="fab fa-github"></i>
                </span>
                <input class="span2" type="text" placeholder="Votre Github..." />
              </div>

              <h3 class="title-form">2.- Autorisez une connexion depuis un compte Github</h3>
              <h3
                class="title-form"
              >3.- Votre repo devrait être scanné dans dans quelques minutes. Suivez l'avancée de l'analyse ci-dessous :</h3>
              <div id="analyseTool" class="mb-3">
                <div class="row">
                  <div class="col-lg-5 text-center title">
                    <h4 class="statut">Statut en cours :</h4>
                    <h5>En attente d'informations...</h5>
                  </div>
                  <div class="divider"></div>
                  <div id="commentTool" class="col-lg-7 text-center p-4">
                    <span class="sucess py-2">
                      <i class="fas fa-check fa-2x"></i>Sed nec erat leo. Pellentesque efficitur ante vitae risus mattis, ac porta dui accumsan. Vivamus dolor nisi, tristique accumsan lorem id.
                    </span>
                    <span class="error py-2">
                      <i class="fas fa-times fa-2x"></i>Vivamus nisl lorem, egestas id diam vel, hendrerit vestibulum justo. Maecenas sit amet felis aliquam, tristique enim eget, eleifend enim.
                    </span>
                    <span class="info py-2">
                      <i class="fas fa-info-circle fa-2x"></i> Nulla nec leo eleifend, placerat felis non, ultricies urna. Nulla rhoncus ante elementum, volutpat libero eu, fringilla metus.
                    </span>
                  </div>
                </div>
              </div>
              <h3
                class="title-form"
              >4.- Recevez les détails de votre analyse en indiquant votre adresse email :</h3>
              <div class="input-prepend">
                <span class="add-on">
                  <i class="fas fa-at"></i>
                </span>
                <input class="span2" type="text" placeholder="Votre adresse email..." />
              </div>
              <button type="button" class="btn btn-outline-success my-4">Envoyer les résultats</button>
            </form>
          </div>
        </section>
      </div>
    </div>
  </main>
</template>

<script>
export default {
  name: "main-component"
};
</script>
