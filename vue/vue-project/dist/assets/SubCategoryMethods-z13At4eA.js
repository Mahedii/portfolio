import{h}from"./index-Rclj0A4P.js";import{c as r}from"./Toastr-bncgRa57.js";const d={async getSelectedSubCategories(t,e,s){var i=t.value;if(this.lastSelectedCategoryId=i,s=="update")var a=this.fetchedFormData;else var a=this.formData;if(e==null)this.categoryTreeArray=[this.lastSelectedCategoryId],a.numberOfSubcategories=0,a.selectedSubcategories=[];else{var o=e+1;this.categoryTreeArray.hasOwnProperty(o)?(this.categoryTreeArray[o]=this.lastSelectedCategoryId,this.categoryTreeArray.splice(o+1)):this.categoryTreeArray.push(this.lastSelectedCategoryId)}const c=await this.getSubCategories(i);if(c.length==0)e==null?(a.numberOfSubcategories=0,a.selectedSubcategories=[]):a.selectedSubcategories.length>e&&a.selectedSubcategories.splice(e+1);else{var l=c.map(g=>({label:g.category_name,value:g.id.toString()}));e==null?(this.subcategoriesOptions=[],this.subcategoriesOptions[0]=l):this.subcategoriesOptions.push(l),a.numberOfSubcategories++,a.selectedSubcategories.push(null)}},async addSubCategory(){try{this.isSubmitting=!0,this.categoryTree=null,this.categoryTreeArray.filter((e,s)=>{s==0?this.categoryTree=e:this.categoryTree=this.categoryTree+","+e});let t={category_id:this.lastSelectedCategoryId,parents:this.categoryTree,subcategory:this.formData.subcategory,type:"create"};this.axios.post("/sub-category/create",t).then(e=>{e.data.status==200?(r.toastrMessage(e.data.message,"success"),this.resetForm(),this.getSubCategories()):r.toastrMessage(e.data.message,"error")}).catch(e=>(this.isSubmitting=!1,console.log(e),e))}catch(t){return this.isSubmitting=!1,console.log(t),t}},async updateSubcategory(){try{this.isSubmitting=!0,this.categoryTreeArray.filter((e,s)=>{s==0?this.categoryTree=e:this.categoryTree=this.categoryTree+","+e});let t={id:this.fetchedFormData.id,category_id:this.lastSelectedCategoryId,parents:this.categoryTree,subcategory:this.fetchedFormData.subcategory,type:"update"};this.axios.post("/sub-category/update",t).then(e=>{e.data.status==200?(r.toastrMessage(e.data.message,"success"),jQuery("#editModal").modal("hide"),this.resetForm("update"),this.getSubCategories()):r.toastrMessage(e.data.message,"error")}).catch(e=>(this.isSubmitting=!1,console.log(e),e))}catch(t){return this.isSubmitting=!1,console.log(t),t}},async deleteSubcategory(){try{let t={id:this.fetchedFormData.id,category_name:this.fetchedFormData.categoryName,type:"delete"};this.axios.post("/sub-category/delete",t).then(e=>{e.data.status==200?(r.toastrMessage(e.data.message,"success"),this.resetForm(),this.getSubCategories()):r.toastrMessage(e.data.message,"error"),jQuery("#deleteModal").modal("hide")}).catch(e=>(this.isSubmitting=!1,console.log(e),e))}catch(t){return this.isSubmitting=!1,console.log(t),t}},async resetForm(t=null){if(t=="update")var e=this.fetchedFormData;else{var e=this.formData;e.id=null,e.parentCategories="",e.categoryName=""}e.selectedCategory=null,e.subcategory="",e.selectedSubcategories=[],e.numberOfSubcategories=0,this.lastSelectedCategoryId=null,this.categoryTree=null,this.categoryTreeArray=[]},async fetchCategories(){try{let t={type:"read"};this.axios.post("/category/data",t).then(e=>{this.categories=e.data.categories,this.options=this.categories.map(s=>({label:s.category_name,value:s.id.toString()}))})}catch(t){console.error("Error fetching categories:",t)}},async getSubCategories(t=null){try{let e={id:t,type:"read"};return this.axios.post("/sub-category/data",e).then(s=>{if(s.data.status==200){if(t!=null)return s.data.subcategories;this.allSubCategory=s.data.subcategories}})}catch(e){console.log(e)}},formatRelativeDate(t){return h(t).fromNow()}};export{d as s};
