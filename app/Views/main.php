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
        <p class="mb-4 mx-auto pb-3 fs-lg text-center" style="max-width: 636px;">We create websites and mobile apps, marketing materials, branding, web design, UX/UI design and illustrations.</p>
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

  
      <div class="bg-secondary mb-5 pt-5">

        <!-- Most viewed -->
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
  