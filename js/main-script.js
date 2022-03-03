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
mobileIcon.addEventListener("click", function () {
	this.closest("li").classList.toggle("active");
});


// _.map([1,2,3,], function(num) {
// 	return num * 3;
// });

let template = jQuery("#myFunction").html();
let templateFuc = _.template(template);

jQuery("body").append(
	templateFuc({
		title: "Anisur",
		description: "Another wordpress website.",
		className: "some-class-name",
	})
);
