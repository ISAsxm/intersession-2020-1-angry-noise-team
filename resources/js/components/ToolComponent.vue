<style>
#commentTool span .fa-check,
#commentTool span .fa-times,
#commentTool span .fa-info-circle {
  float: inline-start;
  margin-right: 1rem;
  width: 20px;
}
#commentTool{
  display: flex;
  flex-direction: column;
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

  #input-repo{
    position: relative;
    min-height: 300px;
    border: 1px solid #222a59;
    padding: 2rem;
    margin-bottom: 15px;
    border-radius: 15px;
    display: flex;
    justify-content: space-between;
  }
.divider-input {
  bottom: 10%;
  border-left: 1px solid #222a59;
  opacity: 0.5;
}
</style>

<template>
  <section id="tool">
    <div class="col-lg-12">
      <h3 class="py-4">Analyser votre code</h3>
      <h4 class="title-form">1.- Entrez l'url de votre repo Github ou votre identifiant Github :</h4>
      <form class="text-left">
        <div v-show="isError" id="alert-container" class="alert alert-danger alert-dismissible fade show" role="alert">
          {{error}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div  id="input-repo" class="row">
          <div class="col-5">
            <div class="input-prepend sucess">
              <span class="add-on">
                <i class="fab fa-github"></i>
              </span>
              <input v-model="repoUrl" class="span2" name="repoUrl" type="url" placeholder="https://github.com/codelaika/codelaika"/>
            </div>
            <button @click="cloneRepo" type="button" class="btn btn-outline-success my-4">Récuperer le dépot</button>
          </div>
          <div class="divider-input"></div>
          <div  class="col-5">
            <div class="input-prepend sucess">
          <span class="add-on">
            <i class="fab fa-github"></i>
          </span>
              <input v-model="user" class="span2" name="user" type="url" placeholder="Mangata-Dev"/>
            </div>
            <button @click="userRepositories" type="button" class="btn btn-outline-success my-4">Afficher mes dépots</button>
            <select name="repo" @change="" class="form-control" v-model='repoUrl' id="">
              <option v-for="repo in repositories" v-bind:value="repo.url">
                {{ repo.name }}
              </option>
            </select>
            <button @click="cloneRepo" type="button" class="btn btn-outline-success my-4">Récuperer le dépot</button>
          </div>
        </div>
        <h4 class="title-form">2.- Autorisez une connexion depuis un compte Github</h4>
        <h4 class="title-form">3.- Votre repo devrait être scanné dans dans quelques minutes. Suivez l'avancée de l'analyse ci-dessous :</h4>
        <div id="analyseTool" class="mb-3">
          <div class="row">
            <div class="col-lg-5 text-center">
              <h5 class="statut">Statut en cours :</h5>
              <h6><span class="py-2"><span  v-show="load" ><i class="fas fa-spinner fa-pulse"></i></span>{{waitingMsg}}</span></h6>
            </div>
            <div class="divider"></div>
            <div id="commentTool" class="col-lg-7 text-center p-4">
              <span v-for="state in statusHistory" class="sucess py-2">
                <span v-if="state.statusRequest === true" ><i class="fas fa-check fa-2x"></i></span>
                <span v-else-if="state.statusRequest === false" ><i class="fas fa-times fa-2x"></i></span>
                <span v-else><i class="fas fa-info-circle fa-2x"></i></span>
                {{state.label}}
              </span>
            </div>
          </div>
        </div>
        <h4 class="title-form">4.- Recevez les détails de votre analyse en indiquant votre adresse email :</h4>
        <div class="input-prepend">
          <span class="add-on">
            <i class="fas fa-at"></i>
          </span>
          <input v-model="email" class="span2" name="email" type="email" placeholder="codelaika@codelaika.fr"/>
        </div>
        <button @click="sendReport" type="button" class="btn btn-outline-success my-4">Envoyer les résultats</button>
      </form>
    </div>
  </section>
</template>


<script>
  import axios from 'axios';
  export default {
    name: "Tool-Component",
    data (){
      return{
        isResults:false,
        results:'',
        waitingMsg :'En attente d\'informations...',
        repoUrl:'',
        user:'',
        userType:'user',
        repositories : [],
        selectedRepo : '',
        reportStatus:'',
        onload:false,
        statusHistory : [],
        email : '',
        isError:false,
        error:''
      }
    },
    props:{
      csrf:{
        type:String,
        required:true
      }
    },
    methods: {
      setProgress(state,status){
        this.waitingMsg =state;
        this.statusHistory.push({'label':this.waitingMsg,'statusRequest': status});
      },
      reset(){
        if(this.statusHistory.length >0 ){
          this.statusHistory=[]
        }
      },
      userRepositories(){
        axios
          .post('/getRepos',{'user':this.user,'type':this.userType})
          .then((response)=>{
            this.repositories = response.data;
            this.repoUrl = this.repositories[0].url;
          })
          .catch((error)=>{
            this.$alert('Attention utilisasteur GitHub non trouvé!','Pas de chance','error');
          })
      },
      cloneRepo(){
        if(this.repoUrl == ''){
          this.$alert('Veuillez entrée un url de dépot GitHub valide.','Hey!','error')
        }
        this.reset();
        this.onload=true;
        this.setProgress("Récupération du dépot...",'infos');
        axios
          .post('/cloneRepo',{'repoUrl':this.repoUrl})
          .then((response)=>{
              if(response.status === 200){
                this.setProgress("Dépot récupéré !",true);
                this.getReport();
              }else{
                this.setProgress("Dépot non trouvé",false);
                this.onload=false;
              }
          })
          .catch((error)=>{
              this.setProgress("Dépot non trouvé ou ne contient pas de fichier php",false);
              this.onload=false;
          })
      },
      getReport(){
        this.onload=true;
        this.setProgress("Analyse en cours...",'infos');
        axios
          .post('/parse',{'repoUrl':this.repoUrl})
          .then( (response)=>{
            this.results = JSON.stringify(response.data);
            this.reportStatus = response.status;
            this.setProgress("Rapport créé !",true);
            this.onload=false;
            this.isResults=true;
          })
          .catch((error)=>{
            this.onload=false;
            this.setProgress("Erreur d'analyse",false);
          });
      },
      sendReport(){
        this.onload=true;
        this.setProgress("Envoie du rapport en cours...",'infos');
        if(this.reportStatus == '200'){
          axios
            .post('/mail',{'reportData':this.results,'_token':this.csrf,'mail':this.email})
            .then((response)=>{
              this.setProgress("Rapport envoyé",true);
              this.waitingMsg="";
              this.onload=false;
            })
            .catch((error)=>{
              this.onload=false;
              this.setProgress("Mailing error",false);
            })
        }
        this.reset();
        this.results = '';
      }
    },
    computed:{
      load(){
        return this.onload;
      }
    }
  }
</script>
