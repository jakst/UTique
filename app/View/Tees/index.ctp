<?php echo $this->Html->script('filter', FALSE); ?>
<div class="jumbotron unpadded-window bordered-pictures">
	<div class="container">
		<h2>Dagens T-shirts</h2>
		<div class="row">
						
			<?php foreach ($dailyTees as $tee): ?>
			<div class="col-xs-4">
				<div class="picture-wrapper">
					<?php
						$sale = $tee['Tee']['discount'] > 0;
						$saleStyle = $sale ? 'position: absolute; z-index: -1' : '';
						
						echo $this->Html->image('tees/'.$tee['Tee']['id'].'.jpg', 
							array(
								'alt' => $tee['Tee']['name'], 
								'class' => 'img-responsive',
								'url' => array('controller' => 'tees', 'action' => 'view', $tee['Tee']['id']),
								'style' => $saleStyle
							)
						);
					
						if ($sale):
							echo $this->Html->image('sale.png',
								array(
									'class' => 'img-responsive', 
									'url' => array('controller' => 'tees', 'action' => 'view', $tee['Tee']['id'])
								)
							);
						endif;
					?>
				</div>
				<?php
					echo $this->Html->link(
						$tee['Tee']['name'],
						array('controller' => 'tees', 'action' => 'view', $tee['Tee']['id']
					));
				?>
				
				<br>
				
				<?php
					if($sale) {
						echo '<strike>'.$tee['Tee']['price'].' kr</strike> ';
						echo '<span style="color: red;">'.floor($tee['Tee']['price']*((100 - $tee['Tee']['discount'])/100)).' kr</span>';
					} else {
						echo $tee['Tee']['price'].' kr';
					}
				?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>

<!-- File: /app/View/Posts/index.ctp -->

<div class="container window">
	<div class="row"> 
		<div class="collapse" id="viewdetails">
			<?php echo $this->Form->create(null, array('url' => array('controller' => 'tees', 'action' => 'index'))); ?>
				<div class="col-md-4">
					<h4>Modell</h4>
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-default <?php if($filter['gender']=='Alla'){echo 'active';} ?>">
							<input type="radio" name="gender" value="Alla"<?php if($filter['gender']=='Alla'){echo ' checked="checked"';} ?>>Alla
						</label>
						<label class="btn btn-default <?php if($filter['gender']=='Dam'){echo 'active';} ?>">
							<input type="radio" name="gender" value="Dam"<?php if($filter['gender']=='Dam'){echo ' checked="checked"';} ?>>Dam
						</label>
						<label class="btn btn-default <?php if($filter['gender']=='Herr'){echo 'active';} ?>">
							<input type="radio" name="gender" value="Herr"<?php if($filter['gender']=='Herr'){echo ' checked="checked"';} ?>>Herr
						</label>
					</div>
				</div>
	
				<div class="col-md-4">
					<h4>Färg</h4>
					<ul class="list-unstyled">
						<?php foreach ($colors as $color): ?>					
							<li>
								<label class="checkbox-inline">
									<input type="checkbox" name="color[<?php echo $color; ?>]" id="colorCheckBox1" value="<?php echo $color; ?>"; <?php if($post && isset($filter['color'][$color])){echo 'checked="checked"';} ?>> <?php echo $color; ?>
								</label>
							</li>
						<?php endforeach;?> 
					</ul>
				</div>
				
				<div class="col-md-4">
					<h4>Pris</h4>
					<ul class="list-unstyled">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="price[intervall1]" id="inlineCheckbox1" value="intervall1" <?php if($post && isset($filter['price']['intervall1'])){echo 'checked="checked"';} ?>>0 - 99 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="price[intervall2]" id="inlineCheckbox2" value="intervall2" <?php if($post && isset($filter['price']['intervall2'])){echo 'checked="checked"';} ?>>100 - 199 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="price[intervall3]" id="inlineCheckbox3" value="intervall3" <?php if($post && isset($filter['price']['intervall3'])){echo 'checked="checked"';} ?>>200 - 299 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="price[intervall4]" id="inlineCheckbox3" value="intervall4" <?php if($post && isset($filter['price']['intervall4'])){echo 'checked="checked"';} ?>>&gt; 299 kr
							</label>
						</li>
					</ul>
					<input class="btn btn-default btn-block" type="submit" value="Filtrera">
				</div>
			</form>
		</div>
	</div>
	<h4><a class="collapse-btn collapsed" data-toggle="collapse" data-target="#viewdetails"></a></h4>

	<div id="product-grid" class="bordered-pictures">
		<?php echo $this->element('product-grid'); ?>
	</div>
</div>