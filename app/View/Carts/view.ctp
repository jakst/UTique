
<div class="container">
		<h1>Varukorg</h1>
		
		
		<!-- Example row of columns -->
			<div class="shoppingcart">
			<table class="table table-striped table-centered">
				<thead>
					<tr>
						<th>Artikel</th>
						<th>Storlek</th>
						<th>Antal</th>
						<th>Á-pris</th>
						<th>Summa</th>
					</tr>
				</thead>
				<tfoot>
				<tr>
					<td colspan="4">
						<button type="button" class="btn btn-default">Uppdatera varukorg</button>
						<?php echo $this->Html->link('Töm varukorg', array('controller' => 'carts', 'action' => 'empty_cart'), array('class' => 'btn btn-default')); ?>
					</td>
					<td align="right">Varuvärde: 199 kr<br>
					Fraktkostnad: 100 kr<br>
					Totalkostnad: 299 kr</td>
				</tr>
				</tfoot>
				<tbody>
									
					<?php 
					$cart = $this->Session->read('Cart');
					foreach ($cart as $id => $tee):
					foreach ($tee['sizes'] as $size => $quantity): ?>
						<tr>
							<td><?php

							echo $this->Html->image('tees/'.$id.'.jpg', array(
							'width' => 55,
							'height' => 55,
							'alt' => $tee['Tee']['name'],
							'url' => array('controller' => 'tees', 'action' => 'view', $id)
							));
							echo $this->Html->link(' '.$cart[$id]['Tee']['name'],
								array('controller' => 'tees', 'action' => 'view', $id
								));

							?></td>
							<td><?php print_r($size)?></td>
							<td><input type="text" name="number1" value="<?php echo $quantity?>" size="1" maxlength="2"></td>
							<td><?php echo $cart[$id]['Tee']['price']?> kr</td>  
							<td align="right"><?php echo $cart[$id]['Tee']['price']*$quantity?> kr</td>  

						</tr>

					<?php
						endforeach; 
					endforeach;
					?>

					
				</tbody>
			</table>
	
				<div align="right">
				<button type="button" class="btn btn-success btn-lg">Checka ut</button>
				</div> 
		
			</div>

</div>