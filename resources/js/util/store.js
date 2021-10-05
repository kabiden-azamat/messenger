import Vue from 'vue';
import Vuex from 'vuex';
import axios from 'axios';
//import moment from "moment";


Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user: null
    },
    actions: {
        getUserData: function () {

            axios.get('/sanctum/csrf-cookie')
                .then(response => {
                    axios.get('/api/auth/me', {}).then(response => {
                        console.log(response)
                    })
                });

        }
    }
});

export default store;
