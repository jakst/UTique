<div class="container">
	<h1><?php echo $tee['Tee']['name'];	?></h1>
	
	<div class="row">
		<div class="col-md-6" id="pictureproduct">
			<?php
				echo $this->Html->image('tees/'.$tee['Tee']['id'].'.jpg', 
					array(
						'alt' => $tee['Tee']['name'], 
						'class' => 'img-responsive'
					)
				);
			?>
			
			<h3>Måttinformation:</h3>
			
			<table class="table table-striped">
				<thead>
					<th></th>
					<th><H4><center>Höjd</center></H4></th>
					<th><H4><center>Bredd</center></H4></th>
				</thead>

				<tbody>
					<tr align="center">
						<td>S</td>
						<td>68</td>
						<td>48</td>
					</tr>
					<tr align="center">
						<td>M</td>
						<td>70</td>
						<td>51</td>
					</tr>
					<tr align="center">
						<td>L</td>
						<td>72</td>
						<td>54</td>
					</tr>
					<tr align="center">
						<td>XL</td>
						<td>74</td>
						<td>57</td>
					</tr>
				</tbody>
			</table>
		</div>

		<div class="col-md-6">
			<div id="priceproduct"><?php echo $tee['Tee']['price'];	?> kr</div>
			<div id="size">
			<h3>Välj storlek</h3>
				<div class="btn-group">
					<button type="button" class="btn btn-default">S</button>
					<button type="button" class="btn btn-default">M</button>
					<button type="button" class="btn btn-default">L</button>
					<button type="button" class="btn btn-default">XL</button>
				</div>
			</div>
			
			<h3>Beskrivning:</h3>
			<p><?php echo $tee['Tee']['description']; ?></p>
			<?php echo $this->Html->link('Lägg i varukorg', array('controller' => 'tees', 'action' => 'add_to_cart', $tee['Tee']['id'], 'S'), array('class' => 'btn btn-success btn-lg btn-block')); ?>
		</div>
	</div>
</div>