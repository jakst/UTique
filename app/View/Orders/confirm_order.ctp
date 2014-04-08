<div class="container">
		<h1>Tack för att du handlat på UTique</h1><br>
		<h3>Din order har tagits emot. Om bara tre dagar kan du ha på dig din nya helt unika t-shirt!</h3>	

		<table class="table table-striped table-centered">
				<thead>
					<tr>
						<th>Artikel</th>
						<th>Storlek</th>
						<th>Antal</th>
						<th>Á-pris</th>
						<th class="text-right">Summa</th>
						<th></th>

					</tr>
				</thead>
		
				<tbody>
					<?php 
					$totalshopvalue = 0;
					$shippingcost = 0;
					//$cart = $this->Session->read('Cart');
					
					foreach ($cart as $id => $tee):
						foreach ($tee['sizes'] as $size => $orderItem): ?>
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
									<?php echo $orderItem['amount']; ?></a>
								</td>
								<td><?php echo $cart[$id]['Tee']['price']?> kr</td>  
								<td align="right"><?php echo $cart[$id]['Tee']['price']*$orderItem['amount']?> kr</td>
								<td style="width: 50px">
								</td>
							</tr>
						<?php
						$totalshopvalue = $totalshopvalue + $cart[$id]['Tee']['price']*$orderItem['amount'];
						

						endforeach; 
					endforeach;
						
					$shippingcost = 100; ?>

				</tbody>
				<tfoot>
					<tr>
						<td colspan="4">
						</td>
						<td colspan="2" align="right">Varuvärde: <?php echo $totalshopvalue ?> kr<br>
						Fraktkostnad: <?php echo $shippingcost ?> kr<br>
						Totalkostnad: <?php echo $totalshopvalue+$shippingcost ?> kr
						</td>
					</tr>
				</tfoot>
			</table>

	
</div>