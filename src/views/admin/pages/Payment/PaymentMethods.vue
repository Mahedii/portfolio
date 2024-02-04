<script>
    import Layout from "@/layouts/main.vue";
    import PageHeader from "@/components/page-header";
    import appConfig from "@/../app.config";
    // import axios from '@/axiosInstance.js'
    import { customToastr } from '@/components/Toastr.js';
    import moment from 'moment';
    import jQuery from 'jquery'
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
                    methodName: null,
                },
                fetchedFormData: {
                    selectedPaymentMethodId: null,
                    methodName: null,
                    accountName: null,
                    accountNumber: null,
                    bankName: null,
                    expireDate: null,
                    cvc: null,
                },
                paymentMethodsList: [],
            };
        },
        components: {
            Layout,
            PageHeader,
        },
        created() {
            this.fetchPaymentMethods();
        },
        methods: {
            async fetchPaymentMethods() {
                try {
                    let payload = {
                        type: 'read',
                    }
                    this.axios.post('/payment-methods/data', payload).then(res=>{
                        this.paymentMethodsList = res.data.paymentMethods;
                    })
                } catch (error) {
                    console.error("Error fetching payment methods:", error);
                }
            },
        
            async addPaymentMethods() {
                try {
                    this.isSubmitting = true
                    let payload = {
                        method: this.formData.methodName,
                        type: 'create',
                    };

                    this.axios.post('/payment-methods/create', payload)
                    .then(response => {
                        // console.log(response)
                        if (response.data.status == 200) {
                            customToastr.toastrMessage(response.data.message, "success")

                            // Clear the input fields after successful addition
                            this.resetForm()

                            // Refresh sub-category list after adding a new category
                            this.fetchPaymentMethods();
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

            async resetForm(method = null) {
                var dataObject = null
                if (method == 'update') {
                    dataObject = this.fetchedFormData
                } else {
                    dataObject = this.formData
                }

                dataObject.methodName = null
            },

            formatRelativeDate(date) {
                return moment(date).fromNow();
            },

            async updatePaymentMethodInfos() {
                try {
                    this.isSubmitting = true
                    let payload = {
                        id: this.fetchedFormData.selectedPaymentMethodId,
                        methodName: this.fetchedFormData.methodName,
                        accountName: this.fetchedFormData.accountName,
                        accountNumber: this.fetchedFormData.accountNumber,
                        bankName: this.fetchedFormData.bankName,
                        expireDate: this.fetchedFormData.expireDate,
                        cvc: this.fetchedFormData.cvc,
                        type: 'update',
                    };

                    console.log(payload)

                    this.axios.post('/payment-methods/update', payload)
                    .then(response => {
                        // console.log(response)
                        if (response.data.status == 200) {
                            customToastr.toastrMessage(response.data.message, "success")

                            jQuery('#editModal').modal('hide')

                            // Clear the input fields after successful addition
                            this.resetForm()

                            // Refresh sub-category list after adding a new category
                            this.fetchPaymentMethods();
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

            async openEditModal(paymentMethods) {
                let payload = {
                    type: 'read',
                    subType: 'payment-method-info',
                    id: paymentMethods.id,
                }
                const response = await this.axios.post('/payment-methods/data', payload)

                this.fetchedFormData.selectedPaymentMethodId = paymentMethods.id
                this.fetchedFormData.methodName = paymentMethods.method

                if (response.data.paymentMethodWithInfos.length > 0) {
                    this.fetchedFormData.accountName = response.data.paymentMethodWithInfos[0].account_name
                    this.fetchedFormData.accountNumber = response.data.paymentMethodWithInfos[0].account_number
                    this.fetchedFormData.bankName = response.data.paymentMethodWithInfos[0].bank_name
                    this.fetchedFormData.expireDate = response.data.paymentMethodWithInfos[0].expire_date
                    this.fetchedFormData.cvc = response.data.paymentMethodWithInfos[0].cvc
                }

                // Open the modal
                jQuery('#editModal').modal('show');
            },

            async changeStatus(id) {
                let payload = {
                    type: 'change-status',
                    id: id,
                }

                const response = await this.axios.post('/payment-methods/update', payload)
                if (response.data.status == 200) {
                    this.fetchPaymentMethods();
                    customToastr.toastrMessage(response.data.message, "success")
                } else {
                    customToastr.toastrMessage(response.data.message, "error")
                }
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
                        <h4 class="card-title mb-0 flex-grow-1">Payment Methods</h4>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <form @submit.prevent="addPaymentMethods" class="row g-3">
                                <div class="col-md-12">
                                    <label for="subcategory" class="form-label">Method Name</label>
                                    <input v-model="formData.methodName" type="text" class="form-control" placeholder="Enter method name">
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

        <!-- Edit Modal content -->
        <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="updatePaymentMethodInfos">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyingcontentModalLabel">Update form</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- Bind form fields to data properties -->
                            <div class="mb-3">
                                <label for="" class="form-label">Payment Method</label>
                                <input v-model="fetchedFormData.methodName" type="text" class="form-control" placeholder="Enter method name">
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Account Name</label>
                                <input v-model="fetchedFormData.accountName" type="text" class="form-control" placeholder="Enter account name">
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Account Number</label>
                                <input v-model="fetchedFormData.accountNumber" type="text" class="form-control" placeholder="Enter account number">
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Bank Name</label>
                                <input v-model="fetchedFormData.bankName" type="text" class="form-control" placeholder="Enter bank name">
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">Expire Date</label>
                                <input v-model="fetchedFormData.expireDate" type="date" class="form-control" placeholder="Enter account expire date">
                            </div>
                            
                            <div class="mb-3">
                                <label for="" class="form-label">CVC</label>
                                <input v-model="fetchedFormData.cvc" type="text" class="form-control" placeholder="Enter cvc no">
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

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Payment Methods List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Method</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(paymentMethods, index) in paymentMethodsList" :key="index">
                                        <td>{{ ++index }}</td>
                                        <td>{{ paymentMethods.method }}</td>
                                        <td>
                                            <button v-if="paymentMethods.status == '1'" class="btn btn-soft-danger mx-2" @click="changeStatus(paymentMethods.id)">Disable</button>
                                            <button v-else class="btn btn-soft-success mx-2" @click="changeStatus(paymentMethods.id)">Enable</button>
                                        </td>
                                        <td>{{ formatRelativeDate(paymentMethods.created_at) }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="#" class="dropdown-item edit-item-btn" @click="openEditModal(paymentMethods)">
                                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                            Edit
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
    </Layout>
</template>