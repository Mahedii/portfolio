<script>
import Swal from "sweetalert2";

import Layout from "../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../app.config";

export default {
  page: {
    title: "Sweetalert",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "Sweet Alert",
      items: [
        {
          text: "Advance UI",
          href: "/",
        },
        {
          text: "Sweet Alert",
          active: true,
        },
      ],
    };
  },
  components: {
    Layout,
    PageHeader,
  },
  methods: {
    showAlert() {
      Swal.fire("Any fool can use a computer!");
    },
    titleText() {
      Swal.fire("The Internet?", "That thing is still around?", "question");
    },
    successmsg() {
      Swal.fire("Good job!", "You clicked the button!", "success");
    },
    position() {
      Swal.fire({
        position: "top-end",
        icon: "success",
        title: "Your work has been saved",
        showConfirmButton: false,
        timer: 1500,
      });
    },
    confirm() {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#34c38f",
        cancelButtonColor: "#f46a6a",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.value) {
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
    cancel() {
      const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
          confirmButton: "btn btn-success",
          cancelButton: "btn btn-danger ml-2",
        },
        buttonsStyling: false,
      });

      swalWithBootstrapButtons
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          confirmButtonText: "Yes, delete it!",
          cancelButtonText: "No, cancel!",
          showCancelButton: true,
        })
        .then((result) => {
          if (result.value) {
            swalWithBootstrapButtons.fire(
              "Deleted!",
              "Your file has been deleted.",
              "success"
            );
          } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
          ) {
            swalWithBootstrapButtons.fire(
              "Cancelled",
              "Your imaginary file is safe :)",
              "error"
            );
          }
        });
    },
    saError() {
      Swal.fire({
        title: "Oops...",
        text: "Something went wrong!",
        icon: "error",
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: false,
        footer: '<a href="">Why do I have this issue?</a>',
        showCloseButton: true,
      });
    },
    content() {
      Swal.fire({
        imageUrl: "https://placeholder.pics/svg/300x1500",
        imageHeight: 1500,
        imageAlt: "A tall image",
        confirmButtonClass: "btn btn-primary w-xs mt-2",
        buttonsStyling: false,
        showCloseButton: true,
      });
    },
    threeButton() {
      Swal.fire({
        title: "Do you want to save the changes?",
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Save",
        confirmButtonClass: "btn btn-success w-xs me-2",
        cancelButtonClass: "btn btn-danger w-xs",
        denyButtonClass: "btn btn-info w-xs me-2",
        buttonsStyling: false,
        denyButtonText: "Don't save",
        showCloseButton: true,
      }).then(function (result) {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          Swal.fire({
            title: "Saved!",
            icon: "success",
            confirmButtonClass: "btn btn-primary w-xs",
            buttonsStyling: false,
          });
        } else if (result.isDenied) {
          Swal.fire({
            title: "Changes are not saved",
            icon: "info",
            confirmButtonClass: "btn btn-primary w-xs",
            buttonsStyling: false,
          });
        }
      });
    },
    imageHeader() {
      Swal.fire({
        title: "Sweet!",
        text: "Modal with a custom image.",
        imageUrl: require("@/assets/images/logo-dark.png"),
        imageHeight: 20,
        confirmButtonColor: "#556ee6",
      });
    },
    timer() {
      let timerInterval;
      Swal.fire({
        title: "Auto close alert!",
        html: "I will close in <b></b> milliseconds.",
        timer: 2000,
        timerProgressBar: true,
        onBeforeOpen: () => {
          Swal.showLoading();
          timerInterval = setInterval(() => {
            Swal.getContent().querySelector("b").textContent =
              Swal.getTimerLeft();
          }, 100);
        },
        onClose: () => {
          clearInterval(timerInterval);
        },
      }).then((result) => {
        if (
          /* Read more about handling dismissals below */
          result.dismiss === Swal.DismissReason.timer
        ) {
          console.log("I was closed by the timer"); // eslint-disable-line
        }
      });
    },
    custom() {
      Swal.fire({
        title: "<i>HTML</i> <u>example</u>",
        icon: "info",
        html:
          "You can use <b>bold text</b>, " +
          '<a href="//Themesbrand.in/">links</a> ' +
          "and other HTML tags",
        showCancelButton: true,
        confirmButtonClass: "btn btn-success me-2",
        cancelButtonClass: "btn btn-danger",
        buttonsStyling: false,
        confirmButtonText:
          '<i class="ri-thumb-up-fill align-bottom me-1"></i> Great!',
        cancelButtonText: '<i class="ri-thumb-down-fill align-bottom"></i>',
      });
    },
    customBackground() {
      Swal.fire({
        title: "Custom width, padding, background.",
        width: 600,
        padding: 100,
        confirmButtonColor: "#556ee6",
        background:
          "#fff url(//subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/geometry.png)",
      });
    },
    ajax() {
      Swal.fire({
        title: "Submit email to run ajax request",
        input: "email",
        showCancelButton: true,
        confirmButtonText: "Submit",
        showLoaderOnConfirm: true,
        confirmButtonColor: "#556ee6",
        cancelButtonColor: "#f46a6a",
        preConfirm: (email) => {
          // eslint-disable-next-line no-unused-vars
          return new Promise(function (resolve, reject) {
            setTimeout(function () {
              if (email === "taken@example.com") {
                Promise.reject(new Error("This email is already taken."));
              } else {
                resolve();
              }
            }, 2000);
          });
        },
        allowOutsideClick: false,
      }).then((email) => {
        Swal.fire({
          title: "Ajax request finished!",
          html: "Submitted email: " + email,
        });
      });
    },
    chain() {
      Swal.mixin({
        input: "text",
        confirmButtonText: "Next &rarr;",
        showCancelButton: true,
        confirmButtonColor: "#556ee6",
        cancelButtonColor: "#74788d",
        progressSteps: ["1", "2", "3"],
      })
        .queue([
          {
            title: "Question 1",
            text: "Chaining swal2 modals is easy",
          },
          "Question 2",
          "Question 3",
        ])
        .then((result) => {
          if (result.value) {
            Swal.fire({
              title: "All done!",
              html:
                "Your answers: <pre><code>" +
                JSON.stringify(result.value) +
                "</code></pre>",
              confirmButtonText: "Lovely!",
            });
          }
        });
    },
    dynamicQueue() {
      var ipAPI = "https://api.ipify.org?format=json";
      Swal.queue([
        {
          title: "Your public IP",
          confirmButtonText: "Show my public IP",
          text: "Your public IP will be received " + "via AJAX request",
          showLoaderOnConfirm: true,
          preConfirm: () => {
            return fetch(ipAPI)
              .then((response) => response.json())
              .then((data) => Swal.insertQueueStep(data.ip))
              .catch(() => {
                Swal.insertQueueStep({
                  type: "error",
                  title: "Unable to get your public IP",
                });
              });
          },
        },
      ]);
    },
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Examples</h4>
          </div>
          <!-- end card header -->

          <div class="card-body">
            <p class="text-muted">
              Here are the various types of beautiful, responsive, customizable,
              and accessible sweet alerts.
            </p>

            <div class="table-responsive">
              <table
                class="table table-nowrap align-middle justify-content-center mb-0"
              >
                <thead>
                  <tr>
                    <th scope="col" style="width: 50%">Sweet Alert Type</th>
                    <th scope="col" class="text-center">
                      Sweet Alert Examples
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>A Basic Message</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-basic"
                        @click="showAlert"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>A Title with a Text Under</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-title"
                        @click="titleText"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>A success message!</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-success"
                        @click="successmsg"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      A modal with a title, an error icon, a text, and a footer
                    </td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-error"
                        @click="saError"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>A modal window with a long content inside</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-longcontent"
                        @click="content"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      A warning message, with a function attached to the
                      "Confirm"-button...
                    </td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-warning"
                        @click="confirm"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>
                      By passing a parameter, you can execute something else for
                      "Cancel".
                    </td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-params"
                        @click="cancel"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>A message with custom Image Header</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-image"
                        @click="imageHeader"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>A message with auto close timer</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-close"
                        @click="timer"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>Custom HTML description and buttons</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="custom-html-alert"
                        @click="custom"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>A dialog with three buttons</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-dialog-three-btn"
                        @click="threeButton"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td>A custom positioned dialog</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="sa-position"
                        @click="position"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>A message with custom width, padding and background</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="custom-padding-width-alert"
                        @click="customBackground"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>

                  <tr>
                    <td>Ajax request example</td>
                    <td class="text-center">
                      <button
                        type="button"
                        class="btn btn-primary btn-sm"
                        id="ajax-alert"
                        @click="ajax"
                      >
                        Click me
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table>
              <!-- end table -->
            </div>
            <!-- end table responsive -->
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

 
  </Layout>
</template>
