<div class="container">
		<h1>Mina uppgifter</h1>

		<?php echo $this->Form->create();?>
		
		<div class="row">
			<div class="col-md-6">
			<?php
				echo $this->Form->input('Customer.name', array('label' => false, 'placeholder' => 'För- och efternamn'));
				echo $this->Form->input('Customer.email', array('label' => false, 'placeholder' => 'E-mail'));
				echo $this->Form->input('Customer.address', array('label' => false,'placeholder' => 'Gatuadress'));
			?>
			</div>
			<div class="col-md-6">
			<?php
				echo $this->Form->input('Customer.zipcode', array('label' => false,'placeholder' => 'Postnummer'));
				echo $this->Form->input('Customer.city', array('label' => false, 'placeholder' => 'Stad'));
				echo $this->Form->input('Customer.country', array('label' => false, 'placeholder' => 'Land'));
			?>
			</div>
		</div>

		<div class="row">
			<div class="col-md-6">
				<h1>Betalningsuppgifter</h1>
				<?php
					echo $this->Form->input('Payment.card_number', array('label' => false, 'placeholder' => 'Kortnummer'));
					echo $this->Form->input('Payment.expiry_date', array('label' => false,'placeholder' => 'Utgånsdatum: YY-MM'));
					echo $this->Form->submit('Bekräfta köp', array('before' => $this->Html->link('Gå tillbaka', array('controller' => 'carts', 'action' => 'view'), array('class' => 'btn btn-default')).' '));
				?>
			</div>
		</div>
		<?php echo $this->Form->end(); ?>
</div>