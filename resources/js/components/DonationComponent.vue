<template>
    <div>
        <form :action=urlAction method="post" target="_top">
            <input type="hidden" name="cmd" value="_s-xclick" />
            <input type="hidden" name="hosted_button_id" :value=hashValue />
            <input type="image" src="https://www.paypalobjects.com/fr_FR/FR/i/btn/btn_donateCC_LG.gif" border="0" name="submit" title="PayPal - The safer, easier way to pay online!" alt="Bouton Faites un don avec PayPal" />
            <img alt="" border="0" :src=urlImg width="1" height="1" />
        </form>
    </div>
</template>

<script>
    export default {
        name: "Donation",
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
        }
    }
</script>

<style scoped>

</style>