
<?php echo $this->element('menu_interf'); ?>
	<div class="col-xs-12 col-sm-9">
		<p class="pull-right visible-xs">
			<button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
		</p>
		<div class="jumbotron">
			<h1>view d'une interface<br>- WyGSyG</h1>
			<hr>
		</div>
		<div id="row_editable">

			<?php	foreach ($resultat_row as $key => $value) { ?>
				<div class="row text-center" id_row="1">
					<div class="<?php echo isset($value['Cellule']['1']['position'])?'col-xs-6 col-lg-6':'col-xs-12 col-lg-12'; ?>" cellule_id="<?php echo $value['Cellule']['0']['id']; ?>">
						<?php if(isset($value['Cellule']['0']['Contenu']['contenu'])):
							echo $value['Cellule']['0']['Contenu']['contenu'];
						else:
							echo "vide";
						endif; ?>
					</div><!-- cell id=1 -->
					<?php if(isset($value['Cellule']['1']['position'])):
						echo 
							'<div class="col-xs-6 col-lg-6" id_cell="'. $value['Cellule']['1']['id'].'">';
							if(isset($value['Cellule']['1']['Contenu']['contenu'])):
								echo $value['Cellule']['1']['Contenu']['contenu'];
            					echo '</div><!-- cell id=2 --></div><!-- row id=2 -->';
							else:
								echo "vide";
            					echo '</div><!-- cell id=2 --></div><!-- row id=2 -->';
							endif;
            		else: 
            			echo '</div><!-- row id=2 -->';
					endif; 
				} 
			?>
		</div><!-- row_editable gauche -->
	</div><!--/col-->
	<div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar">
		<?php echo $this->Html->link(
			'Editer',
			array('controller' => 'interves', 'action' => 'edit', $resultat['Interf']['id']),
			array('class'=>'btn btn-primary',
				'type'=>'button'
				) 
		);?>
	</div><!--/.sidebar-offcanvas-->
</div><!--/row-->