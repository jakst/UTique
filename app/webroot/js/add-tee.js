$(document).ready(function(){
	$('#TeeViewForm').submit(function(event){
		$.post(
			'../add_to_cart',
			$('#TeeViewForm').serialize(),
			updateCart
		);
		
		event.preventDefault();
	});
});

function updateCart(view) {
	$('#navbarcart').html($.trim(view));
	$('<div id="add" style="font-size: 20px; ">Varan lades till i varukorgen</div>').hide().appendTo('form#TeeViewForm').fadeIn('slow', function(){
		$(this).fadeOut('slow', function(){$(this).remove();});
	});
}