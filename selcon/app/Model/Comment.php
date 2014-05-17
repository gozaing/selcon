<?php

class Comment extends AppModel {

    Public $name = "Comment";
    
    public $validate = array(
    'body' => array(
          array(
            'rule' => 'notEmpty', //重複禁止
            'message' => 'empty!-!'
          )
    ),
    'commenter' => array(
          array(
            'rule' => 'notEmpty',
            'message' => 'empty!!!'
          )
    )
    );

}