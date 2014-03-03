$(document).ready(function(){
	$('#add_spec').click(function(e){
		e.preventDefault();
		var button = $('.specs:first').clone();
		$(this).before(button);
		$('input[name=\'value[]\']:last').val('');
	});
});