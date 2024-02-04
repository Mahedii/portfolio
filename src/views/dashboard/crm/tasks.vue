<script>
export default {
  setup() {
    return {
      tasks: [
        {
          id: 1,
          forId: "task_one",
          text: "Review and make sure nothing slips through cracks",
          date: "15 Sep, 2021",
        },
        {
          id: 2,
          forId: "task_two",
          text: "Send meeting invites for sales upcampaign",
          date: "20 Sep, 2021",
        },
        {
          id: 3,
          forId: "task_three",
          text: "Weekly closed sales won checking with sales team",
          date: "24 Sep, 2021",
        },
        {
          id: 4,
          forId: "task_four",
          text: "Add notes that can be viewed from the individual view",
          date: "27 Sep, 2021",
        },
        {
          id: 5,
          forId: "task_five",
          text: "Move stuff to another page",
          date: "27 Sep, 2021",
        },
        {
          id: 6,
          forId: "task_six",
          text: "Styling wireframe design and documentation for velzon admin",
          date: "27 Sep, 2021",
        },
      ],
    };
  },
};
</script>

<template>
  <div class="card card-height-100">
    <div class="card-header align-items-center d-flex">
      <h4 class="card-title mb-0 flex-grow-1">My Tasks</h4>
      <div class="flex-shrink-0">
        <div class="dropdown card-header-dropdown">
          <a
            class="text-reset dropdown-btn"
            href="#"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
          >
            <span class="text-muted"
              ><i class="ri-settings-4-line align-middle me-1 fs-15"></i
              >Settings</span
            >
          </a>
          <div class="dropdown-menu dropdown-menu-end">
            <a class="dropdown-item" href="#">Edit</a>
            <a class="dropdown-item" href="#">Remove</a>
          </div>
        </div>
      </div>
    </div>
    <!-- end card header -->

    <div class="card-body p-0">
      <div class="align-items-center p-3 justify-content-between d-flex">
        <div class="flex-shrink-0">
          <div class="text-muted">
            <span class="fw-semibold">4</span> of
            <span class="fw-semibold">10</span> remaining
          </div>
        </div>
        <button type="button" class="btn btn-sm btn-success">
          <i class="ri-add-line align-middle me-1"></i> Add Task
        </button>
      </div>
      <!-- end card header -->

      <div data-simplebar style="max-height: 219px">
        <ul class="list-group list-group-flush border-dashed px-3">
          <li class="list-group-item ps-0" v-for="(item, index) in tasks" :key="index">
            <div class="d-flex align-items-start">
              <div class="form-check ps-0 flex-sharink-0">
                <input
                  type="checkbox"
                  class="form-check-input ms-0"
                  :id="`${item.forId}`"
                />
              </div>
              <div class="flex-grow-1">
                <label class="form-check-label mb-0 ps-2" :for="`${item.forId}`"
                  >{{item.text}}</label
                >
              </div>
              <div class="flex-shrink-0 ms-2">
                <p class="text-muted fs-12 mb-0">{{item.date}}</p>
              </div>
            </div>
          </li>
        </ul>
        <!-- end ul -->
      </div>
      <div class="p-3 pt-2">
        <a
          href="javascript:void(0);"
          class="text-muted text-decoration-underline"
          >Show more...</a
        >
      </div>
    </div>
    <!-- end card body -->
  </div>
  <!-- end card -->
</template>
