 jQuery.validator.addMethod("lettersonly", function(value, element) {
  return this.optional(element) || /^[a-z]+$/i.test(value);
}, "Please enter letters only"); 


$.validator.addMethod(
        "regex",
        function(value, element, regexp) {
            var re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,})/;
            return this.optional(element) || re.test(value);
        },
        "Please check your input."
);

 $(document).ready(function () {
      
      $.validator.setDefaults({
        submitHandler: function () {
        	if(grecaptcha.getResponse() != "") {
        		form.submit();
			}	
        }
      });
      $('#new_doctor').validate({
        rules: {
          username: {
            required: true,
            minlength: 3,
            maxlength:30,
          },  
          email: {
            required: true,
            email:true,
          }, 
          phone: {
            required: true,
            number: true,
            minlength:10,
            maxlength:15,
          },
         new_password:
          {
            required:true,
            minlength: 8,
            maxlength:16,
            regex: true,
          },
          confirm_password: {
            required: true,
            equalTo: "#new_password",                       
          },
               
        },
       

        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });

      $('#new_pharmacy').validate({
        rules: {
          username: {
            required: true,
            minlength: 3,
            maxlength:30,
          },  
          email: {
            required: true,
            email:true,
            remote: {
                    url: base_url+"pharmacy/auth/userEmail_exist",
                    type: "post"
                 }
          }, 
          phone: {
            required: true,
            number: true,
            minlength:10,
            maxlength:15,
            remote: {
                    url: base_url+"pharmacy/auth/userPhone_exist",
                    type: "post"
                 }
          },
         new_password:
          {
            required:true,
            minlength: 8,
            maxlength:16,
            regex: true,
          },
          confirm_password: {
            required: true,
            equalTo: "#new_password",                       
          },
               
        },
        messages: {
          username: {
            required: "This field is required",
            minlength: "Name must be 3-30 in length",
            maxlength: "Name must be 3-30 in length",
          },
          email: {
             required:"This field is required",
             email:"Please insert valid email address",
             remote: "Email already exsist!"
          },
          phone: {
             required:"This field is required",
            number:"Mobile Number should have only numbers",
            minlength: "Mobile Number must be atleast 10 in length",
            maxlength: "Mobile Number must be 10-15 in length",
          },
          new_password:
          {
            required:"This field is required",
            minlength:"Password must be 8-16 characters longer",
            maxlength:"Password must be 8-16 characters longer",
            regex:"Password must contain at least 1 uppercase and lowercase letters, numbers and special character!",
          },
           confirm_password:{
            required:"This field is required",
            equalTo: "Confirm password not match with new password"
          },  
          
        },

        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });


 $(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
        form.submit();
        }
      });
      $('#new_doctor_otp').validate({
        rules: {
          otp: {
            required: true,
           }, 
        },
        messages: {
          otp: {
            required: "This field is required",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });

      $('#new_pharmacy_otp').validate({
        rules: {
          otp: {
            required: true,
           }, 
        },
        messages: {
          otp: {
            required: "This field is required",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });

 $(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function (form) {
        form.submit();
        }
      });
      $('#doctor_login').validate({
        rules: {
          username: {
            required: true,
           }, 
           password: {
            required: true,
           }, 
        },
        messages: {
          username: {
            required: "This field is required",
          },
           password: {
            required: "This field is required",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });

 $(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
        form.submit();
        }
      });
      $('#new_doctor_info').validate({
        rules: {
          username: {
            required: true,
           },
          identity_card: {
            required: true,
           }, 
           gender: {
            required: true,
           },
            gender: {
            required: true,
           },
           "category[]": {
            required: true,
          }, 
           "speciality[]": {
            required: true,
          }, 
          dob: {
            required: true,
           }, 
           residential_address: {
            required: true,
           }, 
            country: {
            required: true,
           },
           current_wokplace: {
            required: true,
           },
            about: {
            required: true,
           },  
        },
        
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });

      // $('#address-input').bind('copy paste', function (e) {
      //  e.preventDefault();
      // });

      $('#new_pharmacy_info').validate({
        rules: {
          username: {
            required: true,
            minlength: 3,
            maxlength:30,
          },
          pharmacy_name: {
            required: true,
            minlength: 3,
            maxlength:30,
          },
           pharmacy_address: {
            required: true
           }  
        },
        messages: {
           username: {
            required: "This field is required",
            minlength: "Name must be 3-30 in length",
            maxlength: "Name must be 3-30 in length",
          },
          pharmacy_name: {
            required: "This field is required",
            minlength: "Name must be 3-30 in length",
            maxlength: "Name must be 3-30 in length",
          },
           pharmacy_address: {
            required: "This field is required"
           }  
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });

      // $.validator.addMethod("validaddress", function(value, element) {
      //       var address_latitude = ($('#address-latitude').val()).trim();
      //       var address_longitude = ($('#address-longitude').val()).trim();
      //       if(address_latitude.length == 0 || address_longitude.length == 0){
      //         return false;
      //       }else{
      //         return true;
      //       }
      //   });
    });


 $(".imgAdd").click(function(){
  $(this).closest(".row").find('.imgAdd').before('<div class="col-sm-2 imgUp"><div class="imagePreview"></div><label class="btn btn-primary">Upload<input type="file" class="uploadFile img" value="Upload Photo" style="width:0px;height:0px;overflow:hidden;"></label><i class="fa fa-times del"></i></div>');
});
$(document).on("click", "i.del" , function() {
//  to remove card
  $(this).parent().remove();
// to clear image
  // $(this).parent().find('.imagePreview').css("background-image","url('')");
});
$(function() {
    $(document).on("change",".uploadFile", function()
    {
        var uploadFile = $(this);
        var files = !!this.files ? this.files : [];
        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader
            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                //alert(uploadFile.closest(".upimage").find('.imagePreview').length);
uploadFile.closest(".imgUp").find('.imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });
});

$.validator.addMethod("roles", function(value, elem, param) {
   return $(".roles:checkbox:checked").length > 0;
},"You must select at least one!");
$(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
        form.submit();
        }
      });
      $('#new_doctor_document').validate({
        rules: {
          profile_image: {
            required: true,
           },
          ic_pic: {
            required: true,
           }, 
           education: {
            required: true,
           },
        },
        messages: {
           profile_image: {
            required: "This field is required",
           },
          ic_pic: {
            required: "This field is required",
           }, 
           education: {
            required: "This field is required",
           },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
function delRownewedit(num){
  
  $('.clinic-box_'+num).remove();
}
var rowc = 1;   
$("#add_row_edit").click(function(){
  var str = '';
  rowc++;
 
 str += '<div class="clinic-box_'+rowc+' clinicbtn">';
 str+='<div class="modal fade modal-size2 bs-example-modal-lg_'+rowc+'" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">';
 str+='<div class="modal-dialog" role="document" style="max-width: 900px;">';
 str+='<div class="modal-content">';
 str+='<div class="custom-modal1">';
str+='<div class="modal-head text-center">';
 str+='<h3> Add Schedule </h3>';
  str+='<button type="button" class="close1" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>';
    str+='</div>';
 str+='<div class="modal-data1">';
str+='<div class="schedule-days">';
 str+='<h5> <input class="messageCheckbox_'+rowc+'" type="checkbox" name="monday" id="monday_'+rowc+'" value="monday"> Monday </h5>';
  str+='<h5> <input class="messageCheckbox_'+rowc+'" type="checkbox" name="tuesday" id="tuesday_'+rowc+'" value="tuesday"> Tuesday </h5>';
    str+='<h5> <input class="messageCheckbox_'+rowc+'" type="checkbox" name="wednesday" id="wednesday_'+rowc+'" value="wednesday"> Wednesday </h5>';
    str+='<h5> <input class="messageCheckbox_'+rowc+'" type="checkbox" name="thursday" id="thursday_'+rowc+'" value="thursday"> Thursday </h5>';
     str+='<h5> <input class="messageCheckbox_'+rowc+'" type="checkbox" name="friday" id="friday_'+rowc+'" value="friday"> Friday </h5>';
       str+='<h5> <input class="messageCheckbox_'+rowc+'" type="checkbox" name="saturday" id="saturday_'+rowc+'" value="saturday"> Saturday </h5>';
        str+='<h5> <input class="messageCheckbox_'+rowc+'" type="checkbox" name="sunday" id="sunday_'+rowc+'" value="sunday"> Sunday </h5>';
           str+='</div>';
           str+='<div class="schedule-slots">';
             str+='<div class="slots-head">';
              str+='<h4> Morning Slots </h4>';
           str+=' </div>';
            str+='<div class="slots-data">';
              str+='<div class="row">';
               str+='<div>';
                str+='<input type="time" name="monday_morning_from" id="monday_morning_from_'+rowc+'" placeholder="From" />';
              str+='</div>';
              str+='<div>';
                str+='<input type="time" name="monday_morning_to" id="monday_morning_to_'+rowc+'" placeholder="To"  />';
              str+='</div>';
            str+='</div>';
            str+='<div class="row">';
             str+='<div>';
              str+='<input type="time" name="tuesday_morning_from" id="tuesday_morning_from_'+rowc+'" placeholder="From"  />';
            str+='</div>';
            str+='<div>';
              str+='<input type="time" name="tuesday_morning_to" id="tuesday_morning_to_'+rowc+'" placeholder="To"  />';
            str+='</div>';
          str+='</div>';
          str+='<div class="row">';
           str+='<div>';
            str+='<input type="time" name="wednesday_morning_from" id="wednesday_morning_from_'+rowc+'" placeholder="From" />';
          str+='</div>';
          str+='<div>';
            str+='<input type="time" name="wednesday_morning_to" id="wednesday_morning_to_'+rowc+'" placeholder="To" />';
          str+='</div>';
        str+='</div>';
        str+='<div class="row">';
         str+='<div>';
          str+='<input type="time" name="thursday_morning_from" id="thursday_morning_from_'+rowc+'" placeholder="From" />';
        str+='</div>';
        str+='<div>';
          str+='<input type="time" name="thursday_morning_to" id="thursday_morning_to_'+rowc+'" placeholder="To"  />';
        str+='</div>';
      str+='</div>';
      str+='<div class="row">';
       str+='<div>';
        str+='<input type="time" name="friday_morning_from"  id="friday_morning_from_'+rowc+'" placeholder="From"  />';
      str+='</div>';
      str+='<div>';
        str+='<input type="time" name="friday_morning_to" id="friday_morning_to_'+rowc+'" placeholder="To"  />';
      str+='</div>';
    str+='</div>';
   str+=' <div class="row">';
     str+='<div>';
      str+='<input type="time" name="saturday_morning_from" id="saturday_morning_from_'+rowc+'" placeholder="From"  />';
   str+=' </div>';
    str+='<div>';
      str+='<input type="time" name="saturday_morning_to" id="saturday_morning_to_'+rowc+'" placeholder="To"  />';
    str+='</div>';
   str+='</div>';
   str+='<div class="row">';
   str+='<div>';
    str+='<input type="time" name="sunday_morning_from" id="sunday_morning_from_'+rowc+'" placeholder="From"/>';
   str+='</div>';
   str+='<div>';
    str+='<input type="time" name="sunday_morning_to" id="sunday_morning_to_'+rowc+'" placeholder="To" />';
   str+='</div>';
   str+='</div>';
   str+='</div>';
   str+='</div>';
   str+='<div class="schedule-slots">';
   str+='<div class="slots-head">';
   str+=' <h4> Evening Slots </h4>';
   str+='</div>';
  str+=' <div class="slots-data">';
    str+='<div class="row">';
     str+='<div>';
      str+='<input type="time" name="monday_evening_from" id="monday_evening_from_'+rowc+'" placeholder="From" />';
   str+=' </div>';
    str+='<div>';
      str+='<input type="time" name="monday_evening_to" id="monday_evening_to_'+rowc+'" placeholder="To"  />';
    str+='</div>';
  str+=' </div>';
   str+='<div class="row">';
   str+='<div>';
    str+='<input type="time" name="tuesday_evening_from" id="tuesday_evening_from_'+rowc+'" placeholder="From"  />';
   str+='</div>';
   str+='<div>';
    str+='<input type="time" name="tuesday_evening_to" id="tuesday_evening_to_'+rowc+'" placeholder="To"  />';
   str+='</div>';
   str+='</div>';
   str+='<div class="row">';
   str+='<div>';
    str+='<input type="time" name="wednesday_evening_from" id="wednesday_evening_from_'+rowc+'" placeholder="From" />';
   str+='</div>';
   str+='<div>';
    str+='<input type="time" name="wednesday_evening_to" id="wednesday_evening_to_'+rowc+'" placeholder="To" />';
   str+='</div>';
   str+='</div>';
   str+='<div class="row">';
   str+='<div>';
    str+='<input type="time" name="thursday_evening_from" id="thursday_evening_from_'+rowc+'" placeholder="From" />';
   str+='</div>';
   str+='<div>';
    str+='<input type="time" name="thursday_evening_to" id="thursday_evening_to_'+rowc+'" placeholder="To"  />';
   str+='</div>';
   str+='</div>';
   str+='<div class="row">';
   str+='<div>';
    str+='<input type="time" name="friday_evening_from"  id="friday_evening_from_'+rowc+'" placeholder="From"  />';
   str+='</div>';
   str+='<div>';
    str+='<input type="time" name="friday_evening_to" id="friday_evening_to_'+rowc+'" placeholder="To"  />';
   str+='</div>';
   str+='</div>';
   str+='<div class="row">';
   str+='<div>';
    str+='<input type="time" name="saturday_evening_from" id="saturday_evening_from_'+rowc+'" placeholder="From"  />';
   str+='</div>';
   str+='<div>';
   str+='<input type="time" name="saturday_evening_to" id="saturday_evening_to_'+rowc+'" placeholder="To"  />';
   str+='</div>';
   str+='</div>';
   str+='<div class="row">';
   str+='<div>';
    str+='<input type="time" name="sunday_evening_from" id="sunday_evening_from_'+rowc+'" placeholder="From"/>';
   str+='</div>';
   str+='<div>';
    str+='<input type="time" name="sunday_evening_to" id="sunday_evening_to_'+rowc+'" placeholder="To" />';
  str+='</div>';
  str+='</div>';
  str+='</div>';
  str+='</div>';
  str+='<div class="schedule-button">';
 str+=' <button type="button" value="'+rowc+'" onclick="getslotdata('+rowc+')" data-dismiss="modal"> SUBMIT </button>';
  str+='</div>';
  str+='</div>';
  str+='</div>';
  str+='</div>';
  str+='</div>';
  str+='</div>';
  str+='<h4> Clinic '+rowc+' </h4>';
  str+= '<div class="row">';
  str+='<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">';
  str+='<div class="form-field2">';
  str+='<input type="text" placeholder="Clinic Name" name="clinic_name[]" id="clinic_name_'+rowc+'" class="form-control" />';
  str+='</div>';
  str+='</div>';
  str+='<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">';
  str+='<div class="form-field2">';
  str+=' <input type="text" placeholder="Clinic Address" name="clinic_address[]" id="clinic_address_'+rowc+'" class="form-control" />';
  str+='</div>'
  str+='</div>';
  str+='<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">';
  str+='<div class="form-field2">';
 str+='<select class="form-control multi" name="time_slot[]" id="time_slot_'+rowc+'" multiple="multiple" onchange="getval('+rowc+')">';

  str+='</select>';
  str+='<input type="hidden" name="select_time[]" id="select_time_'+rowc+'" value="">';
  str+='</div>';
  str+='</div>';
  str+='<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">';
  str+='<div class="form-field2">';
  str+='<input type="hidden" id="btnid_1" value="'+rowc+'">';
  str+='<button type="button" class="btn btn-primary" data-toggle="modal"  data-target=".bs-example-modal-lg_'+rowc+'">Click this to create Time Slot</button>&nbsp;&nbsp;';
  str+='<a href="javascript:void(0);" onclick="delRownewedit('+rowc+');" class="btn btn-danger btn-xs">&nbsp;<i class="fa fa-minus" aria-hidden="true"></i>&nbsp;</a>';
  str+='</div>';
  str+='</div>';
  str+='</div>';
  str+=' </div>';
  $("#grdnewedit").append(str);
$(document).ready(function() {
  $selectElement = $('#time_slot_'+rowc+'').select2({
    placeholder: "Please Select Time Slot",
    allowClear: true
  });
});
});


function getslotdata(num)
{
  var checkedValue = null; 
  var arr = [];
var inputElements = document.getElementsByClassName('messageCheckbox_'+num+'');
for(var i=0; inputElements[i]; ++i){
      if(inputElements[i].checked){
           checkedValue = inputElements[i].value;
            morning_from = $('#'+checkedValue+'_morning_from_'+num+'').val();
            morning_to = $('#'+checkedValue+'_morning_to_'+num+'').val();
            evning_from = $('#'+checkedValue+'_evening_from_'+num+'').val();
            evning_to = $('#'+checkedValue+'_evening_to_'+num+'').val();
              var vt = checkedValue+'#'+morning_from+'#'+morning_to+'#'+evning_from+'#'+evning_to;
              var r = checkedValue+' : '+morning_from+' - '+morning_to+' To '+evning_from+' - '+evning_to;
             $('#time_slot_'+num)
            .append($("<option></option>")
             .attr("value",vt)
             .text(r));
            //arr.push({day:checkedValue,morning_from_time:morning_from,morning_to_time:morning_to,evening_from_time:evning_from,evening_to_time:evning_to}); 
          
      }
}
 /*$.each(arr, function(i, p) { 
 $.each(p, function(r, t) { 
  $('#time_slot_'+num)
      .append($("<option></option>")
       .attr("value",r)
       .text(r));
  });
  });*/
 /* arr.forEach(function(item) {
  Object.keys(item).forEach(function(key) {
    var vt = item[key]+'#'+item[key]+'#'+item[key]+'#'+item[key]+'#'+item[key];
    var r = 'Day :'+item[key]+'Morning Time'+item[key]+'-'+item[key]+' And Evening Time'+item[key]+' - '+item[key];
    $('#time_slot_'+num)
      .append($("<option></option>")
       .attr("value",vt)
       .text(r));
    console.log("key:" + key + "value:" + item[key]);
  });
});*/
}
$(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
        form.submit();
        }
      });
      $('#new_doctor_clinic').validate({
        rules: {
          "clinic_name[]": {
            required: true,
          }, 
           "clinic_address[]": {
            required: true,
          }, 
           "time_slot[]": {
            required: true,
          }, 
          
        },
        messages: {
            "clinic_name[]": {
            required: "This field is required",
          }, 
           "clinic_address[]": {
            required: "This field is required",
          }, 
           "time_slot[]": {
            required: "This field is required",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });

$(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
        form.submit();
        }
      });
      $('#doctor_fees').validate({
      
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });

function getval(num)
{
  var tt = $('#time_slot_'+num+'').val();
  $('#select_time_'+num+'').val(tt);
 // console.log(tt);
}

 $(document).ready(function() {
  $selectElement = $('.multi').select2({
    placeholder: "Please Select Time Slot",
    allowClear: true
  });
});


$(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function (form) {
        form.submit();
        }
      });
    $('#new_institution').validate({   
      errorElement: 'span',
      errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.input-wrapper').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
});
