<script>
    import { subCategoryMethods } from '@/components/SubCategoryMethods';
    import { customToastr } from '@/components/Toastr.vue';
    
    export default {
        data() {
            return {
                formData: {
                    category_id: null,
                    selectedExpense: null,
                    selectedExpenseParent: null,
                    expenseAmount: 0,
                    expenseDate: null,
                    remarks: null,
                    selectedPaymentMethod: null,
                },
                expensesCategories: null,
                expensesCategoriesOptions: [],
                expensesList: [],
                expenseListOptions: [],
                paymentMethodsList: null,
                paymentMethodOptions: [],
            };
        },
        created() {
            this.fetchExpenses();
            this.fetchExpenseSubCategories();
            this.fetchPaymentMethods();
        },
        methods: {
            ...subCategoryMethods,
            
            async fetchPaymentMethods() {
                try {
                    let payload = {
                        type: 'read',
                    }
                    this.axios.post('/payment-methods/data', payload).then(res=>{
                        this.paymentMethodsList = res.data.paymentMethods;

                        this.paymentMethodOptions = this.paymentMethodsList.map(paymentMethods => ({
                            label: paymentMethods.method,
                            value: paymentMethods.id.toString(),
                        }));
                    })
                } catch (error) {
                    console.error("Error fetching payment methods:", error);
                }
            },

            async fetchExpenseSubCategories() {
                try {
                    let payload = {
                        type: 'read',
                    }
                    this.axios.post('/sub-category/data', payload).then(res=>{
                        this.expensesCategories = res.data.subcategories;
                        // console.log(this.expensesCategories)

                        this.expensesCategoriesOptions = this.expensesCategories.map(subcategory => ({
                            label: subcategory.category_name,
                            value: subcategory.id.toString(), // Convert id to string for compatibility with v-select
                            parents: subcategory.parent_category_names,
                        }));
                    })
                } catch (error) {
                    console.error("Error fetching sub-categories:", error);
                }
            },

            async fetchExpenses() {
                try {
                    let payload = {
                        type: 'read',
                    }
                    // this.axios.post('/expenses/data', payload).then(res=>{
                    //     this.expensesList = res.data.expenses
                    //     // console.log(this.expensesList);

                    //     this.expenseListOptions = this.expensesList.map(subcategory => ({
                    //         label: subcategory.category_name,
                    //         value: subcategory.id.toString(),
                    //         parents: subcategory.parent_category_names,
                    //     }))
                    // })

                    const response = await this.axios.post('/expenses/data', payload);
                    this.expensesList = response.data.expenses;
                    // console.log(this.expensesList);

                    this.expenseListOptions = this.expensesList.map(subcategory => ({
                        label: subcategory.category_name,
                        value: subcategory.id.toString(),
                        parents: subcategory.parent_category_names,
                    }))
                } catch (error) {
                    console.error("Error fetching sub-categories:", error);
                }
            },
        
            async addExpense() {
                try {
                    this.isSubmitting = true
                    console.log(this.formData.category_id)
                    let payload = {
                        category_id: this.formData.selectedExpense.value,
                        expense_amount: this.formData.expenseAmount,
                        expense_date: this.formData.expenseDate,
                        payment_method_id: this.formData.selectedPaymentMethod.value,
                        remarks: this.formData.remarks,
                        type: 'create',
                    };

                    console.log(payload)

                    this.axios.post('/expenses/create', payload)
                    .then(response => {
                        // console.log(response)
                        if (response.data.status == 200) {
                            customToastr.toastrMessage(response.data.message, "success")

                            // Clear the input fields after successful addition
                            this.resetForm()

                            // Refresh expense list after adding a new expense
                            this.fetchExpenses();
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

            async getSelectedExpenseParent(id) {
                this.formData.category_id = id.value
                console.log(this.formData.category_id)
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
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Select Source of Expense</label>
                                        <v-select v-model="formData.selectedExpense" @option:selected="value => getSelectedExpenseParent(value)" class="new-styles" placeholder="Choose one" :options="expensesCategoriesOptions"/>
                                    </div>
                                    
                                    <!-- <div class="col-md-6" v-if="formData.selectedExpenseParent != null"></div> -->
                                    <div class="col-md-6">
                                        <label for="subcategory" class="form-label">Expense Parent</label>
                                        <input v-model="formData.selectedExpenseParent" type="text" class="form-control" disabled>
                                    </div>

                                    <!-- <div class="col-md-6">
                                        <label for="subcategory" class="form-label">Expense Name</label>
                                        <input v-model="formData.subcategory" type="text" class="form-control" placeholder="Enter expense name">
                                    </div> -->

                                    <div class="col-md-4">
                                        <label for="subcategory" class="form-label">Expense Amount</label>
                                        <input v-model="formData.expenseAmount" type="text" class="form-control" placeholder="Enter expense name">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="subcategory" class="form-label">Quantity</label>
                                        <input v-model="formData.expenseAmount" type="text" class="form-control" placeholder="Enter quantity">
                                    </div>

                                    <div class="col-md-4">
                                        <label for="subcategory" class="form-label">Unit</label>
                                        <input v-model="formData.expenseAmount" type="text" class="form-control" placeholder="Enter unit">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="subcategory" class="form-label">Expense Date</label>
                                        <input v-model="formData.expenseDate" type="date" class="form-control" placeholder="Enter expense date">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="" class="form-label">Select Payment Method</label>
                                        <v-select v-model="formData.selectedPaymentMethod" @option:selected="value => getSelectedExpenseParent(value)" class="new-styles" placeholder="Choose one" :options="paymentMethodOptions"/>
                                    </div>

                                    <div class="col-md-12">
                                        <label for="subcategory" class="form-label">Remarks</label>
                                        <textarea v-model="formData.remarks" class="form-control" placeholder="Remarks if any.."></textarea>
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
                                        <th>Category</th>
                                        <th>Amount</th>
                                        <th>Expense Date</th>
                                        <th>Payment Method</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(expense, index) in this.expensesList" :key="index">
                                        <td>{{ ++index }}</td>
                                        <td>{{ expense.parent_category_names }}</td>
                                        <td>{{ expense.amount }}</td>
                                        <td>{{ formatRelativeDate(expense.expense_date) }}</td>
                                        <td>{{ expense.payment_method.method }}</td>
                                        <td>{{ expense.remarks }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="#" class="dropdown-item edit-item-btn" @click="openEditModal(expense)">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="dropdown-item delete-item-btn" @click="openDeleteModal(expense)">
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