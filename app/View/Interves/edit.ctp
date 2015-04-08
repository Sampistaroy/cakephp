<?php echo $this->element('menu_interf'); ?>
<div class="col-xs-12 col-sm-9">
	<p class="pull-right visible-xs">
		<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
	</p>
	<div class="jumbotron">
		<h1>edition d'une interface<br>- WyGSyG</h1>
		<hr>
	</div>
	<div id="row_editable">


		<h1>Modifier une interface</h1>
		<?php 
		echo $this->Form->create('Interf');
		echo $this->Form->input('interf_name');
		echo $this->Form->end('Sauvegarder l\'interface');
		?>
<hr>
<?php

	foreach ($resultat_row as $key => $value) { ?>
				<div class="row text-center" id_row="1">
					<div class="<?php echo isset($value['Cellule']['1']['position'])?'col-xs-6 col-lg-6':'col-xs-12 col-lg-12'; ?>" cellule_id="<?php echo $value['Cellule']['0']['id']; ?>">
						<div data-toggle="collapse" href="#collapse<?php echo $value['Cellule']['0']['id']; ?>">
							<?php if(isset($value['Cellule']['0']['Contenu']['contenu'])):
								echo $value['Cellule']['0']['Contenu']['contenu'];
							else:
								echo "vide";
							endif; ?>
							<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</div>
						<div id="collapse<?php echo $value['Cellule']['0']['id']; ?>" class="collapse">
							Zone permettant de mettre en page la "cell 1"
						</div>
					</div><!-- cell id=1 -->
					<?php if(isset($value['Cellule']['1']['position'])):
						echo 
							'<div class="col-xs-6 col-lg-6" id_cell="'. $value['Cellule']['1']['id'].'">
								<div data-toggle="collapse" href="#collapse'.$value['Cellule']['1']['id'].'">';
									if(isset($value['Cellule']['1']['Contenu']['contenu'])):
										echo $value['Cellule']['1']['Contenu']['contenu'];
									else:
										echo "vide";
									endif;
									echo '<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</div>
						<div id="collapse'.$value['Cellule']['1']['id'].'" class="collapse">
							Zone permettant de mettre en page la "cell 1"
						</div>';
		            					echo '</div><!-- cell id=2 --></div><!-- row id=2 -->';

            		else: 
            			echo '</div><!-- row id=2 -->';
					endif; 
				} 
			?>
		</div><!-- row_editable gauche -->
		<hr>
		<div class="row">
			<div class="col-xs-12 col-lg-12">
				<button class="btn btn-primary add_ligne" data-toggle="tooltip" data-placement="left" title="ajouter une Row/ligne a la fin de votre page">Add ligne</button>
				<?php debug($resultat_row);
				 debug($resultat); debug($resultat_cell); ?>
			</div><!--/.col-xs-6.col-lg-6-->
		</div><!--/row-->
	</div><!--/row editable-->
	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
				<button class="btn btn-default rem_ligne">Deck</button>

				<?php
				$i=0;
				 foreach ($resultat_cell as $key => $value) {
				 	?>
					<div class="col-xs-12 col-lg-12" cellule_id="<?php echo $value['Cellule']['id']; ?>">
						<div data-toggle="collapse" href="#collapse<?php echo $value['Cellule']['id']; ?>">
							<?php if(isset($value['Contenu']['contenu'])):
								echo $value['Contenu']['contenu'];
							else:
								echo "vide";
							endif; ?>
							<span class="glyphicon glyphicon-chevron-down" aria-hidden="true"></span>
						</div>
						<div id="collapse<?php echo $value['Cellule']['id']; ?>" class="collapse">
							Zone permettant de mettre en page la "cell 1"
		<?php 
		echo $this->Form->create('Cellule');
		echo $this->Form->input('Cellule.row_id',array('value'=>$value['Cellule']['row_id'],'type' => 'text'));
		echo $value['Cellule']['row_id'];
		echo $this->Form->input('Cellule.positon',array('value'=>$value['Cellule']['position'],'type' => 'text'));
		echo $value['Cellule']['position'];
		echo $this->Form->end('Sauvegarder l\'interface');
		?>
						</div>
					</div><!-- cell id=1 -->
			<?php	$i++; } ?>
		
	</div><!--/.sidebar-offcanvas-->
</div><!--/class="col-xs-12 col-sm-9"-->