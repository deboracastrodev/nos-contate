<template>
    <div id="container" class="container-fluid">
        <header-component></header-component>

        <router-view></router-view>


        <footer-component></footer-component>

    </div>
</template>
<script>
  import HeaderComponent from './components/Header.vue';
  import FooterComponent from './components/Footer.vue';

  export default {
    components: {
      HeaderComponent,
      FooterComponent
    }
  }
</script>
