<?php

class UsersController extends AppController
{
    var $uses = array('User');
    var $layout = "admin";

    public function beforeFilter()
    {
        parent::beforeFilter();
    }

    public function admin_login()
    {
        if ($this->Auth->user()) {
            return $this->redirect($this->Auth->redirectUrl());
        }
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Session->setFlash('Username hoặc pass sai');
            }
//            if($this->Auth->login()){
//                if($this->Auth->user('role_id')==2){
//                    $this->redirect('/admin/candidates/index');
//                }else{
//                    $this->redirect('/admin/categories/index');
//                }
//            }else{
//                $this->Session->setFlash('Username hoặc pass sai');
//            }
        }
    }

    public function admin_logout()
    {
        $this->redirect($this->Auth->logout());
    }

    public function admin_list()
    {
        $users = $this->User->find('all', array(
            'conditions' => array('id' > 0),
            'recursive' => -1
        ));
        $this->set('users', $users);
    }

    public function admin_delete($id = null)
    {
        if ($this->request->is('get')) {
            $data = $this->User->find('first', array(
                'fields' => array('id', 'name'),
                'conditions' => array('id' => $id),
                'recursive' => -1
            ));
            if (!empty($data)) {
                $this->Session->setFlash('Success');
                $this->User->delete($id);
            } else {
                $this->Session->setFlash('Error');
            }
            $this->redirect(array('action' => 'list'));
        }
    }

    public function admin_edit($id = null)
    {
        if ($this->request->is('post') || $this->request->is('put')) {
            //print_r($this->request->data);exit();
            $this->User->id = $id;
            $this->User->set(array('date_updated' => date('Y:m:d H:i:s')));
//            $this->User->save($this->request->data);
//            $this->Session->setFlash('Success', 'default', array('class' => "alert alert-success"));
            if($this->User->save($this->request->data)){
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
                $this->redirect(array('action'=>'list'));
            }
        } else {
            $this->User->id = $id;
            $this->request->data = $this->User->read();
        }
    }
    public function admin_add(){
        Security::setHash('blowfish');
        $this->set('title_for_layout', 'Add user');
        if($this->request->is('post') || $this->request->is('put')){
//            $now = date('Y:m:d H:i:s');
//            $this->User->set(array('date_created'=>$now));
//            $this->User->set(array('date_updated'=>$now));
            $data = $this->request->data;
            $data['User']['password'] = Security::hash($data['User']['password']);
            $data['User']['confirm_password'] = $data['User']['password'] ;
//            var_dump($data);die();
            if($this->User->save($data)){
                $this->Session->setFlash('Success','default',array('class'=>"alert alert-success"));
                $this->redirect(array('action'=>'list'));
            }
        }
    }
}