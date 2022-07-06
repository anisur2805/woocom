var swiper = new Swiper(".slider-area", {
	// navigation: {
	// 	nextEl: ".swiper-button-next",
	// 	prevEl: ".swiper-button-prev",
	// },
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

var swiper = new Swiper(".mySwiper", {
	pagination: {
		el: ".swiper-pagination",
		clickable: true,
		renderBullet: function (index, className) {
			return '<span class="' + className + '">' + (index + 1) + "</span>";
		},
	},
});

const hamburgerIcon = document.querySelector(".mobile-off-canvas");
const closeIcon = document.querySelector(".offcanvas-menu-close");
const mobileMenu = document.querySelector(".offcanvas-mobile-menu");

hamburgerIcon.addEventListener("click", (e) => {
	mobileMenu.classList.add("active");
});

closeIcon.addEventListener("click", (e) => {
	mobileMenu.classList.remove("active");
});

const mobileIcon = document.querySelector(".offcanvas-wrapper .menu-item-has-children a i");
console.log( mobileIcon );
if ( mobileIcon !== null ) {
	mobileIcon.addEventListener("click", function () {
		this.closest("li").classList.toggle("active");
	});
}

jQuery('document').ready(function($) {
  // display post with ajax
  $(".cat-list_item").on("click", function () {
    $(".cat-list_item").removeClass("active")
    $(this).addClass("active")

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
        console.log(res)
        $(".project-tiles").html(res)
      },
    })
  });

  // Ajax load more post
  let currentPage = 2;
  $("#wc_load_more_btn").on("click", function (e) {
    e.preventDefault()
    console.log(e.target)
    currentPage++;

    $.ajax({
      type: "POST",
      url: "/wp-admin/admin-ajax.php",
      data: {
        action: "display_ajax_post",
        paged: currentPage,
      },
      success: function (res) {
        $(".ajax-load-post").append(res)
      },
    });
  });
})