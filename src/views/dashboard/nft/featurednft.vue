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
};
</script>
<template>
    <div class="col-xxl-8">
        <div class="swiper marketplace-swiper rounded gallery-light">
            <div class="d-flex pt-2 pb-4">
                <h5 class="card-title fs-18 mb-1">Featured NFTs Artworks</h5>
            </div>
            <div class="swiper-wrapper">
                <swiper class="swiper responsive-swiper rounded gallery-light pb-4" :loop="true" :slidesPerView="2"
                    :spaceBetween="10" :navigation="{
                      nextEl: '.swiper-button-next',
                      prevEl: '.swiper-button-prev',
                    }">
                    <swiper-slide>
                        <div class="card explore-box card-animate rounded">
                            <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                                <button type="button" class="btn btn-icon active" data-bs-toggle="button"
                                    aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                            </div>
                            <div class="explore-place-bid-img">
                                <img src="@/assets/images/nft/gif/img-3.gif" alt=""
                                    class="img-fluid card-img-top explore-img" />
                                <div class="bg-overlay"></div>
                                <div class="place-bid-btn">
                                    <a href="#!" class="btn btn-success"><i
                                            class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 37.41k </p>
                                <h5 class="mb-1">
                                    <b-link href="/apps/nft-item-detail" class="link-dark">Walking On Air</b-link>
                                </h5>
                                <p class="text-muted mb-0">Artwork</p>
                            </div>
                            <div class="card-footer border-top border-top-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 fs-14">
                                        <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i> Highest:
                                        <span class="fw-medium">10.35ETH</span>
                                    </div>
                                    <h5 class="flex-shrink-0 fs-14 text-primary mb-0">14.167 ETH</h5>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="card explore-box card-animate rounded">
                            <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                                <button type="button" class="btn btn-icon" data-bs-toggle="button"
                                    aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                            </div>
                            <div class="explore-place-bid-img">
                                <img src="@/assets/images/nft/img-03.jpg" alt=""
                                    class="img-fluid card-img-top explore-img" />
                                <div class="bg-overlay"></div>
                                <div class="place-bid-btn">
                                    <a href="#!" class="btn btn-success"><i
                                            class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 19.29k </p>
                                <h5 class="mb-1">
                                    <b-link href="/apps/nft-item-detail" class="link-dark">Filtered Portrait
                                    </b-link>
                                </h5>
                                <p class="text-muted mb-0">Photography</p>
                            </div>
                            <div class="card-footer border-top border-top-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 fs-14">
                                        <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i> Highest:
                                        <span class="fw-medium">75.3ETH</span>
                                    </div>
                                    <h5 class="flex-shrink-0 fs-14 text-primary mb-0">67.36 ETH</h5>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="card explore-box card-animate rounded">
                            <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                                <button type="button" class="btn btn-icon active" data-bs-toggle="button"
                                    aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                            </div>
                            <div class="explore-place-bid-img">
                                <img src="@/assets/images/nft/gif/img-1.gif" alt=""
                                    class="img-fluid card-img-top explore-img" />
                                <div class="bg-overlay"></div>
                                <div class="place-bid-btn">
                                    <a href="#!" class="btn btn-success"><i
                                            class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 8.42k </p>
                                <h5 class="mb-1">
                                    <b-link href="/apps/nft-item-detail" class="link-dark">Patterns Arts & Culture
                                    </b-link>
                                </h5>
                                <p class="text-muted mb-0">Artwork</p>
                            </div>
                            <div class="card-footer border-top border-top-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 fs-14">
                                        <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i> Highest:
                                        <span class="fw-medium">9.64ETH</span>
                                    </div>
                                    <h5 class="flex-shrink-0 fs-14 text-primary mb-0">14.167 ETH</h5>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                    <swiper-slide>
                        <div class="card explore-box card-animate rounded">
                            <div class="bookmark-icon position-absolute top-0 end-0 p-2">
                                <button type="button" class="btn btn-icon" data-bs-toggle="button"
                                    aria-pressed="true"><i class="mdi mdi-cards-heart fs-16"></i></button>
                            </div>
                            <div class="explore-place-bid-img">
                                <img src="@/assets/images/nft/gif/img-4.gif" alt=""
                                    class="img-fluid card-img-top explore-img" />
                                <div class="bg-overlay"></div>
                                <div class="place-bid-btn">
                                    <a href="#!" class="btn btn-success"><i
                                            class="ri-auction-fill align-bottom me-1"></i> Place Bid</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p class="fw-medium mb-0 float-end"><i
                                        class="mdi mdi-heart text-danger align-middle"></i> 15.93k </p>
                                <h5 class="mb-1">
                                    <b-link href="/apps/nft-item-detail" class="link-dark">Evolved Reality</b-link>
                                </h5>
                                <p class="text-muted mb-0">Video</p>
                            </div>
                            <div class="card-footer border-top border-top-dashed">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 fs-14">
                                        <i class="ri-price-tag-3-fill text-warning align-bottom me-1"></i> Highest:
                                        <span class="fw-medium">2.75ETH</span>
                                    </div>
                                    <h5 class="flex-shrink-0 fs-14 text-primary mb-0">3.167 ETH</h5>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
</template>