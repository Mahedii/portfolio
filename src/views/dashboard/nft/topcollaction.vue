<script>
import SwiperCore, { Thumbs, Pagination, Navigation } from "swiper";
import { Swiper, SwiperSlide } from "swiper/vue";
import "swiper/swiper-bundle.css";
SwiperCore.use([Thumbs, Pagination, Navigation]);
export default {
    components: {
        Swiper,
        SwiperSlide,
    }
}
</script>
<template>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h6 class="card-title flex-grow-1 mb-0">Top Collections</h6>
            <b-link href="/apps/nft-collection" type="button" class="btn btn-soft-primary btn-sm flex-shrink-0">
                See All <i class="ri-arrow-right-line align-bottom"></i>
            </b-link>
        </div>
        <div class="card-body">
            <div class="swiper collection-slider">
                <div class="swiper-wrapper">
                    <swiper class="swiper responsive-swiper rounded gallery-light pb-4" :loop="true" :slidesPerView="1"
                        :spaceBetween="10">
                        <swiper-slide>
                            <div class="dash-collection overflow-hidden rounded-top position-relative">
                                <img src="@/assets/images/nft/img-03.jpg" alt="" height="220"
                                    class="object-cover w-100" />
                                <div
                                    class="content position-absolute bottom-0 m-2 p-2 start-0 end-0 rounded d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <a href="#!">
                                            <h5 class="text-white fs-16 mb-1">Artworks</h5>
                                        </a>
                                        <p class="text-white-75 mb-0">4700+ Items</p>
                                    </div>
                                    <div class="avatar-xxs">
                                        <div class="avatar-title bg-white rounded-circle">
                                            <a href="#!" class="link-success"><i class="ri-arrow-right-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="dash-collection overflow-hidden rounded-top position-relative">
                                <img src="@/assets/images/nft/img-04.jpg" alt="" height="220"
                                    class="object-cover w-100" />
                                <div
                                    class="content position-absolute bottom-0 m-2 p-2 start-0 end-0 rounded d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <a href="#!">
                                            <h5 class="text-white fs-16 mb-1">Crypto Card</h5>
                                        </a>
                                        <p class="text-white-75 mb-0">743+ Items</p>
                                    </div>
                                    <div class="avatar-xxs">
                                        <div class="avatar-title bg-white rounded-circle">
                                            <a href="#!" class="link-success"><i class="ri-arrow-right-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="dash-collection overflow-hidden rounded-top position-relative">
                                <img src="@/assets/images/nft/gif/img-5.gif" alt="" height="220"
                                    class="object-cover w-100" />
                                <div
                                    class="content position-absolute bottom-0 m-2 p-2 start-0 end-0 rounded d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <a href="#!">
                                            <h5 class="text-white fs-16 mb-1">3d Style</h5>
                                        </a>
                                        <p class="text-white-75 mb-0">4781+ Items</p>
                                    </div>
                                    <div class="avatar-xxs">
                                        <div class="avatar-title bg-white rounded-circle">
                                            <a href="#!" class="link-success"><i class="ri-arrow-right-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="dash-collection overflow-hidden rounded-top position-relative">
                                <img src="@/assets/images/nft/img-06.jpg" alt="" height="220"
                                    class="object-cover w-100" />
                                <div
                                    class="content position-absolute bottom-0 m-2 p-2 start-0 end-0 rounded d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <a href="#!">
                                            <h5 class="text-white fs-16 mb-1">Collectibles</h5>
                                        </a>
                                        <p class="text-white-75 mb-0">3468+ Items</p>
                                    </div>
                                    <div class="avatar-xxs">
                                        <div class="avatar-title bg-white rounded-circle">
                                            <a href="#!" class="link-success"><i class="ri-arrow-right-line"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
            <!--end swiper-->
        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h5 class="card-title flex-grow-1 mb-0">Popular Creators</h5>
            <b-link href="/apps/nft-creators" type="button" class="btn btn-soft-primary btn-sm flex-shrink-0">
                See All <i class="ri-arrow-right-line align-bottom"></i>
            </b-link>
        </div>
        <div class="card-body">
            <div class="swiper collection-slider">
                <div class="swiper-wrapper">
                    <swiper class="swiper responsive-swiper rounded gallery-light pb-4" :loop="true" :slidesPerView="1">
                        <swiper-slide>
                            <div class="d-flex">
                                <div class="flex-shink-0">
                                    <img src="@/assets/images/nft/img-02.jpg" alt=""
                                        class="avatar-sm object-cover rounded">
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <b-link href="/pages/profile">
                                        <h5 class="mb-1">Alexis Clarke</h5>
                                    </b-link>
                                    <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i>
                                        81,369 ETH</p>
                                </div>
                                <div>
                                    <div class="dropdown float-end">
                                        <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle fs-16"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0);">View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Share</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#!">Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex">
                                <div class="flex-shink-0">
                                    <img src="@/assets/images/nft/img-01.jpg" alt=""
                                        class="avatar-sm object-cover rounded">
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <b-link href="/pages/profile">
                                        <h5 class="mb-1">Timothy Smith</h5>
                                    </b-link>
                                    <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i> 4,754
                                        ETH</p>
                                </div>
                                <div>
                                    <div class="dropdown float-end">
                                        <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle fs-16"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0);">View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Share</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#!">Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex">
                                <div class="flex-shink-0">
                                    <img src="@/assets/images/nft/img-04.jpg" alt=""
                                        class="avatar-sm object-cover rounded">
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <b-link href="/pages/profile">
                                        <h5 class="mb-1">Herbert Stokes</h5>
                                    </b-link>
                                    <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i>
                                        68,945 ETH</p>
                                </div>
                                <div>
                                    <div class="dropdown float-end">
                                        <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle fs-16"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0);">View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Share</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#!">Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                        <swiper-slide>
                            <div class="d-flex">
                                <div class="flex-shink-0">
                                    <img src="@/assets/images/users/avatar-1.jpg" alt=""
                                        class="avatar-sm object-cover rounded">
                                </div>
                                <div class="ms-3 flex-grow-1">
                                    <b-link href="/pages/profile">
                                        <h5 class="mb-1">Glen Matney</h5>
                                    </b-link>
                                    <p class="text-muted mb-0"><i class="mdi mdi-ethereum text-primary fs-14"></i>
                                        49,031 ETH</p>
                                </div>
                                <div>
                                    <div class="dropdown float-end">
                                        <button class="btn btn-ghost-primary btn-icon dropdown" type="button"
                                            data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle fs-16"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="javascript:void(0);">View</a>
                                            </li>
                                            <li><a class="dropdown-item" href="javascript:void(0);">Share</a>
                                            </li>
                                            <li><a class="dropdown-item" href="#!">Report</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </swiper-slide>
                    </swiper>
                </div>
            </div>
            <!--end swiper-->
        </div>
    </div>
</template>