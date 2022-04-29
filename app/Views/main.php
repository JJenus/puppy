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
    
      <!-- Hero -->
      <section class="jarallax position-relative d-flex align-items-center min-vh-100 bg-light mb-5 py-lg-5 pt-5" style="background-image: url(<?= base_url() ?>/assets/img/landing/digital-agency/hero-bg.svg);" data-jarallax data-img-position="0% 100%" data-speed="0.5">
        <div class="container position-relative zindex-5 py-5">
          <div class="row justify-content-md-start justify-content-center">
            <div class="col-md-6 col-sm-8 order-md-1 order-2 d-flex flex-column justify-content-between mt-4 pt-2 text-md-start text-center">
              <div class="mb-md-5 pb-xl-5 mb-4">

                <!-- Video popup btn -->
                <div class="d-inline-flex align-items-center position-relative mb-3">
                  <a href="https://youtu.be/Z6IRLZs4FVM" class="btn btn-video btn-icon btn-lg flex-shrink-0 me-3 stretched-link" data-bs-toggle="video">
                    <i class="bx bx-play"></i>
                  </a>
                  <h4 class="mb-0">Digital Pet Shop</h4>
                </div>

                <!-- Text -->
                <h1 class="display-2 mb-md-5 mb-3 pb-3">
                  We give you <span class="text-gradient-primary">the best</span> of pets
                </h1>
                <div class="d-md-flex align-items-md-start">
                  <a href="contact" class="btn btn-lg btn-primary flex-shrink-0 me-md-4 mb-md-0 mb-sm-4 mb-3">Work with us</a>
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
              <img class="w-100 rounded" src="<?= base_url() ?>/assets/img/avatar/shephard.png" alt="puppy">
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
        <p class="mb-4 mx-auto pb-3 fs-lg text-center" style="max-width: 636px;">
          Check out our latest posts on available pets.
        </p>
        <div class="row">
          <div v-for="puppy in latest" class="col-md-6 mb-3">
            <div class="card">
              <!-- Card -->
              <div class="card">
                <img class="card-img-top" style="height: 500px;" :src="img(puppy.media)" alt="Card image">
              </div>
            </div>
          </div>
        </div>
      
        <div class="pt-md-3 pt-2 text-center">
          <a href="<?=base_url("app/puppies")?>" class="btn btn-lg btn-primary w-sm-auto w-100">Explore all</a>
        </div>
      </section>
  
      <div class="bg-secondary mb-5 pt-5">

        <!-- Most viewed -->
        <section class="container mb-5 py-lg-5">
          <h2 class="h1 mb-4 pb-3 text-center">Most Viewed</h2>
          <div class="row justify-content-center">
            <div v-for="puppy in mostViews" class="col-lg-5 col-12 mb-lg-0 mb-5">
              <div class="card h-100 border-0 shadow-sm">
                <div class="position-relative">
                  <a href="#" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                  <a href="#" class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
                    <i class="bx bx-heart"></i>
                  </a>
                  <img :src="img(puppy.media)" class="card-img-top" alt="Image">
                </div>
                <div class="card-body pb-4">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Digital</a>
                    <span class="fs-sm text-muted">{{puppy.views}} views</span>
                  </div>
                  <h3 class="h5 mb-0">
                    <a href="#">{{puppy.description}}</a>
                  </h3>
                </div>
                
              </div>
            </div>

            <div class="col-12 mt-4 pt-lg-4 pt-3 text-center">
              <a href="<?=base_url("app/puppies?orderby=views&sort=desc")?>" class="btn btn-lg btn-outline-primary w-sm-auto w-100">View More</a>
            </div>
          </div>
        </section>

        <!-- Contact CTA -->
        <section class="container pt-3 pb-4 pb-md-5" style="margin-top: -156px; margin-bottom: 120px; transform: translateY(156px);">
          <div class="card border-0 bg-gradient-primary">
            <div class="card-body p-md-5 p-4 bg-size-cover" style="background-image: url(<?= base_url() ?>/assets/img/landing/digital-agency/contact-bg.png);">
              <div class="py-md-5 py-4 text-center">
                <h3 class="h4 fw-normal text-light opacity-75">Contact us? Let’s talk</h3>
                <a href="mailto:info@<?=APP_NAME?>.com" class="display-6 text-light">info@<?=APP_NAME?>.com</a>
                <div class="pt-md-5 pt-4 pb-md-2">
                  <a href="contact" class="btn btn-lg btn-light">Contact us</a>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  <?= $this->endSection() ?> 
  