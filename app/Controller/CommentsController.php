<?php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session');
    public $components = array('Session');

    // public function index () {
    //     $this->set('Subjects', $this->Subject->find('all'));
    // }

    public function add() {
        if ($this->request->is('post')) {

            $this->log('add-1', 'debug');
            
            //$this->Comment->create();
            if($this->Comment->save($this->request->data)) {

                $this->log('vali-success', 'debug');

                // success
                $this->Session->setFlash(__('Your Comment has been saveed!'));
                return $this->redirect(array('controller' => 'subjects' ,'action' => 'view' ,$this->data['Comment']['subject_id']));
            } else{
                
                // // ログに出力
                // $this->log( $this->Comment->validationErrors, LOG_DEBUG);
                // // viewに渡す
                // $this->set( 'valerror', $this->Comment->validationErrors);
                // // セッションに渡す
                // $this->Session->setFlash( $this->Comment->validationErrors);
                //バリデーションやSQLエラーで保存できない場合
                
                $this->Session->write('errors.Comment',$this->Comment->validationErrors);
                $this->Session->setFlash(__('Failed to save.'));
                $this->redirect( $this->referer() );

                

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