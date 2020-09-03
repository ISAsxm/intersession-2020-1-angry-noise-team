<template>
    <div class="jumbotron">
        <h1 class="display-4">Test</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p class="lead">
            <input class="form-control" v-model.trim="repoUrl" type="text">
            <div>{{ repoUrl }}</div>
            <input class="btn btn-primary" type="button" @click="getRepositories()" value="Fetch repo">
            <input class="btn btn-primary" type="button" @click="getResults()" value="Test me">
        <div>
            <select v-model="selectedRepo" class="form-control" name="repositories" id="repositories">
                <option v-for="repo in repositories" v-bind:value="repo.value">
                    {{ repo.text }}
                </option>
            </select>
        </div>
        <p class="sucess">{{waitingMsg}}</p>
        <div class="progress">
            <div id="progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" :aria-valuenow=progressValue aria-valuemin="0" aria-valuemax="100" :style=progressWidth ></div>
        </div>

        <div v-show="isResults" id="results-container">
            {{results}}
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "AxiosComponent",
        data (){
            return{
                isResults:false,
                results:'',
                waitingMsg :'',
                progressWidth : "width: "+0+"%",
                progressValue : 0,
                repoUrl:'',
                repositories : [],
                selectedRepo : ''
            }
        },
        methods: {
            changeColor (colorClass){
              let progressBar =document.getElementById('progress');
              progressBar.classList.add(colorClass);
            },
            setProgress(percentage){
                this.progressValue = percentage;
                this.progressWidth ="width: "+percentage+"%";
            },
            getResults(){
                this.waitingMsg ="Analyse en cours...";
                this.setProgress(33);
                axios
                    .post('/test',{'repoUrl':this.repoUrl})
                    .then(response => (
                        this.results = response.data,
                        this.waitingMsg="Résultats reçus",
                        this.setProgress(66),
                        this.isResults=true,
                        this.sendReport(this.results,response.status)
                    ))
                    .catch(error =>(console.log(error),this.waitingMsg='Analysis error',this.changeColor('bg-danger')))
            },
            sendReport(report,status){
                this.waitingMsg="Envoie du rapport en cours...";
                if(status == '200'){
                    axios
                        .post('/mail')
                        .then(response =>
                            (   this.results= response.data,
                                this.setProgress(100),
                                this.changeColor('bg-success'),
                                this.waitingMsg=''))
                        .catch(error =>( console.log(error),this.waitingMsg='mailing error',this.changeColor('bg-danger')))
                }
            },
            getRepositories(){

                // axios
                //     .get('http://localhost:8000/test')
                //     .then(response=>(this.repositories = response))
                this.repositories = [
                    {text:'repos1',value:'repos1'},
                    {text:'repos2',value:'repos2'},
                    {text:'repos3',value:'repos3'},
                    {text:'repos4',value:'repos4'}
                ];
                this.selectedRepo=this.repositories[0].text;
            }
        },
        computed:{

        }
    }
</script>

<style scoped>

</style>