<script>
import Layout from "../../layouts/main.vue";
import PageHeader from "@/components/page-header";

import "prismjs";
import "prismjs/themes/prism.css";

export default {
  data() {
    return {
      title: "General",
      items: [
        {
          text: "Base UI",
          href: "/",
        },
        {
          text: "General",
          active: true,
        },
      ],
    };
  },
  name: "General",
  components: {
    Layout,
    PageHeader,
  },
  mounted() {
    const checkbox = document.getElementsByClassName("code-switcher");
    Array.from(checkbox).forEach((check) => {
      check.addEventListener("change", () => {
        const card = check.closest(".card");
        const preview = card.querySelector(".live-preview");
        const code = card.querySelector(".code-view");
        if (check.checked) {
          // do this
          preview.classList.add("d-none");
          code.classList.remove("d-none");
        } else {
          // do that
          preview.classList.remove("d-none");
          code.classList.add("d-none");
        }
      });
    });
  },
};
</script>

<template>
  <Layout>
    <PageHeader :title="title" :items="items" />
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Breadcrumb</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label for="breadcrumb-showcode" class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="breadcrumb-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->

          <div class="card-body">
            <p class="text-muted">
              Indicate the current page’s location within a navigational
              hierarchy
            </p>

            <div class="live-preview">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 py-2 bg-light">
                  <li class="breadcrumb-item active" aria-current="page">
                    Home
                  </li>
                </ol>
              </nav>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 py-2 bg-light">
                  <li class="breadcrumb-item">
                    <a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    Library
                  </li>
                </ol>
              </nav>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 py-2 bg-light">
                  <li class="breadcrumb-item">
                    <a href="#">Home</a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#">Base UI</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    General
                  </li>
                </ol>
              </nav>

              <nav aria-label="breadcrumb">
                <ol class="breadcrumb p-3 py-2 bg-light mb-0">
                  <li class="breadcrumb-item">
                    <a href="#">
                      <i class="ri-home-5-fill"></i>
                    </a>
                  </li>
                  <li class="breadcrumb-item">
                    <a href="#">Base UI</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    General
                  </li>
                </ol>
              </nav>
            </div>

            <div class="d-none code-view">
              <pre
                class="language-markup"
                style="height: 275px"
              ><code>&lt;nav aria-label=&quot;breadcrumb&quot;&gt;
&lt;b-breadcrumb&gt;
&lt;b-breadcrumb-item active aria-current=&quot;page&quot;&gt;Home&lt;/b-breadcrumb-item&gt;
&lt;/b-breadcrumb&gt;

&lt;nav aria-label=&quot;breadcrumb&quot;&gt;
&lt;b-breadcrumb&gt;
&lt;b-breadcrumb-item&gt;&lt;a href=&quot;#&quot;&gt;Home&lt;/a&gt;&lt;/b-breadcrumb-item&gt;
&lt;b-breadcrumb-item active aria-current=&quot;page&quot;&gt;Library&lt;/b-breadcrumb-item&gt;
&lt;/b-breadcrumb&gt;
&lt;/nav&gt;

&lt;nav aria-label=&quot;breadcrumb&quot;&gt;
&lt;b-breadcrumb&gt;
&lt;b-breadcrumb-item&gt;&lt;a href=&quot;#&quot;&gt;Home&lt;/a&gt;&lt;/b-breadcrumb-item&gt;
&lt;b-breadcrumb-item&gt;&lt;a href=&quot;#&quot;&gt;Base UI&lt;/a&gt;&lt;/b-breadcrumb-item&gt;
&lt;b-breadcrumb-item active aria-current=&quot;page&quot;&gt;General&lt;/b-breadcrumb-item&gt;
&lt;/b-breadcrumb&gt;
&lt;/nav&gt;

&lt;nav aria-label=&quot;breadcrumb&quot;&gt;
&lt;b-breadcrumb&gt;
&lt;b-breadcrumb-item&gt;&lt;a href=&quot;#&quot;&gt;&lt;i class=&quot;ri-home-5-fill&quot;&gt;&lt;/i&gt;&lt;/a&gt;&lt;/b-breadcrumb-item&gt;
&lt;b-breadcrumb-item&gt;&lt;a href=&quot;#&quot;&gt;Base UI&lt;/a&gt;&lt;/b-breadcrumb-item&gt;
&lt;b-breadcrumb-item active aria-current=&quot;page&quot;&gt;General&lt;/b-breadcrumb-item&gt;
&lt;/b-breadcrumb&gt;
&lt;/nav&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Pagination</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label for="pagination-showcode" class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="pagination-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->

          <div class="card-body">
            <div class="live-preview">
              <div class="row">
                <div class="col-lg-6">
                  <h5 class="fs-15">Default Pagination</h5>
                  <p class="text-muted">
                    Use
                    <code>pagination</code> class to ul element to indicate a
                    series of related content exists across multiple pages.
                  </p>

                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#">Previous</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">Next</a>
                      </li>
                    </ul>
                  </nav>

                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous"
                          >← &nbsp; Prev</a
                        >
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next"
                          >Next &nbsp; →</a
                        >
                      </li>
                    </ul>
                  </nav>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                  <div class="mt-4 mt-lg-0">
                    <h5 class="fs-15">Disabled and Active states</h5>
                    <p class="text-muted">
                      Use
                      <code>disabled</code> class to links that appear
                      un-clickable and <code>active</code> class to indicate the
                      current page.
                    </p>

                    <!-- Pagination Disabled & Active -->
                    <nav aria-label="...">
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"
                            >← &nbsp; Prev</a
                          >
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active">
                          <a class="page-link" href="#">
                            2
                            <span class="sr-only">(current)</span>
                          </a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next &nbsp; →</a>
                        </li>
                      </ul>
                    </nav>

                    <nav aria-label="...">
                      <ul class="pagination">
                        <li class="page-item disabled">
                          <span class="page-link">
                            <i class="mdi mdi-chevron-left"></i>
                          </span>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item active">
                          <span class="page-link">
                            2
                            <span class="sr-only">(current)</span>
                          </span>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">
                            <i class="mdi mdi-chevron-right"></i>
                          </a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
                <!-- end row -->
              </div>
              <!-- end row -->

              <div class="row">
                <div class="col-lg-6">
                  <div class="mt-4">
                    <h5 class="fs-15">Sizing</h5>
                    <p class="text-muted">
                      Use
                      <code>pagination-lg</code> or
                      <code>pagination-sm</code> to set different pagination
                      sizes.
                    </p>
                    <!-- Pagination Large -->
                    <nav aria-label="...">
                      <ul class="pagination pagination-lg">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"
                            >← &nbsp; Prev</a
                          >
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next &nbsp; →</a>
                        </li>
                      </ul>
                    </nav>

                    <!-- Pagination Small -->
                    <nav aria-label="...">
                      <ul class="pagination pagination-sm">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"
                            >← &nbsp; Prev</a
                          >
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next &nbsp; →</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="mt-4">
                    <h5 class="fs-15">Alignment</h5>

                    <p class="text-muted">
                      Use
                      <code>justify-content-start</code>,
                      <code>justify-content-start</code>, or
                      <code>justify-content-start</code>, class to pagination
                      class to change the alignment of pagination respectively.
                    </p>
                    <!-- Pagination Alignment -->

                    <!-- Center Alignment -->
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"
                            >← &nbsp; Prev</a
                          >
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next &nbsp; →</a>
                        </li>
                      </ul>
                    </nav>

                    <!-- Right Alignment -->
                    <nav aria-label="Page navigation example">
                      <ul class="pagination justify-content-end">
                        <li class="page-item disabled">
                          <a class="page-link" href="#" tabindex="-1"
                            >← &nbsp; Prev</a
                          >
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">2</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">3</a>
                        </li>
                        <li class="page-item">
                          <a class="page-link" href="#">Next &nbsp; →</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
              </div>
              <!-- end row -->

              <div class="row">
                <div class="col-lg-6">
                  <div class="mt-4">
                    <h5 class="fs-15">Custom Separated Pagination</h5>
                    <p class="text-muted">
                      Use
                      <code>pagination-separated</code> class to pagination
                      class to set custom separated pagination.
                    </p>
                    <!-- Custom Separated Pagination Large -->
                    <ul class="pagination pagination-lg pagination-separated">
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
                        <a href="#" class="page-link">4</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">5</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">→</a>
                      </li>
                    </ul>

                    <!-- Pagination rounded -->
                    <ul class="pagination pagination-separated">
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
                        <a href="#" class="page-link">4</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">5</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">→</a>
                      </li>
                    </ul>

                    <!-- Custom Separated Pagination Large -->
                    <ul class="pagination pagination-sm pagination-separated">
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
                        <a href="#" class="page-link">4</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">5</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">→</a>
                      </li>
                    </ul>
                  </div>
                </div>

                <div class="col-lg-6">
                  <div class="mt-4">
                    <h5 class="fs-15">Custom Rounded Pagination</h5>
                    <p class="text-muted">
                      Use
                      <code>pagination-rounded</code> class to pagination class
                      to set custom rounded pagination.
                    </p>
                    <!-- Pagination rounded -->
                    <ul class="pagination pagination-lg pagination-rounded">
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
                        <a href="#" class="page-link">4</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">5</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">→</a>
                      </li>
                    </ul>

                    <!-- Pagination rounded -->
                    <ul class="pagination pagination-rounded">
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
                        <a href="#" class="page-link">4</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">5</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">→</a>
                      </li>
                    </ul>

                    <!-- Pagination rounded -->
                    <ul class="pagination pagination-sm pagination-rounded">
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
                        <a href="#" class="page-link">4</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">5</a>
                      </li>
                      <li class="page-item">
                        <a href="#" class="page-link">→</a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <div class="d-none code-view">
              <pre
                class="language-markup"
                style="height: 275px"
              ><code>&lt;nav aria-label=&quot;Page navigation example&quot;&gt;
&lt;ul class=&quot;pagination&quot;&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;Previous&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;1&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;Next&lt;/a&gt;&lt;/li&gt;
&lt;/ul&gt;
&lt;/nav&gt;</code>

<code>&lt;nav aria-label=&quot;Page navigation example&quot;&gt;
&lt;ul class=&quot;pagination&quot;&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot; aria-label=&quot;Previous&quot;&gt;
&lt;i class=&quot;mdi mdi-chevron-left&quot;&gt;&lt;/i&gt;
&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;1&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot; aria-label=&quot;Next&quot;&gt;
&lt;i class=&quot;mdi mdi-chevron-right&quot;&gt;&lt;/i&gt;
&lt;/a&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/nav&gt;</code>


<code>&lt;!-- Pagination Disabled &amp; Active --&gt;
&lt;nav aria-label=&quot;...&quot;&gt;
&lt;ul class=&quot;pagination&quot;&gt;
&lt;li class=&quot;page-item disabled&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot; tabindex=&quot;-1&quot;&gt;Previous&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;1&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item active&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;2 &lt;span class=&quot;sr-only&quot;&gt;(current)&lt;/span&gt;&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;Next&lt;/a&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/nav&gt;</code>

<code>&lt;nav aria-label=&quot;...&quot;&gt;
&lt;ul class=&quot;pagination&quot;&gt;
&lt;li class=&quot;page-item disabled&quot;&gt;
&lt;span class=&quot;page-link&quot;&gt;&lt;i class=&quot;mdi mdi-chevron-left&quot;&gt;&lt;/i&gt;&lt;/span&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;1&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item active&quot;&gt;
&lt;span class=&quot;page-link&quot;&gt;
2
&lt;span class=&quot;sr-only&quot;&gt;(current)&lt;/span&gt;
&lt;/span&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;&lt;i class=&quot;mdi mdi-chevron-right&quot;&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/nav&gt;</code>


<code>&lt;!-- Pagination sizing --&gt;

&lt;!-- Pagination Large --&gt;
&lt;nav aria-label=&quot;...&quot;&gt;
&lt;ul class=&quot;pagination pagination-lg&quot;&gt;
&lt;li class=&quot;page-item disabled&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot; tabindex=&quot;-1&quot;&gt;Previous&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;1&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;Next&lt;/a&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/nav&gt;</code>

<code>&lt;!-- Pagination Small --&gt;
&lt;nav aria-label=&quot;...&quot;&gt;
&lt;ul class=&quot;pagination pagination-sm&quot;&gt;
&lt;li class=&quot;page-item disabled&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot; tabindex=&quot;-1&quot;&gt;Previous&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;1&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;Next&lt;/a&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/nav&gt;</code>


<code>&lt;!-- Pagination Alignment --&gt;

&lt;!-- Center Alignment --&gt;
&lt;nav aria-label=&quot;Page navigation example&quot;&gt;
&lt;ul class=&quot;pagination justify-content-center&quot;&gt;
&lt;li class=&quot;page-item disabled&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot; tabindex=&quot;-1&quot;&gt;Previous&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;1&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;Next&lt;/a&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/nav&gt;</code>

<code>&lt;!-- Right Alignment --&gt;
&lt;nav aria-label=&quot;Page navigation example&quot;&gt;
&lt;ul class=&quot;pagination justify-content-end&quot;&gt;
&lt;li class=&quot;page-item disabled&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot; tabindex=&quot;-1&quot;&gt;Previous&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;1&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;2&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;3&lt;/a&gt;&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a class=&quot;page-link&quot; href=&quot;#&quot;&gt;Next&lt;/a&gt;
&lt;/li&gt;
&lt;/ul&gt;
&lt;/nav&gt;</code>


<code>&lt;!-- Pagination Rounded --&gt;
&lt;ul class=&quot;pagination pagination-rounded&quot;&gt;
&lt;li class=&quot;page-item disabled&quot;&gt;
&lt;a href=&quot;#&quot; class=&quot;page-link&quot;&gt;&lt;i class=&quot;mdi mdi-chevron-left&quot;&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a href=&quot;#&quot; class=&quot;page-link&quot;&gt;1&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item active&quot;&gt;
&lt;a href=&quot;#&quot; class=&quot;page-link&quot;&gt;2&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a href=&quot;#&quot; class=&quot;page-link&quot;&gt;3&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a href=&quot;#&quot; class=&quot;page-link&quot;&gt;4&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a href=&quot;#&quot; class=&quot;page-link&quot;&gt;5&lt;/a&gt;
&lt;/li&gt;
&lt;li class=&quot;page-item&quot;&gt;
&lt;a href=&quot;#&quot; class=&quot;page-link&quot;&gt;&lt;i class=&quot;mdi mdi-chevron-right&quot;&gt;&lt;/i&gt;&lt;/a&gt;
&lt;/li&gt;
&lt;/ul&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Spinners</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label for="spinners-showcode" class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="spinners-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->

          <div class="card-body">
            <div class="live-preview">
              <div class="row">
                <div class="col-lg-6">
                  <div>
                    <h5 class="fs-15">Border spinner</h5>
                    <p class="text-muted">
                      Use
                      <code>spinner-border</code> class for a lightweight
                      loading indicator.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mb-2">
                      <!-- Border spinner -->
                      <div class="spinner-border text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-border text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-border text-success" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-border text-info" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-border text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-border text-danger" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-border text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-border text-light" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->

                <div class="col-lg-6">
                  <div>
                    <h5 class="fs-15">Growing spinner</h5>
                    <p class="text-muted">
                      Use
                      <code>spinner-grow</code> class for a lightweight spinner
                      with growing effect.
                    </p>
                    <div class="d-flex flex-wrap gap-3 mb-2">
                      <!-- Growing spinner -->
                      <div class="spinner-grow text-primary" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-grow text-secondary" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-grow text-success" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-grow text-info" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-grow text-warning" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-grow text-danger" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-grow text-dark" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                      <div class="spinner-grow text-light" role="status">
                        <span class="sr-only">Loading...</span>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col -->
              </div>
              <!-- end row -->
            </div>

            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Border spinner --&gt;

&lt;b-spinner variant=&quot;primary&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner variant=&quot;secondary&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner variant=&quot;success&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner variant=&quot;info&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner variant=&quot;warning&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner variant=&quot;danger&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner variant=&quot;dark&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner variant=&quot;light&quot;&gt;&lt;/b-spinner&gt;
</code>
<code>&lt;!-- Growing spinner --&gt;
&lt;b-spinner type=&quot;grow&quot; variant=&quot;primary&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner type=&quot;grow&quot; variant=&quot;secondary&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner type=&quot;grow&quot; variant=&quot;success&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner type=&quot;grow&quot; variant=&quot;info&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner type=&quot;grow&quot; variant=&quot;warning&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner type=&quot;grow&quot; variant=&quot;danger&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner type=&quot;grow&quot; variant=&quot;dark&quot;&gt;&lt;/b-spinner&gt;

&lt;b-spinner type=&quot;grow&quot; variant=&quot;light&quot;&gt;&lt;/b-spinner&gt;
</code></pre>
            </div>
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