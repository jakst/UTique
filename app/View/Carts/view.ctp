<div class="container">
		<h1>Kundvagn</h1>
		
		<!-- Example row of columns -->
			<div class="shoppingcart">
			<table class="table table-striped table-centered">
				<thead>
					<tr>
						<th>Artikel</th>
						<th>Storlek</th>
						<th>Antal</th>
						<th>Á-pris</th>
						<th>Summa</th>
					</tr>
				</thead>
				<tfoot>
				<tr>
					<td colspan="4">
						<button type="button" class="btn btn-warning cartbutton">Uppdatera</button>
						<button type="button" class="btn btn-danger cartbutton">Töm kundvagn</button>		
					</td>
					<td align="right">Varuvärde: 199 kr<br>
					Fraktkostnad: 100 kr<br>
					Totalkostnad: 299 kr</td>
				</tr>
				</tfoot>
				<tbody>
					<tr> 
						<td><?php
							echo $this->Html->image('tees/'.$tees['Tee']['id'].'.jpg', 
								array(
									'alt' => $tees['Tee']['name'], 
									'class' => 'img-responsive checkout-product-img', 
									'width' => 55,
									'height' => 55,
									'url' => array('controller' => 'tees', 'action' => 'view', $tees['Tee']['id']
							)));
							echo $this->Html->link(
							' '.$tees['Tee']['name'],
							array('controller' => 'tees', 'action' => 'view', $tees['Tee']['id']
							));
						?></td>
						<td><?php echo $tees['Tee']['size']?></td>
						<td><input type="text" name="number1" value="<?php echo $tees['Tee']['amount']?>" size="1" maxlength="2"></td> 
						<td><?php echo $tees['Tee']['price']?> kr</td>  
						<td align="right"><?php echo $tees['Tee']['price']*$tees['Tee']['amount']?> kr</td>  
					</tr>
				</tbody>
			</table>
	
				<div align="right">
				<button type="button" class="btn btn-success cartbutton">Checka ut</button>
				</div> 
		
			</div>

</div>