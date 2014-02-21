<!-- File: /app/View/Posts/index.ctp -->

	<div class="row">
		<div class="col-md-3">
			<div id="filter-wrapper">
				<div class="filter-box">
					<h4>Modell</h4>
					<div class="btn-group">
						<button type="button" class="btn btn-default">Alla</button>
						<button type="button" class="btn btn-default">Dam</button>
						<button type="button" class="btn btn-default">Herr</button>
					</div>		
				</div>
				
				<div class="filter-box">
					<h4>Färg</h4>
					<ul class="list-unstyled">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="colorCheckBox1" value="black"> Svart
							</label>
							</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="colorCheckBox2" value="red">Röd
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="colorCheckBox3" value="green">Grön
							</label>
						</li>
					</ul>
				</div>
				
				<div class="filter-box">
					<h4>Pris</h4>
					<ul class="list-unstyled">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="inlineCheckbox1" value="small">0 - 99 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="inlineCheckbox2" value="medium">100 - 199 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="inlineCheckbox3" value="large">200 - 299 kr
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="inlineCheckbox3" value="large">&gt; 299 kr
							</label>
						</li>
					</ul>
				</div>
				
				<div class="filter-box">
					<h4>Storlek</h4>
					<ul class="list-unstyled">
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="inlineCheckbox1" value="small">Small
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="inlineCheckbox2" value="medium">Medium
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="inlineCheckbox3" value="large">Large
							</label>
						</li>
						<li>
							<label class="checkbox-inline">
								<input type="checkbox" id="inlineCheckbox3" value="large">XL
							</label>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div id="product-grid" class="col-md-9">
			<div class="row">
			
			<?php foreach ($tees as $tee): ?>
				<div class="col-md-3">
				<?php
					echo $this->Html->image('tees/durian_den_stinka_frukten_fran_south_east_asia_t_troja-r1780f59cead14daf8e6d907c35148c05_8naxt_512.jpg', 
						array(
							'alt' => $tee['Tee']['name'], 
							'class' => 'img-responsive',
							'url' => array('controller' => 'tees', 'action' => 'view', $tee['Tee']['productid']
					)));
					
					echo $this->Html->link(
						$tee['Tee']['name'],
						array('controller' => 'tees', 'action' => 'view', $tee['Tee']['productid']
					));
				?>
				<br><?php echo $tee['Tee']['price']; ?> kr
				</div>
			<?php endforeach; ?>
			
			</div>
				
				
		</div>
	</div>


<?php



/*foreach ($tees as $tee): 

	echo $tee['Tee']['name'] . '<br>';
endforeach;*/

unset($tee);
?>
