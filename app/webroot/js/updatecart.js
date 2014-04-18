$(document).ready(initiate);

function update(table){
	$('#checkouttable').html(table);
	initiate();
}

function updatenavbarcart(cart){
	$('#navbarcart').html(cart);
	initiate();
}

function initiate(){
	$('.update-item').click(function(c) {
		c.stopPropagation();
		c.preventDefault();
		var href = $(this).attr('href');
		var hrefsplit = href.split("/");
		
		var id = hrefsplit[hrefsplit.length-3];
		var size = hrefsplit[hrefsplit.length-2];
		var amount = hrefsplit[hrefsplit.length-1];
		
		$.post(
			'update_cart_item/'+id+'/'+size+'/'+amount,
			update
		);
		$.post(
			'update_navbar',
			updatenavbarcart
		);
	});
}