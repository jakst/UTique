$(document).ready(function(){
	$('#TeeIndexForm').find(':submit').hide();
	$('#TeeIndexForm').find('input').change(function(){
	$('#product-grid').fadeTo('fast', 0);
		$.post(
			'tees/filter',
			$('#TeeIndexForm').serialize(),
			replaceGrid
		);
	});
});

function replaceGrid(grid){
	$('#product-grid').html(grid).fadeTo('fast', 1);
}