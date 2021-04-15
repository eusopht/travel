

//jQuery time
var current_fs, next_fs, previous_fs; //fieldsets
var left, opacity, scale; //fieldset properties which we will animate
var animating; //flag to prevent quick multi-click glitches

$(".next").click(function(){

$pickup = $("select#pickup option:checked").val();
 if( !$pickup.length === 0) {
          $('#pickup').addClass('warning');
		  return false;
    }
$dropoff = $("select#dropoff option:checked").val();
 if( !$dropoff.length === 0) {
          $('#dropoff').addClass('warning');
		  return false;
    }

  if(animating) return false;
  animating = true;
  $("#pickup_d").text("Pick Up :"+$("select#pickup option:checked").val());
  $("#dropoff_d").text("Drop Off :"+$("select#dropoff option:checked").val());
  $("#pickupdate_d").text("Pick Up Date :"+$("#pickupdate").val());
  $("#name_d").text("Name :"+$("#name").val());
  $("#contactnumber_d").text("Contact Number :"+$("#contactnumber").val());
  $("#whatsappnumber_d").text("Whatsapp Number :"+$("#whatsappnumber").val());
  /*$("#pickuptime_d").text("Pick Up Time :"+$("#pickuptime").val());	*/
  $("#email_d").text("Email :"+$("#email").val());

  current_fs = $(this).parent();
  next_fs = $(this).parent().next();

  //activate next step on progressbar using the index of next_fs
  $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

  //show the next fieldset
  next_fs.show();
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale current_fs down to 80%
      scale = 1 - (1 - now) * 0.2;
      //2. bring next_fs from the right(50%)
      left = (now * 50)+"%";
      //3. increase opacity of next_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({
        'transform': 'scale('+scale+')',
        'position': 'absolute'
      });
      next_fs.css({'left': left, 'opacity': opacity});
    },
    duration: 800,
    complete: function(){
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });
});

$(".previous").click(function(){
  if(animating) return false;
  animating = true;

  current_fs = $(this).parent();
  previous_fs = $(this).parent().prev();

  //de-activate current step on progressbar
  $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

  //show the previous fieldset
  previous_fs.show();
  //hide the current fieldset with style
  current_fs.animate({opacity: 0}, {
    step: function(now, mx) {
      //as the opacity of current_fs reduces to 0 - stored in "now"
      //1. scale previous_fs from 80% to 100%
      scale = 0.8 + (1 - now) * 0.2;
      //2. take current_fs to the right(50%) - from 0%
      left = ((1-now) * 50)+"%";
      //3. increase opacity of previous_fs to 1 as it moves in
      opacity = 1 - now;
      current_fs.css({'left': left});
      previous_fs.css({'transform': 'scale('+scale+')', 'opacity': opacity});
    },
    duration: 800,
    complete: function(){
      current_fs.hide();
      animating = false;
    },
    //this comes from the custom easing plugin
    easing: 'easeInOutBack'
  });

  $("fieldset").css("position", "relative");
});

$(".submit").click(function(){
  //return false;
   $("#form").css("display","none");
//   $("#form").toggle();
   $("#thanks").text("Thank you for your submission");
})

var validations ={
    email: [/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/, 'Please enter a valid email address']
};

$(document).ready(function(){
    // Check all the input fields of type email. This function will handle all the email addresses validations
    $("input[type=email]").change( function(){
        // Set the regular expression to validate the email
        validation = new RegExp(validations['email'][0]);
        // validate the email value against the regular expression
        if (!validation.test(this.value)){
            // If the validation fails then we show the custom error message
            this.setCustomValidity(validations['email'][1]);
            return false;
        } else {
            // This is really important. If the validation is successful you need to reset the custom error message
            this.setCustomValidity('');
        }
    });
})
function ValidateEmail(mail)
{
 if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(myForm.emailAddr.value))
  {
    return (true)
  }
    alert("You have entered an invalid email address!")
    return (false)
}



















$('#carStep_1 [required]').on("keyup change blur", function(){
    let valid = true;
    $('#carStep_1 [required]').each(function() {

        if ($(this).is(':invalid') || !$(this).val()) valid = false;

    })
    if (!valid) { console.log("error please fill all fields!"); $("#carStepBtn_2").addClass("disabled") }
    else { $("#carStepBtn_1").removeClass("disabled") };
})



$('#carStep_2 [required]').on("keyup change blur", function(){
    console.clear()
    let valid = true;
    $('#carStep_2 [required]').each(function() {

        console.log( $(this).attr('name') + " ! " + $(this).is(':invalid') )
        if ($(this).is(':invalid') || !$(this).val()) valid = false;

    })
    if (!valid) { console.log("error please fill all fields!"); $("#carStepBtn_2").addClass("disabled") }
    else { $("#carStepBtn_2").removeClass("disabled") };
})




/*



function stepValidation( el, btn ) {
    $( el ).on("keyup", function(){
        let valid = true;
        $( el ).each(function(x) {

            if ($(this).is(':invalid') || !$(this).val()) valid = false;

        })
        if (!valid) console.log("error please fill all fields!");
        else $( btn ).removeClass("disabled");
    })
}

stepValidation('#carStep_1 [required]', '#carStepBtn_1');

stepValidation('#carStep_2 [required]', '#carStepBtn_2');

stepValidation('#carStep_3 [required]', '#carStepBtn_3');
*/


$(function () {
    $('#datetimepicker1').datetimepicker({
        format: 'DD-MM-YYYY LT'
    });
});
