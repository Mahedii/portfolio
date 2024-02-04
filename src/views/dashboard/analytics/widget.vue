<script>
import { CountTo } from "vue3-count-to";

import { UsersIcon, ActivityIcon, ClockIcon, ExternalLinkIcon, } from '@zhuowenli/vue-feather-icons'

export default {
  components: {
    CountTo,
    UsersIcon,
    ActivityIcon,
    ClockIcon,
    ExternalLinkIcon
  }
};
</script>

<template>
  <div class="row">
    <div class="col-md-6">
      <div class="card card-animate">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="fw-medium text-muted mb-0">Users</p>
              <h2 class="mt-4 ff-secondary fw-semibold">
                <count-to :startVal='0' :endVal='28' :duration='5000'></count-to>k
              </h2>
              <p class="mb-0 text-muted">
                <span class="badge bg-light text-success mb-0">
                  <i class="ri-arrow-up-line align-middle"></i> 16.24 %
                </span>
                vs. previous month
              </p>
            </div>
            <div>
              <div class="avatar-sm flex-shrink-0">
                <span class="avatar-title bg-primary rounded-circle fs-2">
                  <users-icon></users-icon>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- end card body -->
      </div>
      <!-- end card-->
    </div>
    <!-- end col-->

    <div class="col-md-6">
      <div class="card card-animate">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="fw-medium text-muted mb-0">Sessions</p>
              <h2 class="mt-4 ff-secondary fw-semibold">
                  <count-to :startVal='0' :endVal='97' :duration='5000'></count-to>k
              </h2>
              <p class="mb-0 text-muted">
                <span class="badge bg-light text-danger mb-0">
                  <i class="ri-arrow-down-line align-middle"></i> 3.96 %
                </span>
                vs. previous month
              </p>
            </div>
            <div>
              <div class="avatar-sm flex-shrink-0">
                <span class="avatar-title bg-danger rounded-circle fs-2">
                  <activity-icon name="activity"></activity-icon>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- end card body -->
      </div>
      <!-- end card-->
    </div>
    <!-- end col-->
  </div>
  <!-- end row-->

  <div class="row">
    <div class="col-md-6">
      <div class="card card-animate">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="fw-medium text-muted mb-0">Avg. Visit Duration</p>
              <h2 class="mt-4 ff-secondary fw-semibold">
                <count-to :startVal='0' :endVal='3' :duration='5000'></count-to>m
                <count-to :startVal='0' :endVal='40' :duration='5000'></count-to>sec
              </h2>
              <p class="mb-0 text-muted">
                <span class="badge bg-light text-danger mb-0">
                  <i class="ri-arrow-down-line align-middle"></i> 0.24 %
                </span>
                vs. previous month
              </p>
            </div>
            <div>
              <div class="avatar-sm flex-shrink-0">
                <span class="avatar-title bg-warning rounded-circle fs-2">
                  <clock-icon name="clock"></clock-icon>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- end card body -->
      </div>
      <!-- end card-->
    </div>
    <!-- end col-->

    <div class="col-md-6">
      <div class="card card-animate">
        <div class="card-body">
          <div class="d-flex justify-content-between">
            <div>
              <p class="fw-medium text-muted mb-0">Bounce Rate</p>
              <h2 class="mt-4 ff-secondary fw-semibold">
                <count-to :startVal='0' :endVal='33' :duration='5000'></count-to>%
              </h2>
              <p class="mb-0 text-muted">
                <span class="badge bg-light text-success mb-0">
                  <i class="ri-arrow-up-line align-middle"></i> 7.05 %
                </span>
                vs. previous month
              </p>
            </div>
            <div>
              <div class="avatar-sm flex-shrink-0">
                <span class="avatar-title bg-success rounded-circle fs-2">
                  <external-link-icon></external-link-icon>
                </span>
              </div>
            </div>
          </div>
        </div>
        <!-- end card body -->
      </div>
      <!-- end card-->
    </div>
    <!-- end col-->
  </div>
  <!-- end row-->
</template>
