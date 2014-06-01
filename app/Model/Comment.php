<?php

class Comment extends AppModel {

    Public $name = "Comment";
    
    public $validate = array(
    'body' => array(
          array(
            'rule' => 'notEmpty', //重複禁止
            'message' => 'Commentを入力して下さい'
          )
    ),
    'commenter' => array(
          array(
            'rule' => 'notEmpty'
          )
    )
    );

}