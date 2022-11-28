// eslint-disable-next-line no-unused-vars

const swiperSliderArea = new Swiper('.slider-area', {
    //  autoplay: {
    //     delay: 4500,
    //     disableOnInteraction: false,
    // },
    loop: true,
    direction: "vertical",
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
});

var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// Product Cats carousel
// eslint-disable-next-line no-unused-vars
const swiperShopByCat = new Swiper(".wc__shop_by_cat_inner", {
    slidesPerView: 2,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
        320: {
        slidesPerView: 1,
        spaceBetween: 0,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 4,
          spaceBetween: 40,
        },
        1024: {
          slidesPerView: 5,
          spaceBetween: 50,
        },
      },
  });

var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

var swiper = new Swiper(".mySwiper", {
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
        renderBullet: function (index, className) {
            return '<span class="' + className + '">' + (index + 1) + "</span>";
        },
    },
});

// Discount Swiper Slider
new Swiper(".woocom-discount-swiper", {
    loop: true,
    speed: 1000,
    slidesPerView: 1,
    spaceBetween: 30,
    autoplay: {
       delay: 3000,
    },
    scrollbar: {
        el: ".swiper-scrollbar",
        hide: true,
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

// new Swiper(".woocom-discount-swiper", {
//     pagination: {
//         el: ".woocom-swiper-pagination",
//         clickable: true,
//         renderBullet: function (index, className) {
//             return '<span class="' + className + '">' + (index + 1) + "</span>";
//         },
//     },
// });

const hamburgerIcon = document.querySelector(".mobile-off-canvas");
const closeIcon = document.querySelector(".offcanvas-menu-close");
const mobileMenu = document.querySelector(".offcanvas-mobile-menu");

// hamburgerIcon.addEventListener("click", (e) => {
//     mobileMenu.classList.add("active");
// });

// closeIcon.addEventListener("click", (e) => {
//     mobileMenu.classList.remove("active");
// });

const mobileIcon = document.querySelector(".offcanvas-wrapper .menu-item-has-children a i");
if (mobileIcon !== null) {
    mobileIcon.addEventListener("click", function () {
        this.closest("li").classList.toggle("active");
    });
}


;(function ($) {
    $('document').ready(function ($) {
        
        // Init easy waypoint animation
        // InitWaypointAnimations();

        // display post with ajax
        $(".cat-list_item").on("click", function () {
            $(".cat-list_item").removeClass("active");
            $(this).addClass("active");

            $.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                dataType: "html",
                data: {
                    action: "filter_custom_posts",
                    category: $(this).data("slug"),
                    post_type: $(this).data("post"),
                },
                success: function (res) {
                    console.log(res);
                    $(".project-tiles").html(res);
                },
            });
        });

        // Ajax load more post
        let currentPage = 1;
        $("#wc_load_more_btn").on("click", function (e) {
            e.preventDefault();
            currentPage++;

            $.ajax({
                type: "POST",
                url: "/wp-admin/admin-ajax.php",
                data: {
                    action: "display_ajax_post",
                    paged: currentPage,
                },
                error: function (error) {
                    console.log( error )
                },
                success: function (res) {
                    console.log( res.max )
                    if ( currentPage >= res.max) {
                        $(".hide_me").hide();
                    }
                    $(".ajax-load-post-append").append( res );
                },
            });
        });
    });

    $(window).on('load', function () { 
        /*--------------------------
            PRE LOADER
        ----------------------------*/
        $(".woocom-preloader").fadeOut();
    });

    AOS.init();

    /**
     * back to top
     */
    var backTopBtn = $('.scroll-top');
    $(window).scroll(function() {
    if ($(window).scrollTop() > 450) {
        backTopBtn.addClass('show');
    } else {
        backTopBtn.removeClass('show');
    }
    });

    backTopBtn.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
    });


// @ts-ignore
})(jQuery);


