<title>uTique - stället för dig som vill sticka ut i mängden!</title>
<div class="jumbotron">
			<div class="container">
				<h1>UTique!</h1>
				<h2>Dagens T-shirts</h2>
				<div class="row">
								
					<?php foreach ($dailyTees as $tee): ?>
					<div class="col-md-4">
					<?php
					echo $this->Html->image('tees/'.$tee['Tee']['id'].'.jpg', 
					array(
						'alt' => $tee['Tee']['name'], 
						'class' => 'img-responsive',
						'url' => array('controller' => 'tees', 'action' => 'view', $tee['Tee']['id']
					)));
					?>
					</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>

<!-- File: /app/View/Posts/index.ctp -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
			<form role="form" id="selectgender" method="post" action="/utique/tees/index">
				<div class="filter-box">
					<h4>Modell</h4>
						<div class="btn-group" data-toggle="buttons">
							<label class="btn btn-default <?php if($filter['gender']=='Alla'){echo 'active';} ?>">
								<input type="radio" name="gender" value="Alla" <?php if($filter['gender']=='Alla'){echo 'checked="checked"';} ?>> Alla
							</label>
							<label class="btn btn-default <?php if($filter['gender']=='Dam'){echo 'active';} ?>">
								<input type="radio" name="gender" value="Dam" <?php if($filter['gender']=='Dam'){echo 'checked="checked"';} ?>> Dam
							</label>
							<label class="btn btn-default <?php if($filter['gender']=='Herr'){echo 'active';} ?>">
								<input type="radio" name="gender" value="Herr" <?php if($filter['gender']=='Herr'){echo 'checked="checked"';} ?>> Herr
							</label>
						</div>		
				</div>
						
				<div class="filter-box">
					<h4>Färg</h4>
					<ul class="list-unstyled">
						<?php foreach ($colors as $color): ?>					
							<li>
								<label class="checkbox-inline">
									<input type="checkbox" name="color[<?php echo $color; ?>]" id="colorCheckBox1" value="<?php echo $color; ?>"; <?php if(isset($filter['color'][$color])){echo 'checked="checked"';} ?>> <?php echo $color; ?>
								</label>
							</li>
						<?php endforeach;?> 
					</ul>
				</div>
				
				<div class="filter-box">
					<h4>Pris</h4>
					<ul class="list-unstyled">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="price[intervall1]" id="inlineCheckbox1" value="intervall1" <?php if(isset($filter['price']['intervall1'])){echo 'checked="checked"';} ?>>0 - 99 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="price[intervall2]" id="inlineCheckbox2" value="intervall2" <?php if(isset($filter['price']['intervall2'])){echo 'checked="checked"';} ?>>100 - 199 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="price[intervall3]" id="inlineCheckbox3" value="intervall3" <?php if(isset($filter['price']['intervall3'])){echo 'checked="checked"';} ?>>200 - 299 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="price[intervall4]" id="inlineCheckbox3" value="intervall4" <?php if(isset($filter['price']['intervall4'])){echo 'checked="checked"';} ?>>&gt; 299 kr
							</label>
						</li>
					</ul>
				</div>
				
<!-- 				<div class="filter-box">
					<h4>Storlek</h4>
					<ul class="list-unstyled">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="size[xs]" id="inlineCheckbox3" value="large" <?php if(isset($filter['size']['xs'])){echo 'checked="checked"';} ?>>XSmall
							</label>
						</li>	
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="size[s]" id="inlineCheckbox1" value="small" <?php if(isset($filter['size']['s'])){echo 'checked="checked"';} ?>>Small
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="size[m]" id="inlineCheckbox2" value="medium" <?php if(isset($filter['size']['m'])){echo 'checked="checked"';} ?>>Medium
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="size[l]" id="inlineCheckbox3" value="large" <?php if(isset($filter['size']['l'])){echo 'checked="checked"';} ?>>Large
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="size[xl]" id="inlineCheckbox3" value="large" <?php if(isset($filter['size']['xl'])){echo 'checked="checked"';} ?>>XLarge
							</label>
						</li>	
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="size[xxl]" id="inlineCheckbox3" value="large" <?php if(isset($filter['size']['xxl'])){echo 'checked="checked"';} ?>>XXLarge
							</label>
						</li>	
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" name="size[xxxl]" id="inlineCheckbox3" value="large" <?php if(isset($filter['size']['xxxl'])){echo 'checked="checked"';} ?>>XXXLarge
							</label>
						</li>						
					</ul>
				</div> -->
				<input class="btn btn-default btn-block" type="submit" value="Filtrera">
			</form>
		</div>

		<div id="product-grid" class="col-md-9">
			<div class="row">		
			<?php
				$count = 0;
				shuffle($tees);
				foreach ($tees as $tee):
					if ($count % 4 == 0 && $count > 0):
						echo '</div><div class="row">';
					endif;
			?>
				<div class="col-md-3">
					<?php
						if($tee['Tee']['discount']!=0){
							echo $this->Html->image('sale.png');
						}
						echo $this->Html->image('tees/'.$tee['Tee']['id'].'.jpg', 
							array(
								'alt' => $tee['Tee']['name'], 
								'class' => 'img-responsive',
								'url' => array('controller' => 'tees', 'action' => 'view', $tee['Tee']['id']
						)));

						echo $this->Html->link(
							$tee['Tee']['name'],
							array('controller' => 'tees', 'action' => 'view', $tee['Tee']['id']
						));
					?>
					<br><?php if($tee['Tee']['discount']!=0){
						echo '<strike>'.$tee['Tee']['price'].' </strike>';
						echo '<font color="red">'.floor($tee['Tee']['price']*((100-$tee['Tee']['discount'])/100)).' kr</font>';
					}else{
						echo $tee['Tee']['price'].' kr';
					}?>
				</div>
				
			<?php
				$count++;
				endforeach;
				unset($tee);
			?>
			</div>				
		</div>
	</div>
</div>