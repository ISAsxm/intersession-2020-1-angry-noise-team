<template>
    <div class="jumbotron">
        <h1 class="display-4">Go fundings</h1>
        <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
        <hr class="my-4">
        <p class="lead">
            <donation :url-action=urlAction :url-img=urlImg :hash-value=hashValue></donation>
        </p>
    </div>
</template>

<script>
    import Donation from './DonationComponent'
    export default {
        name: "Jumbotron",
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
        components:{
            Donation
        }
    }
</script>

<style scoped>

</style>