<?php echo $this->Html->docType('html5'); ?>
<html>
	<head>
		<?php echo $this->Html->charset(); ?>
		<title><?php echo $title_for_layout; ?></title>
		<?php
			echo $this->Html->meta('icon','img/favicon.png',
				array('type' => 'icon'));
			echo $this->fetch('meta');
			
			
			
			echo $this->Html->css(array('bootstrap', 'style'));
			echo $this->fetch('css');
		?>
	</head>
	
	<body>
	
		<div class="navbar navbar-inverse navbar-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<?php
						echo $this->Html->image('logo.png', array(
							'alt' => 'UTique - Home',
							'id' => 'logo',
							'width' => 160,
							'height' => 160,
							'url' => array('controller' => 'tees', 'action' => 'index', 'full_base' => true)
						));
					?>
					
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>
				
				<div class="collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<?php echo $this->element('login'); ?>
					</ul>
					<ul class="nav navbar-nav navbar-right">
						<?php echo $this->element('cart'); ?>
					</ul>
				</div><!--/.navbar-collapse -->
			</div>
		</div>
		
		<?php echo $this->fetch('content'); ?>
		
		<div class="container">
			<div class="well well-sm">
				<small>
					<?php echo $this->element('sql_dump'); ?>
				</small>
			</div><!-- /.well well-sm -->
		</div>
		
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-md-4"><h4>Kundtjänst</h4>
						<ul class="list-unstyled">
							<li><span class="glyphicon glyphicon-phone-alt"></span> 1337-LEETSPEEK</li>
							<li><span class="glyphicon glyphicon-envelope"></span> info@utique.se</li>
						</ul>
					</div>
					
					<div class="col-md-4"><h4>Information</h4>
						<ul class="list-unstyled">
							<li><a href="#">Lediga jobb</a></li>
							<li><a href="#">Om Utique</a></li>
							<li><a href="#">Leveransinformtion</a></li>
							<li><a href="#">Storleksinformtion</a></li>
							<li><a href="#">Betalinformtion</a></li>
						</ul>
					</div>
					
					<div class="col-md-4"><h4>Följ oss</h4>
						<ul class="list-unstyled">
							<li><a href="http://www.facebook.com">På Facebook</a></li>
							<li><a href="http://plus.google.com">På Google+</a></li>
							<li><a href="http://www.twitter.com">På Twitter</a></li>
							<li><a href="http://www.instagram.com">På Instagram</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		
		<?php
			echo $this->Html->script(array('libs/jquery-1.10.2.min', 'libs/bootstrap.min'));
			echo $this->fetch('script');
		?>
	</body>
</html>