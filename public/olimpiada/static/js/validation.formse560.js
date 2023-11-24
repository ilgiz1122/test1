$(function () {

	//masked input
	//$('input[name="phone"]').intlTelInput({
	//		preferredCountries: ["ru", "by", "ua", "kz"],
	//		separateDialCode: true,		
	//		initialCountry: "ru"
	//	})
		
	$('input[name="phone"]').each(function(){
		intlTelInput($(this)[0], {
			preferredCountries: ["ru", "kz", "tr"],
			separateDialCode: true,		
			initialCountry: "ru",
			hiddenInput : "phone"
		});	
	});
	
	var phone_errorMap = ["Неправильный номер", "Неправильный код страны", "Слишком короткий номер", "Слишком длинный номер", "Неправильный номер","Неправильный номер"];
	jQuery.validator.addMethod("itiPhoneValidation", function (phone_number, element) {
		var iti = window.intlTelInputGlobals.getInstance(element);
		if (iti.isValidNumber()) {
		} else {

			var errorMsgReg = $(element).parent().find('.error');
			var errorCode = iti.getValidationError();
			errorMsgReg.text(phone_errorMap[errorCode]);
			setTimeout(function(){
				errorMsgReg.text(phone_errorMap[errorCode]);
			},50)
		}
        return iti.isValidNumber();
    });
    
    
    // RECAPCHA
    var widgetRecapchaCallback;
    var widgetRecapchaDirector;
    var widgetRecapchaRequest;
    var widgetRecapchaQuestion;
    var widgetRecapchaContacts;
    
	if (window.smartCaptcha) {
	    
		if( $("#recapcha-callback").length ){
		widgetRecapchaCallback = window.smartCaptcha.render('recapcha-callback', {
          sitekey: yaRecapchaSiteKeyModx,
          invisible: true,
          callback: onSubmitCallback,
          hideShield: true
        });
		}
        
        if( $("#recapcha-director").length ){
            widgetRecapchaDirector = window.smartCaptcha.render('recapcha-director', {
              sitekey: yaRecapchaSiteKeyModx,
              invisible: true,
              callback: onSubmitDirector,
              hideShield: true
            });
        }
        
        if( $("#recapcha-request").length ){
            widgetRecapchaRequest = window.smartCaptcha.render('recapcha-request', {
              sitekey: yaRecapchaSiteKeyModx,
              invisible: true,
              callback: onSubmitRequest,
              hideShield: true
            });
        }
        
        if( $("#recapcha-question").length ){
            widgetRecapchaQuestion = window.smartCaptcha.render('recapcha-question', {
              sitekey: yaRecapchaSiteKeyModx,
              invisible: true,
              callback: onSubmitQuestion,
              hideShield: true
            });
        }
        
        if( $("#recapcha-contacts").length ){
            widgetRecapchaContacts = window.smartCaptcha.render('recapcha-contacts', {
              sitekey: yaRecapchaSiteKeyModx,
              invisible: true,
              callback: onSubmitContacts,
              hideShield: true
            });
        }
            
	}
	
	
	function onSubmitCallback(response){
	    $('.js-callback-form input[name="g-recaptcha-response"').val(response);
	    submitFormWithRecapcha('.js-callback-form');
	   // $('.js-callback-form').submit();
	    
	}
	
	function onSubmitDirector(response){
	    $('.js-director-form input[name="g-recaptcha-response"').val(response);
	    submitFormWithRecapcha('.js-director-form');
	}
	
	function onSubmitRequest(response){
	    $('.js-request-form input[name="g-recaptcha-response"').val(response);
	    submitFormWithRecapcha('.js-request-form');
	}
	
	function onSubmitQuestion(response){
	    $('.js-question-form input[name="g-recaptcha-response"').val(response);
	    submitFormWithRecapcha('.js-question-form');
	}
	
	function onSubmitContacts(response){
	    $('.js-contacts-page-form input[name="g-recaptcha-response"').val(response);
	    submitFormWithRecapcha('.js-contacts-page-form');
	}

	

	
	$.validator.addMethod("isEmailValid", 
		function(value, element) {
		    value = value.replace(/\s/g, '');
		    $(element).val(value);
			var EmailRegex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			return EmailRegex.test(value);
		}, 
	);
	
	$.validator.addMethod("isCodeValid", 
		function(value, element) {
			var CodeRegex = /^\d{4}$/;
			return CodeRegex.test(value);
		}, 
	);
	
	
	$.validator.addMethod("isPassStrong", 
		function(value, element) {
			return $(element).hasClass('js-iam-strong');
		}, 
	);
	
	
	
	$('.js-registration input[name="user[password]"]').on( "focus", function() {
	    
		let thCriteriaBox = $(this).parents('form').find('.password-tips-box');
		if( !thCriteriaBox.parents('form').find('input[name="user[password]"]').hasClass('js-iam-strong') ){
		    thCriteriaBox.slideDown(300);
		}
		
	});
	
	$('.js-registration input[name="user[password]"]').on( "focusout", function(){
		let thCriteriaBox = $(this).parents('form').find('.password-tips-box');	
		checkPasswordCriteria($(this));
		setTimeout(function(){
		if( $('.js-registration input[name="user[password]"]').hasClass('js-iam-strong') ){
			thCriteriaBox.slideUp(300);
			$('.js-registration input[name="user[password]"]').removeClass('error');
		} else {
			thCriteriaBox.slideDown(300);
			$('.js-registration input[name="user[password]"]').addClass('error');
		}
	  },200)
	});
	
	$('.js-prefooter-registration input[name="user[password]"]').on( "focus", function() {
		let thCriteriaBox = $(this).parents('form').find('.password-tips-box');
		if( !thCriteriaBox.parents('form').find('input[name="user[password]"]').hasClass('js-iam-strong') ){
		    thCriteriaBox.addClass('show');
		}
		
	});
	
	$('.js-prefooter-registration input[name="user[password]"]').on( "focusout", function(){
		let thCriteriaBox = $(this).parents('form').find('.password-tips-box');	
		checkPasswordCriteria($(this));
		setTimeout(function(){
		if( $('.js-prefooter-registration input[name="user[password]"]').hasClass('js-iam-strong') ){
			
			$('.js-prefooter-registration input[name="user[password]"]').removeClass('error');
		} else {
			//thCriteriaBox.addClass('show');
			$('.js-prefooter-registration input[name="user[password]"]').addClass('error');
		}
		thCriteriaBox.removeClass('show');
		
	  },200)
	});	


	
	function checkPasswordCriteria(input){
	//	console.log(input.val());
		
		let isMeValid = false;
		
		let isCriteriaValidLength = false;
		let isCriteriaValidUC = false;
		let isCriteriaValidLC = false;
		let isCriteriaValidDigit = false;
		let isCriteriaValidChar = false;
		let isCriteriaValidDigitSeq = false;
		
		let thCriteriaBox = input.parents('form').find('.password-tips-box');
		let value = input.val();
		
		
		
		let lengthMin = 4;
		// let alphabetsCriteriaUC = /([A-Z])/;
		// let alphabetsCriteriaLC = /([a-z])/;
		// let numberCriteria = /([0-9])/;
		// let charsCriteria = /[!"$%&'()+,\-.\/:;<=>?@\[\]^_{|}~`]+/;
		

    		if( value.length < lengthMin ){
    			thCriteriaBox.find('.password-criteria[data-criteria="1"]').removeClass('password-criteria-ok');
    			isCriteriaValidLength = false;
    		} else {
    			thCriteriaBox.find('.password-criteria[data-criteria="1"]').addClass('password-criteria-ok');
    			isCriteriaValidLength = true;
    		}
    		
    		// if( !value.match(alphabetsCriteriaUC)){
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="2"]').removeClass('password-criteria-ok');
    		// 	isCriteriaValidUC = false;
    		// } else {
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="2"]').addClass('password-criteria-ok');
    		// 	isCriteriaValidUC = true;
    		// }
    
    		// if( !value.match(alphabetsCriteriaLC)){
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="3"]').removeClass('password-criteria-ok');
    		// 	isCriteriaValidLC = false;
    		// } else {
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="3"]').addClass('password-criteria-ok');
    		// 	isCriteriaValidLC = true;
    		// }
    		
    		// if( !value.match(numberCriteria)){
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="4"]').removeClass('password-criteria-ok');
    		// 	isCriteriaValidDigit = false;
    		// } else {
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="4"]').addClass('password-criteria-ok');
    		// 	isCriteriaValidDigit = true;
    		// }
    		
    		// if( !value.match(charsCriteria)){
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="5"]').removeClass('password-criteria-ok');
    		// 	isCriteriaValidChar = false;
    		// } else {
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="5"]').addClass('password-criteria-ok');
    		// 	isCriteriaValidChar = true;
    		// }
    		
            // if(checkPasswordSequence(value)){
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="6"]').removeClass('password-criteria-ok');
    		// 	isCriteriaValidDigitSeq = false;
    		// } else {
    		// 	thCriteriaBox.find('.password-criteria[data-criteria="6"]').addClass('password-criteria-ok');
    		// 	isCriteriaValidDigitSeq = true;
    		// }  
    		
    		if( value.length == 0 ){
    		    isCriteriaValidDigitSeq = false;
    		    thCriteriaBox.find('.password-criteria[data-criteria="6"]').removeClass('password-criteria-ok');
    		}
		
		if( isCriteriaValidLength ){
			input.addClass('js-iam-strong');
			if( input.attr('id') == "prefooterpassword" ){
				thCriteriaBox.removeClass('show');
			} else {
				thCriteriaBox.slideUp(300);
			}
		} else {
			input.removeClass('js-iam-strong');
			if( input.attr('id') == "prefooterpassword" ){
				thCriteriaBox.addClass('show');
			} else {
				thCriteriaBox.slideDown(300);
			}
		}
		
		
		// if( isCriteriaValidLength && isCriteriaValidUC && isCriteriaValidLC && isCriteriaValidDigit && isCriteriaValidChar && isCriteriaValidDigitSeq ){
		// 	input.addClass('js-iam-strong');
		// 	if( input.attr('id') == "prefooterpassword" ){
		// 	    thCriteriaBox.removeClass('show');
		// 	} else {
		// 	    thCriteriaBox.slideUp(300);
		// 	}
		// } else {
		// 	input.removeClass('js-iam-strong');
		// 	if( input.attr('id') == "prefooterpassword" ){
		// 	    thCriteriaBox.addClass('show');
		// 	} else {
		// 	    thCriteriaBox.slideDown(300);
		// 	}
		// }
	}
	
	
	function checkPasswordSequence(value){
	    let possbleSeqs = ["01234","12345","23456","34567","45678","56789","67890"];
	    let isContain = false;
        $.each(possbleSeqs, function(key, posSeq) { 
            if( value.indexOf(posSeq) != -1 ){
                isContain = true;
            }
        });
        return isContain;
	}
	

	let validPassLengthAuth = 6;
	let validPassLengthAuthMessage = 'Длина пароля не может быть меньше 6-ти символов';
	
	let validPassLengthReg = 8;
	let	validPassLengthRegMessage = "Длина пароля не может быть меньше 8-ми символов";


	try {
		$('.js-callback-form').validate({
			rules: {
				['name']: {
					required: true,
				},
				['phone']: {
					required: true,
					itiPhoneValidation: true
				}
			},

			messages: {
				['name']: {
					required: 'Заполните это поле',
				},
				['phone']: {
					required: 'Заполните это поле',
					itiPhoneValidation: 'Неправильный номер'
				}
			},  
			submitHandler: function(form) {
			    window.smartCaptcha.execute(widgetRecapchaCallback);
            }
		})
	} catch (e) {}
	
	try {
		$('.js-contacts-page-form').validate({
			rules: {
				['name']: {
					required: true,
				},
				['phone']: {
					required: true,
					itiPhoneValidation: true
				}
			},

			messages: {
				['name']: {
					required: 'Заполните это поле',
				},
				['phone']: {
					required: 'Заполните это поле',
					itiPhoneValidation: 'Неправильный номер'
				}
			},
			submitHandler: function(form) {
			    window.smartCaptcha.execute(widgetRecapchaContacts);
            }
		})
	} catch (e) {}
	
	
	try {
		$('.js-request-form').validate({
			rules: {
				['name']: {
					required: true,
				},
				['email']: {
					required: true,
					isEmailValid: true,
				},
				['phone']: {
					required: true,
					itiPhoneValidation: true
				},
			},

			messages: {
				['name']: {
					required: 'Заполните это поле',
				},
				['email']: {
					required: 'Заполните это поле',
					isEmailValid: "Введите корректный email"
				},
				['phone']: {
					required: 'Заполните это поле',
					itiPhoneValidation: 'Неправильный номер'
				},
			},
			submitHandler: function(form) {
			    window.smartCaptcha.execute(widgetRecapchaRequest);
            }
		})
	} catch (e) {}

	
	
	try {
		$('.js-director-form').validate({
			rules: {
				
				['name']: {
					required: true,
				},
				['email']: {
					required: true,
					isEmailValid: true,
				},
				['message']: {
					required: true,
				},
				
			},

			messages: {
				['name']: {
					required: 'Заполните это поле',
				},
				['message']: {
					required: 'Заполните это поле',
				},
				['email']: {
					required: 'Заполните это поле',
					isEmailValid: true,
				},
			},
			submitHandler: function(form) {
			    window.smartCaptcha.execute(widgetRecapchaDirector);
            }
		})
	} catch (e) {}
	
	
	try {
		$('.js-question-form').validate({
			rules: {
				
				['name']: {
					required: true,
				},
				['email']: {
					required: true,
					isEmailValid: true,
				},
				['question']: {
					required: true,
				},
				
			},

			messages: {
				['name']: {
					required: 'Заполните это поле',
				},
				['question']: {
					required: 'Заполните это поле',
				},
				['email']: {
					required: 'Заполните это поле',
					isEmailValid: "Введите корректный email"
				},
			},
			submitHandler: function(form) {
			    window.smartCaptcha.execute(widgetRecapchaQuestion);
            }
		})
	} catch (e) {}
	
	
	
	try {
		$('.js-pp-password-restore').validate({
			rules: {
				['email']: {
					required: true,
					isEmailValid: true,
				},
			},

			messages: {
				['email']: {
					required: 'Заполните это поле',
					isEmailValid: "Введите корректный email"
				},
			},
		})
	} catch (e) {}
	
	
	try {
		$('.js-auth').validate({
			rules: {
				"user[email]": {
                    required: true,
                    isEmailValid: true,
                },
				"user[password]": {
                    required: true,
                    minlength: validPassLengthAuth
				},
			},

			messages: {
				"user[email]": {
                    required: "Это поле должно быть заполнено",
                    isEmailValid: "Введите корректный email"
                },
				"user[password]": {
                    required: "Это поле должно быть заполнено",
                    minlength: validPassLengthAuthMessage
                },
			},
		})
	} catch (e) {}
	
	
	try {
		$('.js-registration').validate({
			rules: {
				"user[email]": {
                    required: true,
                    isEmailValid: true,
                },
				"user[password]": {
                    required: true,
                    isPassStrong: true
				},
				"user[phone]": {
                    required: true,
					itiPhoneValidationRegPP: true
				},
			},
            onkeyup: function(element){
                if (element.name == 'user[password]') { 
                   checkPasswordCriteria($('.js-registration input[name="user[password]"]'));
                }
      
				
			},
			messages: {
				"user[email]": {
                    required: "Это поле должно быть заполнено",
                    isEmailValid: "Введите корректный email"
                },
				"user[password]": {
                    required: "Это поле должно быть заполнено",
                    isPassStrong: "Создайте безопасный пароль"
                },
				"user[phone]": {
                    required: "Это поле должно быть заполнено",
					itiPhoneValidationRegPP: "Введите корректный номер телефона"
                },
			},
		})
	} catch (e) {}
	
	
	try {
		$('.js-prefooter-registration').validate({
			rules: {
				"user[email]": {
                    required: true,
                    isEmailValid: true,
                },
				"user[password]": {
                    required: true,
                    isPassStrong: true
				},
				"user[phone]": {
                    required: true,
					itiPhoneValidationRegPrefooter: true
				},
			},
            onkeyup: function(element){
                if (element.name == 'user[password]') { 
                    checkPasswordCriteria($('.js-prefooter-registration input[name="user[password]"]'));
                }
				
			},
			messages: {
				"user[email]": {
                    required: "Это поле должно быть заполнено",
                    isEmailValid: "Введите корректный email"
                },
				"user[password]": {
                    required: "Это поле должно быть заполнено",
                    isPassStrong: ""
                },
				"user[phone]": {
                    required: "Это поле должно быть заполнено",
					itiPhoneValidationRegPrefooter: "Введите корректный номер телефона"
                },
			},
		})
	} catch (e) {}
	
	
	try {
		$('.js-subscribe-bigbox-form').validate({
			rules: {
				"email": {
                    required: true,
                    isEmailValid: true,
                }
			},

			messages: {
				"email": {
                    required: "Это поле должно быть заполнено",
                    isEmailValid: "Введите корректный email"
                }
			},
		})
	} catch (e) {}
	
	try {
		setTimeout(function(){ //изза рендера внутри контента статьи
			$('.js-cross-subscribe-form').validate({
				rules: {
					"email": {
						required: true,
						isEmailValid: true,
					}
				},

				messages: {
					"email": {
						required: "Это поле должно быть заполнено",
						isEmailValid: "Введите корректный email"
					}
				},
			})
		}, 500)
		
	} catch (e) {}

	



    function submitFormWithRecapcha(selector){
            var form = $(selector);
            $(selector).ajaxSubmit({
                method: 'POST',
                dataType: 'json',
               // data: data,
                url: '/assets_hs/components/ajaxform/action.php',
                beforeSerialize: function () {
                    form.find(':submit').each(function () {
                        if (!form.find('input[type="hidden"][name="' + $(this).attr('name') + '"]').length) {
                            $(form).append(
                                $('<input type="hidden">').attr({
                                    name: $(this).attr('name'),
                                    value: $(this).attr('value')
                                })
                            );
                        }
                    })
                },
                beforeSubmit: function (fields) {
                    //noinspection JSUnresolvedVariable
                    if (typeof(afValidated) != 'undefined' && afValidated == false) {
                        return false;
                    }
                    form.find('.error').html('');
                    form.find('.error').removeClass('error');
                    form.find('input,textarea,select,button').attr('disabled', true);
                    return true;
                },
                success: function (response, status, xhr) {
                    form.find('input,textarea,select,button').attr('disabled', false);
                    response.form = form;
                    $(document).trigger('af_complete', response);
                    if (!response.success) {
                        AjaxForm.Message.error(response.message);
                        if (response.data) {
                            var key, value, focused;
                            for (key in response.data) {
                                if (response.data.hasOwnProperty(key)) {
                                    if (!focused) {
                                        form.find('[name="' + key + '"]').focus();
                                        focused = true;
                                    }
                                    value = response.data[key];
                                    form.find('.error_' + key).html(value).addClass('error');
                                    form.find('[name="' + key + '"]').addClass('error');
                                }
                            }
                        }
                    }
                    else {

						if( form.hasClass('js-callback-form') ){
							$('.pp[data-pp="callback"]').removeClass('show');
							$('.pp[data-pp="callback-thanks"]').addClass('show');
							
							if(typeof ym != 'undefined'){
                        		ym(39474735, 'reachGoal', 'CALLBACKOK');
								if(typeof gtag != 'undefined'){
									gtag('event', 'CALLBACKOK', {
										'event_category': 'callbackok',
										'event_label': 'request',
										'value': 2
									});
								}
							
                        	}
						}
						
						if( form.hasClass('js-request-form') ){
							$('.pp[data-pp="request"]').removeClass('show');
							$('.pp[data-pp="request-thanks"]').addClass('show');
							
							if( form.attr('data-yatargetsubmit') && form.attr('data-yatargetsubmit') != '' ){
								if(typeof ym != 'undefined'){
									ym(39474735, 'reachGoal', form.attr('data-yatargetsubmit'));
									
									let event_category = '';
									let event_label = '';
									
									if( form.attr('data-yatargetsubmit') == 'REQTUTOK') {
										event_category = 'reqtutok';
										event_label = 'request';
									}
									
									if( form.attr('data-yatargetsubmit') == 'REQPRESCHOK') {
										event_category = 'reqpreschok';
										event_label = 'request';
									}
									if( form.attr('data-yatargetsubmit') == 'REQGIAOK') {
										event_category = 'reqgiaok';
										event_label = 'request';
									}
									
									if(typeof gtag != 'undefined'){
										gtag('event', form.attr('data-yatargetsubmit'), {
											'event_category': event_category,
											'event_label': event_label,
											'value': 4
										});
									}
								}
							}
							
							if( form.find('input[name="flocktorySpot"]').val() !='' && isFlocktoryImpactcForms){
							    let thSpot = form.find('input[name="flocktorySpot"]').val();
							    let thName = form.find('input[name="name"]').val();
							    let thPhone = form.find('input[name="phone"]').val();
							    let thEmail = form.find('input[name="email"]').val();
						        $('body').append('<div class="i-flocktory" data-fl-action="exchange" data-fl-spot="'+thSpot+'" data-fl-user-name="'+thName+'" data-fl-user-email="'+thEmail+'" data-fl-user-phone="'+thPhone+'"></div>');
							}
							
							
						}
						
						
						
						if( form.hasClass('js-director-form') ){
							$('.pp[data-pp="director-request"]').removeClass('show');
							$('.pp[data-pp="director-request-thanks"]').addClass('show');
						}
						

						
						if( form.hasClass('js-question-form') ){
							$('.pp[data-pp="question"]').removeClass('show');
							$('.pp[data-pp="question-thanks"]').addClass('show');
						}
						
						if( form.hasClass('js-contacts-page-form') ){
							$('.pp[data-pp="callback"]').removeClass('show');
							$('.pp[data-pp="callback-thanks"]').addClass('show');
						}
						
                        form.find('.error').removeClass('error');
                        form[0].reset();
                        if (window.smartCaptcha) {
                            window.smartCaptcha.reset();
                        }
                    }
                }
            });

        
}	
	
	
	
	
	
$.extend($.validator.messages, {
    required: "Заполните это поле",
    remote: "Пожалуйста, исправьте это поле",
    email: "Введите корректный email",
    url: "Пожалуйста, введите действительный URL",
    date: "Пожалуйста, введите правильную дату",
    dateISO: "Пожалуйста, введите правильную дату (ISO)",
    number: "Пожалуйста, введите действительный номер",
    digits: "Пожалуйста, введите только цифры",
    creditcard: "Пожалуйста, введите действительный номер кредитной карты",
    equalTo: "Пожалуйста, введите то же значение еще раз",
    accept: "Пожалуйста, введите значение с допустимым расширением",
    maxlength: $.validator.format("Введите не более {0} символов"),
    minlength: $.validator.format("Введите не менее {0} символов"),
    rangelength: $.validator.format("Введите значение от {0} до {1} символов"),
    range: $.validator.format("Введите значение от {0} до {1}"),
    max: $.validator.format("Пожалуйста, введите значение, меньшее или равное {0}"),
    min: $.validator.format("Пожалуйста, введите значение больше или равное {0}")
});
	

})
