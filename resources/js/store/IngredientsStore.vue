<script>
    export default {
        state:{
            ingredients: [],
            selectedMeal: { ingredients: [], meal: [] },
            checkedIngredients: [],
            addIngredientButton: "Toevoegen",
            status: "Ingredienten laden ..."
        },
        mutations: {
            getIngredients(state, {apiToken, mealId, appUrl}){
                axios
                    .get(appUrl + '/api/ingredients?api_token=' + apiToken)
                    .then(response => { state.ingredients = response.data;
                        if(state.status === "Ingredienten laden ..."){
                            state.status = null;
                        }
                        if(state.ingredients.length === 0){
                            state.status = "Nog geen ingredienten toegevoegd! <br><br> " +
                                "<a href='ingredients/add'>" +
                                "Dit kan je hier direct doen.<br>" +
                                "</a>" +
                                "Maar later is ook geen probleem.";
                        }
                        if(mealId){
                            axios
                                .get(appUrl + '/api/meals/' + mealId + '?api_token=' + apiToken)
                                .then(response => { state.selectedMeal = response.data
                                })
                                .then(() => {
                                    if (state.selectedMeal.ingredients) {
                                            for (var i = 0; i < state.ingredients.length; i++) {
                                                let found = state.selectedMeal.ingredients.find(el => el.id === state.ingredients[i].id);
                                                if (found) {
                                                    state.checkedIngredients.push(found.id);
                                                }
                                            }
                                        }
                                    }
                                )
                                .catch(error => {
                                    state.status = "Fout in ophalen recept!";
                                })
                        }
                    })
                    .catch(error => {
                        console.log(error)
                        state.status = "Fout in ophalen ingredienten!";
                    })
            },
            addToSelectedIngredients(state, { ingredientId }){
                state.checkedIngredients.push(ingredientId);
            },
            deleteFromSelectedIngredients(state, { ingredientId }){
                let index = state.checkedIngredients.indexOf(ingredientId);
                if (index > -1) {
                    state.checkedIngredients.splice(index, 1);
                }
            },
            updateIngredientAmount(state, { amount, ingredientId }){
                if(state.selectedMeal.ingredients &&
                    state.selectedMeal.ingredients.find(o => o.id === ingredientId)){
                    state.selectedMeal.ingredients.find(o => o.id === ingredientId).pivot.amount = amount;
                }
                else{
                    let object = {
                        id: ingredientId,
                        pivot: {
                            amount: amount
                        }
                    }
                    state.selectedMeal.ingredients.push(object);
                }
            },
            addIngredient(state, { apiToken, name }){
                let appUrl = process.env.MIX_APP_URL;
                axios.post('/api/ingredients/?api_token=' + apiToken, {
                    name: name,
                })
                    .then(function (response) {
                        if(response.status === 200 || response.status === 201) {
                            state.addIngredientButton = name + ' is toegevoegd!'
                            // console.log(response);
                            state.ingredients.push(response.data);
                        }
                    })
                    .catch(function (error) {
                        if(error.response.status === 200) {
                            state.addIngredientButton = 'Niet toegevoegd'
                        }
                        if(error.response.status === 400){
                            // console.log(error.response.data.name[0]);
                            state.addIngredientButton = error.response.data.name[0]
                        }
                        else{
                            state.addIngredientButton = 'Onbekende fout';
                            // console.log(error.response.status)
                        }
                    });
            }
        },
        actions: {
            initIngredients({commit}, {apiToken, mealId, appUrl}) {
                commit('getIngredients', { apiToken, mealId, appUrl });
            },
            changeIngredientStatus({commit}, { action, ingredientId }){
                if(action === 'add'){
                    commit('addToSelectedIngredients', { ingredientId } );
                }
                if(action === 'delete'){
                    commit('deleteFromSelectedIngredients', { ingredientId} );
                }
            },
            updateIngredientAmount({commit}, { amount, ingredientId }){
                commit('updateIngredientAmount', { amount, ingredientId });
            },
            addIngredient({commit}, { apiToken, name }){
                commit('addIngredient', { apiToken, name })
            }
        },
    }
</script>
