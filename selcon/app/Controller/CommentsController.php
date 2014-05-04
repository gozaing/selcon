<?php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    // public function index () {
    //     $this->set('Subjects', $this->Subject->find('all'));
    // }

    public function add() {
        if ($this->request->is('post')) {

            //$this->Comment->create();
            if($this->Comment->save($this->request->data)) {
                // success
                $this->Session->setFlash(__('Your Comment has been saveed!'));
                return $this->redirect(array('controller' => 'subjects' ,'action' => 'view' ,$this->data['Comment']['subject_id']));
            }

            $this->Session->setFlash(__('Unable to add your Comment.'));
        }
    }

//delete
    public function delete($subjectid, $id = null){
        if ($this->request->is('get')){
            throw new notFoundException();
        }
        $this->Comment->delete($id);
        $this->Session->setFlash(__('the comment with id:%s has been deleted',h($id)));
        //return $this->redirect(array('controller' => 'subjects','action' => 'index'));
        return $this->redirect(array('controller' => 'subjects' ,'action' => 'view' , $subjectid));
        //return $this->redirect(array('controller' => 'subjects' ,'action' => 'view' ,1));


    }

}