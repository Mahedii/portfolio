<script>
    import { customToastr } from '@/components/Toastr.vue';
    import moment from 'moment';
    export default {
        data() {
            return {
                formData: {
                    unitName: null,
                },
                fetchedFormData: {
                    selectedMeasurementUnitId: null,
                    unitName: null,
                },
                unitsList: [],
            };
        },
        created() {
            this.fetchMeasurementUnits();
        },
        methods: {
            async fetchMeasurementUnits() {
                try {
                    let payload = {
                        type: 'read',
                    }
                    this.axios.post('/measurement-units/data', payload).then(res=>{
                        this.unitsList = res.data.measurementUnits;
                    })
                } catch (error) {
                    console.error("Error fetching measurement units:", error);
                }
            },
        
            async addUnits() {
                try {
                    this.isSubmitting = true
                    let payload = {
                        unit: this.formData.unitName,
                        type: 'create',
                    };

                    this.axios.post('/measurement-units/create', payload)
                    .then(response => {
                        // console.log(response)
                        if (response.data.status == 200) {
                            customToastr.toastrMessage(response.data.message, "success")

                            // Clear the input fields after successful addition
                            this.resetForm()

                            // Refresh sub-category list after adding a new category
                            this.fetchMeasurementUnits();
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
                if (method == 'update') {
                    var dataObject = this.fetchedFormData
                } else {
                    var dataObject = this.formData
                }

                dataObject.unitName = null
            },

            formatRelativeDate(date) {
                return moment(date).fromNow();
            },

            async updateMeasurementUnit() {
                try {
                    this.isSubmitting = true
                    let payload = {
                        id: this.fetchedFormData.selectedMeasurementUnitId,
                        unitName: this.fetchedFormData.unitName,
                    };

                    console.log(payload)

                    this.axios.post('/measurement-units/update', payload)
                    .then(response => {
                        // console.log(response)
                        if (response.data.status == 200) {
                            customToastr.toastrMessage(response.data.message, "success")

                            jQuery('#editModal').modal('hide')

                            // Clear the input fields after successful addition
                            this.resetForm()

                            // Refresh sub-category list after adding a new category
                            this.fetchMeasurementUnits();
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

            async openEditModal(measurementUnits) {
                let payload = {
                    type: 'read',
                    id: measurementUnits.id,
                }
                const response = await this.axios.post('/measurement-units/data', payload)

                this.fetchedFormData.selectedMeasurementUnitId = measurementUnits.id
                this.fetchedFormData.unitName = measurementUnits.unit_name

                // Open the modal
                jQuery('#editModal').modal('show');
            },

            async changeStatus(id) {
                let payload = {
                    type: 'change-status',
                    id: id,
                }

                const response = await this.axios.post('/units/update', payload)
                if (response.data.status == 200) {
                    this.fetchMeasurementUnits();
                    customToastr.toastrMessage(response.data.message, "success")
                } else {
                    customToastr.toastrMessage(response.data.message, "error")
                }
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
                        <h4 class="mb-sm-0">Units</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Units</a></li>
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
                            <h4 class="card-title mb-0 flex-grow-1">Units</h4>
                        </div>

                        <div class="card-body">
                            <div class="live-preview">
                                <form @submit.prevent="addUnits" class="row g-3">
                                    <div class="col-md-12">
                                        <label for="subcategory" class="form-label">Unit Name</label>
                                        <input v-model="formData.unitName" type="text" class="form-control" placeholder="Enter unit name">
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
                        <form @submit.prevent="updateMeasurementUnit">
                            <div class="modal-header">
                                <h5 class="modal-title" id="varyingcontentModalLabel">Update form</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <!-- Bind form fields to data properties -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Unit</label>
                                    <input v-model="fetchedFormData.unitName" type="text" class="form-control" placeholder="Enter unit name">
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
                            <h5 class="card-title mb-0">Units List</h5>
                        </div>
                        <div class="card-body">
                            <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unit</th>
                                        <th>Status</th>
                                        <th>Created</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(measurementUnits, index) in unitsList" :key="index">
                                        <td>{{ ++index }}</td>
                                        <td>{{ measurementUnits.unit_name }}</td>
                                        <td>
                                            <button v-if="measurementUnits.status == '1'" class="btn btn-soft-danger mx-2" @click="changeStatus(measurementUnits.id)">Disable</button>
                                            <button v-else class="btn btn-soft-success mx-2" @click="changeStatus(measurementUnits.id)">Enable</button>
                                        </td>
                                        <td>{{ formatRelativeDate(measurementUnits.created_at) }}</td>
                                        <td>
                                            <div class="dropdown d-inline-block">
                                                <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="ri-more-fill align-middle"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a href="#" class="dropdown-item edit-item-btn" @click="openEditModal(measurementUnits)">
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
    </div>
</template>