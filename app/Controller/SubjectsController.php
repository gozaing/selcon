<?php
class SubjectsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
     public $components = array(
         'Session',
         'Auth');


    public $name = 'Subjects';

    public function beforeFilter(){
         parent::beforeFilter();
        if($this->Session->read('errors')){
            foreach($this->Session->read('errors') as $model => $errors){
                $this->loadModel($model);
                $this->$model->validationErrors = $errors;
            }
            $this->Session->delete('errors');  //表示は遷移・リロードまでの1回っきりなので消す
        }
    }


    public function index () {
        $this->log('index-start', 'debug');
        // $this->set('Subjects', $this->Subject->find('all',array(
        //                                             'conditions' => 'user_id ='.$this->Auth->user('id')
        //                                             )));

        $this->paginate = array(
            'order' => array('id' => 'desc'),
            'limit' => 5,
            'conditions' => 'user_id ='.$this->Auth->user('id')
            );

        $this->set('Subjects', $this->paginate());

        $this->set('title_for_layout' , 'ストーリー');

    }

    public function view($id = null) {
        if (!$id) {
            throw new NotFoundException();
        }
        $subject = $this->Subject->findById($id);
        if (!$subject) {
            throw new NotFoundException();
        }
        $this->set('subject',$subject);

        $key_array = array('1', '2');
        $val_array = array(' ( A ) ', ' ( B ) ',);
        $options = array_combine ($key_array, $val_array);
        $this->set('options', $options);


    }

    public function add() {

        if ($this->request->is('post')) {

            $this->request->data['Subject']['user_id'] = $this->Auth->user('id'); //Added this line

            $this->Subject->create();
            if($this->Subject->save($this->request->data)) {
                // success
                $this->Session->setFlash(__('Your post has been saveed!'));
                return $this->redirect(array('action' => 'index'));
            }

            $this->Session->setFlash(__('Unable to add your post.'));
        }
    }

// edit
    public function edit( $id = null){
        if (!$id) {
            throw new notFoundException();
        }

        $subject = $this->Subject->findById($id);
        if (!$subject) {
            throw new notFoundException();
        }

        if ($this->request->is(array('post','put'))){
            $this->Subject->id = $id;
            if($this->Subject->save($this->request->data)){
                $this->Session->setFlash(__('your post has been updated!'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('unable to update to your post'));
        }

        // VIewの初期表示x
        if (!$this->request->data) {
            $this->request->data = $subject;
        }
    }

//delete
    public function delete($id = null){
        
        $this->log('delete-start-id->' .$id ,'debug');

        if ($this->request->is('get')){
            throw new notFoundException();
        }
        if ($this->request->is('ajax')){
            $this->log('ajax-start','debug');

            if ( $this->Subject->delete($id)) {

                $this->log('ajax-delete-success' , 'debug');

                $this->autoRender = false;
                $this->autoLayout = false;
                $response = array('id' => $id);
                $this->header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }            
        }
        $this->redirect(array('action' => 'index'));
    }

}
