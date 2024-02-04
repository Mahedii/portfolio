<script>
import Layout from "../../../layouts/main.vue";
import appConfig from "../../../../app.config";
import PageHeader from "@/components/page-header";

import animationData from "@/components/widgets/nkmsrxys.json";
import animationData1 from "@/components/widgets/gsqxdxog.json";

import Lottie from "@/components/widgets/lottie.vue";

export default {
  page: {
    title: "Shopping Cart",
    meta: [
      {
        name: "description",
        content: appConfig.description,
      },
    ],
  },
  components: {
    Layout,
    PageHeader,
    lottie: Lottie,
  },
  data() {
    return {
      title: "Shopping Cart",
      items: [
        {
          text: "Ecommerce",
          href: "/",
        },
        {
          text: "Shopping Cart",
          active: true,
        },
      ],
      taxRate: 0.125,
      shippingRate: 65.0,
      discountRate: 0.15,
      quantity: "",
      currencySign: "$",
      defaultOptions: { animationData: animationData },
      defaultOptions1: { animationData: animationData1 },
      value: 2,
      value1: 1,
      value2: 1,
    };
  },

  mounted() {
    // Remove product from cart
    const removeProduct = document.getElementById("removeItemModal");
    removeProduct.addEventListener("show.bs.modal", (e) => {
      document
        .getElementById("remove-product")
        .addEventListener("click", () => {
          e.relatedTarget.closest(".product").remove();
          document.getElementById("close-modal").click();
          this.recalculateCart();
        });
    });

    setTimeout(() => {
      this.isData();
    }, 100);
  },
  methods: {
    isData() {
      const plus = document.getElementsByClassName("plus");
      const minus = document.getElementsByClassName("minus");
      var product = document.getElementsByClassName("product");

      if (plus) {
        Array.prototype.forEach.call(plus, (e) => {
          e.addEventListener("click", (event) => {

            let par = event.target.closest(".input-step");
          
            par.getElementsByClassName("product-quantity")[0].value++;
            Array.prototype.forEach.call(product, () => {
              this.updateQuantity(event.target);
            });
          });
        });
      }

      if (minus) {
        Array.prototype.forEach.call(minus, (e) => {
          e.addEventListener("click", (event) => {
            let par = event.target.closest(".input-step");
              if(par.getElementsByClassName("product-quantity")[0].value > 0)
                par.getElementsByClassName("product-quantity")[0].value--;
              Array.prototype.forEach.call(product, () => {
              this.updateQuantity(event.target);
            });
          });
        });
      }
    },

    updateQuantity(quantityInput) {
      var productRow = quantityInput.closest(".product");
      var price;

      Array.prototype.forEach.call(
        productRow.getElementsByClassName("product-price"),
        (e) => {
          price = parseFloat(e.innerHTML);
        }
      );

      if (
        quantityInput.previousElementSibling &&
        quantityInput.previousElementSibling.classList.contains(
          "product-quantity"
        )
      ) {
        this.quantity = quantityInput.previousElementSibling.value;
      } else if (
        quantityInput.nextElementSibling &&
        quantityInput.nextElementSibling.classList.contains("product-quantity")
      ) {
        this.quantity = quantityInput.nextElementSibling.value;
      }
      var linePrice = price * this.quantity;
      /* Update line price display and recalc cart totals */
      Array.prototype.forEach.call(
        productRow.getElementsByClassName("product-line-price"),
        (e) => {
          e.innerHTML = linePrice.toFixed(2);
          this.recalculateCart();
        }
      );
    },
    recalculateCart() {
      var subtotal = 0;

      Array.prototype.forEach.call(
        document.getElementsByClassName("product"),
        (item) => {
          Array.prototype.forEach.call(
            item.getElementsByClassName("product-line-price"),
            (e) => {
              subtotal += parseFloat(e.innerHTML);
            }
          );
        }
      );

      /* Calculate totals */
      var tax = subtotal * this.taxRate;
      var discount = subtotal * this.discountRate;

      var shipping = subtotal > 0 ? this.shippingRate : 0;
      var total = subtotal + tax + shipping - discount;

      document.getElementById("cart-subtotal").innerHTML =
        this.currencySign + subtotal.toFixed(2);
      document.getElementById("cart-tax").innerHTML =
        this.currencySign + tax.toFixed(2);
      document.getElementById("cart-shipping").innerHTML =
        this.currencySign + shipping.toFixed(2);
      document.getElementById("cart-total").innerHTML =
        this.currencySign + total.toFixed(2);
      document.getElementById("cart-discount").innerHTML =
        "-" + this.currencySign + discount.toFixed(2);
    },
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row mb-3">
      <div class="col-xl-8">
        <div class="row align-items-center gy-3 mb-3">
          <div class="col-sm">
            <div>
              <h5 class="fs-14 mb-0">Your Cart (03 items)</h5>
            </div>
          </div>
          <div class="col-sm-auto">
            <router-link
              to="/ecommerce/products"
              class="link-primary text-decoration-underline"
              >Continue Shopping</router-link
            >
          </div>
        </div>

        <div class="card product">
          <div class="card-body">
            <div class="row gy-3">
              <div class="col-sm-auto">
                <div class="avatar-lg bg-light rounded p-1">
                  <img
                    src="@/assets/images/products/img-8.png"
                    alt=""
                    class="img-fluid d-block"
                  />
                </div>
              </div>
              <div class="col-sm">
                <h5 class="fs-14 text-truncate">
                  <router-link to="/ecommerce/product-details" class="text-dark"
                    >Sweatshirt for Men (Pink)</router-link
                  >
                </h5>
                <ul class="list-inline text-muted">
                  <li class="list-inline-item">
                    Color : <span class="fw-medium">Pink</span>
                  </li>
                  <li class="list-inline-item">
                    Size : <span class="fw-medium">M</span>
                  </li>
                </ul>

                <div class="input-step light">
                  <button type="button" class="minus shadow">–</button>
                  <input
                    type="number"
                    class="product-quantity"
                    v-model="value"
                    min="0"
                    max="100"
                  />
                  <button type="button" class="plus shadow">+</button>
                </div>
              </div>
              <div class="col-sm-auto">
                <div class="text-lg-end">
                  <p class="text-muted mb-1">Item Price:</p>
                  <h5 class="fs-14">
                    $<span id="ticket_price" class="product-price">119.99</span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <!-- card body -->
          <div class="card-footer">
            <div class="row align-items-center gy-3">
              <div class="col-sm">
                <div class="d-flex flex-wrap my-n1">
                  <div>
                    <a
                      href="#"
                      class="d-block text-body p-1 px-2"
                      data-bs-toggle="modal"
                      data-bs-target="#removeItemModal"
                      ><i
                        class="ri-delete-bin-fill text-muted align-bottom me-1"
                      ></i>
                      Remove</a
                    >
                  </div>
                  <div>
                    <a href="#" class="d-block text-body p-1 px-2"
                      ><i class="ri-star-fill text-muted align-bottom me-1"></i>
                      Add Wishlist</a
                    >
                  </div>
                </div>
              </div>
              <div class="col-sm-auto">
                <div class="d-flex align-items-center gap-2 text-muted">
                  <div>Total :</div>
                  <h5 class="fs-14 mb-0">
                    $<span class="product-line-price">239.98</span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <!-- end card footer -->
        </div>
        <!-- end card -->

        <div class="card product">
          <div class="card-body">
            <div class="row gy-3">
              <div class="col-sm-auto">
                <div class="avatar-lg bg-light rounded p-1">
                  <img
                    src="@/assets/images/products/img-7.png"
                    alt=""
                    class="img-fluid d-block"
                  />
                </div>
              </div>
              <div class="col-sm">
                <h5 class="fs-14 text-truncate">
                  <router-link to="/ecommerce/product-detail" class="text-dark"
                    >Noise NoiseFit Endure Smart Watch</router-link
                  >
                </h5>

                <ul class="list-inline text-muted">
                  <li class="list-inline-item">
                    Color : <span class="fw-medium">Black</span>
                  </li>
                  <li class="list-inline-item">
                    Size : <span class="fw-medium">32.5mm</span>
                  </li>
                </ul>

                <div class="input-step light">
                  <button type="button" class="minus shadow">–</button>
                  <input
                    type="number"
                    class="product-quantity"
                    v-model="value1"
                    min="0"
                    max="100"
                  />
                  <button type="button" class="plus shadow">+</button>
                </div>
              </div>
              <div class="col-sm-auto">
                <div class="text-lg-end">
                  <p class="text-muted mb-1">Item Price:</p>
                  <h5 class="fs-14">
                    $<span class="product-price">94.99</span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <!-- card body -->
          <div class="card-footer">
            <div class="row align-items-center gy-3">
              <div class="col-sm">
                <div class="d-flex flex-wrap my-n1">
                  <div>
                    <a
                      href="#"
                      class="d-block text-body p-1 px-2"
                      data-bs-toggle="modal"
                      data-bs-target="#removeItemModal"
                      ><i
                        class="ri-delete-bin-fill text-muted align-bottom me-1"
                      ></i>
                      Remove</a
                    >
                  </div>
                  <div>
                    <a href="#" class="d-block text-body p-1 px-2"
                      ><i class="ri-star-fill text-muted align-bottom me-1"></i>
                      Add Wishlist</a
                    >
                  </div>
                </div>
              </div>
              <div class="col-sm-auto">
                <div class="d-flex align-items-center gap-2 text-muted">
                  <div>Total :</div>
                  <h5 class="fs-14 mb-0">
                    $<span class="product-line-price">94.99</span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <!-- end card footer -->
        </div>
        <!-- end card -->

        <div class="card product">
          <div class="card-body">
            <div class="row gy-3">
              <div class="col-sm-auto">
                <div class="avatar-lg bg-light rounded p-1">
                  <img
                    src="@/assets/images/products/img-3.png"
                    alt=""
                    class="img-fluid d-block"
                  />
                </div>
              </div>
              <div class="col-sm">
                <h5 class="fs-14 text-truncate">
                  <router-link to="/ecommerce/product-detail" class="text-dark"
                    >350 ml Glass Grocery Container</router-link
                  >
                </h5>

                <ul class="list-inline text-muted">
                  <li class="list-inline-item">
                    Color : <span class="fw-medium">White</span>
                  </li>
                  <li class="list-inline-item">
                    Size : <span class="fw-medium">350 ml</span>
                  </li>
                </ul>

                <div class="input-step light">
                  <button type="button" class="minus shadow">–</button>
                  <input
                    type="number"
                    class="product-quantity"
                    v-model="value2"
                    min="0"
                    max="100"
                  />
                  <button type="button" class="plus shadow">+</button>
                </div>
              </div>
              <div class="col-sm-auto">
                <div class="text-lg-end">
                  <p class="text-muted mb-1">Item Price:</p>
                  <h5 class="fs-14">
                    $<span class="product-price">24.99</span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <!-- card body -->
          <div class="card-footer">
            <div class="row align-items-center gy-3">
              <div class="col-sm">
                <div class="d-flex flex-wrap my-n1">
                  <div>
                    <a
                      href="#"
                      class="d-block text-body p-1 px-2"
                      data-bs-toggle="modal"
                      data-bs-target="#removeItemModal"
                      ><i
                        class="ri-delete-bin-fill text-muted align-bottom me-1"
                      ></i>
                      Remove</a
                    >
                  </div>
                  <div>
                    <a href="#" class="d-block text-body p-1 px-2"
                      ><i class="ri-star-fill text-muted align-bottom me-1"></i>
                      Add Wishlist</a
                    >
                  </div>
                </div>
              </div>
              <div class="col-sm-auto">
                <div class="d-flex align-items-center gap-2 text-muted">
                  <div>Total :</div>
                  <h5 class="fs-14 mb-0">
                    $<span class="product-line-price">24.99</span>
                  </h5>
                </div>
              </div>
            </div>
          </div>
          <!-- end card footer -->
        </div>
        <!-- end card -->

        <div class="text-end mb-4">
          <router-link
            to="/ecommerce/checkout"
            class="btn btn-success btn-label right ms-auto"
            ><i
              class="ri-arrow-right-line label-icon align-bottom fs-16 ms-2"
            ></i>
            Checkout</router-link
          >
        </div>
      </div>
      <!-- end col -->

      <div class="col-xl-4">
        <div class="sticky-side-div">
          <div class="card">
            <div class="card-header border-bottom-dashed">
              <h5 class="card-title mb-0">Order Summary</h5>
            </div>
            <div class="card-header bg-soft-light border-bottom-dashed">
              <div class="text-center">
                <h6 class="mb-2">
                  Have a <span class="fw-semibold">promo</span> code ?
                </h6>
              </div>
              <div class="hstack gap-3 px-3 mx-n3">
                <input
                  class="form-control me-auto"
                  type="text"
                  placeholder="Enter coupon code"
                  aria-label="Add Promo Code here..."
                />
                <button type="button" class="btn btn-success w-xs">
                  Apply
                </button>
              </div>
            </div>
            <div class="card-body pt-2">
              <div class="table-responsive">
                <table class="table table-borderless mb-0">
                  <tbody>
                    <tr>
                      <td>Sub Total :</td>
                      <td class="text-end" id="cart-subtotal">$ 359.96</td>
                    </tr>
                    <tr>
                      <td>
                        Discount <span class="text-muted">(VELZON15)</span> :
                      </td>
                      <td class="text-end" id="cart-discount">- $ 53.99</td>
                    </tr>
                    <tr>
                      <td>Shipping Charge :</td>
                      <td class="text-end" id="cart-shipping">$ 65.00</td>
                    </tr>
                    <tr>
                      <td>Estimated Tax (12.5%) :</td>
                      <td class="text-end" id="cart-tax">$ 44.99</td>
                    </tr>
                    <tr class="table-active">
                      <th>Total (USD) :</th>
                      <td class="text-end">
                        <span class="fw-semibold" id="cart-total">
                          $415.96
                        </span>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- end table-responsive -->
            </div>
          </div>

          <div class="alert border-dashed alert-danger" role="alert">
            <div class="d-flex align-items-center">
              <lottie
                colors="primary:#121331,secondary:#f06548"
                :options="defaultOptions"
                :height="80"
                :width="80"
                style="margin:0px;"
              />
              <div class="ms-2">
                <h5 class="fs-14 text-danger fw-semibold">
                  Buying for a loved one?
                </h5>
                <p class="text-black mb-1">
                  Gift wrap and personalised message on card, <br />Only for
                  <span class="fw-semibold">$9.99</span> USD
                </p>
                <button
                  type="button"
                  class="btn ps-0 btn-sm btn-link text-danger text-uppercase shadow-none"
                >
                  Add Gift Wrap
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- end stickey -->
      </div>
    </div>
    <!-- end row -->
    <!-- removeItemModal -->
    <div
      id="removeItemModal"
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
              id="close-modal"
            ></button>
          </div>
          <div class="modal-body">
            <div class="mt-2 text-center">
              <lottie
                colors="primary:#ffbe0b,secondary:#f06548"
                :options="defaultOptions"
                :height="100"
                :width="100"
              />
              <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                <h4>Are you Sure ?</h4>
                <p class="text-muted mx-4 mb-0">
                  Are you Sure You want to Remove this Product ?
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
                id="remove-product"
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
