/*global $, console, alert*/

$(document).ready(function () {
  "use strict";

  function validateEmailRe(email) {
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }
  
  function validateEmail() {
    var $result = $(".signup-form .signup-fail");
    var email = $(".email input").val();
  
    if (validateEmailRe(email)) {
      $result.slideUp(0);
    } else {
      $result.slideDown(0);
    }
  }

  function signinValidation() {
    $(".signup-form").on("submit", function (e) {
      e.preventDefault();
  
      validateEmail();
      
      if (!$(".email input").val() || !$(".password input").val()) {
        $(".signup-fail").slideDown(0);
      }
      else {
        $(".signup-fail").slideUp(0);
      }
      
    });
  }

  signinValidation();
    
});