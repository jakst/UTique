<title>uTique - <?php echo $tee['Tee']['name']?></title>
<div class="container">
	<h1><?php echo $tee['Tee']['name'];	?></h1>
	
	<div class="row">
		<div class="col-md-6" id="pictureproduct">
			<?php
				echo $this->Html->image('tees/'.$tee['Tee']['id'].'.jpg', 
					array(
						'alt' => $tee['Tee']['name'], 
						'class' => 'img-responsive'
					)
				);
			?>
		</div>

		<div class="col-md-6">
			<div id="priceproduct">
			<?php if($tee['Tee']['discount'] != 0){
			echo floor($tee['Tee']['price']*((100-$tee['Tee']['discount'])/100));
			}else{
			echo $tee['Tee']['price'];	
			}?> kr</div>
			
			

			<form role="form" id="AddItemInCartForm" method="post" action="/utique/tees/add_to_cart">
				<input type="hidden" name="id" value="<?php echo $tee['Tee']['id']; ?>">
				<div class="form-group">
					<label for="size"><h3>Välj storlek:</h3></label>
					<select class="form-control" id="size" name="size">
						<?php foreach ($tee['Item'] as $item): ?>
						<option value="<?php echo $item['id'].'-'.$item['size']; ?>"><?php echo $item['size']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			
			<h3>Beskrivning:</h3>
			<p><?php echo $tee['Tee']['description'];?> Se även <?php echo $this->Html->link('måttinformation', array('controller' => 'pages', 'action' => 'sizeinfo'));?>.</p>
			<button type="submit" class="btn btn-success btn-lg btn-block">Lägg till i varukorg</button>
			</form>
		</div>
	</div>
</div>