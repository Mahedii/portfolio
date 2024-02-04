<script>
import Layout from "../../layouts/main.vue";
import PageHeader from "@/components/page-header";

import "prismjs";
import "prismjs/themes/prism.css";

export default {
  data() {
    return {
      title: "Accordions",
      items: [
        {
          text: "Base UI",
          href: "/",
        },
        {
          text: "Accordions",
          active: true,
        },
      ],
    };
  },
  name: "Accordions",
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
      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Default Accordion</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label for="default-base-showcode" class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="default-base-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->

          <div class="card-body">
            <p class="text-muted">
              Use the <code>b-accordion</code> for expand/collapse the accordion
              content.
            </p>
            <div class="live-preview">
              <b-accordion>
                <b-accordion-item
                  title="How to create a group booking ?"
                  visible class="shadow">
                  Although you probably won’t get into any legal trouble if you
                  do it just once, why risk it? If you made your subscribers a
                  promise, you should honor that. If not, you run the risk of a
                  drastic increase in opt outs, which will only hurt you in the
                  long run.
                </b-accordion-item>
                <b-accordion-item title="Why do we use it ?" class="shadow">
                  No charges are put in place by SlickText when subscribers join
                  your text list. This does not mean however that charges 100%
                  will not occur. Charges that may occur fall under part of the
                  compliance statement stating "Message and Data rates may
                  apply."
                </b-accordion-item>
                <b-accordion-item title="Where does it come from ?" class="shadow">
                  Now that you have a general idea of the amount of texts you
                  will need per month, simply find a plan size that allows you
                  to have this allotment, plus some extra for growth. Don't
                  worry, there are no mistakes to be made here. You can always
                  upgrade and downgrade.
                </b-accordion-item>
              </b-accordion>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;b-accordion&gt;
  &lt;b-accordion-item title="How to create a group booking ?" visible&gt;
    Although you probably won’t get into any legal trouble if you
    do it just once, why risk it? If you made your subscribers a
    promise, you should honor that. If not, you run the risk of a
    drastic increase in opt outs, which will only hurt you in the
    long run.
    &lt;/b-accordion-item&gt;
  &lt;b-accordion-item title="Why do we use it ?"&gt;
    No charges are put in place by SlickText when subscribers join
    your text list. This does not mean however that charges 100%
    will not occur. Charges that may occur fall under part of the
    compliance statement stating "Message and Data rates may
    apply."
    &lt;/b-accordion-item&gt;
  &lt;b-accordion-item title="Where does it come from ?"&gt;
    Now that you have a general idea of the amount of texts you
    will need per month, simply find a plan size that allows you
    to have this allotment, plus some extra for growth. Don't
    worry, there are no mistakes to be made here. You can always
    upgrade and downgrade.
    &lt;/b-accordion-item&gt;
&lt;/b-accordion&gt;
</code>
</pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Accordion Flush</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label for="accordion-flush" class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="accordion-flush"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use <code>flush</code> class to remove the default
              background-color, some borders, and some rounded corners to render
              accordions edge-to-edge with their parent container.
            </p>
            <div class="live-preview">
              <b-accordion flush id="accordionFlushExample">
                <b-accordion-item title="How do I set up my profile ?" visible class="shadow">
                  The renewal of your SlickText service happens on the
                  anniversary of your original paid sign up date. Upgrading in
                  the middle of your billing period will not change the billing
                  date. Upgrading does however force an immediate, pro-rated
                  charge to take place on your account.
                </b-accordion-item>
                <b-accordion-item title="What can I do with my project ?" class="shadow">
                  If you had signed up on a free account with Slicktext, then
                  upgraded to a paid plan at a later date, your bill will renew
                  based on the date you had upgraded to a paid plan. All
                  invoices are able to be viewed under your plan options in your
                  SlickText account.
                </b-accordion-item>
                <b-accordion-item title="Where can I go to edit voice settings" class="shadow">
                  No, we cannot provide this information. Opting out from a list
                  is an anonymous, private act. This prevents further
                  harassment. Providing this information is considered bad
                  practice, and further communication after they opt out would
                  be considered against compliance.
                </b-accordion-item>
              </b-accordion>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Accordion Flush Example --&gt;
&lt;b-accordion flush id=&quot;accordionFlushExample&quot;&gt;
&lt;b-accordion-item title="How do I set up my profile ?" visible&gt;
The renewal of your SlickText service happens on the anniversary of your original paid sign up date. Upgrading in the middle of your billing period will not change the billing date. Upgrading does however force an immediate, pro-rated charge to take place on your account.
 &lt;/b-accordion-item&gt;

If you had signed up on a free account with Slicktext, then
upgraded to a paid plan at a later date, your bill will renew
based on the date you had upgraded to a paid plan. All
invoices are able to be viewed under your plan options inyour
SlickText account.
 &lt;/b-accordion-item&gt;

&lt;b-accordion-item title="Where can I go to edit voice settings"If you had signed up on a free account with Slicktext, then
upgraded to a paid plan at a later date, your bill will renew
based on the date you had upgraded to a paid plan. All
invoices are able to be viewed under your plan options inyour
SlickText account.
 &lt;/b-accordion-item&gt;
&lt;b-accordion&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Accordions with Icons</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label for="accordion-icon" class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="accordion-icon"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use <code>custom-accordionwithicon</code> class to show custom
              icon at accordion.
            </p>
            <div class="live-preview">
              <div
                class="accordion custom-accordionwithicon accordion-secondary"
                id="accordionWithicon"
              >
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionwithiconExample1">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_iconExamplecollapse1"
                      aria-expanded="true"
                      aria-controls="accor_iconExamplecollapse1"
                    >
                      <i class="ri-global-line me-2"></i> How Does Age
                      Verification Work?
                    </button>
                  </h2>
                  <div
                    id="accor_iconExamplecollapse1"
                    class="accordion-collapse collapse show"
                    aria-labelledby="accordionwithiconExample1"
                    data-bs-parent="#accordionWithicon"
                  >
                    <div class="accordion-body">
                      Increase or decrease the letter spacing depending on the
                      situation and try, try again until it looks right, and
                      each assumenda labore aes Homo nostrud organic, assumenda
                      labore aesthetic magna elements, buttons, everything.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionwithiconExample2">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_iconExamplecollapse2"
                      aria-expanded="false"
                      aria-controls="accor_iconExamplecollapse2"
                    >
                      <i class="ri-user-location-line me-2"></i> How Does Link
                      Tracking Work?
                    </button>
                  </h2>
                  <div
                    id="accor_iconExamplecollapse2"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionwithiconExample2"
                    data-bs-parent="#accordionWithicon"
                  >
                    <div class="accordion-body">
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus
                      tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
                      Donec sodales sagittis magna. Sed consequat, leo eget
                      bibendum sodales, augue velit cursus nunc, quis gravida
                      magna mi a libero. Fusce vulputate eleifend sapien.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionwithiconExample3">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_iconExamplecollapse3"
                      aria-expanded="false"
                      aria-controls="accor_iconExamplecollapse3"
                    >
                      <i class="ri-pen-nib-line me-2"></i> How Do I Set Up the
                      Drip Feature?
                    </button>
                  </h2>
                  <div
                    id="accor_iconExamplecollapse3"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionwithiconExample3"
                    data-bs-parent="#accordionWithicon"
                  >
                    <div class="accordion-body">
                      Cras ultricies mi eu turpis hendrerit fringilla.
                      Vestibulum ante ipsum primis in faucibus orci luctus et
                      ultrices posuere cubilia Curae; In ac dui quis mi
                      consectetuer lacinia. Nam pretium turpis et arcu arcu
                      tortor, suscipit eget, imperdiet nec, imperdiet iaculis
                      aliquam ultrices mauris.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Accordions with Icons --&gt;
&lt;b-accordion class=&quot;custom-accordionwithicon&quot; id=&quot;accordionWithicon&quot;&gt;
&lt;b-accordion-item title="How Does Age Verification Work?" visible&gt;
Increase or decrease the letter spacing depending on the
situation and try, try again until it looks right, and
each assumenda labore aes Homo nostrud organic, assumenda
labore aesthetic magna elements, buttons, everything.
 &lt;/b-accordion-item&gt;

&lt;b-accordion-item title="How Does Link Tracking Work?"&gt;
Nullam quis ante. Etiam sit amet orci eget eros faucibus
tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
Donec sodales sagittis magna. Sed consequat, leo eget
bibendum sodales, augue velit cursus nunc, quis gravida
magna mi a libero. Fusce vulputate eleifend sapien.
 &lt;/b-accordion-item&gt;

&lt;b-accordion-item title="How Do I Set Up the Drip Feature?" &gt;
Cras ultricies mi eu turpis hendrerit fringilla.
Vestibulum ante ipsum primis in faucibus orci luctus et
ultrices posuere cubilia Curae; In ac dui quis mi
consectetuer lacinia. Nam pretium turpis et arcu arcu
tortor, suscipit eget, imperdiet nec, imperdiet iaculis
aliquam ultrices mauris.
 &lt;/b-accordion-item&gt;
&lt;/b-accordion&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">
              Accordions without Icons
            </h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="accordion-without-icon-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="accordion-without-icon-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use <code>accordion-icon-none</code> class to remove icon at
              accordion.
            </p>
            <div class="live-preview">
              <div
                class="accordion accordion-icon-none"
                id="accordionWithouticon"
              >
                <div class="accordion-item shadow">
                  <h2
                    class="accordion-header"
                    id="accordionwithouticonExample1"
                  >
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_withouticoncollapse1"
                      aria-expanded="true"
                      aria-controls="accor_withouticoncollapse1"
                    >
                      <i class="ri-global-line me-2"></i> How Does Age
                      Verification Work?
                    </button>
                  </h2>
                  <div
                    id="accor_withouticoncollapse1"
                    class="accordion-collapse collapse show"
                    aria-labelledby="accordionwithouticonExample1"
                    data-bs-parent="#accordionWithouticon"
                  >
                    <div class="accordion-body">
                      Each design is a new, unique piece of art birthed into
                      this world, and while you have the opportunity to be
                      creative and make your own style choices. For that very
                      reason, I went on a quest and spoke to many different
                      professional graphic designers.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2
                    class="accordion-header"
                    id="accordionwithouticonExample2"
                  >
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_withouticoncollapse2"
                      aria-expanded="false"
                      aria-controls="accor_withouticoncollapse2"
                    >
                      <i class="ri-user-location-line me-2"></i> How Does Link
                      Tracking Work?
                    </button>
                  </h2>
                  <div
                    id="accor_withouticoncollapse2"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionwithouticonExample2"
                    data-bs-parent="#accordionWithouticon"
                  >
                    <div class="accordion-body">
                      When, while the lovely valley teems with vapour around me,
                      and the meridian sun strikes the upper surface of the
                      impenetrable foliage of my trees, and but a few stray
                      gleams steal into the inner sanctuary, I throw myself down
                      among the tall grass by the trickling stream; and, as I
                      lie close to the earth, a thousand unknown.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2
                    class="accordion-header"
                    id="accordionwithouticonExample3"
                  >
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_withouticoncollapse3"
                      aria-expanded="false"
                      aria-controls="accor_withouticoncollapse3"
                    >
                      <i class="ri-pen-nib-line me-2"></i> How Do I Set Up the
                      Drip Feature?
                    </button>
                  </h2>
                  <div
                    id="accor_withouticoncollapse3"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionwithouticonExample3"
                    data-bs-parent="#accordionWithouticon"
                  >
                    <div class="accordion-body">
                      Cras ultricies mi eu turpis hendrerit fringilla.
                      Vestibulum ante ipsum primis in faucibus orci luctus et
                      ultrices posuere cubilia Curae; In ac dui quis mi
                      consectetuer lacinia. Nam pretium turpis et arcu arcu
                      tortor, suscipit eget, imperdiet nec, imperdiet iaculis
                      aliquam ultrices mauris.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Accordions with Icons --&gt;
&lt;b-accordion class=&quot;custom-accordionwithicon&quot; id=&quot;accordionWithicon&quot;&gt;
&lt;b-accordion-item title="How Does Age Verification Work?" visible&gt;
Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua nulla assumenda shoreditch et.
 &lt;/b-accordion-item&gt;

&lt;b-accordion-item title="How Does Link Tracking Work?"&gt;
Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc, quis gravida magna mi a libero. Fusce vulputate eleifend sapien.
 &lt;/b-accordion-item&gt; 

&lt;b-accordion-item title="How Do I Set Up the Drip Feature?" visible&gt;
Cras ultricies mi eu turpis hendrerit fringilla. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In ac dui quis mi consectetuer lacinia. Nam pretium turpis et arcu arcu tortor, suscipit eget, imperdiet nec, imperdiet iaculis aliquam ultrices mauris.
 &lt;/b-accordion-item&gt;
&lt;/b-accordion&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xl-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">
              Accordions with Plus Icon
            </h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="withplusiconaccordion-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="withplusiconaccordion-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use <code>custom-accordionwithicon-plus</code> class to show plus
              icon at the accordion.
            </p>
            <div class="live-preview">
              <div
                class="accordion custom-accordionwithicon-plus"
                id="accordionWithplusicon"
              >
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionwithplusExample1">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_plusExamplecollapse1"
                      aria-expanded="true"
                      aria-controls="accor_plusExamplecollapse1"
                    >
                      What is User Interface Design?
                    </button>
                  </h2>
                  <div
                    id="accor_plusExamplecollapse1"
                    class="accordion-collapse collapse show"
                    aria-labelledby="accordionwithplusExample1"
                    data-bs-parent="#accordionWithplusicon"
                  >
                    <div class="accordion-body">
                      Big July earthquakes confound zany experimental vow. My
                      girl wove six dozen plaid jackets before she quit. Six big
                      devils from Japan quickly forgot how to waltz. try again
                      until it looks right, and each assumenda labore aes Homo
                      nostrud organic, assumenda labore aesthetic magna
                      elements, buttons, everything.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionwithplusExample2">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_plusExamplecollapse2"
                      aria-expanded="false"
                      aria-controls="accor_plusExamplecollapse2"
                    >
                      What is Digital Marketing?
                    </button>
                  </h2>
                  <div
                    id="accor_plusExamplecollapse2"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionwithplusExample2"
                    data-bs-parent="#accordionWithplusicon"
                  >
                    <div class="accordion-body">
                      It makes a statement, it’s impressive graphic design.
                      Increase or decrease the letter spacing depending on the
                      situation and try, try again until it looks right, and
                      each letter has the perfect spot of its own. commodo enim
                      craft beer mlkshk aliquip jean shorts ullamco.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionwithplusExample3">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_plusExamplecollapse3"
                      aria-expanded="false"
                      aria-controls="accor_plusExamplecollapse3"
                    >
                      Where does it come from ?
                    </button>
                  </h2>
                  <div
                    id="accor_plusExamplecollapse3"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionwithplusExample3"
                    data-bs-parent="#accordionWithplusicon"
                  >
                    <div class="accordion-body">
                      Spacing depending on the situation and try, try again
                      until it looks right, and each. next level wes anderson
                      artisan four loko farm-to-table craft beer twee. commodo
                      enim craft beer mlkshk aliquip jean shorts ullamco. omo
                      nostrud organic, assumenda labore aesthetic magna
                      delectus. pposites attract, and that’s a fact.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Accordions with Plus Icon --&gt;
&lt;b-accordion class=&quot;custom-accordionwithicon-plus&quot; id=&quot;accordionWithplusicon&quot;&gt;

&lt;b-accordion-item title="What is User Interface Design?" visible&gt;
Big July earthquakes confound zany experimental vow. My
girl wove six dozen plaid jackets before she quit. Sixbig
devils from Japan quickly forgot how to waltz. try again
until it looks right, and each assumenda labore aes Homo
nostrud organic, assumenda labore aesthetic magna
elements, buttons, everything.
 &lt;/b-accordion-item&gt;

&lt;b-accordion-item title="What is Digital Marketing?" visible&gt;
It makes a statement, it’s impressive graphic design.
Increase or decrease the letter spacing depending on the
situation and try, try again until it looks right, and
each letter has the perfect spot of its own. commodo enim
craft beer mlkshk aliquip jean shorts ullamco.
 &lt;/b-accordion-item&gt;

&lt;b-accordion-item title="Where does it come from ?" visible&gt;
Spacing depending on the situation and try, try again
until it looks right, and each. next level wes anderson
artisan four loko farm-to-table craft beer twee. commodo
enim craft beer mlkshk aliquip jean shorts ullamco. omo
nostrud organic, assumenda labore aesthetic magna
delectus. pposites attract, and that’s a fact.
 &lt;/b-accordion-item&gt;
&lt;/b-accordion&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Left Icon Accordions</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="accordion-lefticon-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="accordion-lefticon-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use <code>lefticon-accordion</code> class to show the icon on the
              left side of the accordion.
            </p>
            <div class="live-preview">
              <div
                class="
                  accordion
                  lefticon-accordion
                  custom-accordionwithicon
                  accordion-border-box
                "
                id="accordionlefticon"
              >
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionlefticonExample1">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_lefticonExamplecollapse1"
                      aria-expanded="true"
                      aria-controls="accor_lefticonExamplecollapse1"
                    >
                      What is User Interface Design?
                    </button>
                  </h2>
                  <div
                    id="accor_lefticonExamplecollapse1"
                    class="accordion-collapse collapse show"
                    aria-labelledby="accordionlefticonExample1"
                    data-bs-parent="#accordionlefticon"
                  >
                    <div class="accordion-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life
                      accusamus terry richardson ad squid. 3 wolf moon officia
                      aute, non cupidatat skateboard dolor brunch. Food truck
                      quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                      tempor, sunt aliqua nulla assumenda shoreditch et.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionlefticonExample2">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_lefticonExamplecollapse2"
                      aria-expanded="false"
                      aria-controls="accor_lefticonExamplecollapse2"
                    >
                      What is Digital Marketing?
                    </button>
                  </h2>
                  <div
                    id="accor_lefticonExamplecollapse2"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionlefticonExample2"
                    data-bs-parent="#accordionlefticon"
                  >
                    <div class="accordion-body">
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus
                      tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
                      Donec sodales sagittis magna. Sed consequat, leo eget
                      bibendum sodales, augue velit cursus nunc, quis gravida
                      magna mi a libero. Fusce vulputate eleifend sapien.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionlefticonExample3">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_lefticonExamplecollapse3"
                      aria-expanded="false"
                      aria-controls="accor_lefticonExamplecollapse3"
                    >
                      Where does it come from ?
                    </button>
                  </h2>
                  <div
                    id="accor_lefticonExamplecollapse3"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionlefticonExample3"
                    data-bs-parent="#accordionlefticon"
                  >
                    <div class="accordion-body">
                      Cras ultricies mi eu turpis hendrerit fringilla.
                      Vestibulum ante ipsum primis in faucibus orci luctus et
                      ultrices posuere cubilia Curae; In ac dui quis mi
                      consectetuer lacinia. Nam pretium turpis et arcu arcu
                      tortor, suscipit eget, imperdiet nec, imperdiet iaculis
                      aliquam ultrices mauris.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Left Icon Accordions --&gt;
&lt;b-accordion class=&quot;lefticon-accordion custom-accordionwithicon accordion-border-box&quot; id=&quot;accordionlefticon&quot;&gt;

&lt;b-accordion-item title="What is User Interface Design?" visible&gt;
Anim pariatur cliche reprehenderit, enim eiusmod high life
accusamus terry richardson ad squid. 3 wolf moon officia
aute, non cupidatat skateboard dolor brunch. Food truck
quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
tempor, sunt aliqua nulla assumenda shoreditch et.
&lt;/b-accordion-item&gt;

&lt;b-accordion-item title="What is Digital Marketing?" visible&gt;
Nullam quis ante. Etiam sit amet orci eget eros faucibus
tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
Donec sodales sagittis magna. Sed consequat, leo eget
bibendum sodales, augue velit cursus nunc, quis gravida
magna mi a libero. Fusce vulputate eleifend sapien.
&lt;/b-accordion-item&gt;

&lt;b-accordion-item title="Where does it come from ?" visible&gt;
Cras ultricies mi eu turpis hendrerit fringilla.
Vestibulum ante ipsum primis in faucibus orci luctus et
ultrices posuere cubilia Curae; In ac dui quis mi
consectetuer lacinia. Nam pretium turpis et arcu arcu
tortor, suscipit eget, imperdiet nec, imperdiet iaculis
aliquam ultrices mauris.
&lt;/b-accordion-item&gt;

&lt;/b-accordion&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->

      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Accordions Bordered</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="accordion-bordered-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="accordion-bordered-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use <code>custom-accordion-border</code> class to create the
              border at the accordion.
            </p>
            <div class="live-preview">
              <div
                class="
                  accordion
                  custom-accordionwithicon custom-accordion-border
                  accordion-border-box accordion-success
                "
                id="accordionBordered"
              >
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionborderedExample1">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_borderedExamplecollapse1"
                      aria-expanded="true"
                      aria-controls="accor_borderedExamplecollapse1"
                    >
                      What is User Interface Design?
                    </button>
                  </h2>
                  <div
                    id="accor_borderedExamplecollapse1"
                    class="accordion-collapse collapse show"
                    aria-labelledby="accordionborderedExample1"
                    data-bs-parent="#accordionBordered"
                  >
                    <div class="accordion-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life
                      accusamus terry richardson ad squid. 3 wolf moon officia
                      aute, non cupidatat skateboard dolor brunch. Food truck
                      quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
                      tempor, sunt aliqua nulla assumenda shoreditch et.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionborderedExample2">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_borderedExamplecollapse2"
                      aria-expanded="false"
                      aria-controls="accor_borderedExamplecollapse2"
                    >
                      What is Digital Marketing?
                    </button>
                  </h2>
                  <div
                    id="accor_borderedExamplecollapse2"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionborderedExample2"
                    data-bs-parent="#accordionBordered"
                  >
                    <div class="accordion-body">
                      Nullam quis ante. Etiam sit amet orci eget eros faucibus
                      tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
                      Donec sodales sagittis magna. Sed consequat, leo eget
                      bibendum sodales, augue velit cursus nunc, quis gravida
                      magna mi a libero. Fusce vulputate eleifend sapien.
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionborderedExample3">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_borderedExamplecollapse3"
                      aria-expanded="false"
                      aria-controls="accor_borderedExamplecollapse3"
                    >
                      Where does it come from ?
                    </button>
                  </h2>
                  <div
                    id="accor_borderedExamplecollapse3"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionborderedExample3"
                    data-bs-parent="#accordionBordered"
                  >
                    <div class="accordion-body">
                      Cras ultricies mi eu turpis hendrerit fringilla.
                      Vestibulum ante ipsum primis in faucibus orci luctus et
                      ultrices posuere cubilia Curae; In ac dui quis mi
                      consectetuer lacinia. Nam pretium turpis et arcu arcu
                      tortor, suscipit eget, imperdiet nec, imperdiet iaculis
                      aliquam ultrices mauris.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Accordions Bordered --&gt;
&lt;b-accordion class=&quot; custom-accordionwithicon custom-accordion-border accordion-border-box accordion-secondary&quot; id=&quot;accordionBordered&quot;&gt;
&lt;b-accordion-item title="What is User Interface Design?" visible&gt;
Anim pariatur cliche reprehenderit, enim eiusmod high life
accusamus terry richardson ad squid. 3 wolf moon officia
aute, non cupidatat skateboard dolor brunch. Food truck
quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon
tempor, sunt aliqua nulla assumenda shoreditch et.
&lt;/b-accordion-item&gt;

&lt;b-accordion-item title="What is Digital Marketing?"
Nullam quis ante. Etiam sit amet orci eget eros faucibus
tincidunt. Duis leo. Sed fringilla mauris sit amet nibh.
Donec sodales sagittis magna. Sed consequat, leo eget
bibendum sodales, augue velit cursus nunc, quis gravida
magna mi a libero. Fusce vulputate eleifend sapien.
&lt;/b-accordion-item&gt;

&lt;b-accordion-item title="Where does it come from ?"
If you had Cras ultricies mi eu turpis hendrerit fringilla.
Vestibulum ante ipsum primis in faucibus orci luctus et
ultrices posuere cubilia Curae; In ac dui quis mi
consectetuer lacinia. Nam pretium turpis et arcu arcu
tortor, suscipit eget, imperdiet nec, imperdiet iaculis
aliquam ultrices mauris.
&lt;/b-accordion-item&gt;

&lt;/b-accordion&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Nesting Accordions</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="accordion-nesting-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="accordion-nesting-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use <code>nesting-accordion</code> class to create a nesting
              accordion.
            </p>
            <div class="live-preview">
              <div
                class="accordion custom-accordionwithicon accordion-border-box"
                id="accordionnesting"
              >
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionnestingExample1">
                    <button
                      class="accordion-button"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_nestingExamplecollapse1"
                      aria-expanded="true"
                      aria-controls="accor_nestingExamplecollapse1"
                    >
                      How Do I Add Contacts/Subscribers?
                    </button>
                  </h2>
                  <div
                    id="accor_nestingExamplecollapse1"
                    class="accordion-collapse collapse show"
                    aria-labelledby="accordionnestingExample1"
                    data-bs-parent="#accordionnesting"
                  >
                    <div class="accordion-body">
                      This opt in method is perfect for those looking to
                      integrate a different software such Shopify or Hubspot
                      with Slicktext. For example, upon cashing out online, a
                      subscriber may submit to have their mobile number to
                      receive marketing messages. The API will pass this
                      information from said software over to Slicktext via API
                      integration.
                      <div
                        class="
                          accordion
                          nesting2-accordion
                          custom-accordionwithicon
                          accordion-border-box
                          mt-3
                        "
                        id="accordionnesting2"
                      >
                        <div class="accordion-item shadow">
                          <h2
                            class="accordion-header"
                            id="accordionnesting2Example1"
                          >
                            <button
                              class="accordion-button"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#accor_nesting2Examplecollapse1"
                              aria-expanded="true"
                              aria-controls="accor_nesting2Examplecollapse1"
                            >
                              How Do I Search For Contacts?
                            </button>
                          </h2>
                          <div
                            id="accor_nesting2Examplecollapse1"
                            class="accordion-collapse collapse show"
                            aria-labelledby="accordionnesting2Example1"
                            data-bs-parent="#accordionnesting2"
                          >
                            <div class="accordion-body">
                              When you are in need of finding a specific
                              subscriber, you will want to use the help of
                              SlickText's search navigation tool, located under
                              the Contacts tab of your Slicktext account. Once
                              here, you will have options to sort by, filter,
                              and search your contacts.
                              <div
                                class="
                                  accordion
                                  nesting4-accordion
                                  custom-accordionwithicon
                                  accordion-border-box
                                  mt-3
                                "
                                id="accordionnesting4"
                              >
                                <div class="accordion-item shadow">
                                  <h2
                                    class="accordion-header"
                                    id="accordionnesting4Example2"
                                  >
                                    <button
                                      class="accordion-button collapsed"
                                      type="button"
                                      data-bs-toggle="collapse"
                                      data-bs-target="#accor_nesting4Examplecollapse2"
                                      aria-expanded="false"
                                      aria-controls="accor_nesting4Examplecollapse2"
                                    >
                                      How do I reset my digital tide watch ?
                                    </button>
                                  </h2>
                                  <div
                                    id="accor_nesting4Examplecollapse2"
                                    class="accordion-collapse collapse"
                                    aria-labelledby="accordionnesting4Example2"
                                    data-bs-parent="#accordionnesting4"
                                  >
                                    <div class="accordion-body">
                                      Opting out a subscriber will allow
                                      SlickText to maintain the history of the
                                      subscriber as it pertains to the textword
                                      you are opting them out of. If this user
                                      was to text to join again, the initial
                                      text they are met with will be a "welcome
                                      back" message instead of the auto reply.
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="accordion-item shadow">
                          <h2
                            class="accordion-header"
                            id="accordionnesting2Example2"
                          >
                            <button
                              class="accordion-button collapsed"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#accor_nesting2Examplecollapse2"
                              aria-expanded="false"
                              aria-controls="accor_nesting2Examplecollapse2"
                            >
                              How Do I Delete a Contact From My List?
                            </button>
                          </h2>
                          <div
                            id="accor_nesting2Examplecollapse2"
                            class="accordion-collapse collapse"
                            aria-labelledby="accordionnesting2Example2"
                            data-bs-parent="#accordionnesting2"
                          >
                            <div class="accordion-body">
                              Opting out a subscriber will allow SlickText to
                              maintain the history of the subscriber as it
                              pertains to the textword you are opting them out
                              of. If this user was to text to join again, the
                              initial text they are met with will be a "welcome
                              back" message instead of the auto reply.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionnestingExample2">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_nestingExamplecollapse2"
                      aria-expanded="false"
                      aria-controls="accor_nestingExamplecollapse2"
                    >
                      How Does Personalization Work?
                    </button>
                  </h2>
                  <div
                    id="accor_nestingExamplecollapse2"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionnestingExample2"
                    data-bs-parent="#accordionnesting"
                  >
                    <div class="accordion-body">
                      Personalization allows you to provide a personal touch to
                      your outbound text marketing campaigns. SlickText uses
                      merge tags as placeholders that are replaced with
                      contact-specific information when a text message is sent.
                      These merge tags may also be known as personalization
                      fields.
                      <div
                        class="
                          accordion
                          nesting3-accordion
                          custom-accordionwithicon
                          accordion-border-box
                          mt-3
                        "
                        id="accordionnesting3"
                      >
                        <div class="accordion-item mt-2">
                          <h2
                            class="accordion-header"
                            id="accordionnesting3Example2"
                          >
                            <button
                              class="accordion-button collapsed"
                              type="button"
                              data-bs-toggle="collapse"
                              data-bs-target="#accor_nesting3Examplecollapse2"
                              aria-expanded="false"
                              aria-controls="accor_nesting3Examplecollapse2"
                            >
                              Howe does temperature impact my watch?
                            </button>
                          </h2>
                          <div
                            id="accor_nesting3Examplecollapse2"
                            class="accordion-collapse collapse"
                            aria-labelledby="accordionnesting3Example2"
                            data-bs-parent="#accordionnesting3"
                          >
                            <div class="accordion-body">
                              Opting out a subscriber will allow SlickText to
                              maintain the history of the subscriber as it
                              pertains to the textword you are opting them out
                              of. If this user was to text to join again, the
                              initial text they are met with will be a "welcome
                              back" message instead of the auto reply.
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="accordion-item shadow">
                  <h2 class="accordion-header" id="accordionnestingExample3">
                    <button
                      class="accordion-button collapsed"
                      type="button"
                      data-bs-toggle="collapse"
                      data-bs-target="#accor_nestingExamplecollapse3"
                      aria-expanded="false"
                      aria-controls="accor_nestingExamplecollapse3"
                    >
                      What Happens When I Run Out of Messages?
                    </button>
                  </h2>
                  <div
                    id="accor_nestingExamplecollapse3"
                    class="accordion-collapse collapse"
                    aria-labelledby="accordionnestingExample3"
                    data-bs-parent="#accordionnesting"
                  >
                    <div class="accordion-body">
                      When you run out of messages, you will not be able to send
                      any outbound campaigns. This would include any scheduled
                      messages, drip campaigns, and birthday messages. However,
                      we will continue to deliver your auto-reply messages to
                      allow your subscriber list to continue to grow.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Nesting Accordions --&gt;
&lt;b-accordion class=&quot; nesting-accordion custom-accordionwithicon accordion-border-box&quot; id=&quot;accordionnesting&quot;&gt;
&lt;b-accordion-item title="How Do I Add Contacts/Subscribers?" visible&gt;
This opt in method is perfect for those looking to integrate a different software such Shopify or Hubspot with Slicktext. For example, upon cashing out online, a subscriber may submit to have their mobile number to receive marketing messages. The API will pass this information from said software over to Slicktext via API integration.
&lt;/b-accordion-item&gt;

&lt;b-accordion class=&quot; nesting2-accordion custom-accordionwithicon accordion-border-box mt-3&quot; id=&quot;accordionnesting2&quot;&gt;
&lt;div class=&quot;accordion-item&quot;&gt;
  &lt;h2 class=&quot;accordion-header&quot; id=&quot;accordionnesting2Example1&quot;&gt;
      &lt;button class=&quot;accordion-button&quot; type=&quot;button&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#accor_nesting2Examplecollapse1&quot; aria-expanded=&quot;true&quot; aria-controls=&quot;accor_nesting2Examplecollapse1&quot;&gt;
          How Do I Search For Contacts?
      &lt;/button&gt;
  &lt;/h2&gt;
  &lt;div id=&quot;accor_nesting2Examplecollapse1&quot; class=&quot;accordion-collapse collapse show&quot; aria-labelledby=&quot;accordionnesting2Example1&quot; data-bs-parent=&quot;#accordionnesting2&quot;&gt;
      &lt;div class=&quot;accordion-body&quot;&gt;
          When you are in need of finding a specific subscriber, you will want to use the help of SlickText's search navigation tool, located under the Contacts tab of your Slicktext account. Once here, you will have options to sort by, filter, and search your contacts.
          &lt;div class=&quot;accordion nesting4-accordion custom-accordionwithicon accordion-border-box mt-3&quot; id=&quot;accordionnesting4&quot;&gt;
              &lt;div class=&quot;accordion-item&quot;&gt;
                  &lt;h2 class=&quot;accordion-header&quot; id=&quot;accordionnesting4Example2&quot;&gt;
                      &lt;button class=&quot;accordion-button collapsed&quot; type=&quot;button&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#accor_nesting4Examplecollapse2&quot; aria-expanded=&quot;false&quot; aria-controls=&quot;accor_nesting4Examplecollapse2&quot;&gt;
                          How do I reset my digital tide watch ?
                      &lt;/button&gt;
                  &lt;/h2&gt;
                  &lt;div id=&quot;accor_nesting4Examplecollapse2&quot; class=&quot;accordion-collapse collapse&quot; aria-labelledby=&quot;accordionnesting4Example2&quot; data-bs-parent=&quot;#accordionnesting4&quot;&gt;
                      &lt;div class=&quot;accordion-body&quot;&gt;
                          Opting out a subscriber will allow SlickText to maintain the history of the subscriber as it pertains to the textword you are opting them out of. If this user was to text to join again, the initial text they are met with will be a &quot;welcome back&quot; message instead of the auto reply.
                      &lt;/div&gt;
                  &lt;/div&gt;
              &lt;/div&gt;
          &lt;/div&gt;
      &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;div class=&quot;accordion-item&quot;&gt;
  &lt;h2 class=&quot;accordion-header&quot; id=&quot;accordionnesting2Example2&quot;&gt;
      &lt;button class=&quot;accordion-button collapsed&quot; type=&quot;button&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#accor_nesting2Examplecollapse2&quot; aria-expanded=&quot;false&quot; aria-controls=&quot;accor_nesting2Examplecollapse2&quot;&gt;
          How Do I Delete a Contact From My List?
      &lt;/button&gt;
  &lt;/h2&gt;
  &lt;div id=&quot;accor_nesting2Examplecollapse2&quot; class=&quot;accordion-collapse collapse&quot; aria-labelledby=&quot;accordionnesting2Example2&quot; data-bs-parent=&quot;#accordionnesting2&quot;&gt;
      &lt;div class=&quot;accordion-body&quot;&gt;
          Opting out a subscriber will allow SlickText to maintain the history of the subscriber as it pertains to the textword you are opting them out of. If this user was to text to join again, the initial text they are met with will be a &quot;welcome back&quot; message instead of the auto reply.
      &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;


&lt;div class=&quot;accordion-item&quot;&gt;
&lt;h2 class=&quot;accordion-header&quot; id=&quot;accordionnestingExample2&quot;&gt;
&lt;button class=&quot;accordion-button collapsed&quot; type=&quot;button&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#accor_nestingExamplecollapse2&quot; aria-expanded=&quot;false&quot; aria-controls=&quot;accor_nestingExamplecollapse2&quot;&gt;
How Does Personalization Work?
&lt;/button&gt;
&lt;/h2&gt;
&lt;div id=&quot;accor_nestingExamplecollapse2&quot; class=&quot;accordion-collapse collapse&quot; aria-labelledby=&quot;accordionnestingExample2&quot; data-bs-parent=&quot;#accordionnesting&quot;&gt;
&lt;div class=&quot;accordion-body&quot;&gt;
Personalization allows you to provide a personal touch to your outbound text marketing campaigns. SlickText uses merge tags as placeholders that are replaced with contact-specific information when a text message is sent. These merge tags may also be known as personalization fields.
&lt;div class=&quot;accordion nesting3-accordion custom-accordionwithicon accordion-border-box mt-3&quot; id=&quot;accordionnesting3&quot;&gt;
&lt;div class=&quot;accordion-item mt-2&quot;&gt;
  &lt;h2 class=&quot;accordion-header&quot; id=&quot;accordionnesting3Example2&quot;&gt;
      &lt;button class=&quot;accordion-button collapsed&quot; type=&quot;button&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#accor_nesting3Examplecollapse2&quot; aria-expanded=&quot;false&quot; aria-controls=&quot;accor_nesting3Examplecollapse2&quot;&gt;
          Howe does temperature impact my watch?
      &lt;/button&gt;
  &lt;/h2&gt;
  &lt;div id=&quot;accor_nesting3Examplecollapse2&quot; class=&quot;accordion-collapse collapse&quot; aria-labelledby=&quot;accordionnesting3Example2&quot; data-bs-parent=&quot;#accordionnesting3&quot;&gt;
      &lt;div class=&quot;accordion-body&quot;&gt;
          Opting out a subscriber will allow SlickText to maintain the history of the subscriber as it pertains to the textword you are opting them out of. If this user was to text to join again, the initial text they are met with will be a &quot;welcome back&quot; message instead of the auto reply.
      &lt;/div&gt;
  &lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;

&lt;div class=&quot;accordion-item&quot;&gt;
&lt;h2 class=&quot;accordion-header&quot; id=&quot;accordionnestingExample3&quot;&gt;
&lt;button class=&quot;accordion-button collapsed&quot; type=&quot;button&quot; data-bs-toggle=&quot;collapse&quot; data-bs-target=&quot;#accor_nestingExamplecollapse3&quot; aria-expanded=&quot;false&quot; aria-controls=&quot;accor_nestingExamplecollapse3&quot;&gt;
What Happens When I Run Out of Messages?
&lt;/button&gt;
&lt;/h2&gt;
&lt;div id=&quot;accor_nestingExamplecollapse3&quot; class=&quot;accordion-collapse collapse&quot; aria-labelledby=&quot;accordionnestingExample3&quot; data-bs-parent=&quot;#accordionnesting&quot;&gt;
&lt;div class=&quot;accordion-body&quot;&gt;
When you run out of messages, you will not be able to send any outbound campaigns. This would include any scheduled messages, drip campaigns, and birthday messages. However, we will continue to deliver your auto-reply messages to allow your subscriber list to continue to grow.
&lt;/div&gt;
&lt;/div&gt;
&lt;/div&gt;
&lt;/b-accordion &gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-xl-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Accordions Fill Colored</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="accordion-fill-color-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="accordion-fill-color-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use <code>accordion-fill-</code> class with modifier class to the
              color accordion.
            </p>
            <div class="live-preview">
              <div class="row">
                <div class="col-xxl-6">
                  <div
                    class="
                      accordion
                      custom-accordionwithicon
                      accordion-fill-success
                    "
                    id="accordionFill"
                  >
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="accordionFillExample1">
                        <button
                          class="accordion-button"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accor_fill1"
                          aria-expanded="true"
                          aria-controls="accor_fill1"
                        >
                          What are webhooks?
                        </button>
                      </h2>
                      <div
                        id="accor_fill1"
                        class="accordion-collapse collapse show"
                        aria-labelledby="accordionFillExample1"
                        data-bs-parent="#accordionFill"
                      >
                        <div class="accordion-body">
                          Webhooks allow you to gather real time data on key
                          interactions that happen with your Slick Text account.
                          Simply provide us with a url where you'd like the data
                          to be sent, choose which events you'd like to be
                          informed of, and click save.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="accordionFillExample2">
                        <button
                          class="accordion-button collapsed"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accor_fill2"
                          aria-expanded="false"
                          aria-controls="accor_fill2"
                        >
                          Where can I find my Textword ID?
                        </button>
                      </h2>
                      <div
                        id="accor_fill2"
                        class="accordion-collapse collapse"
                        aria-labelledby="accordionFillExample2"
                        data-bs-parent="#accordionFill"
                      >
                        <div class="accordion-body">
                          Head over to the Textwords page. Click options on the
                          right hand side, and then click Settings. This will
                          redirect you to your Textword Setting page. Now, go
                          check your url, and the textword ID will be the number
                          after "word=". Too much or too little spacing, as in
                          the example below.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="accordionFillExample3">
                        <button
                          class="accordion-button collapsed"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accor_fill3"
                          aria-expanded="false"
                          aria-controls="accor_fill3"
                        >
                          Where is your API documentation?
                        </button>
                      </h2>
                      <div
                        id="accor_fill3"
                        class="accordion-collapse collapse"
                        aria-labelledby="accordionFillExample3"
                        data-bs-parent="#accordionFill"
                      >
                        <div class="accordion-body">
                          You always want to make sure that your fonts work well
                          together and try to limit the number of fonts you use
                          to three or less. Experiment and play around with the
                          fonts that you already have in the software you’re
                          working with reputable font websites.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end col-->
                <div class="col-xxl-6">
                  <div
                    class="
                      accordion
                      custom-accordionwithicon
                      accordion-flush accordion-fill-secondary
                    "
                    id="accordionFill2"
                  >
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="accordionFill2Example1">
                        <button
                          class="accordion-button"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accor_fill21"
                          aria-expanded="true"
                          aria-controls="accor_fill21"
                        >
                          How Does Age Verification Work?
                        </button>
                      </h2>
                      <div
                        id="accor_fill21"
                        class="accordion-collapse collapse show"
                        aria-labelledby="accordionFill2Example1"
                        data-bs-parent="#accordionFill2"
                      >
                        <div class="accordion-body">
                          Food truck fixie locavore, accusamus mcsweeney's marfa
                          nulla single-origin coffee squid. Exercitation +1
                          labore velit, blog sartorial PBR leggings next level
                          wes anderson artisan four loko farm-to-table craft
                          beer twee. commodo enim craft beer mlkshk aliquip jean
                          shorts ullamco ad vinyl cillum PBR.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="accordionFill2Example2">
                        <button
                          class="accordion-button collapsed"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accor_fill22"
                          aria-expanded="false"
                          aria-controls="accor_fill22"
                        >
                          What Kind of List Growth Should I Expect?
                        </button>
                      </h2>
                      <div
                        id="accor_fill22"
                        class="accordion-collapse collapse"
                        aria-labelledby="accordionFill2Example2"
                        data-bs-parent="#accordionFill2"
                      >
                        <div class="accordion-body">
                          Consistency is the one thing that can take all of the
                          different elements in your design, and tie them all
                          together and make them work. In an awareness campaign,
                          it is vital for people to begin put 2 and 2 together
                          and begin to recognize your cause. Consistency piques
                          people’s interest.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="accordionFill2Example3">
                        <button
                          class="accordion-button collapsed"
                          type="button"
                          data-bs-toggle="collapse"
                          data-bs-target="#accor_fill23"
                          aria-expanded="false"
                          aria-controls="accor_fill23"
                        >
                          How Do I Delete a Contact From My List?
                        </button>
                      </h2>
                      <div
                        id="accor_fill23"
                        class="accordion-collapse collapse"
                        aria-labelledby="accordionFill2Example3"
                        data-bs-parent="#accordionFill2"
                      >
                        <div class="accordion-body">
                          Cras ultricies mi eu turpis hendrerit fringilla.
                          Vestibulum ante ipsum primis in faucibus orci luctus
                          et ultrices posuere cubilia Curae; In ac dui quis mi
                          consectetuer lacinia. Nam pretium turpis et arcu arcu
                          tortor, suscipit eget, imperdiet nec, imperdiet
                          iaculis aliquam ultrices mauris.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!--end col-->
              </div>
              <!--end row-->
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Accordions Fill Colored --&gt;
&lt;b-accordion  class=&quot;custom-accordionwithicon accordion-fill-success&quot; id=&quot;accordionFill&quot;&gt;

&lt;b-accordion-item title="How Does Age Verification Work?" visible&gt;
Food truck fixie locavore, accusamus mcsweeney's marfa
nulla single-origin coffee squid. Exercitation +1
labore velit, blog sartorial PBR leggings next level
wes anderson artisan four loko farm-to-table craft
beer twee. commodo enim craft beer mlkshk aliquipjean
shorts ullamco ad vinyl cillum PBR.
 &lt;/b-accordion-item&gt;

&lt;b-accordion-item title="What Kind of List Growth Should I Expect?" visible&gt;
Consistency is the one thing that can take all of the
different elements in your design, and tie them all
together and make them work. In an awarenesscampaign,
it is vital for people to begin put 2 and 2 together
and begin to recognize your cause. Consistency piques
people’s interest.
 &lt;/b-accordion-item&gt;

&lt;b-accordion-item title="How Do I Delete a Contact From My List?" visible&gt;
Cras ultricies mi eu turpis hendrerit fringilla.
Vestibulum ante ipsum primis in faucibus orci luctus
et ultrices posuere cubilia Curae; In ac dui quis mi
consectetuer lacinia. Nam pretium turpis et arcu arcu
tortor, suscipit eget, imperdiet nec, imperdiet
iaculis aliquam ultrices mauris.
 &lt;/b-accordion-item&gt;

&lt;/b-accordion &gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Collapse Example</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label for="collapse-showcode" class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="collapse-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              You can use a link with the <code>href</code> attribute, or a
              button with the <code>data-bs-target</code> attribute. In both
              cases, the <code>data-bs-toggle="collapse"</code> is required.
            </p>
            <div class="live-preview">
              <div class="hstack gap-2 flex-wrap mb-3">
                <a
                  class="btn btn-primary"
                  data-bs-toggle="collapse"
                  href="#collapseExample"
                  role="button"
                  aria-expanded="true"
                  aria-controls="collapseExample"
                >
                  Link with href
                </a>
                <button
                  class="btn btn-primary"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseExample"
                  aria-expanded="false"
                  aria-controls="collapseExample"
                >
                  Button with data-bs-target
                </button>
              </div>
              <div class="collapse show" id="collapseExample">
                <div class="card mb-0">
                  <div class="card-body">
                    When designing, the goal is to draw someone’s attention and
                    portray to them what you’re trying to say. You can make a
                    big statement by using little tricks, like this one. Use
                    contrasting fonts. you can use a bold sanserif font with a
                    cursive.
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Collapse Example --&gt;

&lt;div class=&quot;hstack gap-2 flex-wrap mb-3&quot;&gt;
&lt;a class=&quot;btn btn-primary&quot; v-b-toggle=&quot;collapseExample&quot;&gt;
Link with href
&lt;/a&gt;
&lt;b-button variant="primary" v-b-toggle=&quot;collapseExample&quot;&gt;
Button with data-bs-target
&lt;/b-button&gt;
&lt;/div&gt;

&lt;b-collapse id=&quot;collapseExample&quot;&gt;
&lt;b-card class=&quot;mb-0&quot;&gt;
&lt;b-card no-body&gt;
When designing, the goal is to draw someone’s attention and portray to them what you’re trying to say. You can make a big statement by using little tricks, like this one. Use contrasting fonts. you can use a bold sanserif font with a cursive.
&lt;/b-card&gt;
&lt;/b-card&gt;
&lt;/b-collapse&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Horizontal Collapse</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="horizontal-collapse-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="horizontal-collapse-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Use the <code>collapse-horizontal</code> class to transition the
              <code>width</code> instead of <code>height</code> and set a
              <code>width</code> on the immediate child element for horizontal
              collapse.
            </p>
            <div class="live-preview">
              <div class="mb-3">
                <button
                  class="btn btn-primary"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseWidthExample"
                  aria-expanded="true"
                  aria-controls="collapseWidthExample"
                >
                  Toggle Width Collapse
                </button>
              </div>
              <div>
                <div
                  class="collapse collapse-horizontal show"
                  id="collapseWidthExample"
                >
                  <div class="card card-body mb-0" style="width: 300px">
                    This is some placeholder content for a horizontal collapse.
                    It's hidden by default and shown when triggered.
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Horizontal Collapse --&gt;
&lt;div class=&quot;mb-3&quot;&gt;
&lt;b-button variant=&quot;primary&quot; v-b-toggle=&quot;collapseWidthExample&quot;&gt;
Toggle width collapse
&lt;/b-button&gt;
&lt;/div&gt;

&lt;div&gt;
&lt;b-collapse class=&quot;collapse-horizontal show&quot; id=&quot;collapseWidthExample&quot;&gt;
&lt;b-card no-body class=&quot;mb-0&quot; style=&quot;width: 300px;&quot;&gt;
This is some placeholder content for a horizontal collapse. It's hidden by default and shown when triggered.
&lt;/b-card&gt;
&lt;/b-collapse&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">Collapse with Icon</h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="collapse-icon-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="collapse-icon-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Here is the example of collapse in which the icon is wrapped
              within the button collapse toggle.
            </p>
            <div class="live-preview">
              <div class="hstack gap-3 mb-3">
                <a
                  class="link-success"
                  data-bs-toggle="collapse"
                  href="#collapseWithicon"
                  role="button"
                  aria-expanded="true"
                  aria-controls="collapseWithicon"
                >
                  <i class="ri-arrow-down-circle-line fs-16"></i>
                </a>
                <button
                  class="btn btn-light"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseWithicon2"
                  aria-expanded="false"
                  aria-controls="collapseWithicon2"
                >
                  <i class="ri-filter-2-line"></i>
                </button>
              </div>
              <div class="collapse show" id="collapseWithicon">
                <div class="card mb-0">
                  <div class="card-body">
                    If you enter text including symbols in the search criteria,
                    the search criteria is interpreted exactly as you entered
                    it, and the search is case sensitive as a case insensitive
                    search that contains certain text but does also provide a
                    lot of search criteria options.
                  </div>
                </div>
              </div>
              <div class="collapse" id="collapseWithicon2">
                <div class="card mb-0 mt-3">
                  <div class="card-body">
                    When you want to search for data, such as customer names,
                    addresses, or product groups, you enter criteria. In search
                    criteria you can use all the numbers and letters that you
                    normally use in the specific field. In addition, you can use
                    special symbols to further filter the results.
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Collapse with Icon --&gt;
&lt;div class=&quot;hstack gap-3 mb-3&quot;&gt;
&lt;a class=&quot;link-success&quot; v-b-toggle=&quot;#collapseWithicon&quot; role=&quot;button&quot;&gt;
&lt;i class=&quot;ri-arrow-down-circle-line fs-16&quot;&gt;&lt;/i&gt;
&lt;/a&gt;
&lt;b-button variant=&quot;light&quot; v-b-toggle=&quot;collapseWithicon2&quot;&gt;
&lt;i class=&quot;ri-filter-2-line&quot;&gt;&lt;/i&gt;
&lt;/b-button&gt;
&lt;/div&gt;
&lt;b-collapse&quot; id=&quot;collapseWithicon&quot;&gt;
&lt;b-card class=&quot;mb-0&quot;&gt;
&lt;b-card no-body class=&quot;card-body&quot;&gt;
If you enter text including symbols in the search criteria, the search criteria is interpreted exactly as you entered it, and the search is case sensitive as a case insensitive search that contains certain text but does also provide a lot of search criteria options.
&lt;/b-card&gt;
&lt;/b-card&gt;
&lt;/b-collapse&gt;
&lt;b-collapse id=&quot;collapseWithicon2&quot;&gt;
&lt;b-card class=&quot;mb-0&quot;&gt;
&lt;b-card no-body&gt;
When you want to search for data, such as customer names, addresses, or product groups, you enter criteria. In search criteria you can use all the numbers and letters that you normally use in the specific field. In addition, you can use special symbols to further filter the results.
&lt;/b-card&gt;
&lt;/b-card&gt;
&lt;/B-collapse&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
      <div class="col-xxl-6">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">
              Inline & Block Element Collapse
            </h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="inline-block-collapse-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="inline-block-collapse-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              Inline element collapse takes all horizontal space hence you can
              activate the collapse within by clicking on full-width horizontal
              space. Block element collapse can be activated by clicking on
              collapse toggle only.
            </p>
            <div class="live-preview">
              <div class="mb-3">
                <h6
                  class="text-primary"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseblock"
                  aria-expanded="true"
                  aria-controls="collapseblock"
                >
                  <code>&lt;h6&gt;</code> Inline Element Collapse
                </h6>
                <span
                  role="button"
                  class="text-primary fw-medium"
                  data-bs-toggle="collapse"
                  data-bs-target="#collapseinline"
                  aria-expanded="true"
                  aria-controls="collapseinline"
                >
                  <code>&lt;span&gt;</code> Block Element Collapse
                </span>
              </div>
              <div class="row g-2">
                <div class="col-auto">
                  <div
                    class="collapse collapse-horizontal show"
                    id="collapseblock"
                  >
                    <div class="card card-body mb-0" style="width: 300px">
                      A wonderful serenity has taken possession of my entire
                      soul, like these sweet mornings of spring heart.
                    </div>
                  </div>
                </div>
                <!--end col-->
                <div class="col-auto">
                  <div
                    class="collapse collapse-horizontal show"
                    id="collapseinline"
                  >
                    <div class="card card-body mb-0" style="width: 300px">
                      When you have created a new account schedule and set up
                      the rows, you must set up columns.
                    </div>
                  </div>
                </div>
                <!--end col-->
              </div>
              <!--end row-->
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Inline & Block Element Collapse --&gt;
&lt;div class=&quot;mb-3&quot;&gt;
&lt;h6 class=&quot;text-primary&quot; v-b-toggle=&quot;collapseblock&quot;&gt;
&lt;h6&gt; Inline Element Collapse
&lt;/h6&gt;
&lt;span class=&quot;text-primary fw-medium&quot; v-b-toggle=&quot;collapseinline&quot;&gt;
&lt;span&gt; Block Element Collapse
&lt;/span&gt;
&lt;/div&gt;
&lt;div class=&quot;row&quot;&gt;
&lt;div class=&quot;col-lg-6&quot;&gt;
&lt;b-collapse class=&quot;collapse-horizontal show&quot; id=&quot;collapseblock&quot;&gt;
&lt;b-card no-body class=&quot;mb-0&quot; style=&quot;width: 300px;&quot;&gt;
A wonderful serenity has taken possession of my entire soul, like these sweet mornings of spring heart.
&lt;/b-card&gt;
&lt;/b-collapse&gt;
&lt;/div&gt;
&lt;div class=&quot;col-lg-6&quot;&gt;
&lt;b-collapse class=&quot;collapse-horizontal show&quot; id=&quot;collapseinline&quot;&gt;
&lt;b-card no-body class=&quot;=mb-0&quot; style=&quot;width: 300px;&quot;&gt;
When you have created a new account schedule and set up the rows, you must set up columns.
&lt;/b-card&gt;
&lt;/b-collapse&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
          </div>
          <!-- end card-body -->
        </div>
        <!-- end card -->
      </div>
      <!--end col-->
    </div>
    <!--end row-->

    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1">
              Multiple Targets Collapse
            </h4>
            <div class="flex-shrink-0">
              <div
                class="form-check form-switch form-switch-right form-switch-md"
              >
                <label
                  for="multiple-collapse-showcode"
                  class="form-label text-muted"
                  >Show Code</label
                >
                <input
                  class="form-check-input code-switcher"
                  type="checkbox"
                  id="multiple-collapse-showcode"
                />
              </div>
            </div>
          </div>
          <!-- end card header -->
          <div class="card-body">
            <p class="text-muted">
              A <code>&lt;button&gt;</code> or <code>&lt;a&gt;</code> can show
              and hide multiple elements by referencing them with a selector in
              its href or data-bs-target attribute. Multiple
              <code>&lt;button&gt;</code> or <code>&lt;a&gt;</code> can show and
              hide an element if they each reference it with their href or
              data-bs-target attribute.
            </p>
            <div class="live-preview">
              <div class="hstack gap-2 flex-wrap mb-3">
                <a
                  class="btn btn-primary"
                  data-bs-toggle="collapse"
                  href="#multiCollapseExample1"
                  role="button"
                  aria-expanded="false"
                  aria-controls="multiCollapseExample1"
                  >Toggle First Element</a
                >
                <button
                  class="btn btn-primary"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target="#multiCollapseExample2"
                  aria-expanded="false"
                  aria-controls="multiCollapseExample2"
                >
                  Toggle Second Element
                </button>
                <button
                  class="btn btn-primary"
                  type="button"
                  data-bs-toggle="collapse"
                  data-bs-target=".multi-collapse"
                  aria-expanded="false"
                  aria-controls="multiCollapseExample1 multiCollapseExample2"
                >
                  Toggle Both Elements
                </button>
              </div>
              <div class="row">
                <div class="col">
                  <div
                    class="collapse multi-collapse show"
                    id="multiCollapseExample1"
                  >
                    <div class="card card-body mb-0">
                      Some placeholder content for the first collapse component
                      of this multi-collapse example. This panel is hidden by
                      default but revealed when the user activates the relevant
                      trigger.
                    </div>
                  </div>
                </div>
                <div class="col">
                  <div
                    class="collapse multi-collapse show"
                    id="multiCollapseExample2"
                  >
                    <div class="card card-body mb-0">
                      Some placeholder content for the second collapse component
                      of this multi-collapse example. This panel is hidden by
                      default but revealed when the user activates the relevant
                      trigger.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="d-none code-view">
              <pre class="language-markup" style="height: 275px">
<code>&lt;!-- Multiple Targets Example --&gt;
&lt;div class=&quot;hstack gap-2 flex-wrap mb-3&quot;&gt;
&lt;a class=&quot;btn btn-primary&quot; data-bs-toggle=&quot;collapse&quot; href=&quot;#multiCollapseExample1&quot; role=&quot;button&quot;&gt;Toggle first element&lt;/a&gt;
&lt;b-button variant=&quot;primary&quot; v-b-toggle=&quot;multiCollapseExample2&quot;&gt;Toggle second element&lt;/b-button&gt;
&lt;b-button variant=&quot;primary&quot; v-b-toggle=&quot;multi-collapse&quot;&gt;Toggle both elements&lt;/b-button&gt;
&lt;/div&gt;

&lt;div class=&quot;row&quot;&gt;
&lt;div class=&quot;col&quot;&gt;
&lt;b-collapse class=&quot;multi-collapse show&quot; id=&quot;multiCollapseExample1&quot;&gt;
&lt;b-card no-body class=&quot;mb-0&quot;&gt;
Some placeholder content for the first collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
&lt;/b-card&gt;
&lt;/b-collapse&gt;
&lt;/div&gt;
&lt;div class=&quot;col&quot;&gt;
&lt;b-collapse class=&quot;multi-collapse show&quot; id=&quot;multiCollapseExample2&quot;&gt;
&lt;b-card no-body class=&quot;card card-body mb-0&quot;&gt;
Some placeholder content for the second collapse component of this multi-collapse example. This panel is hidden by default but revealed when the user activates the relevant trigger.
&lt;/b-card&gt;
&lt;/b-collapse&gt;
&lt;/div&gt;
&lt;/div&gt;</code></pre>
            </div>
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
