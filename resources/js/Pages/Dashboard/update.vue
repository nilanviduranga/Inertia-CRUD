<template>
    <AppLayout>
        <template #content>
            <div class="mt-3 px-3">
                <form @submit.prevent="taskStore" method="post">

                    <div class="row mt-5 ">

                        <div class="col-6 offset-3">

                            <!--Image-->
                            <div>
                                <div class="d-flex justify-content-center">
                                    <label class="form-label ">Student Image</label>
                                </div>
                                <div class="mb-4 d-flex justify-content-center">
                                    <img :src="'../storage/' + task.image" alt="Product Image" v-if="task.image != null"
                                        width="350" height="350" id="image-preview" />
                                    <img src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" alt="Product Image"
                                        v-else width="350" height="350" id="image-preview" />
                                </div>
                                <div class="d-flex justify-content-center">
                                    <div class="btn btn-primary btn-rounded">
                                        <label for="formFileSm" class="form-label">Upload Image</label>
                                        <input name="image" @input="image_data = $event.target.files[0]"
                                            v-models="image_data" class="form-control form-control-sm" id="formFileSm"
                                            type="file">

                                    </div>
                                </div>
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
    props: {
        task: Object
    },
    data() {
        return {
            image_data: null,
        };
    },

    methods: {


        async taskStore() {
            // Create a new object with only the desired properties

            if (this.image_data != null) {
                this.task.image = this.image_data;
            }else{
                this.task.image = null;
            }

            const requestData = {
                id: this.task.id,
                nic: this.task.nic,
                image: this.task.image,
                name: this.task.name,
                birth_date: this.task.birth_date,
            };
            //console.log(requestData)
            await axios.post(route('student.update'), requestData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            this.$inertia.visit(route('dashboard'));
        },
    },

};
</script>

<style lang="css"></style>
