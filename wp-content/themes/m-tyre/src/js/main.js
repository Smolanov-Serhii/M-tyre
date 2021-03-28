$(document ).ready(function() {

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
                    spaceBetween: 30,
                    centeredSlides: false,
                },
                600: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    centeredSlides: false,
                },
                500: {
                    slidesPerView: 1,
                    spaceBetween: 60,
                },
                300: {
                    slidesPerView: 1,
                    spaceBetween: 20,
                },

            }
        });
    }

    if ($('.promotions').length){
        var PromotionsSlider = new Swiper('.promotions .swiper-container', {
            slidesPerView: 2,
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
                    slidesPerView: 2,
                    spaceBetween: 22,
                    centeredSlides: false
                },
                600: {
                    slidesPerView: 2,
                    spaceBetween: 20,
                    centeredSlides: false
                },
                500: {
                    slidesPerView: 1,
                    spaceBetween: 60
                },
                300: {
                    slidesPerView: 1,
                    spaceBetween: 20
                }

            }
        });
    }

    if ($('.single-product').length){
        var newElems = $('.entry-summary button.single_add_to_cart_button[name="add-to-cart"]');
        $('.entry-summary .quantity__row').append(newElems);
    }

    if ($('.bestsellers').length){
        $('.bestsellers .woocommerce').addClass('swiper-container');
        var newElems = $("<div class='swiper-pagination'></div>");
        $('.bestsellers .swiper-container').append(newElems);
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
                600: {
                    slidesPerView: 4,
                    centeredSlides: false
                },
                500: {
                    slidesPerView: 1
                },
                300: {
                    slidesPerView: 1
                }

            }
        });
    }
    if ($('.related').length){
        $('.related .woocommerce').addClass('swiper-container');
        var newElems = $("<div class='swiper-pagination'></div>");
        $('.related .swiper-container').append(newElems);
        var RelatedtSlider = new Swiper('.related .swiper-container', {
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
                600: {
                    slidesPerView: 4,
                    centeredSlides: false
                },
                500: {
                    slidesPerView: 1
                },
                300: {
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
                600: {
                    slidesPerView: 4,
                    centeredSlides: false
                },
                500: {
                    slidesPerView: 1
                },
                300: {
                    slidesPerView: 1
                }

            }
        });
    }

    if ($('.quantity').length){
        $( '.quantity' ).each(function( index ) {
            let col = $(this).find('input');
            let plus = $(this).find('.quantity-arrow-plus');
            let minus = $(this).find('.quantity-arrow-minus');
            let step = $(this).find('input').attr('step');
            let min = $(this).find('input').attr('min');
            var total = 0;
            plus.click(function() {
                total = (col.val() * 1) + (step * 1);
                col.val(total);
                $('button.button').removeAttr("disabled");
                var check = col.val();
                if (total > min){
                    minus.removeClass('disable');
                }
            });
            minus.click(function() {
                var check = col.val();
                total = (col.val() * 1) - (step * 1);
                col.val(total);
                $('button.button').removeAttr("disabled");
                if (total <= min){
                    minus.addClass('disable');
                } else {
                    minus.removeClass('disable');
                }

            });
        });
    }

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
                    iconImageSize: [72, 87],
                    // Смещение левого верхнего угла иконки относительно
                    // её "ножки" (точки привязки).
                    iconImageOffset: [-40, -90],
                    // Смещение слоя с содержимым относительно слоя с картинкой.
                    iconContentOffset: [15, 15],
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






