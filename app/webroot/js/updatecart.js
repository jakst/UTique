$(document).ready(function(){
	$('.update-item').click(function(c) {
		c.stopPropagation();
	
		var href = $(this).attr('href');
		var hrefsplit = href.split("/");
		
		var id = hrefsplit[hrefsplit.length-3];
		var size = hrefsplit[hrefsplit.length-2];
		var amount = hrefsplit[hrefsplit.length-1];

		alert (id);
		
		// Ett alternativ till den postmetoden här nedanför?
		// $.ajax({
		// type: 'POST',
		// url: 'update_cart_item',
		// data: {'id': id, 'size': size , 'count': amount},
		// // success: function(data){
			// // alert(data);
			// // }
		// });
		
		c.preventDefault();
		
		$.post(
			'update_cart_item',
			//{
				{field: 'id', value: id},
				{field: 'size', value: size},
				{field: 'amount', value: amount}
			//}
		);
	})
});