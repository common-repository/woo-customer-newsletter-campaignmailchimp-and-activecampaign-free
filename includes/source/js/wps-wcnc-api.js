var $ =jQuery.noConflict();
$("#wps-wcnc-cust-all-mc-btn").click(function(){
  $("#wps-wcnc-cust-all-mc").submit();
});

$("#wps-wcnc-cust-all-cc-btn").click(function(){
  $("#wps-wcnc-cust-all-cc").submit();
}); 

$(document).ready(function() {
  get_mc_lists();
  get_ac_lists();
});
/*MailChimp Get List ID*/
$( "#wps_wcnc_mailchimp_key" ).keyup(function() {
    get_mc_lists();
});
function get_mc_lists(){
  if(!$( "#wps_wcnc_mailchimp_key" ).val()){
    return;
  }
  var data = {
    'action': 'wps_wcnc_get_mc_list',
    'dataType': "html",
    'api_key': $( "#wps_wcnc_mailchimp_key" ).val(),
  };
  $("#wps_wcnc_mailchimp_list_id").html('');
  $('.wpcWcncloaderDiv').show();
  jQuery.post(ajaxurl, data, function(response) {
      $("#wps_wcnc_mailchimp_list_id").html(response);
      $('.wpcWcncloaderDiv').hide();
  });
}
$( "#wps_wcnc_activecampaign_key" ).keyup(function() {
    get_ac_lists();
});
$( "#wps_wcnc_activecampaign_url" ).keyup(function() {
    get_ac_lists();
});
function get_ac_lists(){
  if(!$( "#wps_wcnc_activecampaign_key" ).val())
    return;
  if(!$( "#wps_wcnc_activecampaign_url" ).val())
    return;
  var data = {
    'action': 'wps_wcnc_get_ac_list',
    'dataType': "html",
    'api_key': $( "#wps_wcnc_activecampaign_key" ).val(),
    'url': $( "#wps_wcnc_activecampaign_url" ).val()
  };
  $("#wps_wcnc_activecampaign_list_id").html('');
  $('.wpcWcncloaderDiv').show();
  jQuery.post(ajaxurl, data, function(response) {
      $("#wps_wcnc_activecampaign_list_id").html(response);
      $('.wpcWcncloaderDiv').hide();
  });
}

/* iConatct Get List ID */
$( "#tes-eml-pup-ic-api-key" ).keyup(function() {
    icontactgetlist();
});
$( "#tes-eml-pup-ic-user-name" ).keyup(function() {
    icontactgetlist();
});
$( "#tes-eml-pup-ic-app-pass" ).keyup(function() {
    icontactgetlist();
});
function icontactgetlist(){
  if(!$( "#tes-eml-pup-ic-api-key" ).val())
    return;
  if(!$( "#tes-eml-pup-ic-user-name" ).val())
    return;
  if(!$( "#tes-eml-pup-ic-app-pass" ).val())
    return;
  if(!$( "#tesEmlPopId" ).val())
    return;
  //console.log('Key- '+$( "#tes-eml-pup-ic-api-key" ).val()+" Username-"+$( "#tes-eml-pup-ic-user-name" ).val()+" Pass-"+$( "#tes-eml-pup-ic-app-pass" ).val());
  var data = {
      'action': 'tes_eml_pup_icontact_get_list_id',
      'dataType': "html",
      'api_key': $( "#tes-eml-pup-ic-api-key" ).val(),
      'user_name': $( "#tes-eml-pup-ic-user-name" ).val(),
      'app_pass': $( "#tes-eml-pup-ic-app-pass" ).val(),
      'popId': $( "#tesEmlPopId" ).val()
    };
    $('.loader-div').show();
    jQuery.post(ajaxurl, data, function(response) {
        $('#tes-eml-pup-ic-list-id').empty();
        $("#tes-eml-pup-ic-list-id").append(response);
        $("#tes-eml-pup-ic-list-id").removeAttr("disabled");
        $('.loader-div').hide();
    });
}
$("#tes-eml-api").click(function(){
  if($("#tes-eml-pup-api").val() == 'icontact'){
    icontactgetlist();
  }
});


/* GetResponse Campaign ID */


$( "#tes-eml-pup-gr-api-key" ).keyup(function() {
    grCampaignId();
});

function grCampaignId(){
  if(!$( "#tes-eml-pup-ic-api-key" ).val())
    return;
  if(!$( "#tesEmlPopId" ).val())
    return;
  //console.log('Key- '+$( "#tes-eml-pup-ic-api-key" ).val()+" Username-"+$( "#tes-eml-pup-ic-user-name" ).val()+" Pass-"+$( "#tes-eml-pup-ic-app-pass" ).val());
  var data = {
      'action': 'tes_eml_pup_gr_get_camp_id',
      'dataType': "html",
      'api_key': $( "#tes-eml-pup-gr-api-key" ).val(),
      'popId': $( "#tesEmlPopId" ).val()
    };
    $('.loader-div').show();
    jQuery.post(ajaxurl, data, function(response) {
        $('#tes-eml-pup-gr-camp-id').empty();
        $("#tes-eml-pup-gr-camp-id").append(response);
        $("#tes-eml-pup-gr-camp-id").removeAttr("disabled");
        $('.loader-div').hide();
    });
}
$("#tes-eml-api").click(function(){
  if($("#tes-eml-pup-api").val() == 'getresponse'){
    grCampaignId();
  }
});


/* SendInBlue Get List ID */

$( "#tes-eml-pup-sb-api-key" ).keyup(function() {
    sbGetListId();
});

function sbGetListId(){
  if(!$( "#tes-eml-pup-sb-api-key" ).val())
    return;
  if(!$( "#tesEmlPopId" ).val())
    return;
  //console.log('Key- '+$( "#tes-eml-pup-ic-api-key" ).val()+" Username-"+$( "#tes-eml-pup-ic-user-name" ).val()+" Pass-"+$( "#tes-eml-pup-ic-app-pass" ).val());
  var data = {
      'action': 'tes_eml_pup_sb_get_list_id',
      'dataType': "html",
      'api_key': $( "#tes-eml-pup-sb-api-key" ).val(),
      'popId': $( "#tesEmlPopId" ).val()
    };
    $('.loader-div').show();
    jQuery.post(ajaxurl, data, function(response) {
        $('#tes-eml-pup-sb-list-id').empty();
        $("#tes-eml-pup-sb-list-id").append(response);
        $("#tes-eml-pup-sb-list-id").removeAttr("disabled");
        $('.loader-div').hide();
    });
}
$("#tes-eml-api").click(function(){
  if($("#tes-eml-pup-api").val() == 'sendinblue'){
    sbGetListId();
  }
});

/* SendInBlue Get RedCappi ID */

$( "#tes-eml-pup-rc-pub-key" ).keyup(function() {
    rcGetListId();
});
$( "#tes-eml-pup-rc-pri-key" ).keyup(function() {
    rcGetListId();
});

function rcGetListId(){
  if(!$( "#tes-eml-pup-rc-pub-key" ).val())
    return;
  if(!$( "#tes-eml-pup-rc-pri-key" ).val())
    return;
  if(!$( "#tesEmlPopId" ).val())
    return;
  var data = {
      'action': 'tes_eml_pup_rc_get_list_id',
      'dataType': "html",
      'pub_key': $( "#tes-eml-pup-rc-pub-key" ).val(),
      'pri_key': $( "#tes-eml-pup-rc-pri-key" ).val(),
      'popId': $( "#tesEmlPopId" ).val()
    };
    $('.loader-div').show();
    jQuery.post(ajaxurl, data, function(response) {
        $('#tes-eml-pup-rc-list-id').empty();
        $("#tes-eml-pup-rc-list-id").append(response);
        $("#tes-eml-pup-rc-list-id").removeAttr("disabled");
        $('.loader-div').hide();
    });
}
$("#tes-eml-api").click(function(){
  if($("#tes-eml-pup-api").val() == 'redcappi'){
    rcGetListId();
  }
});

/* SendInBlue Get RedCappi ID */

$( "#tes-eml-pup-ac-api-key" ).keyup(function() {
    acGetListId();
});
$( "#tes-eml-pup-ac-url" ).keyup(function() {
    acGetListId();
});

function acGetListId(){
  if(!$( "#tes-eml-pup-ac-api-key" ).val())
    return;
  if(!$( "#tes-eml-pup-ac-url" ).val())
    return;
  if(!$( "#tesEmlPopId" ).val())
    return;
  var data = {
      'action': 'tes_eml_pup_ac_get_list_id',
      'dataType': "html",
      'api_key': $( "#tes-eml-pup-ac-api-key" ).val(),
      'url': $( "#tes-eml-pup-ac-url" ).val(),
      'popId': $( "#tesEmlPopId" ).val()
    };
    $('.loader-div').show();
    jQuery.post(ajaxurl, data, function(response) {
        $('#tes-eml-pup-ac-list-id').empty();
        $("#tes-eml-pup-ac-list-id").append(response);
        $("#tes-eml-pup-ac-list-id").removeAttr("disabled");
        $('.loader-div').hide();
    });
}
$("#tes-eml-api").click(function(){
  if($("#tes-eml-pup-api").val() == 'activecampaign'){
    acGetListId();
  }
});

/* ConvertKit Get Form ID */

$( "#tes-eml-pup-ck-api-key" ).keyup(function() {
    ckGetFormId();
});
$( "#tes-eml-pup-ck-api-secret" ).keyup(function() {
    ckGetFormId();
});

function ckGetFormId(){
  if(!$( "#tes-eml-pup-ck-api-key" ).val())
    return;
  if(!$( "#tes-eml-pup-ck-api-secret" ).val())
    return;
  if(!$( "#tesEmlPopId" ).val())
    return;
  var data = {
      'action': 'tes_eml_pup_ck_get_form_id',
      'dataType': "html",
      'api_key': $( "#tes-eml-pup-ck-api-key" ).val(),
      'api_secret': $( "#tes-eml-pup-ck-api-secret" ).val(),
      'popId': $( "#tesEmlPopId" ).val()
    };
    $('.loader-div').show();
    jQuery.post(ajaxurl, data, function(response) {
        $('#tes-eml-pup-ck-form-id').empty();
        $("#tes-eml-pup-ck-form-id").append(response);
        $("#tes-eml-pup-ck-form-id").removeAttr("disabled");
        $('.loader-div').hide();
    });
}
$("#tes-eml-api").click(function(){
  if($("#tes-eml-pup-api").val() == 'convertkit'){
    ckGetFormId();
  }
});

/* ShortCode Generator */
$( "#tes-eml-pup-btn-txt" ).keyup(function() {
    shrtcdegen();
});
$( "#tes-eml-pup-btn-cls" ).keyup(function() {
    shrtcdegen();
});

$("#tes-eml-btn").click(function(){
  shrtcdegen();
});
function shrtcdegen(){
  if(!$( "#tes-eml-pup-btn-txt" ).val())
    return;
  if(!$( "#tes-eml-pup-btn-cls" ).val())
    return;
  if(!$( "#tesEmlPopId" ).val())
    return;
  var data = {
      'action': 'tes_eml_pup_shrtcde_gen',
      'dataType': "html",
      'text': $( "#tes-eml-pup-btn-txt" ).val(),
      'cls': $( "#tes-eml-pup-btn-cls" ).val(),
      'popId': $( "#tesEmlPopId" ).val()
    };
    jQuery.post(ajaxurl, data, function(response) {
        $('#tes-eml-pup-btn-shrt-code').empty();
        $("#tes-eml-pup-btn-shrt-code").val(response);
        $("#tes-eml-pup-btn-shrt-code").attr("readonly","readonly");
    });
}


