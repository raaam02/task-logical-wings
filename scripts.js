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
});
