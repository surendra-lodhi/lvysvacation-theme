// JavaScript Document
jQuery(document).ready(function($) { 
	
	$('.mainmenu li:has(ul)').addClass('parent'); 
 
  $('a.menulinks').click(function() {
    $(this).next('ul').slideToggle(250);
    $('body').toggleClass('mobile-open'); 
	$('.mainmenu li.parent ul').slideUp(250);
	$('a.child-triggerm').removeClass('child-open');
      return false;
   });	 
	 
	$('.mainmenu li.parent > a').after('<a class="child-triggerm"><span></span></a>');
	
  $('.mainmenu a.child-triggerm').click(function() {
    $(this).parent().siblings('li').find('a.child-triggerm').removeClass('child-open');
    $(this).parent().siblings('li').find('ul').slideUp(250);
    $(this).next('ul').slideToggle(250);
    $(this).toggleClass('child-open');
    return false;
  });
  //testimonials jquery
  $('.testimonials').slick({
    dots: false,
    arrows: false,
    infinite: true,
    speed: 500,
    fade: true,
    autoplay: true,
    cssEase: 'linear'
  });
    
  //Tabs jquery

  jQuery(document).on('click','.js-tabs-title', function() {
      if(!jQuery(this).hasClass('active')){
        jQuery(document).find('.js-tabs-title').removeClass('active');
        jQuery(this).toggleClass('active');
        var category = jQuery(document).find('.js-tabs-title.active').attr('data-term_ids');
        around_gulfport_post(category);
      }else{
        jQuery(document).find('.js-tabs-title').removeClass('active');
        var category = jQuery(document).find('.js-tabs-title.active').attr('data-term_ids');
        around_gulfport_post(category);
      }
  });
  jQuery(document).on('click', '.pagination a', function (e) {
      e.preventDefault();
      var $href = jQuery(this).attr('href');
      var category = jQuery(document).find('.js-tabs-title.active').attr('data-term_ids');
      
      var paged = jQuery.urlParam('paged', $href);
      if (paged == '') {
          paged = 1;
      }
      around_gulfport_post(category,paged);
  });

  $.urlParam = function (name, $href) {
      var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec($href);
      if (results == '' || results == null) {
          return 1;
      }
      return results[1] || 0;
  }

  function around_gulfport_post(category, paged = '1') {
      jQuery.ajax({
          url: LVYSVACATIONRENTALSFRONTEND.ajaxurl,
          type: 'POST',
          data: {
              action: 'pma_around_gulfport_post_filter',
              category: category,
              paged: paged
          },
          success: function (response) {
              var obj = jQuery.parseJSON(response);
              jQuery(document).find('.around_gulfport-wrap').html(obj.html)
              jQuery(document).find('.pagination').html(obj.pagination)
          }
      });
  }
  // Gallery image hover
  if (jQuery(window).width() > 1199) {
    $( ".img-wrapper" ).hover(
      function() {
        $(this).find(".img-overlay").animate({opacity: 1}, 600);
      }, function() {
        $(this).find(".img-overlay").animate({opacity: 0}, 600);
      }
    );
  }

  // Lightbox
  var $overlay = $('<div id="overlay"></div>');
  var $image = $("<img>");
  var $prevButton = $('<div id="prevButton"><i class="fa fa-chevron-left">prev</i></div>');
  var $nextButton = $('<div id="nextButton"><i class="fa fa-chevron-right">next</i></div>');
  var $exitButton = $('<div id="exitButton"><i class="fa fa-times">close</i></div>');

  // Add overlay
  $overlay.append($image).prepend($prevButton).append($nextButton).append($exitButton);
  $("#our-gallery").append($overlay);

  // Hide overlay on default
  $overlay.hide();

  // When an image is clicked
  $(".img-overlay").click(function(event) {
    // Prevents default behavior
    event.preventDefault();
    // Adds href attribute to variable
    var imageLocation = $(this).prev().attr("href");
    // Add the image src to $image
    $image.attr("src", imageLocation);
    // Fade in the overlay
    $overlay.fadeIn("slow");
  });

  // When the overlay is clicked
  $overlay.click(function() {
    // Fade out the overlay
    $(this).fadeOut("slow");
  });

    // When next button is clicked
  $nextButton.click(function(event) {
    // Hide the current image
    $("#overlay img").hide();
    // Overlay image location
    var $currentImgSrc = $("#overlay img").attr("src");
    // Image with matching location of the overlay image
    var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
    // Finds the next image
    var $nextImg = $($currentImg.closest(".image").next().find("img"));
    // All of the images in the gallery
    var $images = $("#image-gallery img");
    // If there is a next image
    if ($nextImg.length > 0) { 
      // Fade in the next image
      $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
    } else {
      // Otherwise fade in the first image
      $("#overlay img").attr("src", $($images[0]).attr("src")).fadeIn(800);
    }
    // Prevents overlay from being hidden
    event.stopPropagation();
  });

    // When previous button is clicked
  $prevButton.click(function(event) {
    // Hide the current image
    $("#overlay img").hide();
    // Overlay image location
    var $currentImgSrc = $("#overlay img").attr("src");
    // Image with matching location of the overlay image
    var $currentImg = $('#image-gallery img[src="' + $currentImgSrc + '"]');
    // Finds the next image
    var $nextImg = $($currentImg.closest(".image").prev().find("img"));
    // Fade in the next image
    $("#overlay img").attr("src", $nextImg.attr("src")).fadeIn(800);
    // Prevents overlay from being hidden
    event.stopPropagation();
  });

  // When the exit button is clicked
  $exitButton.click(function() {
    // Fade out the overlay
    $("#overlay").fadeOut("slow");
  });	



  jQuery.validator.addMethod(
    "contactnumber",
    function (value, element, regexp) {
        var check = false;
        return this.optional(element) || regexp.test(value);
    },
    "Please enter valid phone number(+00 000 000 0000)."
  );
  jQuery('.boook-conform-step-wrap .col-md-7 .step-btn .step-2 .step-2-wrap').append(jQuery('.mphb_sc_checkout-submit-wrapper'));

  jQuery(".mphb_sc_checkout-form").validate({  // initialize plugin on the form
    rules:
        {
          mphb_first_name: {required: true},
          mphb_last_name: {required: true},
          mphb_email: {required: true, email: true},
          mphb_phone: {required: true, contactnumber: /^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$/},
          mphb_country : {required: true},
          mphb_address1 : {required: true},
          mphb_city : {required: true},
          mphb_state : {required: true},
          mphb_zip : {required: true},
          // mphb_room_details-0-adults : {required: true},
          // mphb_room_details-0-children : {required: true},
        },
  });

  jQuery(".step-1-continue").click(function(){  // capture the click
    if(jQuery(".mphb_sc_checkout-form").valid()){   // test for validity
      jQuery(document).find('.mphb-customer-details').hide();
      jQuery(document).find('.step-btn .step-1').hide();
      jQuery(document).find('#mphb-billing-details').show();
      jQuery(document).find('.mphb-total-price').show();
      jQuery(document).find('.mphb_sc_checkout-submit-wrapper').show();
      jQuery(document).find('.step-btn .step-2').show();
    } else {
      jQuery(document).find('.mphb-customer-details').show();
      jQuery(document).find('.step-btn .step-1').show();
      jQuery(document).find('#mphb-billing-details').hide();
      jQuery(document).find('.mphb-total-price').hide();
      jQuery(document).find('.mphb_sc_checkout-submit-wrapper').hide();
      jQuery(document).find('.step-btn .step-2').hide();
    }
  });
  jQuery(document).on('click','.step-btn .step-2-back',function(){
    jQuery(document).find('.mphb-customer-details').show();
    jQuery(document).find('.step-btn .step-1').show();
    jQuery(document).find('#mphb-billing-details').hide();
    jQuery(document).find('.mphb-total-price').hide();
    jQuery(document).find('.mphb_sc_checkout-submit-wrapper').hide();
    jQuery(document).find('.step-btn .step-2').hide();
  });
  jQuery(document).on('change','.mphb_sc_checkout-guests-chooser',function(){
    if(jQuery(this).val() == ''){
      jQuery(document).find('.mphb-customer-details').show();
      jQuery(document).find('.step-btn .step-1').show();
      jQuery(document).find('#mphb-billing-details').hide();
      jQuery(document).find('.mphb-total-price').hide();
      jQuery(document).find('.mphb_sc_checkout-submit-wrapper').hide();
      jQuery(document).find('.step-btn .step-2').hide();
    }
  });
});//document.ready end here