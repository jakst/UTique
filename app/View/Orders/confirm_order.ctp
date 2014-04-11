<div class="container window">
		<h1>Orderbekräftelse</h1>
		<h3>Tack <?php echo $customer['name']?> för din order!</h3><br>
		Din order har tagits emot. Om bara tre dagar kan du ha på dig din nya helt unika t-shirt! Nedan finner du en sammanställning av din order:

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
					$total = 0;
					
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
						$total = $total + $cart[$id]['Tee']['price']*$orderItem['amount'];
						

						endforeach;
					endforeach;
						
					$shipping = $this->Session->read('Shipping');
				?>

				</tbody>
				<tfoot>
					<tr>
						<td colspan="4">
						</td>
						<td colspan="2" align="right">Varuvärde: <?php echo $total ?> kr<br>
						Fraktkostnad: <?php echo $shipping ?> kr<br>
						<strong>Totalkostnad: <?php echo $total + $shipping ?> kr</strong>
						</td>
					</tr>
				</tfoot>
			</table>
			
			<h3>Leveransadress:</h3>
			<?php echo $customer['name'];?><br>
			<?php echo $customer['address'];?><br>
			<?php echo $customer['zipcode']." "; echo $customer['city'];?><br>
			<?php echo $customer['country'];?>

	
</div>