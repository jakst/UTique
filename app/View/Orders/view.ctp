<div class="container window">
	<h1>Ordernummer: <?php echo $order['Order']['id']; ?></h1>
	<?php if (!$order['OrderItem']): ?>
	Ordern innehåller inga varor.
	<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Artikelnummer</th>
				<th>Namn</th>
				<th>Storlek</th>
				<th>Antal</th>
				<th>Á pris</th>
				<th class="text-right">Totalt</th>
			</tr>
		</thead>
		
		<tbody>
		
		<?php foreach ($order['OrderItem'] as $row): ?>
			<tr>
				<td><?php echo $this->Html->link($row['tee_id'], array('controller' => 'Tee', 'action' => 'view', $row['tee_id'])); ?></td>
				<td><?php echo $this->Html->link($row['Tee']['name'], array('controller' => 'Tee', 'action' => 'view', $row['tee_id'])); ?></td>
				<td><?php echo $row['size']; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['price']; ?> kr</td>
				<td class="text-right"><strong><?php echo $row['price']*$row['amount']; ?> kr</strong></td>
			</tr>
		<?php endforeach; ?>
		
		</tbody>
		
		<tfoot>
			<tr>
				<td colspan="6" class="text-right">
					Ordersumma: <?php echo $order['Order']['price']; ?> kr<br>
					Fraktkostnad: <?php echo $order['Order']['shipping']; ?> kr<br>
					<strong>Totalkostnad: <?php echo $order['Order']['price'] + $order['Order']['shipping']; ?> kr</strong>
				</td>
			</tr>
		</tfoot>
	</table>
	<?php endif; ?>
</div>