var DASHURL =  BASEURL+'/dashboard';

var DASHSTATIC =  BASEURL+'/system/static/dashboard';

var COMMONAJAX =DASHURL+'/commonajax';

var currentAjax = 0 ;
var btnText = 'Submit';
var csrfToken = $('input[name=_token]:last').val();

function ActivateDeActivateThisRecord(obj, tableName,id) {

    var $tr = $(obj).closest('tr');

    var index = $tr.index();

    $newindex=$('#my-dataTable').find('tbody tr:eq('+parseInt(index)+')').find('td:last').index();

    $status=$(obj).attr('data-status');

    $status=($status.trim()=='0')?1:0;

    $msg=($status==1) ? "Do You Want To Make This As DeActive" : "Do You Want To Make This As Active";

    var action = "CallHandlerForActivatedRecord(" + id + "," + index + ",'" + tableName + "',"+$status+");";

  removePopover();
  $(obj).popover({
      placement : 'top',
      html : true,
      title : 'Active/DeActive <a href="javascript:" onclick="removePopover();" class="close" data-dismiss="alert">&times;</a>',
      content : '<div class="row" id="popover-section"><div class="col-sm-12"><p>' + $msg + '</p><p class=msg></p></div><div class="col-sm-12"><a href="javascript:void(0)" id="deleteyes" onclick="' + action + '" class="btn btn-primary mr-1 btn-popover pull-right">Yes</a><a href="javascript:void(0)" onclick="removePopover();" class="btn btn-danger mr-1 pull-right">No</a></div></div>'
  }).popover('show');

}


function CallHandlerForActivatedRecord(id,index, tab,status) {

  $('#deleteyes').html("Processing..");
  $('#popover-section').find('.msg').html('').css('display','none');

  
    currentAjax = 1 ;
    $.ajax({

    url: COMMONAJAX, 

    type: "POST",

    data: {action:'changeStatus', id: id, tab: tab, status: status, _token:csrfToken },

    dataType: "text",

    success: function (response) {
      response = JSON.parse(response);
      if(response.valid){

        $newindex=$('#my-dataTable').find('tbody tr:eq('+parseInt(index)+')').find('td:last').index();

        /*Change Status Text*/

        $objstatustxt=$('#my-dataTable').find('tbody tr:eq('+parseInt(index)+')').find('td:eq('+parseInt($newindex-1)+')');

        var statustxt=( status == 0 ) ? 'Active' : 'DeActive';
        if(tab != 'product' && tab != 'addons')
          $objstatustxt.html(( status == 0 ) ? "Active" : "DeActive");

        /*Change Class*/

        $('#my-dataTable').find('tbody tr:eq('+parseInt(index)+')').find('td:last').find('button').attr('data-status',statustxt);
        if( status == 0 )
          $('#my-dataTable').find('tbody tr:eq('+parseInt(index)+')').find('td:last').find('button.text-danger').addClass('text-success').removeClass('text-danger');
        else        
          $('#my-dataTable').find('tbody tr:eq('+parseInt(index)+')').find('td:last').find('button.text-success').addClass('text-danger').removeClass('text-success');
        removePopover();
      }else
        $('#popover-section').find('.msg').html(getMsg(((response.msg)?response.msg:"Something went wrong!"),2)).css('display','block');
        
        $('#deleteyes').html('Yes');
        
      setTimeout(function(){$('#popover-section').find('.msg').html('').css('display','none');} , 2000);  
            
      
    },
    error:function(response){
    currentAjax = 0 ;     
        $('#deleteyes').html('Yes');
        $('#popover-section').find('.msg').html(getMsg("Something went wrong!",2)).css({'display':'block'});
      setTimeout(function(){$('#popover-section').find('.msg').html('').css('display','none');} , 2000);
    }

  });

}


function removePopover(){
  $('.popover').popover('dispose');
}

/***************** End Active DeActive records ****************/
/*********************** Delete Records ***********************/

function delete_row(obj,tab,id){  

  var  $tr=$(obj).closest('tr');

  var index=$tr.index();

  var action = "CallHandlerForDeleteRecord(" + id + "," + index + ",'" + tab + "');";

  removePopover();
  $(obj).popover({
      placement : 'top',
      html : true,
      title : 'Active/DeActive <a href="javascript:" onclick="removePopover();" class="close" data-dismiss="alert">&times;</a>',
      content : '<div class="row" id="popover-section"><div class="col-sm-12"><p>Are You Sure Want To Delete This Record ?</p><p class=msg></p></div><div class="col-sm-12"><a href="javascript:void(0)" id="deleteyes" onclick="' + action + '" class="btn btn-primary mr-1 btn-popover pull-right">Yes</a><a href="javascript:void(0)" onclick="removePopover();" class="btn btn-danger mr-1 pull-right">No</a></div></div>'
  }).popover('show');

}

function CallHandlerForDeleteRecord(id,index, tab) {

  $('#deleteyes').html("Processing");

  var formData={action:"deleteRecord",tab:tab,id:id,_token:csrfToken};

  
    currentAjax = 1 ;
    $.ajax({

    url: COMMONAJAX,

    type: "POST",

    data: formData,

    success: function (d) {

      var $ntr = $('#my-dataTable').find('tbody').find('tr:eq(' + index + ')');

      $ntr.remove();

      removePopover();

    },
    error : function(d) {}

  });

}

// set up message html
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