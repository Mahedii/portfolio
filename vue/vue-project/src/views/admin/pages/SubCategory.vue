<script>
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';
import axios from 'axios';
import moment from 'moment';

export default {
    data() {
        return {
            formData: {
                selectedCategory: null,
                selectedSubcategories: [],
                numberOfSubcategories: 0,
                subcategory: "",
            },
            lastSelectedCategoryId: null,
            categoryTree: null,
            categoryTreeArray: [],
            subcategoriesOptions: [],
            options: [],
            categories: [], // Store the fetched categories here
            allSubCategory: []
        };
    },
    created() {
        // Fetch categories when the component is created
        this.fetchCategories();
        this.getSubCategories();
    },
    methods: {
        async getSelectedSubCategories(value, index) {
            var id = value.value
            this.lastSelectedCategoryId = id

            if (index == null) {
                // this.categoryTree = this.lastSelectedCategoryId
                this.categoryTreeArray = [this.lastSelectedCategoryId]
            } else {
                var arrayTreeKey = index + 1
                // if (this.categoryTreeArray.includes(some value)) // for checking array value
                // if (arrayTreeKey in this.categoryTreeArray) // for checking array key
                if (this.categoryTreeArray.hasOwnProperty(arrayTreeKey)) {
                    this.categoryTreeArray[arrayTreeKey] = this.lastSelectedCategoryId
                    this.categoryTreeArray.splice(arrayTreeKey + 1)
                } else {
                    this.categoryTreeArray.push(this.lastSelectedCategoryId)
                }
            }

            const subcategories = await this.getSubCategories(id);
            // console.log("length", subcategories.length)

            if (subcategories.length == 0) {
                if (index == null) {
                    this.formData.numberOfSubcategories = 0
                    this.formData.selectedSubcategories = []
                } else {
                    if (this.formData.selectedSubcategories.length > index) {
                        // Keep only the first 10 elements, remove the rest
                        this.formData.selectedSubcategories.splice(index + 1);
                    }
                }
            } else {
                var newCategoryoptions = subcategories.map(subcategory => ({
                    label: subcategory.category_name,
                    value: subcategory.id.toString(), // Convert id to string for compatibility with v-select
                }));

                this.subcategoriesOptions.push(newCategoryoptions)

                // Increment the number of subcategories and push a new selected subcategory
                this.formData.numberOfSubcategories++;
                this.formData.selectedSubcategories.push(null)
            }
            // console.log("categoryTree", this.categoryTree)
            // console.log("categoryTreeArray", this.categoryTreeArray)
            // console.log("numberOfSubcategories", this.formData.numberOfSubcategories)
        },

        async addSubCategory() {
            try {
                this.isSubmitting = true
                this.categoryTreeArray.filter((value, index) => {
                    if (index == 0) {
                        this.categoryTree = value
                    } else {
                        this.categoryTree = this.categoryTree + "," + value
                    }
                })
                // console.log(this.categoryTree)
                let payload = {
                    category_id: this.lastSelectedCategoryId, // Use last selected category id
                    parents: this.categoryTree,
                    subcategory: this.formData.subcategory,
                    type: 'create',
                };

                this.axios.post('/sub-category/create', payload)
                .then(response => {
                    // console.log(response);
                    if (response.data.status == 200) {
                        toast(response.data.message, {
                            autoClose: 3000,
                            "theme": "colored", // light dark auto colored
                            "type": "success",
                            "transition": "zoom", // bounce flip slide zoom
                        });

                        // Clear the input fields after successful addition
                        this.resetForm()

                        // Refresh sub-category list after adding a new category
                        this.getSubCategories();
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
                    this.isSubmitting = false;
                    console.log(error);
                    return error;
            }
        },

        async resetForm() {
            // Reset form fields and selected values
            this.formData.selectedCategory = null
            this.formData.subcategory = ""
            this.formData.selectedSubcategories = []
            this.formData.numberOfSubcategories = 0

            this.lastSelectedCategoryId = null
            this.categoryTree = null
            this.categoryTreeArray = []

            // Use the form element's reset method to clear input values
            // document.getElementById('subcategoryForm').reset()
        },

        async fetchCategories() {
            try {
                let payload = {
                    type: 'read',
                }
                this.axios.post('/category/data', payload).then(res=>{
                    this.categories = res.data.categories;
                    // console.log(res.data.categories);

                    this.options = this.categories.map(category => ({
                        label: category.category_name,
                        value: category.id.toString(), // Convert id to string for compatibility with v-select
                    }));
                })
            } catch (error) {
                console.error("Error fetching categories:", error);
            }
        },

        async getSubCategories(id = null){
            try {
                let payload = {
                    id: id,
                    type: 'read',
                }
                return this.axios.post('/sub-category/data', payload).then(res=>{
                    // console.log(res.data);
                    if (res.data.status == 200) {
                        if (id != null) {
                            return res.data.subcategories
                        } else {
                            this.allSubCategory = res.data.subcategories
                        }
                    }
                })
            } catch (error) {
                console.log(error)
            }
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
                        <h4 class="mb-sm-0">Sub Category</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Sub Category</a></li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Sub-Category</h4>
                        </div>

                        <div class="card-body">
                            <div class="live-preview">
                                <form @submit.prevent="addSubCategory" id="subcategoryForm" class="row g-3">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Select Category</label>
                                        <v-select v-model="formData.selectedCategory" @option:selected="value => getSelectedSubCategories(value, null)" class="new-styles" placeholder="Choose one" :options="options"/>
                                    </div>

                                    <!-- Loop to dynamically create v-select components -->
                                    <div v-for="(selectedSubcategory, index) in formData.selectedSubcategories" :key="index" class="col-md-6">
                                        <label :for="'subcategory' + (index + 1)" class="form-label">Select Subcategory</label>
                                        <v-select :v-model="formData.selectedSubcategories[index]" :data-index="index" @option:selected="value => getSelectedSubCategories(value, index)" class="new-styles" :placeholder="'Choose one'" :options="subcategoriesOptions[index]"/>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="subcategory" class="form-label">Subcategory Name</label>
                                        <input v-model="formData.subcategory" type="text" class="form-control" id="subcategory"
                                            placeholder="Enter Sub-Category name">
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
                            <h5 class="card-title mb-0">Sub-Category List</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Parent Category</th>
                                        <th>Name</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(subcategory, index) in allSubCategory" :key="index">
                                        <td>{{ ++index }}</td>
                                        <td>{{ subcategory.parent_category_names }}</td>
                                        <td>{{ subcategory.category_name }}</td>
                                        <td>{{ formatRelativeDate(subcategory.created_at) }}</td>
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