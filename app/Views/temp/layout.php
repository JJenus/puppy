<!DOCTYPE html>
<html lang="en"> 
  <?= view('temp/header') ?> 
   <!-- Body -->
  <body>

    <!-- Page loading spinner -->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>
  <main id="app" class="page-wrapper"> 
  <!--nav goes before main  -->
  <?=view("temp/navbar")?>
 
  <?= $this->renderSection("main") ?>
  </main>
  <!-- Footer --> 
  <?= view("temp/footer")?>
  <!-- Back to top button -->
    <a href="#top" class="btn-scroll-top" data-scroll>
      <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
      <i class="btn-scroll-top-icon bx bx-chevron-up"></i>
    </a>
  <!-- Vendor Scripts -->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script> 
    <script src="<?= base_url() ?>/assets/js/vue.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/moment.js"></script>
    <script src="<?= base_url() ?>/assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url("assets/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js") ?>"></script>
    <!-- Main Theme Script -->
    <script type="text/javascript" charset="utf-8">
      
      let notify = function(type="success", msg){
  		  if(type === 'success'){
  		    swal.fire({
            text: msg,
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok",
            customClass: {
    					confirmButton: "btn fw-bold btn-light-primary"
    				}
          }).then(function() {});
  		  }
  		  else{
  		    swal.fire({
            text: msg,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok",
            customClass: {
    					confirmButton: "btn fw-bold btn-light-primary"
    				}
          }).then(function() {});
  		  }
      } 
    </script>
    <?= $this->renderSection("pageScripts") ?>
    <script src="<?= base_url() ?>/assets/js/theme.min.js"></script>
    <script>
     (function () {
          'use strict'
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.querySelectorAll('.needs-validation')
          // Loop over them and prevent submission
          Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                  event.preventDefault()
                  event.stopPropagation()
                }
                form.classList.add('was-validated')
              }, false)
            })
        })();
    </script> 
    
 </body>
</html> 
