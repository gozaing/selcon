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
    $this->set('title_for_layout' , 'ログイン');
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
    $this->set('title_for_layout' , 'ログイン');
    if($this->request->is('post')) {
      if($this->Auth->login())
        // return $this->redirect('index');
        return $this->redirect(array('controller' => 'subjects' , 'action' => 'index'));
      else
        $this->Session->setFlash('ログイン失敗');
    }
  }

  public function logout(){
    $this->set('title_for_layout' , 'ログイン');
    $this->Auth->logout();
    $this->redirect('login');
  }
}