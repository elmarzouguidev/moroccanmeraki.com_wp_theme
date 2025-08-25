(function ($) {
  "use strict";

  /****** Preloder js ******/
  $('.preloader-close-btn').on("click", function () {
    $('.egns-preloader').addClass('close');
  });
  jQuery(window).on("load", function () {
    $(".egns-preloader").delay(1600).fadeOut("slow");
  });

  if (theme_options.header_one_sticky != 0) {
    window.addEventListener("scroll", function () {
      if (document.querySelector(".header-style-one")) {
        const header_two = document.querySelector(".header-style-one");
        header_two.classList.toggle("sticky", window.scrollY > 0);
      }
    });
  }
  if (theme_options.header_two_sticky != 0) {
    window.addEventListener("scroll", function () {
      if (document.querySelector(".header-style-two")) {
        const header_two = document.querySelector(".header-style-two");
        header_two.classList.toggle("sticky", window.scrollY > 0);
      }
    });
  }
  if (theme_options.header_three_sticky != 0) {
    window.addEventListener("scroll", function () {
      if (document.querySelector(".newes")) {
        const header_two = document.querySelector(".newes");
        header_two.classList.toggle("sticky", window.scrollY > 0);
      }
    });
  }

  // Odometer Counter
  $(".counter-single").each(function () {
    $(this).isInViewport(function (status) {
      if (status === "entered") {
        for (
          var i = 0; i < document.querySelectorAll(".odometer").length; i++
        ) {
          var el = document.querySelectorAll(".odometer")[i];
          el.innerHTML = el.getAttribute("data-odometer-final");
        }
      }
    });
  });
  /***********
   Sidebar Area  js
   ************/
  $(".package-sidebar aside.blog-widget").addClass("package-widget-style-2");
  $(".package-sidebar aside.blog-widget").removeClass("blog-widget");
  /***********
   Sidebar Area  js
   ************/
  $(".package-sidebar aside.blog-widget").addClass("package-widget-style-2");
  $(".package-sidebar aside.blog-widget").removeClass("blog-widget");

  $(".elementor")
    .parents(".page-wrapper-padding")
    .removeClass("page-wrapper-padding");
  /***********
   mobile menu  js
   ************/
  $(".hamburger").on("click", function (event) {
    $(this).toggleClass("h-active");
    $(".main-nav").toggleClass("slidenav");
  });
  $("#menu-main-menu li.current-menu-ancestor > a").addClass("active");
  $("#menu-main-menu .current-menu-item > a").addClass("active");

  $(".header-home .main-nav ul li  a").on("click", function (event) {
    $(".hamburger").removeClass("h-active");
    $(".main-nav").removeClass("slidenav");
  });

  $(".main-nav .fl").on("click", function (event) {
    var $fl = $(this);
    $(this).parent().siblings().find(".sub-menu").slideUp();
    $(this).parent().siblings().find(".fl").addClass("menu-plus").text("+");
    if ($fl.hasClass("menu-plus")) {
      $fl.removeClass("menu-plus").addClass("menu-minus").text("-");
    } else {
      $fl.removeClass("menu-minus").addClass("menu-plus").text("+");
    }
    $fl.next(".sub-menu").slideToggle();
  });

  /****** footer copyright area ******/
  $(".footer-copyright-area")
    .children(".footer-logo")
    .parents(".footer-copyright-area")
    .addClass("justify-content-between");
  $(".footer-copyright-area")
    .children(".footer-logo")
    .parents(".footer-copyright-area")
    .removeClass("justify-content-center");
  $(".footer-copyright-area")
    .children(".footer-menu")
    .parents(".footer-copyright-area")
    .addClass("justify-content-between");
  $(".footer-copyright-area")
    .children(".footer-menu")
    .parents(".footer-copyright-area")
    .removeClass("justify-content-center");

  /****** Fancybox Initialization ******/
  $(".wp-block-gallery .wp-block-image a").attr("data-fancybox", "gallery");
  $("aside .wp-block-gallery").addClass("widget-body");

  $('[data-fancybox="gallery"]').fancybox({
    buttons: ["slideShow", "thumbs", "fullScreen", "close"],
    loop: false,
    protect: true,
  });

  $('[data-fancybox="footer"]').fancybox({
    buttons: ["slideShow", "thumbs", "fullScreen", "close"],
    loop: false,
    protect: true,
  });

  /****** Select2 js Initialization ******/
  
  if (document.querySelector("#deatination_drop")) {
    $("#deatination_drop").select2({
      closeOnSelect: true,
      width: "resolve",
    });
  }

  if (document.querySelector(".defult-select-drowpown")) {
    $(".defult-select-drowpown").select2({
      closeOnSelect: true,
    });
  }

  /****** Nice Select Initialization ******/
  $(".blog-widget select").niceSelect();
  $(".blog-details select").niceSelect();
  /****** dateoicker js Initialization ******/

  jQuery("#datepicker").datepicker({
    format: "dd-mm-yyyy",
    // startDate: "+1d",
    minDate: 0,
  });
  jQuery("#datepicker2").datepicker({
    format: "dd-mm-yyyy",
    // startDate: "+1d",
    minDate: 0,
  });
  jQuery("#customDateDatepicker").datepicker({
    format: "dd-mm-yyyy",
    // startDate: "+1d",
    minDate: 0,
  });

  jQuery('#customDateDatepicker').on('change', function () {
    const value = jQuery(this).val();
    jQuery('#customTourBookingDate').val(value);
  })

  // $("#ui-datepicker-div").css("top", "358px");



  /***********
   sidebar and dropdown custom js
   ************/
  var mainSearchWrap = document.querySelectorAll(".main-searchbar-wrapper");
  var searchbarToggleIcon = document.querySelectorAll(".search-toggle i");
  var categoryWrap = document.querySelectorAll(".category-sidebar-wrapper");
  var categoryToggleIcon = document.querySelectorAll(".category-toggle i");
  var accountDropIcon = document.querySelectorAll(".user-dropdown i");
  var accountDropList = document.querySelectorAll(".user-drop-list");

  /****** main searchbar js ******/
  searchbarToggleIcon.forEach((element) => {
    element.addEventListener("click", () => {
      mainSearchWrap.forEach((e) => {
        e.classList.toggle("search-active");
      });
    });
  });

  /****** category sidebar js ******/
  categoryToggleIcon.forEach((element) => {
    element.addEventListener("click", () => {
      categoryWrap.forEach((e) => {
        e.classList.toggle("category-active");
      });
    });
  });

  /****** Account dropdown js ******/
  accountDropIcon.forEach((element) => {
    element.addEventListener("click", () => {
      accountDropList.forEach((e) => {
        e.classList.toggle("account-drop-active");
      });
    });
  });

  /****** Window Event ******/
  window.onclick = function (event) {
    mainSearchWrap.forEach((el) => {
      if (event.target === el) {
        el.classList.remove("search-active");
      }
    });
    categoryWrap.forEach((el) => {
      if (event.target === el) {
        el.classList.remove("category-active");
      }
    });
    if (!event.target.matches(".user-dropdown i")) {
      accountDropList.forEach((element) => {
        if (element.classList.contains("account-drop-active")) {
          element.classList.remove("account-drop-active");
        }
      });
    }
  };


  /****** All Swiper Slider Js ******/
  const swiperCheck = document.querySelector('.swiper');
  if (swiperCheck) {

    var heroSlider = new Swiper(".hero-slider-one", {
      slidesPerView: 1,
      speed: 1500,
      spaceBetween: 0,
      loop: true,
      effect: "fade",

      centeredSlides: true,
      roundLengths: true,
      fadeEffect: {
        crossFade: true,
      },
      autoplay: {
        delay: 7000,
      },
      pagination: {
        el: ".slider-one-pagination",
        type: "bullets",
        clickable: true,
      },
    });

    var heroSliderTwo = new Swiper(".hero-slider-two", {
      slidesPerView: 1,
      speed: 1500,
      spaceBetween: 0,
      loop: true,
      centeredSlides: true,
      roundLengths: true,

      autoplay: {
        delay: 7000,
      },
      pagination: {
        el: ".hero-two-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
        },
      },
    });

    var heroSliderTwo = new Swiper(".hero-slider-three", {
      slidesPerView: 1,
      speed: 1500,
      parallax: true,
      loop: true,
      spaceBetween: 0,
      loop: true,
      centeredSlides: true,
      roundLengths: true,
      effect: "fade",
      navigation: {
        nextEl: ".hero-next3",
        prevEl: ".hero-prev3",
      },

      autoplay: {
        delay: 5000,
      },
      pagination: {
        el: ".hero-two-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
        },
      },
    });

    var heroSliderTwo = new Swiper(".hero-slider-four", {
      slidesPerView: 1,
      speed: 1500,
      loop: true,
      spaceBetween: 0,
      loop: true,
      centeredSlides: true,
      roundLengths: true,
      effect: "fade",
      navigation: {
        nextEl: ".hero-next3",
        prevEl: ".hero-prev3",
      },

      autoplay: {
        delay: 5000,
      },
      pagination: {
        el: ".hero-two-pagination",
        clickable: true,
        renderBullet: function (index, className) {
          return '<span class="' + className + '">' + 0 + (index + 1) + "</span>";
        },
      },
    });

    var destinationSliderOne = new Swiper(".destination-slider-one", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 24,
      loop: true,
      roundLengths: true,
      centeredSlides: true,
      autoplay: {
        delay: 15000,
      },
      navigation: {
        nextEl: ".designation-next",
        prevEl: ".designation-prev",
      },
      breakpoints: {
        480: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 4,
        },
        1200: {
          slidesPerView: 5,
        },
      },
    });

    var destinationSliderTwo = new Swiper(".destination-slider-two", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 24,

      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 3000,
      },
      pagination: {
        el: ".testi-pagination",
        clickable: true,
      },
      breakpoints: {
        480: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 4,
        },
      },
    });

    //blog-archive-slider
    var destinationSliderTwo = new Swiper(".blog-archive-slider", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 24,

      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 15000,
      },
      navigation: {
        nextEl: ".archive-next",
        prevEl: ".archive-prev",
      },
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        992: {
          slidesPerView: 1,
        },
        1200: {
          slidesPerView: 1,
        },
      },
    });

    var socialSlider = new Swiper(".social-activity-slider", {
      slidesPerView: 2,
      speed: 1000,
      spaceBetween: 24,
      centeredSlides: true,
      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 15000,
      },
      pagination: {
        el: ".testi-pagination",
        clickable: true,
      },
      breakpoints: {
        480: {
          slidesPerView: 3,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 4,
        },
        1200: {
          slidesPerView: 5,
        },
      },
    });

    var testimonialSliderOne = new Swiper(".testimonial-slider-one", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 20,
      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 15000,
      },
      navigation: {
        nextEl: ".testi-next4",
        prevEl: ".testi-prev4",
      },
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        992: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
      },
    });

    var testimonialSliderOne = new Swiper(".upcoming-tour", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 20,
      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 15000,
      },
      navigation: {
        nextEl: ".testi-next4",
        prevEl: ".testi-prev4",
      },
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        576: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 3,
        },
        1400: {
          slidesPerView: 3,
        },
      },
    });

    var gallarySlider = new Swiper(".gallary-slider", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 24,
      loop: true,
      centeredSlides: true,
      roundLengths: true,
      autoplay: {
        delay: 9000,
      },
      navigation: {
        nextEl: ".gallary-next1",
        prevEl: ".gallary-prev1",
      },

      breakpoints: {
        480: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 3,
        },
      },
    });

    var gallarySlider2 = new Swiper(".gallary-slider2", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 24,
      loop: true,
      centeredSlides: true,
      roundLengths: true,
      autoplay: {
        delay: 12000,
      },
      navigation: {
        nextEl: ".gallary-next2",
        prevEl: ".gallary-prev2",
      },
      breakpoints: {
        480: {
          slidesPerView: 2,
        },
        768: {
          slidesPerView: 2,
        },
        992: {
          slidesPerView: 3,
        },
        1200: {
          slidesPerView: 3,
        },
      },
    });

    var testimonialSliderOne = new Swiper(".testimonial-slider-two", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 20,
      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 15000,
      },
      navigation: {
        nextEl: ".testi-next",
        prevEl: ".testi-prev",
      },
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 1,
        },
        992: {
          slidesPerView: 2,
        },
        1200: {
          slidesPerView: 2,
        },
      },
    });
    //Newly added for testimonial-three
    var testimonialSliderOne = new Swiper(".testimonial-slider-three", {
      slidesPerView: 1,
      speed: 1000,
      spaceBetween: 20,
      loop: true,
      roundLengths: true,
      autoplay: {
        delay: 15000,
      },
      navigation: {
        nextEl: ".testi-next",
        prevEl: ".testi-prev",
      },

    });
    var testimonialThumbSlider = new Swiper(".testimonial-thumb", {
      centeredSlides: true,
      centeredSlidesBounds: true,
      slidesPerView: 1,
      loop: true,
      watchOverflow: true,
      watchSlidesVisibility: true,
      watchSlidesProgress: true,
      direction: "horizontal",

      controller: {
        inverse: true,
      },
      breakpoints: {
        480: {
          slidesPerView: 1,
        },
        768: {
          slidesPerView: 3,
        },
        992: {
          slidesPerView: 3,
          direction: "vertical",
        },
      },
    });
  }

  //Wow Animation 
  var wow = new WOW({
    boxClass: "wow",
    animateClass: "animated",
    offset: 0,
    mobile: true,
    live: true,
    callback: function (box) {},
    scrollContainer: null,
    resetAnimation: true,
  });
  wow.init();


  // Update Adults Quantity
  var product_id = $('#productId').val();
  var productInfo = {
    adultsPerson: 1,
    childrenPerson: 0,
    servicesList: [],
  }
  $('.booking-form-item-type .adults .plus-qty').click(function () {

    // Get adults person number
    var adultsPerson = $('#adultsPerson').val();
    var updateAdultPerson = parseInt(adultsPerson) + 1;
    $('#adultsPerson').val(updateAdultPerson);
    productInfo.adultsPerson = updateAdultPerson;
    updateProductPrice();
  });

  $('.booking-form-item-type .adults .minus-qty').click(function () {

    // Get adults person number
    var adultsPerson = $('#adultsPerson').val();
    var updateAdultPerson = parseInt(adultsPerson) - 1;
    if (!(updateAdultPerson < 1)) {
      $('#adultsPerson').val(updateAdultPerson);
      productInfo.adultsPerson = updateAdultPerson;
      updateProductPrice();
    }
  });

  // Update Children Quantity 
  $('.booking-form-item-type .children .plus-qty').click(function () {

    // Get adults person number
    var childrenPerson = $('#childrenPerson').val();
    var updateChildrenPrice = parseInt(childrenPerson) + 1;
    $('#childrenPerson').val(updateChildrenPrice);
    productInfo.childrenPerson = updateChildrenPrice;
    updateProductPrice();
  });

  // Update Children Quantity 
  $('.booking-form-item-type .children .minus-qty').click(function () {

    // Get adults person number
    var childrenPerson = $('#childrenPerson').val();
    var updateChildrenPrice = parseInt(childrenPerson) - 1;
    if (!(updateChildrenPrice < 0)) {
      $('#childrenPerson').val(updateChildrenPrice);
      productInfo.childrenPerson = updateChildrenPrice;
      updateProductPrice();
    }

  });

  // AJAX Call for product update 
  function updateProductPrice() {
    var data = {
      'action': 'egns_get_product_data_by_id',
      'post_type': 'product',
      'product_id': product_id,
      'product_info': productInfo,
    };
    $.ajax({ // you can also use $.post here
      url: egens_frontend_ajax_handler_params.ajaxurl, // AJAX handler
      data: data,
      type: 'POST',
      beforeSend: function () {
        jQuery('.turio-spinner').addClass('active');
        jQuery('.booking-form-box').css('opacity', '0.5');
      },
      success: function (data) {
        data = JSON.parse(data);
        $('.main-price').empty().html(data.total_price);
        jQuery('.turio-spinner').removeClass('active');
        jQuery('.booking-form-box').css('opacity', '1');
      }
    });
  }
  $(window).bind('beforeunload', function () {
    $('#adultsPerson').val(1);
    $('#childrenPerson').val(0);
    $('.services_check').each(function () {
      $(this).removeAttr('checked');
    });
  })

  $('.services_check').click(function () {
    if ($(this).is(":checked")) {
      productInfo.servicesList.push($(this).val());
      updateProductPrice();
    } else {
      var servicesList = productInfo.servicesList.filter(item => item !== $(this).val());
      productInfo.servicesList = servicesList;
      updateProductPrice();
    };
  });

  // Service checkbox update
  $('.radio-item #datepicker').click(function () {
    $("input[type=radio]").prop("checked", true);
  });

  // Enquiry  Form Handler 

  jQuery('#enquiryForm').submit(function (event) {
    event.preventDefault();

    let enquiries_fullname = jQuery('input[name="enquiries_fullname"]').val();
    let enquiries_email_address = jQuery('input[name="enquiries_email_address"]').val();
    let enquiries_message = jQuery('textarea[name="enquiries_message"]').val();

    if (enquiries_fullname && enquiries_email_address && enquiries_message) {
      // Remove Validation Error
      jQuery('.enquiries_fullname_error').addClass('d-none');
      jQuery('.enquiries_email_address_error').addClass('d-none');
      jQuery('.enquiries_message_error').addClass('d-none');

      // Get all value inside one variable
      var getEnquiryFormData = {
        'enquiries_fullname': enquiries_fullname,
        'enquiries_email_address': enquiries_email_address,
        'enquiries_phone': jQuery('input[name="enquiries_phone"]').val(),
        'enquiries_people': jQuery('input[name="enquiries_people"]').val(),
        'enquiries_number_of_tickets': jQuery('input[name="enquiries_number_of_tickets"]').val(),
        'enquiries_message': enquiries_message,
        'enquiries_package_id': jQuery('input[name="enquiries_package_id"]').val(),
      };
      var data = {
        'action': 'enquiry_form_handler',
        'getEnquiryFormData': getEnquiryFormData,
      };

      // Send AJAX Request to Server
      $.ajax({ // you can also use $.post here
        url: egens_frontend_ajax_handler_params.ajaxurl, // AJAX handler
        data: data,
        type: 'POST',
        success: function (data) {
          $('#enquiryForm')[0].reset();
          $('.enquiries_success_message').empty().html('<p>Thank you for getting in touch! We appreciate you contacting us</p>');
        }
      });
    } else {
      if (!enquiries_fullname) {
        jQuery('.enquiries_fullname_error').removeClass('d-none');
      } else {
        jQuery('.enquiries_fullname_error').addClass('d-none');
      }
      if (!enquiries_email_address) {
        jQuery('.enquiries_email_address_error').removeClass('d-none');
      } else {
        jQuery('.enquiries_email_address_error').addClass('d-none');
      }
      if (!enquiries_message) {
        jQuery('.enquiries_message_error').removeClass('d-none');
      } else {
        jQuery('.enquiries_message_error').addClass('d-none');
      }
      $('.enquiries_success_message').empty();
    }

  });


  // Reivew Load More 
  $('#reviewLoadMore').click(function () {
    var button = $(this),
      data = {
        action: "review_load_more",
        query: egens_frontend_ajax_handler_params.posts, // that's how we get params from wp_localize_script() function
        page: egens_frontend_ajax_handler_params.current_page,
        post_title: egens_frontend_ajax_handler_params.post_title,
        post_type: "review-rating",
      };
    $.ajax({
      // you can also use $.post here
      url: egens_frontend_ajax_handler_params.ajaxurl, // AJAX handler
      data: data,
      type: "POST",
      beforeSend: function (xhr) {
        $('.turio-spinner').addClass('active');
      },
      success: function (data) {
        $('.turio-spinner').removeClass('active');
        if (data != 0) {
          $(".review-comment-list").append(data);
          egens_frontend_ajax_handler_params.current_page++;
          if (egens_frontend_ajax_handler_params.current_page == egens_frontend_ajax_handler_params.max_page) {
            button.hide();
          }
        } else {
          button.hide();
        }
      },
    });
  });

  // woocommerce product quantity update
  $(document).on('click', 'button.plus, button.minus', function () {
    var qty = $(this).parent('.quantity').find('.qty');
    var val = parseFloat(qty.val());
    var max = parseFloat(qty.attr('max'));
    var min = parseFloat(qty.attr('min'));
    var step = parseFloat(qty.attr('step'));
    if (theme_options.is_cart) {
      var min_qty = 1;
    } else if (theme_options.is_product) {
      var min_qty = 0;
    }
    if ($(this).is('.plus')) {
      if (max && (max <= val)) {
        qty.val(max).change();
      } else {
        qty.val(val + step).change();
      }
    } else {
      if (min && (min >= val)) {
        qty.val(min).change();
      } else if (val > min_qty) {
        qty.val(val - step).change();
      }
    }
  })


})(jQuery);