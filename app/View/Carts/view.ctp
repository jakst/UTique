
<div class="container">
		<h1>Varukorg</h1>
			<?php if ($this->Session->check('Cart')): ?>
			<table class="table table-striped table-centered">
				<thead>
					<tr>
						<th>Artikel</th>
						<th>Storlek</th>
						<th>Antal</th>
						<th>Á-pris</th>
						<th class="text-right">Summa</th>
					</tr>
				</thead>
		
				<tbody>
					<?php 
					$totalshopvalue = 0;
					$shippingcost = 0;
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
								<td>
									<div class="btn-group">
										<?php echo $this->Html->link('-', array('controller' => 'carts', 'action' => 'update_cart_item', $id, $size, $quantity-1), array('class' => 'btn btn-default')); ?>
										<a href="#" class="btn btn-default disabled"><?php echo $quantity; ?></a>
										<?php echo $this->Html->link('+', array('controller' => 'carts', 'action' => 'update_cart_item', $id, $size, $quantity+1), array('class' => 'btn btn-default')); ?>
									</div>
								</td>
								<td><?php echo $cart[$id]['Tee']['price']?> kr</td>  
								<td align="right"><?php echo $cart[$id]['Tee']['price']*$quantity?> kr</td>
								<td style="width: 50px">
									<?php echo $this->Html->link('<span class="glyphicon glyphicon-remove"></span>', array('controller' => 'carts', 'action' => 'update_cart_item', $id, $size, 0), array('escape' => false)); ?>
								</td>
							</tr>
						<?php
						$totalshopvalue = $totalshopvalue + $cart[$id]['Tee']['price']*$quantity;
						

						endforeach; 
					endforeach;
						
					$shippingcost = 100; ?>

				</tbody>
				<tfoot>
					<tr>
						<td colspan="4">
							<?php echo $this->Html->link('Töm varukorg', array('controller' => 'carts', 'action' => 'empty_cart'), array('class' => 'btn btn-default')); ?>
						</td>
						<td colspan="2" align="right">Varuvärde: <?php echo $totalshopvalue ?> kr<br>
						Fraktkostnad: <?php echo $shippingcost ?> kr<br>
						Totalkostnad: <?php echo $totalshopvalue+$shippingcost ?> kr
						</td>
					</tr>
				</tfoot>
			</table>
	
				
				<div align="right">
					<?php echo $this->Html->link('Checka ut', array('controller' => 'orders', 'action' => 'create_order'), array('class' => 'btn btn-success btn-lg')); ?>
				</div> 

					<?php else: ?>
					<h4>Du är värd en fin t-shirt! Lägg något i varukorgen!</h4>	

				<?php endif; ?>		

</div>