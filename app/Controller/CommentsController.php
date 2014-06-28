<?php
class CommentsController extends AppController {
    public $helpers = array('Html', 'Form', 'Session','Js');
    public $components = array('Session','RequestHandler');

    // public function index () {
    //     $this->set('Subjects', $this->Subject->find('all'));
    // }

    public function add() {

        $this->log('comment-add-start','debug');
        //$this->autoRender = false;
        //$this->uses = null;
        //Configure::write('debug',0);

        if ($this->request->is('ajax')) {
            //$this->log('ajax-add-comment','debug');
        }
        if ($this->request->isAjax()) {
            //$this->log('ajax-check','debug');
        }

        if ($this->request->is('post')) {

            $this->log('add-1', 'debug');
            
            //$this->Comment->create();

            $this->Comment->set( $this->request->data );
            if($this->Comment->validates()){
                $this->log('validate-Sccess','debug');
            } else {
                $this->log('validate-Error','debug');

            }

            if($this->Comment->save($this->request->data)) {

                // insertしたcommentのidを取得する
                $last_id = $this->Comment->getLastInsertID();
                $this->set('last_id',$last_id);


                $this->log('vali-success', 'debug');
                $this->log('lastid->'.$last_id, 'debug');

                //$this->layout = "ajax";
                $this->render('/comments/success','ajax');
                //$this->render('ajax');
                // success
                //$this->Session->setFlash(__('Your Comment has been saveed!'));
                //return $this->redirect(array('controller' => 'subjects' ,'action' => 'view' ,$this->data['Comment']['subject_id']));
            } else{
                
                // // ログに出力
                // $this->log( $this->Comment->validationErrors, LOG_DEBUG);
                // // viewに渡す
                // $this->set( 'valerror', $this->Comment->validationErrors);
                // // セッションに渡す
                // $this->Session->setFlash( $this->Comment->validationErrors);
                //バリデーションやSQLエラーで保存できない場合

                $this->set('valerror', $this->Comment->validationErrors);
                $this->render('/comments/error','ajax');

                //$this->Session->write('errors.Comment',$this->Comment->validationErrors);
                //$this->Session->setFlash(__('Failed to save.'));
                //$this->redirect( $this->referer() );

                

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