<template>
    <div class="container custom-container mt-5">
        <h1 class="mb-4">Create New Trainee</h1>
        <form @submit.prevent="submitForm">
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" v-model="trainee.name" required />
            </div>
            <div class="mb-3">
                <label for="skillLevel" class="form-label">Skill Level (1-100):</label>
                <input type="number" class="form-control" v-model="trainee.skill" min="1" max="100" required />
            </div>
            <div class="mb-3">
                <label for="bio" class="form-label">Bio:</label>
                <textarea class="form-control" v-model="trainee.bio" required></textarea>
            </div>
            <div class="mb-3">
                <label for="training_center_id" class="form-label">Training Center:</label>
                <select class="form-control" v-model="trainee.training_center_id" required>
                    <option value="" disabled selected>Select a Training Center</option>
                    <option v-for="center in trainingCenters" :key="center.id" :value="center.id">
                        {{ center.name }}
                    </option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Trainee</button>
        </form>
        <div v-if="message" :class="{'alert': true, 'alert-success': success, 'alert-danger': !success, 'mt-3': true}">
            {{ message }}
        </div>
    </div>
</template>

<script>
import api from '@/services/api'; 

export default {
    data() {
        return {
            trainee: {
                name: '',
                skill: null,
                bio: '',
                training_center_id: '',
            },
            trainingCenters: [],
            message: '',
            success: false
        };
    },
    created() {
        this.fetchTrainingCenters();
    },
    methods: {
        async fetchTrainingCenters() {
            try {
                const response = await api.getTrainingCenters();
                this.trainingCenters = response.data.data;
            } catch (error) {
                console.error("Error fetching training centers:", error);
            }
        },
        async submitForm() {
            // Trim the data before submission
            this.trainee.name = this.trainee.name.trim();
            this.trainee.bio = this.trainee.bio.trim();

            // Basic validation
            if (!this.trainee.name || !this.trainee.skill || !this.trainee.bio || !this.trainee.training_center_id) {
                this.message = 'Please fill in all required fields.';
                this.success = false;
                return;
            }

            try {
                const response = await api.createTrainee(this.trainee);
                console.log('API Response:', response);
                if (response && response.data) {
                    this.message = `Trainee created successfully`;
                    this.success = true;
                } else {
                    this.message = 'Trainee created, but no response data received.';
                    this.success = false;
                }
                this.resetForm();
            } catch (error) {
                console.error('Error creating trainee:', error.response ? error.response.data : error.message);
                if (error.response && error.response.data) {
                    this.message = `Error creating trainee: ${error.response.data.message}`;
                } else {
                    this.message = `Error creating trainee: ${error.message}`;
                }
                this.success = false;
            }
        },
      
        resetForm() {
            this.trainee.name = '';
            this.trainee.skill = null;
            this.trainee.bio = '';
            this.trainee.training_center_id = '';
        }
    }
};
</script>

<style scoped>
.custom-container {
    max-width: 600px; 
    margin: auto; 
}
.success {
    color: green;
}
.error {
    color: red;
}
</style>