$(document).ready(function () {
  // fetch countries data
  $.ajax({
    type: "method",
    url: "fetchCountries.php",
    success: function (response) {
      $("#country").html(response);
    },
  });

  // fetch state data
  $("#country").change(function (e) {
    const countryId = $(this).val();
    $.ajax({
      type: "method",
      url: `fetchState.php?countryId=${countryId}`,
      success: function (response) {
        $("#state").html(response);
      },
    });
  });

  //   fetch city data
  $("#state").change(function (e) {
    const stateId = $(this).val();
    $.ajax({
      type: "method",
      url: `fetchCity.php?stateId=${stateId}`,
      success: function (response) {
        $("#city").html(response);
      },
    });
  });

  //   Validation regex
  const nameRegex = /^[a-zA-Z\s]+$/;
  const phoneRegex = /^\d{10}$/;

  //   firstname check
  $("#first_name").on("keyup", function () {
    let name = $(this).val();
    if (!nameRegex.test(name)) {
      $("#fnameError").fadeIn();
      $(this).addClass("border-red-500");
    } else {
      $("#fnameError").fadeOut();
      $(this).removeClass("border-red-500");
    }
  });

  // lastname check
  $("#last_name").on("keyup", function () {
    let name = $(this).val();
    if (!nameRegex.test(name)) {
      $("#lnameError").fadeIn();
      $(this).addClass("border-red-500");
    } else {
      $("#lnameError").fadeOut();
      $(this).removeClass("border-red-500");
    }
  });

  //   phone validation
  $("#phone").on("change", function () {
    let phone = $(this).val();
    if (!phoneRegex.test(phone)) {
      $("#phoneError").fadeIn();
      $(this).addClass("border-red-500");
    } else {
      $("#phoneError").fadeOut();
      $(this).removeClass("border-red-500");
    }
  });

  //form error submision prevention
  $("form").on("submit", function (e) {
    if ($(".error").is(":visible")) {
      e.preventDefault();
      alert("You have some errors in form please resolve errors");
    }
  });
});
