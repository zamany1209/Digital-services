<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Ninth navbar example">
    <div class="container-xl">
      <a class="navbar-brand" href="#">Container XL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07XL" aria-controls="navbarsExample07XL" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExample07XL">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <router-link to="/" class="nav-link active" aria-current="page" >Home</router-link>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown07XL" data-bs-toggle="dropdown" aria-expanded="false">{{ app.user ? app.user.name : 'Account' }}</a>
            <ul class="dropdown-menu" aria-labelledby="dropdown07XL">
              <div v-if="!app.user">
                <li><router-link to="/login" class="dropdown-item">Login</router-link></li>
                <li><router-link to="/register" class="dropdown-item">Register</router-link></li>
              </div>
              <li v-else><a @click="logout" class="dropdown-item" href="javascript:;">Logout</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
        </ul>
        <form>
          <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
    name: 'navbar',
    props: ['app'],
    data() {
        return {

        }
    },
    methods: {
        logout() {
            this.app.req.post('user/logout').then(() => {
                this.app.user = null;
                this.router.push('/login');
            })
        }
    },

}
</script>

<style>

</style>