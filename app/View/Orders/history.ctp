<div class="container">
	<h1>Orderhistorik</h1>
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
				<td><?php echo $this->Html->link($order['Order']['id'], array('controller' => 'orders', 'action' => 'view')); ?></td>
				<td><?php echo $this->Html->link($this->Time->format($order['Order']['created'], '%Y-%m-%d'), array('controller' => 'orders', 'action' => 'view')); ?></td>
				<td><?php echo $this->Html->link($order['Order']['status'], array('controller' => 'orders', 'action' => 'view')); ?></td>
				<td class="text-right"><?php echo $this->Html->link('1337 kr', array('controller' => 'orders', 'action' => 'view')); ?></td>
			</tr>
		<?php endforeach; ?>
		
		</tbody>
	</table>
</div>