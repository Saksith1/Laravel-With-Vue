<template>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
        <li class="nav-item">
             <router-link to="/" class="nav-link">Home</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/about" class="nav-link">About</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/tailwind-css" class="nav-link">Tailwind CSS</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/category" class="nav-link">Category</router-link>
        </li>
        <li class="nav-item">
            <router-link to="/vue-map" class="nav-link">Vue Map</router-link>
        </li>
      </ul>
    </div>
  </div>
</nav>
  <router-view />
</template>
<script>
export default {
    setup: () => ({
        title: 'How To Install Vue 3 in Laravel 8 From Scratch'
    })
}
</script>