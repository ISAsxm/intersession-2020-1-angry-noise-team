<style>
#commentTool span .fa-check,
#commentTool span .fa-times,
#commentTool span .fa-info-circle {
  float: inline-start;
  margin-right: 1rem;
  width: 20px;
}
.fa-check {
  color: green;
}

.fa-times {
  color: darkred;
}

.fa-info-circle {
  color: gray;
}

input {
  font-family: "Manrope", sans-serif;
  border: none;
  background: none;
  color: #222a59;
  width:85%;
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
</style>

<template>
  <section id="tool">
    <div class="col-lg-12">
      <h3 class="py-4">Analyser votre code</h3>
      <h4 class="title-form">1.- Entrez l'url de votre repo Github :</h4>
      <form class="text-left">
        <div class="input-prepend">
          <span class="add-on">
            <i class="fab fa-github"></i>
          </span>
          <input
            class="span2"
            name="repoUrl"
            type="url"
            placeholder="https://github.com/codelaika/codelaika"
          />
        </div>

        <h4 class="title-form">2.- Autorisez une connexion depuis un compte Github</h4>
        <h4
          class="title-form"
        >3.- Votre repo devrait être scanné dans dans quelques minutes. Suivez l'avancée de l'analyse ci-dessous :</h4>
        <div id="analyseTool" class="mb-3">
          <div class="row">
            <div class="col-lg-5 text-center">
              <h5 class="statut">Statut en cours :</h5>
              <h6>En attente d'informations...</h6>
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
        <h4
          class="title-form"
        >4.- Recevez les détails de votre analyse en indiquant votre adresse email :</h4>
        <div class="input-prepend">
          <span class="add-on">
            <i class="fas fa-at"></i>
          </span>
          <input class="span2" name="email" type="email" placeholder="codelaika@codelaika.fr" />
        </div>
        <button type="button" class="btn btn-outline-success my-4">Envoyer les résultats</button>
      </form>
    </div>
  </section>
</template>