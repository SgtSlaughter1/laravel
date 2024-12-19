<template>
    <div v-if="loading" class="text-center">
        <div class="spinner"></div>
    </div>
</template>

<script>
export default {
    name: 'Spinner',
    props: {
        loading: {
            type: Boolean,
            default: true,
        },
    },
    data() {
        return {
            timeout: null,
        };
    },
    mounted() {
        
        this.timeout = setTimeout(() => {
            this.$emit('loading-finished');
        }, 5000);
    },
    beforeDestroy() {
        clearTimeout(this.timeout);
    },
}
</script>

<style scoped>
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