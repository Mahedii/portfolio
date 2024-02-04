<script>
import Swal from "sweetalert2";
import "@fullcalendar/core/vdom";
import { SimpleBar } from "simplebar-vue3";
import { CalendarIcon } from "@zhuowenli/vue-feather-icons";

import dayGridPlugin from "@fullcalendar/daygrid";
import timeGridPlugin from "@fullcalendar/timegrid";
import interactionPlugin, { Draggable } from "@fullcalendar/interaction";
import bootstrapPlugin from "@fullcalendar/bootstrap";
import listPlugin from "@fullcalendar/list";

import FullCalendar from "@fullcalendar/vue3";

import { required, helpers } from "@vuelidate/validators";
import useVuelidate from "@vuelidate/core";

import Layout from "../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../app.config";

import { INITIAL_EVENTS, categories } from "./utils";

export default {
  setup() {
    return { v$: useVuelidate() };
  },
  validations: {
    event: {
      title: {
        required: helpers.withMessage("Title is required", required),
      },
      category: {
        required: helpers.withMessage("Category is required", required),
      },
    },
  },
  page: {
    title: "Calendar",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "Calendar",
      items: [
        {
          text: "Apps",
          href: "/",
        },
        {
          text: "Calendar",
          active: true,
        },
      ],
      calendarOptions: {
        timeZone: "local",
        droppable: true,
        navLinks: true,
        plugins: [
          dayGridPlugin,
          timeGridPlugin,
          interactionPlugin,
          bootstrapPlugin,
          listPlugin,
        ],
        themeSystem: "bootstrap",
        headerToolbar: {
          left: "prev,next today",
          center: "title",
          right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
        },
        windowResize: () => {
          this.getInitialView();
        },
        initialView: this.getInitialView(),
        initialEvents: INITIAL_EVENTS,
        editable: true,
        selectable: true,
        selectMirror: true,
        dayMaxEvents: true,
        weekends: true,
        dateClick: this.dateClicked,
        eventClick: this.editEvent,
        eventsSet: this.handleEvents,
      },
      currentEvents: [],
      showModal: false,
      eventModal: false,
      categories: categories,
      submitted: false,
      submit: false,
      newEventData: {},
      edit: {},
      deleteId: {},
      event: {
        title: "",
        category: "",
      },
      editevent: {
        editTitle: "",
        editcategory: "",
      },
    };
  },
  components: {
    Layout,
    PageHeader,
    FullCalendar,
    SimpleBar,
    CalendarIcon
  },
  mounted() {
    new Draggable(document.getElementById("external-events"), {
      itemSelector: ".external-event",
      eventData: function (eventEl) {
        return {
          title: eventEl.innerText,
          start: new Date(),
          className: eventEl.getAttribute("data-class"),
        };
      },
    });
  },
  methods: {
    formatDate(date) {
      var monthNames = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
      ];
      var d = new Date(date),
        month = "" + monthNames[d.getMonth()],
        day = "" + d.getDate(),
        year = d.getFullYear();
      if (month.length < 2) month = "0" + month;
      if (day.length < 2) day = "0" + day;
      return [day + " " + month, year].join(",");
    },

    getInitialView() {
      if (window.innerWidth >= 768 && window.innerWidth < 1200) {
        return "timeGridWeek";
      } else if (window.innerWidth <= 768) {
        return "listMonth";
      } else {
        return "dayGridMonth";
      }
    },
    /**
     * Modal form submit
     */
    // eslint-disable-next-line no-unused-vars
    handleSubmit(e) {
      this.submitted = true;

      // stop here if form is invalid
      this.v$.$touch();
      if (this.v$.$invalid) {
        return;
      } else {
        const title = this.event.title;
        const category = this.event.category;
        let calendarApi = this.newEventData.view.calendar;

        this.currentEvents = calendarApi.addEvent({
          id: this.newEventData.length + 1,
          title,
          start: this.newEventData.date,
          end: this.newEventData.date,
          classNames: [category],
        });
        this.successmsg();
        this.showModal = false;
        this.newEventData = {};
      }
      this.submitted = false;
      this.event = {};
    },
    // eslint-disable-next-line no-unused-vars
    hideModal(e) {
      this.submitted = false;
      this.showModal = false;
      this.event = {};
    },
    /**
     * Edit event modal submit
     */
    // eslint-disable-next-line no-unused-vars
    editSubmit(e) {
      this.submit = true;
      const editTitle = this.editevent.editTitle;
      const editcategory = this.editevent.editcategory;

      this.edit.setProp("title", editTitle);
      this.edit.setProp("classNames", editcategory);
      this.successmsg();
      this.eventModal = false;
    },

    /**
     * Delete event
     */
    deleteEvent() {
      this.edit.remove();
      this.eventModal = false;
    },
    /**
     * Modal open for add event
     */
    dateClicked(info) {
      this.newEventData = info;
      this.showModal = true;
    },
    /**
     * Modal open for edit event
     */
    editEvent(info) {
      this.edit = info.event;
      this.editevent.editTitle = this.edit.title;
      this.editevent.editcategory = this.edit.classNames[0];
      this.eventModal = true;
    },

    closeModal() {
      this.eventModal = false;
    },

    confirm() {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to delete this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#34c38f",
        cancelButtonColor: "#f46a6a",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.value) {
          this.deleteEvent();
          Swal.fire("Deleted!", "Event has been deleted.", "success");
        }
      });
    },

    /**
     * Show list of events
     */
    handleEvents(events) {
      this.currentEvents = events;
    },

    /**
     * Show successfull Save Dialog
     */
    successmsg() {
      Swal.fire({
        position: "center",
        icon: "success",
        title: "Event has been saved",
        showConfirmButton: false,
        timer: 1000,
      });
    },
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />

    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-xl-3">
            <div class="card card-h-100">
              <div class="card-body">
                <button class="btn btn-primary w-100" id="btn-new-event" @click="showModal = true">
                  <i class="mdi mdi-plus"></i> Create New Event
                </button>

                <div id="external-events">
                  <br />
                  <p class="text-muted">
                    Drag and drop your event or click in the calendar
                  </p>
                  <div
                    class="external-event fc-event bg-soft-success text-success"
                    data-class="bg-soft-success"
                  >
                    <i
                      class="mdi mdi-checkbox-blank-circle font-size-11 me-2"
                    ></i
                    >New Event Planning
                  </div>
                  <div
                    class="external-event fc-event bg-soft-info text-info"
                    data-class="bg-soft-info"
                  >
                    <i
                      class="mdi mdi-checkbox-blank-circle font-size-11 me-2"
                    ></i
                    >Meeting
                  </div>
                  <div
                    class="external-event fc-event bg-soft-warning text-warning"
                    data-class="bg-soft-warning"
                  >
                    <i
                      class="mdi mdi-checkbox-blank-circle font-size-11 me-2"
                    ></i
                    >Generating Reports
                  </div>
                  <div
                    class="external-event fc-event bg-soft-danger text-danger"
                    data-class="bg-soft-danger"
                  >
                    <i
                      class="mdi mdi-checkbox-blank-circle font-size-11 me-2"
                    ></i
                    >Create New theme
                  </div>
                </div>
              </div>
            </div>
            <div>
              <h5 class="mb-1">Upcoming Events</h5>
              <p class="text-muted">Don't miss scheduled events</p>
              <SimpleBar
                class="upcoming-events pe-2 me-n1 mb-3"
                data-simplebar="init"
                style="height: 400px"
              >
                <div
                  class="card mb-3"
                  v-for="event in currentEvents"
                  :key="event.id"
                >
                  <div class="card-body">
                    <div class="d-flex mb-3">
                      <div class="flex-grow-1">
                        <i
                          :class="`mdi mdi-checkbox-blank-circle me-2 ${event.classNames[0]} `"
                        ></i
                        ><span class="fw-medium">{{
                          this.formatDate(event.start)
                        }}</span>
                      </div>
                      <div class="flex-shrink-0">
                        <small class="badge badge-soft-primary ms-auto"></small>
                      </div>
                    </div>
                    <h6 class="card-title fs-16">{{ event.title }}</h6>
                    <p class="text-muted text-truncate-two-lines mb-0">
                      {{ event.description }}
                    </p>
                  </div>
                </div>
              </SimpleBar>
            </div>
            <div class="card shadow-none">
              <div class="card-body bg-soft-info rounded">
                <div class="d-flex">
                  <div class="flex-shrink-0">
                    <CalendarIcon
                      class="text-info icon-dual-info"
                    ></CalendarIcon>
                  </div>
                  <div class="flex-grow-1 ms-3">
                    <h6 class="fs-15">Welcome to your Calendar!</h6>
                    <p class="text-muted mb-0">
                      Event that applications book will appear here. Click on an
                      event to see the details and manage applicants event.
                    </p>
                  </div>
                </div>
              </div>
            </div>
            <!--end card-->
          </div>
          <div class="col-xl-9">
            <div class="card card-h-100">
              <div class="card-body">
                <FullCalendar :options="calendarOptions" />
              </div>
            </div>
          </div>
        </div>
        <div style="clear: both"></div>
      </div>
    </div>
    <b-modal
      v-model="showModal"
      title="Add New Event"
      title-class="text-black font-18"
      body-class="p-3"
      hide-footer
      class="v-modal-custom"
    >
      <form @submit.prevent="handleSubmit">
        <div class="row">
          <div class="col-12">
            <div class="mb-3">
              <label for="name">Event Name</label>
              <input
                id="name"
                v-model="event.title"
                type="text"
                class="form-control"
                placeholder="Insert Event name"
                :class="{ 'is-invalid': submitted && v$.event.title.$error }"
              />
              <div
                v-if="submitted && v$.event.title.$error"
                class="invalid-feedback"
              >
                <span v-if="v$.event.title.required.$message">{{
                  v$.event.title.required.$message
                }}</span>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="mb-3">
              <label class="control-label">Category</label>
              <select
                v-model="event.category"
                class="form-control"
                name="category"
                :class="{ 'is-invalid': submitted && v$.event.category.errors }"
              >
                <option
                  v-for="option in categories"
                  :key="option.backgroundColor"
                  :value="`${option.value}`"
                >
                  {{ option.name }}
                </option>
              </select>

              <div
                v-if="submitted && v$.event.category.$error"
                class="invalid-feedback"
              >
                <span v-if="v$.event.category.required.$message">{{
                  v$.event.category.required.$message
                }}</span>
              </div>
            </div>
          </div>
        </div>

        <div class="text-end pt-5 mt-3">
          <b-button variant="light" @click="hideModal">Close</b-button>
          <b-button type="submit" variant="success" class="ms-1"
            >Create event</b-button
          >
        </div>
      </form>
    </b-modal>

    <!-- Edit Modal -->
    <b-modal
      v-model="eventModal"
      title="Edit Event"
      title-class="text-black font-18"
      hide-footer
      body-class="p-3"
      class="v-modal-custom"
    >
      <form @submit.prevent="editSubmit">
        <div class="row">
          <div class="col-12">
            <div class="mb-3">
              <label for="name">Event Name</label>
              <input
                id="name1"
                v-model="editevent.editTitle"
                type="text"
                class="form-control"
                placeholder="Insert Event name"
              />
            </div>
          </div>
          <div class="col-12">
            <div class="mb-3">
              <label class="control-label">Category</label>
              <select
                v-model="editevent.editcategory"
                class="form-control"
                name="category"
              >
                <option
                  v-for="option in categories"
                  :key="option.backgroundColor"
                  :value="`${option.value}`"
                >
                  {{ option.name }}
                </option>
              </select>
            </div>
          </div>
        </div>
        <div class="text-end p-3">
          <b-button variant="light" @click="closeModal">Close</b-button>
          <b-button class="ms-1" variant="danger" @click="confirm"
            >Delete</b-button
          >
          <b-button class="ms-1" variant="success" @click="editSubmit"
            >Save</b-button
          >
        </div>
      </form>
    </b-modal>
  </Layout>
</template>
