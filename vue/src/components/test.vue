<template>
  <button
    class="btn btn-primary"
    @click="submit">{{ msg }}</button>
</template>

<script>
  export default {
    name: 'Test',
    props: {
      msg: {
        type: String,
        default: '',
      }
    },
    data: function() {
      return this.msg;
    },
    methods: {
      submit: function () {
        console.log(1)
        this.$axios({
          type: 'get',
          url: 'http://localhost/eamis-helper/micro-app/web/student/index',
          data: {},
        })
      }
    }
  }
</script>
