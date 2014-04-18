<?php if (count($tees) <= 0): ?>
<span style="font-size: 30px;text-center">Det finns inga tröjor med de valda preferenserna</span>
<?php else: ?>
<div class="row">		
<?php
	$count = 0;
	shuffle($tees);
	foreach ($tees as $tee):
		if ($count % 4 == 0 && $count > 0):
			echo '</div><div class="row">';
		endif;
?>
	<div class="col-xs-6 col-md-3">
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
	<?php if (($count+1) % 2 == 0 && ($count+1) % 4 != 0): ?><div class="clearfix visible-xs"></div><?php endif; ?>

<?php
	$count++;
	endforeach;
	unset($tee);
?>
</div>
<?php endif; ?>