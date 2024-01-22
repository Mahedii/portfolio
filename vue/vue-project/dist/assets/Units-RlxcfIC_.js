import{c as o}from"./Toastr-bncgRa57.js";import{_ as f,h as p,o as l,c as d,b as t,w as h,d as b,v as _,F as v,r as g,a as y,t as r,e as M}from"./index-Rclj0A4P.js";const x={data(){return{formData:{unitName:null},fetchedFormData:{selectedMeasurementUnitId:null,unitName:null},unitsList:[]}},created(){this.fetchMeasurementUnits()},methods:{async fetchMeasurementUnits(){try{let s={type:"read"};this.axios.post("/measurement-units/data",s).then(e=>{this.unitsList=e.data.measurementUnits})}catch(s){console.error("Error fetching measurement units:",s)}},async addUnits(){try{this.isSubmitting=!0;let s={unit:this.formData.unitName,type:"create"};this.axios.post("/measurement-units/create",s).then(e=>{e.data.status==200?(o.toastrMessage(e.data.message,"success"),this.resetForm(),this.fetchMeasurementUnits()):o.toastrMessage(e.data.message,"error")}).catch(e=>(this.isSubmitting=!1,console.log(e),e))}catch(s){return this.isSubmitting=!1,console.log(s),s}},async resetForm(s=null){if(s=="update")var e=this.fetchedFormData;else var e=this.formData;e.unitName=null},formatRelativeDate(s){return p(s).fromNow()},async updateMeasurementUnit(){try{this.isSubmitting=!0;let s={id:this.fetchedFormData.selectedMeasurementUnitId,unitName:this.fetchedFormData.unitName,type:"update"};this.axios.post("/measurement-units/update",s).then(e=>{e.data.status==200?(o.toastrMessage(e.data.message,"success"),jQuery("#editModal").modal("hide"),this.resetForm(),this.fetchMeasurementUnits()):o.toastrMessage(e.data.message,"error")}).catch(e=>(this.isSubmitting=!1,console.log(e),e))}catch(s){return this.isSubmitting=!1,console.log(s),s}},async openEditModal(s){this.fetchedFormData.selectedMeasurementUnitId=s.id,this.fetchedFormData.unitName=s.unit_name,jQuery("#editModal").modal("show")},async changeStatus(s){let e={type:"change-status",id:s};const c=await this.axios.post("/measurement-units/update",e);c.data.status==200?(this.fetchMeasurementUnits(),o.toastrMessage(c.data.message,"success")):o.toastrMessage(c.data.message,"error")}}},w={class:"page-content"},U={class:"container-fluid"},D=y('<div class="row"><div class="col-12"><div class="page-title-box d-sm-flex align-items-center justify-content-between"><h4 class="mb-sm-0">Units</h4><div class="page-title-right"><ol class="breadcrumb m-0"><li class="breadcrumb-item"><a href="javascript: void(0);">Units</a></li><li class="breadcrumb-item active">Create</li></ol></div></div></div></div>',1),N={class:"row"},S={class:"col-xxl-12"},k={class:"card"},F=t("div",{class:"card-header align-items-center d-flex"},[t("h4",{class:"card-title mb-0 flex-grow-1"},"Units")],-1),C={class:"card-body"},E={class:"live-preview"},L={class:"col-md-12"},j=t("label",{for:"subcategory",class:"form-label"},"Unit Name",-1),V=t("div",{class:"col-12"},[t("div",{class:"text-end"},[t("button",{type:"submit",class:"btn btn-primary"},"Add")])],-1),B={class:"modal fade",id:"editModal",tabindex:"-1","aria-labelledby":"editModalLabel","aria-hidden":"true"},I={class:"modal-dialog"},T={class:"modal-content"},A=t("div",{class:"modal-header"},[t("h5",{class:"modal-title",id:"varyingcontentModalLabel"},"Update form"),t("button",{type:"button",class:"btn-close","data-bs-dismiss":"modal","aria-label":"Close"})],-1),Q={class:"modal-body"},R={class:"mb-3"},O=t("label",{for:"",class:"form-label"},"Unit",-1),q=t("div",{class:"modal-footer"},[t("button",{type:"button",class:"btn btn-light","data-bs-dismiss":"modal"},"Close"),t("button",{type:"submit",class:"btn btn-primary"},"Save Changes")],-1),z={class:"row"},G={class:"col-lg-12"},H={class:"card"},J=t("div",{class:"card-header"},[t("h5",{class:"card-title mb-0"},"Units List")],-1),K={class:"card-body"},P={id:"example",class:"table table-bordered dt-responsive nowrap table-striped align-middle",style:{width:"100%"}},W=t("thead",null,[t("tr",null,[t("th",null,"No"),t("th",null,"Unit"),t("th",null,"Status"),t("th",null,"Created"),t("th",null,"Action")])],-1),X=["onClick"],Y=["onClick"],Z={class:"dropdown d-inline-block"},$=t("button",{class:"btn btn-soft-secondary btn-sm dropdown",type:"button","data-bs-toggle":"dropdown","aria-expanded":"false"},[t("i",{class:"ri-more-fill align-middle"})],-1),tt={class:"dropdown-menu dropdown-menu-end"},et=["onClick"],st=t("i",{class:"ri-pencil-fill align-bottom me-2 text-muted"},null,-1);function at(s,e,c,it,n,i){return l(),d("div",w,[t("div",U,[D,t("div",N,[t("div",S,[t("div",k,[F,t("div",C,[t("div",E,[t("form",{onSubmit:e[1]||(e[1]=h((...a)=>i.addUnits&&i.addUnits(...a),["prevent"])),class:"row g-3"},[t("div",L,[j,b(t("input",{"onUpdate:modelValue":e[0]||(e[0]=a=>n.formData.unitName=a),type:"text",class:"form-control",placeholder:"Enter unit name"},null,512),[[_,n.formData.unitName]])]),V],32)])])])])]),t("div",B,[t("div",I,[t("div",T,[t("form",{onSubmit:e[3]||(e[3]=h((...a)=>i.updateMeasurementUnit&&i.updateMeasurementUnit(...a),["prevent"]))},[A,t("div",Q,[t("div",R,[O,b(t("input",{"onUpdate:modelValue":e[2]||(e[2]=a=>n.fetchedFormData.unitName=a),type:"text",class:"form-control",placeholder:"Enter unit name"},null,512),[[_,n.fetchedFormData.unitName]])])]),q],32)])])]),t("div",z,[t("div",G,[t("div",H,[J,t("div",K,[t("table",P,[W,t("tbody",null,[(l(!0),d(v,null,g(n.unitsList,(a,u)=>(l(),d("tr",{key:u},[t("td",null,r(++u),1),t("td",null,r(a.unit_name),1),t("td",null,[a.status=="1"?(l(),d("button",{key:0,class:"btn btn-soft-danger mx-2",onClick:m=>i.changeStatus(a.id)},"Disable",8,X)):(l(),d("button",{key:1,class:"btn btn-soft-success mx-2",onClick:m=>i.changeStatus(a.id)},"Enable",8,Y))]),t("td",null,r(i.formatRelativeDate(a.created_at)),1),t("td",null,[t("div",Z,[$,t("ul",tt,[t("li",null,[t("a",{href:"#",class:"dropdown-item edit-item-btn",onClick:m=>i.openEditModal(a)},[st,M(" Edit ")],8,et)])])])])]))),128))])])])])])])])])}const lt=f(x,[["render",at]]);export{lt as default};