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
			
			

			<form role="form" id="AddItemInCartForm" method="post" action="/utique/tees/add_to_cart">
				<input type="hidden" name="id" value="<?php echo $tee['Tee']['id']; ?>">
				<div class="form-group">
					<label for="size"><h3>Välj storlek</h3></label>
					<select class="form-control" id="size" name="size">
						<?php foreach ($tee['Item'] as $item): ?>
						<option value="<?php echo $item['id'].'-'.$item['size']; ?>"><?php echo $item['size']; ?></option>
						<?php endforeach; ?>
					</select>
				</div>
			
			<h3>Beskrivning:</h3>
			<p><?php echo $tee['Tee']['description']; ?></p>
			<button type="submit" class="btn btn-success btn-lg btn-block">Lägg till i varukorg</button>
			
			<?php /* echo $this->Html->link('Lägg i varukorg', array('controller' => 'tees', 'action' => 'add_to_cart', $tee['Tee']['id'], 'S'), array('class' => 'btn btn-success btn-lg btn-block')); */ ?>

			</form>
		</div>
	</div>
</div>