<script>
    import { subCategoryMethods } from '@/components/SubCategoryMethods'; // Adjust the path accordingly
    
    export default {
        data() {
            return {
                formData: {
                    selectedCategory: null,
                    selectedSubcategories: [],
                    numberOfSubcategories: 0,
                    subcategory: "",
                },
                fetchedFormData: {
                    id: null,
                    selectedCategory: null,
                    selectedSubcategories: [],
                    numberOfSubcategories: 0,
                    subcategory: "",
                    parentCategories: "",
                    categoryName: ""
                },
                lastSelectedCategoryId: null,
                categoryTree: null,
                categoryTreeArray: [],
                subcategoriesOptions: [],
                options: [],
                categories: [], // Store the fetched categories here
                allSubCategory: [],
                isEditModalOpen: false,
            };
        },
        created() {
            this.fetchCategories();
            this.getSubCategories();
        },
        methods: {
            ...subCategoryMethods,
        
            // Your component-specific methods, if any
        
            // For example:
            openEditMOdal(subcategory) {
                // Assign the selected subcategory to the data property
                // this.editedSubcategory = { ...subcategory };
                this.isEditModalOpen = true;
                this.fetchedFormData.id = subcategory.id
                this.fetchedFormData.subcategory = subcategory.category_name
                this.fetchedFormData.parentCategories = subcategory.parent_category_names

                // Open the modal
                jQuery('#editModal').modal('show');
            },

            openDeleteMOdal(subcategory) {
                this.fetchedFormData.id = subcategory.id
                this.fetchedFormData.categoryName = subcategory.category_name
                // Open the modal
                jQuery('#deleteModal').modal('show');
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
                                        <v-select v-model="formData.selectedCategory" @option:selected="value => getSelectedSubCategories(value, null, null)" class="new-styles" placeholder="Choose one" :options="options"/>
                                    </div>

                                    <!-- Loop to dynamically create v-select components -->
                                    <div v-for="(selectedSubcategory, index) in formData.selectedSubcategories" :key="index" class="col-md-6">
                                        <label :for="'subcategory' + (index + 1)" class="form-label">Select Subcategory</label>
                                        <v-select v-model="formData.selectedSubcategories[index]" :data-index="index" @option:selected="value => getSelectedSubCategories(value, index, null)" class="new-styles" :placeholder="'Choose one'" :options="subcategoriesOptions[index]"/>
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

            <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">Click me</button> -->

            <!-- Edit Modal content -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form @submit.prevent="updateSubcategory">
                            <div class="modal-header">
                                <h5 class="modal-title" id="varyingcontentModalLabel">New message</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Bind form fields to data properties -->
                                <div class="mb-3">
                                    <label for="subcategory" class="form-label">Parent Category</label>
                                    <input v-model="fetchedFormData.parentCategories" type="text" class="form-control" disabled>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Change Category</label>
                                    <v-select v-model="fetchedFormData.selectedCategory" @option:selected="value => getSelectedSubCategories(value, null, 'update')" class="new-styles" placeholder="Choose one" :options="options"/>
                                </div>
                                <div v-for="(selectedSubcategory, index) in fetchedFormData.selectedSubcategories" :key="index" class="mb-3">
                                    <label :for="'subcategory' + (index + 1)" class="form-label">Select Subcategory</label>
                                    <v-select v-model="fetchedFormData.selectedSubcategories[index]" :data-index="index" @option:selected="value => getSelectedSubCategories(value, index, 'update')" class="new-styles" :placeholder="'Choose one'" :options="subcategoriesOptions[index]"/>
                                </div>
                                <div class="mb-3">
                                    <label for="subcategory" class="form-label">Subcategory Name</label>
                                    <input v-model="fetchedFormData.subcategory" type="text" class="form-control" id="subcategory"
                                            placeholder="Enter Sub-Category name">
                                </div>

                                <!-- Add other form fields as needed -->
                                
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Delete Modal content -->
            <div id="deleteModal" class="modal fade" tabindex="-1" aria-hidden="true" style="display: none;">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-body text-center p-5">
                            <div class="text-end">
                                <button type="button" class="btn-close text-end" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="mt-2">
                                <!-- <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon> -->
                                <!-- <lord-icon src="https://cdn.lordicon.com/tqywkdcz.json" trigger="hover" style="width:150px;height:150px"></lord-icon> -->
                                <h4 class="mb-3 mt-4">Are you sure?</h4>
                                <p class="text-muted fs-15 mb-4">You won't be able to revert this!?</p>
                                <div class="hstack gap-2 justify-content-center">
                                    <button class="btn btn-soft-danger" data-bs-dismiss="modal" aria-label="close" style="display: inline-block;">Cancel</button>
                                    <button class="btn btn-soft-success" @click="deleteSubcategory">Yes</button>
                                </div>
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
                                                        <a href="#" class="dropdown-item edit-item-btn" @click="openEditMOdal(subcategory)">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item delete-item-btn" @click="openDeleteMOdal(subcategory)">
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