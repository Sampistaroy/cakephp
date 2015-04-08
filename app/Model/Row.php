<?php

class Row extends AppModel {
    public $hasMany = array(
        'Cellule' => array(
            'className' => 'Cellule',
            'foreignKey' => 'row_id',
            'conditions' => '',
            'order' => 'Cellule.position ASC',
            'limit' => '',
            'dependent' => true
        )
    );

	
}
