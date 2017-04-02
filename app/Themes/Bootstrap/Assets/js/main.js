/*!
 * IE10 viewport hack for Surface/desktop Windows 8 bug
 * Copyright 2014-2015 Twitter, Inc.
 * Licensed under MIT (https://github.com/twbs/bootstrap/blob/master/LICENSE)
 */

// See the Getting Started docs for more information:
// http://getbootstrap.com/getting-started/#support-ie10-width
(function($){
  $(function(){

    $('.button-collapse').sideNav();

  }); // end of document ready
})(jQuery); // end of jQuery name space
(function () {
  'use strict';

  if (navigator.userAgent.match(/IEMobile\/10\.0/)) {
    var msViewportStyle = document.createElement('style')
    msViewportStyle.appendChild(
      document.createTextNode(
        '@-ms-viewport{width:auto!important}'
      )
    )
    document.querySelector('head').appendChild(msViewportStyle)
  }

})();

$(document).ready(function(){
            var submitIcon = $('.searchbox-icon');
            var inputBox = $('.searchbox-input');
            var searchBox = $('.searchbox');
            var isOpen = false;
            submitIcon.click(function(){
                if(isOpen == false){
                    searchBox.addClass('searchbox-open');
                    inputBox.focus();
                    isOpen = true;
                } else {
                    searchBox.removeClass('searchbox-open');
                    inputBox.focusout();
                    isOpen = false;
                }
            });  
             submitIcon.mouseup(function(){
                    return false;
                });
      searchBox.mouseup(function(){
          return false;
     });
      $(document).mouseup(function(){
        if(isOpen == true){
            $('.searchbox-icon').css('display','block');
              submitIcon.click();
       }
    });
});
function buttonUp(){
     var inputVal = $('.searchbox-input').val();
     inputVal = $.trim(inputVal).length;
     if( inputVal !== 0){
     $('.searchbox-icon').css('display','none');
      } else {
      $('.searchbox-input').val('');
       $('.searchbox-icon').css('display','block');
      }
}
    
/*$(function() {
     $(".file-content").hide();
     $("#file-b").change(function (){
       var fileName = ($('#file-b')[0].files[0].name).replace(/\.[^/.]+$/, "");
       $(".filename").val(fileName);
       $(".file-desc").html(fileName);
       $(".file-content").show();
     });
});*/

$(document).ready(function() {
    $('#file-b').on('change', function() {
    $("#preview").html('');
    $("#preview").html('<img src="http://weytindey.dev/themes/bootstrap/assets/css/loader.gif" alt="Uploading...."/>');
    $("#image_upload_form").ajaxForm({
    target: '#preview'
   }).submit();
    
  });
   
});

function formContentPost() { 
     var options = { 
        target:        '#previewContent',   // target element(s) to be updated with server response 
        //beforeSubmit:  showRequest,  // pre-submit callback 
        //success:       showResponse  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    };
 // bind form using 'ajaxForm' 
    $('#contentForm').ajaxForm(options);  
} 


