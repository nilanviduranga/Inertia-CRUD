
<template>
    <AppLayout>
        <template #content>
            <div>
                <div class="row mt-4 border-bottom  col-6 offset-3">
                    <div class="col-4"></div>
                    <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <h4 class="form-label">Active Students</h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="container mt-5 mb-5">
                <div class="row">
                    <div class="col-md-3" v-for="task in tasks" :key="task.id">
                        <div class="p-2 bg-white border rounded text-center">
                            <img :src="'../storage/' + task.image" alt="" height="200" width="200"
                                class="img-fluid img-responsive rounded product-image ratio-1x1">
                            <h5 class="text-center">{{ task.name }}</h5>
                            <div class="text-center">
                                <p class="text-justify text-break para mb-0">NIC number : {{ task.nic }}</p>
                                <p class="text-justify text-break para mb-0">Date Of Birth: {{ task.birth_date }}</p>
                                <p class="text-justify text-break para mb-0">Age: {{ calculateAge(task.birth_date) }} years
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ................................................................................................................................... -->

        </template>
    </AppLayout>
</template>

<script >
import AppLayout from "@/Layouts/App.vue";
import axios from "axios";
export default {
    components: {
        AppLayout,
    },
    props: {
        tasks: Array
    },
    methods: {
        calculateAge(birthdate) {
            console.log(birthdate);
            const birthYear = new Date(birthdate).getFullYear();
            console.log(birthYear);
            const currentYear = new Date().getFullYear();
            console.log(currentYear);
            return currentYear - birthYear;
        },
    },


};

</script>

<style lang="css"></style>

