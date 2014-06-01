<?php

class Subject extends AppModel {

    Public $name = "Subject";

    public $hasMany = "Comment";

    public $validate = array(
        'title' => array('rule' => 'notEmpty'),
        'body' => array('rule' => 'notEmpty')
    );


}