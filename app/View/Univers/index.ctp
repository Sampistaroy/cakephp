

<h3>menu edit univers</h3>
<?php echo $this->Html->link(
	'parametre de l\'univers',
	array('controller' => 'univers', 'action' => 'edit', 20),
	array('class'=>'btn btn-primary') 
);?>|

<?php if ($d=AuthComponent::user('interf_id')) :
	echo $this->Html->link(
		'interface principale',
		array('controller' => 'interves', 'action' => 'edit', $d),
		array('class'=>'btn btn-primary')
	); endif;
	echo $this->Html->link(
		'interface normale',
		array('controller' => 'interves', 'action' => 'index'),
		array('class'=>'btn btn-primary') 
	);
	
?>
<hr>
<h3>a venir</h3>
<?php echo $this->Html->link(
	'--',
	array('controller' => 'editus', 'action' => 'edit_param', 20),
	array('class'=>'btn btn-primary') 
);?>
<hr>
<?php debug(AuthComponent::user('id_interf'));?>
<h2>salut index editu</h2>