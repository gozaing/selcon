<?php
App::uses('AppModel', 'Model');

class User extends AppModel {
  //入力チェック機能
  public $validate = array(
    'username' => array(
      array(
        'rule' => 'notEmpty', 
        'message' => 'need to input'
      ),
      array(
        'rule' => 'isUnique', //重複禁止
        'message' => '既に使用されている名前です。',
        'on' => 'create', 
      ),
      array(
        'rule' => 'alphaNumeric', //半角英数字のみ
        'message' => '名前は半角英数字にしてください。',
        'on' => 'create',
      ),
      array(
        'rule' => array('between', 2, 32), //2～32文字
        'message' => '名前は2文字以上32文字以内にしてください。',
        'on' => 'create',
      )
    ),
    'password' => array(
      array(
        'rule' => 'notEmpty', 
        'message' => 'need to input'
      ),
      array(
        'rule' => 'alphaNumeric',
        'message' => 'パスワードは半角英数字にしてください。',
        'on' => 'create',
      ),
      array(
        'rule' => array('between', 8, 32),
        'message' => 'パスワードは8文字以上32文字以内にしてください。',
        'on' => 'create', 
      )
    )
  );

  public $validate_login = array(
    'username' => array(
      array(
        'rule' => 'notEmpty', 
        'message' => 'need to input'
      )
    ),
    'password' => array(
      array(
        'rule' => 'notEmpty', 
        'message' => 'need to input'
      )
    )
  );


  public function beforeSave($options = array()) {
    $this->data['User']['password'] = AuthComponent::password($this->data['User']['password']);
    return true;
  }

}
