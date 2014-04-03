<?php if ($dropdown): ?>
	<?php if ($loggedIn): ?>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Hej, <?php echo $currentUser['username']; ?><b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li>
		<?php echo $this->Html->link('Orderhistorik', array('controller' => 'orders', 'action' => 'history')); ?>
		</li>
		<li class="divider"></li>
		<li>
		<?php echo $this->Html->link('Logga ut', array('controller' => 'users', 'action' => 'logout')); ?>
		</li>
	</ul>
</li>
	<?php else: ?>
<li class="dropdown">
	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Logga in<b class="caret"></b></a>
	<ul class="dropdown-menu">
		<li>
<?php
	echo $this->Form->create('User', array('class' => 'navbar-form'));
	echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Användarnamn', 'class' => 'form-control nav-dropdown-form'));
	echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Lösenord', 'class' => 'form-control nav-dropdown-form'));
	echo $this->Form->submit('Logga in', array('class' => 'btn btn-success nav-dropdown-form', 'after' => ' '.$this->Html->link('Registrera dig', array('controller' => 'users', 'action' => 'register'))));
	echo $this->Form->end();
?>
		</li>
	</ul>
</li>
	<?php endif; ?>
<?php else: ?>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Användarnamn'));
	echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Lösenord'));
	echo $this->Form->submit('Logga in', array('class' => 'btn btn-success', 'after' => ' '.$this->Html->link('Registrera dig', array('controller' => 'users', 'action' => 'register'))));
	echo $this->Form->end();
?>
<?php endif; ?>