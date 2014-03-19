<div class="container">
		<h1>Mina uppgifter</h1><br>
		<form role="form" id="AddInformation" method="post">
		<div class="row">
			
			<div class="col-md-5">
				<div class="form-group">
					<label for="InputName">För- och efternamn</label>
				    <input type="name" class="form-control" id="InputName" placeholder="För- och efternamn">
				</div>
				  
				<div class="form-group">
					<label for="InputEmail">Email</label>
				    <input type="Email" class="form-control" id="InputEmail" placeholder="Email">
				</div>
				 
				<div class="form-group">
				    <label for="InputAddress">Adress</label>
				    <input type="Address" class="form-control" id="InputAddress" placeholder="Adress">
				</div>

			</div>
			<div class="col-md-5">
				<div class="form-group">
				    <label for="InputZipcode">Postnummer</label>
				    <input type="Zipcode" class="form-control" id="InputZipcode" placeholder="Postnummer">
				</div>

				<div class="form-group">
				    <label for="InputCity">Stad</label>
				    <input type="City" class="form-control" id="InputCity" placeholder="Stad">
				</div>

				<div class="form-group">
				    <label for="InputCountry">Land</label>
				    <input type="Country" class="form-control" id="InputCountry" placeholder="Land">
				</div>	
			</div>
			
		</div>			
		
		<?php echo $this->Html->link('Gå tillbaka', array('controller' => 'carts', 'action' => 'view'), array('class' => 'btn btn-default btn-lg')); ?>
			
		<?php echo $this->Html->link('Skicka order', array('controller' => 'confirmations', 'action' => 'view'), array('class' => 'btn btn-success btn-lg')); ?>

		</form>	

</div>