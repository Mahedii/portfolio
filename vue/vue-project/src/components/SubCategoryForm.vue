<template>
    <form @submit.prevent="submitForm" class="row g-3">
        <div class="col-md-6">
            <label for="" class="form-label">Select Category</label>
            <v-select v-model="selectedCategory" @option:selected="value => getSelectedSubCategories(value, null)" class="new-styles" placeholder="Choose one" :options="options"/>
        </div>
    
        <!-- Loop to dynamically create v-select components -->
        <div v-for="(selectedSubcategory, index) in selectedSubcategories" :key="index" class="col-md-6">
            <label :for="'subcategory' + (index + 1)" class="form-label">Select Subcategory</label>
            <v-select :v-model="selectedSubcategories[index]" :data-index="index" @option:selected="value => getSelectedSubCategories(value, index)" class="new-styles" :placeholder="'Choose one'" :options="subcategoriesOptions[index]"/>
        </div>
    
        <div class="col-md-6">
            <label for="subcategory" class="form-label">Subcategory Name</label>
            <input v-model="subcategory" type="text" class="form-control" id="subcategory" placeholder="Enter Sub-Category name">
        </div>
        
        <div class="col-12">
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Add</button>
            </div>
        </div>
    </form>
</template>
  
<script>
    export default {
        props: {
            options: Array, // Pass options for the category select
            selectedSubcategories: Array,
            subcategoriesOptions: Array,
        },
        data() {
            return {
                selectedCategory: null,
                subcategory: "",
            };
        },
        methods: {
            getSelectedSubCategories(value, index) {
                // Emit event to parent component (SubCategoryPage.vue) with selected value and index
                this.$emit('getSelectedSubCategories', value, index);
            },
            submitForm() {
                // Emit event to parent component (SubCategoryPage.vue) with form data
                this.$emit('submitForm', {
                    selectedCategory: this.selectedCategory,
                    subcategory: this.subcategory,
                });
            },
        },
    };
</script>
  
<style scoped>
    /* Add your component-specific styles here */
</style>
  