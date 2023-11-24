$(document).ready(function () {
	
	
	// Utils

	let alreadySend = false;
	$('input.js-smscode-input').on('keyup', function(e) {
		$(this).val($(this).val().replace(/\D/g, ''))
		if ((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode == 8 || e.keyCode == 46) { 
			let thLength = $(this).val().length;
			let counter = 0;
			$('.symbol-block-char').each(function(){
				if( $('input.js-smscode-input').val()[counter] ){
					$('.symbol-block-char:eq('+counter+')').text($('input.js-smscode-input').val()[counter])
				} else {
					$('.symbol-block-char:eq('+counter+')').text(' - ');
				}
				counter++;
			})
			
			if( thLength == 4 ){
				if( alreadySend == false ){
					//setTimeout(function(){checkCode();},500)
					checkCode();
					alreadySend = true;
					$('.js-smscode-input').prop('disabled', true);
				}
			}
		} else {
			return false;
		}
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
	
	
	
	//PHONE INPUTS
	var phoneinput_ = document.querySelector("#phone");
	errorMsg = document.querySelector("#phone-error-iti");


	if( phoneinput_ ){
		var iti = window.intlTelInput(phoneinput_, {
			preferredCountries: ["ru", "kz", "tr"],
			separateDialCode: true,		
			initialCountry: "ru"
		});
	
		// here, the index maps to the error code returned from getValidationError - see readme
		var phone_errorMap = ["Неправильный номер", "Неправильный код страны", "Слишком короткий номер", "Слишком длинный номер", "Неправильный номер","Неправильный номер"];
	
	
		var phone_reset = function() {
		phoneinput_.classList.remove("error");
		errorMsg.innerHTML = "";
		errorMsg.classList.add("hide");
		errorMsg.setAttribute("style","display:none;");
		
		};
	
		// on blur: validate
		phoneinput_.addEventListener('blur', function() {
		phone_reset();
		if (phoneinput_.value.trim()) {
			if (iti.isValidNumber()) {
	
			} else {
			phoneinput_.classList.add("error");
			var errorCode = iti.getValidationError();
			errorMsg.innerHTML = phone_errorMap[errorCode];
			errorMsg.classList.remove("hide");
			errorMsg.setAttribute("style","");
			}
		}
		});
	
		// on keyup / change flag: reset
		phoneinput_.addEventListener('change', phone_reset);
		phoneinput_.addEventListener('keyup', phone_reset);
		
	}
	
	
	var phoneinputReg = document.querySelector("#reg-phone");
	errorMsgReg = document.querySelector("#reg-phone-error-iti");


	if( phoneinputReg ){
		// коды телефонов
		// var itiReg = window.intlTelInput(phoneinputReg, {
		// 	preferredCountries: ["ru", "kz", "tr"],
		// 	separateDialCode: true,
		// 	initialCountry: "ru"
		// });
	
		// here, the index maps to the error code returned from getValidationError - see readme
		var phone_errorMap = ["Неправильный номер", "Неправильный код страны", "Слишком короткий номер", "Слишком длинный номер", "Неправильный номер","Неправильный номер"];
	
	
		var phone_reset = function() {
		phoneinputReg.classList.remove("error");
		errorMsgReg.innerHTML = "";
		errorMsgReg.classList.add("hide");
		errorMsgReg.setAttribute("style","display:none;");
		
		};
	
		// on blur: validate
		phoneinputReg.addEventListener('blur', function() {
		phone_reset();
		if (phoneinputReg.value.trim()) {
			if (itiReg.isValidNumber()) {
	
			} else {
			phoneinputReg.classList.add("error");
			var errorCode = itiReg.getValidationError();
			if( errorCode >= 0 ){
			    errorMsgReg.innerHTML = phone_errorMap[errorCode];
			} else {
			    errorMsgReg.innerHTML = phone_errorMap[0];
			}
			
			errorMsgReg.classList.remove("hide");
			errorMsgReg.setAttribute("style","");
			console.log("errorCode: "+errorCode);
			}
		}
		});
	
		// on keyup / change flag: reset
		phoneinputReg.addEventListener('change', phone_reset);
		phoneinputReg.addEventListener('keyup', phone_reset);
		
	}
	
	
	jQuery.validator.addMethod("itiPhoneValidationRegPP", function (phone_number, element) {
        return itiReg.isValidNumber();
    });
	
	jQuery.validator.addMethod("itiPhoneValidationRegPrefooter", function (phone_number, element) {
        return iti.isValidNumber();
    });
	
	
	
	function phoneNumberReg() {
        return itiReg.getNumber();
    }
	
	function phoneNumberPrefooter() {
        return iti.getNumber();
    }
	
	let prefooterPaddingLeft = $('.complex-phone_prefooter .iti__flag-container').outerWidth() + 6 + 'px';
	$('.complex-phone_prefooter input[name="user[phone]"]').css('padding-left', prefooterPaddingLeft);
	
	
	//PHONE INPUTS END
	
	$(document).on('click', '.pp-sms-phone-linkchange', function(){
		if(registrationContext && registrationContext == 'prefooter'){
			$('.pp').removeClass('show');
		}
	})


	//COOKIE RULES
	function getCookie(name) {
		var matches = document.cookie.match(new RegExp(
			"(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
		));
		return matches ? decodeURIComponent(matches[1]) : undefined;
	}

	function setCookie(name, value, options) {
		options = options || {};
		var expires = options.expires;
		if (typeof expires == "number" && expires) {
			var d = new Date();
			d.setTime(d.getTime() + expires * 1000);
			expires = options.expires = d;
		}
		if (expires && expires.toUTCString) {
			options.expires = expires.toUTCString();
		}
		value = encodeURIComponent(value);
		var updatedCookie = name + "=" + value;
		for (var propName in options) {
			updatedCookie += "; " + propName;
			var propValue = options[propName];
			if (propValue !== true) {
				updatedCookie += "=" + propValue;
			}
		}
		document.cookie = updatedCookie;
	}

	function deleteCookie(name) {
		
		let authCookieDomain = '.interneturok.ru';
		if( window.location.hostname == 'iu.f12dev.ru' ){ //for dev
			authCookieDomain = "." + window.location.hostname;
		}

		setCookie(name, "", {
			expires: -1,
			path : '/',
			domain: authCookieDomain
		})
		
	}
	
	//COOKIE RULES END
	
	
	function clearErrorBox(pp) {
        pp.find('.form-error-box').slideUp(300);
    }
	function disableFormSubmitButton(pp){
		if( pp.hasClass('js-prefooter-registration') ){
			pp.find('.js-form-prefooter-submit').addClass('btn-loading disabled');
			pp.find('.js-form-prefooter-submit img').hide();
		} else {
			pp.find('[type="submit"]').prop('disabled', true).addClass('btn-loading');
		}
		
		pp.find('button[type="submit"] img').hide();
		
	}
	
	function enableFormSubmitButton(pp){
		if( pp.hasClass('js-prefooter-registration') ){
			pp.find('.js-form-prefooter-submit').removeClass('btn-loading disabled');
			pp.find('.js-form-prefooter-submit img').show();
		} else {
			pp.find('[type="submit"]').prop('disabled', false).removeClass('btn-loading');
		}
		
		pp.find('button[type="submit"] img').show();
		
	}
	
	$(document).on('click', '.pp[data-pp="phone-sms"] .pp_[data-pp=registration]', function () {
		triggerYM("smsback");
    });
	
	
	//Global

	let passportResetPP = $('.pp[data-pp="password-restore"]');
	let passportResetTnxPP = $('.pp[data-pp="password-restore-thanks"]');
	let passportResetForm = $('.pp[data-pp="password-restore"] form');
	
	let passportAuthPP = $('.pp[data-pp="auth"]');
	let passportAuthForm = $('.pp[data-pp="auth"] form');
	
	let passportRegPP = $('.pp[data-pp="registration"]');
	let passportRegFormBase = $('.pp[data-pp="registration"] form');
	let passportRegForm = $('.pp[data-pp="registration"] form');
	let passportPrefooterRegForm = $('.js-prefooter-registration');
	
	let passportSmsCodePP = $('.pp[data-pp="phone-sms"]');
	let passportSmsCodeForm = $('.pp[data-pp="phone-sms"] form');
	let passportSmsCodeTnxPP = $('.pp[data-pp="phone-sms-thanks"]');
	
	let registrationContext = '';
	
	let authNextRequestCaptcha = false;
	
	let authCaptchaCookieName = 'captchaiu';
	let authCaptchaCookieDomain = '.interneturok.ru';
	let authCookieExpMinutes = 10;
	
	let secondsToShowSmsNotify = 10;
	let smsNotifyIsShow = false;
	
	let userId = 0;
	let userToken = '';
	let userRegEmail = '';
	let userRegPhone = '';
	
	let timerMinutes = 1;
    let timerSeconds = 59;
	let timerInterval = null;
	
	let _timerMinutes = timerMinutes;
    let _timerSeconds = timerSeconds;
    
    
    //set show capcha if there is a cross-domain cookie
    if( getCookie(authCaptchaCookieName) && getCookie(authCaptchaCookieName) == '1' ){
        authNextRequestCaptcha = true;
    }

	
	//HIDE-SHOW PROFILE BUTTON IN HEADER
	
	function showProfileButton(){
		if( getCookie(authCookieName)){
			checkCurrentToken();			
		} else {
			hideProfileButton();
			
		}
		$('.header-userbox').addClass('show');

	}
	
	function hideProfileButton(){
		$('.btn-header-auth').show();
		$('.header-profile').hide();
		userIsAuth = false;
		$('.section.section-pre-footer').show();
		setupCartAnonUser();
	}

	showProfileButton();
	//HIDE-SHOW PROFILE BUTTON IN HEADER END
	
	
	
	//CART
	function setupCartAuthUser(){
		if( userIsAuth ){
			$('.js-header-cart').attr('href',authCartLink);
			setupCartCounter();
		}
	}
	
	function setupCartAnonUser(){
		$('.js-header-cart').attr('href',cartLink);
		$('.js-header-cart-count').text('0');
		$('.js-header-cart-count').hide();
	}
	
	function setupCartCounter(){
		if( userIsAuth ){
			if( !userToken || userToken== '' ){
				let authCookieDecode = JSON.parse(decodeURIComponent(getCookie(authCookieName)));
				userToken = authCookieDecode.access_token;
			}
			let th_data = {};
			th_data['token'] = userToken;
			let auth_string = 'Bearer ' + userToken;
			let url = gatewayAPI + '/api/v2/market/cart/count';
			$.ajax({
				method: 'GET',
				url: url,
				data: th_data,
				beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', auth_string);
                },
				error: function (jqXHR, exception) {
					$('.js-header-cart-count').text('0');
                    $('.js-header-cart-count').hide();
				},
				success: function (parsedData, textStatus, xhr) {
					if( parsedData.status == '200_OK' ){
					    if( parsedData.data.market.code == 200 ){
					        let cartItemsCount = parsedData.data.market.response.data.count;
					        
					        if( cartItemsCount > 0 ){
					            $('.js-header-cart').attr('href',authCartLink);
					            $('.js-header-cart-count').text(cartItemsCount);
                    		    $('.js-header-cart-count').show(); 
					        } else {
					            $('.js-header-cart').attr('href',authCartLinkEmpty);
					            $('.js-header-cart-count').text('0');
                    		   // $('.js-header-cart-count').hide();
					        }
					        
					    } else {
					        $('.js-header-cart').attr('href',authCartLinkEmpty);
					        $('.js-header-cart-count').text('0');
                    		//$('.js-header-cart-count').hide();
					    }
					    $('.js-header-cart-count').show(); 
					}
				}
			});
			
			
		} else {
			setupCartAnonUser();
		}
	}
	//CART END
	
	
	//LOGOUT
	$(document).on('click', '.js-logout', function(){
		deleteCookie(authCookieName);
		showProfileButton();
		$('.header-profile-menu').removeClass('show');
	})
	
	//LOGOUT END
	
	
	//profile data
	
	function getAndShowProfileData(){
		if( !userToken || userToken== '' ){
			let authCookieDecode = JSON.parse(decodeURIComponent(getCookie(authCookieName)));
			userToken = authCookieDecode.access_token;
		}
		let th_data = {};
		th_data['token'] = userToken;
		
        let url = gatewayAPI + '/api/v2/psp/users/current';

        $.ajax({
            method: 'GET',
            url: url,
            data: th_data,
            error: function (jqXHR, exception) {
				$('.js-userprofile-info').hide();
            },
            success: function (parsedData, textStatus, xhr) {
				if( parsedData.status == '200_OK' ){
					let userName = '';
					let userAvatar = '';
					let userEmail = parsedData.data.psp.response.data.email;
					
					if( parsedData.data.psp.response.data.user_data ){
						$.each(parsedData.data.psp.response.data.user_data,function(index, value){
							$.each(value, function(index_i, value_i){
								if( index_i == 'user_data_field_slug' && value_i == 'first_name' ){
									if( parsedData.data.psp.response.data.user_data[index].value ){
										userName = parsedData.data.psp.response.data.user_data[index].value
									}
								}
								if( index_i == 'user_data_field_slug' && value_i == 'last_name' ){
									if( parsedData.data.psp.response.data.user_data[index].value ){
										userName = userName + ' ' + parsedData.data.psp.response.data.user_data[index].value
									}
								}
								
								if( index_i == 'user_data_field_slug' && value_i == 'picture' ){
									if( parsedData.data.psp.response.data.user_data[index].file.resizes.medium ){
										userAvatar = parsedData.data.psp.response.data.user_data[index].file.resizes.medium
									}
								}
							})
						})
					}
					
					
					$('.js-userprofile-avatar img').attr('src', userAvatar);
					$('.js-userprofile-name').text(userName);
					$('.js-userprofile-email').text(userEmail);
					
					$('.js-userprofile-info').show();
					$('.header-profile').show();
					$('.btn-header-auth').hide();
					userIsAuth = true;
					$('.section.section-pre-footer').hide();
					setupCartAuthUser();
					$('body').append('<div class="i-flocktory" data-fl-user-name="'+userName+'" data-fl-user-email="'+userEmail+'"></div>');
				} else {
					$('.js-userprofile-info').hide();
					setupCartAnonUser();
				}
				
				
            }

        });
        return false;
		
		
	}
	
	
	//RESTORE PASSPORT
	passportResetForm.on('submit', function(e){
		e.preventDefault();
		if ($(this).valid()) {
			resetPassword();
		}
	})
		
    function resetPassword() {
		let th_data = {};
		th_data['email'] = passportResetForm.find('input[name="email"]').val();
        let url = gatewayAPI + '/api/v2/psp/users/password-reset-mails';

        $.ajax({
            method: 'POST',
            url: url,
            data: th_data,
            beforeSend: function () {
                clearErrorBox(passportResetPP);
				disableFormSubmitButton(passportResetForm);
            },
            error: function (jqXHR, exception) {
				handlePassportErrors(passportResetPP, jqXHR, jqXHR.responseJSON.data['status']);
            },
            success: function (parsedData, textStatus, xhr) {

				passportResetPP.removeClass('show');
				passportResetTnxPP.addClass('show');
				
            },
			complete: function(){
				enableFormSubmitButton(passportResetPP);
			}

        });
        return false;
    }
	
	//RESTORE PASSPORT END
	
	
	
	//AUTH
	passportAuthForm.on('submit', function(e){
		e.preventDefault();
		if ($(this).valid()) {
		    if( authNextRequestCaptcha ){
		        if( window.smartCaptcha ){
    				window.smartCaptcha.execute(widgetRecapchaAuth);
    			}
		    } else {
		        passportAuth();
		    }
			
		}
	})
	
	
	function passportAuth(userLogin, userPassword, isRegDialog = false) {
		let th_data = {};
		
		if (!userLogin){
			th_data['login'] = passportAuthForm.find('input[name="user[email]"]').val();
		} else {
			th_data['login'] = userLogin;
		}
		
		if (!userPassword){
			th_data['password'] = passportAuthForm.find('input[name="user[password]"]').val();
		} else {
			th_data['password'] = userPassword;
		}
		
		if( authNextRequestCaptcha ){
		    th_data['smart-token'] = passportAuthForm.find('input[name="gtoken"]').val();
		}
		
				
        let url = gatewayAPI + '/api/v2/psp/tokens';

        $.ajax({
            method: 'POST',
            url: url,
            data: th_data,
            beforeSend: function () {
                clearErrorBox(passportAuthForm);
				disableFormSubmitButton(passportAuthForm);
            },
            error: function (jqXHR, exception) {
                let errorMassage = '';
                if( jqXHR.responseJSON ){
                    if( jqXHR.responseJSON.data.status == 'UNSUCCESSFUL_AUTH_THROTTLE' ){
                        errorMassage = "Вы превысили допустимое количество попыток ввода пароля. Пожалуйста, попробуйте через 10 мин. или воспользуйтесь функцией <a class='pp_' data-pp='password-restore'>восстановления пароля</a>.";
                        passportAuthForm.find('.form-error-box').slideDown(300);
		                passportAuthForm.find('.form-error-box .form-error-box-text').html(errorMassage);
                    } else {
                        handlePassportErrors(passportAuthForm, jqXHR, jqXHR.responseJSON.data['status']);
                    }
                    
                } 
                else {
                    if (jqXHR.status === 429) {
                        errorMassage = "Вы превысили допустимое количество попыток ввода пароля. Пожалуйста, попробуйте через 10 мин. или воспользуйтесь функцией <a class='pp_' data-pp='password-restore'>восстановления пароля</a>.";
                    }
                    passportAuthForm.find('.form-error-box').slideDown(300);
		            passportAuthForm.find('.form-error-box .form-error-box-text').html(errorMassage);
                }
				
            },
            success: function (parsedData, textStatus, xhr) {
				passportAuthForm.removeClass('show');
				userToken = parsedData.data.psp.response.data.access_token;
				if( !isRegDialog ){
				    
					authUserOnSite(userToken)
				} else {
				    passportRegForm.removeClass('show');
				    
				    sendCodeToUser(userId,userToken, false, true);
				    
				    if( registrationSkipSms == true ){
    					if( !registrationSkipDelay ){
    						registrationSkipDelay = 2000;
    					}
    					
    					$('.js-regform-button-text').text('Перенаправляем...');
    					passportRegForm.find('button[type="submit"] img').hide();
    					clearErrorBox(passportRegForm);
    					disableFormSubmitButton(passportRegForm);
    				
    					setTimeout(function(){
    						authUserOnSite(userToken);
    						$('.pp').removeClass('show');
    						
    					},registrationSkipDelay)
    					
    										
    					triggerGA('REGISTER', '5');
    					triggerYM('REGISTER');
    					if( typeof VK  != 'undefined' ){
    						//VK.Retargeting.Event('REGISTER');
    					}
    					
    				} else {
    					
    					$('.pp').removeClass('show');
    					passportSmsCodePP.find('.js-userphone-value').text(userRegPhone);
    					passportSmsCodePP.find('.js-useremail-value').text(userRegEmail);
    					passportSmsCodePP.addClass('show');
    					passportSmsCodeForm.find('.js-smscode-input').focus();
    					startTimer();
    				}
				}
				
            },
			complete: function(jqXHR){
			    if( jqXHR.getResponseHeader("Next-Request-Need-Captcha") && jqXHR.getResponseHeader("Next-Request-Need-Captcha") == "1" ){
			        authNextRequestCaptcha = true;
			    } else {
			        authNextRequestCaptcha = false;
			    }
			    
			    if( jqXHR.getResponseHeader("User-Block-Time") && jqXHR.getResponseHeader("User-Block-Time") != "" ){
			        authCookieExpMinutes = jqXHR.getResponseHeader("User-Block-Time");
			    } 

			    if( jqXHR.getResponseHeader("Next-Request-Need-Captcha") == "1" ) {
                    let authCookieDateExp = new Date();
    			    authCookieDateExp.setTime(authCookieDateExp.getTime()+(authCookieExpMinutes*60*1000));
    			    authCookieDateExp = authCookieDateExp.toGMTString();
    			    
    			    let authCaptchaCookie = jqXHR.getResponseHeader("Next-Request-Need-Captcha") ? jqXHR.getResponseHeader("Next-Request-Need-Captcha") : 0;
    			    setCookie(authCaptchaCookieName, authCaptchaCookie, {
            			expires: authCookieDateExp,
            			path: "/",
            			domain: authCaptchaCookieDomain
            		});
			        
			    }
				enableFormSubmitButton(passportAuthForm);
			}

        });
        return false;
    }
	
	
	function authUserOnSite(token){

		//let targetURL = authURL + '?token=' + token + '&auth=landing';
		let targetURL = authURL;
		let possibleTargetURL = $('.pp[data-pp="registration"]').attr('data-redirect');
		let authCookie = '{"access_token":"'+token+'","access_type":"Bearer","expires":"3600"}';
		let authCookieDomain = '.interneturok.ru';

		setCookie(authCookieName, authCookie, {
			expires: new Date((new Date).getTime() + 2678e9).toUTCString(),
			path: "/",
			domain: authCookieDomain
		});
		triggerGA('AUTHGO', '5');
		triggerYM('AUTHGO');
		if( typeof VK != 'undefined' ){
			//VK.Retargeting.Event('AUTHGO');
		}
					
		
		if( stayHereAfterRegister == false ){	
		    if( possibleTargetURL && possibleTargetURL != ''){	
		        targetURL = possibleTargetURL;	
		    }	
			window.location.replace(targetURL);	
		} else {	
		    $('.pp').removeClass('show');	
		    showProfileButton();	
		}
	}
	
	
	//AUTH END
	
	
	// RECAPCHA

    var widgetRecapchaAuth;
    var widgetRecapchaPP;	
    var widgetRecapchaPrefooter;
    
	if (window.smartCaptcha) {
	    
	    if( yaRecapchaSiteKeyAuth == '' ){
	        yaRecapchaSiteKeyAuth = yaRecapchaSiteKey;
	    }
	    
        widgetRecapchaAuth = window.smartCaptcha.render('recapcha-pp-auth', {
          sitekey: yaRecapchaSiteKeyAuth,
          invisible: true,
          callback: onSubmitAuthPP,
          hideShield: true
        });
        
        widgetRecapchaPP = window.smartCaptcha.render('recapcha-pp-reg', {
          sitekey: yaRecapchaSiteKey,
          invisible: true,
          callback: onSubmitRegPP,
          hideShield: true
        });
        
        if( $("#recapcha-prefooter-reg").length ){
            widgetRecapchaPrefooter = window.smartCaptcha.render('recapcha-prefooter-reg', {
              sitekey: yaRecapchaSiteKey,
              invisible: true,
              callback: onSubmitRegPrefooter,
              hideShield: true
            });
        }
        
    }
	

	function onSubmitAuthPP(response) {
	    $('.pp-auth input[name="gtoken"').val(response);
	    passportAuth();
	    if (window.smartCaptcha) {
		    window.smartCaptcha.reset(widgetRecapchaAuth);
		}
	}
	
	
	function onSubmitRegPP(response) {
		$('.pp-registration input[name="gtoken"').val(response);
		registrationContext = 'popup';
		
		let currentUserEmail = passportRegForm.find('input[name="user[email]"]').val().toLowerCase();
		let currentUserPhone = itiReg.getNumber();
		
		if(currentUserEmail != userRegEmail){ //если изменился email или был пустой - регистрируем заново
			passportRegistration(registrationContext);
		} else if( userRegPhone != '' && ( userRegPhone != currentUserPhone)) { // если email не менялся, но поменялся телефон - обновляем телефон
			patchUserData(userId, 1, currentUserPhone, userToken);
		} else if( currentUserEmail == userRegEmail &&  currentUserPhone == userRegPhone){ // если ничего не поменялось
			passportRegPP.removeClass('show');
			passportSmsCodePP.addClass('show');
			
		}
		if(window.smartCaptcha){
			 window.smartCaptcha.reset(widgetRecapchaPP);
		}
    };
	
	function onSubmitRegPrefooter(response) {
		
		$('.js-prefooter-registration input[name="gtoken"').val(response);
		registrationContext = 'prefooter';
			
		let currentUserEmail = passportPrefooterRegForm.find('input[name="user[email]"]').val().toLowerCase();
		let currentUserPhone = iti.getNumber();
		
		if(currentUserEmail != userRegEmail){ //если изменился email или был пустой - регистрируем заново
			passportRegistration(registrationContext);
		} else if( userRegPhone != '' && ( userRegPhone != currentUserPhone)) { // если email не менялся, но поменялся телефон - обновляем телефон
			patchUserData(userId, 1, currentUserPhone, userToken);
		} else if( currentUserEmail == userRegEmail &&  currentUserPhone == userRegPhone){ // если ничего не поменялось
			//passportRegPP.removeClass('show');
			passportSmsCodePP.addClass('show');
		}
		if(window.smartCaptcha){
			window.smartCaptcha.reset(widgetRecapchaPrefooter);
		}
	}
	

		
	
	//REGISTRATION PP
	passportRegForm.on('submit', function(e){
		e.preventDefault();
		if ($(this).valid()) {
			if(window.smartCaptcha){
				$('.js-regform-button-text').text('Проверяем что вы не робот...');
				window.smartCaptcha.execute(widgetRecapchaPP);
			}
			
		}
	});
	
	//REGISTRATION PP END
	
	//REGISTRATION PREFOOTER
	$(document).on('click', '.js-form-prefooter-submit', function(){
		passportPrefooterRegForm.trigger('submit');
	});
	
	passportPrefooterRegForm.on('submit', function(e){
		e.preventDefault();
		if ($(this).valid()) {
			if(window.smartCaptcha){
				//disableFormSubmitButton(passportPrefooterRegForm);
				$('.js-regform-button-text').text('Проверяем...');
				window.smartCaptcha.execute(widgetRecapchaPrefooter);
			}
			
		}
	});

	//REGISTRATION PREFOOTER END

	
	
	function passportRegistration(context){
		let th_data = {};
		
		if( context == 'prefooter' ){
			passportRegForm = passportPrefooterRegForm;
			userRegPhone = iti.getNumber();
		} else {
		    passportRegForm = passportRegFormBase;
		    userRegPhone = itiReg.getNumber();
		}
		
		let th_data_source = 1;
		let th_data_redirect = $('.pp[data-pp="registration"]').attr('data-redirect');
		let th_data_source_attr = $('.pp[data-pp="registration"]').attr('data-source');
		
		if( th_data_source_attr && th_data_source_attr != ''){
		    th_data_source = $('.pp[data-pp="registration"]').attr('data-source');
		}
		if( th_data_redirect && th_data_redirect != ''){
		    if( !th_data_source_attr || th_data_source_attr == '' ){
		        th_data_source = null;
		    }
		}

		
		
		
		th_data['email'] = passportRegForm.find('input[name="user[email]"]').val().toLowerCase();
		th_data['password'] = passportRegForm.find('input[name="user[password]"]').val();
		th_data['phone'] = userRegPhone;
		th_data['from_request'] = th_data_source;
		th_data['smart-token'] = passportRegForm.find('input[name="gtoken"]').val();
						
        let url = gatewayAPI + '/api/v2/psp/users';
		
		
        $.ajax({
            method: 'POST',
            url: url,
            data: th_data,
            beforeSend: function () {
				
				$('.js-regform-button-text').text('Регистрируем...');
				passportRegForm.find('button[type="submit"] img').hide();
				
                clearErrorBox(passportRegForm);
				disableFormSubmitButton(passportRegForm);
            },
            error: function (jqXHR, exception) {
				handlePassportErrors(passportRegForm, jqXHR, jqXHR.responseJSON.data['status']);
				
				$('.js-regform-button-text').text('Продолжить');
				passportRegForm.find('button[type="submit"] img').show();
				enableFormSubmitButton(passportRegForm);
				
            },
            success: function (parsedData, textStatus, xhr) {
				passportRegForm.removeClass('show');
				
				userId = parseInt(parsedData.data.psp.response.data.id);
				userRegEmail = th_data['email'];
				if( context == 'prefooter' ){
					userRegPhone = iti.getNumber();
				}else{
					userRegPhone = itiReg.getNumber();
				}
				
				
				passportAuth(th_data['email'], th_data['password'], true);
				
				
            }
        });
        return false;
	}
	
	
	//REGISTRATION END
	
	


	//UPDATE-PATCH USER DATA(PHONE)
	
	function updateUserData(userId, fieldId, fieldValue, userToken){
		let th_data = {};
		th_data['user_id'] = userId;
		th_data['field_id'] = fieldId;
		th_data['value'] = fieldValue;
		th_data['token'] = userToken;
		
						
        let url = gatewayAPI + '/api/v2/psp/users/'+userId+'/user_data';

        $.ajax({
            method: 'POST',
            url: url,
            data: th_data,
            beforeSend: function () {
                clearErrorBox(passportRegForm);
				disableFormSubmitButton(passportRegForm);
				
				$('.js-regform-button-text').text('Добавляем данные...');
				passportRegForm.find('button[type="submit"] img').hide();
				
				
            },
            error: function (jqXHR, exception) {
				handlePassportErrors(passportRegForm, jqXHR, jqXHR.responseJSON.data['status'], 'updatePhone');
				
				$('.js-regform-button-text').text('Продолжить');
				passportRegForm.find('button[type="submit"] img').show();
				enableFormSubmitButton(passportRegForm);
            },
            success: function (parsedData, textStatus, xhr) {
				
				if( fieldId == 1 ){ //PHONE FIELD ID
					passportRegForm.removeClass('show');
					sendCodeToUser(userId,userToken, false, false);
				}
				
				
				
				
            }

        });
        return false;
		
	}
	
	
	function patchUserData(userId, fieldId, fieldValue, userToken){
		let th_data = {};
		th_data['user_id'] = userId;
		th_data['token'] = userToken;
		
		let url = gatewayAPI + '/api/v2/psp/users/'+userId+'/user_data';
		
		//сначала получим данные(id поля телефона, потом его обновим)
		$.ajax({
            method: 'GET',
            url: url,
            data: th_data,
            beforeSend: function () {
                clearErrorBox(passportRegForm);
				disableFormSubmitButton(passportRegForm);
				
				$('.js-regform-button-text').text('Обновляем данные...');
				passportRegForm.find('button[type="submit"] img').hide();
				
				
            },
            error: function (jqXHR, exception) {
				handlePassportErrors(passportRegForm, jqXHR, jqXHR.responseJSON.data['status']);
				
				$('.js-regform-button-text').text('Продолжить');
				passportRegForm.find('button[type="submit"] img').show();
				enableFormSubmitButton(passportRegForm);
            },
            success: function (parsedData, textStatus, xhr) {
				if( parsedData.data.psp.response.data[0] ){
					let phoneFieldToUpdateId = parsedData.data.psp.response.data[0].id;
					th_data = {};
					th_data['user_id'] = userId;
					th_data['token'] = userToken;
					th_data['user_data_id'] = phoneFieldToUpdateId;
					th_data['value'] = fieldValue;
					
					let url = gatewayAPI + '/api/v2/psp/users/'+userId+'/user_data/'+phoneFieldToUpdateId;
					
					$.ajax({
						method: 'PATCH',
						url: url,
						data: th_data,
						beforeSend: function () {
							clearErrorBox(passportRegForm);
							disableFormSubmitButton(passportRegForm);
							
							$('.js-regform-button-text').text('Обновляем данные...');
							passportRegForm.find('button[type="submit"] img').hide();
							
							
						},
						error: function (jqXHR, exception) {
							handlePassportErrors(passportRegForm, jqXHR, jqXHR.responseJSON.data['status'], 'updatePhone');
							
							$('.js-regform-button-text').text('Продолжить');
							passportRegForm.find('button[type="submit"] img').show();
							enableFormSubmitButton(passportRegForm);
							
							
						},
						success: function (parsedData, textStatus, xhr) {
							
							if( fieldId == 1 ){ //PHONE FIELD ID
								passportRegForm.removeClass('show');
								userRegPhone = fieldValue;
							
								sendCodeToUser(userId,userToken, false, false);
							}

						}
					});
					
				} else {
					
					passportRegForm.find('.form-error-box .form-error-box-text').text('К сожалению не удалось получить данные пользователя чтобы обновить телефон. Попробуйте обновить страницу и зарегистрироваться заново');
					passportRegForm.find('.form-error-box').slideDown(200);
					$('.js-regform-button-text').text('Продолжить');
					passportRegForm.find('button[type="submit"] img').show();
					enableFormSubmitButton(passportRegForm);
				}

            },
			complete: function(){
				//enableFormSubmitButton(passportRegForm);
			}

        });

        return false;
		
	}
	
	
	
	//UPDATE-PATCH USER DATA(PHONE) END
	
	
	
	//SEND SMS TO USER
	
	function sendCodeToUser(userId, userToken, isSms = false, isSkipSuccessBranch = false){
		let th_data = {};
		th_data['user_id'] = userId;
		th_data['token'] = userToken;
		
		
        let url = gatewayAPI + '/api/v2/psp/users/'+userId+'/verify/phone-call/send';
		if( registrationSkipSms == true ){
			url = gatewayAPI + '/api/v2/psp/users/'+userId+'/verify/phone/send';
		}
		if( isSms ){
			url = gatewayAPI + '/api/v2/psp/users/'+userId+'/verify/phone/send';
		}
		
        $.ajax({
            method: 'POST',
            url: url,
            data: th_data,
            beforeSend: function () {
                clearErrorBox(passportRegForm);
				//disableFormSubmitButton(passportRegForm);
				
				if( registrationSkipSms != true ){
					$('.js-regform-button-text').text('Отправялем смс...');
					passportRegForm.find('button[type="submit"] img').hide();
				} else {
					$('.js-regform-button-text').text('Перенаправляем...');
					passportRegForm.find('button[type="submit"] img').hide();
				}
				
				
            },
            error: function (jqXHR, exception) {
				handlePassportErrors(passportSmsCodeForm, jqXHR, jqXHR.responseJSON.data['status']);
				triggerYM("sendSmsError");
				$('.js-regform-button-text').text('Продолжить');
				passportRegForm.find('button[type="submit"] img').show();
            },
            success: function (parsedData, textStatus, xhr) {
				if (isSkipSuccessBranch == true){
				    if( registrationSkipSms == true ){
    					if( !registrationSkipDelay ){
    						registrationSkipDelay = 2000;
    					}
    					
    					$('.js-regform-button-text').text('Перенаправляем...');
    					passportRegForm.find('button[type="submit"] img').hide();
    					clearErrorBox(passportRegForm);
    					disableFormSubmitButton(passportRegForm);
    				
    					setTimeout(function(){
    						authUserOnSite(userToken);
    						$('.pp').removeClass('show');
    						
    					},registrationSkipDelay)
    					
    										
    					triggerGA('REGISTER', '5');
    					triggerYM('REGISTER');
    					if( typeof VK  != 'undefined' ){
    						//VK.Retargeting.Event('REGISTER');
    					}
    					
    				} else {
    					
    					$('.pp').removeClass('show');
    					passportSmsCodePP.find('.js-userphone-value').text(userRegPhone);
    					passportSmsCodePP.find('.js-useremail-value').text(userRegEmail);
    					passportSmsCodePP.addClass('show');
    					passportSmsCodeForm.find('.js-smscode-input').focus();
    					startTimer();
    				}
				}

				

				
            },
			complete: function(){
				enableFormSubmitButton(passportRegForm);
				$('.js-regform-button-text').text('Продолжить');
				passportRegForm.find('button[type="submit"] img').show();
			}

        });
        return false;
		
	}
	

	//SEND SMS TO USER END
	
	
	//CHECK CODE
	function checkCode() {
        let code = passportSmsCodeForm.find('.js-smscode-input').val();

		let th_data = {};
		th_data['user_id'] = userId;
		th_data['token'] = userToken;
		th_data['code'] = code;
		
	
		let url = gatewayAPI + '/api/v2/psp/users/'+userId+'/verify/phone';
		
		
		$.ajax({
				url: url,
				type: 'post',
				data: th_data,
				dataType: 'json',
				beforeSend: function () {
					passportSmsCodePP.addClass('disable');
					
				},
				error: function (jqXHR, exception) {
					passportSmsCodeForm.find('.js-smscode-input').val('');
					passportSmsCodeForm.find('.symbol-block-char').text(' - ');
					handlePassportErrors(passportSmsCodeForm, jqXHR, jqXHR.responseJSON.data['status']);
				},
				success: function (parsedData, textStatus, xhr) {
					
					//let targetURL = authURL + '?token=' + userToken;
					let targetURL = authURL;
					authUserOnSite(userToken);
										
					$('.pp').removeClass('show');
					passportSmsCodeTnxPP.addClass('show');
					
					triggerGA('REGISTER', '5');
					triggerYM('REGISTER');
					if( typeof VK  != 'undefined' ){
						//VK.Retargeting.Event('REGISTER');
					}
					
					//window.location.replace(targetURL);
					
				},
				complete: function(){
					passportSmsCodePP.removeClass('disable');
					alreadySend = false;
					$('.js-smscode-input').prop('disabled', false);
				}
			});


        return false;
    }
	
	//CHECK CODE END
	
	
	//RESEND SMS CODE
	
	$(document).on('click', '.js-resend-sms', function(){
		startTimer();
		$(".pp-sms-timer").show();
        $(".js-resend-sms").hide();
		passportSmsCodeForm.find('.js-smscode-input').val('');
		passportSmsCodeForm.find('.symbol-block-char').text(' - ');
		$('.js-sms-notify').slideUp(200);
		
		sendCodeToUser(userId, userToken, true, false);
		
	})
	
	//$(document).on('click', '.pp-title', function(){
	//	startTimer();		
	//})
	
	
	
			
    function startTimer() {
        
		$(".pp-sms-timer").show();
        $(".js-resend-sms").hide();
		passportSmsCodeForm.find('.js-smscode-input').val('');
		passportSmsCodeForm.find('.symbol-block-char').text(' - ');
		$('.js-sms-notify').slideUp(200);
		
		
		if( timerInterval ){
			 clearInterval(timerInterval);
		}
		
		_timerMinutes = timerMinutes;
		_timerSeconds = timerSeconds;

        $(".js-smstimer-minutes").html("0" + _timerMinutes);
        $(".js-smstimer-seconds").html(_timerSeconds);

        timerInterval = setInterval(function () {
			
			if( secondsToShowSmsNotify <= 0 && !smsNotifyIsShow){
				$('.js-sms-notify').slideDown(200);
				smsNotifyIsShow = true;
			}
			
            if (_timerSeconds <= 0) {
                _timerSeconds = 59;
                _timerMinutes -= 1;
                if (_timerMinutes == 0) {
                }
            }
            else {
                _timerSeconds -= 1;
            }
            if (_timerMinutes < 10) {
                $(".js-smstimer-minutes").text("0" + _timerMinutes);
            }
            else {
                $(".js-smstimer-minutes").text(_timerMinutes);
            }
            if (_timerSeconds < 10) {
                $(".js-smstimer-seconds").text("0" + _timerSeconds);
            }
            else {
                $(".js-smstimer-seconds").text(_timerSeconds);
            }
			
			secondsToShowSmsNotify -=1;
        }, 1000);

        setTimeout(function () {
            clearInterval(timerInterval);
            $(".pp-sms-timer").hide();
            $(".js-resend-sms").show();
        }, 120000);
    }
	
	
	
	
	//RESEND SMS CODE
	
	//check token
	
	function checkCurrentToken(){
		
		let curToken = '';

		if( getCookie(authCookieName) ){
			let authJSON = JSON.parse(getCookie(authCookieName));
			curToken = authJSON.access_token;
			
			if( !curToken || curToken== '' ){
				hideProfileButton();
			} else {
				let th_data = {};
				th_data['token'] = curToken;
				
				let url = gatewayAPI + '/api/v2/psp/users/current';

				$.ajax({
					method: 'GET',
					url: url,
					data: th_data,
					error: function (jqXHR, exception) {
						refreshToken();
					},
					success: function (parsedData, textStatus, xhr) {
						if( parsedData.status == '200_OK' ){
							getAndShowProfileData();
							
						} else {
							deleteCookie(authCookieName);
							hideProfileButton();
							userIsAuth = false;
							$('.section.section-pre-footer').show();
						}
					},
				});
			}
			
		} 
	}
	
	//Refresh token
	
	function refreshToken(){
		let curToken = '';
		if( getCookie(authCookieName) ){
			let authJSON = JSON.parse(getCookie(authCookieName));
			curToken = authJSON.access_token;
		} else {
			hideProfileButton();
		}
		
		if( curToken != '' ){
			let th_data = {};
            let auth_string = 'Bearer ' + curToken;
		
			let url = gatewayAPI + '/api/v2/psp/tokens/refresh';
			$.ajax({
				url: url,
				type: 'post',
				data: th_data,
				dataType: 'json',
				beforeSend: function (xhr) {
                    xhr.setRequestHeader('Authorization', auth_string);
                },
				error: function (jqXHR, exception) {
					deleteCookie(authCookieName);
					hideProfileButton();
				},
				success: function (parsedData, textStatus, xhr) {
					deleteCookie(authCookieName);
					userToken = parsedData.data.psp.response.data.access_token;
					let authCookie = '{"access_token":"'+userToken+'","access_type":"Bearer","expires":"3600"}';
					let authCookieDomain = '.interneturok.ru';
					if( window.location.hostname == 'iu.f12dev.ru' ){ //for dev
						authCookieDomain = "." + window.location.hostname;
					}
					setCookie(authCookieName, authCookie, {
						expires: new Date((new Date).getTime() + 2678e9).toUTCString(),
						path: "/",
						domain: authCookieDomain
					});
		
				},
				complete: function(){
					showProfileButton();
				}
			});
			return false;
		}
	}
	
	
	
	
	
	
	
	function handlePassportErrors(pp, jqXHR, error_status, additionalState = null){
		var msgFirst = '';
		var msgMid = '';
		var msgLast = '';
		var msgToFront = '';
		
		var err_code = jqXHR.responseJSON.data.errors[0].code;
		var err_field = jqXHR.responseJSON.data.errors[0].data['field_name_ru'];
		var err_field_en = jqXHR.responseJSON.data.errors[0].data['field'];
		error_status = jqXHR.responseJSON.data.status;
		
		var err_message_email = "Данный адрес электронной почты уже был использован при регистрации в системе ИнтернетУрока . " +
							  "</br><a class='pp_' data-pp='auth'>Войти </a> или <a class='pp_' data-pp='password-restore'>восстановить пароль</a>?";
							  
		var err_message_phone = "Данный номер уже был использован при регистрации. Пожалуйста, укажите другой номер или войдите в зарегистрированный ранее аккаунт." +
							  "</br><a class='pp_' data-pp='auth'>Войти </a> или <a class='pp_' data-pp='password-restore'>восстановить пароль</a>?";
							  
		var err_message_captha = "Капча не прошла проверку. Если вам кажется, что это ошибка, попробуйте обновить страницу и зарегистрироваться заново.";	
		
		var err_message_password = "Пароль не соответствует требованиям безопасности. Придумайте новый.";
		
		
		if ((jqXHR.status === 422 && pp.hasClass('js-registration')) || (jqXHR.status === 422 && pp.hasClass('js-prefooter-registration'))) {
			if(  additionalState == 'updatePhone' ){
				msgToFront = err_message_phone;
				triggerYM("errEmailBusy");			  
				
			} else {
			    msgToFront = err_message_email
			    if( err_field_en && err_field_en =='phone' ){
			        msgToFront  = err_message_phone;
			    }
			}
			
			if(err_code == 'err_0107' ){
				msgToFront = err_message_captha;
				triggerYM("errRecapcha");
			}
			
			if( err_field_en == 'password' ){
			    msgToFront = err_message_password;
			}
			

		} else {
			if (jqXHR.status === 400) {
				 msgFirst = 'Запрос составлен неверно.';
			} else if (jqXHR.status == 401) {
				msgFirst = 'Авторизация не пройдена. ';
			} else if (jqXHR.status == 403) {
				msgFirst = 'Нет права доступа. ';
			} else if (jqXHR.status == 404) {
				msgFirst = 'Не найдено. ';
			} else if (jqXHR.status == 422) {
				msgFirst = 'Ошибка при отправке данных. ';
			} else if (jqXHR.status == 429) {
				msgFirst = 'Превышен лимит запросов. ';
			} else if (jqXHR.status == 500) {
				msgFirst = 'Внутренняя ошибка сервера. ';
			} else if (jqXHR.status == 502) {
				msgFirst = 'Внутренняя ошибка сервера. ';
			}
			
			if( error_status && error_status !='' ){
				if (error_status == '0010_AUTH_INVALID_CREDENTIALS') {
					msgMid = 'Неверный логин или пароль';
				} else if (error_status == '0010_VALIDATION_ERROR') {
					msgMid = 'Неверный логин или пароль';
				} else if (error_status == '0201_WRONG_OLD_PASSWORD') {
					msgMid = 'Неверный пароль. ';
				} else if (error_status == '0400_VERIFY_PHONE_CODE_INCORRECT') {
					msgMid = 'Неверный код. ';
					triggerYM("errorSms");
				} else if (error_status == '0403_EMAIL_IS_NOT_VERIFIED') {
					msgMid = 'Аккаунт требует подтверждения email, проверьте почту. ';
				} else if (error_status == '0403_FORBIDDEN') {
					msgMid = 'Доступ запрещен. ';
				} else if (error_status == '0403_LOCK_SENDING') {
					msgMid = 'Слишком много запросов, попробуйте через 2 минуты. ';
				} else if (error_status == '0403_USERS_EMAIL_ALREADY_VERIFIED') {
					msgMid = 'Данный e-mail уже подтвержден. ';
				} else if (error_status == '0404_MODEL_NOT_FOUND') {
					msgMid = 'Недействительные данные. ';
				} else if (error_status == '0400_SEND_PHONE_CODE_FAILED') {
					msgMid = 'Пожалуйста, проверьте правильность введенного номера телефона. ';
				} else if (error_status == '0400_SEND_PASSWORD_RESET_FAILED') {
					msgMid = 'Пользователь не найден при восстановлении пароля';
				} 
				
			}
			if( err_field === 'undefined' ){
				err_field = '';
			}
			
			if( err_code && err_code !='' ){
				if (err_code == 'err_0001') {
					msgLast = 'Пользователь не найден при восстановлении пароля';
				} else if (err_code == 'err_0002') {
					msgLast = 'Токен для восстановления пароля просрочен';
				} else if (err_code == 'err_0003') {
					msgLast = 'Пароль не совпадает с подтверждением пароля';
				} else if (err_code == 'err_0004') {
					msgLast = 'Слишком много отправок на восстановление пароля';
				} else if (err_code == 'err_0005') {
					msgLast = err_field +' не является уникальным';
				} else if (err_code == 'err_0006') {
					msgLast = err_field +' - поле обязательно для заполнения';
				} else if (err_code == 'err_0007') {
					msgLast = 'Пароль должен быть не менее 8 символов';
				} else if (err_code == 'err_0049') {
					msgLast = err_field +' - поле должно не превышать 2147483647';
				} else if (err_code == 'err_0093') {
					msgLast = 'Значение поля "'+ err_field +'" уже было использовано при регистрации';
				} else if (err_code == 'err_0100') {
					msgLast = 'Недействительные данные';		
				} else if (err_code == 'err_0078') {
					msgLast = 'Поля формы содержат ошибки'; 		
				} else if (err_code == 'err_0108') {
					msgLast = 'Общая ошибка на проверку строгости пароля';		
				} else if (err_code == 'err_0109') {
					msgLast = 'В пароле не указаны доп символы';		
				} else if (err_code == 'err_0110') {
					msgLast = 'В пароле должна быть хотя бы одна маленькая буква';		
				} else if (err_code == 'err_0111') {
					msgLast = 'В пароле должна быть хотя бы одна большая буква';		
				} else if (err_code == 'err_0112') {
					msgLast = 'В пароле есть последовательность цифр';		
				}  else if (err_code == 'err_0113') {
					msgLast = 'В пароле нет цифр';		
				}  
			}
			
			if( msgMid != '' ){
				msgToFront = msgMid;
			} else if( msgLast != ''){
				msgToFront = msgLast;
			} else if( msgFirst != ''){
				msgToFront = msgFirst;
			}
			
			if( msgToFront == '' ){
				msgToFront = 'Что-то пошло не так.'
			}
			
		}
		
		pp.find('.form-error-box').slideDown(300);
		pp.find('.form-error-box .form-error-box-text').html(msgToFront);
		if(typeof ym != 'undefined'){
			ym(39474735, 'reachGoal', 'pspError', 
				{
					jqXHRStatus: jqXHR.status,
					jqXHRStatus_text: msgFirst,
					error_status: error_status,
					error_status_text : msgMid,
					err_code: err_code,
					err_code_text: msgLast
				
				});
		 }	
		 
	}
	
	
	
	
	
});	