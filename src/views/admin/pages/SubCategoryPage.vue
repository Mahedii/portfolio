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
                                <SubCategoryForm
                                    :formData="formData"
                                    :options="options"
                                    :subcategoriesOptions="subcategoriesOptions"
                                    @get-selected-subcategories="getSelectedSubCategories"
                                    @submit-form="addSubCategory"
                                />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title mb-0">Sub-Category List</h5>
                        </div>
                        <div class="card-body">
                            <SubCategoryList :allSubCategory="allSubCategory" :formatRelativeDate="formatRelativeDate" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
  
<script>
    import SubCategoryForm from '@/components/SubCategoryForm.vue';
    import SubCategoryList from '@/components/SubCategoryList.vue';
    import { toast } from 'vue3-toastify';
    import 'vue3-toastify/dist/index.css';
    import axios from 'axios';
    import moment from 'moment';
    
    export default {
        components: {
            SubCategoryForm,
            SubCategoryList,
        },
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
                categories: [],
                allSubCategory: [],
            };
        },
        created() {
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
                    if (this.formData.numberOfSubcategories > 0) {
                        this.formData.selectedSubcategories = []
                        this.formData.numberOfSubcategories = 0
                    }
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

            async addSubCategory(updatedFromData = null) {
                try {
                    this.isSubmitting = true
                    this.formData = updatedFromData
                    this.categoryTreeArray.filter((value, index) => {
                        if (index == 0) {
                            this.categoryTree = value
                        } else {
                            this.categoryTree = this.categoryTree + "," + value
                        }
                    })
                    // console.log(formData)
                    // this.formData.subcategory = 'by road'
                    let payload = {
                        category_id: this.lastSelectedCategoryId, // Use last selected category id
                        parents: this.categoryTree,
                        subcategory: this.formData.subcategory,
                        type: 'create',
                    };

                    axios.post('/sub-category/create', payload)
                    .then(response => {
                        console.log(response);
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
                    axios.post('/category/data', payload).then(res=>{
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
                    return axios.post('/sub-category/data', payload).then(res=>{
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
  