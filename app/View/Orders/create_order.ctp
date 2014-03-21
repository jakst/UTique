<div class="container">
		<h1>Mina uppgifter</h1><br>

		<?php echo $this->Form->create();?>
		<div class="row">
			<div class="col-md-6">
			<?php echo $this->Form->input('Customer.name',array('label' => 'Namn'));   
			echo $this->Form->input('Customer.email');   
			echo $this->Form->input('Customer.address',array('label' => 'Adress'));?>
			</div>  
			<div class="col-md-6">                           
			<?php echo $this->Form->input('Customer.zipcode',array('label' => 'Postnummer'));      
			echo $this->Form->input('Customer.city',array('label' => 'Stad'));                             
			echo $this->Form->input('Customer.country',array('label' => 'Land'));?> 
			
			</div>  
		</div>

		<h1>Betalnings uppgifter</h1><br>
		<div class="row">
			<div class="col-md-6">
				<?php echo $this->Form->input('Payment.card_number',array('label' => 'Kortnummer'));                             
				echo $this->Form->input('Payment.expiry_date',array('label' => 'Utgångsdatum'));?> 
			</div>
		</div>

		<?php echo $this->Html->link('Gå tillbaka', array('controller' => 'carts', 'action' => 'view'), array('class' => 'btn btn-default btn-lg'));

		echo $this->Form->end('Skicka order');?>
</div>