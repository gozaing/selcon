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

        if ($this->request->is('ajax')) {
            if ($this->Comment->delete($id)) {
                $this->log('comment-delete-ajax-id->' . $id , 'debug');
                $this->autoRender = false;
                $this->autoLayout = false;
                $response = array('id'=>$id);
                $this->header('Content-Type: application/json');
                echo json_encode($response);
                exit();
            }
        }

        $this->redirect(array('controller' => 'subjects' , 'action' => 'view' , $subjectid ));

    }

}