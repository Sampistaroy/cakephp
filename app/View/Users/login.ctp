<h2> Se connecter</h2>
<?php 
	echo $this->Form->create('User');
	echo $this->Form->input('username', array('label'=>"Login :"));
	echo $this->Form->input('password', array('label'=>"Mot de pass :"));
	echo $this->Form->end("Se connecter"); ?>