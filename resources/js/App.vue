<template>
    <div>
      <Header />
      <router-view></router-view>  <!-- Vue Router loads pages here -->
      <Footer />
    </div>
  </template>

  <script setup>
  import Header from './components/Header.vue';
  import Footer from './components/Footer.vue';
  </script>
