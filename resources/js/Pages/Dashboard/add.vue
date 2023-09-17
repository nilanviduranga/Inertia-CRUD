<template>
    <AppLayout>
        <template #content>
            <div class="mt-3 px-3">
                <form @submit.prevent="taskStore" method="post">

                    <div class="row mt-5 ">

                        <div class="col-6 offset-3 mt-5">

                            <div class="mb-3">
                                <label for="formFileSm" class="form-label">Student Image</label>
                                <input name="image" @input="task.image = $event.target.files[0]" v-models="task.image"
                                    class="form-control form-control-sm" id="formFileSm" type="file">
                            </div>
                            <div class="mb-3">
                                <label class="form-label ">Student Name</label><br>
                                <input class="form-control" type="text" name="student_name" v-model="task.name">
                            </div>

                            <div class="mb-3">
                                <label class="form-label ">NIC Number</label><br>
                                <input class="form-control" type="text" name="student_nic" v-model="task.nic">
                            </div>

                            <div class="mb-3">
                                <label class="form-label ">Date Of Birth</label><br>
                                <input class="form-control" type="date" name="date" v-model="task.birth_date">
                            </div>

                        </div>
                    </div>



                    <div class="row mt-3">
                        <div class="mb-3 d-flex justify-content-center">
                            <input class="btn btn-primary btn-lg me-1" type="reset" value="Clear">
                            <input class="btn btn-primary btn-lg me-1" type="submit" value="Next">
                        </div>
                    </div>


                </form>
            </div>
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
    data() {
        return {
            task: {
                image: "",
                name: "",
                nic: "",
                birth_date: "",
                image: "",
            }
        }
    },
    methods: {
        async taskStore() {
            // Create a new object with only the desired properties
            const requestData = {
                nic: this.task.nic,
                image: this.task.image,
                name: this.task.name,
                birth_date: this.task.birth_date,
                image: this.task.image,
            };

            console.log(requestData)

            // Send the modified object in the Axios request

            await axios.post(route('student.store'), requestData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            this.$inertia.visit(route('dashboard'));


        }
    },
};
</script>

<style lang="css"></style>
