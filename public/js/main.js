$(document).ready(function(){
	$('.add_spec').click(function(e){
		e.preventDefault();
		var button = $('.specs-field:last').clone();
		$(this).before(button);
		$('input[name=\'value[]\']:last').val('');

		$('.del_spec').click(function(e){
			e.preventDefault();
			$(this).parent().remove();
		});
	});

	// $('#categories-menu ul li ul').css('display','none');
	// $('#categories-menu ul>li').click(function(){
	// 	$(this+' ul').css('display', 'block');
	// });
});