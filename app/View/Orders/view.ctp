<div class="container">
	<?php if (!$order['OrderItem']): ?>
	Ordern innehåller inga varor.
	<?php else: ?>
	<?php pr($order); ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Artikelnummer</th>
				<th>Storlek</th>
				<th>Namn</th>
				<th>Antal</th>
				<th>Á pris</th>
				<th class="text-right">Totalt</th>
			</tr>
		</thead>
		
		<tbody>
		
		<?php foreach ($order['OrderItem'] as $row): ?>
			<tr>
				<td><?php echo $row['item_id']; ?></td>
				<td><?php echo 'derp'; ?></td>
				<td><?php echo 'derp'; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['price']; ?> kr</td>
				<td class="text-right"><strong><?php echo $row['price']*$row['amount']; ?> kr</strong></td>
			</tr>
		<?php endforeach; ?>
		
		</tbody>
		
		<tfoot>
			<tr>
				<td colspan="6" class="text-right">
					Ordersumma: <?php echo $order['Order']['price']; ?> kr<br />
					Fraktkostnad: 169 kr<br />
					<strong>Totalkostnad: 1111 kr</strong>
				</td>
			</tr>
		</tfoot>
	</table>
	<?php endif; ?>
</div>