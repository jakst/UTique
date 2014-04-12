<div class="container window">
	<h1>Orderhistorik</h1>
	<?php if (empty($orders)): ?>
	<p style="font-size: 20px;">Du har ingen orderhistorik</p>
	<?php else: ?>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Ordernummer</th>
				<th>Orderdatum</th>
				<th>Status</th>
				<th class="text-right">Pris</th>
			</tr>
		</thead>
		
		<tbody>
		<?php foreach ($orders as $order): ?>
			<tr>
				<td><?php echo $this->Html->link($order['Order']['id'], array('controller' => 'orders', 'action' => 'view', $order['Order']['id'])); ?></td>
				<td><?php echo $this->Html->link($this->Time->format($order['Order']['created'], '%Y-%m-%d'), array('controller' => 'orders', 'action' => 'view', $order['Order']['id'])); ?></td>
				<td><?php echo $this->Html->link($order['Order']['status'], array('controller' => 'orders', 'action' => 'view', $order['Order']['id'])); ?></td>
				<td class="text-right"><?php echo $this->Html->link($order['Order']['price'].' kr', array('controller' => 'orders', 'action' => 'view', $order['Order']['id'])); ?></td>
			</tr>
		<?php endforeach; ?>
		
		</tbody>
	</table>
	<?php endif; ?>
</div>