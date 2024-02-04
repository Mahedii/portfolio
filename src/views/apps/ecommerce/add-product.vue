<script>
  import {
    ref,
    watch
  } from "vue";
  import Multiselect from "@vueform/multiselect";
  import "@vueform/multiselect/themes/default.css";
  import flatPickr from "vue-flatpickr-component";
  import "flatpickr/dist/flatpickr.css";

  import CKEditor from "@ckeditor/ckeditor5-vue";
  import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
  import DropZone from "@/components/widgets/dropZone";
  import useVuelidate from "@vuelidate/core";

  import Layout from "../../../layouts/main.vue";
  import appConfig from "../../../../app.config";
  import PageHeader from "@/components/page-header";

  export default {
    page: {
      title: "Create Product",
      meta: [{
        name: "description",
        content: appConfig.description,
      }, ],
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
      return {
        dropzoneFile,
        drop,
        selectedFile,
        v$: useVuelidate(),
        files
      };
    },
    data() {
      return {
        title: "Create Product",
        items: [{
            text: "Ecommerce",
            href: "/",
          },
          {
            text: "Create Product",
            active: true,
          },
        ],
        date1: null,
        datetimeConfig: {
          enableTime: true,
          dateFormat: "d.m.y",
          time_24hr: true,
        },
        value1: ["Scheduled"],
        value2: ["Hidden"],
        value3: ["Fashion"],
        editor: ClassicEditor,
        editorData: "<p>Tommy Hilfiger men striped pink sweatshirt. Crafted with cotton. Material composition is 100% organic cotton. This is one of the world’s leading designer lifestyle brands and is internationally recognized for celebrating the essence of classic American cool style, featuring preppy with a twist designs.</p><ul><li>Full Sleeve</li><li>Cotton</li><li>All Sizes available</li><li>4 Different Color</li></ul>",
        content: "<h1>Some initial content</h1>",
      };
    },
    components: {
      DropZone,
      Layout,
      PageHeader,
      ckeditor: CKEditor.component,
      Multiselect,
      flatPickr
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

    <div class="row">
      <div class="col-lg-8">
        <form>
          <div class="card">
            <div class="card-body">
              <div class="mb-3">
                <label class="form-label" for="product-title-input">Product Title</label>
                <input type="text" class="form-control" id="product-title-input" placeholder="Enter product title" />
              </div>
              <div>
                <label>Product Description</label>
                <ckeditor v-model="editorData" :editor="editor"></ckeditor>
              </div>
            </div>
          </div>
          <!-- end card -->

          <div class="card">
            <div class="card-header">
              <h5 class="card-title mb-0">Product Gallery</h5>
            </div>
            <div class="card-body">
              <div class="mb-4">
                <h5 class="fs-14 mb-1">Product Image</h5>
                <p class="text-muted">Add Product main Image.</p>
                <input class="form-control" id="product-image-input" type="file"
                  accept="image/png, image/gif, image/jpeg" />
              </div>
              <div class="vstack gap-2">
                <h5 class="fs-14 mb-1">Product Gallery</h5>
                <p class="text-muted">Add Product Gallery Images.</p>
                <DropZone @drop.prevent="drop" @change="selectedFile" />

                <div class="border rounded" v-for="(file, index) of files" :key="index">
                  <div class="d-flex align-items-center p-2">
                    <div class="flex-grow-1">
                      <div class="pt-1">
                        <h5 class="fs-14 mb-1" data-dz-name="">
                          {{ file.name }}
                        </h5>
                        <p class="fs-13 text-muted mb-0" data-dz-size="">
                          <strong>{{ file.size / 1024 }}</strong> KB
                        </p>
                        <strong class="error text-danger" data-dz-errormessage=""></strong>
                      </div>
                    </div>
                    <div class="flex-shrink-0 ms-3">
                      <button data-dz-remove="" class="btn btn-sm btn-danger" @click="deleteRecord">
                        Delete
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end card -->

          <div class="card">
            <div class="card-header">
              <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#addproduct-general-info" role="tab">
                    General Info
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#addproduct-metadata" role="tab">
                    Meta Data
                  </a>
                </li>
              </ul>
            </div>
            <!-- end card header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active" id="addproduct-general-info" role="tabpanel">
                  <div class="mb-3">
                    <label class="form-label" for="manufacturer-name-input">Manufacturer Name</label>
                    <input type="text" class="form-control" id="manufacturer-name-input"
                      placeholder="Enter manufacturer name" />
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label" for="manufacturer-brand-input">Manufacturer Brand</label>
                        <input type="text" class="form-control" id="manufacturer-brand-input"
                          placeholder="Enter manufacturer brand" />
                      </div>
                    </div>
                    <!-- end col -->
                    <div class="col-lg-6">
                      <div class="row">
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label" for="product-price-input">Price</label>
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="product-price-addon">$</span>
                              <input type="text" class="form-control" id="product-price-input" placeholder="Enter price"
                                aria-label="Price" aria-describedby="product-price-addon" />
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="mb-3">
                            <label class="form-label" for="product-discount-input">Discount</label>
                            <div class="input-group mb-3">
                              <span class="input-group-text" id="product-discount-addon">%</span>
                              <input type="text" class="form-control" id="product-discount-input"
                                placeholder="Enter discount" aria-label="discount"
                                aria-describedby="product-discount-addon" />
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row -->
                </div>
                <!-- end tab-pane -->

                <div class="tab-pane" id="addproduct-metadata" role="tabpanel">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label" for="meta-title-input">Meta title</label>
                        <input type="text" class="form-control" placeholder="Enter meta title" id="meta-title-input" />
                      </div>
                    </div>
                    <!-- end col -->

                    <div class="col-lg-6">
                      <div class="mb-3">
                        <label class="form-label" for="meta-keywords-input">Meta Keywords</label>
                        <input type="text" class="form-control" placeholder="Enter meta keywords"
                          id="meta-keywords-input" />
                      </div>
                    </div>
                    <!-- end col -->
                  </div>
                  <!-- end row -->

                  <div>
                    <label class="form-label" for="meta-description-input">Meta Description</label>
                    <textarea class="form-control" id="meta-description-input" placeholder="Enter meta description"
                      rows="3"></textarea>
                  </div>
                </div>
                <!-- end tab pane -->
              </div>
              <!-- end tab content -->
            </div>
            <!-- end card body -->
          </div>
          <!-- end card -->
          <div class="text-end mb-3">
            <button type="button" class="btn btn-success w-sm">Submit</button>
          </div>
        </form>
      </div>
      <!-- end col -->

      <div class="col-lg-4">
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Publish</h5>
          </div>
          <div class="card-body">
            <div class="mb-3">
              <label for="choices-publish-status-input" class="form-label">Status</label>
              <Multiselect class="form-control" v-model="value1" :close-on-select="true" :searchable="true"
                :create-option="true" :options="[
                  { value: 'Published', label: 'Published' },
                  { value: 'Scheduled', label: 'Scheduled' },
                  { value: 'Draft', label: 'Draft' },
                ]" />
            </div>

            <div>
              <label for="choices-publish-visibility-input" class="form-label">Visibility</label>
              <Multiselect class="form-control" v-model="value2" :close-on-select="true" :searchable="true"
                :create-option="true" :options="[
                  { value: 'Public', label: 'Public' },
                  { value: 'Hidden', label: 'Hidden' },
                ]" />
            </div>
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Publish Schedule</h5>
          </div>
          <!-- end card body -->
          <div class="card-body">
            <div>
              <label for="datepicker-publish-input" class="form-label">Publish Date & Time</label>

              <flat-pickr v-model="date1" :config="datetimeConfig" placeholder="Enter publish date"
                class="form-control"></flat-pickr>
            </div>
          </div>
        </div>
        <!-- end card -->

        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Product Categories</h5>
          </div>
          <div class="card-body">
            <p class="text-muted mb-2">
              <a href="#" class="float-end text-decoration-underline">Add New</a>Select product category
            </p>

            <Multiselect class="form-control" v-model="value3" :close-on-select="true" :searchable="true"
              :create-option="true" :options="[
                { value: 'All', label: 'All' },
                { value: 'Appliances', label: 'Appliances' },
                { value: 'Fashion', label: 'Fashion' },
                { value: 'Electronics', label: 'Electronics' },
                { value: 'Grocery', label: 'Grocery' },
                { value: 'Home & Furniture', label: 'Home & Furniture' },
                { value: 'Kids', label: 'Kids' },
                { value: 'Mobiles', label: 'Mobiles' },
              ]" />
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Product Tags</h5>
          </div>
          <div class="card-body">
            <div class="hstack gap-3 align-items-start">
              <div class="flex-grow-1">
                <input class="form-control" data-choices data-choices-multiple-remove="true" placeholder="Enter tags"
                  type="text" value="Cotton" />
              </div>
            </div>
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->

        <div class="card">
          <div class="card-header">
            <h5 class="card-title mb-0">Product Short Description</h5>
          </div>
          <div class="card-body">
            <p class="text-muted mb-2">Add short description for product</p>
            <textarea class="form-control" placeholder="Must enter minimum of a 100 characters" rows="3"></textarea>
          </div>
          <!-- end card body -->
        </div>
        <!-- end card -->
      </div>
    </div>
    <!-- end row -->
  </Layout>
</template>