<template>
  <div class="MyPage">
    <h1>Message : {{ msg }}</h1>
    
  </div>
</template>

<script>
export default {
  name: 'MyPage',
  props: {
    msg: String
  }
}
</script>