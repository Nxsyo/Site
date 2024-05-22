import Vue from 'vue'
import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
//import Vuex from 'vuex'

Vue.config.productionTip = false
Vue.use(VueAxios, axios)

new Vue({
  router,
  data: { 
    data1: 123,
    info: ""
  },
  mounted () {
    axios
      .get('https://api.coindesk.com/v1/bpi/currentprice.json')
      .then(response => (this.info = response))
  },
  render: h => h(App)
}).$mount('#app')
