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


<style scoped>

</style>