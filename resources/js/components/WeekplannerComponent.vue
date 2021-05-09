<template>
    <div>
        <vue-html2pdf
            :show-layout="false"
            :enable-download="true"
            :preview-modal="false"
            :paginate-elements-by-height="1500"
            filename="weekplanner"
            :pdf-quality="2"
            pdf-format="a4"
            pdf-orientation="landscape"
            @hasStartedGeneration="hasStartedGeneration()"
            ref="html2Pdf"
        >
            <div slot="pdf-content">
                    <div
                        style="min-height: 250px;
                        min-width: 1000px;
                        padding: 50px;">
                        <h2>Weekmenu</h2>
                        <table class="table">
                            <tr>
                                <th>Maandag</th>
                                <th>Dinsdag</th>
                                <th>Woensdag</th>
                                <th>Donderdag</th>
                                <th>Vrijdag</th>
                                <th>Zaterdag</th>
                                <th>Zondag</th>
                            </tr>
                            <tr>
                                <td v-html="this.weekMenu.mon">
                                    {{ this.weekMenu.mon }}
                                </td>
                                <td v-html="this.weekMenu.tue">
                                    {{ this.weekMenu.tue }}
                                </td>
                                <td v-html="this.weekMenu.wed">
                                    {{ this.weekMenu.wed }}
                                </td>
                                <td v-html="this.weekMenu.thu">
                                    {{ this.weekMenu.thu }}
                                </td>
                                <td v-html="this.weekMenu.fri">
                                    {{ this.weekMenu.fri }}
                                </td>
                                <td v-html="this.weekMenu.sat">
                                    {{ this.weekMenu.sat }}
                                </td>
                                <td v-html="this.weekMenu.sun">
                                    {{ this.weekMenu.sun }}
                                </td>
                            </tr>
                            <tr>
                                <td colspan="4">
                                    <sub>Weekmenu via FoodChoose - http://foodchoose.robertvanlienden.nl/</sub>
                                </td>
                            </tr>
                        </table>
            </div>
        </div>
        </vue-html2pdf>
        <div class="row mb-3">
            <button class="ml-2 btn btn-danger" v-on:click="updateDay('all')">
                Nieuw weekmenu samenstellen
            </button>
        </div>
        <div class="table-responsive" style="height: 450px;">
            <table class="table">
                <tr>
                    <th>Maandag</th>
                    <th>Dinsdag</th>
                    <th>Woensdag</th>
                    <th>Donderdag</th>
                    <th>Vrijdag</th>
                    <th>Zaterdag</th>
                    <th>Zondag</th>
                </tr>
                <tr>
                    <td v-html="this.weekMenu.mon.meal_name">
                        {{ this.weekMenu.mon.meal_name }}
                    </td>
                    <td v-html="this.weekMenu.tue.meal_name">
                        {{ this.weekMenu.tue.meal_name }}
                    </td>
                    <td v-html="this.weekMenu.wed.meal_name">
                        {{ this.weekMenu.wed.meal_name }}
                    </td>
                    <td v-html="this.weekMenu.thu.meal_name">
                        {{ this.weekMenu.thu.meal_name }}
                    </td>
                    <td v-html="this.weekMenu.fri.meal_name">
                        {{ this.weekMenu.fri.meal_name }}
                    </td>
                    <td v-html="this.weekMenu.sat.meal_name">
                        {{ this.weekMenu.sat.meal_name }}
                    </td>
                    <td v-html="this.weekMenu.sun.meal_name">
                        {{ this.weekMenu.sun.meal_name }}
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Categorie:</strong>
                    </td>
                    <td>
                        <strong>Categorie:</strong>
                    </td>
                    <td>
                        <strong>Categorie:</strong>
                    </td>
                    <td>
                        <strong>Categorie:</strong>
                    </td>
                    <td>
                        <strong>Categorie:</strong>
                    </td>
                    <td>
                        <strong>Categorie:</strong>
                    </td>
                    <td>
                        <strong>Categorie:</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.categories"
                            :disabled="false"
                            name="category['mon']"
                            v-on:selected="updateCategoryFilter($event, 'mon')"
                            :maxItem="10"
                            placeholder="Filter op categorie">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.categories"
                            :disabled="false"
                            name="category['tue']"
                            :maxItem="10"
                            v-on:selected="updateCategoryFilter($event, 'tue')"
                            placeholder="Filter op categorie">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.categories"
                            :disabled="false"
                            name="category['wed']"
                            :maxItem="10"
                            v-on:selected="updateCategoryFilter($event, 'wed')"
                            placeholder="Filter op categorie">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.categories"
                            :disabled="false"
                            name="category['thu']"
                            v-on:selected="updateCategoryFilter($event, 'thu')"
                            :maxItem="10"
                            placeholder="Filter op categorie">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.categories"
                            :disabled="false"
                            name="category['fri']"
                            :maxItem="10"
                            v-on:selected="updateCategoryFilter($event, 'fri')"
                            placeholder="Filter op categorie">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.categories"
                            :disabled="false"
                            name="category['sat']"
                            :maxItem="10"
                            v-on:selected="updateCategoryFilter($event, 'sat')"
                            placeholder="Filter op categorie">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.categories"
                            :disabled="false"
                            name="category['sun']"
                            :maxItem="10"
                            v-on:selected="updateCategoryFilter($event, 'sun')"
                            placeholder="Filter op categorie">
                        </Dropdown>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong>Maaltijd selecteren</strong>
                    </td>
                    <td>
                        <strong>Maaltijd selecteren</strong>
                    </td>
                    <td>
                        <strong>Maaltijd selecteren</strong>
                    </td>
                    <td>
                        <strong>Maaltijd selecteren</strong>
                    </td>
                    <td>
                        <strong>Maaltijd selecteren</strong>
                    </td>
                    <td>
                        <strong>Maaltijd selecteren</strong>
                    </td>
                    <td>
                        <strong>Maaltijd selecteren</strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.meals"
                            :disabled="false"
                            name="meal['mon']"
                            :maxItem="10"
                            v-on:selected="updateMeal($event, 'mon')"
                            placeholder="Zoek maaltijd">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.meals"
                            :disabled="false"
                            name="meal['tue']"
                            :maxItem="10"
                            v-on:selected="updateMeal($event, 'tue')"
                            placeholder="Zoek maaltijd">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.meals"
                            :disabled="false"
                            name="meal['wed']"
                            :maxItem="10"
                            v-on:selected="updateMeal($event, 'wed')"
                            placeholder="Zoek maaltijd">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.meals"
                            :disabled="false"
                            name="meal['thu']"
                            :maxItem="10"
                            v-on:selected="updateMeal($event, 'thu')"
                            placeholder="Zoek maaltijd">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.meals"
                            :disabled="false"
                            name="meal['fri']"
                            :maxItem="10"
                            v-on:selected="updateMeal($event, 'fri')"
                            placeholder="Zoek maaltijd">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.meals"
                            :disabled="false"
                            name="meal['sat']"
                            :maxItem="10"
                            v-on:selected="updateMeal($event, 'sat')"
                            placeholder="Zoek maaltijd">
                        </Dropdown>
                    </td>
                    <td>
                        <!--                            v-on:selected="validateSelection"-->
                        <!--                            v-on:filter="getDropdownValues"-->
                        <Dropdown
                            :options="this.meals"
                            :disabled="false"
                            name="meal['sun']"
                            :maxItem="10"
                            v-on:selected="updateMeal($event, 'sun')"
                            placeholder="Zoek maaltijd">
                        </Dropdown>
                    </td>
                </tr>
                <tr>
                    <td>
                        <button class="btn btn-info mt-4" v-on:click="updateDay('mon')">Andere recept!</button>
                    </td>
                    <td>
                        <button class="btn btn-info mt-4" v-on:click="updateDay('tue')">Andere recept!</button>
                    </td>
                    <td>
                        <button class="btn btn-info mt-4" v-on:click="updateDay('wed')">Andere recept!</button>
                    </td>
                    <td>
                        <button class="btn btn-info mt-4" v-on:click="updateDay('thu')">Andere recept!</button>
                    </td>
                    <td>
                        <button class="btn btn-info mt-4" v-on:click="updateDay('fri')">Andere recept!</button>
                    </td>
                    <td>
                        <button class="btn btn-info mt-4" v-on:click="updateDay('sat')">Andere recept!</button>
                    </td>
                    <td>
                        <button class="btn btn-info mt-4" v-on:click="updateDay('sun')">Andere recept!</button>
                    </td>
                </tr>
            </table>
        </div>
        <div class="row mt-5">
            <button class="ml-2 btn btn-success d-none d-md-block"
                    id="downloadPdf"
                    @click="download('pdf')">Download als PDF</button>
            <button class="ml-4 btn btn-success"
                    @click="toggleModal('save-modal', 'open')">Menu opslaan</button>
        </div>
        <div id="save-modal">
            <div class="card">
                <div class="card-header">Weekmenu opslaan
                    <button class="btn btn-danger float-right mr-2"
                         v-on:click="toggleModal('save-modal', 'close')">X</button>
                </div>
                <div class="card-body">
                    <div class="form-group row">
                        <label for="weekmenu_name" class="col-md-4 col-form-label text-md-right">Naam</label>

                        <div class="col-md-6">
                            <input id="weekmenu_name"
                                   type="text"
                                   class="form-control"
                                   name="weekmenu_name"
                                   v-model="menuName"
                                   autofocus>
                        </div>
                    </div>
                    <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button class="btn btn-success form-control"
                                        @click="saveMenu()">
                                    Opslaan
                                </button>
                            </div>
                    </div>
                    <div v-if="this.saveMenuStatus" class="form-group row">
                        <p class="mt-4 col-md-6 offset-md-4">
                            <strong v-html="this.saveMenuStatus"></strong>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import VueHtml2pdf from 'vue-html2pdf'
    import Dropdown from 'vue-simple-search-dropdown'
    export default {
        components: {
            VueHtml2pdf,
            Dropdown
        },
        props: ['apiToken','appUrl'],
        methods:{
            download(format){
                if(format === 'pdf' || format === 'PDF'){
                    let downloadButton = document.getElementById('downloadPdf');
                    downloadButton.innerHTML = "Even geduld... PDF wordt gemaakt..."
                    this.$refs.html2Pdf.generatePdf();
                    setTimeout(() => {
                        var downloadButton = document.getElementById('downloadPdf');
                        downloadButton.innerHTML = "Download als PDF"
                    }, 4000);
                }
            },
            getCategories(){
                let appUrl = this.appUrl;
                axios
                    .get(appUrl + '/api/mealcategories?api_token=' + this.apiToken)
                    .then(response => {
                        for(var i = 0; i < response.data.length; i++)
                        {
                            let obj = { id: response.data[i].id,
                                name: response.data[i].category_name}
                            this.categories.push(obj);
                            // this.categories[i].name = response.data[i].category_name;
                            // this.categories[i].id = response.data[i].id;
                        }

                    })
                    .catch(error => {
                        if(error.response.status === 429){
                            this.categories = [{ id: 1, name: 'Te veel aanvragen! Even geduld.'}];
                        }
                        console.log(error);
                    })
            },
            getRandomMeals(amount = 7, day = 'all'){
                console.log(this.appUrl);
                let appUrl = this.appUrl;

                // todo: clean this categoryfilter mess
                let hasCategoryFilter = false;
                for(var filterDay in this.categoryFilter){
                    if(this.categoryFilter[filterDay]){
                        hasCategoryFilter = true;
                    }
                }

                if(hasCategoryFilter && day !== 'all' && this.categoryFilter[day] && amount === 1){
                        this.filterRandomMeals("category", this.categoryFilter[day])
                            .then(response => {
                                this.weekMenu[day] = response;
                            })
                            .catch(error => {
                                this.weekMenu[day] = error;
                            })
                }

                if(hasCategoryFilter && day === 'all' && amount === 7){
                    var self = this;
                    for(var selectedDay in this.weekMenu){
                        (function(selectedDay, self) {
                            if(self.categoryFilter[selectedDay]){
                                self.filterRandomMeals("category", self.categoryFilter[selectedDay])
                                    .then(response => {
                                        self.weekMenu[selectedDay] = response;
                                    })
                                    .catch(error => {
                                        self.weekMenu[selectedDay] = error;
                                    })
                            }
                            else{
                                axios
                                    .get(appUrl + '/api/tools/random/?api_token=' + self.apiToken)
                                    .then(response => {
                                        self.weekMenu[selectedDay] = response.data
                                    })
                                    .catch(error => {
                                        if(error.response.status === 429){
                                            self.weekMenu[day] = { meal_name: '1 minuut geduld... Te veel verzoeken' };;
                                        }
                                        console.log(error);
                                    })
                            }
                        })(selectedDay, self);
                    }
                }

                if(!hasCategoryFilter && amount === 1 && day !== 'all'){
                    console.log('no categoryfilter day = 1')
                    axios
                        .get(appUrl + '/api/tools/random/?api_token=' + this.apiToken)
                        .then(response => {
                            this.weekMenu[day] = response.data
                        })
                        .catch(error => {
                            if(error.response.status === 429){
                                this.weekMenu[day] = { meal_name: '1 minuut geduld... Te veel verzoeken' };;
                            }
                            console.log(error);
                        })
                }

                if(!hasCategoryFilter && day === 'all' && amount === 7){
                    console.log('no categoryfilter day = all');
                    axios
                        .get(appUrl + '/api/tools/random/' + amount + '?api_token=' + this.apiToken)
                        .then(response => {
                            var i = 0;
                            for(var day in this.weekMenu){
                                this.weekMenu[day] = response.data[i];
                                this.randomMeals[day] = response.data[i];
                                i++;
                            }
                        })
                        .catch(error => {
                                if(error.response.status === 429){
                                    var i = 0;
                                    for(var day in this.weekMenu){
                                        this.weekMenu[day] = { meal_name: '1 minuut geduld... Te veel verzoeken' };;
                                    }
                                }
                                console.log(error);
                            }
                        )
                }
            },
            async filterRandomMeals(type, input, amount = 1){
                let appUrl = this.appUrl;

                if(type === "category"){
                    return axios
                        .get(appUrl + '/api/tools/random/'+ amount +'/category/'+ input +'/?api_token=' + this.apiToken)
                        .then(response => {
                            console.log(response.data);
                            return response.data;
                        })
                        .catch(error => {
                            if(error.response.status === 429){
                                throw { meal_name: '1 minuut geduld... Te veel verzoeken' };
                            }
                            if(error.response.status === 404){
                                throw { meal_name: '<strong>Geen maaltijd in categorie gevonden!</strong>',};
                            }
                            console.log(error);
                            throw { meal_name: 'Onbekende fout, probeer het later nogmaals' };
                        })
                    }
                },
            updateDay(day){
                let appUrl = this.appUrl;

                if(day === 'all'){
                    this.getRandomMeals(7, 'all');
                }
                else{
                    this.getRandomMeals(1, day);
                }
            },
            updateCategoryFilter(event, day){
                var categoryInput = document.querySelectorAll('input');
                for (var i = 0; i < categoryInput.length; i++)
                {
                    if (categoryInput[i].name.indexOf("meal['" + day +  "']") > -1)
                    {
                        categoryInput[i].value = "";
                    }
                }
                this.selected = event;
                this.categoryFilter[day] = event.id;
            },
            getMeals(){
                let appUrl = this.appUrl;
                axios
                    .get(appUrl + '/api/meals?api_token=' + this.apiToken)
                    .then(response => {
                        for(var i = 0; i < response.data.length; i++)
                        {
                            let obj = { id: response.data[i].id,
                                name: response.data[i].meal_name}
                            this.meals.push(obj);
                        }
                    })
                    .catch(error => {
                        if(error.response.status === 429){
                            this.categories = [{  name: 'Te veel aanvragen! Even geduld.'}];
                        }
                        console.log(error);
                    })
            },
            updateMeal(event, day){
                var categoryInput = document.querySelectorAll('input');

                for (var i = 0; i < categoryInput.length; i++)
                {
                    if (categoryInput[i].name.indexOf("category['" + day + "']") > -1)
                    {
                        categoryInput[i].value = "";
                    }
                }
                if(event.name){
                    this.weekMenu[day] = {
                        id: event.id,
                        meal_name: event.name
                    };
                }
            },
            toggleModal(id, action){
                if(action === 'open'){
                    document.getElementById(id).classList.add("active");
                }
                if(action === 'close'){
                    document.getElementById(id).classList.remove("active");
                }
            },
            saveMenu(){
                let self = this;
                axios.post('/api/weekmenu?api_token=' + this.apiToken, {
                    name: this.menuName,
                    weekmenu: this.weekMenu })
                    .then(function (response) {
                        if(response.status === 201) {
                            self.saveMenuStatus = 'Toegevoegd! <br>';
                            self.saveMenuStatus += '<a href="/saved-weekmenu/view/' + response.data.id + '">Bekijk hier direct je weekmenu'
                        }
                    })
                    .catch(function (error) {
                        self.saveMenuStatus = 'Woops!<br>';
                        if(error.response.status === 400) {
                            self.saveMenuStatus += 'Naam bestaat al of is niet ingevuld<br>';
                            // for(var i = 0; i < error.response.data.name.length; i++){
                            //     self.saveMenuStatus += error.response.data.name[i] + '<br>';
                            // }
                        }
                        else{
                            self.saveMenuStatus += 'Onbekende fout (heb je wel overal een maaltijd?)';
                        }
                    });
            }
        },
        data(){
            return{
                categoryFilter: {
                    'mon': null,
                    'tue': null,
                    'wed': null,
                    'thu': null,
                    'fri': null,
                    'sat': null,
                    'sun': null
                },
                meals: [],
                weekMenu: {
                    'mon': {'meal_name' : '... (<a href="/meals/">Heb je al recepten toegevoegd?</a>)'},
                    'tue': {'meal_name' : '... (<a href="/meals/">Heb je al recepten toegevoegd?</a>)'},
                    'wed': {'meal_name' : '... (<a href="/meals/">Heb je al recepten toegevoegd?</a>)'},
                    'thu': {'meal_name' : '... (<a href="/meals/">Heb je al recepten toegevoegd?</a>)'},
                    'fri': {'meal_name' : '... (<a href="/meals/">Heb je al recepten toegevoegd?</a>)'},
                    'sat': {'meal_name' : '... (<a href="/meals/">Heb je al recepten toegevoegd?</a>)'},
                    'sun': {'meal_name' : '... (<a href="/meals/">Heb je al recepten toegevoegd?</a>)'}
                },
                categories: [],
                randomMeals: [],
                saveMenuStatus: null,
                menuName: '',
            }
        },
        mounted() {
            this.getMeals();
            this.getCategories();
            this.updateDay('all');

            var DropDownInputs = document.getElementsByClassName("dropdown-input");
            var i;
            for (i = 0; i < DropDownInputs.length; i++) {
                DropDownInputs[i].setAttribute("autocomplete", "off");
            }
        }
    }
</script>
