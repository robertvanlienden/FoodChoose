<template>
    <div v-on:click="addIngredient">
        {{ buttonStatus }}
    </div>
</template>

<script>
    export default {
        props: ['input', 'apiToken'],
        computed: {
            buttonStatus(){
                return this.$store.state.addIngredientButton;
            }
        },
        methods: {
            addIngredient(apiToken) {
                this.$store.dispatch('addIngredient', {
                    apiToken: this.apiToken,
                    name: this.input
                })
                // var self = this;
                // axios.post('/ingredients/add?api-token=' + apiToken, {
                //     name: self.input,
                // })
                //     .then(function (response) {
                //         if(response.status === 200) {
                //             self.buttonStatus = self.input + ' toegevoegd!'
                //             console.log(response.data);
                //         }
                //     })
                //     .catch(function (error) {
                //         if(error.response.status === 200) {
                //             self.buttonStatus = 'Niet toegevoegd'
                //         }
                //         else{
                //             self.buttonStatus = 'Onbekende fout';
                //             console.log(error.response.status)
                //         }
                //     });
                //
                // setTimeout(function(){
                //     self.buttonStatus = 'Toevoegen';
                // }.bind(self), 4000);

                },
        }
    }
</script>
