$(document).ready(function(){
	$('#name').blur(function(){
		$.post(
			'validate_form',
			{field: $('#name').attr('id'), value: $('#name').val()},
			handleNameValidation
		);
	});
	
	function handleNameValidation(error){
		if (error.length > 0) {
			if ($('#name-notEmpty').length == 0){
				$('#name').after('<div id ="name-notEmpty" class="error-message">' + error + "</div>")
			}
		} else{
			$('#name-notEmpty').remove();
		}
	}
	
	$('#email').blur(function(){
		$.post(
			'validate_form',
			{field: $('#email').attr('id'), value: $('#email').val()},
			handleEmailValidation
		);
	});
	
	function handleEmailValidation(error){
		if (error.length > 0) {
			if ($('#email-notEmpty').length == 0){
				$('#email').after('<div id ="email-notEmpty" class="error-message">' + error + "</div>")
			}
		} else{
			$('#email-notEmpty').remove();
		}
	}
	
	$('#address').blur(function(){
		$.post(
			'validate_form',
			{field: $('#address').attr('id'), value: $('#address').val()},
			handleAddressValidation
		);
	});
	
	function handleAddressValidation(error){
		if (error.length > 0) {
			if ($('#address-notEmpty').length == 0){
				$('#address').after('<div id ="address-notEmpty" class="error-message">' + error + "</div>")
			}
		} else{
			$('#address-notEmpty').remove();
		}
	}
	
	$('#zipcode').blur(function(){
		$.post(
			'validate_form',
			{field: $('#zipcode').attr('id'), value: $('#zipcode').val()},
			handleZipcodeValidation
		);
	});
	
	function handleZipcodeValidation(error){
		if (error.length > 0) {
			if ($('#zipcode-notEmpty').length == 0){
				$('#zipcode').after('<div id ="zipcode-notEmpty" class="error-message">' + error + "</div>")
			}
		} else{
			$('#zipcode-notEmpty').remove();
		}
	}
	
	$('#city').blur(function(){
		$.post(
			'validate_form',
			{field: $('#city').attr('id'), value: $('#city').val()},
			handleCityValidation
		);
	});
	
	function handleCityValidation(error){
		if (error.length > 0) {
			if ($('#city-notEmpty').length == 0){
				$('#city').after('<div id ="city-notEmpty" class="error-message">' + error + "</div>")
			}
		} else{
			$('#city-notEmpty').remove();
		}
	}
	
	$('#country').blur(function(){
		$.post(
			'validate_form',
			{field: $('#country').attr('id'), value: $('#country').val()},
			handleCountryValidation
		);
	});
	
	function handleCountryValidation(error){
		if (error.length > 0) {
			if ($('#country-notEmpty').length == 0){
				$('#country').after('<div id ="country-notEmpty" class="error-message">' + error + "</div>")
			}
		} else{
			$('#country-notEmpty').remove();
		}
	}
	
	$('#card_number').blur(function(){
		$.post(
			'validate_form',
			{field: $('#card_number').attr('id'), value: $('#card_number').val()},
			handleCardnumberValidation
		);
	});
	
	function handleCardnumberValidation(error){
		if (error.length > 0) {
			if ($('#card_number-notEmpty').length == 0){
				$('#card_number').after('<div id ="card_number-notEmpty" class="error-message">' + error + "</div>")
			}
		} else{
			$('#card_number-notEmpty').remove();
		}
	}
	
		$('#expiry_date').blur(function(){
		$.post(
			'validate_form',
			{field: $('#expiry_date').attr('id'), value: $('#expiry_date').val()},
			handleExpirydateValidation
		);
	});
	
	function handleExpirydateValidation(error){
		if (error.length > 0) {
			if ($('#expiry_date-notEmpty').length == 0){
				$('#expiry_date').after('<div id ="expiry_date-notEmpty" class="error-message">' + error + "</div>")
			}
		} else{
			$('#expiry_date-notEmpty').remove();
		}
	}
});