<div class="jumbotron">
			<div class="container">
				<h1>UTique!</h1>
				<h2>Dagens T-shirts</h2>
				<div class="row">
					<?php
					$tmp = $tees;
					for ($x = 0; $x <= 2; $x++):
						mt_srand(date("Ymd")*3 + $x);
						$r = mt_rand(0, count($tmp)-1);
						$tee = $tmp[$r];

						unset($tmp[$r]);
						$tmp = array_values($tmp);
  					?>
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
  					<?php
 					 endfor;
					?>
				</div>
			</div>
		</div>

<!-- File: /app/View/Posts/index.ctp -->
<div class="container">
	<div class="row">
		<div class="col-md-3">
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
					<br><?php echo $tee['Tee']['price']; ?> kr
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
