
 
     /*$(document).ready(function() {
  $selectElement = $('#category').select2({
    placeholder: "Please select Category",
    allowClear: true
  });
});*/
        $(document).ready(function() {
  if($('#speciality').length){
    $selectElement = $('#speciality').select2({
    placeholder: "Please select Speciality",
    allowClear: true
  });
  }
});
   
   
$(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
        form.submit();
        }
      });
    $('#new_doctor_clinic').validate({   
      errorElement: 'span',
      errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
});



  $('#service').on('change', function() {
      if(this.value == 'online')
      {
        $('#patientdiv').show();
         $('#patientdiv1').hide();
         $('#clinicdiv').hide();
      }
      else if(this.value == 'clinic'){
        $('#patientdiv').hide();
         $('#patientdiv1').show();
         $('#clinicdiv').show();
      }
      else if(this.value == 'home'){
        $('#patientdiv').hide();
         $('#patientdiv1').show();
         $('#clinicdiv').hide();
      }
      else
      {
        $('#patientdiv').hide();
         $('#patientdiv1').hide();
      }
    });
$("#removeItem").click(function(e) {
  
      var from_date = $('#from_date').val();
      var to_date = $('#to_date').val();
      
             $.ajax({
            type:"POST",
            url:base_url+"/doctordashboard", 
            data: {
              fromdate:from_date,to_date:to_date
            },          
            success: function(result) { 
            var res = JSON.parse(result);   
              console.log(res);        
           if(res.status == true)
           {            
            $('#todaysapp').hide();  
              $('#total_consulations').text(res.data.totalbooking);
              $('#clinic').text(res.data.totalclinic);
              $('#home').text(res.data.totalhome);
              $('#online').text(res.data.totalonline);
              $('#earning').text(currency_symbole+' '+res.data.totalearn);
              var booking = res.data.booking;
             
              var html ='<table >';
                  html+='<thead><tr><th> Booking ID </th><th> Patient </th> <th> Contact </th> <th> Type </th><th> Date </th> <th> Time </th><th> Status </th><th> Actions </th> </tr></thead><tbody>';
              for(var i=0;i<booking.length;i++)
              {
                 if(booking[i].doctor_status == 'accepted')
                  {
                      var status = '<label class="btn btn-success btn-rounded">Accepted</lable>';
                  }
                  else if(booking[i].doctor_status == 'progress')
                  {
                       var status = '<label class="btn btn-warning btn-rounded">Progress</label>';
                  }
                  else if(booking[i].doctor_status == 'cancelled')
                  {
                       var status = '<label class="btn btn-danger btn-rounded">Cancelled</label>';
                  }
                  else if(booking[i].doctor_status == 'prescription_pending')
                  {
                       var status = '<label class="btn btn-info btn-rounded">Prescription Pending</label>';
                  }
                  else if(booking[i].doctor_status == 'complete')
                  {
                       var status = '<label class="btn btn-success btn-rounded">Complete</label>';
                  }
                  else
                  {
                       var status = '<label class="btn btn-info btn-rounded">Pending</label>';
                  }

                html+='<tr>';
                html+='<td>'+booking[i].id+'</td>';
                html+='<td>'+booking[i].name+'</td>';
                html+='<td>'+booking[i].mobile+'</td>';
                html+='<td>'+booking[i].type+'</td>';
                html+='<td>'+booking[i].date+'</td>';
                html+='<td>'+booking[i].time+'</td>';
                 html+='<td>'+status+'</td>';
                if(booking[i].doctor_status == 'prescription_pending')
                html+=' <td class="action-buttons"> <a href="'+base_url+'Doctor/booking/consultation/'+booking[i].enc_id+'" class="bg-blue" style="background: none;"><i class="fa fa-eye"></i></a></td>';
                else
                html+=' <td class="action-buttons"> <a href="javascript:void(0)" class="bg-blue" onclick="showbooking('+booking[i].id+')" style="background: none;"><i class="fa fa-eye"></i></a></td>';
                 html+='</tr>';
              }
              html+='</tbody></table>';
              $('#booking_request').html(html);
            
           }
           else
           {
               $('#todaysapp').show(); 
           }
            }
          });
      });


  

// call a function after 1 minutes
/*var ajax_call = function() {  
};
var interval = 1000 * 60 * 1; // where X is your every X minutes
setInterval(ajax_call, interval);*/


function showbooking(id)
{
    $.ajax({
            type:"POST",
            url:base_url+"Doctor/booking/get_booking_details", 
            data: {
              id:id
            },          
            success: function(result) { 
            var res = JSON.parse(result);    
            console.log(res);  
           if(res.status == true)
           {    
            $('#p_name').text(res.data.name);
            $('#p_phone').text(res.data.mobile);
            $('#p_intolerances').text(res.data.intolerances);
            $('#p_allergies').text(res.data.allergies);
            $('#p_intolerances').text(res.data.intolerances);
            $('#p_allergies').text(res.data.allergies);
            $('#p_email').text(res.data.email);
            if(res.data.bookingType == 'instance')
              $('#p_slot').text(res.data.date);
            else
              $('#p_slot').text(res.data.time_slot+' | '+res.data.date);  
            $('#visit').text(res.data.type);
            if(res.data.bookingType == 'instance')
              $('#gender').text(res.data.gender);
             else
              $('#gender').text(res.data.gender+'/'+res.data.age);
            $('#p_for').text(res.data.for);   
            $('#p_relation').text(res.data.relation);
            $('#p_address').text(res.data.address);
            $('#p_message').text(res.data.message);
            // $('#p_message').parent().css('display','block');
            // if(res.data.bookingType == 'instance')
            //   $('#p_message').parent().css('display','none');
            $('#booking_id').text(res.data.id);
            $('#booking_type').text(res.data.booking_type); 
            $('#booking_type').parent().css('display','block');
            if(res.data.bookingType == 'instance')
              $('#booking_type').parent().css('display','none');  
            $('#pay_method').text(res.data.payment_method); 
             if(res.data.payment_method != false) 
            {
            	$('#payment').text(currency_symbole+' '+res.data.total_payment);
            }else
            {
            	$('#payment').text('insurance');
            }
           
            $('#paid').text(res.data.paid);
            if(res.data.payment_method == 'Insurance'){
              $('#payment').closest('li').hide();
            }else{
              $('#payment').closest('li').show();
            }
            $('#clinic_name').text(res.data.clinic_name);
            $('#imgg').html('<img alt="user-image" src="'+res.data.profile_img+'" class="img-fluid rounded-circle mb-3"/>');
           
          var dateOne = new Date(res.data.booking_dates);
           var today = new Date();
           var dd = String(today.getDate()).padStart(2, '0');
           var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy = today.getFullYear();

          var todayDate = yyyy+'-'+mm +'-'+dd;
          var dateOne1 = new Date(res.data.booking_dates);
           var today1 = new Date(todayDate);

           //if(today1.getTime() !==  dateOne1.getTime()) 
           if(dateOne1.getTime() === today1.getTime())
            {    
              if(res.data.doctor_status == 'pending'){
                if(res.data.consultation_type == 'online')
                {
                    var urrl = base_url+'start-chat/'+res.data.idd;
                     var reject_url = base_url+'Doctor/booking/reject/'+res.data.idd;
                     var html ='<div class="clinic-popup3">'+
                        '<a href="'+urrl+'" class="btn btn-primary w-100 me-3"><svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none"><path d="M12.5 2.5C6.99 2.5 2.5 6.99 2.5 12.5C2.5 18.01 6.99 22.5 12.5 22.5C18.01 22.5 22.5 18.01 22.5 12.5C22.5 6.99 18.01 2.5 12.5 2.5ZM16.85 16.07C16.71 16.31 16.46 16.44 16.2 16.44C16.07 16.44 15.94 16.41 15.82 16.33L12.72 14.48C11.95 14.02 11.38 13.01 11.38 12.12V8.02C11.38 7.61 11.72 7.27 12.13 7.27C12.54 7.27 12.88 7.61 12.88 8.02V12.12C12.88 12.48 13.18 13.01 13.49 13.19L16.59 15.04C16.95 15.25 17.07 15.71 16.85 16.07Z" fill="white" /></svg> '+res.data.start_consultation+' </a>'+
                     '</div>';
                    if(res.data.is_urgent == "00000000001")
                	{
                		 var urrl = base_url+'Doctor/booking/accept/'+res.data.idd;
	                   var reject_url = base_url+'Doctor/booking/reject/'+res.data.idd;
	                   var missed_url = base_url+'Doctor/booking/missed/'+res.data.idd;
	                   var html ='<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">'+
	                            '<a href="'+reject_url+'" class="btn btn-primary  reviews_cancel">  '+res.data.reject+' </a></div>'+'<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="'+missed_url+'" class="btn btn-primary  reviews_cancel">  '+res.data.missed+' </a></div>'+
	                            '<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"><a href="javascript:void(0)" class="btn btn-primary w-100" id="'+res.data.idd+'" onclick="acceptbooking(this)"> '+res.data.accept+' </a>'+
	                         '</div>';
                	}else
                	{
                		 //var urrl = base_url+'start-chat/'+res.data.idd;
                		 var urrl2 = base_url+'Doctor/booking/consultation/'+res.data.idd;
	                     var reject_url = base_url+'Doctor/booking/reject/'+res.data.idd;
	                     var html ='<div class="clinic-popup3">'+
	                        '<a href="'+urrl2+'" class="btn btn-primary w-100 me-3"><svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none"><path d="M12.5 2.5C6.99 2.5 2.5 6.99 2.5 12.5C2.5 18.01 6.99 22.5 12.5 22.5C18.01 22.5 22.5 18.01 22.5 12.5C22.5 6.99 18.01 2.5 12.5 2.5ZM16.85 16.07C16.71 16.31 16.46 16.44 16.2 16.44C16.07 16.44 15.94 16.41 15.82 16.33L12.72 14.48C11.95 14.02 11.38 13.01 11.38 12.12V8.02C11.38 7.61 11.72 7.27 12.13 7.27C12.54 7.27 12.88 7.61 12.88 8.02V12.12C12.88 12.48 13.18 13.01 13.49 13.19L16.59 15.04C16.95 15.25 17.07 15.71 16.85 16.07Z" fill="white" /></svg> '+res.data.start_consultation+' </a>'+
	                     '</div>';
                	}
                }
                else
                {
                    var urrl = base_url+'Doctor/booking/accept/'+res.data.idd;
                   var reject_url = base_url+'Doctor/booking/reject/'+res.data.idd;
                   var html ='<div class="clinic-popup3">'+
                            '<a href="'+reject_url+'" class="btn btn-danger btn-rounded mr-2"> '+res.data.reject+' </a>'+
                            '<a href="javascript:void(0)" class="btn btn-success btn-rounded" id="'+res.data.idd+'" onclick="acceptbooking(this)"> '+res.data.accept+' </a>'+
                         '</div>';
                }
              
              $('#consultation').html(html);          
            }
            else if(res.data.doctor_status == 'accepted')
            {
              if(res.data.consultation_type == 'online')
              {
                  var urrl = base_url+'start-chat/'+res.data.idd;
                  var urrl2 = base_url+'Doctor/booking/consultation/'+res.data.idd;
                   var reject_url = base_url+'Doctor/booking/reject/'+res.data.idd;
                   var html ='<div class="clinic-popup3">'+
                      '<a href="'+urrl2+'" class="btn btn-primary w-100 me-3"><svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none"><path d="M12.5 2.5C6.99 2.5 2.5 6.99 2.5 12.5C2.5 18.01 6.99 22.5 12.5 22.5C18.01 22.5 22.5 18.01 22.5 12.5C22.5 6.99 18.01 2.5 12.5 2.5ZM16.85 16.07C16.71 16.31 16.46 16.44 16.2 16.44C16.07 16.44 15.94 16.41 15.82 16.33L12.72 14.48C11.95 14.02 11.38 13.01 11.38 12.12V8.02C11.38 7.61 11.72 7.27 12.13 7.27C12.54 7.27 12.88 7.61 12.88 8.02V12.12C12.88 12.48 13.18 13.01 13.49 13.19L16.59 15.04C16.95 15.25 17.07 15.71 16.85 16.07Z" fill="white" /></svg> '+res.data.start_consultation+' </a>'+
                   '</div>';
                   $('#consultation').html(html);
              }else{
                var urrl = base_url+'Doctor/booking/consultation/'+res.data.idd;
                     $('#consultation').html('<a href='+urrl+' class="btn btn-primary w-100 me-3"> <svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none"><path d="M12.5 2.5C6.99 2.5 2.5 6.99 2.5 12.5C2.5 18.01 6.99 22.5 12.5 22.5C18.01 22.5 22.5 18.01 22.5 12.5C22.5 6.99 18.01 2.5 12.5 2.5ZM16.85 16.07C16.71 16.31 16.46 16.44 16.2 16.44C16.07 16.44 15.94 16.41 15.82 16.33L12.72 14.48C11.95 14.02 11.38 13.01 11.38 12.12V8.02C11.38 7.61 11.72 7.27 12.13 7.27C12.54 7.27 12.88 7.61 12.88 8.02V12.12C12.88 12.48 13.18 13.01 13.49 13.19L16.59 15.04C16.95 15.25 17.07 15.71 16.85 16.07Z" fill="white" /></svg> '+res.data.start_consultation+' </a>');
              }
            }
            else
            {
            	
              $('#consultation').html('');
            }
          }
            else 
            {   
               $('.reschedule_appointment').attr('data-id',res.data.consultation_type)
               $('.reschedule_appointment').attr('data-bkid',res.data.id)
           	   $('.reschedule_appointment').show(); 
               $('#consultation').html('');
               
            }           

           $("#online_consult").modal('show');
           }
           else
           {
            $('#todaysapp').show(); 
           }
            }
          });
}

function acceptbooking(elt)
{
  $('#consultation').html('');
  $.ajax({
            type:"POST",
            url:base_url+"Doctor/booking/accept", 
            data: {
              id:elt.id
            },          
            success: function(result) { 
            var res = JSON.parse(result);    
              
           if(res.status == 'true')
           {
               
              var urrl = base_url+'Doctor/booking/consultation/'+res.data.idd;
              var urrl2 = base_url+'start-chat/'+res.data.idd;
              if(res.data.is_urgent == '00000000001')
              {
              	$('#consultation').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href='+urrl+' class="btn btn-primary w-100 me-3"> <svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25"viewBox="0 0 25 25" fill="none"><path d="M12.5 2.5C6.99 2.5 2.5 6.99 2.5 12.5C2.5 18.01 6.99 22.5 12.5 22.5C18.01 22.5 22.5 18.01 22.5 12.5C22.5 6.99 18.01 2.5 12.5 2.5ZM16.85 16.07C16.71 16.31 16.46 16.44 16.2 16.44C16.07 16.44 15.94 16.41 15.82 16.33L12.72 14.48C11.95 14.02 11.38 13.01 11.38 12.12V8.02C11.38 7.61 11.72 7.27 12.13 7.27C12.54 7.27 12.88 7.61 12.88 8.02V12.12C12.88 12.48 13.18 13.01 13.49 13.19L16.59 15.04C16.95 15.25 17.07 15.71 16.85 16.07Z" fill="white" /></svg> '+start_chat+' </a></div>'); 
              	//$('.clinic-popup3').html('<a href='+urrl+' class="custom-btn4 m-b-20 btn btn-success"> <i class="fa fa-clock"> </i> '+start_chat+' </a>'); 
              }else
              {
              	$('#consultation').html('<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><a href='+urrl+' class="btn btn-primary w-100 me-3"><svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25"viewBox="0 0 25 25" fill="none"><path d="M12.5 2.5C6.99 2.5 2.5 6.99 2.5 12.5C2.5 18.01 6.99 22.5 12.5 22.5C18.01 22.5 22.5 18.01 22.5 12.5C22.5 6.99 18.01 2.5 12.5 2.5ZM16.85 16.07C16.71 16.31 16.46 16.44 16.2 16.44C16.07 16.44 15.94 16.41 15.82 16.33L12.72 14.48C11.95 14.02 11.38 13.01 11.38 12.12V8.02C11.38 7.61 11.72 7.27 12.13 7.27C12.54 7.27 12.88 7.61 12.88 8.02V12.12C12.88 12.48 13.18 13.01 13.49 13.19L16.59 15.04C16.95 15.25 17.07 15.71 16.85 16.07Z" fill="white" /></svg> '+start_chat+' </a></div>'); 
              	//$('.clinic-popup3').html('<a href='+urrl+' class="custom-btn4 m-b-20 btn btn-success"> <i class="fa fa-clock"> </i> '+start_chat+' </a>'); 
              }
              
                  
              //$('#bsModal3').modal('hide');
               
                $.toast({
                  text: res.message,
                  position: 'top-right',
                  loader: false,
                  stack: false,
                  hideAfter: 3000,
                  icon: 'success',
                  allowToastClose: false
              });    
           }
           else
           {
              $.toast({
                  text: res.message,
                  position: 'top-right',
                  loader: false,
                  stack: false,
                  hideAfter: 3000,
                  icon: 'error',
                  allowToastClose: false
              });
           }
        }
         });
}
function afteracceptbooking(id)
{
  
  $.ajax({
            type:"POST",
            url:base_url+"Doctor/booking/afteraccept", 
            data: {
              id:id
            },          
            success: function(result) { 
            var res = JSON.parse(result);    
              
           if(res.status == 'true')
           {
               $('#startname').text(res.data.name);
              $('#startphone').text(res.data.mobile);
              $('#startemail').text(res.data.email);
              $('#starttime').text(res.data.time_slot+' | '+res.data.date); 
              $('#startimage').html('<img alt="user-image" src="'+res.data.profile_img+'"/>');
              var urrl = base_url+'Doctor/booking/consultation/'+res.data.idd;
               $('#startstat').html('<a href='+urrl+' class="custom-btn4 m-b-20"> <i class="fa fa-clock"> </i> '+start_chat+' </a>');    
              $('#bsModal3').modal('hide');
               $('#conslt').modal('show');    
           }
           else
           {
              $.toast({
                  text: res.message,
                  position: 'top-right',
                  loader: false,
                  stack: false,
                  hideAfter: 3000,
                  icon: 'error',
                  allowToastClose: false
              });
           }
        }
         });
}
 function delRownewedit(num){  
  var counter = parseInt($("#hiddenVal").val());
    counter--;
     $("#hiddenVal").val(counter);
  $('.block-element_'+num).remove();
}
var rowc =   parseInt($("#hiddenVal").val());
$("#add_row_edit").click(function(){
   var counter = parseInt($("#hiddenVal").val());

  var medicineName		= $('#medicineName').val();
  var intakeMethod		= $('#intakeMethod').val();
  var qty				= $('#qty').val();
  var selectUnit		= $('#selectUnit').val();
  var selectTiming		= $('#selectTiming').val();
  var morning			= $('#morning').val();
  var lunch				= $('#lunch').val();
  var night				= $('#night').val();
  var addInstructions	= $('#addInstructions').val();
  var DeleteText		= $('#DeleteText').val();
  var str = '';
  var listrow = rowc++
 var rowcs = (listrow < 9 ? "0" : "")+(listrow+1);
 str+='<div class="row block-element_'+rowc+'">';
str+='<div class="col-lg-10 col-md-10 col-sm-8 col-9">';
str+='<h6 class="fw-bold mb-3"> <span class="me-3">'+rowcs+'</span></h6>';
str+='</div>';
str+='<div class="col-lg-2 col-md-2 col-sm-4 col-3 mb-3 text-end">';
str+='<a href="javascript:void(0)" onclick="delRownewedit('+rowc+');" class="red"> '+DeleteText+' </a>';
str+='</div>';
str+='<div class="col-6 allo__login mb-3">';
str+='<div class="input-wrapper">';
str+='<label for="first">'+medicineName+'</label>';
str+='<input type="text" value="" name="medicine_name[]"  id="medicine_name_'+rowc+'" placeholder="'+medicineName+'" >';
str+='</div>';
str+='</div>';

 str+='<div class="col-6 allo__login mb-3">';
str+='<div class="input-wrapper">';
str+='<label>'+qty+'</label>';
str+='<input type="text" name="qty[]" id="qty_'+rowc+'"  placeholder="'+qty+'">';
     
  str+='</div>';
str+='</div>';

str+='<h6 class="fw-bold mb-1"> <span class="me-3">'+selectTiming+'</h6>';
str+='<div class="d-flex mt-lg-3 mb-3">';
str+='<div class="form-check form-check-inline">'; 
str+='<input type="checkbox" name="timing['+counter+'][]" value="morning" class="form-check-input"> <label class="form-check-label" for="inlineRadio1">'+morning+'</label>'; 
str+='</div>';
str+='<div class="form-check form-check-inline ms-4">'; 
str+='<input type="checkbox" name="timing['+counter+'][]" value="lunch" class="form-check-input"> <label class="form-check-label" for="inlineRadio1">'+lunch+'</label>'; 
str+='</div>'; 
str+='<div class="form-check form-check-inline ms-4">'; 
str+='<input type="checkbox" name="timing['+counter+'][]" value="night" class="form-check-input"> <label class="form-check-label" for="inlineRadio1">'+night+'</label>'; 
str+='</div>';  

str+='</div>';
str+='<h6 class="fw-bold mb-3"> <span class="me-3">'+addInstructions+'</h6>';
str+='<div class="form-floating mb-3 allo__login">';
str+='<textarea rows="3" name="instruction[]" id="instruction_'+rowc+'"></textarea>';
str+='</div>';

str+='</div>';
str+='</div>';

$("#medicine_details").append(str);
  counter++;
     $("#hiddenVal").val(counter);
     console.log(counter);
  });

 function delRowneweditt(num){
  
  $('.lab_tested_'+num).remove();
}
var rowcc = 1; 
$("#add_test_edit").click(function(){
  var strr = '';
 rowcc++;
 strr+='<div class="lab_tested_'+rowcc+'">';
strr+='<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">';
strr+='<div class="form-field6 lab-field1">';
strr+='<input type="text" value="" name="lab_test[]" id="lab_test_'+rowcc+'" placeholder="Suggested Lab Test">';
strr+=' <button type="button" onclick="delRowneweditt('+rowcc+');"class="add-test"> x </button>';
strr+='</div>';
strr+='</div>';
strr+='</div>';
$("#lab").append(strr);
});

var rowc =   parseInt($("#positionCount").val());
  $("#add_row_position").click(function(){
    var counter = parseInt($("#positionCount").val());
    if(counter<10){
        var invoicePosition=$('#invoicePosition').val();
        var positionQuantity=$('#positionQuantity').val();
        var str = '';
      rowc++;
      str+='<div class="block-element_'+rowc+'">';
      str+='<div class="box-type4">';
      str+='<button type="button" onclick="delRownewedit('+rowc+');" class="close-icon2"> <i class="fa fa-times"> </i> </button>'; 
      str+='<div class="row">';
      

      str+='<div class="col-md-6 col-lg-6 col-sm-6 col-xs-12">';
      str+='<div class="form-field6 form-group">';
      str+='<p>'+positionQuantity+'</p>';

      str+='<input type="text" name="position_quantity[]" id="position_quantity_'+rowc+'" class="form-control" required="required">';

        str+='</div>';
      str+='</div>';


      str+='</div>';
      str+='</div>';
      str+='</div>';
      str+='</div>';

      $("#position_details").append(str);
        counter++;
          $("#positionCount").val(counter);
          console.log(counter);
      }else{
        alert("The Maximum Limit of positions has been used")
      }
    }); 


 /*$('form.commentForm').on('submit', function(event) {

            // adding rules for inputs with class 'comment'
            $('input.comment').each(function() {
                $(this).rules("add", 
                    {
                        required: true
                    })
            });  
                      

            // prevent default submit action         
            event.preventDefault();

            // test if form is valid 
            if($('form.commentForm').validate().form()) {
                console.log("validates");
            } else {
                console.log("does not validate");
            }
        })*/

 // $("#diagnosis").change(function() {
 //    var cat_id = $(this).val();
       
 //    if(cat_id != "other") {
 //      $.ajax({
 //      url:base_url+"Doctor/booking/getillness",
 //      data:{cat_id:cat_id},
 //      type:'POST',
 //      success:function(response) {
 //        var resp = $.trim(response);
 //        console.log(resp);
 //        $('#illness_div').show();
 //          $("#diagnosis_div").hide();
 //        $("#inllness").html(resp);
 //      }
 //      });
 //    } 
 //    else if(cat_id == "other")
 //     {
 //      $('#illness_div').hide();
 //      $("#diagnosis_div").show();
 //    }
 //    else
 //    {
 //      $('#illness_div').show();
 //       $("#sub_category").html("<option value=''>--Select illness--</option>");
 //    }
 //  });

 function getunit(id)
 {
  var idd = $('#intake_method_'+id).val();
    $.ajax({
      url:base_url+"Doctor/booking/getintakeunit",
      data:{intake_id:idd},
      type:'POST',
      success:function(response) {
        var resp = $.trim(response);
        if(resp != ''){
        $("#unit_"+id).html(resp);
        }
        else
        {
          console.log('else');
          $("#unit_"+id).empty();
          $('#unit_'+id).removeAttr('required');
          $('#qty_'+id).removeAttr('required');
        }
      }
      });
 }



        $(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function (form) {
        	var make_selection = 0;
        	$('.check_box_selection').each( function (){
	            if($(this).prop('checked') == true){
	                if($(this).val() == 3 || $(this).val() == 2 || $(this).val() == 13 || $(this).val() == 4)
	                {
	                	
	                	make_selection = 1;
	                }
	            }
	        });
	        if(make_selection == 1)
	        {
	        	
	        	if($('.new_check_val2').is(':checked'))
	        	{
	        		console.log('work')
	        		Swal.fire({
						 icon: 'success',
						 html: confirmation_message,
						 showCancelButton: true,
			            confirmButtonText: yes,
			            cancelButtonText: no,
					 }).then((result) => {
			  			if (result.isConfirmed) {
			  				form.submit();
						}
					});
	        	}else
	        	{
	        		Swal.fire({
							 icon: 'error',
							 html: add_consultation_obli_message,
							 showCancelButton: false,
				            confirmButtonText: 'Ok',
				            cancelButtonText: no,
						 })
	        	}
	        	
	        }else
	        {
	        	Swal.fire({
						 icon: 'success',
						 html: confirmation_message,
						 showCancelButton: true,
			            confirmButtonText: yes,
			            cancelButtonText: no,
					 }).then((result) => {
			  			if (result.isConfirmed) {
			  				form.submit();
						}
					});
	        }
	        
        	
       
        }
      });
      $('#Consultation').validate({
        rules: {
          otherdig: {
             required: function(element) {
                if ($("#diagnosis").val() == 'other') {
                    return true;
                } else {
                    return false;
                }
            },
          },   
        },
        messages: {
          otherdig: {
            required: "This field is required",
          },
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });

var intervalId = window.setInterval(function(){
  $( "#dropnotification" ).load(window.location.href + " #dropnotification" );

}, 10000);



function showbookingdata(id)
{
    $.ajax({
            type:"POST",
            url:base_url+"Doctor/booking/get_booking_details", 
            data: {
              id:id
            },          
            success: function(result) { 
            var res = JSON.parse(result);    
            console.log(res);  
           if(res.status == true)
           {    
            $('#p_name').text(res.data.name);
            $('#p_phone').text(res.data.mobile);
            $('#p_intolerances').text(res.data.intolerances);
            $('#p_allergies').text(res.data.allergies);
            $('#p_email').text(res.data.email);
            $('#p_slot').text(res.data.time_slot+' | '+res.data.date); 
            $('#visit').text(res.data.type+' Visit');
            $('#gender').text(res.data.gender+'/'+res.data.age);
            $('#p_for').text(res.data.for);   
            $('#p_relation').text(res.data.relation);
            $('#p_address').text(res.data.address);
            $('#p_message').text(res.data.message);
            $('#booking_id').text(res.data.id);
            $('#booking_type').text(res.data.booking_type);  
            $('#pay_method').text(res.data.payment_method);
            if(res.data.payment_method != false) 
            {
            	$('#payment').text(currency_symbole+' '+res.data.total_payment);
            }else
            {
            	$('#payment').text('insurance');
            }
            
            $('#paid').text(res.data.paid);
            if(res.data.payment_method == 'Insurance'){
              $('#payment').closest('li').hide();
            }else{
              $('#payment').closest('li').show();
            }
            $('#clinic_name').text(res.data.clinic_name);
           
          var dateOne = new Date(res.data.booking_dates);
           var today = new Date();
           var dd = String(today.getDate()).padStart(2, '0');
           var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
          var yyyy = today.getFullYear();

          var todayDate = yyyy+'-'+mm +'-'+dd;
          var dateOne1 = new Date(res.data.booking_dates);
           var today1 = new Date(todayDate);
           //if(today1.getTime() !==  dateOne1.getTime()) 
           if(dateOne1.getTime() === today1.getTime())
            {    
              var urrl = base_url+'Doctor/booking/consultation/'+res.data.idd;
              $('#consultation').html('<a href='+urrl+' class="btn btn-primary w-100 me-3"> <svg class="" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none"><path d="M12.5 2.5C6.99 2.5 2.5 6.99 2.5 12.5C2.5 18.01 6.99 22.5 12.5 22.5C18.01 22.5 22.5 18.01 22.5 12.5C22.5 6.99 18.01 2.5 12.5 2.5ZM16.85 16.07C16.71 16.31 16.46 16.44 16.2 16.44C16.07 16.44 15.94 16.41 15.82 16.33L12.72 14.48C11.95 14.02 11.38 13.01 11.38 12.12V8.02C11.38 7.61 11.72 7.27 12.13 7.27C12.54 7.27 12.88 7.61 12.88 8.02V12.12C12.88 12.48 13.18 13.01 13.49 13.19L16.59 15.04C16.95 15.25 17.07 15.71 16.85 16.07Z" fill="white" /></svg> '+start_chat+' </a>');          
            }
            else 
            {    
              $('#consultation').html('');
               
            }           

           $("#bsModal3").modal('show');
           }
           else
           {
            $('#todaysapp').show(); 
           }
            }
          });
}


 $(function() {
    $('#toggle-event').change(function() {
     if($(this).prop('checked'))
     {
           $.ajax({
              type:"POST",
              url:base_url+"Doctor/Doctorcontroller/doctor_online_offline", 
              data: {
                status:'1'
              },          
              success: function(result) { 
              var res = JSON.parse(result);    
              console.log(res);  
             if(res.status == true)
             {
                  $.toast({
                  text: "Your status updated successfully",
                  position: 'top-right',
                  loader: false,
                  stack: false,
                  hideAfter: 3000,
                  icon: 'success',
                  allowToastClose: false
              });
             }
             else
             {
                 $.toast({
                  text: "Please login first",
                  heading: "Error",
                  position: 'top-right',
                  loader: false,
                  stack: false,
                  hideAfter: 3000,
                  icon: 'error',
                  allowToastClose: false
              }); 
             }
                 }
            });
     }
     else
     {
         $.ajax({
              type:"POST",
              url:base_url+"Doctor/Doctorcontroller/doctor_online_offline", 
              data: {
                status:'0'
              },          
              success: function(result) { 
              var res = JSON.parse(result);    
              console.log(res);  
             if(res.status == true)
             {
                  $.toast({
                  text: "Your status updated successfully",
                  position: 'top-right',
                  loader: false,
                  stack: false,
                  hideAfter: 3000,
                  icon: 'success',
                  allowToastClose: false
              });
             }
             else
             {
                 $.toast({
                  text: "Please login first",
                  heading: "Error",
                  position: 'top-right',
                  loader: false,
                  stack: false,
                  hideAfter: 3000,
                  icon: 'error',
                  allowToastClose: false
              }); 
             }
                 }
            });
     }
      
    })
  })


 $(document).ready(function() { 
         
     
      
             $.ajax({
            type:"GET",
            url:base_url+"Doctor/payouts/getdata", 
                      
            success: function(result) { 
            var res = JSON.parse(result);   
                     
           if(res.status == true)
           {              
              if(res.data.clinic == null)
              {
                $('#total_clinic').text('0');
              }
              else
              {
                $('#total_clinic').text(currency_symbole+' '+res.data.clinic);
              }
               if(res.data.home == null)
              {
                $('#total_home').text('0');
              }
              else
              {
                $('#total_home').text(currency_symbole+' '+res.data.home);
              }
               if(res.data.online == null)
              {
                $('#total_online').text('0');
              }
              else
              {
                $('#total_online').text(currency_symbole+' '+res.data.online);
              }
              if(res.data.total_income == null)
              {
                $('#total_earning').text('0');
              }
              else
              {
                $('#total_earning').text(currency_symbole+' '+res.data.total_income);
              }

               if(res.data.commission_paid == null)
              {
                $('#total_commission').text('0');
              }
              else
              {
                $('#total_commission').text(currency_symbole+' '+res.data.commission_paid);
              }
               if(res.data.wallet_bal == null)
              {
                $('#total_commissions').text('0');
                $('#hidden_bal').val('0');
                $('#total_sent').val(0);
              }
              else
              {
                $('#total_commissions').text(res.data.wallet_bal);
                $('#hidden_bal').val(res.data.wallet_bal);
                 $('#total_sent').val(res.data.total_balance);
              }
             
           }
           else
           {
            $('#todaysapp').show(); 
           }
            }
          });
      });

 function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {

    alert('Only Number allowed!');
    return false;
  }
  return true;
}

 var myEl = document.getElementById('payoutrequest');
 var isClicked = 0;
 if(myEl){
     myEl.addEventListener('click', function() {

    var request_amount = ($('#request_amount').val()).trim();
    $('#request_amount_error').text('');
    if(request_amount == '' || request_amount == null)
    {
      $('#request_amount_error').text('Request Amount can not be empty');
      return false;
    }
    request_amount = parseInt(request_amount);
    if(request_amount < 50)
    {
      $('#request_amount_error').text('Request amount should not less than 50 dollars');
      return false;
    }
    if(request_amount > 2999)
    {
      $('#request_amount_error').text('Request amount should not greater than 3000 dollars');
      return false;
    }
    //return false;

    
    // else if(request_amount != '' || request_amount != null)
    // {
    //   request_amount = parseInt(request_amount);
    //   if(request_amount <50)
    //   {
    //     error++;
    //     $('#request_amount_error').text('Request amount should not less than 50 dollars');
    //   }
    //   else if(request_amount > 2999)
    //   {
    //     error++;
    //     $('#request_amount_error').text('Request amount should not greater than 3000 dollars');
    //   }
    //   else if(hidden_am == 0 || hidden_am < 0)
    //   {
    //     error++;
    //     $('#request_amount_error').text('available balance is less than the requested amount ');
    //   }
    //    else if(hidden_am < request_amount)
    //   {
    //     error++;
    //     $('#request_amount_error').text('You have already sent available balance request');
    //   }
    //    else
    //   {
    //     $('#request_amount_error').text('');
       
    //   }
    // }
    if(isClicked > 0)
    {
      return false;
    }
    isClicked = 1;
    $.ajax({
        url:base_url+"Doctor/payouts/sendrequest",
        data:{amount:request_amount},
        type:'POST',
        success:function(response) {
         var resp = JSON.parse(response);
         if(resp.status == 'true')
         {
                  $.toast({
                    text: resp.message,
                    position: 'top-right',
                    loader: false,
                    stack: false,
                    hideAfter: 3000,
                    icon: 'success',
                    allowToastClose: false
                });
                
                setTimeout(function(){ location.reload(true); }, 2000);

        }
         else
         {
             $.toast({
              text: resp.message,
              heading: "Error",
              position: 'top-right',
              loader: false,
              stack: false,
              hideAfter: 3000,
              icon: 'error',
              allowToastClose: false
          }); 
         }
         isClicked = 0;
        },
       error: function(request, status, err)
       {
          isClicked = 0;
          $.toast({
              text: 'Internal server error',
              heading: "Error",
              position: 'top-right',
              loader: false,
              stack: false,
              hideAfter: 3000,
              icon: 'error',
              allowToastClose: false
          });
          console.log(err);
       }
        });

  }, false);
 }


 $(document).ready(function () {
      $.validator.setDefaults({
        submitHandler: function () {
        form.submit();
        }
      });
      $('#new_account').validate({
       
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });

 function newTab()
   {
     window.open('www.google.com', '_blank', 'toolbar=0,location=0,menubar=0');
   }

    
