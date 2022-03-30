<!-- Comment -->
            <div class="py-4">
               <hr class="my-2">
              <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                <div class="d-flex align-items-center me-3">
                  <img src="<?=base_url()?>/assets/img/avatar/03.jpg" class="rounded-circle" width="48" alt="Avatar">
                  <div class="ps-3">
                    <h6 class="fw-semibold mb-0">{{comment.user.name}}</h6>
                    <span class="fs-sm text-muted">{{time()}}</span>
                  </div>
                </div>
                <a :data-bs-target="'reply-input-'+comment.id" data-toggle="collapse" class="nav-link fs-sm px-0">
                  <i class="bx bx-share fs-lg me-2"></i>
                  Reply
                </a>
              </div>
              <p class="mb-0">{{comment.comment}}</p>
            </div>

           

            <!-- Comment -->
            <div class="py-4">
              <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                <div class="d-flex align-items-center me-3">
                  <img src="<?=base_url()?>/assets/img/avatar/02.jpg" class="rounded-circle" width="48" alt="Avatar">
                  <div class="ps-3">
                    <h6 class="fw-semibold mb-0">Ralph Edwards</h6>
                    <span class="fs-sm text-muted">September 9 at 12:48</span>
                  </div>
                </div>
                <a href="#" class="nav-link fs-sm px-0">
                  <i class="bx bx-share fs-lg me-2"></i>
                  Reply
                </a>
              </div>
              <p class="mb-0 pb-2">Eget amet, ac scelerisque tellus sed. Sapien duis sit neque pulvinar. Est sit aenean nisl etiam donec mattis ut diam. Luctus massa eu nunc aliquam viverra tempus, eu amet, luctus. Ac faucibus vestibulum eu lacus. Ullamcorper sem ultrices tincidunt pharetra?</p>

              <!-- Comment reply -->
              <div class="position-relative ps-4 mt-4">
                <span class="position-absolute top-0 start-0 w-1 h-100 bg-primary"></span>
                <div class="d-flex align-items-center justify-content-between ps-3 pb-2 mb-1">
                  <div class="d-flex align-items-center me-3">
                    <img src="<?=base_url()?>/assets/img/avatar/05.jpg" class="rounded-circle" width="48" alt="Avatar">
                    <div class="ps-3">
                      <h6 class="fw-semibold mb-0">Albert Flores</h6>
                      <span class="fs-sm text-muted">16 hours ago</span>
                    </div>
                  </div>
                  <a href="#" class="nav-link fs-sm px-0">
                    <i class="bx bx-share fs-lg me-2"></i>
                    Reply
                  </a>
                </div>
                <p class="ps-3 mb-0"><a href="#" class="fw-semibold text-decoration-none">
                  @Ralph Edwards</a> Vulputate malesuada amet, consequat ullamcorper. Orci, cras maecenas in sit purus pellentesque. Ridiculus blandit pellentesque eget arcu morbi nisl. Morbi volutpat adipiscing sapien sed ut tempor.
                </p>
              </div>
            </div>

            <hr class="my-2">

            <!-- Comment -->
            <div class="py-4">
              <div class="d-flex align-items-center justify-content-between pb-2 mb-1">
                <div class="d-flex align-items-center me-3">
                  <img src="<?=base_url()?>/assets/img/avatar/07.jpg" class="rounded-circle" width="48" alt="Avatar">
                  <div class="ps-3">
                    <h6 class="fw-semibold mb-0">Cameron Williamson</h6>
                    <span class="fs-sm text-muted">March 24 at 8:20</span>
                  </div>
                </div>
                <a href="#" class="nav-link fs-sm px-0">
                  <i class="bx bx-share fs-lg me-2"></i>
                  Reply
                </a>
              </div>
              <p class="mb-0">Mattis id ut sed arcu metus elit faucibus condimentum aliquam. Nam adipiscing diam et suspendisse. Sagittis massa maecenas laoreet nulla amet nunc sagittis, pulvinar neque. Duis imperdiet ipsum suspendisse massa lectus habitasse. Id ante volutpat hendrerit augue parturient eget. Ac vitae posuere leo morbi vitae at hac lectus. Nibh neque quam quis amet mattis sit. Faucibus risus at sit tempus ut.</p>
            </div>