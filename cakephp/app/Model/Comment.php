<?php

class Comment extends AppModel {

    Public $name = "Comment";

    public $validate = array(
        'commenter' => array('rule' => 'notEmpty'),
        'body' => array('rule' => 'notEmpty')
    );


}