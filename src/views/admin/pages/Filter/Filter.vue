<script>
    import Layout from "@/layouts/main.vue";
    import PageHeader from "@/components/page-header";
    import appConfig from "@/../app.config";
    // import axios from '@/axiosInstance.js'
    import { customToastr } from '@/components/Toastr.js';
    import moment from 'moment';

    import DataTable from 'datatables.net-vue3';
    import DataTablesLib from 'datatables.net-bs5';
    import 'datatables.net-buttons';
    import 'datatables.net-buttons/js/buttons.html5';
    import 'datatables.net-responsive';

    DataTable.use(DataTablesLib);

    export default {
        page: {
            title: "Units",
            meta: [{ name: "description", content: appConfig.description }],
        },
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
                    selectedCategory: null,
                    selectedPaymentMethod: null,
                    selectedMonth: null,
                    datePicker: 0,
                    expenseDate: null,
                    fromDate: null,
                    toDate: null,
                },
                monthList: [
                    { label: "January", value: "01" },
                    { label: "February", value: "02" },
                    { label: "March", value: "03" },
                    { label: "April", value: "04" },
                    { label: "May", value: "05" },
                    { label: "June", value: "06" },
                    { label: "July", value: "07" },
                    { label: "August", value: "08" },
                    { label: "September", value: "09" },
                    { label: "October", value: "10" },
                    { label: "November", value: "11" },
                    { label: "December", value: "12" },
                ],
                filteredData: [],
                isChecked: true,
                categoryOptions: [],
                allSubCategory: [],
                paymentMethodsList: null,
                paymentMethodOptions: [],
            };
        },
        setup() {
            const columns = [
                { data: 'index', title: 'No'},
                { data: 'parent_category_names', title: 'Category' },
                { data: 'amount', title: 'Amount' },
                { data: 'formattedDate', title: 'Expense Date' },
                { data: 'payment_method.method', title: 'Payment Method' },
                { data: 'remarks', title: 'Remarks' },
            ];

            const options = {
                dom: 'Bfrtip',
                responsive: true,
                "iDisplayLength": 6,
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            };

            return { columns, options };
        },
        props: ['user'], 
        components: {
            Layout,
            PageHeader,
            DataTable,
        },
        created() {},
        mounted(){
            this.getSubCategories()
            this.fetchPaymentMethods()
        },
        methods: {
            getSubCategories(id = null){
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
                            this.categoryOptions = this.allSubCategory.map(subCategory => ({
                                label: subCategory.parent_category_names + '->' + subCategory.category_name,
                                value: subCategory.id.toString(), // Convert id to string for compatibility with v-select
                            }));
                        }
                    })
                } catch (error) {
                    console.log(error)
                }
            },

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

            getFilteredResult() {
                try {
                    this.isSubmitting = true
                    let payload = {
                        category_id: this.formData.selectedCategory != null ? this.formData.selectedCategory.value : this.formData.selectedCategory,
                        payment_method: this.formData.selectedPaymentMethod != null ? this.formData.selectedPaymentMethod.value : this.formData.selectedPaymentMethod,
                        expense_date: this.formData.expenseDate,
                        from_date: this.formData.fromDate,
                        to_date: this.formData.toDate,
                        type: 'read',
                        subType: 'expenses'
                    };

                    this.axios.post('/filter', payload)
                    .then(response => {
                        if (response.data.status == 200) {
                            customToastr.toastrMessage(response.data.message, "success")

                            // Clear the input fields after successful addition
                            this.resetForm()
                            this.filteredData = response.data.filteredResult.map((expense, index) => {
                                return {
                                    ...expense,
                                    index: index + 1,
                                    formattedDate: this.formatRelativeDate(expense.expense_date),
                                }
                            })

                            // Refresh expense list after adding a new expense
                            // this.fetchExpenses();
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
                this.filteredData = { ...this.initialFilteredData }
            },

            formatRelativeDate(date) {
                return moment(date).fromNow();
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
                    <h4 class="card-title mb-0 flex-grow-1">Filter Expense</h4>
                </div>

                <div class="card-body">
                    <div class="live-preview">
                        <form @submit.prevent="getFilteredResult" action="javascript:void(0);">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Select Category</label>
                                        <v-select v-model="formData.selectedCategory" class="new-styles" placeholder="Choose one" :options="categoryOptions"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Payment Method</label>
                                        <v-select v-model="formData.selectedPaymentMethod" class="new-styles" placeholder="Choose one" :options="paymentMethodOptions"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Month</label>
                                        <v-select v-model="formData.selectedMonth" class="new-styles" placeholder="Choose one" :options="monthList"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <p class="fw-medium">Date Picker</p>
                                        <div class="row mx-1">
                                            <div class="col-md-6 form-check mb-2">
                                                <input v-model="formData.datePicker" class="form-check-input" type="radio" :value="0" :checked="isChecked">
                                                <label class="form-check-label" for="flexRadioDefault1">Specific Date</label>
                                            </div>
                                            <div class="col-md-6 form-check">
                                                <input v-model="formData.datePicker" class="form-check-input" type="radio" :value="1">
                                                <label class="form-check-label" for="flexRadioDefault2">Date Range</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3" v-if="formData.datePicker == 0">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Expense Date</label>
                                        <input v-model="formData.expenseDate" type="date" class="form-control"/>
                                    </div>
                                </div>
                                
                                <div class="col-md-3" v-if="formData.datePicker == 1">
                                    <div class="mb-3">
                                        <label for="" class="form-label">From</label>
                                        <input v-model="formData.fromDate" type="date" class="form-control"/>
                                    </div>
                                </div>
                                
                                <div class="col-md-3" v-if="formData.datePicker == 1">
                                    <div class="mb-3">
                                        <label for="" class="form-label">To</label>
                                        <input v-model="formData.toDate" type="date" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="d-none code-view">
                    </div>
                </div>
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
                            :data="filteredData"
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
    @import '~datatables.net-bs5/css/dataTables.bootstrap5.css';
    @import '~datatables.net-dt/css/jquery.dataTables.css';
    @import '~datatables.net-buttons-dt/css/buttons.dataTables.css';
    @import '~datatables.net-responsive-dt/css/responsive.dataTables.css';
</style>