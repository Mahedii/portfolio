<script>
    import Layout from "@/layouts/main.vue";
    import PageHeader from "@/components/page-header";
    import appConfig from "@/../app.config";
    // import axios from '@/axiosInstance.js'
    import { subCategoryMethods } from '@/components/SubCategoryMethods';
    import { customToastr } from '@/components/Toastr.js';

    // import VdtnetTable from 'vue-datatables-net'
    import DataTable from 'datatables.net-vue3';
    import DataTablesLib from 'datatables.net-bs5';
    import 'datatables.net-buttons';
    import 'datatables.net-buttons/js/buttons.html5';
    import 'datatables.net-responsive';

    import jszip from 'jszip';
    import pdfmake from 'pdfmake';

    DataTable.use(DataTablesLib);
    DataTablesLib.Buttons.jszip(jszip);
    DataTablesLib.Buttons.pdfMake(pdfmake);

    //Bootstrap and jQuery libraries
    // import 'bootstrap/dist/css/bootstrap.min.css'

    
    export default {
        page: {
            title: "Units",
            meta: [{ name: "description", content: appConfig.description }],
        },
        components: {
            Layout,
            PageHeader,
            DataTable,
        },
        // props: {
        //     expensesList: {
        //         type: Array,
        //         default: () => [],
        //     },
        // },
        setup() {
            const columns = [
                // {
                //     title: 'No',
                //     render(data, type, row, meta) {
                //         return type === 'display' ? meta.row + 1 : meta.row;
                //     },
                // },
                { data: 'index', title: 'No'},
                { data: 'parent_category_names', title: 'Category' },
                { data: 'amount', title: 'Amount' },
                { data: 'formattedDate', title: 'Expense Date' },
                { data: 'payment_method.method', title: 'Payment Method' },
                { data: 'remarks', title: 'Remarks' },
                { 
                    data: null, 
                    orderable: false, 
                    title: 'Action',
                    render: function (data) { 
                        // return '<button @click="deletePid(' + data.id + ')">Delete</button>'; 
                        return '<div class="dropdown d-inline-block">' +
                                    '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                                        '<i class="ri-more-fill align-middle"></i>' +
                                        '</button>' +
                                        '<ul class="dropdown-menu dropdown-menu-end">' +
                                            '<li>' +
                                                '<a class="dropdown-item edit-item-btn" @click="openEditModal(' + data.id + ')">' +
                                                    '<i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit' +
                                                '</a>' +
                                            '</li>' +
                                            '<li>' +
                                                '<a href="#" class="dropdown-item delete-item-btn" @click="openDeleteModal(row)">' +
                                                    '<i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete' +
                                                '</a>' +
                                            '</li>' +
                                        '</ul>' +
                                    '</div>';
                    }, 
                }
            ];

            const options = {
                dom: 'Bfrtip',
                responsive: true,
                "iDisplayLength": 6,
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                // select: true,
                // ordering: true,
                // paging: true,
                // lengthMenu: [10, 25, 50, 75, 100],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
                // initComplete: function () {
                //     // Attach click event listeners to the Edit and Delete buttons
                //     jQuery('#example').on('click', '.edit-item-btn', function () {
                //         const rowData = table.row(jQuery(this).closest('tr')).data();
                //         openEditModal(rowData);
                //     });

                //     jQuery('#example').on('click', '.delete-item-btn', function () {
                //         const rowData = table.row(jQuery(this).closest('tr')).data();
                //         openDeleteModal(rowData);
                //     });
                // },
                // columnDefs: [
                //     {
                //         targets: -1, // Action column
                //         // createdRow(row, data, dataIndex) {
                //         //     // Create a new Vue instance for the rendered row
                //         //     const vm = new Vue({ el: row });

                //         //     // Add click event listeners using Vue methods
                //         //     vm.$on('edit-item', () => {
                //         //         // Access the row data
                //         //         console.log('Edit clicked:', data);
                //         //         // Call your edit method here
                //         //         vm.$emit('open-edit-modal', data);
                //         //     });

                //         //     vm.$on('delete-item', () => {
                //         //         // Access the row data
                //         //         console.log('Delete clicked:', data);
                //         //         // Call your delete method here
                //         //         vm.$emit('open-delete-modal', data);
                //         //     });
                //         // },
                //         render(data, type, row) {
                //             return `
                //                 <div class="dropdown d-inline-block">
                //                     <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                //                     <i class="ri-more-fill align-middle"></i>
                //                     </button>
                //                     <ul class="dropdown-menu dropdown-menu-end">
                //                     <li>
                //                         <a class="dropdown-item edit-item-btn" @click="openEditModal()">
                //                             <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                //                         </a>
                //                     </li>
                //                     <li>
                //                         <a href="#" class="dropdown-item delete-item-btn" @click="openDeleteModal(row)">
                //                         <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
                //                         Delete
                //                         </a>
                //                     </li>
                //                     </ul>
                //                 </div>
                //                 `;
                //         },
                //         // render(data, type, row) {
                //         //     return `<table-action :row="row"></table-action>`;
                //         // },
                //         // component: TableAction,
                //         // createdCell(cell, cellData, rowData, rowIndex, colIndex) {
                //         //     // Use jQuery to attach event listeners
                //         //     jQuery(cell).find('.edit-item-btn').on('click', () => {
                //         //         // Access rowData or use other logic as needed
                //         //         console.log('Edit button clicked:', rowData);
                //         //         // Call your Vue method here if needed
                //         //         // Example: vm.openEditModal(rowData);
                //         //     });

                //         //     jQuery(cell).find('.delete-item-btn').on('click', () => {
                //         //         console.log('Delete button clicked:', rowData);
                //         //         // Call your Vue method here if needed
                //         //         // Example: vm.openDeleteModal(rowData);
                //         //     });
                //         // },
                //     },
                // ],
            };

            return { columns, options };
        },
        // setup() {
        //     const columns = [
        //         { data: 'name' },
        //         { data: 'position' },
        //         { data: 'office' },
        //         { data: 'extn' },
        //         { data: 'start_date' },
        //         { data: 'salary' },
        //     ];

        //     const options = {
        //         dom: 'Bftip',
        //         responsive: true,
        //         select: true,
        //         ordering: true,
        //         paging: true,
        //         lengthMenu: [10, 25, 50, 75, 100],
        //         buttons: ['copy', 'csv', 'excel'],
        //     };

        //     return { columns, options };
        // },
        data() {
            return {
                title: "Units",
                items: [
                    {
                        text: "Create",
                        href: "/",
                    },
                    {
                        text: "Units",
                        active: true,
                    },
                ],
                formData: {
                    category_id: null,
                    selectedExpense: null,
                    selectedExpenseParent: null,
                    expenseAmount: 0,
                    expenseDate: null,
                    quantity: null,
                    remarks: null,
                    selectedUnit: null,
                    selectedPaymentMethod: null,
                },
                fetchedFormData: {
                    category_id: null,
                    selectedExpense: null,
                    selectedExpenseParent: null,
                    expenseAmount: 0,
                    expenseDate: null,
                    quantity: null,
                    remarks: null,
                    selectedUnit: null,
                    selectedPaymentMethod: null,
                },
                unitsList: [],
                unitsListOptions: [],
                expensesCategories: [],
                expensesCategoriesOptions: [],
                expensesList: [],
                expenseListOptions: [],
                paymentMethodsList: null,
                paymentMethodOptions: [],
            };
        },
        created() {
            this.initialFormData = { ...this.formData }
            this.fetchExpenses();
            this.fetchMeasurementUnits();
            this.fetchExpenseSubCategories();
            this.fetchPaymentMethods();
        },
        // computed: {
        //     formattedExpensesList() {
        //         return this.expensesList.map((expense, index) => ({
        //             ...expense,
        //             index: index + 1,
        //             formattedDate: this.formatRelativeDate(expense.expense_date),
        //             action: `<button class="btn btn-sm btn-primary" @click="openEditModal(${index})">Edit</button>
        //                     <button class="btn btn-sm btn-danger" @click="openDeleteModal(${index})">Delete</button>`,
        //         }));
        //     },
        // },
        methods: {
            ...subCategoryMethods,
            
            fetchPaymentMethods() {
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

            fetchMeasurementUnits() {
                try {
                    let payload = {
                        type: 'read',
                    }
                    this.axios.post('/measurement-units/data', payload).then(res=>{
                        this.unitsList = res.data.measurementUnits;

                        this.unitsListOptions = this.unitsList.map(unit => ({
                            label: unit.unit_name,
                            value: unit.id.toString(),
                        }));
                    })
                } catch (error) {
                    console.error("Error fetching measurement units:", error);
                }
            },

            fetchExpenseSubCategories() {
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
                    // this.expensesList = response.data.expenses;
                    this.expensesList = response.data.expenses.map((expense, index) => {
                        return {
                            ...expense,
                            index: index + 1,
                            formattedDate: this.formatRelativeDate(expense.expense_date),
                        }
                    })
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
                    if (this.formData.selectedUnit != null) {
                        this.formData.selectedUnit = this.formData.selectedUnit.value
                    }
                    let payload = {
                        category_id: this.formData.selectedExpense.value,
                        expense_amount: this.formData.expenseAmount,
                        expense_date: this.formData.expenseDate,
                        unit_id: this.formData.selectedUnit,
                        quantity: this.formData.quantity,
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

            resetForm(method = null) {
                console.log(method)
                // Reset form fields and selected values
                // dataObject.selectedCategory = null
                this.formData = { ...this.initialFormData }
            },

            async openEditModal(id) {
                console.log("expense: " + id)
                // this.fetchedFormData.selectedExpense = expense.category_id
                // this.fetchedFormData.expenseAmount = expense.unit_name
                // this.fetchedFormData.quantity = expense.category_id
                // this.fetchedFormData.selectedUnit = expense.unit_name
                // this.fetchedFormData.expenseDate = expense.category_id
                // this.fetchedFormData.selectedPaymentMethod = expense.unit_name
                // this.fetchedFormData.remarks = expense.category_id
                // this.fetchedFormData.expenseAmount = expense.unit_name

                // Open the modal
                // jQuery('#editModal').modal('show');
            },

            async getSelectedExpenseParent(id) {
                this.formData.category_id = id.value
                console.log(this.expensesCategories)
                console.log(JSON.parse(JSON.stringify(this.expensesCategories)))

                var result = JSON.parse(JSON.stringify(this.expensesCategories)).filter((item) => {
                    if (item.id == this.formData.category_id) {
                        return item
                    }
                })
                this.formData.selectedExpenseParent = result[0].parent_category_names
            },
        },
    };
</script>

<template>
    <Layout>
        <PageHeader :title="title" :items="items" />

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
                                
                                <div class="col-md-6">
                                    <label for="" class="form-label">Expense Parent</label>
                                    <input v-model="formData.selectedExpenseParent" type="text" class="form-control" disabled>
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">Expense Amount</label>
                                    <input v-model="formData.expenseAmount" type="text" class="form-control" placeholder="Enter expense name">
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">Quantity</label>
                                    <input v-model="formData.quantity" type="text" class="form-control" placeholder="Enter quantity">
                                </div>

                                <div class="col-md-4">
                                    <label for="" class="form-label">Unit</label>
                                    <v-select v-model="formData.selectedUnit" class="new-styles" placeholder="Choose one" :options="unitsListOptions"/>
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Expense Date</label>
                                    <input v-model="formData.expenseDate" type="date" class="form-control" placeholder="Enter expense date">
                                </div>

                                <div class="col-md-6">
                                    <label for="" class="form-label">Select Payment Method</label>
                                    <v-select v-model="formData.selectedPaymentMethod" class="new-styles" placeholder="Choose one" :options="paymentMethodOptions"/>
                                </div>

                                <div class="col-md-12">
                                    <label for="" class="form-label">Remarks</label>
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
            </div>
        </div>

        <!-- Edit Modal content -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="updateExpense">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyingcontentModalLabel">Update form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Bind form fields to data properties -->
                            <div class="row g-3">
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Select Source of Expense</label>
                                    <v-select v-model="fetchedFormData.selectedExpense" @option:selected="value => getSelectedExpenseParent(value)" class="new-styles" placeholder="Choose one" :options="expensesCategoriesOptions"/>
                                </div>
                                
                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Expense Parent</label>
                                    <input v-model="fetchedFormData.selectedExpenseParent" type="text" class="form-control" disabled>
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">Expense Amount</label>
                                    <input v-model="fetchedFormData.expenseAmount" type="text" class="form-control" placeholder="Enter expense name">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">Quantity</label>
                                    <input v-model="fetchedFormData.quantity" type="text" class="form-control" placeholder="Enter quantity">
                                </div>

                                <div class="col-md-4 mb-3">
                                    <label for="" class="form-label">Unit</label>
                                    <v-select v-model="fetchedFormData.selectedUnit" class="new-styles" placeholder="Choose one" :options="unitsListOptions"/>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Expense Date</label>
                                    <input v-model="fetchedFormData.expenseDate" type="date" class="form-control" placeholder="Enter expense date">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label for="" class="form-label">Select Payment Method</label>
                                    <v-select v-model="fetchedFormData.selectedPaymentMethod" class="new-styles" placeholder="Choose one" :options="paymentMethodOptions"/>
                                </div>

                                <div class="col-md-12 mb-3">
                                    <label for="" class="form-label">Remarks</label>
                                    <textarea v-model="fetchedFormData.remarks" class="form-control" placeholder="Remarks if any.."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Expense List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <DataTable
                            :columns="columns"
                            :data="expensesList"
                            class="table table-bordered table-hover table-striped dt-responsive align-middle mb-0 nowrap display"
                            width="100%"
                            :options="options"
                            >
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
                            </DataTable>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Layout>
</template>

<style>
    /* @import url('https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.13.8/dataTables.bootstrap5.css'); */
    /* @import url('https://cdnjs.cloudflare.com/ajax/libs/datatables.net-dt/2.1.1/css/jquery.dataTables.css'); */
    @import '~datatables.net-bs5/css/dataTables.bootstrap5.css';
    @import '~datatables.net-dt/css/jquery.dataTables.css';
    @import '~datatables.net-buttons-dt/css/buttons.dataTables.css';
    @import '~datatables.net-responsive-dt/css/responsive.dataTables.css';
    /* @import 'bootstrap'; */
    /* @import 'datatables.net-bs5'; */
    /* @import 'datatables.net-dt'; */
    /* @import 'datatables.net-buttons-dt'; */
    /* @import 'datatables.net-responsive-dt'; */
</style>
