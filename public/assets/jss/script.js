// function init() {
//   var from = document.getElementById("locationfrom");
//   var to = document.getElementById("locationto");

//   var autocomplete = new google.maps.places.Autocomplete(from);
//   var autocomplete = new google.maps.places.Autocomplete(to);
// }
// google.maps.event.addDomListener(window, "load", init);

$(function () {
  $("#depart , #return")
    .datepicker({
      orientation: "top",
      autoclose: true,
      todayHighlight: true,
      leftArrow: '<i class="fa fa-long-arrow-left"></i>',
      rightArrow: '<i class="fa fa-long-arrow-right"></i>',
    })
    .datepicker("update", new Date());
  $("#return-list, #depart-list")
    .datepicker({
      orientation: "top",
      autoclose: true,
      todayHighlight: true,
      leftArrow: '<i class="fa fa-long-arrow-left"></i>',
      rightArrow: '<i class="fa fa-long-arrow-right"></i>',
    })
    // .datepicker("update", new Date());
});

$("#slider-outbound").slider({
  range: true,
  min: 0,
  max: 1440,
  step: 30,
  values: [600, 720],
  slide: function (e, ui) {
    var hours1 = Math.floor(ui.values[0] / 60);
    var minutes1 = ui.values[0] - hours1 * 60;

    if (hours1.length == 1) hours1 = "0" + hours1;
    if (minutes1.length == 1) minutes1 = "0" + minutes1;
    if (minutes1 == 0) minutes1 = "00";
    if (hours1 >= 12) {
      if (hours1 == 12) {
        hours1 = hours1;
        minutes1 = minutes1 + " PM";
      } else {
        hours1 = hours1 - 12;
        minutes1 = minutes1 + " PM";
      }
    } else {
      hours1 = hours1;
      minutes1 = minutes1 + " AM";
    }
    if (hours1 == 0) {
      hours1 = 12;
      minutes1 = minutes1;
    }

    $(".outbound-min").html(hours1 + ":" + minutes1);

    var hours2 = Math.floor(ui.values[1] / 60);
    var minutes2 = ui.values[1] - hours2 * 60;

    if (hours2.length == 1) hours2 = "0" + hours2;
    if (minutes2.length == 1) minutes2 = "0" + minutes2;
    if (minutes2 == 0) minutes2 = "00";
    if (hours2 >= 12) {
      if (hours2 == 12) {
        hours2 = hours2;
        minutes2 = minutes2 + " PM";
      } else if (hours2 == 24) {
        hours2 = 11;
        minutes2 = "59 PM";
      } else {
        hours2 = hours2 - 12;
        minutes2 = minutes2 + " PM";
      }
    } else {
      hours2 = hours2;
      minutes2 = minutes2 + " AM";
    }

    $(".outbound-max").html(hours2 + ":" + minutes2);
  },
});

$("#slider-return").slider({
  range: true,
  min: 0,
  max: 1440,
  step: 30,
  values: [600, 720],
  slide: function (e, ui) {
    var hours1 = Math.floor(ui.values[0] / 60);
    var minutes1 = ui.values[0] - hours1 * 60;

    if (hours1.length == 1) hours1 = "0" + hours1;
    if (minutes1.length == 1) minutes1 = "0" + minutes1;
    if (minutes1 == 0) minutes1 = "00";
    if (hours1 >= 12) {
      if (hours1 == 12) {
        hours1 = hours1;
        minutes1 = minutes1 + " PM";
      } else {
        hours1 = hours1 - 12;
        minutes1 = minutes1 + " PM";
      }
    } else {
      hours1 = hours1;
      minutes1 = minutes1 + " AM";
    }
    if (hours1 == 0) {
      hours1 = 12;
      minutes1 = minutes1;
    }

    $(".return-min").html(hours1 + ":" + minutes1);

    var hours2 = Math.floor(ui.values[1] / 60);
    var minutes2 = ui.values[1] - hours2 * 60;

    if (hours2.length == 1) hours2 = "0" + hours2;
    if (minutes2.length == 1) minutes2 = "0" + minutes2;
    if (minutes2 == 0) minutes2 = "00";
    if (hours2 >= 12) {
      if (hours2 == 12) {
        hours2 = hours2;
        minutes2 = minutes2 + " PM";
      } else if (hours2 == 24) {
        hours2 = 11;
        minutes2 = "59 PM";
      } else {
        hours2 = hours2 - 12;
        minutes2 = minutes2 + " PM";
      }
    } else {
      hours2 = hours2;
      minutes2 = minutes2 + " AM";
    }

    $(".return-max").html(hours2 + ":" + minutes2);
  },
});

$("#slider-journey").slider({
  range: false,
  min: 0,
  max: 1440,
  step: 30,
  values: [600],
  slide: function (e, ui) {
    var hours1 = Math.floor(ui.values[0] / 60);
    var minutes1 = ui.values[0] - hours1 * 60;

    if (hours1.length == 1) hours1 = "0" + hours1;
    if (minutes1.length == 1) minutes1 = "0" + minutes1;
    if (minutes1 == 0) minutes1 = "00";
    if (hours1 >= 12) {
      if (hours1 == 12) {
        hours1 = hours1;
        minutes1 = minutes1 + " PM";
      } else {
        hours1 = hours1 - 12;
        minutes1 = minutes1 + " PM";
      }
    } else {
      hours1 = hours1;
      minutes1 = minutes1 + " AM";
    }
    if (hours1 == 0) {
      hours1 = 12;
      minutes1 = minutes1;
    }

    $(".journey-min").html(hours1 + ":" + minutes1);

    var hours2 = Math.floor(ui.values[1] / 60);
    var minutes2 = ui.values[1] - hours2 * 60;

    if (hours2.length == 1) hours2 = "0" + hours2;
    if (minutes2.length == 1) minutes2 = "0" + minutes2;
    if (minutes2 == 0) minutes2 = "00";
    if (hours2 >= 12) {
      if (hours2 == 12) {
        hours2 = hours2;
        minutes2 = minutes2 + " PM";
      } else if (hours2 == 24) {
        hours2 = 11;
        minutes2 = "59 PM";
      } else {
        hours2 = hours2 - 12;
        minutes2 = minutes2 + " PM";
      }
    } else {
      hours2 = hours2;
      minutes2 = minutes2 + " AM";
    }
  },
});

function selectAll() {
  var items = document.getElementsByName("airline-check");
  for (var i = 0; i < items.length; i++) {
    if (items[i].type == "checkbox") items[i].checked = true;
  }
}

function UnSelectAll() {
  var items = document.getElementsByName("airline-check");
  for (var i = 0; i < items.length; i++) {
    if (items[i].type == "checkbox") items[i].checked = false;
  }
}
$(document).on("click", ".best", function () {
  $(".best").addClass("active");
  $(".cheapest").removeClass("active");
  $(".fastest").removeClass("active");
});
$(document).on("click", ".cheapest", function () {
  $(".cheapest").addClass("active");
  $(".best").removeClass("active");
  $(".fastest").removeClass("active");
});
$(document).on("click", ".fastest", function () {
  $(".fastest").addClass("active");
  $(".cheapest").removeClass("active");
  $(".best").removeClass("active");
});
