<ul class="nav navbar-nav navbar-right">
	<?php 
	if ($this->Session->check('Cart')): 
		$cart = $this->Session->read('Cart');
		
		$count = 0;
		$total = 0;
		
		foreach ($cart as $id => $tee):
			foreach ($tee['sizes'] as $size => $quantity):
				$count += $quantity;
				$total += $quantity * $tee['Tee']['price'];
			endforeach;
		endforeach;
	?>
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $count == 1 ? '1 artikel' : $count.' artiklar' ; ?><strong> <?php echo $total; ?> kr</strong> <span class="glyphicon glyphicon-shopping-cart"></span><b class="caret"></b></a>
		<ul class="dropdown-menu text-center">
			<li>
			<?php
				//debug
				/*print_r($cart);
				echo '</li><li>';*/
				//end debug
				
				foreach ($cart as $id => $tee):
					foreach ($tee['sizes'] as $size => $quantity):
			?>
				<ul class="list-inline cart-item text-left">
					<li>
					<?php 
					echo $this->Html->image('tees/'.$id.'.jpg', array(
						'width' => 64,
						'height' => 64,
						'alt' => $tee['Tee']['name'],
						'url' => array('controller' => 'tees', 'action' => 'view', $id)
					)); ?>
					</li>
					<li>
						<?php echo $this->Html->Link($tee['Tee']['name'], array('controller' => 'tees', 'action' => 'view', $id)); ?><br>
						<?php echo $size.', '.$quantity; ?> st á <?php echo $tee['Tee']['price']; ?> kr
					</li>
					<li class="cart-item-total"><?php echo $quantity * $tee['Tee']['price']; ?> kr</li>
				</ul>
			<?php 
					endforeach; 
				endforeach;
			?>
			</li>
			<li role="presentation" class="divider"></li>
			<li><strong>
			<?php
			echo $this->Html->link('Till kassan', array('controller' => 'carts', 'action' => 'view'));
			?>
			</strong></a>
		</ul>
	</li>
	<?php else: ?>
	<p class="navbar-text">Varukorgen är tom <span class="glyphicon glyphicon-shopping-cart"></span></p>
	<?php endif; ?>
</ul>