<h3>menu edit univers</h3>
<?php echo $this->Html->link(
	'parametre de l\'univers',
	array('controller' => 'univers', 'action' => 'edit', AuthComponent::user('id')),
	array('class'=>'btn btn-primary') 
);?>
|

<?php if ($d=AuthComponent::user('interf_id')) :
	echo $this->Html->link(
		'interface principale',
		array('controller' => 'interves', 'action' => 'view', $d),
		array('class'=>'btn btn-primary')
	); endif;
	echo $this->Html->link(
		'interface normale',
		array('controller' => 'interves', 'action' => 'index'),
		array('class'=>'btn btn-primary')
	);
	
?>
<hr>