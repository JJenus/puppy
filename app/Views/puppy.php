
  <?= $this->extend($config->viewLayout) ?>
  <?= $this->section('pageScripts') ?>
		<script>
		  let puppy_id = <?= $puppy_id ?>;
		</script>
    
    <script src="<?= base_url() ?>/assets/vendor/jarallax/dist/jarallax.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/lightgallery.js/dist/js/lightgallery.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/lg-video.js/dist/lg-video.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/lg-fullscreen.js/dist/lg-fullscreen.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/lg-zoom.js/dist/lg-zoom.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/lg-video.js/dist/lg-video.min.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/lg-thumbnail.js/dist/lg-thumbnail.min.js"></script>
		<script src="<?= base_url() ?>/assets/js/app/puppy.vue.js"></script>
  <?= $this->endSection() ?> 
  
  
  <?= $this->section('main') ?>

      <!-- Post title + Meta  -->
      <section v-if="puppy" class="container mt-5 pt-5 pt-lg-2 pb-3">
        <h1 class="pb-3" style="max-width: 970px;">{{puppy.name}}</h1>
        <div class="d-flex flex-md-row flex-column align-items-md-center justify-content-md-between mb-3">
          <div class="d-flex align-items-center flex-wrap text-muted mb-md-0 mb-4">
            <div class="fs-xs border-end pe-3 me-3 mb-2">
              <span class="badge bg-faded-primary text-primary fs-base">{{puppy.breed}}</span>
            </div>
            <div aria-labelledby="price" class="fs-sm border-end pe-3 me-3 h6 mb-2">Price: {{puppy.price}}</div>
            <div class="fs-sm border-end pe-3 me-3 mb-2">{{toTime(puppy.created_at)}}</div>
            <div class="d-flex mb-2">
              <div @click="like()" class="d-flex align-items-center me-3">
                <i :class="liked?'text-danger':''" class="bx bx-heart fs-base me-1"></i>
                <span class="fs-sm">{{puppy.likes.length}}</span>
              </div>
              <div class="d-flex align-items-center me-3">
                <i class="bx bx-comment fs-base me-1"></i>
                <span class="fs-sm">{{puppy.comments.length}}</span>
              </div>
              <div class="d-flex d-none align-items-center">
                <i class="bx bx-share-alt fs-base me-1"></i>
                <span class="fs-sm">2</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Post image (parallax) -->
      <div v-if="puppy" class="jarallax mb-lg-5 mb-4" data-jarallax data-speed="0.4" style="height: 36.45vw; min-height: 300px;">
        <div class="jarallax-img" :style="`background-image: url(${mainPhoto()});`"></div>
      </div>

      <!-- Post content + Sharing -->
      <section v-if="puppy" class="container mb-5 pt-4 pb-2 py-mg-4">
        <div class="row gy-4">

          <!-- Content -->
          <div class="col-lg-9">
           
            <h2 class="h4">Description</h2>
            <p class="mb-4 pb-2 fw-medium">
              {{puppy.description}} 
            </p>

            <!-- Video -->
            <div class="mb-4 pb-2"><!-- Video gallery -->
              <div class="gallery">
                <a href="mainVideo()" class="gallery-item video-item rounded-3" data-sub-html='<h6 class="fs-sm text-light">Gallery video caption</h6>'>
                  <img :src="mainPhoto()" alt="Gallery thumbnail">
                  <div class="gallery-item-caption fs-sm fw-medium">Preview</div>
                </a>
              </div>
            </div>
            
            <!-- Results -->
            <section class="container py-5 my-2 my-md-4 my-lg-5">
              <div class="row py-md-3 justify-content-center">
                <div class="col-lg-7 col-md-9">
                  <p class="fs-lg pb-4 mb-2 mb-lg-3">Every detail there is about {{puppy.name}}.</p>
                  <div class="row row-cols-2 row-cols-sm-3 g-4">
                    <div class="col">
                      <h3 class="h5 mb-2">{{puppy.gender}}</h3>
                      <p class="mb-0"><span class="fw-semibold">Gender</span></p>
                    </div>
                    <div class="col">
                      <h3 class="h5 mb-2">{{puppy.age}} days</h3>
                      <p class="mb-0"><span class="fw-semibold">Age</span></p>
                    </div>
                    <div class="col">
                      <h3 class="h5 mb-2">{{puppy.weight}}</h3>
                      <p class="mb-0"><span class="fw-semibold">Weight</span></p>
                    </div>
                    <div class="col">
                      <h3 class="h5 mb-2">{{puppy.height}}</h3>
                      <p class="mb-0"><span class="fw-semibold">Height</span></p>
                    </div>
                  </div>
                </div>
              </div>
            </section> 
           
            <!-- Quotation -->
            <!-- Gallery with thumbnails -->
            <div class="gallery row g-4" data-thumbnails="true">
            
              <!-- Item -->
              <div v-for="img in puppy.media.photos" class="col-md-4 col-sm-5">
                <a :href="img.url"  class="gallery-item rounded-3" data-sub-html='<h6 class="fs-sm text-light">Gallery image caption 1</h6>'>
                  <img :src="img.url" alt="Gallery thumbnail">
                  <div class="gallery-item-caption fs-sm fw-medium">Gallery image caption 1</div>
                </a>
              </div>
            
              
            </div>
            
            
            <!-- Tags -->
            <hr class="mb-4">
            <div class="d-flex flex-sm-row flex-column pt-2">
              <h6 class="mt-sm-1 mb-sm-2 mb-3 me-2 text-nowrap">Related Tags:</h6>
              <div>
                <a href="#" class="btn btn-sm btn-outline-secondary me-2 mb-2">#lifestyle</a>
                <a href="#" class="btn btn-sm btn-outline-secondary me-2 mb-2">#pet</a>
                <a href="#" class="btn btn-sm btn-outline-secondary me-2 mb-2">#business</a>
              </div>
            </div>
          </div>

          <!-- Sharing -->
          <div class="col-lg-3 position-relative">
            <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 105px !important;">
              <span class="d-block mb-3">5 min read</span>
              <h6>Share this post:</h6>
              <div class="mb-4 pb-lg-3">
                <a href="#" class="btn btn-icon btn-secondary btn-linkedin me-2 mb-2">
                  <i class="bx bxl-linkedin"></i>
                </a>
                <a href="#" class="btn btn-icon btn-secondary btn-facebook me-2 mb-2">
                  <i class="bx bxl-facebook"></i>
                </a>
                <a href="#" class="btn btn-icon btn-secondary btn-twitter me-2 mb-2">
                  <i class="bx bxl-twitter"></i>
                </a>
                <a href="#" class="btn btn-icon btn-secondary btn-instagram me-2 mb-2">
                  <i class="bx bxl-instagram"></i>
                </a>
              </div>
              <div class="d-flex flex-wrap justify-content-between ">
                <button @click="like()" :class="liked?'btn-outline-danger':'btn-outline-secondary'" class="btn btn-lg ">
                  <i class="bx bx-heart me-2 lead"></i>
                  <span v-if="liked">Unlike it</span>
                  <span v-else="liked">Like it</span>
                  <span :class="liked?'bg-danger':'bg-primary'" class="badge rounded-circle shadow-primary mt-n1 ms-3">{{puppy.likes.length}}</span>
                </button>
                <button class="btn btn-lg btn-outline-primary">
                  <i class="bx bx-check me-2 lead"></i>
                  Buy
                </button>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Post comments -->
      <section v-if="puppy" class="container mb-4 pt-lg-4 pb-lg-3">
        <h2 class="h1 text-center text-sm-start">{{puppy.comments.length}} comments</h2>
        <div class="row">
          <!-- Comments -->
          <div class="col-lg-9">
            <comment v-for="comment in puppy.comments" :comment="comment" :key="comment.id"></comment>
          </div>
        </div>
      </section>

      <!-- Comment form + Subscription -->
      <section v-if="puppy"  class="container mb-4 pb-2 mb-md-5 pb-lg-5">
        <div class="row gy-5">

          <!-- Comment form -->
          <div class="col-lg-9">
            <div class="card p-md-5 p-4 border-0 ">
              <div class="card-body w-100 mx-auto px-0" style="max-width: 746px;">
                <h2 class="mb-4 pb-3">Leave a Comment</h2>
                <form @submit.prevent="postComment()" class="row gy-4 needs-validation" novalidate>
                  <div class="col-12">
                    <label for="c-comment" class="form-label fs-base">Comment</label>
                    <textarea v-model="comment" id="c-comment" class="form-control form-control-lg" rows="3" placeholder="Type your comment here..." required></textarea>
                    <span class="invalid-feedback">Please, enter your comment.</span>
                  </div>
                  
                  <div class="col-12">
                    <button :class="!comment?'disabled':''" id="btn-post-comment" type="submit" class="btn btn-lg btn-primary w-sm-auto w-100 mt-2">
                      <span class="indicator-label">
                        Post comment
                      </span>
                      <span class="indicator-progress" >
                        <span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span>
                      </span> 
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Subscription form + Sharing -->
          <div class="col-lg-3 position-relative">
            <div class="sticky-top ms-xl-5 ms-lg-4 ps-xxl-4" style="top: 70px !important;">
              <div class="row gy-lg-5 gy-4 justify-content-center text-lg-start text-center">

                <!-- Subscription form -->
                <!-- Sharing -->
                <div class="col-lg-12 col-sm-7 col-11">
                  <h6 class="fs-lg">Don’t forget to share it</h6>
                  <div class="mb-4 pb-lg-3">
                    <a href="#" class="btn btn-icon btn-secondary btn-linkedin me-2 mb-2">
                      <i class="bx bxl-linkedin"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-secondary btn-facebook me-2 mb-2">
                      <i class="bx bxl-facebook"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-secondary btn-twitter me-2 mb-2">
                      <i class="bx bxl-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-icon btn-secondary btn-instagram me-2 mb-2">
                      <i class="bx bxl-instagram"></i>
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Related articles (Slider below lg breakpoint) -->
      <section v-if="puppy" class="container mb-5 pt-md-4">
        <div class="d-flex flex-sm-row flex-column align-items-center justify-content-between mb-4 pb-1 pb-md-3">
          <h2 class="h1 mb-sm-0">Related Articles</h2>
          <a href="blog-list-with-sidebar.html" class="btn btn-lg btn-outline-primary ms-4">
            All posts
            <i class="bx bx-right-arrow-alt ms-1 me-n1 lh-1 lead"></i>
          </a>
        </div>

        <div class="swiper mx-n2" data-swiper-options='{
          "slidesPerView": 1,
          "spaceBetween": 8,
          "pagination": {
            "el": ".swiper-pagination",
            "clickable": true
          },
          "breakpoints": {
            "500": {
              "slidesPerView": 2
            },
            "1000": {
              "slidesPerView": 3
            }
          }
        }'>
          <div class="swiper-wrapper">

            <!-- Item -->
            <div class="swiper-slide h-auto pb-3">
              <article class="card border-0 shadow-sm h-100 mx-2">
                <div class="position-relative">
                  <a href="blog-single.html" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                  <a href="#" class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
                    <i class="bx bx-bookmark"></i>
                  </a>
                  <img src="<?=base_url()?>/assets/img/blog/01.jpg" class="card-img-top" alt="Image">
                </div>
                <div class="card-body pb-4">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Business</a>
                    <span class="fs-sm text-muted">May 19, 2021</span>
                  </div>
                  <h3 class="h5 mb-0">
                    <a href="blog-single.html">5 Bad Landing Page Examples &amp; How We Would Fix Them</a>
                  </h3>
                </div>
                <div class="card-footer py-4">
                  <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none">
                    <img src="<?=base_url()?>/assets/img/avatar/01.jpg" class="rounded-circle me-3" width="48" alt="Avatar">
                    Jerome Bell
                  </a>
                </div>
              </article>
            </div>

            <!-- Item -->
            <div class="swiper-slide h-auto pb-3">
              <article class="card border-0 shadow-sm h-100 mx-2">
                <div class="position-relative">
                  <a href="blog-single.html" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                  <a href="#" class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
                    <i class="bx bx-bookmark"></i>
                  </a>
                  <img src="<?=base_url()?>/assets/img/blog/06.jpg" class="card-img-top" alt="Image">
                </div>
                <div class="card-body pb-4">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Marketing</a>
                    <span class="fs-sm text-muted">Apr 2, 2021</span>
                  </div>
                  <h3 class="h5 mb-0">
                    <a href="blog-single.html">How Agile is Your Forecasting Process?</a>
                  </h3>
                </div>
                <div class="card-footer py-4">
                  <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none">
                    <img src="<?=base_url()?>/assets/img/avatar/05.jpg" class="rounded-circle me-3" width="48" alt="Avatar">
                    Albert Flores
                  </a>
                </div>
              </article>
            </div>

            <!-- Item -->
            <div class="swiper-slide h-auto pb-3">
              <article class="card border-0 shadow-sm h-100 mx-2">
                <div class="position-relative">
                  <a href="blog-single.html" class="position-absolute top-0 start-0 w-100 h-100" aria-label="Read more"></a>
                  <a href="#" class="btn btn-icon btn-light bg-white border-white btn-sm rounded-circle position-absolute top-0 end-0 zindex-5 me-3 mt-3" data-bs-toggle="tooltip" data-bs-placement="left" title="Read later">
                    <i class="bx bx-bookmark"></i>
                  </a>
                  <img src="<?=base_url()?>/assets/img/blog/03.jpg" class="card-img-top" alt="Image">
                </div>
                <div class="card-body pb-4">
                  <div class="d-flex align-items-center justify-content-between mb-3">
                    <a href="#" class="badge fs-sm text-nav bg-secondary text-decoration-none">Business</a>
                    <span class="fs-sm text-muted">Sep 16, 2021</span>
                  </div>
                  <h3 class="h5 mb-0">
                    <a href="blog-single.html">This Week in Search: New Limits and Exciting Features</a>
                  </h3>
                </div>
                <div class="card-footer py-4">
                  <a href="#" class="d-flex align-items-center fw-bold text-dark text-decoration-none">
                    <img src="<?=base_url()?>/assets/img/avatar/02.jpg" class="rounded-circle me-3" width="48" alt="Avatar">
                    Ralph Edwards
                  </a>
                </div>
              </article>
            </div>
          </div>

          <!-- Pagination (bullets) -->
          <div class="swiper-pagination position-relative pt-2 pt-sm-3 mt-4"></div>
        </div>
      </section>
     <?= $this->endSection() ?> 


   