<aside class="col-lg-3 col-md-4 border-end pb-5 mt-n5">
  <div class="position-sticky top-0">
    <div class="text-center pt-5">
      <div class="d-table position-relative mx-auto mt-2 mt-lg-4 pt-5 mb-3">
        
        <?php if ($user->photo): ?>
          <img src="<?=$user->photo?>" class="d-block rounded-circle" width="120" alt="<?=$user->name?>">
        <?php else: ?>
          <div class="shadow-sm rounded-circle py-3 px-4">
            <i class="bx bxs-user display-1"></i>
          </div>
        <?php endif; ?>
        
        <button type="button" class="btn d-none btn-icon btn-light bg-white btn-sm border rounded-circle shadow-sm position-absolute bottom-0 end-0 mt-4" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Change picture">
          <i class="bx bx-refresh"></i>
        </button>
      </div>
      <h2 class="h5 mb-1"><?=$user->name?></h2>
      <p class="mb-3 pb-3"><?=$user->email?></p>
      <button type="button" class="btn btn-secondary w-100 d-md-none mt-n2 mb-3" data-bs-toggle="collapse" data-bs-target="#account-menu">
        <i class="bx bxs-user-detail fs-xl me-2"></i>
        Account menu
        <i class="bx bx-chevron-down fs-lg ms-1"></i>
      </button>
      <div id="account-menu" class="list-group list-group-flush collapse d-md-block">
        <a href="<?=base_url("app/user/collections")?>" class=" <?php if ($page === "collections"): ?>active <?php endif; ?> list-group-item list-group-item-action d-flex align-items-center">
          <i class="bx bx-collection fs-xl opacity-60 me-2"></i>
          My Collections
        </a>
        <a href="<?=base_url("app/user/details")?>" class="<?php if ($page === "details"): ?>active <?php endif; ?> list-group-item a list-group-item-action d-flex align-items-center">
          <i class="bx bx-cog fs-xl opacity-60 me-2"></i>
          Accountt Details
        </a>
        <a href="<?=base_url("app/user/security")?>" class="<?php if ($page === "security"): ?>active <?php endif; ?> list-group-item list-group-item-action d-flex align-items-center">
          <i class="bx bx-lock-alt fs-xl opacity-60 me-2"></i>
          Security
        </a>
        <a href="<?=base_url("app/user/notifications")?>" class="<?php if ($page === "notifications"): ?>active <?php endif; ?> list-group-item list-group-item-action d-flex align-items-center">
          <i class="bx bx-bell fs-xl opacity-60 me-2"></i>
          Notifications
        </a>
        <a href="<?=base_url("app/user/payment")?>" class="<?php if ($page === "payment"): ?>active <?php endif; ?> list-group-item list-group-item-action d-flex align-items-center">
          <i class="bx bx-credit-card-front fs-xl opacity-60 me-2"></i>
          Payment Details
        </a>
        <a href="<?=base_url('logout')?>" class="list-group-item list-group-item-action d-flex align-items-center">
          <i class="bx bx-log-out fs-xl opacity-60 me-2"></i>
          Sign Out
        </a>
      </div>
    </div>
  </div>
</aside>
