<template>
    <div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/create">
                                <i class="bi bi-briefcase"></i> Create Trainee
                            </router-link>
                        </li>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</template>

<script>

</script>


<style scoped>

</style>