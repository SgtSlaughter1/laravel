<template>
    <div class="container mt-5">
        <h2 class="text-center" v-if="trainee">{{ trainee.name }}'s Profile</h2>

        <div class="bg-light p-4 rounded" v-if="trainee">
            <p><strong>Skill Level:</strong> {{ trainee.skill }}</p>
            <p><strong>Id:</strong> {{ trainee.id }}</p>
            <p><strong>About me:</strong></p>
            <p>{{ trainee.bio }}</p>
        </div>

        <div class="border border-dashed bg-white px-4 pb-4 my-4 rounded" v-if="trainee && trainee.training_center">
            <h3>Training Center Information</h3>
            <p><strong>Training Center Name:</strong> {{ trainee.training_center.name }}</p>
            <p><strong>About the Training Center:</strong> {{ trainee.training_center.description }}</p>
        </div>

        <form @submit.prevent="deleteTrainee">
            <button type="submit" class="btn btn-danger my-4">Delete Trainee</button>
        </form>
    </div>
</template>

<script>
import api from '@/services/api';

export default {
    data() {
        return {
            trainee: null,
        };
    },
    created() {
        this.fetchTrainee();
    },
    methods: {
    async fetchTrainee() {
        const traineeId = this.$route.params.id;
        try {
            const response = await api.getTraineeById(traineeId);
            this.trainee = response.data.data; 
            console.log('Trainee data:', this.trainee); 
        } catch (error) {
            console.error('Error fetching trainee:', error);
        }
    },
    async deleteTrainee() {
        const traineeId = this.$route.params.id;
        try {
            await api.deleteTrainee(traineeId);
        } catch (error) {
            console.error('Error deleting trainee:', error);
        }
    },
}
}
</script>

<style scoped>
</style>