$(document).ready(function(){
	$('#TeeIndexForm').find(':submit').hide();
	$('#TeeIndexForm').find('input').change(function(){
		$.post(
			'tees/filter',
			$('#TeeIndexForm').serialize(),
			replaceGrid
		);
	});
});

function replaceGrid(grid){
	$('#product-grid').html(grid);
}