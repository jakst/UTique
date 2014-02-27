<div class="container">
		<h1>Kundvagn</h1>
		
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
						<button type="button" class="btn btn-default">Uppdatera kundvagn</button>
						<?php echo $this->Html->link('Töm kundvagn', array('controller' => 'carts', 'action' => 'empty_cart'), array('class' => 'btn btn-default')); ?>
					</td>
					<td align="right">Varuvärde: 199 kr<br>
					Fraktkostnad: 100 kr<br>
					Totalkostnad: 299 kr</td>
				</tr>
				</tfoot>
				<tbody>
					<?php 
					$sum = 0; 					
					foreach ($tees as $tee):?>
						<tr> 
							<td><?php
								echo $this->Html->image('tees/'.$tee['id'].'.jpg', 
									array(
										'alt' => $tees['Tee']['name'], 
										'class' => 'img-responsive checkout-product-img', 
										'width' => 55,
										'height' => 55,
										'url' => array('controller' => 'tees', 'action' => 'view', $tee['id']
								)));
								echo $this->Html->link(
								' '.$tee['name'],
								array('controller' => 'tees', 'action' => 'view', $tee['id']
								));
							?></td>
							<td><?php echo $tee['size']?></td>
							<td><input type="text" name="number1" value="<?php echo $tees['Tee']['amount']?>" size="1" maxlength="2"></td> 
							<td><?php echo $tee['price']?> kr</td>  
							<td align="right"><?php echo $tee['price']*$tee['amount']?> kr</td>  
						</tr>
					<?php 
					$sum = $sum+$tee['price'];
					endforeach; ?>
				</tbody>
			</table>
	
				<div align="right">
				<button type="button" class="btn btn-success btn-lg">Checka ut</button>
				</div> 
		
			</div>

</div>