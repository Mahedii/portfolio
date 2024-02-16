// subCategoryMethods.js
    // import axios from '@/axiosInstance.js'
    import { customToastr } from '@/components/Toastr.js';
    import moment from 'moment';
    import jQuery from 'jquery'

export const subCategoryMethods = {
    async getSelectedSubCategories(value, index, method) {
        var id = value.value
        this.lastSelectedCategoryId = id
        var dataObject = null
        if (method == 'update') {
            dataObject = this.fetchedFormData
        } else {
            dataObject = this.formData
        }

        if (index == null) {
            // this.categoryTree = this.lastSelectedCategoryId
            this.categoryTreeArray = [this.lastSelectedCategoryId]
            dataObject.numberOfSubcategories = 0
            dataObject.selectedSubcategories = []
        } else {
            var arrayTreeKey = index + 1
            // if (this.categoryTreeArray.includes(some value)) // for checking array value
            // if (arrayTreeKey in this.categoryTreeArray) // for checking array key
            // if (this.categoryTreeArray.hasOwnProperty(arrayTreeKey)) {
            if (Object.hasOwnProperty.call(this.categoryTreeArray, arrayTreeKey)) {
                this.categoryTreeArray[arrayTreeKey] = this.lastSelectedCategoryId
                this.categoryTreeArray.splice(arrayTreeKey + 1)
            } else {
                this.categoryTreeArray.push(this.lastSelectedCategoryId)
            }
        }

        const subcategories = await this.getSubCategories(id);
        // console.log("length", subcategories.length)

        if (subcategories.length == 0) {
            if (index == null) {
                dataObject.numberOfSubcategories = 0
                dataObject.selectedSubcategories = []
            } else {
                if (dataObject.selectedSubcategories.length > index) {
                    dataObject.selectedSubcategories.splice(index + 1);
                }
            }
        } else {
            var newCategoryoptions = subcategories.map(subcategory => ({
                label: subcategory.category_name,
                value: subcategory.id.toString(), // Convert id to string for compatibility with v-select
            }));

            if (index == null) {
                this.subcategoriesOptions = []
                this.subcategoriesOptions[0] = newCategoryoptions
            } else {
                this.subcategoriesOptions.push(newCategoryoptions)
            }

            // Increment the number of subcategories and push a new selected subcategory
            dataObject.numberOfSubcategories++;
            dataObject.selectedSubcategories.push(null)
        }
        // console.log("categoryTree", this.categoryTree)
        // console.log("categoryTreeArray", this.categoryTreeArray)
        // console.log("numberOfSubcategories", dataObject.numberOfSubcategories)
    },

    async addSubCategory() {
        try {
            this.isSubmitting = true
            this.categoryTree = null
            this.categoryTreeArray.filter((value, index) => {
                if (index == 0) {
                    this.categoryTree = value
                } else {
                    this.categoryTree = this.categoryTree + "," + value
                }
            })
            // console.log(this.categoryTree)
            // let payload = {
            //     category_id: this.lastSelectedCategoryId, // Use last selected category id
            //     parents: this.categoryTree,
            //     subcategory: this.formData.subcategory,
            //     type: 'create',
            // };

            let payload = {
                category_id: this.formData.selectedCategory.value,
                subcategory: this.formData.subcategory,
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

    async updateSubcategory() {
        try {
            this.isSubmitting = true
            this.categoryTreeArray.filter((value, index) => {
                if (index == 0) {
                    this.categoryTree = value
                } else {
                    this.categoryTree = this.categoryTree + "," + value
                }
            })

            let payload = {
                id: this.fetchedFormData.id,
                category_id: this.lastSelectedCategoryId, // Use last selected category id
                parents: this.categoryTree,
                subcategory: this.fetchedFormData.subcategory,
                type: 'update',
            };

            this.axios.post('/sub-category/update', payload)
            .then(response => {
                // console.log(response);
                if (response.data.status == 200) {
                    customToastr.toastrMessage(response.data.message, "success")

                    // Clear the input fields after successful addition
                    jQuery('#editModal').modal('hide');
                    this.resetForm('update')

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

    async deleteSubcategory() {
        try {
            let payload = {
                id: this.fetchedFormData.id,
                category_name: this.fetchedFormData.categoryName,
                type: 'delete',
            };

            this.axios.post('/sub-category/delete', payload)
            .then(response => {
                if (response.data.status == 200) {
                    customToastr.toastrMessage(response.data.message, "success")

                    // Clear the input fields after successful addition
                    this.resetForm()

                    // Refresh sub-category list after adding a new category
                    this.getSubCategories();
                } else {
                    customToastr.toastrMessage(response.data.message, "error")
                }
                jQuery('#deleteModal').modal('hide');
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
            dataObject.id = null
            dataObject.parentCategories = ""
            dataObject.categoryName = ""
        }
        // Reset form fields and selected values
        dataObject.selectedCategory = null
        dataObject.subcategory = ""
        dataObject.selectedSubcategories = []
        dataObject.numberOfSubcategories = 0

        this.lastSelectedCategoryId = null
        this.categoryTree = null
        this.categoryTreeArray = []

        // Use the form element's reset method to clear input values
        // document.getElementById('subcategoryForm').reset()
    },

    async fetchCategories() {
        try {
            let payload = {
                type: 'read',
            }
            this.axios.post('/category/data', payload).then(res=>{
                this.categories = res.data.categories;
                // console.log(res.data.categories);

                this.options = this.categories.map(category => ({
                    label: category.category_name,
                    value: category.id.toString(), // Convert id to string for compatibility with v-select
                }));
            })
        } catch (error) {
            console.error("Error fetching categories:", error);
        }
    },

    getAllCategories(){
        try {
            let payload = {
                type: 'read',
            }
            return this.axios.post('/sub-category/data', payload).then(res=>{
                if (res.data.status == 200) {
                    this.allSubCategory = res.data.subcategories
                    this.categoryOptions = this.allSubCategory.map(subCategory => ({
                        label: subCategory.parent_category_names != "" ? subCategory.parent_category_names + '->' + subCategory.category_name : subCategory.category_name,
                        value: subCategory.id.toString(), // Convert id to string for compatibility with v-select
                    }));
                }
            })
        } catch (error) {
            console.log(error)
        }
    },

    async getSubCategories(id = null){
        try {
            let payload = {
                id: id,
                type: 'read',
            }
            return await this.axios.post('/sub-category/data', payload).then(res=>{
                // console.log(res.data);
                if (res.data.status == 200) {
                    if (id != null) {
                        return res.data.subcategories
                    } else {
                        this.allSubCategory = res.data.subcategories
                        // console.log(this.allSubCategory)
                        // this.allSubCategory = res.data.subcategories.map((subcategory) => {
                        //     return {
                        //         ...subcategory,
                        //         // index: index + 1,
                        //         // formattedDate: this.formatRelativeDate(subcategory.created_at),
                        //     }
                        // })
                    }
                }
            })
        } catch (error) {
            console.log(error)
        }
    },

    formatRelativeDate(date) {
        return moment(date).fromNow();
    },
};
