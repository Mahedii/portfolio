<script>
    import { subCategoryMethods } from '@/components/SubCategoryMethods'; // Adjust the path accordingly
    
    export default {
        data() {
            return {
                formData: {
                    id: null,
                    selectedExpense: null,
                    selectedExpenseParent: null,
                    expenseAmount: 0
                },
                expenseListOptions: [],
            };
        },
        created() {
            this.fetchExpenseSubCategories();
        },
        methods: {
            ...subCategoryMethods,
        
            async addExpense() {
                try {
                    this.isSubmitting = true
                    let payload = {
                        category_id: this.formData.id,
                        expense_amount: this.formData.expenseAmount,
                        type: 'create',
                    };

                    this.axios.post('/sub-category/create', payload)
                    .then(response => {
                        // console.log(response)
                        if (response.data.status == 200) {
                            customToastr.toastrMessage(response.data.message, "success")

                            // Clear the input fields after successful addition
                            this.resetForm()

                            // Refresh sub-category list after adding a new category
                            this.getSubCategories();
                        } else {
                            customToastr.toastrMessage(response.data.message, "error")
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

            async fetchExpenseSubCategories() {
                try {
                    let payload = {
                        type: 'read',
                    }
                    this.axios.post('/sub-category/data', payload).then(res=>{
                        this.expensesList = res.data.subcategories;
                        // console.log(res.data.subcategories);

                        this.expenseListOptions = this.expensesList.map(subcategory => ({
                            label: subcategory.category_name,
                            value: subcategory.id.toString(), // Convert id to string for compatibility with v-select
                            parents: subcategory.parent_category_names,
                        }));
                    })
                } catch (error) {
                    console.error("Error fetching sub-categories:", error);
                }
            },

            async getSelectedExpenseParent(id) {
                this.expensesList.filter((value, index) => {
                    if (value.id == id.value) {
                        this.formData.id = id.value
                        this.formData.selectedExpenseParent = value.parent_category_names
                    }
                })
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
                        <h4 class="mb-sm-0">Expense</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Expense</a></li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Expense</h4>
                        </div>

                        <div class="card-body">
                            <div class="live-preview">
                                <form @submit.prevent="addExpense" class="row g-3">
                                    <div class="col-md-6" v-if="formData.selectedExpenseParent != null">
                                        <label for="subcategory" class="form-label">Expense Parent</label>
                                        <input v-model="formData.selectedExpenseParent" type="text" class="form-control" disabled>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Select Expense</label>
                                        <v-select v-model="formData.selectedExpense" @option:selected="value => getSelectedExpenseParent(value)" class="new-styles" placeholder="Choose one" :options="expenseListOptions"/>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <label for="subcategory" class="form-label">Expense Name</label>
                                        <input v-model="formData.subcategory" type="text" class="form-control" placeholder="Enter expense name">
                                    </div> -->

                                    <div class="col-md-6">
                                        <label for="subcategory" class="form-label">Expense Amount</label>
                                        <input v-model="formData.expenseAmount" type="text" class="form-control" placeholder="Enter expense name">
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
                            <h5 class="card-title mb-0">Expense List</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Parent</th>
                                        <th>Name</th>
                                        <th>Amount</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- <tr v-for="(subcategory, index) in allSubCategory" :key="index">
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
                                    </tr> -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>