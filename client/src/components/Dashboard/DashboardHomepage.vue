<template>
  <div class="DashboardHomepage">
    <navbar></navbar>
    <sidebar></sidebar>
    <DashboardFooter></DashboardFooter>
  </div>
</template>

<script>
import Navbar from './layouts/DashboardNavbar.vue'
import Sidebar from './layouts/DashboardSidebar.vue'
import DashboardFooter from './layouts/DashboardFooter.vue'
export default {
  name: 'DashboardHomepage',
  components: {
    Navbar,
    Sidebar,
    DashboardFooter
  }
}
</script>

<style lang="css">
@import '../../assets/css/style.css';
</style>
