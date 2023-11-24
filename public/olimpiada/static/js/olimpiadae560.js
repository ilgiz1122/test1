$(document).ready(function () {
	
	$('.spollers-item-luchik-way__title').click(function(){
		$(this).parent().find('.spollers-item-luchik-way__body').slideToggle(300);
		$(this).toggleClass('_spoller-active');
	})
	
	
	
});		