<template>

</template>

<script>
export default {
    created() {
        localStorage.removeItem('token')
        localStorage.removeItem('user')
        Toast.fire({
            icon: 'error',
            title: 'Logged Out Successfully'
        })
        this.$router.push({name: '/'})
    }
}
</script>

<style scoped>

</style>
