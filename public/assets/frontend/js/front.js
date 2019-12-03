var _token = $('meta[name="csrf-token"]').attr('content');
var btntext = 'Submit';

function logincheck(obj,e){
  e.preventDefault();

  $(obj).find('.msg').html('').css('display','none');
  var action =  $(obj).find('input[name=action]').val();
  var username = $(obj).find('input[name=uname]').val();
  var password = $(obj).find('input[name=pswd]').val();

  $.ajax({
    url: COMMONURL,
    type:'POST',
    data: {action:action, _token:_token , username:username, password:password},
    dataType: "json",
    success: function(response) {   
      if(response.valid){

        ResetTextBox(obj);
        $(obj).find('.msg').html(getMsg(response.msg,1)).css('display','block');
        if(response.role == 'admin')
          setTimeout(function(){(window.location.href=BASEURL+'/dashboard');},1000);
        else if(response.role == 'client')
          setTimeout(function(){window.location.href=BASEURL+'/client';},2000);

        else if(response.role == 'user') {
          $('.login_dashboard').find('.login_user_name').text(response.first_name);
          
          setTimeout(function(){
            $('.login_regis').addClass('hide');
            $('.login_dashboard').removeClass('hide');
            $('#login_regis, #login_signin').modal('hide');
            $(obj).find('.msg').html('').css('display','none');
            window.location.href=BASEURL+'/user-dashboard';
          },1000);

        }else
        setTimeout(function(){(window.location.href=location.href);},1000);
      }else{
        $(obj).find('.msg').html((response.msg)?getMsg(response.msg,2):getMsg('Something is wrong',2)).css('display','block');
        $(obj).find('.validate-form').html(btntext);
      }
    },
    error:function(response){
      $(obj).find('.validate-form').html(btntext);
      $(obj).find('.msg').html(getMsg('Something is wrong',2)).css('display','block');
    }

  });
}

function forgot_password_email(obj,e){
  e.preventDefault();
  $(obj).find('.msg').html('').css('display','none');
  var action =  $(obj).find('input[name=action]').val();
  var password = $(obj).find('input[name=pswd]').val();
  var email = $(obj).find('input[name=email]').val();
  $.ajax({
    url: COMMONURL,
    type:'POST',
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
    data: {action:action, email:email, password:password},

    success: function(data) {  
   
      if(data.valid){

        ResetTextBox(obj);
        $(obj).find('.msg').html(getMsg(data.data,1)).css('display','block');
       
        setTimeout(function(){
           $(obj).find('.msg').html('').css('display','none');
         window.location.href=BASEURL+'/';  
        },1000);
        
      }else{
        $(obj).find('.msg').html((data.data)?getMsg(data.data,2):getMsg('Something is wrong',2)).css('display','block');
        
      }
       $(obj).find('.validate-password-email').html('Submit');
      $('html, body').animate({

        scrollTop: 0

      }, 500);
    },

    error:function(response){

      $(obj).find('.validate-password-email').val('Submit');

      $(obj).find('.msg').html(getMsg('Something is wrong',2)).css('display','block');

    }

  });
}

// User Registration
function registration(obj,e) {
  debugger;
  e.preventDefault();

  if (!$('#agree').is(':checked')) {
    $(obj).find('.msg').html(getMsg('Please agree with our terms and conditions.',2)).css('display','block');
    $(obj).find('.validate-password').html(btntext);
    return false;
  }

  $(obj).find('.msg').html('').css('display','none');
  
  var role      = $(obj).find('input[name=role]:checked').val();
  var action    = $(obj).find('input[name=action]').val();
  var firstname = $(obj).find('input[name=fname]').val();
  var lastname  = $(obj).find('input[name=lname]').val();
  var email     = $(obj).find('input[name=email]').val();
  var password  = $(obj).find('input[name=pswd]').val();

  $.ajax({
    url: COMMONURL,
    type:'POST',
    data: {action:action, _token:_token, role:role, firstname:firstname, lastname:lastname, email:email, password:password},
    dataType: "json",

    success: function(response) {   
      if(response.valid){
        ResetTextBox(obj);
        $(obj).find('.msg').html(getMsg(response.msg,1)).css('display','block');
        if(response.role == 'client')
          setTimeout(function(){window.location.href=BASEURL+'/client';},2000);

        else if(response.role == 'user') {
          $('.login_dashboard').find('.login_user_name').text(response.first_name);

          setTimeout(function(){
            $('.login_regis').addClass('hide');
            $('.login_dashboard').removeClass('hide');
            $('#login_regis, #login_signin').modal('hide');
            $(obj).find('.msg').html('').css('display','none');
          },1000);

        }else
        setTimeout(function(){(window.location.href=location.href);},1000);

      }else{
        $(obj).find('.msg').html((response.msg)?getMsg(response.msg,2):getMsg('Something is wrong',2)).css('display','block');
        $(obj).find('.validate-password').html(btntext);
      }
    },
    error:function(response){
      $(obj).find('.validate-password').html(btntext);
      $(obj).find('.msg').html(getMsg('Something is wrong',2)).css('display','block');
    }
  });
}

function jobsubmit(obj,e){
	  e.preventDefault();
	  job_data = $("#jobsubmit").serialize();
	$.ajax({
    url: COMMONURL,
    type:'POST',
    data:job_data,
    dataType: "json",
    success: function(response) {
      if(response.valid){
		  ResetTextBox(obj);
		   $('.alert-success').show();
           $('.alert-success').append('<p>'+response.message+'</p>');
		   setTimeout(function(){
            $('#jobpopup').modal('hide');
          },1000);
        
      }else{
		  if(response.errors > 0){
			  $.each(response.errors, function(key, value){
                  			$('.alert-danger').show();
                  			$('.alert-danger').append('<p>'+value+'</p>');
        });
		  }else{
			  $('.alert-danger').show();
              $('.alert-danger').append('<p>'+response.message+'</p>');
		  }
		
      }
    },
    error:function(response){
		$.each(response.errors, function(key, value){
                  			$('.alert-danger').show();
                  			$('.alert-danger').append('<p>'+value+'</p>');
     
		
		});
	
}
	});
}
function getpriceofuser (){
	
	var user_price = $('#user_price').val();
	var price_type = $('#price_type').val();
	var hour = $('#working_hour').val();
	var start_date = new Date($('#start_date').val());
	var end_date = new Date($('#end_date').val());
	var Diff = end_date.getTime() - start_date.getTime();
	var days = Diff/ (1000 * 3600 * 24);
	var days = days+1;
	if(hour > 0 && days> 0){
		
		var total_price = user_price*hour*days;
		$('#price').val(total_price);
		if(price_type == '1'){
			$('#price').removeAttr('readOnly');
		}else{
			 $('#price').attr("readOnly", "readOnly");
		}
	}else{
		if(price_type == '0'){
			 $('#price').attr("readOnly", "readOnly");
		}else if(price_type == '1'){
			$('#price').removeAttr('readOnly');
		}
		$('#price').val(0);
	}
	
  
}
function state_list(obj,e){
	  e.preventDefault();
	  country_id = obj;
	  $("#state").empty();
      $("#city").empty();
       $("#state").append('<option>Loading</option>')
	  var action =  'getstate';
 
  $.ajax({
    url: COMMONURL,
    type:'POST',
	headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
    data:{action:action,country_id:country_id},
    dataType: "json",
    success: function(response) {
		 $("#state").empty();
		 $("#state").append('<option>Select State</option>');
		 $("#city").empty();
		  $("#city").append('<option>Select City</option>'); 
        if(response.valid){
         
          $.each(response.data,function(key,value){
            $("#state").append('<option value="'+key+'">'+value+'</option>');
         });
        }
    },
    error:function(response){
          
    }
  });
	
}
function city_list(obj,e){
	  e.preventDefault();
	  state_id = obj;
	  $("#city").empty();
      $("#city").append('<option>Loading</option>')
	  var action =  'getcity';
 
  $.ajax({
    url: COMMONURL,
    type:'POST',
	headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
    data:{action:action,state_id:state_id},
    dataType: "json",
    success: function(response) {
		 $("#city").empty();
		  $("#city").append('<option>Select City</option>');
        if(response.valid){
          $.each(response.data,function(key,value){
            $("#city").append('<option value="'+key+'">'+value+'</option>');
         });
        }
    },
    error:function(response){
          
    }
  });
	
}


/*------Forgot Password----*/
function forgotcheck(obj,e){
  debugger;
  e.preventDefault();
  $(obj).find('.msg').html('').css('display','none');
  var action =  $(obj).find('input[name=action]').val();
  var email = $(obj).find('input[name=email]').val();

  $.ajax({
    url: COMMONURL,
    type:'POST',
    headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')},
    data: {action:action, email:email},
    success:function(data){
      debugger;
      if(data.valid){

        $(obj).find('.msg').html(getMsg(data.data,1)).css('display','block');

        ResetTextBox(obj);

        setTimeout(function(){
          //$('#Forgot_pass').modal('hide');
          $('#forgotemail').val('');
          $(obj).find('.msg').html('').css('display','none');
        },3000);

      }else
      $(obj).find('.msg').html((data.data)?getMsg(data.data,2):getMsg('Something is wrong',2)).css('display','block');

      $(obj).find('.validate-forgot-password').html('Submit'); 
      $('html, body').animate({

        scrollTop: 0

      }, 500);       

    },

    error:function(response){
      debugger;
      $(obj).find('.validate-forgot-password').html('Submit');
      $(obj).find('.msg').html(getMsg('Something is wrong',2)).css('display','block');

    }

  });
}

function printErrorMsg (msg) {
  debugger;
  $(".print-error-msg").find("ul").html('');
  $(".print-error-msg").css('display','block');
  /*$.each( msg, function( key, value ) {*/
    debugger;
    $(".print-error-msg").find("ul").append('<li>'+msg+'</li>');
    /*});*/
  }
  $(document).ready(function(){ 

    $('.validate-form').unbind("click").click(function(e){

      e.preventDefault();

      btntext = $(this).html();

      if($(this).html()=='<i class="fa fa-spinner fa-spin"></i>')
        return false;

      $(this).html('<i class="fa fa-spinner fa-spin"></i>');

      var chk=0;

      var obj=$(this).closest('form');

      if(TextBoxValidation(obj)==false)

        chk=1;

      if(chk===1){

        $(this).text(btntext);

        return false;

      }

      obj.submit();
    });
    $('.validate-forgot-password').unbind("click").click(function(e){

      e.stopPropagation();

      var btntext = $(this).html();

      if($(this).html()=='<i class="fa fa-spinner fa-spin"></i>')

        return false;

      $(this).html('<i class="fa fa-spinner fa-spin"></i>');

      var chk=0;

      var obj=$(this).closest('form');

      if(TextBoxValidation(obj)==false)

        chk=1;

      if(chk===1){

        $(this).text(btntext);

        return false;

      }

      obj.submit();
    }); 
    $('.validate-password').on('click', function(){
      debugger;
      if($(this).html()== 'Processing..')
        return false;
      var btnObj = $(this);
      var btntext = $(this).html();
      $(this).html('Processing..');
      var chk=0;
      var obj=$(this).closest('form');
      if( TextBoxValidation(obj) === false){
        obj.find('.error:eq(0)').focus();
        chk=1;      
      }
      obj.find('input[type=password]').not("input[name='currentPassword']").each(function () {
        if (!validatePassword($(this).val())) {
          $(this).css("border", "solid 1px #DC3C1E");       

          $(this).addClass("error");

          ($(this).closest("div").find('label.error').length>0)?"":$(this).closest("div").append('<label class="error text-danger">Password must contain at least 8 characters including one lowercase letter, one uppercase letter, one numeric digit, and one special character.</label>');

          chk = 1;

        }else{

          if(!$(this).hasClass('more_error')){            

            $(this).removeClass("error");

            $(this).closest("div").find('label.error').remove();
          }
        }
      });
      if(obj.find('#password').val().length > 5){
        if(obj.find('#password').val() != obj.find('#confirmPassword').val()){
          var pasObj = ('#confirmPassword');
          $(pasObj).addClass("error");
          ($(pasObj).closest("div").find('label.error').length>0)?"":$(pasObj).closest("div").append('<label class="error text-danger">Password and confirm password does not match.</label>');
          chk = 1;
        }else{
          if(!$(pasObj).hasClass('more_error')){            
            $(pasObj).removeClass("error");
            $(pasObj).closest("div").find('label.error').remove();
          }
        }
      }
      if(chk===1){
        btnObj.html(btntext);
        return false;
      }else
      obj.submit();
    });

    $('.validate-password-email').on('click', function(){
      debugger;
      if($(this).val()== 'Processing..')
        return false;
      var btnObj = $(this);
      var btn = $(this).val();
      $(this).val('Processing..');
      var chk=0;
      var obj=$(this).closest('form');
      if( TextBoxValidation(obj) === false){
        obj.find('.error:eq(0)').focus();
        chk=1;      
      }
      obj.find('input[type=password]').not("input[name='currentPassword']").each(function () {
        if (!validatePassword($(this).val())) {
          $(this).css("border", "solid 1px #DC3C1E");       

          $(this).addClass("error");

          ($(this).closest("div").find('label.error').length>0)?"":$(this).closest("div").append('<label class="error text-danger">Password must contain at least 8 characters including one lowercase letter, one uppercase letter, one numeric digit, and one special character.</label>');

          chk = 1;

        }else{

          if(!$(this).hasClass('more_error')){            

            $(this).removeClass("error");

            $(this).closest("div").find('label.error').remove();
          }
        }
      });
      if(obj.find('#pswd').val().length > 5){
        if(obj.find('#pswd').val() != obj.find('#cpswd').val()){
          var pasObj = ('#cpswd');
          $(pasObj).addClass("error");
          ($(pasObj).closest("div").find('label.error').length>0)?"":$(pasObj).closest("div").append('<label class="error text-danger">Password and confirm password does not match.</label>');
          chk = 1;
        }else{
          if(!$(pasObj).hasClass('more_error')){            
            $(pasObj).removeClass("error");
            $(pasObj).closest("div").find('label.error').remove();
          }
        }
      }
      if(chk===1){
        btnObj.val(btn);
        return false;
      }else
      obj.submit();
    });
  });
function TextBoxValidation(obj) {

  var check = true;

  $(obj).find('input[type=text],input[type=password],input[type=email],input[type=file],input[type=date],textarea,select').each(function () {

    var c = $(this).attr('required');

    if($(this).prop("tagName").toLowerCase() == 'select' && $(this).prop('multiple'))

      var v = 'check';

    else

      var v = $(this).val().trim();

    $(this).css("border", "solid 1px #c9cfd4");

    if (c == 'required' && v == '') {

      $(this).css("border", "solid 1px #DC3C1E");

      check = false;

    }      

    if (c == 'required' && v == '') {

      $(this).addClass("error");

      ($(this).closest("div").find('label.error').length>0)?"":$(this).closest("div").append('<label class="error text-danger">This field is required.</label>');

      check = false;

    }

    else if ($(this).attr('type')=='email' && validateEmail($(this).val().trim()) == false) {

      $(this).addClass("error");

      ($(this).closest("div").find('label.error').length>0)?$(this).closest("div").find('label.error').text('invalid email-id.'):$(this).closest("div").append('<label class="error text-danger">invalid email-id.</label>');

      check = false;

    }

    else{

      if(!$(this).hasClass('more_error')){            

        $(this).removeClass("error");

        $(this).closest("div").find('label.error').remove();

      }

    }

  });

  return check;

}

function formValidation(obj) {

  var check = true;

  $(obj).find('input[type=text],input[type=password],input[type=email],input[type=file],input[type=date],textarea,select').each(function () {

    var c = $(this).attr('required');

    if($(this).prop("tagName").toLowerCase() == 'select' && $(this).prop('multiple'))

      var v = 'check';

    else

      var v = $(this).val().trim();

    $(this).css("border", "solid 1px #c9cfd4");

    if (c == 'required' && v == '') {

      $(this).css("border", "solid 1px #DC3C1E");

      check = false;

    }else if ($(this).attr('type')=='email' && validateEmail($(this).val().trim()) == false) {

      $(this).addClass("error");

      $(this).css("border", "solid 1px #DC3C1E");

      check = false;

    }

    else{

      if(!$(this).hasClass('more_error')){            

        $(this).removeClass("error");

        $(this).closest("div").find('label.error').remove();

      }

    }

  });

  return check;

}



/*----------------------------Email Validation-------------------------------------------------*/

function validateEmail(email) {

  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\.+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  return re.test(email);

}



function ResetTextBox(obj) {

  $(obj).find('input[type=text]').val('');

  $(obj).find('input[type=password]').val('');

  $(obj).find('input[type=email]').val('');

  $(obj).find('input[type=checkbox]').prop('checked',false);

  $(obj).find('input[type=radio]').prop('checked',false);

  $(obj).find('textarea').val('');

  $(obj).find('select').prop('selected',false);  

}



function OnlyAlphabet() {

  var charCode = (event.which) ? event.which : event.keyCode;

  if ((charCode > 64 && charCode < 91) || (charCode > 96 && charCode < 123))

    return true;

  else

    return false

}



function OnlyFloat() {

  var value = $(event.target).val()

  var charCode = (event.which) ? event.which : event.keyCode;

  if((value.indexOf('.')!=-1) && (charCode < 48 || charCode > 57))

    return false;

  else if((charCode != 46 || $(event.target).val().indexOf('.') != -1) && (charCode < 48 || charCode > 57))

    return false;

  return true;

}



function OnlyInteger() {

  if (String.fromCharCode(event.keyCode).match(/[^0-9]/g)) return false;

}



function validatePassword(str = '', lngth = 8 , isUpper = true , isLower = true , isNumber = true) {

  return (isUpper == true && !str.match(/[A-Z]/g) )?false:(isLower == true && !str.match(/[a-z]/g) )?false:(isNumber == true && !str.match(/[0-9]/g))? false:(str.length < lngth)?false:true;

}

function ResetTextBox(obj) {

  $(obj).find('input[type=text]').val('');

  $(obj).find('input[type=password]').val('');

  $(obj).find('input[type=email]').val('');

  $(obj).find('input[type=checkbox]').prop('checked',false);

  $(obj).find('input[type=radio]').prop('checked',false);

  $(obj).find('textarea').val('');

  $(obj).find('select').prop('selected',false);  

}
function getMsg(message="", msgtype=1){

if(msgtype == 1){ //success message

  msg = '<div onclick="javascript:$(this).fadeOut(500)" style="list-style: none;overflow: hidden; margin: 4px 0px; border-radius: 2px; border-width: 2px; border-style: solid; border-color: rgb(124, 221, 119); box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 4px; background-color: rgb(188, 245, 188); color: darkgreen; cursor: pointer;" class="animated flipInX"><div class="noty_bar noty_type_success" id="noty_1432600013676628200"><div class="noty_message" style="font-size: 14px; line-height: 16px; text-align: center; padding: 10px; width: auto; position: relative;"><div class="noty_text" style="font-family: Nunito Sans, sans-serif;">'+message+'</div></div></div></div>';

} else if(msgtype == 2){ //Error message

  msg ='<div onclick="javascript:$(this).fadeOut(500)" style="list-style: none;overflow: hidden; margin: 4px 0px; border-radius: 2px; border-width: 2px; border-style: solid; border-color: rgb(226, 83, 83); box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 4px; background-color: rgb(255, 129, 129); color: rgb(255, 255, 255); cursor: pointer;" class="animated flipInX"><div class="noty_bar noty_type_error" id="noty_505214828237683140"><div class="noty_message" style="font-size: 14px; line-height: 16px; text-align: center; padding: 10px; width: auto; position: relative; font-weight: bold;"><div class="noty_text" style="font-family: Nunito Sans, sans-serif;">'+message+'</div></div></div></div>';

} else if(msgtype == 3){ //Warning message

  msg ='<div onclick="javascript:$(this).fadeOut(500)" style="list-style: none;overflow: hidden; margin: 4px 0px; border-radius: 2px; border-width: 2px; border-style: solid; border-color: rgb(255, 194, 55); box-shadow: rgba(0, 0, 0, 0.1) 0px 2px 4px; background-color: rgb(255, 234, 168); color: rgb(130, 98, 0); cursor: pointer;" class="animated flipInX"><div class="noty_bar noty_type_warning" id="noty_140323524152335250"><div class="noty_message" style="font-size: 14px; line-height: 16px; text-align: center; padding: 10px; width: auto; position: relative;"><div class="noty_text" style="font-family: Nunito Sans, sans-serif;"><strong>Warning!</strong> <br> '+message+'</div></div></div></div>';

}

return msg;      

}



function searchgaurd(obj,e){
  e.preventDefault();

  var action =  $(obj).find('input[name=action]').val();
  var page =  $(obj).find('input[id=page]').val();
  var category = [];
  $("input[name='category[]']:checked").each(function(){
    category.push($(this).val());
  });
  var price = [];
  $("input[name='price[]']:checked").each(function(){
    price.push($(this).val());
  });
  var gender = [];
  $("input[name='gender[]']:checked").each(function(){
    gender.push($(this).val());
  });
  var weapon = [];
  $("input[name='weapon[]']:checked").each(function(){
    weapon.push($(this).val());
  });
  var duration = [];
  $("input[name='duration[]']:checked").each(function(){
    duration.push($(this).val());
  });

  $.ajax({
    url: COMMONURL,
    type:'POST', 
    data:{action:action,page:page, _token:_token , category:category, price:price, gender:gender, weapon:weapon, duration:duration},
    dataType: "json",
    success: function(data) {
      $('.search-gaurd-data').html(data.html);
    },
    error:function(response){

    }

  });
}
