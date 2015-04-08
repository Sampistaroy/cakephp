<?php

class Cellule extends AppModel {
    public $hasOne = array(
        'Contenu' => array(
            'className' => 'Contenu',
            'foreignKey' => 'Cellule_id',
            'dependent' => true
        )
    );

	
}
