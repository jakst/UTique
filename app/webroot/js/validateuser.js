$(document).ready(function(){
	$('form').find('input').blur(function(){
	
		var id = $(this).attr('id');
					
		$.post(
			'validate_user',
			{field: id, value: $(this).val()},
			function(data) {handleValidation(id, data);}
		);
	});
});

function handleValidation(id, error) {	
	if (error.length > 0) {
		if ($('#'+id+'-error').length == 0){
			$('#'+id).parent().addClass('has-error');
			$('#'+id).after('<div id ="'+id+'-error" class="error-message">' + error + "</div>")
		}
	} else {
		$('#'+id).parent().removeClass('has-error');
		$('#'+id+'-error').remove();
	}
}