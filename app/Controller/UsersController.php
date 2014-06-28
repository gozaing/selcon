<?php
App::uses('AppController', 'Controller');

class UsersController extends AppController {

  //読み込むコンポーネントの指定
  public $components = array('Session');


  //どのアクションが呼ばれてもはじめに実行される関数
  public function beforeFilter()
  {
    parent::beforeFilter();

    //未ログインでアクセスできるアクションを指定
    //これ以外のアクションへのアクセスはloginにリダイレクトされる規約になっている
    $this->Auth->allow('register', 'login');
  }

  //ログイン後にリダイレクトされるアクション
  public function index(){
    $this->set('user', $this->Auth->user());
    $this->set('title_for_layout' , 'LogIn');
  }
 
  public function register(){
    //$this->requestにPOSTされたデータが入っている
    //POSTメソッドかつユーザ追加が成功したら
    if($this->request->is('post') && $this->User->save($this->request->data)){
      //ログイン
      //$this->request->dataの値を使用してログインする規約になっている
      $this->Auth->login();
      $this->redirect(array('controller' => 'subjects' , 'action' => 'index'));
    }
  }

  public function login(){
    $this->set('title_for_layout' , 'LogIn');

    $this->log('user-validate-start','debug');
    if( $this->request->is('post') ) {

      $this->log($this->request->data , 'debug');

      $this->User->set( $this->request->data );

      // validate choice
      $this->User->validate = $this->User->validate_login;
      if ( $this->User->validates() ) {
        $this->log('user-validate-ok','debug');
        if($this->Auth->login())
          // return $this->redirect('index');
          return $this->redirect(array('controller' => 'subjects' , 'action' => 'index'));
        else
          //$this->autoRender = false; // この行を追加
          $this->log('user-login-fail','debug');
          $this->Session->setFlash('Name or password is incorrect');
        }
      } else {
        $this->log('user-validate-ng','debug');
      } 
  }

  public function logout(){
    $this->set('title_for_layout' , 'LogIn');
    $this->Auth->logout();
    $this->redirect('login');
  }
}
