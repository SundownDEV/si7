<template>
  <div class="AdminHomepage">
    <navbar></navbar>
    <sidebar></sidebar>
    <AdminFooter></AdminFooter>
  </div>
</template>

<script>
import Navbar from './layouts/AdminNavbar.vue'
import Sidebar from './layouts/AdminSidebar.vue'
import AdminFooter from './layouts/AdminFooter.vue'
export default {
  name: 'AdminHomepage',
  components: {
    Navbar,
    Sidebar,
    AdminFooter
  }
}
</script>

<style lang="css">
@import '../../assets/css/style.css';
</style>
