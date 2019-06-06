<?php

class PostsController extends AppController
{
    public $helpers = array('Html', 'Form', 'Flash', 'Paginator');
    public $components = array('Flash');
    var $paginate = array();

//    public function beforeFilter()
//    {
//        $this->set('loggedIn', $this->Auth->loggedIn());
//    }

    public function post_list()
    {
        $this->paginate = array(
            'limit' => 10,// mỗi page có 4 record
            'order' => array('id' => 'desc'),//giảm dần theo id
        );
        $data = $this->paginate("Post");
        $this->set("posts", $data);
    }
    public function view($id = null) {
    if (!$id) {
        throw new NotFoundException(__('Invalid post'));
    }

    $post = $this->Post->findById($id);
    if (!$post) {
        throw new NotFoundException(__('Invalid post'));
    }
    $this->set('post', $post);
    }
    public function edit($id = null) {
        if (!$id) {
            throw new NotFoundException(__('Invalid post'));
        }

        $post = $this->Post->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Invalid post'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Post->id = $id;
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been updated.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Unable to update your post.'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }
    public function add() {
        if ($this->request->is('post')) {
            //Added this line
            $this->request->data['Post']['user_id'] = $this->Auth->user('id');
            if ($this->Post->save($this->request->data)) {
                $this->Flash->success(__('Your post has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
    }
}