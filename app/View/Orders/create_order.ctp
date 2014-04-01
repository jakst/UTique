<div class="container">
		<h1>Mina uppgifter</h1><br>

		<?php echo $this->Form->create();?>
		
		<div class="row">
			<div class="col-md-6">
			<?php echo $this->Form->input('Customer.name',array('label' => 'Namn' , 'placeholder' => 'För- och efternamn'));   
			echo $this->Form->input('Customer.email',array('placeholder' => 'E-mail'));   
			echo $this->Form->input('Customer.address',array('label' => 'Adress','placeholder' => 'Gatuadress'));?>
			</div>  
			<div class="col-md-6">                           
			<?php echo $this->Form->input('Customer.zipcode',array('label' => 'Postnummer','placeholder' => 'Postnummer'));      
			echo $this->Form->input('Customer.city',array('label' => 'Stad','placeholder' => 'Stad'));                             
			echo $this->Form->input('Customer.country',array('label' => 'Land','placeholder' => 'Land'));?> 

			
			</div>  
		</div>

		<h1>Betalnings uppgifter</h1><br>
		<div class="row">
			<div class="col-md-7">
				<?php echo $this->Form->input('Payment.card_number',array('label' => 'Kortnummer','placeholder' => 'Kortnummer'));                             
				echo $this->Form->input('Payment.expiry_date',array('label' => 'Utgångsdatum','placeholder' => 'YY-MM'));?> 
			</div>
		</div>
		<div class="form-group">
			<?php echo $this->Html->link('Gå tillbaka', array('controller' => 'carts', 'action' => 'view'), array('class' => 'btn btn-default btn-lg')); ?>
			<input class="btn btn-success btn-lg" type="submit" value="Skicka order">
		</div>
	</form>
</div>