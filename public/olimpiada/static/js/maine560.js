$(document).ready(function () {
	
	if( $(window).outerWidth() <= 1023 ){
		$('.process-card').attr('data-aos', '');
		
		setTimeout(function(){
			$('.iti__country-list').outerWidth($("#reg-phone").outerWidth());
			$('.complex-phone_prefooter .iti__country-list').outerWidth($(".prefooter-form-step input.js-userclass-input").outerWidth());
		}, 500)
	}
	
	AOS.init({
		once: true,
		easing: 'ease',
		duration: 1000,
		offset: 50
	});
	

	$(document).on('click', '.up-arrow', function () {
		$('html, body').stop().animate(
			{
				scrollTop: 0,
			},
			1000
		);
	});
	
	
	
	//Metriks
	function triggerGA(t, n) {
		if(typeof gtag != 'undefined'){
			gtag('event', t, {
				'event_category': 'Reg',
				'event_label': 'trial',
				'value': n
			});
		}
    }
	function triggerYM(t) {
		if(typeof ym != 'undefined'){
			ym(39474735, 'reachGoal', t);
		}
    }
	
	var push_event_datalayer = function (t, n) {
        return "function" !== typeof window.dataLayer.push || window.dataLayer.push({
            event: "event-to-ga",
            eventCategory: "Reg",
            eventAction: t,
            eventLabel: "Trial",
            eventValue: n
        })
    };
	
	
	$(document).on('click', '.js-registration button[type="submit"]', function(){
		triggerGA("SEND4REG", "5");
        triggerYM("SEND4REG");
	});
	
	

	function getParameterByName(name, url) {
        if (!url) url = window.location.href;
        name = name.replace(/[\[\]]/g, '\\$&');
        var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
            results = regex.exec(url);
        if (!results) return null;
        if (!results[2]) return '';
        return decodeURIComponent(results[2].replace(/\+/g, ' '));
    }



	
	/* Start Cookie */
	function getCookie(e) {
		var i = document.cookie.match(
			new RegExp('(?:^|; )' + e.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + '=([^;]*)')
		)
		return i ? decodeURIComponent(i[1]) : void 0
	}

	function setCookie(e, i, t) {
		var s = (t = t || {}).expires
		if ('number' == typeof s && s) {
			var o = new Date()
			o.setTime(o.getTime() + 1e3 * s), (s = t.expires = o)
		}
		s && s.toUTCString && (t.expires = s.toUTCString())
		var r = e + '=' + (i = encodeURIComponent(i))
		for (var n in t) {
			r += '; ' + n
			var a = t[n]
			!0 !== a && (r += '=' + a)
		}
		document.cookie = r
	}

	function deleteCookie(e) {
		setCookie(e, '', {
			expires: -1,
		})
	}

	!getCookie('cookie-hide') && $('.cookie-box').delay(1000).slideDown(200)

	$(document).on('touchstart, click', '.cookie-box__btn', function (e) {
		setCookie('cookie-hide', !0, {
			expires: new Date(new Date().getTime() + 2678e9).toUTCString(),
			path: '/',
		})
		$('.cookie-box').slideUp(200)
	})

	/* End Cookie */

	//popups
	function ppShow(dataPp) {
		$('html,body').addClass('noscroll')
		$('.pp').removeClass('show')
		$('.pp[data-pp="' + dataPp + '"]').addClass('show')
		$('.pp[data-pp="' + dataPp + '"]').trigger('click')
	}

	function sidebarShow(dataPp) {
		$('html,body').addClass('noscroll')
		$('.sidebar').removeClass('show')
		$('.sidebar-back').removeClass('show')
		$('.sidebar[data-sb="' + dataPp + '"]').addClass('show')
		$('.sidebar-back').addClass('show')
	}

	$(document).on('click', '.pp_', function (e) {
		e.preventDefault()
		var el = $(this)
		var th_pp = el.attr('data-pp')
		
		if (el.hasClass('js-ajax-pp')) {
            
			var th_ajaxlink = el.attr('data-link');
			var th_content_box = $('.pp[data-pp="' + th_pp + '"]');
			
            $.ajax({
                url: th_ajaxlink,
                type: 'GET',
				beforeSend: function() {
					th_content_box.addClass('loading');
					
				},
                success: function (data) {
                    th_content_box.find('.js-loadbox-content').html('');
					th_content_box.find('.js-loadbox-content').html(data);

                },
                error: function () {
                    //PNotify.error('РћС€РёР±РєР°, С‚Р°РєРѕРіРѕ РїРѕРїР°РїР° РЅРµ СЃСѓС‰РµСЃС‚РІСѓРµС‚ =(')
                },
				complete: function(){
					th_content_box.removeClass('loading');
				}
            });
			
        } 
		
		if (el.hasClass('js-pp-review')) {
            
			var th_id = el.attr('data-id');
			var th_content_box = $('.pp[data-pp="' + th_pp + '"]');
			
            var data = {};
			data['action'] = 'iu-get-review';
			data['review-id'] = th_id;
				
			
			$.ajax({
				url: [
					location.protocol,
					'//', 
					location.host,
					location.pathname
				].join(''),
				data: data,
				type: 'post',
				dataType: 'json',
				beforeSend: function() {
					th_content_box.addClass('loading');
					
				},
                success: function (data) {
                    th_content_box.find('.js-loadbox-content').html('');
					th_content_box.find('.js-loadbox-content').html(data.data);

                },
                error: function () {
                    //PNotify.error('РћС€РёР±РєР°, С‚Р°РєРѕРіРѕ РїРѕРїР°РїР° РЅРµ СЃСѓС‰РµСЃС‚РІСѓРµС‚ =(')
                },
				complete: function(){
					th_content_box.removeClass('loading');
				}
			});

			
        } 
		 
		
		if( th_pp == 'request' ){
			var th_tariffname = el.attr('data-tariff');
			$('.js-request-form input[name="tariff"]').val(th_tariffname);
			$('.js-request-form input[name="productName"]').val('');
			$('.js-request-form input[name="buttonId"]').val('');
			$('.js-request-form input[name="customEmailTo"]').val('');
			
			if( el.attr('data-yatarget1') && el.attr('data-yatarget1') != '' ){
				triggerYM(el.attr('data-yatarget1'));
				
				let event_category = '';
				let event_label = '';
				
				if( el.attr('data-yatarget1') == 'GO2REQTUT') {
					event_category = 'go2reqtut';
					event_label = 'request';
				}
				
				if( el.attr('data-yatarget1') == 'GO2REQPRESCH') {
					event_category = 'go2reqpresch';
					event_label = 'request';
				}
				if( el.attr('data-yatarget1') == 'GO2REQGIA') {
					event_category = 'go2reqgia';
					event_label = 'request';
				}
				gtag('event', el.attr('data-yatarget1'), {
					'event_category': event_category,
					'event_label': event_label,
					'value': 2
				});
			}
			if( el.attr('data-yatarget2') && el.attr('data-yatarget2') != '' ){
				$('.js-request-form').attr('data-yatargetsubmit',el.attr('data-yatarget2'));
			}
			
			if( el.attr('data-product') !='' ){
			    $('.js-request-form input[name="productName"]').val(el.attr('data-product'));
			}
			if( el.attr('data-button_id') !='' ){
			    $('.js-request-form input[name="buttonId"]').val(el.attr('data-button_id'));
			}
			if( el.attr('data-email') !='' ){
			    $('.js-request-form input[name="customEmailTo"]').val(el.attr('data-email'));
			}
			
			
		}
		
		if(el.hasClass('js-review-image') ){
		    let thImage = $(this).attr('data-image');
		    $('.pp-review-image').find('.js-loadbox-content img').attr('src', thImage);
		    
		}
		
		let schoolLink = '/home/';
		
		if( th_pp == 'registration' ||  th_pp == 'auth'){
			if( userIsAuth ) {
				window.location.replace(authURL);
			} else {
				ppShow(th_pp)
			}
		} else {
			ppShow(th_pp)
		}	
		
		if( th_pp == 'registration' ){
			triggerGA("GO2REG", "3");
			triggerYM("GO2REG");
		   if(typeof VK != 'undefined'){
			   VK.Retargeting.Event('GO2REG');
		   }
		   if( typeof grecaptcha != 'undefined'){
				grecaptcha.reset();
		   }
		}
		
		if( th_pp == 'auth' ){
			triggerGA("GO2AUTH", "3");
			triggerYM("GO2AUTH");
		   if( typeof VK != 'undefined' ){
			   VK.Retargeting.Event('GO2AUTH');
		   }
		}

	})

	$(document).on('click', '.sb_', function (e) {
		e.preventDefault()
		var el = $(this)
		var th_pp = el.attr('data-sb')

		sidebarShow(th_pp)
	})

	$(document).on('click', '.pp__close, .pp__bg, .close_btn, .js-close-pp, .sidebar-back, .sb_close', function () {
		ppClose()
		sidebarClose()
	})

	document.onkeydown = function (evt) {
		evt = evt || window.event
		if (evt.keyCode === 27) {
			ppClose()
			sidebarClose()
		}
	}

	function sidebarClose() {
		$('.sidebar-back').removeClass('show')
		$('.sidebar').removeClass('show')
		$('html,body').removeClass('noscroll')
	}

	function ppClose() {
		$('.pp').removeClass('show');
		$('html,body').removeClass('noscroll');
		$('.js-pp-iframe-video').attr("src", "");
	}

	$(document).on('click', '.js-pageup', function () {
		$('html, body').stop().animate(
			{
				scrollTop: 0,
			},
			1000
		)
	})

	
	// anchor function
	$('a').click(function (e) {
		try {
			let elementClick = $(this).attr('href');
			let destination = $(elementClick).offset().top
			if (destination) {

				let scrollCorrection = 0
				if (window.innerWidth >= 1024) {
					scrollCorrection = 120
				}
				$('html,body').animate(
					{
						scrollTop: destination - scrollCorrection,
					},
					1000
				)
			}
			return false
		} catch (e) {
			
		}
	})
	
	//mp reviews
	if ($('.review-slider-swiper .swiper-slide').length > 0) {
		var swiper_item2 = new Swiper('.review-slider .review-slider-swiper', {
			slidesPerView: 2,
			spaceBetween: 20,
			loop: false,
			nav: true,
			navigation: {
				nextEl: '.review-slider .swiper-button-next',
				prevEl: '.review-slider .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
				  slidesPerView: 'auto',
				  freemode: true,
				  spaceBetween: 12,

				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 16,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				1281: {
					slidesPerView: 2,
					spaceBetween: 20,
					freemode: false,
				}
			}
		})
	} else {
		$('.review-slider .swiper-button-prev').remove()
		$('.review-slider .swiper-button-next').remove()
	}



	//mp reviews
	if ($('.reviews-page-slider .swiper-slide').length > 0) {
		var swiper_item2 = new Swiper('.review-page-slider-swiper', {
			slidesPerView: 3,
			spaceBetween: 20,
			loop: false,
			nav: true,
			navigation: {
				nextEl: '.reviews-page-slider .swiper-button-next',
				prevEl: '.reviews-page-slider .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 12,

				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 16,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				1280: {
					slidesPerView: 3,
					spaceBetween: 20,
					freemode: false,
				}
			}
		})
	} else {
		$('.reviews-page-slider .swiper-button-prev').remove()
		$('.reviews-page-slider .swiper-button-next').remove()
	}

	//mentors reviews
	if ($('.mentors-page-slider-swiper .swiper-slide').length > 0) {
		var swiper_item2 = new Swiper('.mentors-page-slider-swiper', {
			slidesPerView: 2,
			spaceBetween: 20,
			loop: false,
			nav: true,
			navigation: {
				nextEl: '.mentors-page-slider-swiper .swiper-button-next',
				prevEl: '.mentors-page-slider-swiper .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 12,

				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				1280: {
					slidesPerView: 2,
					spaceBetween: 20,
					freemode: false,
				}
			}
		});
		if ($('.mentors-page-slider-swiper .swiper-slide').length <= 2) {
			$('.mentors-page-slider-swiper .swiper-button-prev').remove();
			$('.mentors-page-slider-swiper .swiper-button-next').remove();
		}
	} else {
		$('.mentors-page-slider-swiper .swiper-button-prev').remove();
			$('.mentors-page-slider-swiper .swiper-button-next').remove();
		
	}
	
	
	//mentors reviews
	if ($('.persons-page-slider-swiper .swiper-slide').length > 0) {
		var swiper_item2 = new Swiper('.persons-page-slider-swiper', {
			slidesPerView: 2,
			spaceBetween: 20,
			loop: false,
			nav: true,
			navigation: {
				nextEl: '.persons-page-slider-swiper .swiper-button-next',
				prevEl: '.persons-page-slider-swiper .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 12,

				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				1280: {
					slidesPerView: 4,
					spaceBetween: 20,
					freemode: false,
				}
			}
		});
		if ($('.persons-page-slider-swiper .swiper-slide').length <= 4) {
			$('.persons-page-slider-swiper .swiper-button-prev').remove();
			$('.persons-page-slider-swiper .swiper-button-next').remove();
		}
	} else {
		$('.persons-page-slider-swiper .swiper-button-prev').remove();
			$('.persons-page-slider-swiper .swiper-button-next').remove();
		
	}


		//great people ZaProtiv

	//mp reviews
	if ($('.great-people-wrapper .swiper-slide').length > 0) {
		var swiper_item2 = new Swiper('.great-people-swiper', {
			slidesPerView: 3,
			spaceBetween: 20,
			loop: false,
			nav: true,
			navigation: {
				nextEl: '.great-people-wrapper .swiper-button-next',
				prevEl: '.great-people-wrapper .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 12,

				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 16,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				1280: {
					slidesPerView: 'auto',
					spaceBetween: 20,
					freemode: true,
				}
			}
		})
	} else {
		$('.great-people-wrapper .swiper-button-prev').remove()
		$('.great-people-wrapper .swiper-button-next').remove()
	}








		//video review
		$(document).on('mouseenter', '.video-box', function (e) {
			if( !$(this).hasClass('video-box_noteaser')){
				$(this).find('video').get(0).play(); 
			}
		});
		
		$(document).on('mouseleave', '.video-box', function (e) {
			if( !$(this).hasClass('video-box_noteaser')){
				$(this).find('video').get(0).pause(); 
			}
			
		});

		$(document).on('click', '.js-video-pp', function (e) {
			let src = $(this).attr("data-frame") + '?rel=0&showinfo=0&autoplay=1&mute=1';
			$('.js-pp-iframe-video').attr("src", "");
			$('.js-pp-iframe-video').attr("src", src);
			$('.js-pp-iframe-video').attr("allow", "autoplay");
		});
		
        
        
        $(document).on('click', '.service-imagetext-video-preview', function (e) {
            $(this).fadeOut(200);
            let thParent = $(this).parent();
            let thHeight = $(this).outerHeight();
            let src = $(this).parent().attr("data-video") + '?rel=0&showinfo=0&autoplay=1&mute=1';
            thParent.find(".video-play").fadeOut(200, function(){
                thParent.find(".video-iframe").addClass('show');
                thParent.find(".video-iframe iframe").attr("src", src);
                thParent.find(".video-iframe iframe").attr("allow", "autoplay");
                if( $(window).outerWidth() < 768 ){
                    thParent.find(".video-iframe iframe").outerHeight(thHeight);
                }
            });
            
        });






		//FAQ

		$(document).on('click', '.faq-question-item-head', function(){
			$(this).parent().toggleClass('active');
			$(this).parent().find('.faq-question-spoiler').slideToggle(400);

		});


		
		//psyhology items


		$(document).on('click', '.psyhology-course-item-head', function(){
			$(this).parent().toggleClass('active');
			$(this).parent().find('.psyhology-course-item-contentbox').slideToggle(400);

		});

		// Enroll tabs

		$(document).on('click', '.js-tab-trigger', function(){
			$('.js-tab-trigger').removeClass('active');
			$('.js-tab-content').removeClass('active');
			let th_tab = $(this).attr('data-tab');

			$(this).addClass('active');
			$('.js-tab-content[data-tab="'+th_tab+'"]').addClass('active');
			AOS.refresh();
		});

		// Tariffs spoiler
		$(document).on('click', '.tariffs-item-includes-more', function(){
			$(this).parents('.tariffs-item').toggleClass('open-spoiler');
			$(this).parents('.tariffs-item').find('.tariffs-item-includes-spoiler').slideToggle(200);

			if( $(this).parents('.tariffs-item').hasClass('open-spoiler') ){
			    $(this).addClass('open');
				$(this).find('.spoiler-text').text('Свернуть');
			} else {
			    $(this).removeClass('open');
				$(this).find('.spoiler-text').text('А также');
			}

		});
		

		//FILES Form

		
		$("#upload-file").on("change",
        function (evt) {

            var files = evt.target.files;

            var dt = new DataTransfer()
            for (let file of files) {
                dt.items.add(file)
            }


            evt.target.files = dt.files

            let template = `${Object.keys(files)
                .map(file => `<div class="file uploaded-file-delete file--${file}"><div class="file-cross"></div><div class="name"><span>${files[file].name}</span></div></div>`)
                .join("")}`;

            setTimeout(() => {
                $(".list-files").html(template);
            }, 1000);

        });


    $(document).on("click", ".uploaded-file-delete", function () {

        let index = $(this).index();
        let inp = document.getElementById("upload-file");
        let files = inp.files;

        let fileList = [];

        for (let file of files) {
            fileList.push(file)
        }

        fileList.splice(index, 1);

        var dt = new DataTransfer()

        fileList.forEach(element => {
            dt.items.add(element)
        });

        inp.files = dt.files;

        $(inp).trigger("change")

    });




	//view password
	$(document).on("click", ".js-pass-switcher-auth", function () {
		var x = document.getElementById("authpassword");
		if (x.type === "password") {
		  x.type = "text";
		  $('.js-pass-switcher-auth').addClass('view');
		} else {
		  x.type = "password";
		  $('.js-pass-switcher-auth').removeClass('view');
		}
	});

	$(document).on("click", ".js-pass-switcher-reg", function () {
		var x = document.getElementById("regpassword");
		if (x.type === "password") {
		  x.type = "text";
		  $('.js-pass-switcher-reg').addClass('view');
		} else {
		  x.type = "password";
		  $('.js-pass-switcher-reg').removeClass('view');
		}
	});

	$(document).on("click", ".js-pass-switcher-prefooter", function () {
		var x = document.getElementById("prefooterpassword");
		if (x.type === "password") {
		  x.type = "text";
		  $('.js-pass-switcher-prefooter').addClass('view');
		} else {
		  x.type = "password";
		  $('.js-pass-switcher-prefooter').removeClass('view');
		}
	});




//header shadow

$(window).scroll(function () {
	try {
		if( $(this).scrollTop() >= 100){
			$('.header').addClass('header-shadow')
		} else {
			$('.header').removeClass('header-shadow')
		}
	} catch (error) {}
})
		

//profile submenu
if( $(window).outerWidth() >= 1024){
	$('.header-profile').hover(function(){
		$(this).addClass('active'); 
		$('.header-profile-menu').addClass('show');
	
	}, function(){
		$(this).removeClass('active'); 
		$('.header-profile-menu').removeClass('show');
	});
	
	$('.header-profile-menu').hover(function(){
		$(this).addClass('show'); 
		$('.header-profile').addClass('active');
	
	}, function(){
		$(this).removeClass('show'); 
		$('.header-profile').removeClass('active');
	});

	$('.header-lang').hover(function(){
		$(this).addClass('active'); 
		$('.header-lang-menu').addClass('show');
	
	}, function(){
		$(this).removeClass('active'); 
		$('.header-lang-menu').removeClass('show');
	});
	
	$('.header-lang-menu').hover(function(){
		$(this).addClass('show'); 
		$('.header-profile').addClass('active');
	
	}, function(){
		$(this).removeClass('show'); 
		$('.header-lang').removeClass('active');
	});
} else {
	$(document).on('click', '.header-profile', function(){
		$('.header-profile-menu').addClass('active');
		$('.profile-menu-back').addClass('show');
	});
	$(document).on('click', '.header-lang', function(){
		$('.header-lang-menu').addClass('active');
		$('.lang-menu-back').addClass('show');
	});
}


$(document).on('click', '.js-close-profile-menu', function(){
	$('.header-profile-menu').removeClass('active');
	$('.profile-menu-back').removeClass('show');

});
$(document).on('click', '.js-close-lang-menu', function(){
	$('.header-lang-menu').removeClass('active');
	$('.lang-menu-back').removeClass('show');

})

// submenus

if( $(window).outerWidth() >=1280 ){
	$('header').hover(function () { },
	function () {
		$(".header__additional-layer").fadeOut(100);
		setTimeout(function () {
			$(".submenu").fadeOut(0)
		}, 100);
	});
	
	$(".submenu").fadeOut(0);
	$('header .header-nav-item').hover(function () {
		$('header .header-nav-item').removeClass('active');
		let el = $(this);
	
			el.addClass('active');
			let data_attr = el.attr("data-submenu");
			if ($(".header__additional-layer").is(':hidden')) {
				$(".header__additional-layer").fadeIn(100);
				$(".submenu[data-submenu=" + data_attr + "]").fadeIn(100);
			} else {
				$(".submenu").not("[data-submenu=" + data_attr + "]").fadeOut(0);
				$(".submenu[data-submenu=" + data_attr + "]").fadeIn(100);
			}
		});
	
		$('header').on('mouseleave', function () {
			$('header .header-nav-item').removeClass('active');
		});
} else {
	$(document).on('click', '.header-nav-item', function(){
		let el = $(this);
		let data_attr = el.attr("data-submenu");
		let el_name = el.text();
		$('.submenu').removeClass('show');
		$('.header__additional-layer').show(0);
		$('.submenu[data-submenu="'+data_attr+'"]').addClass('show');
		$('.burger ').addClass('arrow-state');
		$('.js-burger-arrow-title').text(el_name).addClass('show');
	
	})
}






 // abonement make swiper

 if( $(window).outerWidth() < 1280 ){

	//abonement options
		var swiper_item2 = new Swiper('.ab-options-slider-swiper', {
			slidesPerView: 2,
			spaceBetween: 20,
			loop: false,
			nav: true,
			navigation: {
				nextEl: '.ab-options-slider-swiper .swiper-button-next',
				prevEl: '.ab-options-slider-swiper .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 12,

				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 16,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				1281: {
					slidesPerView: 2,
					spaceBetween: 20,
					freemode: false,
				}
			}
		})

		//abonement services
		var swiper_item2 = new Swiper('.iu-services-slider-swiper', {
			slidesPerView: 2,
			spaceBetween: 20,
			loop: false,
			nav: true,
			navigation: {
				nextEl: '.iu-services-slider-swiper .swiper-button-next',
				prevEl: '.iu-services-slider-swiper .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 12,

				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 16,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				1281: {
					slidesPerView: 2,
					spaceBetween: 20,
					freemode: false,
				}
			}
		});


		//index reasons
		var swiper_item2 = new Swiper('.scr3-reasons-slider-swiper', {
			slidesPerView: 2,
			spaceBetween: 20,
			loop: false,
			nav: true,
			navigation: {
				nextEl: '.scr3-reasons-slider-swiper .swiper-button-next',
				prevEl: '.scr3-reasons-slider-swiper .swiper-button-prev',
			},
			breakpoints: {
				// when window width is >= 320px
				320: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 12,

				},
				// when window width is >= 480px
				768: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 16,
				},
				// when window width is >= 640px
				1024: {
					slidesPerView: 'auto',
					freemode: true,
					spaceBetween: 20,
				},
				1281: {
					slidesPerView: 2,
					spaceBetween: 20,
					freemode: false,
				}
			}
		});

 }

 	//tariffs slider
	
	 var swiper_tariffs = new Swiper('.tariffs-list-swiper', {
		slidesPerView: 'auto',
		spaceBetween: 20,
		loop: false,
		nav: true,
		freemode: true,
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 'auto',
				freemode: true,
				spaceBetween: 12,

			},
			// when window width is >= 480px
			768: {
				slidesPerView: 'auto',
				freemode: true,
				spaceBetween: 16,
			},
			// when window width is >= 640px
			1024: {
				slidesPerView: 'auto',
				freemode: true,
				spaceBetween: 20,
			},
		}
	})



if( $(window).outerWidth() < 1024 ){
	
	var description_block_enroll = $('.enroll-howto-right');
	description_block_enroll.insertAfter($('.enroll-tab-item:eq(0)'));

	$(document).on('click', '.enroll-tab-item', function(){
		description_block_enroll.insertAfter($(this));
		$('html, body').stop().animate(
			{
				scrollTop: description_block.offset().top - 100,
			},
			200
		);

	});
	

}


//burger
$(document).on('click', '.burger', function () {

	if( !$(this).hasClass('active') && !$(this).hasClass('arrow-state') ){
		$(this).addClass('active');
		$('.header-nav').addClass('show');
		if(  $(window).outerWidth() < 768 ){
			$(this).addClass('m-state');
		}
	} else {
		if( $(this).hasClass('active') && $(this).hasClass('arrow-state') ){
			//$(this).addClass('active');
			$(this).removeClass('arrow-state');
			$('.header-nav').addClass('show');
			$('.header__additional-layer').hide(0);
			$('.submenu').removeClass('show');
			//$('.burger ').removeClass('arrow-state');
			$('.js-burger-arrow-title').removeClass('show');
	
		} else {
			if( $(this).hasClass('active') && !$(this).hasClass('arrow-state') ){
				$(this).removeClass('active');
				$(this).removeClass('m-state');
				$('.header-nav').removeClass('show');
		
			}
		}
	}




	



	
//	$('body').toggleClass('noscroll');
});


	//header line

	$('.js-hide-headerline').click(function(){
		$('.header-line').slideUp(200);
	})





$(document).mouseup(function (e) {
	var div = $('.header-nav, .burger, .js-burger-arrow-title');
	if (!div.is(e.target) && div.has(e.target).length === 0) {
		$('.burger').removeClass('active');
		$('.header-nav').removeClass('show');

		$('.header__additional-layer').hide(0);
		$('.submenu').removeClass('show');
		$('.burger ').removeClass('arrow-state');
		$('.js-burger-arrow-title').removeClass('show');


	//	$('.mob-panel').removeClass('show');
	//	$('body').removeClass('noscroll');
	}
});


//footer menu on mobile

if( $(window).outerWidth() < 768 ){
	$(document).on('click', '.footer-menu-section-title', function () {
		$(this).parent().toggleClass('active');
		$(this).parent().find('.footer-menu-section-list').slideToggle(300);
	});

}


	//Custom selects
	
$('select').each(function(){
    var $this = $(this), numberOfOptions = $(this).children('option').length;
  
    $this.addClass('select-hidden'); 
    $this.wrap('<div class="select"></div>');
    $this.after('<div class="select-styled"></div>');

    var $styledSelect = $this.next('div.select-styled');
    $styledSelect.text($this.children('option').eq(0).text());
  
    var $list = $('<ul />', {
        'class': 'select-options'
    }).insertAfter($styledSelect);

	$list.wrap('<div class="select-list-wrap"></div>');
	var $listWrapper = $this.next('div.select-list-wrap');


    for (var i = 0; i < numberOfOptions; i++) {
		
		var liHtml = $this.children('option').eq(i).text();
		
		if( $this.children('option').eq(i).attr('data-count') !=undefined &&  $this.children('option').eq(i).attr('data-icon') !=undefined){
			var liHtml = "<img src='"+$this.children('option').eq(i).attr('data-icon')+"' alt='"+$this.children('option').eq(i).text()+"'>"+$this.children('option').eq(i).text()+"<span class='option-counter'>"+$this.children('option').eq(i).attr('data-count')+"</span>";
		}
		
		if( $this.children('option').eq(i).attr('data-count') !=undefined && $this.children('option').eq(i).attr('data-icon') ==undefined){
			var liHtml = $this.children('option').eq(i).text()+"<span class='option-counter'>"+$this.children('option').eq(i).attr('data-count')+"</span>";
		}
		
		
        $('<li />', {
            html: liHtml,
            rel: $this.children('option').eq(i).val(),
        }).attr('data-title', $this.children('option').eq(i).text()).appendTo($list);
        //if ($this.children('option').eq(i).is(':selected')){
        //  $('li[rel="' + $this.children('option').eq(i).val() + '"]').addClass('is-selected')
        //}
    }
  
    var $listItems = $list.children('li');
  
    $styledSelect.click(function(e) {
        e.stopPropagation();
        $('div.select-styled.active').not(this).each(function(){
            $(this).removeClass('active').parent().find('ul.select-options').hide();
			$(this).parents('.custom-select').find('.select-list-wrap').hide();
        });
        $(this).toggleClass('active').parent().find('ul.select-options').toggle();
		$(this).parents('.custom-select').find('.select-list-wrap').toggle();
    });
  
    $listItems.click(function(e) {
       // e.stopPropagation();
        $styledSelect.text($(this).attr('data-title')).removeClass('active');
        $this.val($(this).attr('rel'));
        $list.hide();
		$listWrapper.hide();
		$(this).parents('.custom-select').find('.select-list-wrap').hide();
    });
  
    $(document).click(function() {
        $styledSelect.removeClass('active');
        $list.hide();
		$('.select-list-wrap').hide();
    });

});
	  


//prefooter form

$('.js-form-nextstep').click(function(){
	var next_step = $(this).attr('data-next');
	if( next_step !='final' ){
		$('.prefooter-form-step').removeClass('prefooter-form-step_active')
		$('.prefooter-form-step[data-step="'+next_step+'"]').addClass('prefooter-form-step_active')
		if( typeof grecaptcha != 'undefined'){
			grecaptcha.reset();
		}
        
	}
})
$('.form-steps-back').click(function(){
	var next_step = $(this).attr('data-step');
	if( next_step !='final' ){
		$('.prefooter-form-step').removeClass('prefooter-form-step_active')
		$('.prefooter-form-step[data-step="'+next_step+'"]').addClass('prefooter-form-step_active')
		if( typeof grecaptcha != 'undefined'){
			grecaptcha.reset();
		}
        
	}
})

	//utils
	var pp_to_open = getParameterByName('pp');
	var reg_pp_redirect = getParameterByName('redirect_url');
	var reg_pp_source = getParameterByName('source');

    if (pp_to_open && pp_to_open != '') {
        $('.pp').removeClass('show');
        $('.pp[data-pp="' + pp_to_open + '"]').addClass('show');
        
        if( pp_to_open == 'registration' || pp_to_open == 'auth' ){
            if( reg_pp_redirect && reg_pp_redirect != '' ){
                $('.pp[data-pp="registration"]').attr('data-redirect',reg_pp_redirect);
            }
            if( reg_pp_source && reg_pp_source != '' ){
                $('.pp[data-pp="registration"]').attr('data-source',reg_pp_source);
            }
        }
        
        
    }
	
	var target = window.location.hash,
		target = target.replace('#', '');

	// delete hash so the page won't scroll to it
	window.location.hash = "";

	// now whenever you are ready do whatever you want
	// (in this case I use jQuery to scroll to the tag after the page has loaded)
	$(window).on('load', function() {
		if (target) {
			$('html, body').animate({
				scrollTop: $("#" + target).offset().top - 100
			}, 700, 'swing', function () {});
		}
	});
	
	


	$(document).on('click','.input-class-list-item', function(){
		let thValue = $(this).attr('data-value');
		
		$('.input-class-list-item').removeClass('active');
		$(this).addClass('active');
		$(this).parents('.f-item').find('.js-userclass-input').val(thValue);
		
		setTimeout(function(){
			$('.input-class-listbox').removeClass('show');
			$('.txt-i_class-caret').removeClass('open');
			$('.txt-i_class-caret img').attr('src','static/img/select-input-caret.svg');
		},300) 
		
	});
	
	$(document).on('focus','.js-userclass-input', function(){
		$(this).parents('.f-item').find('.input-class-listbox').addClass('show');
		$(this).parents('.f-item').find('.txt-i_class-caret').addClass('open');
		$(this).parents('.f-item').find('.txt-i_class-caret img').attr('src','static/img/select-input-caret_open.svg');
	})
	$(document).on('blur','.js-userclass-input', function(){
		setTimeout(function(){
			$('.input-class-listbox').removeClass('show');
			$('.txt-i_class-caret').removeClass('open');
			$('.txt-i_class-caret img').attr('src','static/img/select-input-caret.svg');
		},300) 
	});


	//Landings
	//3 items slider
	var swiper_3items = new Swiper('.slider-3-items-swiper', {
		slidesPerView: 'auto',
		spaceBetween: 20,
		loop: false,
		nav: true,
		freemode: true,
		navigation: {
			nextEl: '.slider-3-items-swiper .swiper-button-next',
			prevEl: '.slider-3-items-swiper .swiper-button-prev',
		},
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 'auto',
				freemode: true,
				spaceBetween: 12,

			},
			// when window width is >= 480px
			768: {
				slidesPerView: 'auto',
				freemode: true,
				spaceBetween: 16,
			},
			// when window width is >= 640px
			1024: {
				slidesPerView: 'auto',
				freemode: true,
				spaceBetween: 20,
			},
		}
	})
	
	
		
	
	
	$( ".js-subscribe-bigbox-form-serial" ).submit(function( e ) {
	  e.preventDefault();
	  if( $(this).valid() ){
		   unisender_subs($('.js-subsribe-bigbox-serial'), $(this).find('input[name="email"]').val(), 'noname', $(this).find('input[name="listid"]').val())
	  }
	 
	});
	
	$( ".js-subscribe-bigbox-form-psychology" ).submit(function( e ) {
	  e.preventDefault();
	  if( $(this).valid() ){
		   unisender_subs($('.js-subsribe-bigbox-psychology'), $(this).find('input[name="email"]').val(), 'noname', $(this).find('input[name="listid"]').val())
	  }
	 
	});
	

	
	
	function unisender_subs(parentBox, user_email, user_name, listid){

		var th_parentbox = parentBox;
		
		var data = {};
		data['email'] = user_email;
		data['name'] = user_name;
		data['listid'] = listid;
		data['action'] = 'iu-subscribe-email';
			
		
		$.ajax({
			url: [
				location.protocol,
				'//', 
				location.host,
				location.pathname
			].join(''),
			data: data,
			type: 'post',
			dataType: 'json',
			beforeSend: function(){
				th_parentbox.addClass('loading');
			},
			success: function (response) {
				if (response.success) {
						
						if( th_parentbox.hasClass('js-subsribe-bigbox-serial') ){
							th_parentbox.find('.subsribe-bigbox-title').text('Спасибо! Форма успешно отправлена!');
							if(typeof gtag != 'undefined'){
                    			gtag('event', 'SERIAL', {
                    				'event_category': 'Reg',
                    				'event_label': 'trial',
                    				'value': 1
                    			});
                    		}
                    		if(typeof ym != 'undefined'){
                        		ym(39474735, 'reachGoal', 'SERIAL');
                        	}
						}
						
						if( th_parentbox.hasClass('js-subsribe-bigbox-psychology') ){
							th_parentbox.find('.subsribe-bigbox-title').text('Спасибо! Форма успешно отправлена!');
							if(typeof gtag != 'undefined'){
                    			gtag('event', 'PSY', {
                    				'event_category': 'Reg',
                    				'event_label': 'trial',
                    				'value': 1
                    			});
                    		}
                    		if(typeof ym != 'undefined'){
                        		ym(39474735, 'reachGoal', 'PSY');
                        	}
						
						
						}
						
						//th_parentbox.find('.subsribe-bigbox-title').text('Спасибо! Форма успешно отправлена!');
						th_parentbox.find('.subsribe-bigbox-form').hide();
					
		
				} else {
					$.jGrowl('К сожалению, произошла ошибка при загрузке данных =( Пожалуйста, обратитесь к администрации сайта', {theme: 'af-message-error', sticky: false});
				}
			},
			error: function () {
				$.jGrowl('К сожалению, произошла ошибка при загрузке данных =( Пожалуйста, обратитесь к администрации сайта', {theme: 'af-message-error', sticky: false});
			},
			complete: function(){
				th_parentbox.removeClass('loading');
				
			}
		});

	}
	
	


	//Landings end
	
	//tables

	function cssWrapTabes(){
		if($(window).outerWidth() < 1024){
			$('.article-body table').each(function(){
				if(!$(this).parent().hasClass('css-content-tablewrapper')){
					$('.article-body table').wrap("<div class='css-content-tablewrapper'/>");
				}
			})
		}
	}

	$(window).resize(function() {
		cssWrapTabes();
	});
	cssWrapTabes();
	
	//send target
	$(document).on('click', '.btn', function(){
	    if( !$(this).hasClass('pp_') && $(this).attr('data-yatarget1') && $(this).attr('data-yatarget1') != ''){
	       let target = $(this).attr('data-yatarget1');
	       triggerGA(target, "3");
		   triggerYM(target);
		   if( typeof VK != 'undefined' ){
			   VK.Retargeting.Event(target);
		   }
	    }
	})
	
	
	
	//TOASTY
	let allowEgg = true;
	let eggTimeout = 5000;
	$(".css-content").click(function(e){
        let selected = window.getSelection();
		if( selected && selected.anchorNode.data ){
			let selectedText = selected.anchorNode.data;
			let selectedOffsetStart = selected.anchorOffset;
			let selectedOffsetEnd = selected.focusOffset;

			selectedText = selectedText.slice(selectedOffsetStart);
			selectedText = selectedText.slice(0, 12);

			if( selectedText.toLowerCase() == "интернетурок" && allowEgg){
				allowEgg = false;
				$('.toasty-box').addClass('toasty-anim-in');
				setTimeout(function(){
					$('.toasty-box').removeClass('toasty-anim-in');
				},3000);
				setTimeout(function(){
					allowEgg = true
				},eggTimeout)
			}
		}

       });

})
