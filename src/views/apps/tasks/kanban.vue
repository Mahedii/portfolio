<script>
import { VueDraggableNext } from 'vue-draggable-next'
import flatPickr from "vue-flatpickr-component";
import "flatpickr/dist/flatpickr.css";

import Layout from "../../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../app.config";

import Lottie from "@/components/widgets/lottie.vue";
import animationData from "@/components/widgets/gsqxdxog.json";

export default {
  page: {
    title: "Kanban Board",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "Kanban Board",
      items: [
        {
          text: "Tasks",
          href: "/",
        },
        {
          text: "Kanban Board",
          active: true,
        },
      ],

      config: {
        wrap: true, // set wrap to true only when using 'input-group'
        altFormat: "M j, Y",
        altInput: true,
        dateFormat: "d M, Y",
      },
      date: null,
      date1: null,
      defaultOptions: { animationData: animationData },
      unassigned: [
        {
          title: "Profile Page Satructure",
          description: "Profile Page means a web page accessible to the public or to guests.",
          features: ["Admin"],
          users:[require("@/assets/images/users/avatar-6.jpg"), require("@/assets/images/users/avatar-5.jpg")],
          id: "#VL2436",
          watch: "04",
          message: "19",
          file: "2"
        },
        {
          title: "Velzon - Admin Layout Design",
          description: "The dashboard is the front page of the Administration UI.",
          features: ["Layout", "Admin", "Dashboard"],
          users:[require("@/assets/images/users/avatar-7.jpg"), require("@/assets/images/users/avatar-6.jpg"), require("@/assets/images/users/avatar-1.jpg")],
          id: "#VL2436",
          watch: "04",
          message: "19",
          file: "2",
          date: " 07 Jan, 2022"
        }
      ],
      todo: [
        {
          title: "Admin Layout Design",
          description: "Landing page template with clean, minimal and modern design.",
          features: ["Design", "Wensite"],
          users:[require("@/assets/images/users/avatar-10.jpg"), require("@/assets/images/users/avatar-3.jpg")],
          id: "#VL2436",
          watch: "13",
          message: "52",
          file: "17",
          date: " 07 Jan, 2022"
        },
         {
          title: "Marketing & Sales",
          description: "Sales and marketing are two business functions within an organization.",
          features: ["Marketing", "Business"],
          users:[require("@/assets/images/users/avatar-9.jpg"), require("@/assets/images/users/avatar-8.jpg")],
          id: "#VL2436",
          watch: "24",
          message: "10",
          file: "10",
          date: " 27 Dec, 2021"
        },
      ],
       inprogress: [
        {
          title: "Brand Logo Design ",
          description: "BrandCrowd's brand logo maker allows you to generate and customize stand-out brand logos in minutes.",
          features: ["Logo","Design", "UI/UX"],
          users:[require("@/assets/images/users/avatar-10.jpg"), require("@/assets/images/users/avatar-3.jpg")],
          id: "#VL2436",
          watch: "24",
          message: "10",
          file: "10",
          date: " 22 Dec, 2022"
        },
         {
          title: "Change Old App Icon",
          description: "Change app icons on Android: How do you change the look of your apps.",
          features: ["Marketing", "Business"],
          users:[require("@/assets/images/users/avatar-9.jpg"), require("@/assets/images/users/avatar-8.jpg")],
          id: "#VL2436",
          watch: "64",
          message: "35",
          file: "23",
          date: " 24 Oct, 2021"
        },
      ],
      reviews: [
        {
          title: "Product Features Analysis",
          description: "An essential part of strategic planning is running a product feature analysis.",
          features: ["Project","Analysis"],
          users:[require("@/assets/images/users/avatar-5.jpg"), require("@/assets/images/users/avatar-6.jpg")],
          id: "#VL2436",
          watch: "14",
          message: "31",
          file: "07",
          date: " 05 Jan, 2022"
        },
         {
          title: "Create a Graph of Sketch",
          description: "To make a pie chart with equal slices create a perfect circle by selecting an Oval Tool.",
          features: ["Sketch", "Marketing", "Design"],
          users:[require("@/assets/images/users/avatar-4.jpg"), require("@/assets/images/users/avatar-8.jpg"), require("@/assets/images/users/avatar-2.jpg"), require("@/assets/images/users/avatar-1.jpg")],
          id: "#VL2436",
          watch: "64",
          message: "35",
          file: "23",
          date: " 24 Oct, 2021"
        },
      ],
       completed: [
         {
          title: "Create a Blog Template UI",
          description: "Landing page template with clean, minimal and modern design.",
          features: ["Design","Website"],
          users:[require("@/assets/images/users/avatar-8.jpg"), require("@/assets/images/users/avatar-7.jpg"), require("@/assets/images/users/avatar-6.jpg")],
          id: "#VL2451",
          watch: "24",
          message: "10",
          file: "10",
          date: " 05 Jan, 2022"
        },
       ],
       newData: [
         {
          title: "Banner Design for FB & Twitter",
          image: require("@/assets/images/small/img-4.jpg"),
          features: ["UI/UX","Graphic"],
          users:[require("@/assets/images/users/avatar-8.jpg"), require("@/assets/images/users/avatar-7.jpg"), require("@/assets/images/users/avatar-6.jpg")],
          id: "#VL2451",
          watch: "24",
          message: "10",
          file: "10",
          date: " 05 Jan, 2022"
        },
       ],
        enabled: true,
        
        dragging: false
    };
  },
   methods: {
      log(event) {
        console.log(event)
      },
    },
  components: {
    Layout,
    PageHeader,
     draggable: VueDraggableNext,
     lottie: Lottie,
     flatPickr
  },
}
</script>

<template>
    <Layout>
        <PageHeader :title="title" :items="items" />
          
    <div class="card">
        <div class="card-body">
            <div class="row g-2">
                <div class="col-lg-auto">
                    <div class="hstack gap-2">
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createboardModal"><i class="ri-add-line align-bottom me-1"></i> Create Board</button>
                    </div>
                </div><!--end col-->
                <div class="col-lg-3 col-auto">
                    <div class="search-box">
                        <input type="text" class="form-control search" placeholder="Search for project, tasks...">
                        <i class="ri-search-line search-icon"></i>
                    </div>
                </div>
                <div class="col-auto ms-sm-auto">
                    <div class="avatar-group" id="newMembar">
                        <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Nancy">
                            <img src="@/assets/images/users/avatar-5.jpg" alt="" class="rounded-circle avatar-xs">
                        </a>
                        <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Frank">
                            <img src="@/assets/images/users/avatar-3.jpg" alt="" class="rounded-circle avatar-xs">
                        </a>
                        <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Tonya">
                            <img src="@/assets/images/users/avatar-10.jpg" alt="" class="rounded-circle avatar-xs">
                        </a>
                        <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Thomas">
                            <img src="@/assets/images/users/avatar-8.jpg" alt="" class="rounded-circle avatar-xs">
                        </a>
                        <a href="javascript: void(0);" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Herbert">
                            <img src="@/assets/images/users/avatar-2.jpg" alt="" class="rounded-circle avatar-xs">
                        </a>
                        <a href="#addmemberModal" data-bs-toggle="modal" class="avatar-group-item shadow">
                            <div class="avatar-xs">
                                <div class="avatar-title rounded-circle">
                                    +
                                </div>
                            </div>
                        </a>
                    </div>
                </div><!--end col-->
            </div><!--end row-->
        </div><!--end card-body-->
    </div><!--end card-->

    <div class="tasks-board mb-3" id="kanbanboard">
        <div class="tasks-list">
            <div class="d-flex mb-3">
                <div class="flex-grow-1">
                    <h6 class="fs-14 text-uppercase fw-semibold mb-0">Unassigned <small class="badge bg-success align-bottom ms-1">2</small></h6>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Priority</a>
                            <a class="dropdown-item" href="#">Date Added</a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                <div id="unassigned-task" class="tasks">
                    <draggable :list="unassigned" class="dragArea" :group="{ name: 'todo' }">
                    <div class="card tasks-box" v-for="(data, index) of unassigned" :key="index">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <h6 class="fs-15 mb-0 flex-grow-1 text-truncate"><router-link to="/apps/tasks-details" class="text-body">{{data.title}}</router-link></h6>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li><router-link class="dropdown-item" to="/apps/tasks-details"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</router-link></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-muted">{{data.description}}</p>
                            <div class="mb-3">
                                <div class="d-flex mb-1">
                                    <div class="flex-grow-1">
                                        <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="text-muted">{{data.date}}</span>
                                    </div>
                                </div>
                                <div class="progress rounded-3 progress-sm bg-soft-danger">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1" >
                                    <span class="badge badge-soft-primary me-1" v-for="(item, index) of data.features" :key="index">item</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-group">
                                        <a href="javascript: void(0);" v-for="(item, index) of data.users" :key="index" class="avatar-group-item" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                            <img :src="item" alt="" class="rounded-circle avatar-xxs">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top-dashed">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-0">#VL2436</h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <ul class="link-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 04</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 19</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 02</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                    </draggable>
                </div><!--end tasks-->
            </div>
            <div class="my-3">
                <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
            </div>
        </div><!--end tasks-list-->
        <div class="tasks-list">
            <div class="d-flex mb-3">
                <div class="flex-grow-1">
                    <h6 class="fs-14 text-uppercase fw-semibold mb-0">To Do <small class="badge bg-secondary align-bottom ms-1">2</small></h6>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Priority</a>
                            <a class="dropdown-item" href="#">Date Added</a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                <div id="todo-task" class="tasks">
                    <draggable :list="todo" class="dragArea" group="todo">
                    <div class="card tasks-box" v-for="(data, index) of todo" :key="index">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <h6 class="fs-15 mb-0 flex-grow-1 text-truncate"><router-link to="/apps/tasks-details">{{data.title}}</router-link></h6>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li><router-link class="dropdown-item" to="/apps/tasks-details"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</router-link></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-muted">{{data.description}}</p>
                            <div class="mb-3">
                                <div class="d-flex mb-1">
                                    <div class="flex-grow-1">
                                        <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="text-muted">{{data.date}}</span>
                                    </div>
                                </div>
                                <div class="progress rounded-3 progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1" >
                                    <span class="badge badge-soft-primary me-1" v-for="(item, index) of data.features" :key="index">item</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-group">
                                        <a href="javascript: void(0);" v-for="(item, index) of data.users" :key="index" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                            <img :src="item" alt="" class="rounded-circle avatar-xxs">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top-dashed">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-0">#VL2436</h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <ul class="link-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 04</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 19</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 02</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                    </draggable>
                </div>
            </div>
            <div class="my-3">
                <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
            </div>
        </div><!--end tasks-list-->
        <div class="tasks-list">
            <div class="d-flex mb-3">
                <div class="flex-grow-1">
                    <h6 class="fs-14 text-uppercase fw-semibold mb-0">Inprogress <small class="badge bg-warning align-bottom ms-1">2</small></h6>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Priority</a>
                            <a class="dropdown-item" href="#">Date Added</a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                <div id="inprogress-task" class="tasks">
                    <draggable :list="inprogress" class="dragArea" group="reviews">
                    <div class="card tasks-box" v-for="(data, index) of inprogress" :key="index">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <h6 class="fs-15 mb-0 flex-grow-1 text-truncate"><router-link to="/apps/tasks-details">{{data.title}}</router-link></h6>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li><router-link class="dropdown-item" to="/apps/tasks-details"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</router-link></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-muted">{{data.description}}</p>
                            <div class="mb-3">
                                <div class="d-flex mb-1">
                                    <div class="flex-grow-1">
                                        <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="text-muted">{{data.date}}</span>
                                    </div>
                                </div>
                                <div class="progress rounded-3 progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1" >
                                    <span class="badge badge-soft-primary me-1" v-for="(item, index) of data.features" :key="index">item</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-group">
                                        <a href="javascript: void(0);" v-for="(item, index) of data.users" :key="index" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                            <img :src="item" alt="" class="rounded-circle avatar-xxs">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top-dashed">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-0">#VL2436</h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <ul class="link-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 04</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 19</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 02</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                    </draggable>
                </div>
            </div>
            <div class="my-3">
                <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
            </div>
        </div><!--end tasks-list-->
        <div class="tasks-list">
            <div class="d-flex mb-3">
                <div class="flex-grow-1">
                    <h6 class="fs-14 text-uppercase fw-semibold mb-0">In Reviews <small class="badge bg-info align-bottom ms-1">3</small></h6>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Priority</a>
                            <a class="dropdown-item" href="#">Date Added</a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                <div id="reviews-task" class="tasks">
                    <draggable :list="reviews" class="dragArea" group="reviews">
                    <div class="card tasks-box" v-for="(data, index) of reviews" :key="index">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <h6 class="fs-15 mb-0 flex-grow-1 text-truncate"><router-link to="/apps/tasks-details">{{data.title}}</router-link></h6>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li><router-link class="dropdown-item" to="/apps/tasks-details"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</router-link></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-muted">{{data.description}}</p>
                            <div class="mb-3">
                                <div class="d-flex mb-1">
                                    <div class="flex-grow-1">
                                        <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="text-muted">{{data.date}}</span>
                                    </div>
                                </div>
                                <div class="progress rounded-3 progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1" >
                                    <span class="badge badge-soft-primary me-1" v-for="(item, index) of data.features" :key="index">item</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-group">
                                        <a href="javascript: void(0);" v-for="(item, index) of data.users" :key="index" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                            <img :src="item" alt="" class="rounded-circle avatar-xxs">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top-dashed">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-0">#VL2436</h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <ul class="link-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 04</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 19</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 02</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                    </draggable>
                </div>
            </div>
            <div class="my-3">
                <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
            </div>
        </div><!--end tasks-list-->
        <div class="tasks-list">
            <div class="d-flex mb-3">
                <div class="flex-grow-1">
                    <h6 class="fs-14 text-uppercase fw-semibold mb-0">Completed <small class="badge bg-success align-bottom ms-1">1</small></h6>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Priority</a>
                            <a class="dropdown-item" href="#">Date Added</a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                <div id="completed-task" class="tasks">
                    <draggable :list="completed" class="dragArea" group="newData">
                    <div class="card tasks-box" v-for="(data, index) of completed" :key="index">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <h6 class="fs-15 mb-0 flex-grow-1 text-truncate"><router-link to="/apps/tasks-details">{{data.title}}</router-link></h6>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li><router-link class="dropdown-item" to="/apps/tasks-details"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</router-link></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-muted">{{data.description}}</p>
                            <div class="mb-3">
                                <div class="d-flex mb-1">
                                    <div class="flex-grow-1">
                                        <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="text-muted">{{data.date}}</span>
                                    </div>
                                </div>
                                <div class="progress rounded-3 progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1" >
                                    <span class="badge badge-soft-primary me-1" v-for="(item, index) of data.features" :key="index">item</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-group">
                                        <a href="javascript: void(0);" v-for="(item, index) of data.users" :key="index" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                            <img :src="item" alt="" class="rounded-circle avatar-xxs">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top-dashed">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-0">#VL2436</h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <ul class="link-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 04</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 19</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 02</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                    </draggable>
                </div>
            </div>
            <div class="my-3">
                <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
            </div>
        </div><!--end tasks-list-->
        <div class="tasks-list">
            <div class="d-flex mb-3">
                <div class="flex-grow-1">
                    <h6 class="fs-14 text-uppercase fw-semibold mb-0">new <small class="badge bg-success align-bottom ms-1">1</small></h6>
                </div>
                <div class="flex-shrink-0">
                    <div class="dropdown card-header-dropdown">
                        <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fw-medium text-muted fs-12">Priority<i class="mdi mdi-chevron-down ms-1"></i></span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <a class="dropdown-item" href="#">Priority</a>
                            <a class="dropdown-item" href="#">Date Added</a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-simplebar class="tasks-wrapper px-3 mx-n3">
                <div id="new-task" class="tasks">
                    <draggable :list="newData" class="dragArea" group="newData">
                    <div class="card tasks-box" v-for="(data, index) of newData" :key="index">
                        <div class="card-body">
                            <div class="d-flex mb-2">
                                <h6 class="fs-15 mb-0 flex-grow-1 text-truncate"><router-link to="/apps/tasks-details">{{data.title}}</router-link></h6>
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="text-muted" id="dropdownMenuLink1" data-bs-toggle="dropdown" aria-expanded="false"><i class="ri-more-fill"></i></a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink1">
                                        <li><router-link class="dropdown-item" to="/apps/tasks-details"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View</router-link></li>
                                        <li><a class="dropdown-item" href="#"><i class="ri-edit-2-line align-bottom me-2 text-muted"></i> Edit</a></li>
                                        <li><a class="dropdown-item" data-bs-toggle="modal" href="#deleteRecordModal"><i class="ri-delete-bin-5-line align-bottom me-2 text-muted"></i> Delete</a></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="text-muted">{{data.description}}</p>
                            <div class="mb-3">
                                <div class="d-flex mb-1">
                                    <div class="flex-grow-1">
                                        <h6 class="text-muted mb-0"><span class="text-secondary">15%</span> of 100%</h6>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <span class="text-muted">{{data.date}}</span>
                                    </div>
                                </div>
                                <div class="progress rounded-3 progress-sm">
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1" >
                                    <span class="badge badge-soft-primary me-1" v-for="(item, index) of data.features" :key="index">item</span>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="avatar-group">
                                        <a href="javascript: void(0);" v-for="(item, index) of data.users" :key="index" class="avatar-group-item shadow" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-placement="top" title="Alexis">
                                            <img :src="item" alt="" class="rounded-circle avatar-xxs">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-top-dashed">
                            <div class="d-flex">
                                <div class="flex-grow-1">
                                    <h6 class="text-muted mb-0">#VL2436</h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <ul class="link-inline mb-0">
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-eye-line align-bottom"></i> 04</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-question-answer-line align-bottom"></i> 19</a>
                                        </li>
                                        <li class="list-inline-item">
                                            <a href="javascript:void(0)" class="text-muted"><i class="ri-attachment-2 align-bottom"></i> 02</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div><!--end card-body-->
                    </div><!--end card-->
                    </draggable>
                </div>
            </div>
            <div class="my-3">
                <button class="btn btn-soft-info w-100" data-bs-toggle="modal" data-bs-target="#creatertaskModal">Add More</button>
            </div>
        </div><!--end tasks-list-->
    </div><!--end task-board-->

    <div class="modal fade" id="addmemberModal" tabindex="-1" aria-labelledby="addmemberModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-warning">
                    <h5 class="modal-title" id="addmemberModalLabel">Add Member</h5>
                    <button type="button" class="btn-close" id="btn-close-member" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label for="submissionidInput" class="form-label">Submission ID</label>
                                <input type="number" class="form-control" id="submissionidInput" placeholder="Submission ID" >
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="profileimgInput" class="form-label">Profile Images</label>
                                <input class="form-control" type="file" id="profileimgInput">
                            </div><!--end col-->
                                <div class="col-lg-6">
                                <label for="firstnameInput" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="firstnameInput" placeholder="Enter firstname">
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <label for="lastnameInput" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="lastnameInput" placeholder="Enter lastname">
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="designationInput" class="form-label">Designation</label>
                                <input type="text" class="form-control" id="designationInput" placeholder="Designation">
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="titleInput" class="form-label">Title</label>
                                <input type="text" class="form-control" id="titleInput" placeholder="Title">
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <label for="numberInput" class="form-label">Phone Number</label>
                                <input type="text" class="form-control" id="numberInput" placeholder="Phone number">
                            </div><!--end col-->
                            <div class="col-lg-6">
                                <label for="joiningdateInput" class="form-label">Joining Date</label>
                              
                                <flat-pickr
                                    v-model="date"
                                    :config="config"
                                    placeholder="Select date"
                                    class="form-control"
                                    ></flat-pickr>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="emailInput" class="form-label">Email ID</label>
                                <input type="email" class="form-control" id="emailInput" placeholder="Email">
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="ri-close-line align-bottom me-1"></i> Close</button>
                    <button type="button" class="btn btn-success" id="addMember">Add Member</button>
                </div>
            </div>
        </div>
    </div><!--end add member modal-->

    <div class="modal fade" id="createboardModal" tabindex="-1" aria-labelledby="createboardModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="createboardModalLabel">Add Board</h5>
                    <button type="button" class="btn-close" id="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="boardName" class="form-label">Board Name</label>
                                <input type="text" class="form-control" id="boardName" placeholder="Enter board name">
                            </div>
                            <div class="mt-4">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success" id="addNewBoard">Add Board</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!--end add board modal-->

    <div class="modal fade" id="creatertaskModal" tabindex="-1" aria-labelledby="creatertaskModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border-0">
                <div class="modal-header p-3 bg-soft-info">
                    <h5 class="modal-title" id="creatertaskModalLabel">Create New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="#">
                        <div class="row g-3">
                            <div class="col-lg-12">
                                <label for="projectName" class="form-label">Project Name</label>
                                <input type="text" class="form-control" id="projectName" placeholder="Enter project name">
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="sub-tasks" class="form-label">Task Title</label>
                                <input type="text" class="form-control" id="sub-tasks" placeholder="Task title">
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="task-description" class="form-label">Task Description</label>
                                <textarea class="form-control" id="task-description" rows="3"></textarea>
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="formFile" class="form-label">Tasks Images</label>
                                <input class="form-control" type="file" id="formFile">
                            </div><!--end col-->
                            <div class="col-lg-12">
                                <label for="tasks-progress" class="form-label">Add Team Member</label>
                                <div data-simplebar style="height: 95px;">
                                    <ul class="list-unstyled vstack gap-2 mb-0">
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value="" id="anna-adame">
                                                <label class="form-check-label d-flex align-items-center" for="anna-adame">
                                                    <span class="flex-shrink-0">
                                                        <img src="@/assets/images/users/avatar-1.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Anna Adame
                                                    </span>
                                                </label>
                                            </div>
                                        </li> 
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value="" id="frank-hook">
                                                <label class="form-check-label d-flex align-items-center" for="frank-hook">
                                                    <span class="flex-shrink-0">
                                                        <img src="@/assets/images/users/avatar-3.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Frank Hook
                                                    </span>
                                                </label>
                                            </div>
                                        </li> 
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value="" id="alexis-clarke">
                                                <label class="form-check-label d-flex align-items-center" for="alexis-clarke">
                                                    <span class="flex-shrink-0">
                                                        <img src="@/assets/images/users/avatar-6.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Alexis Clarke
                                                    </span>
                                                </label>
                                            </div>
                                        </li> 
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value="" id="herbert-stokes">
                                                <label class="form-check-label d-flex align-items-center" for="herbert-stokes">
                                                    <span class="flex-shrink-0">
                                                        <img src="@/assets/images/users/avatar-2.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Herbert Stokes
                                                    </span>
                                                </label>
                                            </div>
                                        </li> 
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value="" id="michael-morris">
                                                <label class="form-check-label d-flex align-items-center" for="michael-morris">
                                                    <span class="flex-shrink-0">
                                                        <img src="@/assets/images/users/avatar-7.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Michael Morris
                                                    </span>
                                                </label>
                                            </div>
                                        </li> 
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value="" id="nancy-martino">
                                                <label class="form-check-label d-flex align-items-center" for="nancy-martino">
                                                    <span class="flex-shrink-0">
                                                        <img src="@/assets/images/users/avatar-5.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Nancy Martino
                                                    </span>
                                                </label>
                                            </div>
                                        </li> 
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value="" id="thomas-taylor">
                                                <label class="form-check-label d-flex align-items-center" for="thomas-taylor">
                                                    <span class="flex-shrink-0">
                                                        <img src="@/assets/images/users/avatar-8.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Thomas Taylor
                                                    </span>
                                                </label>
                                            </div>
                                        </li> 
                                        <li>
                                            <div class="form-check d-flex align-items-center">
                                                <input class="form-check-input me-3" type="checkbox" value="" id="tonya-noble">
                                                <label class="form-check-label d-flex align-items-center" for="tonya-noble">
                                                    <span class="flex-shrink-0">
                                                        <img src="@/assets/images/users/avatar-10.jpg" alt="" class="avatar-xxs rounded-circle" />
                                                    </span>
                                                    <span class="flex-grow-1 ms-2">
                                                        Tonya Noble
                                                    </span>
                                                </label>
                                            </div>
                                        </li> 
                                    </ul>
                                </div>
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <label for="due-date" class="form-label">Due Date</label>
                              
                                 <flat-pickr
                      v-model="date1"
                      placeholder="Select date"
                      class="form-control"
                    ></flat-pickr>
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <label for="categories" class="form-label">Tags</label>
                                <input type="text" class="form-control" id="categories" placeholder="Enter tag">
                            </div><!--end col-->
                            <div class="col-lg-4">
                                <label for="tasks-progress" class="form-label">Tasks Progress</label>
                                <input type="text" class="form-control" maxlength="3" id="tasks-progress" placeholder="Enter progress">
                            </div><!--end col-->
                            <div class="mt-4">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-success">Add Task</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>
                </div>
            </div>
        </div>
    </div><!--end add board modal-->

    <div class="modal fade zoomIn" id="deleteRecordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="btn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                      <lottie
                        class="avatar-xl"
                        colors="primary:#4b38b3,secondary:#f06548"
                        :options="defaultOptions"
                        :height="100"
                        :width="100"
                        />
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this tasks ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-record">Yes, Delete It!</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!--end modal -->
    </Layout>
</template>