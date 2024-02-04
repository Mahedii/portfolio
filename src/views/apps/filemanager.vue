<script>
import Layout from "../../layouts/main.vue";
import appConfig from "../../../app.config";
import Multiselect from "@vueform/multiselect";
import "@vueform/multiselect/themes/default.css";
import Swal from "sweetalert2";
function getChartColorsArray(colors) {
  colors = JSON.parse(colors);
  return colors.map(function (value) {
    var newValue = value.replace(" ", "");
    if (newValue.indexOf(",") === -1) {
      var color = getComputedStyle(document.documentElement).getPropertyValue(
        newValue
      );
      if (color) {
        color = color.replace(" ", "");
        return color;
      } else return newValue;
    } else {
      var val = value.split(",");
      if (val.length == 2) {
        var rgbaColor = getComputedStyle(
          document.documentElement
        ).getPropertyValue(val[0]);
        rgbaColor = "rgba(" + rgbaColor + "," + val[1] + ")";
        return rgbaColor;
      } else {
        return newValue;
      }
    }
  });
}
export default {
  page: {
    title: "File manager",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      value: "File Type",
      folders: [
        {
          name: "Projects",
          files: "349",
          storage: "4.10",
          ischecked: true,
        },
        {
          name: "Documents",
          files: "2348",
          storage: "27.01",
          ischecked: false,
        },
        {
          name: "Media",
          files: "12480",
          storage: "20.87",
          ischecked: false,
        },
        {
          name: "Velzon v1.7.0",
          files: "180",
          storage: "478.65MB",
          ischecked: true,
        },
      ],

      filelist: [
        {
          id: 1,
          icon: "ri-gallery-fill",
          iconClass: "success",
          fileName: "logo-dark.png",
          fileType: "Media",
          fileItem: "01",
          fileSize: "1.3 MB",
          date: "24 May, 2022",
        },
        {
          id: 2,
          icon: "ri-file-pdf-fill",
          iconClass: "danger",
          fileName: "velzon-invoice.pdf",
          fileType: "Documents",
          fileItem: "01",
          fileSize: "1.1 MB",
          date: "05 May, 2022",
        },
        {
          id: 3,
          icon: "ri-folder-2-fill",
          iconClass: "warning",
          fileName: "Velzon React",
          fileType: "Media",
          fileItem: "367",
          fileSize: "934 MB",
          date: "28 Apr, 2022",
        },
        {
          id: 4,
          icon: "ri-file-text-fill",
          iconClass: "secondary",
          fileName: "html.docx",
          fileType: "Documents",
          fileItem: "01",
          fileSize: "0.3 KB",
          date: "19 Apr, 2022",
        },
        {
          id: 5,
          icon: "ri-gallery-fill",
          iconClass: "success",
          fileName: "default.jpg",
          fileType: "Media",
          fileItem: "01",
          fileSize: "1.7 MB",
          date: "06 Apr, 2022",
        },
      ],
      series: [27.01, 20.87, 33.54, 37.58],
      chartOptions: {
        chart: {
          height: 300,
          type: "donut",
        },
        legend: {
          position: "bottom",
        },
        dataLabels: {
          dropShadow: {
            enabled: false,
          },
        },
        colors: getChartColorsArray(
          '["--vz-info", "--vz-danger", "--vz-primary", "--vz-success"]'
        ),
      },
    };
  },
  components: {
    Layout,
    Multiselect,
  },
  watch: {
    folders() {},
    filelist() {},
  },
  mounted() {
    this.windowResize();
    window.addEventListener("resize", this.windowResize);
  },
  methods: {
    windowResize() {
      var windowSize = document.documentElement.clientWidth;
      if (windowSize < 1400) {
        document.body.classList.remove("file-detail-show");
      } else {
        document.body.classList.add("file-detail-show");
      }
    },
    fileDetailShow() {
      var bodyElement = document.getElementsByTagName("body")[0];
      Array.from(document.querySelectorAll(".close-btn-overview")).forEach(
        function (item) {
          item.addEventListener("click", function () {
            bodyElement.classList.remove("file-detail-show");
          });
        }
      );

      Array.from(document.querySelectorAll("#file-list tr")).forEach(function (
        item
      ) {
        item
          .querySelector(".viewfile-list")
          .addEventListener("click", function () {
            bodyElement.classList.add("file-detail-show");
            document.getElementById("file-overview").style.display = "block";
            document.getElementById("folder-overview").style.display = "none";

            var filelistId = item.querySelector(".filelist-id").value;
            var filelistIcon = item.querySelector(".filelist-icon i").className;
            var filelistName = item.querySelector(".filelist-name").innerHTML;
            var filelistSize = item.querySelector(".filelist-size").innerHTML;
            var filelistCreate =
              item.querySelector(".filelist-create").innerHTML;
            var filelistType = item.querySelector(".filelist-type").innerHTML;

            document.querySelector("#file-overview .file-icon i").className =
              filelistIcon;
            Array.from(
              document.querySelectorAll("#file-overview .file-name")
            ).forEach(function (elm) {
              elm.innerHTML = filelistName;
            });
            Array.from(
              document.querySelectorAll("#file-overview .file-size")
            ).forEach(function (elm) {
              elm.innerHTML = filelistSize;
            });
            Array.from(
              document.querySelectorAll("#file-overview .create-date")
            ).forEach(function (elm) {
              elm.innerHTML = filelistCreate;
            });
            document.querySelector("#file-overview .file-type").innerHTML =
              filelistType;

            document
              .querySelector("#file-overview .remove-file-overview")
              .setAttribute("data-remove-id", filelistId);
            if (
              item.querySelector(".favourite-btn").classList.contains("active")
            ) {
              document
                .querySelector("#file-overview .favourite-btn")
                .classList.add("active");
            } else {
              document
                .querySelector("#file-overview .favourite-btn")
                .classList.remove("active");
            }
          });
      });
      var isShowMenu = false;
      var emailMenuSidebar = document.getElementsByClassName(
        "file-manager-sidebar"
      );
      Array.from(document.querySelectorAll(".file-menu-btn")).forEach(function (
        item
      ) {
        item.addEventListener("click", function () {
          Array.from(emailMenuSidebar).forEach(function (elm) {
            elm.classList.add("menubar-show");
            isShowMenu = true;
          });
        });
      });

      window.addEventListener("click", function () {
        if (
          document
            .querySelector(".file-manager-sidebar")
            .classList.contains("menubar-show")
        ) {
          if (!isShowMenu) {
            document
              .querySelector(".file-manager-sidebar")
              .classList.remove("menubar-show");
          }
          isShowMenu = false;
        }
      });
    },
    changefolder(title) {
      document.getElementById("folder-list").style.display = "block";
      document.getElementById("filetype-title").innerHTML = title;
    },
    changerecent(title) {
      document.getElementById("folder-list").style.display = "none";
      document.getElementById("filetype-title").innerHTML = title;
    },
    changetitle(title) {
      document.getElementById("filetype-title").innerHTML = title;
    },
    createfolder() {
      var data = {
        name: document.getElementById("foldername-input").value,
        files: "0",
        storage: "0",
        ischecked: false,
      };
      document.getElementById("addFolderBtn-close").click();
      this.folders.unshift(data);
    },
    deletefolder(event) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        cancelButtonColor: "#f46a6a",
        confirmButtonColor: "#34c38f",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.value) {
          this.folders.splice(this.folders.indexOf(event), 1);
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
  },
};
</script>

<template>
  <Layout>
    <div class="chat-wrapper d-lg-flex gap-1 mx-n4 mt-n4 p-1">
      <div class="file-manager-sidebar">
        <div class="p-3 d-flex flex-column h-100">
          <div class="mb-3">
            <h5 class="mb-0 fw-semibold">My Drive</h5>
          </div>
          <div class="search-box">
            <input
              type="text"
              class="form-control bg-light border-light"
              placeholder="Search here..."
            />
            <i class="ri-search-2-line search-icon"></i>
          </div>
          <div class="mt-3 mx-n4 px-4 file-menu-sidebar-scroll" data-simplebar>
            <ul class="list-unstyled file-manager-menu">
              <li>
                <a
                  data-bs-toggle="collapse"
                  href="#collapseExample"
                  role="button"
                  aria-expanded="true"
                  aria-controls="collapseExample"
                  @click="changefolder('Recent Files')"
                >
                  <i class="ri-folder-2-line align-bottom me-2"></i>
                  <span class="file-list-link">My Drive</span>
                </a>
                <div class="collapse show" id="collapseExample">
                  <ul class="sub-menu list-unstyled">
                    <li>
                      <a href="#!">Assets</a>
                    </li>
                    <li>
                      <a href="#!">Marketing</a>
                    </li>
                    <li>
                      <a href="#!">Personal</a>
                    </li>
                    <li>
                      <a href="#!">Projects</a>
                    </li>
                    <li>
                      <a href="#!">Templates</a>
                    </li>
                  </ul>
                </div>
              </li>
              <li>
                <a href="#!" @click="changetitle('Document')"
                  ><i class="ri-file-list-2-line align-bottom me-2"></i>
                  <span class="file-list-link">Documents</span></a
                >
              </li>
              <li>
                <a href="#!" @click="changetitle('Media')"
                  ><i class="ri-image-2-line align-bottom me-2"></i>
                  <span class="file-list-link">Media</span></a
                >
              </li>
              <li>
                <a href="#!" @click="changerecent('Recent')"
                  ><i class="ri-history-line align-bottom me-2"></i>
                  <span class="file-list-link">Recents</span></a
                >
              </li>
              <li>
                <a href="#!" @click="changetitle('Important')"
                  ><i class="ri-star-line align-bottom me-2"></i>
                  <span class="file-list-link">Important</span></a
                >
              </li>
              <li>
                <a href="#!" @click="changetitle('Deleted')"
                  ><i class="ri-delete-bin-line align-bottom me-2"></i>
                  <span class="file-list-link">Deleted</span></a
                >
              </li>
            </ul>
          </div>

          <div class="mt-auto">
            <h6 class="fs-11 text-muted text-uppercase mb-3">Storage Status</h6>
            <div class="d-flex align-items-center">
              <div class="flex-shrink-0">
                <i class="ri-database-2-line fs-17"></i>
              </div>
              <div class="flex-grow-1 ms-3 overflow-hidden">
                <div class="progress mb-2 progress-sm">
                  <div
                    class="progress-bar bg-success"
                    role="progressbar"
                    style="width: 25%"
                    aria-valuenow="25"
                    aria-valuemin="0"
                    aria-valuemax="100"
                  ></div>
                </div>
                <span class="text-muted fs-12 d-block text-truncate"
                  ><b>47.52</b>GB used of <b>119</b>GB</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="file-manager-content w-100 p-3 py-0">
        <div class="mx-n3 pt-4 px-4 file-manager-content-scroll" data-simplebar>
          <div id="folder-list" class="mb-2">
            <div class="row justify-content-beetwen g-2">
              <div class="col">
                <div class="d-flex align-items-center">
                  <div class="flex-shrink-0 me-2 d-block d-lg-none">
                    <button
                      type="button"
                      class="btn btn-soft-success btn-icon btn-sm fs-16 file-menu-btn"
                    >
                      <i class="ri-menu-2-fill align-bottom"></i>
                    </button>
                  </div>
                  <div class="flex-grow-1">
                    <h5 class="fs-16 mb-0">Folders</h5>
                  </div>
                </div>
              </div>
              <!--end col-->
              <div class="col-auto">
                <div class="d-flex gap-2 align-items-start mb-2">
                  <Multiselect
                    class="form-control"
                    v-model="value"
                    :options="[
                      'File Type',
                      'All',
                      'Video',
                      'Images',
                      'Music',
                      'Documents',
                    ]"
                  />

                  <button
                    class="btn btn-success w-sm create-folder-modal text-nowrap"
                    data-bs-toggle="modal"
                    data-bs-target="#createFolderModal"
                  >
                    <i class="ri-add-line align-bottom me-1"></i> Create Folders
                  </button>
                </div>
              </div>
              <!--end col-->
            </div>
            <!--end row-->
            <div class="row" id="folderlist-data">
              <div
                v-for="(folder, index) of this.folders"
                :key="index"
                class="col-xxl-3 col-6 folder-card"
              >
                <div class="card bg-light shadow-none" id="folder-1">
                  <div class="card-body">
                    <div class="d-flex mb-1">
                      <div
                        class="form-check form-check-danger mb-3 fs-15 flex-grow-1"
                      >
                        <input
                          class="form-check-input"
                          type="checkbox"
                          value=""
                          id="folderlistCheckbox_1"
                          checked
                          v-if="folder.ischecked"
                        />
                        <input
                          class="form-check-input"
                          type="checkbox"
                          value=""
                          id="folderlistCheckbox_1"
                          v-if="!folder.ischecked"
                        />
                        <label
                          class="form-check-label"
                          for="folderlistCheckbox_1"
                        ></label>
                      </div>
                      <div class="dropdown">
                        <button
                          class="btn btn-ghost-primary btn-icon btn-sm dropdown"
                          type="button"
                          data-bs-toggle="dropdown"
                          aria-expanded="false"
                        >
                          <i class="ri-more-2-fill fs-16 align-bottom"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                          <li>
                            <a
                              class="dropdown-item view-item-btn"
                              href="javascript:void(0);"
                              >Open</a
                            >
                          </li>
                          <li>
                            <a
                              class="dropdown-item edit-folder-list"
                              href="#createFolderModal"
                              data-bs-toggle="modal"
                              role="button"
                              >Rename</a
                            >
                          </li>
                          <li>
                            <a
                              class="dropdown-item"
                              role="button"
                              @click="deletefolder(folder)"
                              >Delete</a
                            >
                          </li>
                        </ul>
                      </div>
                    </div>

                    <div class="text-center">
                      <div class="mb-2">
                        <i
                          class="ri-folder-2-fill align-bottom text-warning display-5"
                        ></i>
                      </div>
                      <h6 class="fs-15 folder-name">{{ folder.name }}</h6>
                    </div>
                    <div class="hstack mt-4 text-muted">
                      <span class="me-auto"
                        ><b>{{ folder.files }}</b> Files</span
                      >
                      <span
                        ><b>{{ folder.storage }}</b
                        >GB</span
                      >
                    </div>
                  </div>
                </div>
              </div>
              <!--end col-->
            </div>
            <!--end row-->
          </div>
          <div>
            <div class="d-flex align-items-center mb-3">
              <h5 class="flex-grow-1 fs-16 mb-0" id="filetype-title">
                Recent File
              </h5>
              <div class="flex-shrink-0">
                <button
                  class="btn btn-success createFile-modal"
                  data-bs-toggle="modal"
                  data-bs-target="#createFileModal"
                >
                  <i class="ri-add-line align-bottom me-1"></i> Create File
                </button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table align-middle table-nowrap mb-0">
                <thead class="table-active">
                  <tr>
                    <th scope="col">Name</th>
                    <th scope="col">File Item</th>
                    <th scope="col">File Size</th>
                    <th scope="col">Recent Date</th>
                    <th scope="col" class="text-center">Actions</th>
                  </tr>
                </thead>
                <tbody id="file-list"></tbody>
              </table>
            </div>
            <!-- <a href="javascript:prevPage()" id="btn_prev">Prev</a> -->
            <ul id="pagination" class="pagination pagination-lg"></ul>
            <!-- <a href="javascript:nextPage()" id="btn_next">Next</a> -->
            <div
              class="align-items-center mt-2 row g-3 text-center text-sm-start"
            >
              <div class="col-sm">
                <div class="text-muted">
                  Showing<span class="fw-semibold">4</span> of
                  <span class="fw-semibold">125</span> Results
                </div>
              </div>
              <div class="col-sm-auto">
                <ul
                  class="pagination pagination-separated pagination-sm justify-content-center justify-content-sm-start mb-0"
                >
                  <li class="page-item disabled">
                    <a href="#" class="page-link">←</a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link">1</a>
                  </li>
                  <li class="page-item active">
                    <a href="#" class="page-link">2</a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link">3</a>
                  </li>
                  <li class="page-item">
                    <a href="#" class="page-link">→</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="file-manager-detail-content p-3 py-0">
        <div class="mx-n3 pt-3 px-3 file-detail-content-scroll" data-simplebar>
          <div id="folder-overview">
            <div
              class="d-flex align-items-center pb-3 border-bottom border-bottom-dashed"
            >
              <h5 class="flex-grow-1 fw-semibold mb-0">Overview</h5>
              <div>
                <button
                  type="button"
                  class="btn btn-soft-danger btn-icon btn-sm fs-16 close-btn-overview"
                  @click="fileDetailShow"
                >
                  <i class="ri-close-fill align-bottom"></i>
                </button>
              </div>
            </div>
            <apexchart
              class="apex-charts"
              height="300"
              dir="ltr"
              :series="series"
              :options="chartOptions"
            ></apexchart>
            <div class="mt-4">
              <ul class="list-unstyled vstack gap-4">
                <li>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="avatar-xs">
                        <div
                          class="avatar-title rounded bg-soft-secondary text-secondary"
                        >
                          <i class="ri-file-text-line fs-17"></i>
                        </div>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-1 fs-15">Documents</h5>
                      <p class="mb-0 fs-12 text-muted">2348 files</p>
                    </div>
                    <b>27.01 GB</b>
                  </div>
                </li>
                <li>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="avatar-xs">
                        <div
                          class="avatar-title rounded bg-soft-success text-success"
                        >
                          <i class="ri-gallery-line fs-17"></i>
                        </div>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-1 fs-15">Media</h5>
                      <p class="mb-0 fs-12 text-muted">12480 files</p>
                    </div>
                    <b>20.87 GB</b>
                  </div>
                </li>
                <li>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="avatar-xs">
                        <div
                          class="avatar-title rounded bg-soft-warning text-warning"
                        >
                          <i class="ri-folder-2-line fs-17"></i>
                        </div>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-1 fs-15">Projects</h5>
                      <p class="mb-0 fs-12 text-muted">349 files</p>
                    </div>
                    <b>4.10 GB</b>
                  </div>
                </li>
                <li>
                  <div class="d-flex align-items-center">
                    <div class="flex-shrink-0">
                      <div class="avatar-xs">
                        <div
                          class="avatar-title rounded bg-soft-primary text-primary"
                        >
                          <i class="ri-error-warning-line fs-17"></i>
                        </div>
                      </div>
                    </div>
                    <div class="flex-grow-1 ms-3">
                      <h5 class="mb-1 fs-15">Others</h5>
                      <p class="mb-0 fs-12 text-muted">9873 files</p>
                    </div>
                    <b>33.54 GB</b>
                  </div>
                </li>
              </ul>
            </div>
            <div class="pb-3 mt-auto">
              <div class="alert alert-danger d-flex align-items-center mb-0">
                <div class="flex-shrink-0">
                  <i
                    class="ri-cloud-line text-danger align-bottom display-5"
                  ></i>
                </div>
                <div class="flex-grow-1 ms-3">
                  <h5 class="text-danger fs-14">Upgrade to Pro</h5>
                  <p class="text-muted mb-2">Get more space for your...</p>
                  <button class="btn btn-sm btn-danger">
                    <i class="ri-upload-cloud-line align-bottom"></i> Upgrade
                    Now
                  </button>
                </div>
              </div>
            </div>
          </div>
          <div id="file-overview" class="h-100">
            <div class="d-flex h-100 flex-column">
              <div
                class="d-flex align-items-center pb-3 border-bottom border-bottom-dashed mb-3 gap-2"
              >
                <h5 class="flex-grow-1 fw-semibold mb-0">File Preview</h5>
                <div>
                  <button
                    type="button"
                    class="btn btn-ghost-primary btn-icon btn-sm fs-16 favourite-btn"
                  >
                    <i class="ri-star-fill align-bottom"></i>
                  </button>
                  <button
                    type="button"
                    class="btn btn-soft-danger btn-icon btn-sm fs-16 close-btn-overview"
                  >
                    <i class="ri-close-fill align-bottom"></i>
                  </button>
                </div>
              </div>

              <div class="pb-3 border-bottom border-bottom-dashed mb-3">
                <div
                  class="file-details-box bg-light p-3 text-center rounded-3 border border-light mb-3"
                >
                  <div class="display-4 file-icon">
                    <i class="ri-file-text-fill text-secondary"></i>
                  </div>
                </div>
                <button
                  type="button"
                  class="btn btn-icon btn-sm btn-ghost-success float-end fs-16"
                >
                  <i class="ri-share-forward-line"></i>
                </button>
                <h5 class="fs-16 mb-1 file-name">html.docx</h5>
                <p class="text-muted mb-0 fs-12">
                  <span class="file-size">0.3 KB</span>,
                  <span class="create-date">19 Apr, 2022</span>
                </p>
              </div>
              <div>
                <h5 class="fs-12 text-uppercase text-muted mb-3">
                  File Description :
                </h5>

                <div class="table-responsive">
                  <table class="table table-borderless table-nowrap table-sm">
                    <tbody>
                      <tr>
                        <th scope="row" style="width: 35%">File Name :</th>
                        <td class="file-name">html.docx</td>
                      </tr>
                      <tr>
                        <th scope="row">File Type :</th>
                        <td class="file-type">Documents</td>
                      </tr>
                      <tr>
                        <th scope="row">Size :</th>
                        <td class="file-size">0.3 KB</td>
                      </tr>
                      <tr>
                        <th scope="row">Created :</th>
                        <td class="create-date">19 Apr, 2022</td>
                      </tr>
                      <tr>
                        <th scope="row">Path :</th>
                        <td class="file-path">
                          <div class="user-select-all text-truncate">
                            *:\projects\src\assets\images
                          </div>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>

                <div>
                  <h5 class="fs-12 text-uppercase text-muted mb-3">
                    Share Information:
                  </h5>
                  <div class="table-responsive">
                    <table class="table table-borderless table-nowrap table-sm">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 35%">Share Name :</th>
                          <td class="share-name">\\*\Projects</td>
                        </tr>
                        <tr>
                          <th scope="row">Share Path :</th>
                          <td class="share-path">velzon:\Documents\</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <div class="mt-auto border-top border-top-dashed py-3">
                <div class="hstack gap-2">
                  <button type="button" class="btn btn-soft-primary w-100">
                    <i class="ri-download-2-line align-bottom me-1"></i>
                    Download
                  </button>
                  <button
                    type="button"
                    class="btn btn-soft-danger w-100 remove-file-overview"
                    data-remove-id=""
                    data-bs-toggle="modal"
                    data-bs-target="#removeFileItemModal"
                  >
                    <i class="ri-close-fill align-bottom me-1"></i> Delete
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- START CREATE FOLDER MODAL -->
    <div
      class="modal fade zoomIn"
      id="createFolderModal"
      tabindex="-1"
      aria-labelledby="createFolderModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
          <div class="modal-header p-3 bg-soft-success">
            <h5 class="modal-title" id="createFolderModalLabel">
              Create Folder
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              id="addFolderBtn-close"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form
              autocomplete="off"
              class="needs-validation createfolder-form"
              id="createfolder-form"
              novalidate
            >
              <div class="mb-4">
                <label for="foldername-input" class="form-label"
                  >Folder Name</label
                >
                <input
                  type="text"
                  class="form-control"
                  id="foldername-input"
                  required
                />
                <div class="invalid-feedback">Please enter a folder name.</div>
                <input
                  type="hidden"
                  class="form-control"
                  id="folderid-input"
                  value=""
                />
              </div>
              <div class="hstack gap-2 justify-content-end">
                <button
                  type="button"
                  class="btn btn-ghost-success"
                  data-bs-dismiss="modal"
                >
                  <i class="ri-close-line align-bottom"></i> Close
                </button>
                <button
                  type="button"
                  class="btn btn-primary"
                  id="addNewFolder"
                  @click="createfolder"
                >
                  Add Folder
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END CREATE FOLDER MODAL -->

    <!-- START CREATE FILE MODAL -->
    <div
      class="modal fade zoomIn"
      id="createFileModal"
      tabindex="-1"
      aria-labelledby="createFileModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0">
          <div class="modal-header p-3 bg-soft-success">
            <h5 class="modal-title" id="createFileModalLabel">Create File</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              id="addFileBtn-close"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <form
              autocomplete="off"
              class="needs-validation createfile-form"
              id="createfile-form"
              novalidate
            >
              <div class="mb-4">
                <label for="filename-input" class="form-label">File Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="filename-input"
                  value=""
                  required
                />
                <div class="invalid-feedback">Please enter a file name.</div>
                <input
                  type="hidden"
                  class="form-control"
                  id="fileid-input"
                  value=""
                />
              </div>
              <div class="hstack gap-2 justify-content-end">
                <button
                  type="button"
                  class="btn btn-ghost-success"
                  data-bs-dismiss="modal"
                >
                  <i class="ri-close-line align-bottom"></i> Close
                </button>
                <button type="button" class="btn btn-primary" id="addNewFile">
                  Create
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- END CREATE FILE MODAL -->

    <!-- removeFileItemModal -->
    <div
      id="removeFileItemModal"
      class="modal fade zoomIn"
      tabindex="-1"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              id="close-removefilemodal"
            ></button>
          </div>
          <div class="modal-body">
            <div class="mt-2 text-center">
              <lord-icon
                src="https://cdn.lordicon.com/gsqxdxog.json"
                trigger="loop"
                colors="primary:#f7b84b,secondary:#f06548"
                style="width: 100px; height: 100px"
              ></lord-icon>
              <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                <h4>Are you sure ?</h4>
                <p class="text-muted mx-4 mb-0">
                  Are you sure you want to remove this item ?
                </p>
              </div>
            </div>
            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
              <button
                type="button"
                class="btn w-sm btn-light"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button
                type="button"
                class="btn w-sm btn-danger"
                id="remove-fileitem"
              >
                Yes, Delete It!
              </button>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- removeFileItemModal -->
    <div
      id="removeFolderModal"
      class="modal fade zoomIn"
      tabindex="-1"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
              id="close-removeFoldermodal"
            ></button>
          </div>
          <div class="modal-body">
            <div class="mt-2 text-center">
              <lord-icon
                src="https://cdn.lordicon.com/gsqxdxog.json"
                trigger="loop"
                colors="primary:#f7b84b,secondary:#f06548"
                style="width: 100px; height: 100px"
              ></lord-icon>
              <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                <h4>Are you sure ?</h4>
                <p class="text-muted mx-4 mb-0">
                  Are you sure you want to remove this folder ?
                </p>
              </div>
            </div>
            <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
              <button
                type="button"
                class="btn w-sm btn-light"
                data-bs-dismiss="modal"
              >
                Close
              </button>
              <button
                type="button"
                class="btn w-sm btn-danger"
                id="remove-folderList"
              >
                Yes, Delete It!
              </button>
            </div>
          </div>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
  </Layout>
</template>
