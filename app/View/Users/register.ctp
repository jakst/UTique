<?php echo $this->Html->script('validateuser', FALSE);?>
<div class="container window">
	<div class="row">
		<div class="col-sm-5" style="margin: 20px auto; float: none;">
		<h1>Registrera dig</h1>
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Användarnamn', 'id' => 'username'));
	echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Lösenord', 'id' => 'password' ));
	echo $this->Form->input('password_confirmation', array('label' => false, 'placeholder' => 'Upprepa lösenord', 'type' => 'password', 'id' => 'password_confirmation'));
	echo $this->Js->submit('Registrera dig');
?>
		</div>
	</div>
</div>