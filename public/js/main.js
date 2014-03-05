$(document).ready(function(){
	$('.add_spec').click(function(e){
		e.preventDefault();
		var button = $('.specs:last').clone();
		$(this).before(button);
		$('input[name=\'value[]\']:last').val('');

		$('.del_spec').click(function(e){
			e.preventDefault();
			$(this).parent().remove();
		});
	});
});