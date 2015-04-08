					<?php if(AuthComponent::user('id')): ?>

						<?php echo $this->Html->link(
	                		'page dynamique perso',
	                		array('controller' => 'interves', 'action' => 'index'),
	                		array('class'=>'btn btn-primary') 
	                	);?>
	                	<hr>
	                <?php else:?>
	                	<p>Pensez à vous 
						<?php echo $this->Html->link(
	                		'Connectez',
	                		array('controller' => 'users', 'action' => 'login'),
	                		array('class'=>'btn btn-primary') 
	                	);?>.</p>
                	<?php endif; ?>
