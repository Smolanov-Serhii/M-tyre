$(document ).ready(function() {

    if ($('.single-cart-custom-meta').length){
        $('.samovivoz').click(function() {
            $(".dostavka_tab a").trigger('click');
            $('html, body').animate({
                scrollTop: $("#tab-dostavka").offset().top  // класс объекта к которому приезжаем
            }, 1000); // Скорость прокрутки
        });
        $('.dostavka').click(function() {
            $(".dostavka_tab a").trigger('click');
            $('html, body').animate({
                scrollTop: $("#tab-dostavka").offset().top  // класс объекта к которому приезжаем
            }, 1000); // Скорость прокрутки
        });
    }

    if ($('.burger__button').length){
        $('.burger__button').click(function() {
            $('.header-mobile').toggleClass('active');
            $('.fade-mob-menu').fadeToggle(300);
        });
        $('.header-mobile__header').click(function() {
            $('.header-mobile').toggleClass('active');
            $('.fade-mob-menu').fadeToggle(300);
        });
    }

    if ($('.header-mobile').length){
        $('.header-mobile .pointer-event > a').click(function() {
            $(this).closest('.pointer-event').toggleClass('showed-mob-menu');
            $(this).closest('.pointer-event').find('.sub-menu').fadeToggle(300);
        });
    }

    if ($('.woof_submit_search_form').length){
        $('.woof_submit_search_form').click(function() {
            if ($('.widget-area-fade').length){
                $('.widget-area-fade').fadeOut(300);
            }
            $('.sidebar_container_before_loop .widget-area').fadeOut(300);
        });
        $(window).on('resize', function() {
            if( $(window).width() >= 1200) {
                $('.sidebar_container_before_loop .widget-area').fadeIn(300);
            } else {
                $('.sidebar_container_before_loop .widget-area').fadeOut(300);
                $('.widget-area-fade').fadeOut(300);
            }
        });
    }
    if ($('.mobile-filter').length){
        $('.mobile-filter svg').click(function() {
            if ($('.widget-area-fade').length){
                $('.widget-area-fade').fadeIn(300);
            }
            $('.sidebar_container_before_loop .widget-area').fadeIn(300);
        });
    }
    if ($('.filter-close-btn').length){
        $('.filter-close-btn svg').click(function() {
            $('.widget-area-fade').fadeOut(300);
            $('.sidebar_container_before_loop .widget-area').fadeOut(300);
        });
    }
    if ($('.woocommerce-checkout').length){
        $('#billing_last_name_field').appendTo('.checkout__person');
        $('#billing_first_name_field').appendTo('.checkout__person');
        $('#billing_email_field').appendTo('.checkout__person');
        $('#billing_phone_field').appendTo('.checkout__person');
        $('#shipping_method').appendTo('.checkout__dostavka-select');
        $('#billing_city_field').appendTo('.checkout__dostavka-select');
        $('#billing_address_1_field').appendTo('.checkout__dostavka-select');
        $('#house_field').appendTo('.checkout__dostavka-select');
        $('#flat_field').appendTo('.checkout__dostavka-select');
        $('#payment').appendTo('.checkout__pay-select');
        $('#order_review').appendTo('.checkout__right-column');
        $('.col2-set').appendTo('.checkout__pay-select');
        $('#place_order').appendTo('.checkout__footer-btn');

    }

    if ($('.footer').length){

            $('.footer .pointer-event').click(function() {
                if( $(window).width() <= 768) {
                $(this).find('.sub-menu').fadeToggle(300);
                $(this).toggleClass('footer-showed');
                } else {
                    $('.footer .pointer-event').removeClass('footer-showed');
                }
            });
            if( $(window).width() <= 768) {
               $('.footer__socials').appendTo('.footer__bottom');
            }
        $(window).on('resize', function() {
            if( $(window).width() > 768) {
                $('.footer .pointer-event').removeClass('footer-showed');
            }
        });
    }

    if ($('select').length){
        $(function() {
            $('select').selectric();
        });
    }

    if ($('.js-show-pop-rec').length){
        $( ".js-show-pop-rec").click(function(e) {
            $('#yith-wacp-mini-cart').trigger('click');
        });
    }

    $( ".col-md-12").each(function(index) {
        $( ".col-md-12 select").change(function() {
            $(this).closest('.col-md-12').find('label').css('display', 'flex');
            $(this).closest('.col-md-12').find('.selectric-wrapper').css('border-top', 'none');
        });
    });


    if ($('.js-show-chat').length){
        $( ".js-show-chat").click(function() {
            $('.sb-main').toggleClass('sb-active');
            $('.sb-main').fadeToggle(200);
        });
    }

    if ($('.main-slider').length){
        var MainSlider = new Swiper('.main-slider .swiper-container', {
            slidesPerView: 1,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.main-slider .swiper-pagination',
            }
        });
    }

    if ($('.partners').length){
        var PartnerSlider = new Swiper('.partners .swiper-container', {
            slidesPerView: 5,
            spaceBetween: 30,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            pagination: {
                el: '.partners .swiper-pagination',
            },
            breakpoints: {
                1400: {
                    slidesPerView: 5,
                    spaceBetween: 7,
                    centeredSlides: false
                },
                968: {
                    slidesPerView: 4,
                    centeredSlides: false
                },
                680: {
                    slidesPerView: 3,
                    centeredSlides: false
                },
                500: {
                    slidesPerView: 2
                },
                300: {
                    slidesPerView: 2
                },
                240: {
                    slidesPerView: 1
                }

            }
        });
    }

    if ($('.promotions').length){
        var PromotionsSlider = new Swiper('.promotions .swiper-container', {
            slidesPerView: 3,
            spaceBetween: 22,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            pagination: {
                el: '.promotions .swiper-pagination',
            },
            breakpoints: {
                1400: {
                    slidesPerView: 3,
                    spaceBetween: 22,
                    centeredSlides: false
                },
                960: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    centeredSlides: false
                },
                240: {
                    slidesPerView: 1
                }
            }
        });
    }
    if ($('.viewed .viewed__container').length){
        $('.viewed .viewed__container > .columns-4').addClass('swiper-container');
        var pagelement = $("<div class='swiper-pagination'></div>");
        $('.viewed .swiper-container').append(pagelement);
        var viewedskiderelems = new Swiper('.viewed .swiper-container', {
            slidesPerView: 5,
            spaceBetween: 7,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            pagination: {
                el: '.viewed .swiper-pagination',
                clickable: true
            },
            breakpoints: {
                1400: {
                    slidesPerView: 5,
                    spaceBetween: 7,
                    centeredSlides: false
                },
                1000: {
                    slidesPerView: 4,
                    centeredSlides: false
                },
                640: {
                    slidesPerView: 3
                },
                400: {
                    slidesPerView: 2
                },
                300: {
                    slidesPerView: 1
                },
                240: {
                    slidesPerView: 1
                }

            }
        });
    }
    if ($('.single-product').length){
        var singlenewElems = $('.entry-summary button.single_add_to_cart_button[name="add-to-cart"]');
        $('.entry-summary .quantity__row').append(singlenewElems);
    }

    if ($('.bestsellers').length){
        $('.bestsellers .woocommerce').addClass('swiper-container');
        var bestsellersElems = $("<div class='swiper-pagination'></div>");
        $('.bestsellers .swiper-container').append(bestsellersElems);
        var MainProductSlider = new Swiper('.bestsellers .swiper-container', {
            slidesPerView: 5,
            spaceBetween: 7,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            pagination: {
                el: '.bestsellers .swiper-pagination',
                clickable: true
            },
            breakpoints: {
                1400: {
                    slidesPerView: 5,
                    spaceBetween: 7,
                    centeredSlides: false
                },
                968: {
                    slidesPerView: 4,
                    centeredSlides: false
                },
                680: {
                    slidesPerView: 3,
                    centeredSlides: false
                },
                500: {
                    slidesPerView: 2
                },
                300: {
                    slidesPerView: 1
                },
                240: {
                    slidesPerView: 1
                }

            }
        });
    }
    if ($('.related').length){
        // $('.related .woocommerce').addClass('swiper-container');
        var relElems = $("<div class='swiper-pagination'></div>");
        $('.related .swiper-container').append(relElems);
        var RelatedSlider = new Swiper('.related .swiper-container', {
            slidesPerView: 5,
            spaceBetween: 7,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            pagination: {
                el: '.related .swiper-pagination',
                clickable: true
            },
            breakpoints: {
                1400: {
                    slidesPerView: 5,
                    spaceBetween: 7,
                    centeredSlides: false
                },
                1000: {
                    slidesPerView: 4,
                    centeredSlides: false
                },
                640: {
                    slidesPerView: 3
                },
                400: {
                    slidesPerView: 2
                },
                300: {
                    slidesPerView: 1
                },
                240: {
                    slidesPerView: 1
                }

            }
        });
    }



    if ($('.new').length){
        $('.new .woocommerce').addClass('swiper-container');
        var newElemsnew = $("<div class='swiper-pagination'></div>");
        $('.new .swiper-container').append(newElemsnew);
        var MainProductSlidernew = new Swiper('.new .swiper-container', {
            slidesPerView: 5,
            spaceBetween: 7,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            pagination: {
                el: '.new .swiper-pagination',
                clickable: true
            },
            breakpoints: {
                1400: {
                    slidesPerView: 5,
                    spaceBetween: 7,
                    centeredSlides: false
                },
                968: {
                    slidesPerView: 4,
                    centeredSlides: false
                },
                680: {
                    slidesPerView: 3,
                    centeredSlides: false
                },
                500: {
                    slidesPerView: 2
                },
                450: {
                    slidesPerView: 1
                },
                300: {
                    slidesPerView: 1
                },
                240: {
                    slidesPerView: 1
                }

            }
        });
    }

    if ($('.single-releated__list').length){
        var NewsLast = new Swiper('.single-releated__list', {
            slidesPerView: 5,
            spaceBetween: 7,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            pagination: {
                el: '.single-releated__list .swiper-pagination',
                clickable: true
            },
            breakpoints: {
                1400: {
                    slidesPerView: 3,
                    spaceBetween: 25,
                    centeredSlides: false
                },
                600: {
                    slidesPerView: 3,
                    centeredSlides: false
                },
                500: {
                    slidesPerView: 2
                },
                300: {
                    slidesPerView: 1
                },
                240: {
                    slidesPerView: 1
                }

            }
        });
    }

    if ($('.custom-sale').length){
        var CustomSale = new Swiper('.custom-sale', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            observer: true,
            observeParents: true,
            lazy: true,
            navigation: {
                nextEl: '.custom-sale__next',
                prevEl: '.custom-sale__prev'
            }
        });
    }
    function QuantityNum(){
    if ($('.quantity').length){

            $( '.quantity' ).each(function( index ) {
                var col = $(this).find('input');
                var plus = $(this).find('.quantity-arrow-plus');
                var minus = $(this).find('.quantity-arrow-minus');
                var total = col.val();
                plus.click(function() {
                    total++;
                    col.val(total);
                    $('button.button').removeAttr("disabled");
                    if (total > 0){
                        minus.removeClass('disable');
                    }
                    col.attr('value', total);
                    $( '[name="update_cart"]' ).trigger( 'click' );
                    $( '[name="update_wishlist"]' ).trigger( 'click' );
                });
                minus.click(function() {
                    total--;
                    col.val(total);
                    $('button.button').removeAttr("disabled");
                    if (total <= 0){
                        minus.addClass('disable');
                    } else {
                        minus.removeClass('disable');
                    }
                    col.attr('value', total);
                    $( '[name="update_cart"]' ).trigger( 'click' );
                    $( '[name="update_wishlist"]' ).trigger( 'click' );
                });
            });
        }

    }
    QuantityNum();
    $("body").bind("DOMSubtreeModified", function() {
        QuantityNum();
    });
    if ($('#map').length){
        if (  jQuery(window).width() >= 1024 ) {

            var FirstCoord = 41.190801;
            var SecondCoord = 69.239959;

            var CenterFirstCoord = 41.190824;
            var CenterSecondCoord = 69.242648;
        } else {
            var FirstCoord = 53.925701;
            var SecondCoord = 30.341069;

            var CenterFirstCoord = FirstCoord;
            var CenterSecondCoord = SecondCoord;
        }
        ymaps.ready(function () {

            var IconUrl = $('#map').data('icon');
            var myMap = new ymaps.Map('map', {
                    center: [CenterFirstCoord, CenterSecondCoord],
                    controls: [],
                    zoom: 17
                }, {
                    searchControlProvider: true
                }),

                // Создаём макет содержимого.
                MyIconContentLayout = ymaps.templateLayoutFactory.createClass(
                    '<div style="color: #FFFFFF; font-weight: bold;">$[properties.iconContent]</div>'
                ),

                myPlacemark = new ymaps.Placemark(myMap.getCenter(), {
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    // Своё изображение иконки метки.
                    iconImageHref: "",
                    // Размеры метки.
                    iconImageSize: [0, 0],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                }),
                myPlacemarkWithContent = new ymaps.Placemark([FirstCoord, SecondCoord], {
                }, {
                    // Опции.
                    // Необходимо указать данный тип макета.
                    iconLayout: 'default#imageWithContent',
                    // Своё изображение иконки метки.
                    iconImageHref: IconUrl,
                    // Размеры метки.
                    iconImageSize: [89, 59],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [0, -59],
                    // Смещение слоя с содержимым относительно слоя с картинкой.
                    iconContentOffset: [0, 30],
                    // Макет содержимого.
                    iconContentLayout: MyIconContentLayout
                });
            myMap.behaviors.disable('scrollZoom');
            myMap.geoObjects
                // .add(myPlacemark)
                .add(myPlacemarkWithContent);
        });
    }

});






