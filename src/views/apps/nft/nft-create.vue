<script>
    import {
        ref,
        watch
    } from "vue";
    import useVuelidate from "@vuelidate/core";
    import Layout from "../../../layouts/main.vue";
    import PageHeader from "@/components/page-header";
    import DropZone from "@/components/widgets/nftdropZone";
    export default {
        data() {
            return {
                title: "Create NFT",
                items: [{
                        text: "NFT Marketplace",
                        href: "/",
                    },
                    {
                        text: "Create NFT",
                        active: true,
                    },
                ],
            };
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
                files,
                drop,
                selectedFile,
                v$: useVuelidate()
            };
        },
        components: {
            Layout,
            PageHeader,
            DropZone,
        },
        methods: {
            deleteRecord(ele) {
                ele.target.parentElement.parentElement.remove();
            },
        },
        mounted() {

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
                        <h5 class="card-title mb-0">Create New File</h5>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row g-3">
                                <div class="col-lg-12">
                                    <h5 class="fw-semibold mb-3">Image, Video, Audio, or 3D Model</h5>
                                    <DropZone @drop.prevent="drop" @change="selectedFile" />
                                    <ul class="list-unstyled mb-0" id="dropzone-preview">
                                        <div class="border rounded" v-for="(file, index) of files" :key="index">
                                            <div class="d-flex p-2">
                                                <div class="flex-grow-1">
                                                    <div class="pt-1">
                                                        <h5 class="fs-14 mb-1" data-dz-name="">
                                                            {{ file.name }}
                                                        </h5>
                                                        <p class="fs-13 text-muted mb-0" data-dz-size="">
                                                            <strong>{{ file.size / 1024 }}</strong> KB
                                                        </p>
                                                        <strong class="error text-danger"
                                                            data-dz-errormessage=""></strong>
                                                    </div>
                                                </div>
                                                <div class="flex-shrink-0 ms-3">
                                                    <button data-dz-remove="" class="btn btn-sm btn-danger"
                                                        @click="deleteRecord">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </ul>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="productName"
                                        placeholder="Enter product name">
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <label for="discription" class="form-label">Discription</label>
                                    <textarea class="form-control" id="discription" rows="3"
                                        placeholder="Enter discription"></textarea>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <label for="externalLink" class="form-label">External link</label>
                                    <input type="text" class="form-control" id="externalLink"
                                        placeholder="Enter external link">
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <label for="itemPrice" class="form-label">Item Price</label>
                                    <input type="text" class="form-control" id="itemPrice" placeholder="Price">
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <label for="size" class="form-label">Size</label>
                                    <input type="text" class="form-control" id="size" placeholder="Size">
                                </div>
                                <!--end col-->
                                <div class="col-lg-4">
                                    <label for="properties" class="form-label">Properties</label>
                                    <input type="text" class="form-control" id="properties" placeholder="Properties">
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                                value="option1">
                                            <label class="form-check-label" for="inlineCheckbox1">Put on sale</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                                value="option2">
                                            <label class="form-check-label" for="inlineCheckbox2">Instant sale
                                                price</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                                value="option3">
                                            <label class="form-check-label" for="inlineCheckbox3">Unlock one
                                                purchased</label>
                                        </div>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button class="btn btn-primary">Create Item</button>
                                    </div>
                                </div>
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </Layout>
</template>