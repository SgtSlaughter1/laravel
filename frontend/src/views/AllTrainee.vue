<template>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Currently Available Trainees</h1>

        <Spinner v-if="loading" @loading-finished="loading = false" /> 

        <ul class="list-unstyled" v-else>
            <li v-for="trainee in trainees" :key="trainee.id" class="mb-3">
                <div :class="['card', 'border-left', trainee.skill > 70 ? 'border-crimson' : '']">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="w-70">
                            <h3 class="card-title">{{ trainee.name }}</h3>
                            <p class="card-text">{{ trainee.training_center.name }}</p>
                        </div>

                        <!-- Button Group for View Details and Edit -->
                        <div class="btn-group" role="group">
                            <a :href="`/trainees/${trainee.id}`" class="btn btn-primary">View Details</a>
                            <a :href="`/trainees/${trainee.id}/edit`" class="btn btn-secondary">Edit</a>
                        </div>
                    </div>
                </div>
            </li>
        </ul>

        <!-- Add Pagination Controls -->
        <nav v-if="totalPages > 1" aria-label="Page navigation" class="mt-4">
            <ul class="pagination justify-content-center">
                <li :class="['page-item', { disabled: currentPage === 1 }]">
                    <a class="page-link" href="#" @click.prevent="changePage(currentPage - 1)">Previous</a>
                </li>
                <li v-for="page in totalPages" :key="page" :class="['page-item', { active: page === currentPage }]">
                    <a class="page-link" href="#" @click.prevent="changePage(page)">{{ page }}</a>
                </li>
                <li :class="['page-item', { disabled: currentPage === totalPages }]">
                    <a class="page-link" href="#" @click.prevent="changePage(currentPage + 1)">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</template>

<script>
import api from '@/services/api';
import Spinner from '@/components/Spinner.vue'; 
export default {
    components: {
        Spinner, 
    },
    data() {
        return {
            trainees: [],
            loading: true,
            currentPage: 1,
            totalPages: 0,
        };
    },
    methods: {
        async getTrainees(page = 1) {
            try {
                this.loading = true;
                const response = await api.getTrainees({ page });
                this.trainees = response.data.data.data;
                this.currentPage = response.data.data.current_page;
                this.totalPages = response.data.data.last_page;
            } catch (error) {
                console.error(error);
            } finally {
                this.loading = false;
            }
        },
        changePage(page) {
            if (page >= 1 && page <= this.totalPages) {
                this.getTrainees(page);
            }
        },
    },
    mounted() {
        this.getTrainees();
    }
}
</script>

<style scoped>
.border-left {
    border-left: 5px solid transparent;
}

.border-crimson {
    border-left-color: crimson;
}

.card {
    transition: box-shadow 0.3s;
}

.card:hover {
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.spinner {
    border: 8px solid #f3f3f3;
    border-top: 8px solid #3498db;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
    margin: 0 auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>