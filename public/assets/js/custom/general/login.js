"use strict";

// Class Definition
var KTLogin = function() {
    var _login;
    var _signinForm;
    var _signupForm;
    var _passwordResetForm;

    var _showForm = function(type) {
        var form;

        KTUtil.addClass(_signinForm, 'd-none');
        KTUtil.addClass(_signupForm, 'd-none');
        KTUtil.addClass(_passwordResetForm, 'd-none');

        if ( type === 'signin' ) {
            form = _signinForm;
        }

        if ( type === 'signup' ) {
            form = _signupForm;
        }

        if ( type === 'password-reset' ) {
            form = _passwordResetForm;
        }

        KTUtil.removeClass(form, 'd-none');
        KTUtil.css(form, 'animationDuration', '0.6s');
        KTUtil.animateClass(form, 'animate__animated animate__backInUp');
    }

    var _handleSignInForm = function() {
        var validation;

        var submitButton = _login.querySelector('#kt_login_signin_form_submit_button');
        var signupButton = _login.querySelector('#kt_login_signin_form_singup_button');
        var passwordResetButton = _login.querySelector('#kt_login_signin_form_password_reset_button');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			_signinForm,
			{
				fields: {
					login: {
						validators: {
							notEmpty: {
								message: 'Username or email is required'
							}
						}
					},
					password: {
						validators: {
							notEmpty: {
								message: 'Password is required'
							}
						}
					}
				},
				plugins: {
          trigger: new FormValidation.plugins.Trigger(),
          submitButton: new FormValidation.plugins.SubmitButton(),
          //defaultSubmit: new FormValidation.plugins.DefaultSubmit(), // Uncomment this line to enable normal button submit after form validation
					bootstrap: new FormValidation.plugins.Bootstrap5({
            rowSelector: '.fv-row'
          })
				}
			}
		);

      submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
	        if (status == 'Valid') {
            console.log('test!');


            //showAlert("success", "All is cool! Now you submit this form");
            _signinForm.submit();
            //window.location.href = _signinForm.getAttribute('action');
  				} else {
  					swal.fire({
                text: "Sorry, looks like there are some errors detected, please try again.",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, got it!",
                customClass: {
      						confirmButton: "btn fw-bold btn-light-primary"
      					}
            }).then(function() {
  						KTUtil.scrollTop();
  					});
  				}
		    });
      });

        // Handle forgot button
        passwordResetButton.addEventListener('click', function (e) {
            e.preventDefault();
            _showForm('password-reset');
        });

    }
 
    var _handlePasswordResetForm = function(e) {
        var validation;

        var submitButton = _login.querySelector('#kt_login_password_reset_form_submit_button');
        var cancelButton = _login.querySelector('#kt_login_password_reset_form_cancel_button');

        // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
        validation = FormValidation.formValidation(
			_passwordResetForm,
			{
				fields: {
					email: {
						validators: {
							notEmpty: {
								message: 'Email address is required'
							},
                            emailAddress: {
								message: 'The value is not a valid email address'
							}
						}
					}
				},
				plugins: {
					trigger: new FormValidation.plugins.Trigger(),
					bootstrap: new FormValidation.plugins.Bootstrap5({
                        rowSelector: '.fv-row'
                    })
				}
			}
		);

        // Handle submit button
        submitButton.addEventListener('click', function (e) {
            e.preventDefault();

            validation.validate().then(function(status) {
		        if (status == 'Valid') {
                    swal.fire({
		                text: "Sent password reset. Please check your email",
		                icon: "success",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn fw-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				} else {
					swal.fire({
		                text: "Sorry, looks like there are some errors detected, please try again.",
		                icon: "error",
		                buttonsStyling: false,
		                confirmButtonText: "Ok, got it!",
                        customClass: {
    						confirmButton: "btn fw-bold btn-light-primary"
    					}
		            }).then(function() {
						KTUtil.scrollTop();
					});
				}
		    });
        });

        // Handle cancel button
        cancelButton.addEventListener('click', function (e) {
            e.preventDefault();

            _showForm('signin');
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            _login = document.querySelector('#kt_login');
            _signinForm = document.querySelector('#kt_login_signin_form');
            _signupForm = document.querySelector('#kt_login_signup_form');
            _passwordResetForm = document.querySelector('#kt_login_password_reset_form');

            _handleSignInForm();
            _handlePasswordResetForm();
        }
    };
}();

// On document ready
KTUtil.onDOMContentLoaded(function() {
    KTLogin.init();
});