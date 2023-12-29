<script>
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    import moment from 'moment';

    export default {
        data() {
            return {
                selectedOption: null,
                options: [
                    { label: 'Option 1', value: 'option1' },
                    { label: 'Option 2', value: 'option2' },
                    { label: 'Option 3', value: 'option3' },
                ],
                category: "",
                allCategory: []
            };
        },
        props: ['user'], 
        created() {},
        mounted(){
            this.getAllCategory()
        },
        methods: {
            async addCategory() {
                try {
                    this.isSubmitting = true
                    let payload = {
                        category: this.category,
                        type: 'create',
                    }

                    this.axios.post('/category/create', payload)
                    .then(response => {
                        console.log(response);
                        if (response.data.status == 200) {
                            toast(response.data.message, {
                                autoClose: 3000,
                                "theme": "colored", // light dark auto colored
                                "type": "success",
                                "transition": "zoom", // bounce flip slide zoom
                            }); 
                            this.category = "";
                            // Refresh category list after adding a new category
                            this.getAllCategory();
                        } else {
                            alert("Authentication failed. Please check your credentials.");
                        }
                    })
                    .catch(error => {
                        this.isSubmitting = false
                        console.log(error)
                        // if (error.response.data.errors != undefined) {
                        //     this.validationErrors = error.response.data.errors
                        // }
                        return error
                    });
                } catch (error) {
                    console.error("An error occurred during authentication:", error);
                    alert("An error occurred. Please try again later.");
                }
            },

            async getAllCategory(){
                let payload = {
                    category: this.category,
                    type: 'read',
                }
                this.axios.post('/category/data', payload).then(res=>{
                    // console.log(res.data);
                    this.allCategory = res.data.categories
                }) 
            },

            formatRelativeDate(date) {
                return moment(date).fromNow();
            },
        },
    };
</script>

<template>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Category</a></li>
                                <li class="breadcrumb-item active">Create</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xxl-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">Category</h4>
                        </div><!-- end card header -->

                        <!-- <p v-for="(data, index) in user" :key="index">
                            <b>
                                {{ data.created_at }}
                            </b>
                        </p> -->

                        <div class="card-body">
                            <div class="live-preview">
                                <form @submit.prevent="addCategory" class="row g-3">
                                    <div class="col-md-6">
                                        <label for="category" class="form-label">Name</label>
                                        <input v-model="category" type="text" class="form-control" id="category"
                                            placeholder="Enter category name">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Select2</label>
                                        <v-select class="new-styles" placeholder="Choose some countries" multiple :options="options"/>
                                    </div>
                                    <div class="col-12">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Category List</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(category, index) in allCategory" :key="index">
                                        <td>{{ ++index }}</td>
                                        <td>{{ category.name }}</td>
                                        <td>{{ formatRelativeDate(category.created_at) }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="#" class="dropdown-item edit-item-btn">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item delete-item-btn" onclick="return confirm('Are you sure you want to delete this?');">
                                                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                                                            Delete
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>