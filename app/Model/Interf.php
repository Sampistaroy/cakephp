<?php

class Interf extends AppModel {

    public $name = 'Interf';
    public $validate = array(
        'interf_name' => array(
            'required' => array(
                'rule' => array('notEmpty'),
                'message' => 'Un nom d\'interface de control est requis'
            )
        )
    );

}
