<ul class="nav navbar-nav navbar-right">
	<li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">2 artiklar <strong>318 kr</strong> <span class="glyphicon glyphicon-shopping-cart"></span><b class="caret"></b></a>
		<ul class="dropdown-menu">
			<?php
				$cart = $this->Session->read('Cart');
				print_r($cart);
				
				foreach ($cart as $productid => $amount):
			?>
			<li>
				<ul class="list-inline cart-item">
					<li id="cart-item-image">
					<?php echo $this->Html->image('tees/'.$productid.'.jpg', array(
						'width' => 64,
						'height' => 64)); ?>
					</li>
					<li id="cart-item-title"><a href="product.html">We can do it - Svart</a></li>
					<li><strong><small>139 kr</small></strong></li>
				</ul>
			</li>
			<?php endforeach; ?>
			
			<li role="presentation" class="divider"></li>
			<li><strong>
			<?php
			echo $this->Html->link('Till kassan', array('controller' => 'carts', 'action' => 'view'));
			?>
			</strong></a>
		</ul>
	</li>
</ul>