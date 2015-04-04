<div class="notification <?php echo isset($type)?$type:'succes';//test si le type est défnit (dans le controller)sinon affiche succes?>">
	<p>
		Motif :
		<?php echo $message; ?>
	</p>
</div>