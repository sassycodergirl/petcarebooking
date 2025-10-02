/*-- header-toggle --*/
jQuery(document).ready(function ($) {
  $("<span class='clickD'></span>").insertAfter(".navbar-nav li.menu-item-has-children > a");
  $('.navbar-nav li .clickD').click(function (e) {
    e.preventDefault();
    var $this = $(this);
    if ($this.next().hasClass('show')) {
      $this.next().removeClass('show');
      $this.removeClass('toggled');
    }
    else {
      $this.parent().parent().find('.sub-menu').removeClass('show');
      $this.parent().parent().find('.toggled').removeClass('toggled');
      $this.next().toggleClass('show');
      $this.toggleClass('toggled');
    }
  });

  $(window).on('resize', function () {
    if ($(this).width() < 1025) {
      $('html').click(function () {
        $('.navbar-nav li .clickD').removeClass('toggled');
        $('.toggled').removeClass('toggled');
        $('.sub-menu').removeClass('show');
      });
      $(document).click(function () {
        $('.navbar-nav li .clickD').removeClass('toggled');
        $('.toggled').removeClass('toggled');
        $('.sub-menu').removeClass('show');
      });
      $('.navbar-nav').click(function (e) {
        e.stopPropagation();
      });
    }
  });
  $(".navbar-toggler").click(function () {
    $(".navbar-toggler").toggleClass("open");
    $(".navbar-toggler .stick").toggleClass("open");
    $('body,html').toggleClass("open-nav");
  });
  // Navbar end
  // $('.js-banner-cont').slick({
  //   dots: true,
  //   arrows: false,
  //   slidesToShow: 1,
  //   slidesToScroll: 1,
  //   autoplay: true,
  //   autoplaySpeed: 2000,
  // });

  // Initialize the text slider
  $('.js-banner-cont').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    dots: true,
    fade: true, // Use a fade effect
    autoplay:true,
    autoplaySpeed: 3000,
    asNavFor: '.js-banner-img' // Link to the image slider
  });
  
  // Initialize the image slider
  $('.js-banner-img').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    asNavFor: '.js-banner-cont', // Link to the text slider
    dots: false, // Navigation is handled by the other slider
    arrows: false,
    fade: true
  });
  // tab with slider

  $('.js-testimonial-gallery').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3,
        }
      },
      {
        breakpoint: 767,
        settings: {
          slidesToShow: 2,
        }
      },
      {
        breakpoint: 480,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });
  Fancybox.bind("[data-fancybox]", {
  });

  $('.js-product-slider').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: false,
    autoplaySpeed: 2000,
    responsive: [
      {
        breakpoint: 992,
        settings: {
          slidesToShow: 3
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2
        }
      },
      {
        breakpoint: 575,
        settings: {
          slidesToShow: 1
        }
      }
    ]
  });

  $('.js-product-banner').slick({
  slidesToShow: 1,
  slidesToScroll: 1,
  arrows: false,
  dots: true,
  autoplay: true,
  autoplaySpeed: 2000,
});
		

  // Show/hide button on scroll
  $('.scroll-btn').click(function () {
    $('html, body').animate({
      scrollTop: $('.main-head').next().offset().top
    }, 1000);
  });

// $('.btn-opens, .btn-closes').click(function() {
//   $('.btn-opens').toggleClass('open', this.classList.contains('btn-opens'));
//   $('.btn-closes').toggleClass('open-btn-active', this.classList.contains('btn-opens'));
//   $('.search-form').stop(true, true).slideToggle(this.classList.contains('btn-opens'));
// });
$(document).ready(function() {

    // Handles opening/closing with the buttons
    $('.btn-opens, .btn-closes').on('click', function(event) {
        // Prevents the click from bubbling up to the document
        event.stopPropagation(); 
        
        // Toggles the form and button states
        $('.search-form').stop(true, true).slideToggle();
        $('.btn-opens').toggleClass('open');
        $('.btn-closes').toggleClass('open-btn-active');
    });

    // Listens for clicks on the entire page to close the form
    $(document).on('click', function(event) {
        
        // Check if the search form is visible AND if the click was outside of it
        if ($('.search-form').is(':visible') && 
            $(event.target).closest('.search-form').length === 0 &&
            $(event.target).closest('.btn-opens').length === 0) {

            // If true, close the form and reset the buttons
            $('.search-form').stop(true, true).slideUp();
            $('.btn-opens').removeClass('open');
            $('.btn-closes').removeClass('open-btn-active');
        }
    });

});
  
$('.product-slider').slick({
  dots: false,
  arrows: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
      }
    },
    {
      breakpoint: 768,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1
      }
    },
    {
      breakpoint: 575,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
  // Open Popup
    $('.cd-button').click(function () {
      $('.popup-overlay').fadeIn();
    });

    // Close Popup
    $('.popup-close').click(function () {
      $('.popup-overlay').fadeOut();
    });

    // Quantity Plus/Minus
    $('.qty-plus').click(function () {
      let val = parseInt($('.qty').val());
      $('.qty').val(val + 1);
    });

    $('.qty-minus').click(function () {
      let val = parseInt($('.qty').val());
      if (val > 1) $('.qty').val(val - 1);
    });

    $(document).ready(function () {
    $('.tab-btn').click(function () {
      var filter = $(this).data('filter');

      // Set active class on tab buttons
      $('.tab-btn').removeClass('active');
      $(this).addClass('active');

      // Show matching tab content
      $('.tab-pane').removeClass('show active');
      $('#' + filter).addClass('show active');
    });
  });

  $('.tab-btn').on('click', function () {
  var filter = $(this).data('filter');

  // Activate tab
  $('.tab-btn').removeClass('active');
  $(this).addClass('active');

  // Show matching tab
  $('.tab-pane').removeClass('show active');
  $('#' + filter).addClass('show active');

  // Refresh slick slider inside that tab
  $('#' + filter).find('.product-slider').slick('setPosition');
});


// pd cp
$('.pd-accod-cont').hide();

    // Add active class to first and show its content
    $('.pd-accod:first').addClass('active').find('.pd-accod-cont').show();

    // Toggle on button click
    $('.pd-accod-btn').click(function () {
      $(this).parent('.pd-accod').toggleClass('active');
      $(this).next('.pd-accod-cont').slideToggle();
    });
})

$(document).ready(function(){
    let itemsToShow = 6;
    let increment = 3;

    // hide extra items
    $(".community-card").slice(itemsToShow).hide();

    $("#loadMoreBtn").on("click", function(){
        $(".community-card:hidden").slice(0, increment).slideDown();

        if ($(".community-card:hidden").length === 0) {
            $("#loadMoreBtn").fadeOut();
        }
    });
});

$(document).ready(function(){
    let itemsToShow = 4;
    let increment = 4;

    // hide extra items
    $(".team-col").slice(itemsToShow).hide();

    $("#teamMoreBtn").on("click", function(){
        $(".team-col:hidden").slice(0, increment).slideDown();

        if ($(".team-col:hidden").length === 0) {
            $("#teamMoreBtn").fadeOut();
        }
    });
});

//step form
// $(document).ready(function () {
//   let currentStep = 0;
//   const totalSteps = $(".form-step").length;

//   function updateSteps() {
//     $(".form-step").removeClass("active").eq(currentStep).addClass("active");

//     $(".step").each(function (index) {
//       if (index <= currentStep) {
//         $(this).addClass("active");
//       } else {
//         $(this).removeClass("active");
//       }
//     });

//     $("#prevBtn").prop("disabled", currentStep === 0);
//     $("#nextBtn").text(currentStep === totalSteps - 1 ? "Submit" : "Continue");
//   }

//   function validateStep() {
//     let isValid = true;
//     $(".form-step").eq(currentStep).find("input[required]").each(function () {
//       if (!this.checkValidity()) {
//         this.reportValidity(); // shows browser's validation popup
//         isValid = false;
//         return false; // break loop
//       }
//     });
//     return isValid;
//   }

//   $("#nextBtn").click(function () {
//     if (currentStep < totalSteps - 1) {
//       if (validateStep()) {
//         currentStep++;
//         updateSteps();
//       }
//     } else {
//   if (validateStep()) {
//     $("#stepForm").submit(); // Normal form submit
//   }
// }
//   });

//   $("#prevBtn").click(function () {
//     if (currentStep > 0) {
//       currentStep--;
//       updateSteps();
//     }
//   });

//   updateSteps();
// });
// $(document).ready(function () {
//     let currentStep = 0;
//     const totalSteps = $(".form-step").length;

//     function updateSteps() {
//         $(".form-step").removeClass("active").eq(currentStep).addClass("active");

//         $(".step").each(function (index) {
//             $(this).toggleClass("active", index <= currentStep);
//         });

//         $("#prevBtn").prop("disabled", currentStep === 0);
//         $("#nextBtn").text(currentStep === totalSteps - 1 ? "Submit" : "Continue");
//     }

//     function validateStep() {
//         let isValid = true;

//         // Required input check
//         $(".form-step").eq(currentStep).find("input[required]").each(function () {
//             if (!this.checkValidity()) {
//                 this.reportValidity();
//                 isValid = false;
//                 return false;
//             }
//         });

//         // Step 1 extra check: booking type & location
//         if (currentStep === 0) {
//             const bookingType = $("input[name='bookingType']:checked").val();
//             const location = $("select[name='location']").val();

//             if (!bookingType || !location) {
//                 alert("Please select location and booking type.");
//                 isValid = false;
//             }
//         }

//         return isValid;
//     }

//     $("#nextBtn").click(function () {
//         if (currentStep < totalSteps - 1) {
//             if (validateStep()) {
//                 currentStep++;
//                 updateSteps();
//             }
//         } else {
//             if (validateStep()) {
//                 $("#stepForm").submit(); // final submit
//             }
//         }
//     });

//     $("#prevBtn").click(function () {
//         if (currentStep > 0) {
//             currentStep--;
//             updateSteps();
//         }
//     });

//     updateSteps();
// });


// $(document).ready(function () {
//     let currentStep = 0;
//     const totalSteps = $(".form-step").length;

//     function updateSteps() {
//         $(".form-step").removeClass("active").eq(currentStep).addClass("active");

        
//         $(".steps .step").removeClass("active").each(function(index) {
//             if (index <= currentStep) {
//                 $(this).addClass("active");
//             }
//         });

//         // Hide previous button on first step
//         if (currentStep === 0) {
//             $("#prevBtn").hide();
//         } else {
//             $("#prevBtn").show();
//         }

//         $("#nextBtn").text(currentStep === totalSteps - 1 ? "Submit" : "Continue");
//     }

//     function validateStep() {
//         let isValid = true;

//         // Required input check
//         $(".form-step").eq(currentStep).find("input[required]").each(function () {
//             if (!this.checkValidity()) {
//                 this.reportValidity();
//                 isValid = false;
//                 return false;
//             }
//         });

//         // Step 1 extra check: booking type, location, pets, check-in/out
//         if (currentStep === 0) {
//             const bookingType = $("input[name='bookingType']:checked").val();
//             const location = $("select[name='location']").val();
//             const numDogs = parseInt($("#numDogs").val());
//             const numCats = parseInt($("#numCats").val());
//             const checkIn = $("#checkIn").val();
//             const checkOut = $("#checkOut").val();

//             if (!bookingType || !location) {
//                 alert("Please select location and booking type.");
//                 isValid = false;
//             } else if (numDogs + numCats < 1) {
//                 alert("Please select at least 1 dog or cat.");
//                 isValid = false;
//             } else if (!checkIn || !checkOut) {
//                 alert("Please select both check-in and check-out dates.");
//                 isValid = false;
//             }
//         }

//         return isValid;
//     }

//     $("#nextBtn").click(function () {
//         if (currentStep < totalSteps - 1) {
//             if (validateStep()) {
//                 currentStep++;
//                 updateSteps();
//             }
//         } else {
//             if (validateStep()) {
//                 $("#stepForm").submit(); // final submit
//             }
//         }
//     });

//     $("#prevBtn").click(function () {
//         if (currentStep > 0) {
//             currentStep--;
//             updateSteps();
//         }
//     });

//     updateSteps();
// });

// document.addEventListener('DOMContentLoaded', function () {
//     // Find all mega menu toggle buttons
//     const megaMenuToggles = document.querySelectorAll('.megamenu-toggle');

//     megaMenuToggles.forEach(toggle => {
//         toggle.addEventListener('click', function (event) {
//             // Prevent the default link behavior if any
//             event.preventDefault();
            
//             // Get the parent '.has-megamenu' element
//             const parentLi = this.parentElement;

//             // Toggle the 'open' class on the parent
//             parentLi.classList.toggle('open');
            
//             // Change the text of the toggle button
//             if (parentLi.classList.contains('open')) {
//                 this.textContent = '−'; // Minus sign
//             } else {
//                 this.textContent = '+';
//             }
//         });
//     });
// });



document.addEventListener('DOMContentLoaded', function () {
    // Find all list items that have a mega menu
    const megaMenuItems = document.querySelectorAll('.navbar-nav .has-megamenu');

    megaMenuItems.forEach(item => {
        // Find the main link and the toggle button within each item
        const link = item.querySelector('a');
        const toggle = item.querySelector('.megamenu-toggle');

        // This function will handle the opening/closing logic
        const toggleMenu = function (event) {
            // Prevent the link from trying to navigate anywhere
            event.preventDefault();
            
            // Toggle the 'open' class on the parent <li>
            item.classList.toggle('open');
            
            // Update the text of the toggle button
            if (item.classList.contains('open')) {
                toggle.textContent = '−'; // Minus sign
            } else {
                toggle.textContent = '+';
            }
        };

        // Attach the click event to BOTH the link and the toggle button
        if (link) {
            link.addEventListener('click', toggleMenu);
        }
        if (toggle) {
            toggle.addEventListener('click', toggleMenu);
        }
    });
});