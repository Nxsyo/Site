<template>
  <div class="mypage">
    <h1>This is my page a moi</h1>
    <MyPage msg="Bienvenue chez toi"/>
    <h2>Axios : {{ info }}</h2>
  </div>
</template>
<script>
// @ is an alias to /src
import MyPage from '@/components/MyPage.vue'
import axios from "axios";

export default {
  name: 'MyPageView',
  components: {
    MyPage
  },
  data () {
    return {
      info: '',
    }
  },
  mounted () {
    axios
      .get('https://api.coindesk.com/v1/bpi/currentprice.json')
      .then(response => (this.info = response))
  }
  
}
</script>

