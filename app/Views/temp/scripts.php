
		<!--end::Main-->
		
		
    <?php if ($page === "home"): ?>
		
		<!--begin::Page Custom Javascript(used by this page)-->
		<script src="<?= base_url() ?>/assets/js/custom/apps/shop.js"></script>
		<script type="text/javascript" charset="utf-8">
		  Inputmask({
          "mask" : "9999 9999 9999 9999"
      }).mask("#card_number");
       
		  Inputmask({
          "mask" : "999"
      }).mask("#card_cvv");
       
		  Inputmask({
          "mask" : "99/99"
      }).mask("#card_exp");
     
		</script>
		<!--end::Page Custom Javascript-->
		<script>
 
</script>

		<?php endif; ?>
		
		<?php if ($page === "dashboard"): ?>
		<!--begin::Page Custom Javascript(used by this page)-->
		  <script>
		    function deleteProduct() {} 
		    $(function (){
		      $(".delete-product").click(function (){
		        var pId = $(this).data('id');
		        console.log(pId)
		        Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              buttonsStyling: false,
              showCancelButton: true,
              confirmButtonText: 'Yes, delete it!',
              cancelButtonText: 'No, cancel!',
              customClass: {
      					cancelButton: "btn fw-bold btn-light-primary", 
      					confirmButton: "btn fw-bold btn-light-danger"
      				}, 
              reverseButtons: true, 
              showLoaderOnConfirm: true,
              preConfirm: () => {
                let resi;
                $.ajax({
                  method:'post', 
                  async: false, 
                  url: "<?= base_url ?>/dashboard/server-functions", 
                  data: {id: pId, delete_product:true}, 
                  success: (res)=>{
                    console.log("ajax: ", res)
                    resi = res 
                    if(res.status){
                      $("#row_"+pId).remove()
                    }
                  }, 
                  error: (res)=>{
                    console.log("error: ", res)
                    Swal.showValidationMessage(
                      `Request failed: ${res}`
                    )
                  }, 
                })
                
                
                return resi;
              },
              allowOutsideClick: () => !Swal.isLoading()
            }).then((result) => {
              if (result.isConfirmed) {
                notify("success", "Product has been deleted successfully.")
              }
            })
		      })
		    })
		  </script>
		<?php endif; ?>
		
		
		<script>
  		var CURRENCY = "<?= CURRENCY ?>";
  		
  		function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
      }
  		
  		function notify(type="success", msg){
  		  if(type == 'success'){
  		    swal.fire({
            text: msg,
            icon: "success",
            buttonsStyling: false,
            confirmButtonText: "Ok",
            customClass: {
    					confirmButton: "btn fw-bold btn-light-primary"
    				}
          }).then(function() {
    					KTUtil.scrollTop();
    			});
  		  }else{
  		    swal.fire({
            text: msg,
            icon: "error",
            buttonsStyling: false,
            confirmButtonText: "Ok",
            customClass: {
    					confirmButton: "btn fw-bold btn-light-primary"
    				}
          }).then(function() {
    					KTUtil.scrollTop();
    			});
  		  }
  		}
  		
  		
		
		  
		</script>  
		
		<?php if ($page === "new_staff"): ?>
		  <!-- code... -->
		  <script>
		    $(function (){
		      $("#form-add-staff").submit(function (e){
		        e.preventDefault();
		        
		        if($(this)[0].checkValidity()){
  		        $("#form-add-staff :input").prop("disabled", "disabled");
  		        $("#spinner-add-staff").toggleClass("d-none")
  		        console.log("submitting... ")
  		        var fmData = [] ;
  		        var key;
  		        var val;
  		        $("#form-add-staff :input:not(:button)").each(function (){
  		          key = $(this).attr('name') ;
  		          val = $(this).val()
  		          fmData.push({
  		            name: key, 
  		            value: val
  		          })
  		        })
  		        
  		        setCookie('login', JSON.stringify(fmData) , 1)
  		        
  		        console.log(fmData)   
  		        $.ajax({
  		          url: $("#form-add-staff").attr('action'), 
  		          method: "POST",
  		          data: fmData,
  		          success: (res) => {
  		            console.log(res)
  		             
  		            $("#form-add-staff :input").prop("disabled", false);
  		            $("#spinner-add-staff").toggleClass("d-none")
  		            
  		            if(res.status){
    		            swal.fire({
  		                text: res.report,
  		                icon: "success",
  		                buttonsStyling: false,
  		                confirmButtonText: "Ok",
                      customClass: {
            						confirmButton: "btn fw-bold btn-light-primary"
            					}
    		            }).then(function() {
            						KTUtil.scrollTop();
            				});
            				$(this)[0].reset();
            				$("#form-add-staff").removeClass("was-validated")
  		            }
  		            else if (res.report == "invalidUser"){
  		              $("#form-add-staff").removeClass("was-validated")
  		              console.log('invalid')
  		              $("#email-add-staff-feedback").text('User with that email already exists')
  		              $("#email-add-staff").addClass('is-invalid');
  		            } 
  		          }, 
  		          error: (err)=>{
  		            console.log(err)
  		            $("#form-add-staff :input").prop("disabled", false);
  		            $("#spinner-add-staff").toggleClass("d-none")
  		          }, 
  		        })
		        } 
		      })
		    })  
		  </script>
		<?php endif; ?>
		
		<?php if ($page === "new_product"): ?>
		  <script >
		    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
    
                reader.onload = function (e) {
                  var str = "#product-image"
                  $(str).attr('src', e.target.result)
                  $(str).removeClass('d-none')
                  $('#product-img-div').removeClass("border-danger")
                };
    
                reader.readAsDataURL(input.files[0]);
                //$('#file'+imgIndex).val(input.files[0])
            }
        }
        
        $(function (){
          $('.file-select').click(function (){
            $('#product-file').click();
          })
          
          $("#product-form").submit(function (e){
            e.preventDefault()
            if (!$("#product-form")[0].checkValidity()) {
              if(!$('#product-file').val()){
                $('#product-img-div').addClass("border-danger")
              } 
              return ;
            }
            
            $("#btn-product").attr("data-kt-indicator", "on");
            var form = new FormData ($("#product-form")[0])
          
            $.ajax({
              url: "<?= base_url ?>/dashboard/server-functions/", 
              processData: false, 
              contentType: false, 
              method: "POST",
              data: form, 
              success: function(res){
                console.log(res);
                if(!res.status){
                  notify("error", res.report)
                  return ;
                }
                notify("success", res.report)
              },
              error: (err)=>{
                console.log(err)
                notify("error", "Check your connection and try again.")
              } 
            }).always(()=>{
              $("#btn-product").attr("data-kt-indicator", null);
            })
          })
        })
		  </script>
		<?php endif; ?>
		
		<?php if ($page === "ingredients"): ?>
		  <script>
		    var rawCount = "<?= count($ingredients) ?>" ;
		    var editId;
		    
		    function editIngredient(id){
		      console.log($("#ing_"+id).text())
		      $("#edit-ing-name").val($("#ing_name_"+id).text());
		      
		      $("#edit-ing-qty").val($("#ing_qty_"+id).text());
		      
		      $("#edit-ing-id").val($("#ing_"+id).text());
		      
		      console.log("val: " +$("#edit-ing-name").val())
		      
		      if($("#edit-ing").hasClass("d-none"))
		        toggleEdit()
		    }
		    
		    function toggleEdit(){
		      $("#create-ing, #edit-ing").toggleClass("d-none");
		    }
		    
        $(function (){
          
          $("#edit-ingredient").submit(function (e){
            e.preventDefault()
            if (!$("#edit-ingredient")[0].checkValidity()) {
              return false;
            }
            
            $("#btn-edit-ingredient").attr("data-kt-indicator", "on");
            var form = $("#edit-ingredient").serializeArray()
            
            // console.log(form)
          
            $.ajax({
              url: "<?= base_url ?>/dashboard/server-functions/", 
              method: "POST",
              data: form, 
              success: function(res){
                console.log(res);
                if(!res.status){
                  console.log(res.report)
                  notify("error", res.report)
                  return false;
                }
                var data = res.data
                $("#ing_"+data.id).text(data.id)
                $("#ing_name_"+data.id).text(data.name)
                $("#ing_qty_"+data.id).text(data.qty)
                notify("success", res.report)
              },
              error: (err)=>{
                console.log(err)
                notify("error", "Check your connection and try again")
              } 
            }).always(()=>{
              $("#btn-edit-ingredient").attr("data-kt-indicator", null);
            })
          });
          
          $("#form-ingredients").submit(function (e){
            e.preventDefault()
            if (!$("#form-ingredients")[0].checkValidity()) {
              return false;
            }
            
            $("#btn-ingredients").attr("data-kt-indicator", "on");
            var form = $("#form-ingredients").serializeArray()
            
            // console.log(form)
          
            $.ajax({
              url: "<?= base_url ?>/dashboard/server-functions/", 
              method: "POST",
              data: form, 
              success: function(res){
                console.log(res);
                if(!res.status){
                  console.log(res.report)
                  notify("error", res.report)
                  return false;
                }
                var data = res.data
                rawCount++; 
                var temp = `
                  <tr>
				            <td class="">${rawCount}</td>
				            <td class="" id="ing_name_${rawCount}">${data.name}</td>
				            <td class="" id="ing_qty_${rawCount}">${data.qty}</td>
				            <td class="">
				              <button onclick="editIngredient('${rawCount}')" class="btn btn-link btn-sm p-1 btn-color-info btn-active-color-primary me-5 mb-2">
				                <i class="fas fa-pen"></i>
				              </button>
				            </td>
				          </tr>
                `
                
                $("#tbody").append(temp);
                notify("success", res.report)
              },
              error: (err)=>{
                notify("error", "Check your connection and try again")
                console.log(err)
              } 
            }).always(()=>{
              $("#btn-ingredients").attr("data-kt-indicator", null);
            })
          })
        })
        
		  </script>
		<?php endif; ?>
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
	
</html>