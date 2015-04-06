Modifier votre mot de pass<br>
<?php $this->set('title_for_layout',"Editer mon profil"); ?>
<?php echo $this->Form->create('User'); ?>
<?php echo $this->Form->input('pass1',array('label'=>'nouveau mot de passe')); ?>
<?php echo $this->Form->input('pass2',array('label' => 'confirmer mot de pass' )); ?>
<?php echo $this->Form->end('Modifier'); ?>