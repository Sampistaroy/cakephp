
<?php echo $this->element('menu_interf'); ?>
<h1>Ajouter une interface de control</h1>
<?php
echo $this->Form->create('Interf');
echo $this->Form->input('interf_name');
echo $this->Form->end('Sauvegarder l\'interface');
?>