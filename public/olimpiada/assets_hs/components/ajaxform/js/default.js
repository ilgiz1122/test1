var AjaxForm = {

    initialize: function (afConfig) {
        if (!jQuery().ajaxForm) {
            document.write('<script src="' + afConfig['assetsUrl'] + 'js/lib/jquery.form.min.js"><\/script>');
        }
        if (!jQuery().jGrowl) {
            document.write('<script src="' + afConfig['assetsUrl'] + 'js/lib/jquery.jgrowl.min.js"><\/script>');
        }

        $(document).ready(function () {
            $.jGrowl.defaults.closerTemplate = '<div>[ ' + afConfig['closeMessage'] + ' ]</div>';
        });

         $(document).off('submit', afConfig['formSelector']).on('submit', afConfig['formSelector'], function (e) {
           // console.log('ajaxform ' + afConfig['formSelector']);
            $(this).ajaxSubmit({
                dataType: 'json',
                data: {pageId: afConfig['pageId']},
                url: afConfig['actionUrl'],
                beforeSerialize: function (form) {
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
                beforeSubmit: function (fields, form) {
                    //noinspection JSUnresolvedVariable
                    if (typeof(afValidated) != 'undefined' && afValidated == false) {
                        return false;
                    }
                    form.find('.error').html('');
                    form.find('.error').removeClass('error');
                    form.find('input,textarea,select,button').attr('disabled', true);
                    return true;
                },
                success: function (response, status, xhr, form) {
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
                       // AjaxForm.Message.success(response.message);
						
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
                        //noinspection JSUnresolvedVariable
                        if (typeof(grecaptcha) != 'undefined') {
                            //noinspection JSUnresolvedVariable
                            grecaptcha.reset();
                        }
                    }
                }
            });
            e.preventDefault();
            return false;
        });

        $(document).on('keypress change', '.error', function () {
            var key = $(this).attr('name');
            $(this).removeClass('error');
            $('.error_' + key).html('').removeClass('error');
        });

        $(document).on('reset', afConfig['formSelector'], function () {
            $(this).find('.error').html('');
            AjaxForm.Message.close();
        });
    }

};


//noinspection JSUnusedGlobalSymbols
AjaxForm.Message = {
    success: function (message, sticky) {
        if (message) {
            if (!sticky) {
                sticky = false;
            }
            $.jGrowl(message, {theme: 'af-message-success', sticky: sticky});
        }
    },
    error: function (message, sticky) {
        if (message) {
            if (!sticky) {
                sticky = false;
            }
            $.jGrowl(message, {theme: 'af-message-error', sticky: sticky});
        }
    },
    info: function (message, sticky) {
        if (message) {
            if (!sticky) {
                sticky = false;
            }
            $.jGrowl(message, {theme: 'af-message-info', sticky: sticky});
        }
    },
    close: function () {
        $.jGrowl('close');
    },
};
