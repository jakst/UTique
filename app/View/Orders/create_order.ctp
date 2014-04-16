<?php echo $this->Html->script('validation', FALSE);?>

<div class="container window">
	<h1>Slutför ditt köp</h1>
	
	<?php if (!$loggedIn): ?>
	Vill du bli medlem och därmed få möjlighet att följa din order? <?php echo $this->Html->link('Registrera dig här.', array('controller' => 'users', 'action' => 'register'));?><br> 
	Har du redan handlat hos oss? <?php echo $this->Html->link('Logga in här', array('controller' => 'users', 'action' => 'login'));?> för att förenkla köpet.
	<?php endif; ?>
	
	<?php echo $this->Form->create(); ?>
	
	<h2>Dina leveransuppgifter</h1>
	<div class="row">
		<div class="col-md-6">
		<?php
			echo $this->Form->input('Customer.load', array('type' => 'hidden', 'value' => 'true', 'default' => 'true'));
			echo $this->Form->input('Customer.id', array('type' => 'hidden'));
			echo $this->Form->input('Customer.name', array('label' => false, 'placeholder' => 'För- och efternamn', 'id' => 'name'));
			echo $this->Form->input('Customer.email', array('label' => false, 'placeholder' => 'E-mail', 'id' => 'email'));
			echo $this->Form->input('Customer.address', array('label' => false,'placeholder' => 'Gatuadress', 'id' => 'address'));
		?>
		</div>
		<div class="col-md-6">
		<?php
			echo $this->Form->input('Customer.zipcode', array('label' => false,'placeholder' => 'Postnummer', 'id' => 'zipcode'));
			echo $this->Form->input('Customer.city', array('label' => false, 'placeholder' => 'Stad', 'id' => 'city'));
			echo $this->Form->input('Customer.country', array('label' => false, 'placeholder' => 'Land', 'id' => 'country'));
		?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6">
			<h2>Betalningsuppgifter</h1>
			<?php
				echo $this->Form->input('Payment.card_number', array('label' => false, 'placeholder' => 'Kortnummer', 'id' => 'card_number'));
				echo $this->Form->input('Payment.expiry_date', array('label' => false,'placeholder' => 'Utgångsdatum: YY-MM', 'id' => 'expiry_date'));
				echo $this->Js->submit('Bekräfta köp', array('before' => $this->Html->link('Gå tillbaka', array('controller' => 'carts', 'action' => 'view'), array('class' => 'btn btn-default')).' '));
			?>
		</div>
	</div>
	
	<?php echo $this->Form->end(); ?>
</div>