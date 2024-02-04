<template>
    <div class="dropdown d-inline-block">
      <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="ri-more-fill align-middle"></i>
      </button>
      <ul class="dropdown-menu dropdown-menu-end">
        <li>
          <a href="#" class="dropdown-item edit-item-btn" @click="openEditModal">
            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i>
            Edit
          </a>
        </li>
        <li>
          <a href="#" class="dropdown-item delete-item-btn" @click="openDeleteModal">
            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i>
            Delete
          </a>
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      row: Object,
    },
    methods: {
      openEditModal() {
        // Handle your logic here using this.row
      },
      openDeleteModal() {
        // Handle your logic here using this.row
      },
    },
  };
  </script>
  