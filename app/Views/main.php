  <?= $this->extend($config->viewLayout) ?>
  
  <?= $this->section('pageScripts') ?>
  <script src="<?= base_url() ?>/assets/vendor/lightgallery.js/dist/js/lightgallery.min.js"/>

    <script src="<?= base_url("assets/vendor/jarallax/dist/jarallax.min.js") ?>" ></script>
    <script src="<?= base_url("assets/vendor/jarallax/dist/jarallax-element.min.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/%40lottiefiles/lottie-player/dist/lottie-player.js") ?>"></script>
    <script src="<?= base_url("assets/vendor/swiper/swiper-bundle.min.js") ?>"></script>
		<script src="<?= base_url("assets/js/app/main.vue.js") ?>"></script>
  <?= $this->endSection() ?> 
  
  <?= $this->section('main') ?>
    <!-- Page wrapper for sticky footer -->
    <!-- Wraps everything except footer to push footer to the bottom of the page if there is little content -->
    
      <!-- Navbar -->
     
      <!-- Hero -->
      <section class="jarallax position-relative d-flex align-items-center min-vh-100 bg-light mb-5 py-lg-5 pt-5" style="background-image: url(<?= base_url() ?>/assets/img/landing/digital-agency/hero-bg.svg);" data-jarallax data-img-position="0% 100%" data-speed="0.5">
        <div class="container position-relative zindex-5 py-5">
          <div class="row justify-content-md-start justify-content-center">
            <div class="col-md-6 col-sm-8 order-md-1 order-2 d-flex flex-column justify-content-between mt-4 pt-2 text-md-start text-center">
              <div class="mb-md-5 pb-xl-5 mb-4">

                <!-- Video popup btn -->
                <div class="d-inline-flex align-items-center position-relative mb-3">
                  <a href="<?=base_url("uploads/puppy12344.mp4")?>" class="btn btn-video btn-icon btn-lg flex-shrink-0 me-3 stretched-link" data-bs-toggle="video">
                    <i class="bx bx-play"></i>
                  </a>
                  <h4 class="mb-0">Digital Pet Shop</h4>
                </div>

                <!-- Text -->
                <h1 class="display-2 mb-md-5 mb-3 pb-3">
                  We give you <span class="text-gradient-primary">the best</span> of pets
                </h1>
                <div class="d-md-flex align-items-md-start">
                  <a href="contacts-v1.html" class="btn btn-lg btn-primary flex-shrink-0 me-md-4 mb-md-0 mb-sm-4 mb-3">Work with us</a>
                  <p class="d-lg-block d-none mb-0 ps-md-3"><?=APP_NAME?> is a leading full-service digital pet shop based in Lagos. We'll bring your pet to your doorstep.</p>
                </div>
              </div>

              <!-- Scroll down btn -->
              <div class="d-inline-flex align-items-center justify-content-center justify-content-md-start position-relative">
                <a href="#benefits" data-scroll data-scroll-offset="100" class="btn btn-video btn-icon rounded-circle shadow-sm flex-shrink-0 stretched-link me-3">
                  <i class="bx bx-chevron-down"></i>
                </a>
                <span class="fs-sm">Discover more</span>
              </div>
            </div>

            <!-- Animated gfx -->
            <div class="col-sm-6 col-sm-6 col-9 order-md-2 order-1">
              <lottie-player class="mx-auto" src="<?= base_url() ?>/assets/json/animation-digital-agency.json" background="transparent" speed="1" loop autoplay></lottie-player>
            </div>
          </div>
        </div>
      </section>
      
      <!-- Benefits (features) -->
      <section class="container mb-5 pt-lg-5" id="benefits">
        <div class="swiper pt-3" data-swiper-options='{
          "slidesPerView": 1,
          "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
          },
          "breakpoints": {
            "500": {
              "slidesPerView": 2
            },
            "991": {
              "slidesPerView": 3
            }
          }
        }'>
          <div class="swiper-wrapper">

            <!-- Item -->
            <div class="swiper-slide border-end-lg px-2">
              <div class="text-center">
                <img src="<?= base_url() ?>/assets/img/landing/digital-agency/icons/idea.svg" width="48" alt="Bulb icon" class="d-block mb-4 mx-auto">
                <h4 class="mb-2 pb-1">Healthy Diet</h4>
                <p class="mx-auto" style="max-width: 336px;">Healthy diet solutions are available on reguest.</p>
              </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide border-end-lg px-2">
              <div class="text-center">
                <img src="<?= base_url() ?>/assets/img/landing/digital-agency/icons/award.svg" width="48" alt="Award icon" class="d-block mb-4 mx-auto">
                <h4 class="mb-2 pb-1">Healthy Pets</h4>
                <p class="mx-auto" style="max-width: 336px;">Intensive care to ensure good health is given.</p>
              </div>
            </div>

            <!-- Item -->
            <div class="swiper-slide px-2">
              <div class="text-center">
                <img src="<?= base_url() ?>/assets/img/landing/digital-agency/icons/team.svg" width="48" alt="Team icon" class="d-block mb-4 mx-auto">
                <h4 class="mb-2 pb-1">Team of Professionals Vets</h4>
                <p class="mx-auto" style="max-width: 336px;">A team of professionals always available to carter for the health of the fur babies.</p>
              </div>
            </div>
          </div>

          <!-- Pagination (bullets) -->
          <div class="swiper-pagination position-relative pt-2 pt-sm-3 mt-4"></div>
        </div>
      </section>

      <!-- Featured pets -->
      <section class="container mb-5 pt-lg-2 pt-xl-4 pb-2 pb-md-3 pb-lg-5">
        <h2 class="h1 mb-4 text-center">Latest Posts</h2>
        <p class="mb-4 mx-auto pb-3 fs-lg text-center" style="max-width: 636px;">We create websites and mobile apps, marketing materials, branding, web design, UX/UI design and illustrations.</p>

        <!-- Portfolio grid -->
        <div v-if="latest" class="masonry-grid row g-md-4 g-3 mb-4">

          <!-- Item -->
          <div class="masonry-grid-item col-md-4 col-sm-6 col-12">
            <a :href="'<?= base_url("app/puppies/") ?>'+latest[0].id" class="card card-portfolio card-hover bg-transparent border-0">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 rounded-3"></span>
                <div class="position-relative zindex-2">
                  <h3 class="h5 text-light mb-2">{{latest[0].name}}</h3>
                  <span class="fs-sm text-light opacity-70">{{latest[0].breed}}</span>
                </div>
              </div>
              <div class="card-img">
                <img src="<?= base_url() ?>/assets/img/portfolio/grid/07.jpg" class="rounded-3" alt="Image">
              </div>
            </a>
          </div>
          <div class="masonry-grid-item col-md-4 col-sm-6 col-12">
            <a :href="'<?= base_url("app/puppies/") ?>'+latest[1].id" class="card card-portfolio card-hover bg-transparent border-0">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 rounded-3"></span>
                <div class="position-relative zindex-2">
                  <h3 class="h5 text-light mb-2">{{latest[1].name}}</h3>
                  <span class="fs-sm text-light opacity-70">{{latest[1].breed}}</span>
                </div>
              </div>
              <div class="card-img">
                <img src="<?= base_url() ?>/assets/img/portfolio/grid/07.jpg" class="rounded-3" alt="Image">
              </div>
            </a>
          </div>
          <div class="masonry-grid-item col-md-4 col-sm-6 col-12">
            <a :href="'<?= base_url("app/puppies/") ?>'+latest[2].id" class="card card-portfolio card-hover bg-transparent border-0">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 rounded-3"></span>
                <div class="position-relative zindex-2">
                  <h3 class="h5 text-light mb-2">{{latest[2].name}}</h3>
                  <span class="fs-sm text-light opacity-70">{{latest[2].breed}}</span>
                </div>
              </div>
              <div class="card-img">
                <img src="<?= base_url() ?>/assets/img/portfolio/grid/07.jpg" class="rounded-3" alt="Image">
              </div>
            </a>
          </div>

          
          <!-- Item -->
          <div class="masonry-grid-item col-md-8 col-12">
            <a href="portfolio-single-project.html" class="card card-portfolio card-hover bg-transparent border-0">
              <div class="card-img-overlay d-flex flex-column align-items-center justify-content-center rounded-3">
                <span class="position-absolute top-0 start-0 w-100 h-100 bg-dark opacity-50 rounded-3"></span>
                <div class="position-relative zindex-2">
                  <h3 class="h5 text-light mb-2">{{latest[3].name}}</h3>
                  <span class="fs-sm text-light opacity-70">{{latest[3].breed}}</span>
                </div>
              </div>
              <div class="card-img">
                <img src="<?= base_url() ?>/assets/img/portfolio/grid/10.jpg" class="rounded-3" alt="Image">
              </div>
            </a>
          </div>
        </div>

        <div class="pt-md-3 pt-2 text-center">
          <a href="<?=base_url("app/puppies")?>" class="btn btn-lg btn-primary w-sm-auto w-100">Explore all</a>
        </div>
      </section>

      <!-- Services -->
      <section class="container mb-5 pb-2 pb-md-4 pb-lg-5">
        <div class="card border-0 bg-secondary p-md-5 px-sm-2 pt-4 pb-3">
          <div class="card-body mx-auto" style="max-width: 860px;">
            <h2 class="h1 mb-4 text-center">Our Competencies</h2>
            <p class="mb-4 pb-3 fs-lg text-center text-muted">We fully understand your business. If you need to update something, we are more than happy to help you with the services we are providing.</p>

            <!-- Accordion: Alternative style -->
            <div class="accordion" id="accordion-services">

              <!-- Item -->
              <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                <h3 class="accordion-header" id="heading-1">
                  <button class="accordion-button fs-xl shadow-none rounded-3" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-1" aria-expanded="true" aria-controls="collapse-1">Digital Marketing</button>
                </h3>
                <div class="accordion-collapse collapse show" id="collapse-1" aria-labelledby="heading-1" data-bs-parent="#accordion-services">
                  <div class="accordion-body pt-0">
                    <div class="d-flex flex-md-row flex-column align-items-md-center">
                      <img src="<?= base_url() ?>/assets/img/landing/digital-agency/services/01.png" width="200" alt="Digital Marketing" class="me-md-4 mb-md-0 mb-3">
                      <div class="ps-md-3">
                        <p class="mb-0">Nisi, sed accumsan tincidunt pulvinar sapien. Neque, adipiscing posuere amet eget cursus mattis egestas nec quam. Tellus in lectus volutpat tellus bibendum. Etiam id phasellus in proin tristique. Semper habitasse volutpat et urna dui sed in pellentesque purus. Convallis viverra faucibus lacus nunc venenatis.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                <h3 class="accordion-header" id="heading-2">
                  <button class="accordion-button fs-xl shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-2" aria-expanded="true" aria-controls="collapse-2">Web Development</button>
                </h3>
                <div class="accordion-collapse collapse" id="collapse-2" aria-labelledby="heading-2" data-bs-parent="#accordion-services">
                  <div class="accordion-body pt-0">
                    <div class="d-flex flex-md-row flex-column align-items-md-center">
                      <img src="<?= base_url() ?>/assets/img/landing/digital-agency/services/02.png" width="200" alt="Web Development" class="me-md-4 mb-md-0 mb-3">
                      <div class="ps-md-3">
                        <p class="mb-0">Vitae varius euismod egestas egestas lacus. Augue vitae arcu sollicitudin metus iaculis amet, eu at amet. Netus pulvinar tristique ridiculus sed. Viverra ut viverra aenean nisl. Tortor lorem cum congue a. Orci mattis massa tortor magna massa nisi, aliquet risus. Ornare cras aenean pellentesque quam pulvinar at. Libero mollis tortor erat sed. Adipiscing lectus nisi commodo vel. Id augue vitae, hendrerit iaculis.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                <h3 class="accordion-header" id="heading-3">
                  <button class="accordion-button fs-xl shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-3" aria-expanded="true" aria-controls="collapse-3">Application Development</button>
                </h3>
                <div class="accordion-collapse collapse" id="collapse-3" aria-labelledby="heading-3" data-bs-parent="#accordion-services">
                  <div class="accordion-body pt-0">
                    <div class="d-flex flex-md-row flex-column align-items-md-center">
                      <img src="<?= base_url() ?>/assets/img/landing/digital-agency/services/03.png" width="200" alt="Application Development" class="me-md-4 mb-md-0 mb-3">
                      <div class="ps-md-3">
                        <p class="mb-0">Morbi tristique justo, ut ac facilisi vel. Faucibus tortor libero commodo maecenas commodo sed. Sapien, vitae senectus turpis enim habitasse ipsum justo. Sagittis vel tortor velit dapibus dictum facilisis dictumst aliquam. Et, tempus euismod non semper vitae egestas semper eget turpis. Eros, pellentesque sed ut faucibus ac egestas leo metus.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                <h3 class="accordion-header" id="heading-4">
                  <button class="accordion-button fs-xl shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-4" aria-expanded="true" aria-controls="collapse-4">Strategy</button>
                </h3>
                <div class="accordion-collapse collapse" id="collapse-4" aria-labelledby="heading-4" data-bs-parent="#accordion-services">
                  <div class="accordion-body pt-0">
                    <div class="d-flex flex-md-row flex-column align-items-md-center">
                      <img src="<?= base_url() ?>/assets/img/landing/digital-agency/services/04.png" width="200" alt="Strategy" class="me-md-4 mb-md-0 mb-3">
                      <div class="ps-md-3">
                        <p class="mb-0">Non bibendum mauris velit at enim. Vel tellus nunc malesuada pellentesque feugiat nibh mauris blandit. Tempus, ut vulputate feugiat quis molestie sit eu blandit rhoncus. Iaculis eget magna sit eget eget massa. Diam nunc dolor tristique lectus imperdiet. Nunc, vitae etiam venenatis arcu turpis sollicitudin amet sit. Ac dapibus non erat sed. Auctor eleifend mattis scelerisque gravida felis nibh. Habitant nascetur turpis ullamcorper.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Item -->
              <div class="accordion-item border-0 rounded-3 shadow-sm mb-3">
                <h3 class="accordion-header" id="heading-5">
                  <button class="accordion-button fs-xl shadow-none rounded-3 collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-5" aria-expanded="true" aria-controls="collapse-5">Digital Advertising</button>
                </h3>
                <div class="accordion-collapse collapse" id="collapse-5" aria-labelledby="heading-5" data-bs-parent="#accordion-services">
                  <div class="accordion-body pt-0">
                    <div class="d-flex flex-md-row flex-column align-items-md-center">
                      <img src="<?= base_url() ?>/assets/img/landing/digital-agency/services/05.png" width="200" alt="Digital Advertising" class="me-md-4 mb-md-0 mb-3">
                      <div class="ps-md-3">
                        <p class="mb-0">Nulla odio diam, arcu dictum neque nec cursus. Vel, aliquam nisl ridiculus sed. Pulvinar lectus ac pellentesque sollicitudin tristique aliquet ullamcorper in eu. Tincidunt porta magna faucibus neque, nunc gravida sagittis. Ut tellus sed odio laoreet. Molestie sit viverra maecenas nisl felis consequat.</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Testimonials slider -->
      <section class="container mb-5 pt-2 pb-3 py-md-4 py-lg-5">
        <h2 class="h1 pb-2 pb-lg-0 mb-4 mb-lg-5 text-center">What They Say About Us</h2>
        <div class="row">
          <div class="col-md-8">
            <div class="card border-0 shadow-sm p-4 p-xxl-5 mb-4 me-xxl-4">

              <!-- Quotation mark -->
              <div class="pb-4 mb-2">
                <span class="btn btn-icon btn-primary btn-lg shadow-primary pe-none">
                  <i class="bx bxs-quote-left"></i>
                </span>
              </div>

              <!-- Slider -->
              <div class="swiper mx-0 mb-md-n2 mb-xxl-n3" data-swiper-options='{
                "spaceBetween": 24,
                "pager": true,
                "loop": true,
                "tabs": true,
                "navigation": {
                  "prevEl": ".page-prev",
                  "nextEl": ".page-next"
                }
              }'>
                <div class="swiper-wrapper">

                  <!-- Item -->
                  <div class="swiper-slide h-auto" data-swiper-tab="#author-1">
                    <figure class="card h-100 position-relative border-0 bg-transparent">
                      <blockquote class="card-body p-0 mb-0">
                        <p class="fs-lg mb-0">Dolor, a eget elementum, integer nulla volutpat, nunc, sit. Quam iaculis varius mauris magna sem. Egestas sed sed suscipit dolor faucibus dui imperdiet at eget. Tincidunt imperdiet quis hendrerit aliquam feugiat neque cras sed. Dictum quam integer volutpat tellus, faucibus platea. Pulvinar turpis proin faucibus at mauris. Sagittis gravida vitae porta enim, nulla arcu fermentum massa. Tortor ullamcorper lacus. Pellentesque lectus adipiscing aenean volutpat tortor habitant.</p>
                      </blockquote>
                      <figcaption class="card-footer border-0 d-sm-flex d-md-none w-100 pb-2">
                        <div class="d-flex align-items-center border-end-sm pe-sm-4 me-sm-2">
                          <img src="<?= base_url() ?>/assets/img/avatar/01.jpg" width="48" class="rounded-circle" alt="Ralph Edwards">
                          <div class="ps-3">
                            <h5 class="fw-semibold lh-base mb-0">Ralph Edwards</h5>
                            <span class="fs-sm text-muted">Head of Marketing</span>
                          </div>
                        </div>
                        <img src="<?= base_url() ?>/assets/img/brands/01.svg" width="160" class="d-block mt-2 ms-5 mt-sm-0 ms-sm-0" alt="Company logo">
                      </figcaption>
                    </figure>
                  </div>

                  <!-- Item -->
                  <div class="swiper-slide h-auto" data-swiper-tab="#author-2">
                    <figure class="card h-100 position-relative border-0 bg-transparent">
                      <blockquote class="card-body p-0 mb-0">
                        <p class="fs-lg mb-0">Mi semper risus ultricies orci pulvinar in at enim orci. Quis facilisis nunc pellentesque in ullamcorper sit. Lorem blandit arcu sapien, senectus libero, amet dapibus cursus quam. Eget pellentesque eu purus volutpat adipiscing malesuada. Purus nisi, tortor vel lacus. Donec diam molestie ultrices vitae eget pulvinar fames. Velit lacus mi purus velit justo, amet. Nascetur lobortis diam, duis orci.</p>
                      </blockquote>
                      <figcaption class="card-footer border-0 d-sm-flex d-md-none w-100 pb-2">
                        <div class="d-flex align-items-center border-end-sm pe-sm-4 me-sm-2">
                          <img src="<?= base_url() ?>/assets/img/avatar/06.jpg" width="48" class="rounded-circle" alt="Annette Black">
                          <div class="ps-3">
                            <h5 class="fw-semibold lh-base mb-0">Annette Black</h5>
                            <span class="fs-sm text-muted">Strategic Advisor</span>
                          </div>
                        </div>
                        <img src="<?= base_url() ?>/assets/img/brands/02.svg" width="160" class="d-block mt-2 ms-5 mt-sm-0 ms-sm-0" alt="Company logo">
                      </figcaption>
                    </figure>
                  </div>

                  <!-- Item -->
                  <div class="swiper-slide h-auto" data-swiper-tab="#author-3">
                    <figure class="card h-100 position-relative border-0 bg-transparent">
                      <blockquote class="card-body p-0 mb-0">
                        <p class="fs-lg mb-0">Ac at sed sit senectus massa. Massa ante amet ultrices magna porta tempor. Aliquet diam in et magna ultricies mi at. Lectus enim, vel enim egestas nam pellentesque et leo. Elit mi faucibus laoreet aliquam pellentesque sed aliquet integer massa. Orci leo tortor ornare id mattis auctor aliquam volutpat aliquet. Odio lectus viverra eu blandit nunc malesuada vitae eleifend pulvinar. In ac fermentum sit in orci.</p>
                      </blockquote>
                      <figcaption class="card-footer border-0 d-sm-flex d-md-none w-100 pb-2">
                        <div class="d-flex align-items-center border-end-sm pe-sm-4 me-sm-2">
                          <img src="<?= base_url() ?>/assets/img/avatar/05.jpg" width="48" class="rounded-circle" alt="Darrell Steward">
                          <div class="ps-3">
                            <h5 class="fw-semibold lh-base mb-0">Darrell Steward</h5>
                            <span class="fs-sm text-muted">Project Manager</span>
                          </div>
                        </div>
                        <img src="<?= base_url() ?>/assets/img/brands/04.svg" width="160" class="d-block mt-2 ms-5 mt-sm-0 ms-sm-0" alt="Company logo">
                      </figcaption>
                    </figure>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pagination (Pager) -->
            <nav class="pagination d-flex justify-content-center justify-content-md-start">
              <div class="page-item me-2">
                <a class="page-link page-prev btn-icon btn-sm" href="#">
                  <i class="bx bx-chevron-left"></i>
                </a>
              </div>
              <ul class="list-unstyled d-flex justify-content-center w-auto mb-0"></ul>
              <div class="page-item ms-2">
                <a class="page-link page-next btn-icon btn-sm" href="#">
                  <i class="bx bx-chevron-right"></i>
                </a>
              </div>
            </nav>
          </div>
          <div class="col-md-4 d-none d-md-block">

            <!-- Swiper tabs (Author images) -->
            <div class="swiper-tabs">

              <!-- Author image 1 -->
              <div id="author-1" class="card bg-transparent border-0 swiper-tab active">
                <div class="card-body p-0 rounded-3 bg-size-cover bg-repeat-0 bg-position-top-center" style="background-image: url(<?= base_url() ?>/assets/img/testimonials/01.jpg);"></div>
                <div class="card-footer d-flex w-100 border-0 pb-0">
                  <img src="<?= base_url() ?>/assets/img/brands/01.svg" width="160" class="d-none d-xl-block" alt="Company logo">
                  <div class="border-start-xl ps-xl-4 ms-xl-2">
                    <h5 class="fw-semibold lh-base mb-0">Ralph Edwards</h5>
                    <span class="fs-sm text-muted">Head of Marketing <span class="d-xl-none d-inline">at Lorem Ltd.</span></span>
                  </div>
                </div>
              </div>

              <!-- Author image 2 -->
              <div id="author-2" class="card bg-transparent border-0 swiper-tab">
                <div class="card-body p-0 rounded-3 bg-size-cover bg-repeat-0 bg-position-top-center" style="background-image: url(<?= base_url() ?>/assets/img/testimonials/02.jpg);"></div>
                <div class="card-footer d-flex w-100 border-0 pb-0">
                  <img src="<?= base_url() ?>/assets/img/brands/02.svg" width="160" class="d-none d-xl-block" alt="Company logo">
                  <div class="border-start-xl ps-xl-4 ms-xl-2">
                    <h5 class="fw-semibold lh-base mb-0">Annette Black</h5>
                    <span class="fs-sm text-muted">Strategic Advisor <span class="d-xl-none d-inline">at Company LLC</span></span>
                  </div>
                </div>
              </div>

              <!-- Author image 3 -->
              <div id="author-3" class="card bg-transparent border-0 swiper-tab">
                <div class="card-body p-0 rounded-3 bg-size-cover bg-repeat-0 bg-position-top-center" style="background-image: url(<?= base_url() ?>/assets/img/testimonials/03.jpg);"></div>
                <div class="card-footer d-flex w-100 border-0 pb-0">
                  <img src="<?= base_url() ?>/assets/img/brands/04.svg" width="160" class="d-none d-xl-block" alt="Company logo">
                  <div class="border-start-xl ps-xl-4 ms-xl-2">
                    <h5 class="fw-semibold lh-base mb-0">Darrell Steward</h5>
                    <span class="fs-sm text-muted">Project Manager <span class="d-xl-none d-inline">at Ipsum Ltd.</span></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Blog + Contact cta -->
      <div class="bg-secondary mb-5 pt-5">

        <!-- Blog -->
        <section class="container mb-5 py-lg-5">
          <h2 class="h1 mb-4 pb-3 text-center">Most Viewed</h2>
          <div class="row">
            <div class="col-lg-5 col-12 mb-lg-0 mb-4">

              <!-- Article -->
              <article class="card h-100 border-0 shadow-sm">
                <div class="position-relative">
                  <a href="blog-single.html" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                  <a href="#" class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
                    <i class="bx bx-bookmark"></i>
                  </a>
                  <img src="<?= base_url() ?>/assets/img/landing/digital-agency/blog/01.jpg" class="card-img-top" alt="Image">
                </div>
                <div class="card-body pb-4">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Digital</a>
                    <span class="fs-sm text-muted">12 hours ago</span>
                  </div>
                  <h3 class="h5 mb-0">
                    <a href="blog-single.html">A study on smartwatch design qualities and people’s preferences</a>
                  </h3>
                </div>
                
              </article>
            </div>
            <div class="col">

              <!-- Article -->
              <article class="card border-0 shadow-sm overflow-hidden mb-4">
                <div class="row g-0">
                  <div class="col-sm-5 position-relative bg-position-center bg-repeat-0 bg-size-cover" style="background-image: url(<?= base_url() ?>/assets/img/landing/digital-agency/blog/02.jpg); min-height: 15rem;">
                    <a href="blog-single.html" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                    <a href="#" class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
                      <i class="bx bx-bookmark"></i>
                    </a>
                  </div>
                  <div class="col-sm-7">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Design</a>
                        <span class="fs-sm text-muted border-start ps-3 ms-3">1 day ago</span>
                      </div>
                      <h3 class="h5">
                        <a href="blog-single.html">Brand analysis: second step to the brand identity</a>
                      </h3>
                      <hr class="my-4">
                      <div class="d-flex flex-sm-nowrap flex-wrap align-items-center justify-content-between">
                        <div class="d-flex align-items-center position-relative me-3">
                          <img src="<?= base_url() ?>/assets/img/avatar/08.jpg" class="rounded-circle me-3" width="48" alt="Avatar">
                          <div>
                            <a href="#" class="nav-link p-0 fw-bold text-decoration-none stretched-link">Annette Black</a>
                            <span class="fs-sm text-muted">Product Manager</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center mt-sm-0 mt-4 text-muted">
                          <div class="d-flex align-items-center me-3">
                            <i class="bx bx-like fs-lg me-1"></i>
                            <span class="fs-sm">8</span>
                          </div>
                          <div class="d-flex align-items-center me-3">
                            <i class="bx bx-comment fs-lg me-1"></i>
                            <span class="fs-sm">7</span>
                          </div>
                          <div class="d-flex align-items-center">
                            <i class="bx bx-share-alt fs-lg me-1"></i>
                            <span class="fs-sm">4</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </article>

              <!-- Article -->
              <article class="card border-0 shadow-sm overflow-hidden">
                <div class="row g-0">
                  <div class="col-sm-5 position-relative bg-position-center bg-repeat-0 bg-size-cover" style="background-image: url(<?= base_url() ?>/assets/img/landing/digital-agency/blog/03.jpg); min-height: 15rem;">
                    <a href="blog-single.html" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                    <a href="#" class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
                      <i class="bx bx-bookmark"></i>
                    </a>
                  </div>
                  <div class="col-sm-7">
                    <div class="card-body">
                      <div class="d-flex align-items-center mb-3">
                        <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Tips &amp; Advice</a>
                        <span class="fs-sm text-muted border-start ps-3 ms-3">May 24, 2021</span>
                      </div>
                      <h3 class="h5">
                        <a href="blog-single.html">How to check the website before releasing it?</a>
                      </h3>
                      <hr class="my-4">
                      <div class="d-flex flex-sm-nowrap flex-wrap align-items-center justify-content-between">
                        <div class="d-flex align-items-center position-relative me-3">
                          <img src="<?= base_url() ?>/assets/img/avatar/09.jpg" class="rounded-circle me-3" width="48" alt="Avatar">
                          <div>
                            <a href="#" class="nav-link p-0 fw-bold text-decoration-none stretched-link">Marvin McKinney</a>
                            <span class="fs-sm text-muted">Senior UI/UX Designer</span>
                          </div>
                        </div>
                        <div class="d-flex align-items-center mt-sm-0 mt-4 text-muted">
                          <div class="d-flex align-items-center me-3">
                            <i class="bx bx-like fs-lg me-1"></i>
                            <span class="fs-sm">8</span>
                          </div>
                          <div class="d-flex align-items-center me-3">
                            <i class="bx bx-comment fs-lg me-1"></i>
                            <span class="fs-sm">7</span>
                          </div>
                          <div class="d-flex align-items-center">
                            <i class="bx bx-share-alt fs-lg me-1"></i>
                            <span class="fs-sm">4</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </article>
            </div>
            <div class="col-12 mt-4 pt-lg-4 pt-3 text-center">
              <a href="blog-grid-no-sidebar.html" class="btn btn-lg btn-outline-primary w-sm-auto w-100">More blog posts</a>
            </div>
          </div>
        </section>

        <!-- Contact CTA -->
        <section class="container pt-3 pb-4 pb-md-5" style="margin-top: -156px; margin-bottom: 120px; transform: translateY(156px);">
          <div class="card border-0 bg-gradient-primary">
            <div class="card-body p-md-5 p-4 bg-size-cover" style="background-image: url(<?= base_url() ?>/assets/img/landing/digital-agency/contact-bg.png);">
              <div class="py-md-5 py-4 text-center">
                <h3 class="h4 fw-normal text-light opacity-75">Contact us? Let’s talk</h3>
                <a href="mailto:email@example.com" class="display-6 text-light">info@<?=APP_NAME?>.com</a>
                <div class="pt-md-5 pt-4 pb-md-2">
                  <a href="contacts-v1.html" class="btn btn-lg btn-light">Contact us</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  <?= $this->endSection() ?> 
  