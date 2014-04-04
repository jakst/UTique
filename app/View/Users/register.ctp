<div class="container">
	<div class="row">
		<div class="col-sm-5" style="margin: 20px auto; float: none;">
<?php
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label' => false, 'placeholder' => 'Användarnamn'));
	echo $this->Form->input('password', array('label' => false, 'placeholder' => 'Lösenord'));
	echo $this->Form->input('password_confirmation', array('label' => false, 'placeholder' => 'Upprepa lösenord', 'type' => 'password'));
	echo $this->Form->end('Registrera dig');
?>
		</div>
	</div>
</div>