<template>
    <div v-if="validationErrors" class="alert alert-danger">
        <ul>
            <li v-for="(value, index) in validationErrors" :key="index">
                {{ value }}
            </li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "validationErrors",
        props: ["errors"],
        computed: {
            validationErrors() {
                let errors = Object.values(this.errors)
                errors = errors.flat()
                return errors
            }
        }
    }
</script>

<style scoped>

</style>