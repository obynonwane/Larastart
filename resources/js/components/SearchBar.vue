<template>
 <div class="container">
   <div v-if="focus" @click="focus = false" class="myop"> </div>
    <div class="input-group input-group-sm inner-div">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search " aria-label="Search" id="searchTerm" v-model="searchTerm" @input="search" @focus="focus = true">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
             <div v-if="results == 0">No results found for '{{searchTerm}}'</div>
             <div>

                     <div class="drp" style="">
                        <ul>
                            <li v-for="result in results" :key="result.id">
                                <a href="/dashboard">
                                 <img class="img-circle" :src="'img/profile/'+result.photo" alt="User Avatar" style="width:3em; height:3em;">
                                 {{result.companyname}} | <span style="color:green; font-size:1.5rem;">{{result.firstname}} {{result.lastname}}</span>
                                </a>
                            </li>
                        </ul>
                     </div>

             </div>
            <div v-if="focus" class="overlaybg"> </div>
    </div>
   </div>
 </div>
</template>

<script>
    import _ from 'lodash'
    export default {
        name: 'searchbar',
        data(){
            return{
                searchTerm:'',
                focus:false,
                results: []
            }
        },

        methods:{
            getProfilePhoto(){
                return "./img/profile/"
            },
            search: _.debounce(function(e){
                      if(this.searchTerm.length < 3){
                        return
                    }

                    axios.post('api/search', {searchTerm: this.searchTerm})
                    .then(response =>{
                        console.log(response.data)
                        this.results = response.data
                    })
                    .catch(error => {
                        console.log(error.response)
                    })
                },300
            )
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    .overlaybg{

        position: absolute;

        margin-top: 5px;
        z-index: -1;
    }

    .myop{

        background-color:rgb(143, 141, 141);
        opacity:0;
        position: absolute;
        right:0px;
        left:0px;
        top:0px;
        bottom: 0px;
        z-index:10;
        height: 100vh;
    }
    .inner-div{
        position: relative;
        z-index: 10;
    }
    .drp{
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        color:black;

        width:1100px; margin-top:5px;
        font-size:1rem;
    }
    .drp ul{
         list-style-type: none;
    }
    .drp a{
        color:inherit;
        text-decoration: none;

    }
    .drp li:hover {
     background-color:#E6E6FA;
     transition: all .2s ease-in-out;
     transform: scale(1.01);
    }
</style>
