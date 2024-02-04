<script>
  localStorage.setItem("rightbar_isopen", true);
  import { layoutMethods, layoutComputed } from "@/state/helpers";
  import { SimpleBar } from "simplebar-vue3";
  /**
   * Right sidebar component
   */
  export default {
    components: {
      SimpleBar,
    },
    data() {
      return {
        config: {
          handler: this.handleRightBarClick,
          middleware: this.middleware,
          events: ["click"],
        },
      };
    },
    methods: {
      ...layoutMethods,
      hide() {
        this.$parent.toggleRightSidebar();
      },
      handleRightBarClick() {
        this.$parent.hideRightSidebar();
      },
      middleware(event) {
        if (event.target.classList)
          return !event.target.classList.contains("toggle-right");
      },
      removeExtraFade() {
        let fade = document.getElementsByClassName('offcanvas-backdrop fade show')
        for (let i = 0; i < fade.length; i++) {
          while (fade.length > 1) {
            fade[i].remove()
          }
        }
      }
    },
    mounted() {
      let rightbar_isopen = localStorage.getItem('rightbar_isopen')
      if (rightbar_isopen == 'true') {
        document.getElementById('mdi-cog').click()
        localStorage.setItem("rightbar_isopen", false);
      }
      var setpreloader = document.getElementById("preloader");
      if (localStorage.getItem('data-preloader') && localStorage.getItem('data-preloader') == 'enable') {
        document.documentElement.setAttribute("data-preloader", "enable");
        if (setpreloader) {
          setTimeout(function () {
            setpreloader.style.opacity = "0";
            setpreloader.style.visibility = "hidden";
          }, 1000);
        }
      } else {
        document.documentElement.setAttribute("data-preloader", "disable");
        if (setpreloader) {
          setpreloader.style.opacity = "0";
          setpreloader.style.visibility = "hidden";
        }
      }
      if (document.getElementById('collapseBgGradient')) {
        Array.from(document.querySelectorAll("#collapseBgGradient .form-check input")).forEach(function () {
          if (document.querySelector("[data-bs-target='#collapseBgGradient']")) {
            document.querySelector("[data-bs-target='#collapseBgGradient']").addEventListener('click', function () {
              document.getElementById("sidebar-color-gradient").click();
            });
          }
        });
      }
  
      Array.from(document.querySelectorAll("[name='data-sidebar']")).forEach(function (elem) {
        if (document.querySelector("[data-bs-target='#collapseBgGradient']")) {
          if (document.querySelector("#collapseBgGradient .form-check input:checked")) {
            document.querySelector("[data-bs-target='#collapseBgGradient']").classList.add("active");
          } else {
            document.querySelector("[data-bs-target='#collapseBgGradient']").classList.remove("active");
            document.getElementById('collapseBgGradient').classList.remove('show');
          }
          
          elem.addEventListener("change", function () {
            if (document.querySelector("#collapseBgGradient .form-check input:checked")) {
              document.querySelector("[data-bs-target='#collapseBgGradient']").classList.add("active");
            } else {
              document.getElementById('collapseBgGradient').classList.remove('show');
              document.querySelector("[data-bs-target='#collapseBgGradient']").classList.remove("active");
            }
          })
        }
      })
    },
    computed: {
      ...layoutComputed,
      layoutType: {
        get() {
          return this.$store ? this.$store.state.layout.layoutType : {} || {};
        },
        set(layout) {
          localStorage.setItem("rightbar_isopen", true);
          this.changeLayoutType({
            layoutType: layout,
          });
        },
      },
      layoutWidth: {
        get() {
          return this.$store ? this.$store.state.layout.layoutWidth : {} || {};
        },
        set(width) {
          this.changeLayoutWidth({
            layoutWidth: width,
          });
        },
      },
      topbar: {
        get() {
          return this.$store ? this.$store.state.layout.topbar : {} || {};
        },
        set(topbar) {
          this.changeTopbar({
            topbar: topbar,
          });
        },
      },
      sidebarSize: {
        get() {
          return this.$store ? this.$store.state.layout.sidebarSize : {} || {};
        },
        set(type) {
          return this.changeSidebarSize({
            sidebarSize: type,
          });
        },
      },
      position: {
        get() {
          return this.$store ? this.$store.state.layout.position : {} || {};
        },
        set(position) {
          return this.changePosition({
            position: position,
          });
        },
      },
      sidebarView: {
        get() {
          return this.$store ? this.$store.state.layout.sidebarView : {} || {};
        },
        set(sidebarView) {
          return this.changeSidebarView({
            sidebarView: sidebarView,
          });
        },
      },
      sidebarColor: {
        get() {
          return this.$store ? this.$store.state.layout.sidebarColor : {} || {};
        },
        set(sidebarColor) {
          return this.changeSidebarColor({
            sidebarColor: sidebarColor,
          });
        },
      },
      sidebarImage: {
        get() {
          return this.$store ? this.$store.state.layout.sidebarImage : {} || {};
        },
        set(sidebarImage) {
          return this.changeSidebarImage({
            sidebarImage: sidebarImage,
          });
        },
      },
      preloader: {
        get() {
          return this.$store ? this.$store.state.layout.preloader : {} || {};
        },
        set(preloader) {
          return this.changePreloader({
            preloader: preloader,
          });
        },
      },
      mode: {
        get() {
          return this.$store ? this.$store.state.layout.mode : {} || {};
        },
        set(mode) {
          return this.changeMode({
            mode: mode,
          });
        },
      },
    },
    watch: {
      mode: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "dark":
                document.documentElement.setAttribute("data-layout-mode", "dark");
                break;
              case "light":
                document.documentElement.setAttribute(
                  "data-layout-mode",
                  "light"
                );
                break;
            }
          }
        },
      },
      sidebarColor: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "dark":
                document.documentElement.setAttribute("data-sidebar", "dark");
                break;
              case "light":
                document.documentElement.setAttribute("data-sidebar", "light");
                break;
              case "gradient":
                document.documentElement.setAttribute("data-sidebar", "gradient");
                break;
              case "gradient-2":
                document.documentElement.setAttribute("data-sidebar", "gradient-2");
                break;
              case "gradient-3":
                document.documentElement.setAttribute("data-sidebar", "gradient-3");
                break;
              case "gradient-4":
                document.documentElement.setAttribute("data-sidebar", "gradient-4");
                break;
            }
          }
        },
      },
      preloader: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            localStorage.setItem('data-preloader', newVal);
          }
        },
      },
      sidebarImage: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "img-1":
                document.documentElement.setAttribute("data-sidebar-image", "img-1");
                break;
              case "img-2":
                document.documentElement.setAttribute("data-sidebar-image", "img-2");
                break;
              case "img-3":
                document.documentElement.setAttribute("data-sidebar-image", "img-3");
                break;
              case "img-4":
                document.documentElement.setAttribute("data-sidebar-image", "img-4");
                break;
              case "none":
                document.documentElement.setAttribute("data-sidebar-image", "none");
                break;
            }
          }
        },
      },
      sidebarView: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "detached":
                document.documentElement.setAttribute(
                  "data-layout-style",
                  "detached"
                );
                break;
              case "default":
                document.documentElement.setAttribute(
                  "data-layout-style",
                  "default"
                );
                break;
            }
          }
        },
      },
      position: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "fixed":
                document.documentElement.setAttribute(
                  "data-layout-position",
                  "fixed"
                );
                break;
              case "scrollable":
                document.documentElement.setAttribute(
                  "data-layout-position",
                  "scrollable"
                );
                break;
            }
          }
        },
      },
      sidebarSize: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "lg":
                document.documentElement.setAttribute("data-sidebar-size", "lg");
                break;
              case "sm":
                document.documentElement.setAttribute("data-sidebar-size", "sm");
                break;
              case "md":
                document.documentElement.setAttribute("data-sidebar-size", "md");
                break;
              case "sm-hover":
                document.documentElement.setAttribute(
                  "data-sidebar-size",
                  "sm-hover"
                );
                break;
            }
          }
        },
      },
      topbar: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "light":
                document.documentElement.setAttribute("data-topbar", "light");
                break;
              case "dark":
                document.documentElement.setAttribute("data-topbar", "dark");
                break;
            }
          }
        },
      },
      layoutWidth: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "fluid":
                document.documentElement.setAttribute(
                  "data-layout-width",
                  "fluid"
                );
                break;
              case "boxed":
                document.documentElement.setAttribute(
                  "data-layout-width",
                  "boxed"
                );
                break;
            }
          }
        },
      },
      layoutType: {
        immediate: true,
        deep: true,
        handler(newVal, oldVal) {
          if (newVal !== oldVal) {
            switch (newVal) {
              case "horizontal":
                document.documentElement.setAttribute(
                  "data-layout",
                  "horizontal"
                );
                break;
              case "vertical":
                document.documentElement.setAttribute("data-layout", "vertical");
                break;
              case "twocolumn":
                document.documentElement.setAttribute("data-layout", "twocolumn");
                break;
            }
          }
        },
      },
    },
  };
  </script>
  
  <template>
    <div>
      <div id="preloader">
        <div id="status">
          <div class="spinner-border text-primary avatar-sm" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
        </div>
      </div>
      <div class="customizer-setting d-none d-md-block">
        <div class="btn-info btn-rounded shadow-lg btn btn-icon btn-lg p-2" data-bs-toggle="offcanvas"
          data-bs-target="#theme-settings-offcanvas" aria-controls="theme-settings-offcanvas" id="mdi-cog">
          <i class="mdi mdi-spin mdi-cog-outline fs-22"></i>
        </div>
      </div>
      <div class="offcanvas offcanvas-end border-0" tabindex="-1" id="theme-settings-offcanvas">
        <div class="d-flex align-items-center bg-primary bg-gradient p-3 offcanvas-header">
          <h5 class="m-0 me-2 text-white">Theme Customizer</h5>
          <button type="button" class="btn-close btn-close-white ms-auto" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body p-0">
          <SimpleBar class="h-100">
            <div class="p-4">
              <h6 class="mb-0 fw-semibold text-uppercase">Layout</h6>
              <p class="text-muted">Choose your layout</p>
  
              <div class="row">
                <div class="col-4">
                  <div class="form-check card-radio">
                    <input id="customizer-layout01" name="data-layout" type="radio" value="vertical"
                      class="form-check-input" v-model="layoutType" />
                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout01">
                      <span class="d-flex gap-1 h-100">
                        <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                            <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                        </span>
                        <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                            <span class="bg-light d-block p-1"></span>
                            <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                        </span>
                      </span>
                    </label>
                  </div>
                  <h5 class="fs-13 text-center mt-2">Vertical</h5>
                </div>
                <div class="col-4">
                  <div class="form-check card-radio">
                    <input id="customizer-layout02" name="data-layout" type="radio" value="horizontal"
                      class="form-check-input" v-model="layoutType" />
                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout02">
                      <span class="d-flex h-100 flex-column gap-1">
                        <span class="bg-light d-flex p-1 gap-1 align-items-center">
                          <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                          <span class="d-block p-1 pb-0 px-2 bg-soft-primary ms-auto"></span>
                          <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                        </span>
                        <span class="bg-light d-block p-1"></span>
                        <span class="bg-light d-block p-1 mt-auto"></span>
                      </span>
                    </label>
                  </div>
                  <h5 class="fs-13 text-center mt-2">Horizontal</h5>
                </div>
                <div class="col-4">
                  <div class="form-check card-radio">
                    <input id="customizer-layout03" name="data-layout" type="radio" value="twocolumn"
                      class="form-check-input" v-model="layoutType" />
                    <label class="form-check-label p-0 avatar-md w-100" for="customizer-layout03">
                      <span class="d-flex gap-1 h-100">
                        <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1">
                            <span class="d-block p-1 bg-soft-primary mb-2"></span>
                            <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                          </span>
                        </span>
                        <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                        </span>
                        <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                            <span class="bg-light d-block p-1"></span>
                            <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                        </span>
                      </span>
                    </label>
                  </div>
                  <h5 class="fs-13 text-center mt-2">Two Column</h5>
                </div>
                <!-- end col -->
              </div>
  
              <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Color Scheme</h6>
              <p class="text-muted">Choose Light or Dark Scheme.</p>
  
              <div class="colorscheme-cardradio">
                <div class="row">
                  <div class="col-4">
                    <div class="form-check card-radio">
                      <input class="form-check-input" type="radio" name="data-layout-mode" id="layout-mode-light"
                        value="light" v-model="mode" />
                      <label class="form-check-label p-0 avatar-md w-100" for="layout-mode-light">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Light</h5>
                  </div>
  
                  <div class="col-4">
                    <div class="form-check card-radio dark">
                      <input class="form-check-input" v-model="mode" type="radio" name="data-layout-mode"
                        id="layout-mode-dark" value="dark" />
                      <label class="form-check-label p-0 avatar-md w-100 bg-dark" for="layout-mode-dark">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="
                                bg-soft-light
                                d-flex
                                h-100
                                flex-column
                                gap-1
                                p-1
                              ">
                              <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-soft-light d-block p-1"></span>
                              <span class="bg-soft-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                  </div>
                </div>
              </div>
  
              <div v-if="layoutType != 'twocolumn'" id="layout-width">
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Layout Width</h6>
                <p class="text-muted">Choose Fluid or Boxed layout.</p>
  
                <div class="row">
                  <div class="col-4">
                    <div class="form-check card-radio">
                      <input class="form-check-input" type="radio" v-model="layoutWidth" name="data-layout-width"
                        id="layout-width-fluid" value="fluid" />
                      <label class="form-check-label p-0 avatar-md w-100" for="layout-width-fluid">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Fluid</h5>
                  </div>
                  <div class="col-4">
                    <div class="form-check card-radio">
                      <input class="form-check-input" type="radio" v-model="layoutWidth" name="data-layout-width"
                        id="layout-width-boxed" value="boxed" />
                      <label class="form-check-label p-0 avatar-md w-100 px-2" for="layout-width-boxed">
                        <span class="d-flex gap-1 h-100 border-start border-end">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Boxed</h5>
                  </div>
                </div>
              </div>
  
              <div v-if="layoutType != 'twocolumn'" id="layout-position">
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">
                  Layout Position
                </h6>
                <p class="text-muted">
                  Choose Fixed or Scrollable Layout Position.
                </p>
  
                <div class="btn-group radio" role="group">
                  <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-fixed"
                    value="fixed" v-model="position" />
                  <label class="btn btn-light w-sm" for="layout-position-fixed">Fixed</label>
  
                  <input type="radio" class="btn-check" name="data-layout-position" id="layout-position-scrollable"
                    value="scrollable" v-model="position" />
                  <label class="btn btn-light w-sm ms-0" for="layout-position-scrollable">Scrollable</label>
                </div>
              </div>
              <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Topbar Color</h6>
              <p class="text-muted">Choose Light or Dark Topbar Color.</p>
  
              <div class="row">
                <div class="col-4">
                  <div class="form-check card-radio">
                    <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-light" value="light"
                      v-model="topbar" />
                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-light">
                      <span class="d-flex gap-1 h-100">
                        <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                            <span class="
                                d-block
                                p-1
                                px-2
                                bg-soft-primary
                                rounded
                                mb-2
                              "></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                        </span>
                        <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                            <span class="bg-light d-block p-1"></span>
                            <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                        </span>
                      </span>
                    </label>
                  </div>
                  <h5 class="fs-13 text-center mt-2">Light</h5>
                </div>
                <div class="col-4">
                  <div class="form-check card-radio">
                    <input class="form-check-input" type="radio" name="data-topbar" id="topbar-color-dark" value="dark"
                      v-model="topbar" />
                    <label class="form-check-label p-0 avatar-md w-100" for="topbar-color-dark">
                      <span class="d-flex gap-1 h-100">
                        <span class="flex-shrink-0">
                          <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                            <span class="
                                d-block
                                p-1
                                px-2
                                bg-soft-primary
                                rounded
                                mb-2
                              "></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                          </span>
                        </span>
                        <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                            <span class="bg-primary d-block p-1"></span>
                            <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                        </span>
                      </span>
                    </label>
                  </div>
                  <h5 class="fs-13 text-center mt-2">Dark</h5>
                </div>
              </div>
  
              <div v-if="layoutType == 'vertical'" id="sidebar-size">
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Size</h6>
                <p class="text-muted">Choose a size of Sidebar.</p>
  
                <div class="row">
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-default"
                        v-model="sidebarSize" value="lg" />
                      <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-default">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="
                                  d-block
                                  p-1
                                  px-2
                                  bg-soft-primary
                                  rounded
                                  mb-2
                                "></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Default</h5>
                  </div>
  
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" type="radio" name="data-sidebar-size" id="sidebar-size-compact"
                        v-model="sidebarSize" value="md" />
                      <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-compact">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Compact</h5>
                  </div>
  
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" v-model="sidebarSize" type="radio" name="data-sidebar-size"
                        id="sidebar-size-small" value="sm" />
                      <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1">
                              <span class="d-block p-1 bg-soft-primary mb-2"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Small (Icon View)</h5>
                  </div>
  
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" v-model="sidebarSize" type="radio" name="data-sidebar-size"
                        id="sidebar-size-small-hover" value="sm-hover" />
                      <label class="form-check-label p-0 avatar-md w-100" for="sidebar-size-small-hover">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1">
                              <span class="d-block p-1 bg-soft-primary mb-2"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Small Hover View</h5>
                  </div>
                </div>
              </div>
  
              <div v-if="layoutType == 'vertical'" id="sidebar-view">
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar View</h6>
                <p class="text-muted">Choose Default or Detached Sidebar view.</p>
  
                <div class="row">
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" v-model="sidebarView" type="radio" name="data-layout-style"
                        id="sidebar-view-default" value="default" />
                      <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-default">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="
                                  d-block
                                  p-1
                                  px-2
                                  bg-soft-primary
                                  rounded
                                  mb-2
                                "></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Default</h5>
                  </div>
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" v-model="sidebarView" type="radio" name="data-layout-style"
                        id="sidebar-view-detached" value="detached" />
                      <label class="form-check-label p-0 avatar-md w-100" for="sidebar-view-detached">
                        <span class="d-flex h-100 flex-column">
                          <span class="
                              bg-light
                              d-flex
                              p-1
                              gap-1
                              align-items-center
                              px-2
                            ">
                            <span class="d-block p-1 bg-soft-primary rounded me-1"></span>
                            <span class="
                                d-block
                                p-1
                                pb-0
                                px-2
                                bg-soft-primary
                                ms-auto
                              "></span>
                            <span class="d-block p-1 pb-0 px-2 bg-soft-primary"></span>
                          </span>
                          <span class="d-flex gap-1 h-100 p-1 px-2">
                            <span class="flex-shrink-0">
                              <span class="
                                  bg-light
                                  d-flex
                                  h-100
                                  flex-column
                                  gap-1
                                  p-1
                                ">
                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                                <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              </span>
                            </span>
                          </span>
                          <span class="bg-light d-block p-1 mt-auto px-2"></span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Detached</h5>
                  </div>
                </div>
              </div>
              <div v-if="layoutType != 'horizontal'" id="sidebar-color">
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">
                  Sidebar Color
                </h6>
                <p class="text-muted">Choose Ligth or Dark Sidebar Color.</p>
  
                <div class="row">
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" v-model="sidebarColor" type="radio" name="data-sidebar"
                        id="sidebar-color-light" value="light" />
                      <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-light">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-white border-end d-flex h-100 flex-column gap-1 p-1">
                              <span class="
                                  d-block
                                  p-1
                                  px-2
                                  bg-soft-primary
                                  rounded
                                  mb-2
                                "></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Light</h5>
                  </div>
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" v-model="sidebarColor" type="radio" name="data-sidebar"
                        id="sidebar-color-dark" value="dark" />
                      <label class="form-check-label p-0 avatar-md w-100" for="sidebar-color-dark">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="
                                bg-primary
                                d-flex
                                h-100
                                flex-column
                                gap-1
                                p-1
                              ">
                              <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Dark</h5>
                  </div>
                  <div class="col-4">
                    <button class="btn btn-link avatar-md w-100 p-0 overflow-hidden border collapsed" type="button"
                      data-bs-toggle="collapse" data-bs-target="#collapseBgGradient" aria-expanded="false"
                      aria-controls="collapseBgGradient">
                      <span class="d-flex gap-1 h-100">
                        <span class="flex-shrink-0">
                          <span class="bg-vertical-gradient d-flex h-100 flex-column gap-1 p-1">
                            <span class="d-block p-1 px-2 bg-soft-light rounded mb-2"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                            <span class="d-block p-1 px-2 pb-0 bg-soft-light"></span>
                          </span>
                        </span>
                        <span class="flex-grow-1">
                          <span class="d-flex h-100 flex-column">
                            <span class="bg-light d-block p-1"></span>
                            <span class="bg-light d-block p-1 mt-auto"></span>
                          </span>
                        </span>
                      </span>
                    </button>
                    <h5 class="fs-13 text-center mt-2">Gradient</h5>
                  </div>
                </div>
                <div class="collapse" id="collapseBgGradient">
                  <div class="d-flex gap-2 flex-wrap img-switch p-2 px-3 bg-light rounded">
  
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" type="radio" v-model="sidebarColor" name="data-sidebar"
                        id="sidebar-color-gradient" value="gradient">
                      <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient">
                        <span class="avatar-title rounded-circle bg-vertical-gradient"></span>
                      </label>
                    </div>
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" type="radio" v-model="sidebarColor" name="data-sidebar"
                        id="sidebar-color-gradient-2" value="gradient-2">
                      <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-2">
                        <span class="avatar-title rounded-circle bg-vertical-gradient-2"></span>
                      </label>
                    </div>
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" type="radio" v-model="sidebarColor" name="data-sidebar"
                        id="sidebar-color-gradient-3" value="gradient-3">
                      <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-3">
                        <span class="avatar-title rounded-circle bg-vertical-gradient-3"></span>
                      </label>
                    </div>
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" type="radio" v-model="sidebarColor" name="data-sidebar"
                        id="sidebar-color-gradient-4" value="gradient-4">
                      <label class="form-check-label p-0 avatar-xs rounded-circle" for="sidebar-color-gradient-4">
                        <span class="avatar-title rounded-circle bg-vertical-gradient-4"></span>
                      </label>
                    </div>
                  </div>
                </div>
              </div>
  
              <div v-if="layoutType != 'horizontal'" id="sidebar-img">
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Sidebar Images</h6>
                <p class="text-muted">Choose a image of Sidebar.</p>
  
                <div class="d-flex gap-2 flex-wrap img-switch">
                  <div class="form-check sidebar-setting card-radio">
                    <input class="form-check-input" v-model="sidebarImage" type="radio" name="data-sidebar-img"
                      id="sidebarimg-none" value="none" />
                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-none">
                      <span class="avatar-md w-auto bg-light d-flex align-items-center justify-content-center">
                        <i class="ri-close-fill fs-20"></i>
                      </span>
                    </label>
                  </div>
  
                  <div class="form-check sidebar-setting card-radio">
                    <input class="form-check-input" v-model="sidebarImage" type="radio" name="data-sidebar-img"
                      id="sidebarimg-01" value="img-1" />
                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-01">
                      <img src="@/assets/images/sidebar/img-1.jpg" alt="" class="avatar-md w-auto object-cover">
                    </label>
                  </div>
  
                  <div class="form-check sidebar-setting card-radio">
                    <input class="form-check-input" v-model="sidebarImage" type="radio" name="data-sidebar-img"
                      id="sidebarimg-02" value="img-2" />
                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-02">
                      <img src="@/assets/images/sidebar/img-2.jpg" alt="" class="avatar-md w-auto object-cover">
                    </label>
                  </div>
                  <div class="form-check sidebar-setting card-radio">
                    <input class="form-check-input" v-model="sidebarImage" type="radio" name="data-sidebar-img"
                      id="sidebarimg-03" value="img-3" />
                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-03">
                      <img src="@/assets/images/sidebar/img-3.jpg" alt="" class="avatar-md w-auto object-cover">
                    </label>
                  </div>
                  <div class="form-check sidebar-setting card-radio">
                    <input class="form-check-input" v-model="sidebarImage" type="radio" name="data-sidebar-img"
                      id="sidebarimg-04" value="img-4" />
                    <label class="form-check-label p-0 avatar-sm h-auto" for="sidebarimg-04">
                      <img src="@/assets/images/sidebar/img-4.jpg" alt="" class="avatar-md w-auto object-cover">
                    </label>
                  </div>
                </div>
              </div>
  
              <div id="preloader-menu">
                <h6 class="mt-4 mb-0 fw-semibold text-uppercase">Preloader</h6>
                <p class="text-muted">Choose a preloader.</p>
  
                <div class="row">
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" v-model="preloader" type="radio" name="data-preloader"
                        id="preloader-view-custom" value="enable">
                      <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-custom">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-soft-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                        <!-- <div id="preloader"> -->
                        <div id="status" class="d-flex align-items-center justify-content-center">
                          <div class="spinner-border text-primary avatar-xxs m-auto" role="status">
                            <span class="visually-hidden">Loading...</span>
                          </div>
                        </div>
                        <!-- </div> -->
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Enable</h5>
                  </div>
                  <div class="col-4">
                    <div class="form-check sidebar-setting card-radio">
                      <input class="form-check-input" v-model="preloader" type="radio" name="data-preloader"
                        id="preloader-view-none" value="disable">
                      <label class="form-check-label p-0 avatar-md w-100" for="preloader-view-none">
                        <span class="d-flex gap-1 h-100">
                          <span class="flex-shrink-0">
                            <span class="bg-light d-flex h-100 flex-column gap-1 p-1">
                              <span class="d-block p-1 px-2 bg-primary rounded mb-2"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                              <span class="d-block p-1 px-2 pb-0 bg-soft-primary"></span>
                            </span>
                          </span>
                          <span class="flex-grow-1">
                            <span class="d-flex h-100 flex-column">
                              <span class="bg-light d-block p-1"></span>
                              <span class="bg-light d-block p-1 mt-auto"></span>
                            </span>
                          </span>
                        </span>
                      </label>
                    </div>
                    <h5 class="fs-13 text-center mt-2">Disable</h5>
                  </div>
                </div>
  
              </div>
  
            </div>
          </SimpleBar>
        </div>
        <div class="offcanvas-footer border-top p-3 text-center">
          <div class="row">
            <div class="col-6">
              <button type="button" class="btn btn-light w-100" id="reset-layout">
                Reset
              </button>
            </div>
            <div class="col-6">
              <button type="button" class="btn btn-primary w-100">Preview</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  