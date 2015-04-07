<h1>Ajouter un post</h1>
<?php 
echo $this->Form->create('Interf');
echo $this->Form->input('interf_name');
echo $this->Form->end('Sauvegarder l\'interface');
?>