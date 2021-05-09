<template>
    <div v-click-outside="deleteSearch">
        <input v-model="search" placeholder="Zoek ingredient" class="form-control"/>
<!--        <AddIngredientButtonComponent-->
<!--            class="btn btn-primary col-md-12 mt-2"-->
<!--            :input="this.search"-->
<!--            :api-token="this.apiToken"/>-->
        <div class="pt-3">
            <strong
                v-if="status"
                v-html="status">
                    {{status}}
            </strong>
        </div>
        <ul>
            <li v-for="availableingredients in results"
                v-bind:id="availableingredients.id"
                :class="{ 'active' : isActive(availableingredients.id)}">
                <input type="text"
                       placeholder="Aantal"
                       v-bind:name="'ingredientsamount['+availableingredients.id+']'"
                       v-on:input="updateIngredientAmount($event, availableingredients.id)"
                       v-bind:value="getAmount(availableingredients.id)"
                >
                <label>{{availableingredients.name}}
                    <input type="checkbox"
                           :checked="isActive(availableingredients.id)"
                           v-bind:value="availableingredients.id"
                           v-bind:name="'ingredients['+availableingredients.id+']'"
                           v-on:click="changeIngredientStatus(availableingredients.id)"
                    >
                </label>
            </li>
        </ul>
    </div>
</template>

<script>
    import AddIngredientButtonComponent from "./AddIngredientButtonComponent";
    export default {
        components: {
            AddIngredientButtonComponent
        },
        props: ['apiToken', 'mealId', 'appUrl'],
        methods:{
            getAmount(id){
              if(this.choosenIngredients &&
                  this.choosenIngredients.find(o => o.id === id)) {
                  return this.choosenIngredients.find(o => o.id === id).pivot.amount;
              }
            },
            deleteSearch(timeout = 0){
                var self = this;
                setTimeout(function(){
                    self.search = '';
                }.bind(self), timeout);
            },
            isActive(id){
                if(this.checkedIngredient.includes(id)){
                    return true;
                }
                else{
                    return false;
                }
            },
            changeIngredientStatus(id){
                if(this.checkedIngredient.includes(id)){
                    this.$store.dispatch('changeIngredientStatus', {
                        ingredientId: id,
                        action: 'delete',
                    });
                }
                else{
                    this.$store.dispatch('changeIngredientStatus', {
                        ingredientId: id,
                        action: 'add',
                    });
                }
            },
            updateIngredientAmount(event, ingredientId){
                this.$store.dispatch('updateIngredientAmount', {
                amount: event.target.value,
                ingredientId: ingredientId
                });
            }
        },
        data(){
            return{
                search: '',
            }
        },
        computed: {
            availableIngredients() {
                return this.$store.state.ingredients;
            },
            status() {
                return this.$store.state.status;
            },
            choosenIngredients() {
                return this.$store.state.selectedMeal.ingredients;
            },
            checkedIngredient() {
                return this.$store.state.checkedIngredients;
            },
            results() {
                return this.availableIngredients ? this.availableIngredients.filter
                (result => result.name.toLowerCase().includes(this.search.toLowerCase())) : [];
            },
        },
        mounted() {
            this.$store.dispatch('initIngredients', {
                apiToken: this.apiToken,
                mealId: this.mealId,
                appUrl: this.appUrl
            });

            // TODO: make checked ingredients up in list... But do i need to sort client side?
            // if(this.choosenIngredients){
            //     for(var i=0; i < this.choosenIngredients.length; i++){
            //         this.checkedIngredient.push(this.choosenIngredients[i].id);
            //     }
            // }
            // console.log(this.checkedIngredient);
            // this.availableIngredients.sort(function(a, b){
            //     return this.checkedIngredient.id.indexOf(a.id) - this.checkedIngredient.id.indexOf(b.id)
            // })
        }
    }
</script>
