<script>
    import Layout from "@/layouts/main.vue";
    import PageHeader from "@/components/page-header";
    import appConfig from "@/../app.config";
    import jQuery from 'jquery'
    import { subCategoryMethods } from '@/components/SubCategoryMethods'; // Adjust the path accordingly

    import DataTable from 'datatables.net-vue3';
    import DataTablesLib from 'datatables.net-bs5';
    import 'datatables.net-buttons';
    import 'datatables.net-buttons/js/buttons.html5';
    import 'datatables.net-responsive';

    // import bootstrap from 'bootstrap';
    import { ref, onMounted, reactive } from 'vue';


    // import ActionColumn from './ActionColumn.vue';
    // import { ref } from 'vue';

    import moment from 'moment';

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
                categoryOptions: [],
                isEditModalOpen: false,
            };
        },
        components: {
            Layout,
            PageHeader,
            DataTable,
        },
        setup() {
            // const openEditModal = (id = null) => {
            //     console.log("ye: " + id);
            // };
            // const openDeleteModal = (id = null) => {
            //     console.log("ye: " + id);
            // };
            const columns = [
                // { data: 'index', title: 'No'},
                // { data: 'parent_category_names', title: 'Category Tree' },
                // { data: 'formattedDate', title: 'Created' },
                {
                    data: null,
                    title: 'No',
                    render: function (data, type, row, meta) {
                        return type === 'display' ? meta.row + 1 : meta.row;
                    },
                },
                {
                    data: null,
                    title: 'Category Tree',
                    render: function (data) {
                        return data.parent_category_names != '' ? data.parent_category_names + '->' + data.category_name : data.category_name;
                    },
                },
                { data: 'category_name', title: 'Name' },
                {
                    data: null,
                    title: 'Created',
                    render: function (data) {
                        return moment(data.created_at).fromNow();
                    },
                },
                // { 
                //     data: null, 
                //     orderable: false, 
                //     title: 'Action',
                //     render: function (data) { 
                //         // return '<button @click="deletePid(' + data.id + ')">Delete</button>'; 
                //         return '<div class="dropdown d-inline-block">' +
                //                     '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                //                         '<i class="ri-more-fill align-middle"></i>' +
                //                         '</button>' +
                //                         '<ul class="dropdown-menu dropdown-menu-end">' +
                //                             '<li>' +
                //                                 '<a id="edit-item-btn" class="dropdown-item edit-item-btn" v-on:click="openEditModal()">' +
                //                                     '<i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit' +
                //                                 '</a>' +
                //                             '</li>' +
                //                             '<li>' +
                //                                 '<a href="#" class="dropdown-item delete-item-btn" @click="openDeleteModal(' + data.id + ')">' +
                //                                     '<i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete' +
                //                                 '</a>' +
                //                             '</li>' +
                //                         '</ul>' +
                //                     '</div>';
                //     }, 
                // }
                {
                    data: null,
                    orderable: false,
                    title: 'Action',
                    render: function (data) {
                        return '<div class="dropdown d-inline-block">' +
                        '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                        '<i class="ri-more-fill align-middle"></i>' +
                        '</button>' +
                        '<ul class="dropdown-menu dropdown-menu-end">' +
                        '<li>' +
                        '<a id="edit-item-btn" data-id="' + data.id + '" class="dropdown-item edit-item-btn">' +
                        '<i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit' +
                        '</a>' +
                        '</li>' +
                        '</ul>' +
                        '</div>';
                    },
                }
                // {
                //     data: null,
                //     orderable: false,
                //     title: 'Action',
                //     render: function (data, type, row, meta) {
                //         return '<div class="dropdown d-inline-block">' +
                //         '<button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">' +
                //         '<i class="ri-more-fill align-middle"></i>' +
                //         '</button>' +
                //         '<ul class="dropdown-menu dropdown-menu-end">' +
                //         '<li>' +
                //         '<a class="dropdown-item edit-item-btn" data-index="' + meta.row + '">' +
                //         '<i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit' +
                //         '</a>' +
                //         '</li>' +
                //         '</ul>' +
                //         '</div>';
                //     },
                // },
                // { 
                //     data: null, 
                //     orderable: false, 
                //     title: 'Action',
                //     render: (data) => { 
                //         return (
                //             <div class="dropdown d-inline-block">
                //                 <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                //                     <i class="ri-more-fill align-middle"></i>
                //                 </button>
                //                 <ul class="dropdown-menu dropdown-menu-end">
                //                     <li>
                //                         <a id="edit-item-btn" class="dropdown-item edit-item-btn" onClick={() => openEditModal(data.id)}>
                //                             <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                //                         </a>
                //                     </li>
                //                     <li>
                //                         <a href="#" class="dropdown-item delete-item-btn" onClick={() => openDeleteModal(data)}>
                //                             <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Delete
                //                         </a>
                //                     </li>
                //                 </ul>
                //             </div>
                //         );
                //     }, 
                // }
            ];

            const dataTableOptions = {
                dom: 'Bfrtip',
                responsive: true,
                "iDisplayLength": 6,
                lengthMenu: [
                    [ 10, 25, 50, -1 ],
                    [ '10 rows', '25 rows', '50 rows', 'Show all' ]
                ],
                buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            };

            const modal = reactive({
                isEditModalOpen: false, // Add a data property to control the modal's visibility
                show: 'modal fade ',
                ariaHidden: true,
                ariaModal: false,
                display: 'display:none',
            });

            // Create a ref to hold the allSubCategory data
            const allSubCategoryRef = ref([]);

            // On component mount, assign the data to the ref
            onMounted(() => {
                allSubCategoryRef.value = this.allSubCategory;

                // Now you can log it
                console.log(allSubCategoryRef.value);
            });

            const openEditModal = (dataId) => {
                console.log('id: ' + dataId);
                const allSubcategoryRef = ref([]);
                allSubcategoryRef.value = this.allSubCategory;
                const foundElement = allSubcategoryRef.value.find(subcategory => subcategory.id === dataId);

                // Check if the element is found
                if (foundElement) {
                    console.log('Found Element:', foundElement);
                } else {
                    console.log('Element not found');
                }
                // jQuery('#editModal').modal('show');
                modal.isEditModalOpen = true;
                modal.show = 'modal fade show';
                modal.ariaHidden = false;
                modal.ariaModal = true;
                modal.display = 'display:block';
                // Call other methods or perform actions here
            };

            const closeEditModal = () => {
                modal.show = 'modal fade';
                modal.ariaHidden = true;
                modal.ariaModal = false;
                modal.display = 'display:none';
            };

            // const methods = {
            //     openEditModal,
            //     closeEditModal
            // };

            // Event delegation for the click event
            document.addEventListener('click', (event) => {
                if (event.target.matches('.edit-item-btn')) {
                    // Handle the click event for edit button
                    const dataId = event.target.getAttribute('data-id');
                    openEditModal(dataId);
                } else if (event.target.matches('.close-edit-modal')) {
                    closeEditModal();
                } else {
                    // If clicked outside the modal, close it
                    // console.log("woah")
                    // closeEditModal();
                    // const modal = document.getElementById('editModal');
                    // // Check if the click event target is outside the modal
                    // if (!modal.contains(event.target)) {
                    //     // Close the modal if the click is outside
                    //     closeEditModal();
                    // }
                    const isOutsideModal = !event.target.closest('#editModal');

                    // If the click is outside the modal, close the modal
                    if (isOutsideModal) {
                        closeEditModal();
                    }
                }
                
                // You can add more conditions for other buttons if needed
                // handleOutsideClick(event);
            });

            // const handleOutsideClick = (event) => {
            //     const modal = document.getElementById('editModal');
            //     // Check if the click event target is outside the modal
            //     if (!modal.contains(event.target)) {
            //         // Close the modal if the click is outside
            //         closeEditModal();
            //     }
            // };

            return { columns, dataTableOptions, modal, closeEditModal };
        },
        created() {
            // this.fetchCategories();
            this.getAllCategories();
            this.getSubCategories();
        },
        methods: {
            ...subCategoryMethods,
        
            // Your component-specific methods, if any
        
            // For example:
            openEditModal(id = null) {
                console.log("ye: " + id)
                // Assign the selected subcategory to the data property
                // this.editedSubcategory = { ...subcategory };
                // this.isEditModalOpen = true;
                // this.fetchedFormData.id = subcategory.id
                // this.fetchedFormData.subcategory = subcategory.category_name
                // this.fetchedFormData.parentCategories = subcategory.parent_category_names

                // Open the modal
                // jQuery('#editModal').modal('show');
            },

            openDeleteModal(subcategory) {
                this.fetchedFormData.id = subcategory.id
                this.fetchedFormData.categoryName = subcategory.category_name
                // Open the modal
                jQuery('#deleteModal').modal('show');
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
                        <h4 class="card-title mb-0 flex-grow-1">Sub-Category</h4>
                    </div>

                    <div class="card-body">
                        <div class="live-preview">
                            <form @submit.prevent="addSubCategory" id="subcategoryForm" class="row g-3">
                                <!-- <div class="col-md-6">
                                    <label for="" class="form-label">Select Category</label>
                                    <v-select v-model="formData.selectedCategory" @option:selected="value => getSelectedSubCategories(value, null, null)" class="new-styles" placeholder="Choose one" :options="options"/>
                                </div> -->

                                <div class="col-md-6">
                                    <label for="" class="form-label">Select Category</label>
                                    <v-select v-model="formData.selectedCategory" class="new-styles" placeholder="Choose one" :options="categoryOptions"/>
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

        <!-- Edit Modal content -->
        <div :class="modal.show" id="editModal" data-bs-dismiss="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" :aria-hidden="modal.ariaHidden" :aria-modal="modal.ariaModal" :style="modal.display" ref="modalRef" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form @submit.prevent="updateSubcategory">
                        <div class="modal-header">
                            <h5 class="modal-title" id="varyingcontentModalLabel">New message</h5>
                            <button type="button" class="btn-close close-edit-modal" data-bs-dismiss="modal" aria-label="Close"></button>
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
                            <button type="button" class="btn btn-light close-edit-modal" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Delete Modal content -->
        <div id="deleteModal" class="modal fade" tabindex="-1" aria-hidden="true">
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

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#deleteModal">Click me</button>
        <a class="btn btn-soft-secondary btn-sm edit-item-btn" @click="openEditModal"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit - {{ modal.isEditModalOpen }}</a>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">Sub-Category List</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <DataTable
                            :columns="columns"
                            :data="allSubCategory"
                            class="table table-bordered table-hover table-striped dt-responsive align-middle mb-0 nowrap display"
                            width="100%"
                            :options="dataTableOptions"
                            >
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Parent Category</th>
                                        <th>Name</th>
                                        <th>Created</th>
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
    @import '~datatables.net-bs5/css/dataTables.bootstrap5.css';
    @import '~datatables.net-dt/css/jquery.dataTables.css';
    @import '~datatables.net-buttons-dt/css/buttons.dataTables.css';
    @import '~datatables.net-responsive-dt/css/responsive.dataTables.css';
</style>