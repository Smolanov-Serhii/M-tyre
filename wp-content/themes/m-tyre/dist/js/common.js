$(document).ready(function(){var e;$(".main-slider").length&&new Swiper(".main-slider .swiper-container",{slidesPerView:1,loop:!0,observer:!0,observeParents:!0,lazy:!0,navigation:{nextEl:".swiper-button-next",prevEl:".swiper-button-prev"},pagination:{el:".main-slider .swiper-pagination"}}),$(".partners").length&&new Swiper(".partners .swiper-container",{slidesPerView:5,spaceBetween:30,loop:!0,observer:!0,observeParents:!0,lazy:!0,pagination:{el:".partners .swiper-pagination"},breakpoints:{1400:{slidesPerView:5,spaceBetween:30,centeredSlides:!1},600:{slidesPerView:2,spaceBetween:20,centeredSlides:!1},500:{slidesPerView:1,spaceBetween:60},300:{slidesPerView:1,spaceBetween:20}}}),$(".promotions").length&&new Swiper(".promotions .swiper-container",{slidesPerView:2,spaceBetween:22,loop:!0,observer:!0,observeParents:!0,lazy:!0,pagination:{el:".promotions .swiper-pagination"},breakpoints:{1400:{slidesPerView:2,spaceBetween:22,centeredSlides:!1},600:{slidesPerView:2,spaceBetween:20,centeredSlides:!1},500:{slidesPerView:1,spaceBetween:60},300:{slidesPerView:1,spaceBetween:20}}}),$(".bestsellers").length&&($(".bestsellers .woocommerce").addClass("swiper-container"),e=$("<div class='swiper-pagination'></div>"),$(".bestsellers .swiper-container").append(e),new Swiper(".bestsellers .swiper-container",{slidesPerView:5,spaceBetween:7,loop:!0,observer:!0,observeParents:!0,lazy:!0,pagination:{el:".bestsellers .swiper-pagination",clickable:!0},breakpoints:{1400:{slidesPerView:5,spaceBetween:7,centeredSlides:!1},600:{slidesPerView:4,centeredSlides:!1},500:{slidesPerView:1},300:{slidesPerView:1}}})),$(".new").length&&($(".new .woocommerce").addClass("swiper-container"),e=$("<div class='swiper-pagination'></div>"),$(".new .swiper-container").append(e),new Swiper(".new .swiper-container",{slidesPerView:5,spaceBetween:7,loop:!0,observer:!0,observeParents:!0,lazy:!0,pagination:{el:".new .swiper-pagination",clickable:!0},breakpoints:{1400:{slidesPerView:5,spaceBetween:7,centeredSlides:!1},600:{slidesPerView:4,centeredSlides:!1},500:{slidesPerView:1},300:{slidesPerView:1}}}))});