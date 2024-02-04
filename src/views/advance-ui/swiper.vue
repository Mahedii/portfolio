<script>
import SwiperCore, { Thumbs, Pagination, Navigation } from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";

SwiperCore.use([Thumbs, Pagination, Navigation]);

import Layout from "../../layouts/main.vue";
import PageHeader from "@/components/page-header";
import appConfig from "../../../app.config";

export default {
  page: {
    title: "Swiper",
    meta: [{ name: "description", content: appConfig.description }],
  },
  data() {
    return {
      title: "Swiper Slider",
      items: [
        {
          text: "Advance UI",
          href: "/",
        },
        {
          text: "Swiper Slider",
          active: true,
        },
      ],
    };
  },
  components: {
    Layout,
    PageHeader,
    Swiper,
    SwiperSlide,
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />

    <div class="row">
      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Default Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>default-swiper</code> class to set a default swiper.
            </p>

            <!-- Swiper -->

            <swiper class="default-swiper rounded">
              <swiper-slide>
                <img src="@/assets/images/small/img-1.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-2.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-3.jpg" alt class="img-fluid" />
              </swiper-slide>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Navigation & Pagination Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>navigation-swiper</code> class to set a swiper with
              navigation and pagination.
            </p>
            <swiper
              class="navigation-swiper rounded"
              :loop="true"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :navigation="{
                nextEl: '.swiper-button-next bg-white shadow',
                prevEl: '.swiper-button-prev bg-white shadow',
              }"
              :pagination="{
                clickable: true,
                el: '.swiper-pagination',
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-4.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-5.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-6.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination"></div>
            </swiper>
            <!-- Swiper -->
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Pagination Dynamic Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>pagination-dynamic-swiper</code> class to set a dynamic
              swiper with pagination.
            </p>

            <!-- Swiper -->

            <swiper
              class="pagination-dynamic-swiper rounded"
              :loop="true"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                clickable: true,
                el: '.swiper-pagination',
                dynamicBullets: true,
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-7.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-8.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-9.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-pagination dynamic-pagination"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Pagination Fraction Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>pagination-fraction-swiper</code> class to set a
              fraction swiper with pagination.
            </p>

            <!-- Swiper -->

            <swiper
              class="pagination-fraction-swiper"
              :loop="true"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                clickable: true,
                el: '.swiper-pagination',
                type: 'fraction',
              }"
              :navigation="{
                nextEl: '.swiper-button-next bg-white shadow',
                prevEl: '.swiper-button-prev bg-white shadow',
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-10.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-11.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-12.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Pagination Custom Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>pagination-custom-swiper</code> class to set a swiper
              with custom pagination.
            </p>

            <!-- Swiper -->
            <swiper
              class="pagination-custom-swiper rounded"
              :loop="true"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                clickable: true,
                el: '.swiper-pagination',
                renderBullet: function (index, className) {
                  return '<span class=' + className + '>' + (index + 1) + '</span>';
                },
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-2.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-3.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-4.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-pagination pagination-custom"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Pagination Progress Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>pagination-progress-swiper</code> class to set a swiper
              with progress pagination.
            </p>

            <!-- Swiper -->
            <swiper
              class="pagination-progress-swiper rounded"
              :loop="true"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                clickable: true,
                el: '.swiper-pagination',
                type: 'fraction',
              }"
              :navigation="{
                nextEl: '.swiper-button-next bg-white shadow',
                prevEl: '.swiper-button-prev bg-white shadow',
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-5.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-6.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-7.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-pagination"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Scrollbar Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>pagination-scrollbar-swiper</code> class to set a swiper
              with scrollbar pagination.
            </p>

            <!-- Swiper -->
            <swiper
              class="pagination-scrollbar-swiper rounded"
              :loop="true"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :scrollbar="{
                el: '.swiper-scrollbar',
                hide: true,
              }"
              :navigation="{
                nextEl: '.swiper-button-next bg-white shadow',
                prevEl: '.swiper-button-prev bg-white shadow',
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-8.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-9.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-10.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-button-next"></div>
              <div class="swiper-button-prev"></div>
              <div class="swiper-scrollbar"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Vertical Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>vertical-swiper</code> class to set a vertical swiper.
            </p>

            <!-- Swiper -->
            <swiper
              class="vertical-swiper rounded"
              :loop="true"
              :direction="'vertical'"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                el: '.swiper-pagination',
                clickable: true,
              }"
              style="height: 324px"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-11.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-12.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-1.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-pagination"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Mousewheel Control Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>mousewheel-control-swiper</code> class to set a swiper
              with mousewheel scroll.
            </p>

            <!-- Swiper -->
            <swiper
              class="mousewheel-control-swiper rounded"
              :loop="true"
              :direction="'vertical'"
              :mousewheel="true"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                el: '.swiper-pagination',
                clickable: true,
              }"
              style="height: 324px"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-3.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-4.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-5.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-pagination"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Effect Fade Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>effect-fade-swiper</code> class to set a swiper with
              fade effect.
            </p>

            <!-- Swiper -->
            <swiper
              class="effect-fade-swiper rounded"
              :loop="true"
              :effect="'fade'"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                el: '.swiper-pagination',
                clickable: true,
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-6.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-7.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-8.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-pagination"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Effect Creative Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>effect-creative-swiper</code> class to set a swiper with
              creative custom effect.
            </p>

            <!-- Swiper -->
            <swiper
              class="effect-creative-swiper rounded"
              :loop="true"
              :effect="'creative'"
              :creativeEffect="{
                prev: {
                  shadow: true,
                  translate: [0, 0, -400],
                },
                next: {
                  translate: ['100%', 0, 0],
                },
              }"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-9.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-10.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-11.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-pagination"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-xl-4 col-lg-6">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Effect Flip Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>effect-flip-swiper</code> class to set a swiper with
              flip effect.
            </p>

            <!-- Swiper -->
            <swiper
              class="effect-flip-swiper rounded"
              :loop="true"
              :effect="'flip'"
              :grabCursor="true"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                el: '.swiper-pagination',
                clickable: true,
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-12.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-1.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-2.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-pagination"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Effect Coverflow Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>effect-coverflow-swiper</code> class to set a swiper
              with coverflow effect.
            </p>

            <!-- Swiper -->
            <swiper
              class="effect-coverflow-swiper rounded pb-5"
              :loop="true"
              :effect="'coverflow'"
              :grabCursor="true"
              :centeredSlides="true"
              :slidesPerView="4"
              :coverflowEffect="{
                rotate: 50,
                stretch: 0,
                depth: 100,
                modifier: 1,
                slideShadows: true,
              }"
              :autoplay="{
                delay: 2500,
                disableOnInteraction: false,
              }"
              :pagination="{
                el: '.swiper-pagination',
                clickable: true,
                dynamicBullets: true,
              }"
            >
              <swiper-slide>
                <img src="@/assets/images/small/img-4.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-5.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-6.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-7.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-8.jpg" alt class="img-fluid" />
              </swiper-slide>
              <swiper-slide>
                <img src="@/assets/images/small/img-9.jpg" alt class="img-fluid" />
              </swiper-slide>
              <div class="swiper-pagination swiper-pagination-dark"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4 class="card-title mb-0">Responsive Breakpoints Swiper</h4>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use
              <code>responsive-swiper</code> class to set a responsive
              swiper.
            </p>

            <!-- Swiper -->
            <swiper
              class="swiper responsive-swiper rounded gallery-light pb-4"
              :loop="true"
              :slidesPerView="1"
              :spaceBetween="10"
              :pagination="{
                el: '.swiper-pagination',
                clickable: true,
              }"
              :breakpoints="{
                640: {
                  slidesPerView: 2,
                  spaceBetween: 20,
                },
                768: {
                  slidesPerView: 3,
                  spaceBetween: 40,
                },
                1200: {
                  slidesPerView: 4,
                  spaceBetween: 50,
                },
              }"
            >
              <swiper-slide>
                <div class="gallery-box card">
                  <div class="gallery-container">
                    <a class="image-popup" href="assets/images/small/img-1.jpg" title>
                      <img
                        class="gallery-img img-fluid mx-auto"
                        src="@/assets/images/small/img-1.jpg"
                        alt
                      />
                      <div class="gallery-overlay">
                        <h5 class="overlay-caption">Glasses and laptop from above</h5>
                      </div>
                    </a>
                  </div>
                  <div class="box-content">
                    <div class="d-flex align-items-center mt-1">
                      <div class="flex-grow-1 text-muted">
                        by
                        <a href class="text-body text-truncate">Ron Mackie</a>
                      </div>
                      <div class="flex-shrink-0">
                        <div class="d-flex gap-3">
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                            2.2K
                          </button>
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                            1.3K
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide>
                <div class="gallery-box card">
                  <div class="gallery-container">
                    <a class="image-popup" href="assets/images/small/img-2.jpg" title>
                      <img
                        class="gallery-img img-fluid mx-auto"
                        src="@/assets/images/small/img-2.jpg"
                        alt
                      />
                      <div class="gallery-overlay">
                        <h5 class="overlay-caption">Working at a coffee shop</h5>
                      </div>
                    </a>
                  </div>
                  <div class="box-content">
                    <div class="d-flex align-items-center mt-1">
                      <div class="flex-grow-1 text-muted">
                        by
                        <a href class="text-body text-truncate">Nancy Martino</a>
                      </div>
                      <div class="flex-shrink-0">
                        <div class="d-flex gap-3">
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                            3.2K
                          </button>
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                            1.1K
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide>
                <div class="gallery-box card mb-0">
                  <div class="gallery-container">
                    <a class="image-popup" href="assets/images/small/img-10.jpg" title>
                      <img
                        class="gallery-img img-fluid mx-auto"
                        src="@/assets/images/small/img-10.jpg"
                        alt
                      />
                      <div class="gallery-overlay">
                        <h5 class="overlay-caption">Fun day at the Hill Station</h5>
                      </div>
                    </a>
                  </div>
                  <div class="box-content">
                    <div class="d-flex align-items-center mt-1">
                      <div class="flex-grow-1 text-muted">
                        by
                        <a href class="text-body text-truncate">Henry Baird</a>
                      </div>
                      <div class="flex-shrink-0">
                        <div class="d-flex gap-3">
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                            632
                          </button>
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                            95
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide>
                <div class="gallery-box card">
                  <div class="gallery-container">
                    <a class="image-popup" href="assets/images/small/img-4.jpg" title>
                      <img
                        class="gallery-img img-fluid mx-auto"
                        src="@/assets/images/small/img-4.jpg"
                        alt
                      />
                      <div class="gallery-overlay">
                        <h5 class="overlay-caption">Drawing a sketch</h5>
                      </div>
                    </a>
                  </div>
                  <div class="box-content">
                    <div class="d-flex align-items-center mt-1">
                      <div class="flex-grow-1 text-muted">
                        by
                        <a href class="text-body text-truncate">Jason McQuaid</a>
                      </div>
                      <div class="flex-shrink-0">
                        <div class="d-flex gap-3">
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                            825
                          </button>
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                            101
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <swiper-slide>
                <div class="gallery-box card">
                  <div class="gallery-container">
                    <a class="image-popup" href="assets/images/small/img-6.jpg" title>
                      <img
                        class="gallery-img img-fluid mx-auto"
                        src="@/assets/images/small/img-6.jpg"
                        alt
                      />
                      <div class="gallery-overlay">
                        <h5 class="overlay-caption">Project discussion with team</h5>
                      </div>
                    </a>
                  </div>
                  <div class="box-content">
                    <div class="d-flex align-items-center mt-1">
                      <div class="flex-grow-1 text-muted">
                        by
                        <a href class="text-body text-truncate">Erica Kernan</a>
                      </div>
                      <div class="flex-shrink-0">
                        <div class="d-flex gap-3">
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-thumb-up-fill text-muted align-bottom me-1"></i>
                            3.4K
                          </button>
                          <button
                            type="button"
                            class="btn btn-sm fs-12 btn-link text-body text-decoration-none shadow-none px-0"
                          >
                            <i class="ri-question-answer-fill text-muted align-bottom me-1"></i>
                            1.3k
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </swiper-slide>
              <div class="swiper-pagination swiper-pagination-dark"></div>
            </swiper>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
    </div>
    <!--end row-->
  </Layout>
</template>
