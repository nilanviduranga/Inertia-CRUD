<template>
    <AppLayout>
        <template #content>
            <div>
                <div class="row mt-4 border-bottom  col-8 offset-2">
                    <div class="col-2"></div>
                    <div class="col-6">
                        <div class="d-flex justify-content-center">
                            <h4 class="form-label">Student Menage (Admin_Dashboard)</h4>
                        </div>
                    </div>
                    <div class="col-4 align-self-center">
                        <a :href="route('addNew')" class="btn btn-success col-10 me-1">Add New Student </a>
                    </div>
                    <div></div>
                </div>
                <div class="container mt-5 mb-5 " v-for="task in tasks">
                    <!-- <div v-else class="opacity-10"> -->

                    <div class="d-flex justify-content-center row">
                        <div class="col-md-10">
                            <div :class="task.status == 1 ? 'opacity-100' : 'opacity-75'">

                                <div class="row p-2 bg-white border rounded">

                                    <div class="col-md-3 mt-1"> <img :src="'../storage/' + task.image" alt="" height="200"
                                            width="200" class="img-fluid img-responsive rounded product-image ratio-1x1">
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <div class="d-flex flex-row">
                                            <div class="col-6">
                                                <h5>{{ task.name }}</h5>
                                            </div>
                                            <div class="col-6 text-end ">
                                                <span v-if="task.status == 1">
                                                    <h6 class="text-success ">Status: Active</h6>
                                                </span>
                                                <span v-else>
                                                    <h6 class="text-danger opacity-100">Status: Inactive</h6>
                                                </span>

                                            </div>
                                        </div>
                                        <div class="d-flex flex-row">
                                            <div class="ratings mr-2"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                                                    class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                        </div>
                                        <p class="text-justify  text-break para mb-0">NIC number : {{ task.nic }}</p>
                                        <p class="text-justify  text-break para mb-0">Date Of Birth :{{ task.birth_date
                                        }}
                                        </p>
                                        <p class="text-justify  text-break para mb-0">Age :{{
                                            calculateAge(task.birth_date)
                                        }}</p>

                                    </div>
                                    <div class="align-items-center align-content-center col-md-3 border-start mt-1">
                                        <div class="d-flex flex-column mt-4">
                                            <!-- <button class="btn btn-primary btn-sm" type="button">Update</button>
                                <button class="btn btn-outline-primary btn-sm mt-2" type="button">Delete</button> -->

                                            <button v-if="task.status == 1" @click.prevent="setInactive(task.id)"
                                                class="btn btn-danger btn-sm mb-2 ">Status Set Inactive</button>
                                            <button v-else @click.prevent="setActive(task.id)"
                                                class="btn btn-success btn-sm mb-2">Status Set Active</button>




                                            <a :href="route('student.updateView', { task_id: task.id })"
                                                class="btn btn-warning btn-sm mt-2">UpdateDetails</a>
                                            <!-- href="{{ route('todo.delete', $task->id) }}" -->
                                            <button @click.prevent="deleteTask(task.id)"
                                                class="btn btn-outline-danger btn-sm mt-2 ">Delete Student</button>
                                        </div>
                                    </div>
                                </div>
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
        async deleteTask(id) {
            await axios.post(route('student.delete', id))
            this.$inertia.visit(route('dashboard'));
        },

        async setInactive(id) {
            await axios.post(route('student.setInactive', id))
            this.$inertia.visit(route('dashboard'));
        },
        async setActive(id) {
            await axios.post(route('student.setActive', id))
            this.$inertia.visit(route('dashboard'));
        },
        calculateAge(birthdate) {
            const birthYear = new Date(birthdate).getFullYear();
            const currentYear = new Date().getFullYear();
            return currentYear - birthYear;
        },
    }
};

</script>

<style lang="css"></style>
