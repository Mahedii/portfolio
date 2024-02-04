<script>
import { ref, watch } from "vue";
import useVuelidate from "@vuelidate/core";
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
import flatPickr from "vue-flatpickr-component";
import "flatpickr/dist/flatpickr.css";

import Layout from "../../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../../app.config";
import DropZone from "@/components/widgets/dropZone";

import Lottie from "@/components/widgets/lottie.vue";
import animationData from "@/components/widgets/lupuorrc.json";

export default {
  page: {
    title: "KYC Application",
    meta: [{ name: "description", content: appConfig.description }],
  },
  setup() {
    let files = ref([]);
    let dropzoneFile = ref("");
    const drop = (e) => {
      dropzoneFile.value = e.dataTransfer.files[0];
      files.value.push(dropzoneFile.value);
    };
    const selectedFile = () => {
      dropzoneFile.value = document.querySelector(".dropzoneFile").files[0];
      files.value.push(dropzoneFile.value);
    };
     watch(
      () => [...files.value],
      (currentValue) => {
        return currentValue;
      }
    );
    return { dropzoneFile, drop, selectedFile, files, v$: useVuelidate() };
  },
  data() {
    return {
      title: "KYC Application",
      items: [
        {
          text: "Crypto",
          href: "/",
        },
        {
          text: "KYC Application",
          active: true,
        },
      ],
      date: null,
      defaultOptions: { animationData: animationData },
      value: null,
    };
  },
  components: {
    Layout,
    PageHeader,
    lottie: Lottie,
    DropZone,
    Multiselect,
    flatPickr
  },
  mounted() {
    // Checkout nav tab
    document.querySelectorAll(".checkout-tab").forEach((form) => {
      // next tab
      form.querySelectorAll(".nexttab").forEach((nextButton) => {
        var tabEl = form.querySelectorAll('button[data-bs-toggle="pill"]');
        tabEl.forEach(function (item) {
          item.addEventListener("show.bs.tab", (event) => {
            event.target.classList.add("done");
          });
        });
        nextButton.addEventListener("click", () => {
          var nextTab = nextButton.getAttribute("data-nexttab");
          document.getElementById(nextTab).click();
        });
      });

      //Pervies tab
      form.querySelectorAll(".previestab").forEach((prevButton) => {
        prevButton.addEventListener("click", () => {
          var prevTab = prevButton.getAttribute("data-previous");
          var totalDone = prevButton.closest("form");
          for (var i = totalDone - 1; i < totalDone; i++) {
            prevButton.closest("form").querySelectorAll(".custom-nav .done")[i]
              ? prevButton.closest("form").querySelectorAll(".custom-nav .done")[i].classList.remove("done")
              : "";
          }
          document.getElementById(prevTab).click();
        });
      });

      // Step number click
      var tabButtons = form.querySelectorAll('button[data-bs-toggle="pill"]');
      tabButtons.forEach((button, i) => {
        button.setAttribute("data-position", i);
        button.addEventListener("click", () => {
          form.querySelectorAll(".custom-nav .done").length > 0
            ? form.querySelectorAll(".custom-nav .done").forEach((doneTab) => {
                doneTab.classList.remove("done");
              })
            : "";
          for (var j = 0; j <= i; j++) {
            tabButtons[j].classList.contains("active")
              ? tabButtons[j].classList.remove("done")
              : tabButtons[j].classList.add("done");
          }
        });
      });
    });
  },
  methods: {
    deleteRecord(ele) {
      ele.target.parentElement.parentElement.remove();
    },
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />

    <div class="row justify-content-center">
      <div class="col-lg-6">
        <div class="card">
          <div class="card-body">
            <div class="text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                  <h4 class="mt-4 fw-semibold">KYC Verification</h4>
                  <p class="text-muted mt-3">
                    When you get your KYC verification process done, you have
                    given the crypto exchange in this case, information.
                  </p>
                  <div class="mt-4">
                    <button
                      type="button"
                      class="btn btn-primary"
                      data-bs-toggle="modal"
                      data-bs-target="#exampleModal"
                    >
                      Click here for Verification
                    </button>
                  </div>
                </div>
              </div>

              <div class="row justify-content-center mt-5 mb-2">
                <div class="col-sm-7 col-8">
                  <img
                    src="@/assets/images/verification-img.png"
                    alt=""
                    class="img-fluid"
                  />
                </div>
              </div>
            </div>
          </div>
        </div>
        <!--end card-->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div
      class="modal fade"
      id="exampleModal"
      tabindex="-1"
      aria-labelledby="exampleModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header p-3">
            <h5 class="modal-title text-uppercase" id="exampleModalLabel">
              Verify your Account
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <form action="#" class="checkout-tab">
            <div class="modal-body p-0">
              <div class="step-arrow-nav">
                <ul
                  class="nav nav-pills nav-justified custom-nav"
                  role="tablist"
                >
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link p-3 active"
                      id="pills-bill-info-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-bill-info"
                      type="button"
                      role="tab"
                      aria-controls="pills-bill-info"
                      aria-selected="true"
                    >
                      Personal Info
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link p-3"
                      id="pills-bill-address-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-bill-address"
                      type="button"
                      role="tab"
                      aria-controls="pills-bill-address"
                      aria-selected="false"
                    >
                      Bank Details
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link p-3"
                      id="pills-payment-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-payment"
                      type="button"
                      role="tab"
                      aria-controls="pills-payment"
                      aria-selected="false"
                    >
                      Document Verification
                    </button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button
                      class="nav-link p-3"
                      id="pills-finish-tab"
                      data-bs-toggle="pill"
                      data-bs-target="#pills-finish"
                      type="button"
                      role="tab"
                      aria-controls="pills-finish"
                      aria-selected="false"
                    >
                      Verified
                    </button>
                  </li>
                </ul>
              </div>
            </div>
            <!--end modal-body-->
            <div class="modal-body">
              <div class="tab-content">
                <div
                  class="tab-pane fade show active"
                  id="pills-bill-info"
                  role="tabpanel"
                  aria-labelledby="pills-bill-info-tab"
                >
                  <div class="row g-3">
                    <div class="col-lg-6">
                      <div>
                        <label for="firstName" class="form-label"
                          >First Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="firstName"
                          placeholder="Enter your firstname"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                      <div>
                        <label for="lastName" class="form-label"
                          >Last Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="lastName"
                          placeholder="Enter your lastname"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                      <div>
                        <label for="phoneNumber" class="form-label"
                          >Phone</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="phoneNumber"
                          placeholder="Enter your phone number"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                      <div>
                        <label for="dateofBirth" class="form-label"
                          >Date of Birth</label
                        >
                        <flat-pickr
                          v-model="date"
                          placeholder="Enter your date of birth"
                          class="form-control"
                        ></flat-pickr>
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                      <div>
                        <label for="emailID" class="form-label">Email ID</label>
                        <input
                          type="email"
                          class="form-control"
                          id="emailID"
                          placeholder="Enter your date of birth"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                      <div>
                        <label for="password" class="form-label"
                          >Password</label
                        >
                        <input
                          type="password"
                          class="form-control"
                          id="password"
                          placeholder="Enter your password"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-4">
                      <div>
                        <label for="confirmPassword" class="form-label"
                          >Confirm Password</label
                        >
                        <input
                          type="password"
                          class="form-control"
                          id="confirmPassword"
                          placeholder="Enter your confirm password"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                      <div>
                        <label for="vatNo" class="form-label"
                          >VAT/TIN No.</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="vatNo"
                          placeholder="Enter your VAT/TIN no"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                      <div>
                        <label for="serviceTax" class="form-label"
                          >Service Tax No.</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="serviceTax"
                          placeholder="Enter your service tax no"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                      <div>
                        <label for="country-select" class="form-label"
                          >Country</label
                        >

                        <Multiselect
                          class="form-control"
                          v-model="value"
                          :close-on-select="true"
                          :searchable="true"
                          :create-option="true"
                          :options="[
                            { value: '', label: 'Select country' },
                            { value: 'Argentina', label: 'Argentina' },
                            { value: 'Belgium', label: 'Belgium' },
                            { value: 'Brazil', label: 'Brazil' },
                            { value: 'Colombia', label: 'Colombia' },
                            { value: 'Denmark', label: 'Denmark' },
                            { value: 'France', label: 'France' },
                            { value: 'Germany', label: 'Germany' },
                            { value: 'Mexico', label: 'Mexico' },
                            { value: 'Russia', label: 'Russia' },
                            { value: 'Spain', label: 'Spain' },
                            { value: 'Syria', label: 'Syria' },
                            {
                              value: 'United Kingdom',
                              label: 'United Kingdom',
                            },
                            {
                              value: 'United States of America',
                              label: 'United States of America',
                            },
                          ]"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                      <div class="d-flex align-items-start gap-3 mt-3">
                        <button
                          type="button"
                          class="btn btn-primary btn-label right ms-auto nexttab"
                          data-nexttab="pills-bill-address-tab"
                        >
                          <i
                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"
                          ></i>
                          Next Step
                        </button>
                      </div>
                    </div>
                    <!--end col-->
                  </div>
                  <!--end row-->
                </div>
                <!-- end tab pane -->

                <div
                  class="tab-pane fade"
                  id="pills-bill-address"
                  role="tabpanel"
                  aria-labelledby="pills-bill-address-tab"
                >
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="banknameInput" class="form-label"
                          >Bank Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="banknameInput"
                          placeholder="Enter your bank name"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="branchInput" class="form-label"
                          >Branch</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="branchInput"
                          placeholder="Branch"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                      <div class="mb-3">
                        <label for="accountnameInput" class="form-label"
                          >Account Holder Name</label
                        >
                        <input
                          type="text"
                          class="form-control"
                          id="accountnameInput"
                          placeholder="Enter account holder name"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="accountnumberInput" class="form-label"
                          >Account Number</label
                        >
                        <input
                          type="number"
                          class="form-control"
                          id="accountnumberInput"
                          placeholder="Enter account number"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label for="ifscInput" class="form-label">IFSC</label>
                        <input
                          type="number"
                          class="form-control"
                          id="ifscInput"
                          placeholder="IFSC"
                        />
                      </div>
                    </div>
                    <!--end col-->
                    <div class="col-lg-12">
                      <div class="hstack align-items-start gap-3 mt-4">
                        <button
                          type="button"
                          class="btn btn-light btn-label previestab"
                          data-previous="pills-bill-info-tab"
                        >
                          <i
                            class="ri-arrow-left-line label-icon align-middle fs-16 me-2"
                          ></i
                          >Back to Personal Info
                        </button>
                        <button
                          type="button"
                          class="btn btn-primary btn-label right ms-auto nexttab"
                          data-nexttab="pills-payment-tab"
                        >
                          <i
                            class="ri-arrow-right-line label-icon align-middle fs-16 ms-2"
                          ></i
                          >Next Step
                        </button>
                      </div>
                    </div>
                    <!--end col-->
                  </div>
                </div>
                <!-- end tab pane -->

                <div
                  class="tab-pane fade"
                  id="pills-payment"
                  role="tabpanel"
                  aria-labelledby="pills-payment-tab"
                >
                  <h5 class="mb-3">Choose Document Type</h5>

                  <div class="d-flex gap-2">
                    <div>
                      <input
                        type="radio"
                        class="btn-check"
                        id="passport"
                        checked
                        name="choose-document"
                      />
                      <label class="btn btn-outline-info" for="passport"
                        >Passport</label
                      >
                    </div>
                    <div>
                      <input
                        type="radio"
                        class="btn-check"
                        id="aadhar-card"
                        name="choose-document"
                      />
                      <label class="btn btn-outline-info" for="aadhar-card"
                        >Aadhar Card</label
                      >
                    </div>
                    <div>
                      <input
                        type="radio"
                        class="btn-check"
                        id="pan-card"
                        name="choose-document"
                      />
                      <label class="btn btn-outline-info" for="pan-card"
                        >Pan Card</label
                      >
                    </div>
                    <div>
                      <input
                        type="radio"
                        class="btn-check"
                        id="other"
                        name="choose-document"
                      />
                      <label class="btn btn-outline-info" for="other"
                        >Other</label
                      >
                    </div>
                  </div>

                  <DropZone @drop.prevent="drop" @change="selectedFile" class="mb-2" />
                  <div class="vstack gap-2">
                  <div
                    class="border rounded"
                    v-for="(file, index) of files"
                    :key="index"
                  >
                    <div class="d-flex align-items-center p-2">
                      <div class="flex-grow-1">
                        <div class="pt-1">
                          <h5 class="fs-14 mb-1" data-dz-name="">
                            {{ file.name }}
                          </h5>
                          <p class="fs-13 text-muted mb-0" data-dz-size="">
                            <strong>{{ file.size / 1024 }}</strong> KB
                          </p>
                          <strong
                            class="error text-danger"
                            data-dz-errormessage=""
                          ></strong>
                        </div>
                      </div>
                      <div class="flex-shrink-0 ms-3">
                        <button
                          data-dz-remove=""
                          class="btn btn-sm btn-danger"
                          @click="deleteRecord"
                        >
                          Delete
                        </button>
                      </div>
                    </div>
                  </div>
                  </div>
                  <!-- end dropzon-preview -->
                  <div class="d-flex align-items-start gap-3 mt-4">
                    <button
                      type="button"
                      class="btn btn-light btn-label previestab"
                      data-previous="pills-bill-address-tab"
                    >
                      <i
                        class="ri-arrow-left-line label-icon align-middle fs-16 me-2"
                      ></i
                      >Back to Bank Details
                    </button>
                    <button
                      type="button"
                      class="btn btn-primary btn-label right ms-auto nexttab"
                      data-nexttab="pills-finish-tab"
                    >
                      <i
                        class="ri-save-line label-icon align-middle fs-16 ms-2"
                      ></i
                      >Submit
                    </button>
                  </div>
                </div>
                <!-- end tab pane -->

                <div
                  class="tab-pane fade"
                  id="pills-finish"
                  role="tabpanel"
                  aria-labelledby="pills-finish-tab"
                >
                  <div class="row text-center justify-content-center">
                    <div class="col-lg-11">
                      <div class="mb-4">
                        <lottie
                          colors="primary:#0ab39c,secondary:#405189"
                          :options="defaultOptions"
                          :height="120"
                          :width="120"
                        />
                      </div>
                      <h5>Verification Completed</h5>
                      <p class="text-muted mb-4">
                        To stay verified, don't remove the meta tag form your
                        site's home page. To avoid losing verification, you may
                        want to add multiple methods form the
                        <span class="fw-medium">Crypto > KYC Application.</span>
                      </p>

                      <div class="hstack justify-content-center gap-2">
                        <button
                          type="button"
                          class="btn btn-ghost-success"
                          data-bs-dismiss="modal"
                        >
                          Done
                          <i class="ri-thumb-up-fill align-bottom me-1"></i>
                        </button>
                        <button type="button" class="btn btn-primary">
                          <i class="ri-home-4-line align-bottom ms-1"></i> Back
                          to Home
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end tab pane -->
              </div>
              <!-- end tab content -->
            </div>
            <!--end modal-body-->
          </form>
        </div>
      </div>
    </div>
    <!--end modal-->
  </Layout>
</template>
