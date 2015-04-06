<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php
			$this->assign('title', 'GW');
			echo $this->fetch('title');
		?>
	</title>
	<?php
		echo $this->Html->meta(
    'favicon.ico',
    '/favicon.ico',
    array('type' => 'icon'));

		echo $this->Html->css(array('bootstrap.min','offcanvas','style'));
		echo $this->Html->script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js');
		echo $this->Html->script(array('bootstrap/bootstrap.min','bootstrap/offcanvas'));

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');

		$this->Js->JqueryEngine->jQueryObject = '$j';
		echo $this->Html->scriptBlock(
    		'var $j = jQuery.noConflict();',
    		array('inline' => false)
		);
	?>
</head>
<body>
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>

			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<?php echo '<li class="active">'.$this->Html->link(
                		'Accueil',
                		array('controller' => 'pages', 'action' => 'index') 
                	).'</li>';?>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<?php if(!AuthComponent::user('id')): ?>
					<?php echo '<li>'.$this->Html->link(
                		'Connexion',
                		array('controller' => 'users', 'action' => 'login') 
                	).'</li>';?>
					<?php echo '<li>'.$this->Html->link(
                		'Inscription',
                		array('controller' => 'users', 'action' => 'signup') 
                	).'</li>';?>
                	<?php else: ?>
					<?php echo '<li>'.$this->Html->link(
                		'mon compte',
                		array('controller' => 'users', 'action' => 'edit') 
                	).'</li>';?>
					<?php echo '<li>'.$this->Html->link(
                		'Deconnection',
                		array('controller' => 'users', 'action' => 'logout') 
                	).'</li>';?>
                <?php endif; ?>
				</ul>
			</div><!-- /.nav-collapse -->
		</div><!-- /.container -->
	</nav><!-- /.navbar -->
	<div class="container">
		<div class="row row-offcanvas row-offcanvas-right">
			<div id="content">
					<?php echo $this->Html->link(
                		'page dynamique perso',
                		array('controller' => 'univers', 'action' => 'index'),
                		array('class'=>'btn btn-primary') 
                	);?>
                	<hr>
			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
			</div>
			<div id="footer">
				<hr>
	    		<p style="background:none">&copy; GWAoS 2015</p>
			</div>
		</div>
	</div>
	<!--<pre><?php // var_dump(get_defined_vars()); ?></pre>-->
	<?php //echo $this->Session->flash(); ?>
	<?php //echo $this->element('sql_dump'); ?>
</body>
</html>
