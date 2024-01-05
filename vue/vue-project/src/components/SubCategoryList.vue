<template>
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
                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
                                <a href="#" class="dropdown-item delete-item-btn" @click="deleteSubCategory(index)">
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
</template>
  
<script>
    export default {
        props: {
            allSubCategory: Array,
            formatRelativeDate: Function,
        },
        methods: {
            deleteSubCategory(index) {
                // Add logic for deleting a subcategory based on index
                const confirmDelete = confirm('Are you sure you want to delete this subcategory?');
                if (confirmDelete) {
                    // Call the method to delete the subcategory
                    // this.$emit('deleteSubCategory', index);
                }
            },
        },
    };
</script>
  
<style scoped>
    /* Add your component-specific styles here */
</style>
  