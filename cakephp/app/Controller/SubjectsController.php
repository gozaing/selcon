<?php
class SubjectsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    public function index () {
        $this->set('Subjects', $this->Subject->find('all'));
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
    }

    public function add() {
        if ($this->request->is('post')) {

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
        if ($this->request->is('get')){
            throw new notFoundException();
        }
        $this->Subject->delete($id);
        $this->Session->setFlash(__('the postAA with id:%s has been deleted',h($id)));
        return $this->redirect(array('action' => 'index'));

    }

}