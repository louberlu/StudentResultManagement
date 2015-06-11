<?php
class UsersController extends AppController {

	public $helpers = array('Html', 'Form');
      
    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'login');
    }
      
      public function add()
      {
         if($this->request->is('post'))
         {
            if($this->User->save($this->request->data))
            {
               $this->Auth->login();
               $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
               $this->Session->setFlash('Erreur dans l\'ajout de l\'utilisateur.');
            }
         }
      }
      
      public function edit()
      {
         $id = $this->Auth->user('id');
         if(!$this->request->is('put'))
         {
            $this->request->data = $this->User->read(null, $id);
         }
         else
         {
            if($this->User->save($this->request->data))
            {
               $this->Session->setFlash('Modification du profil affectuée.');
               $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
               $this->Session->setFlash('Erreur dans la modification du profil');
            }
         }
      }
      
      public function login()
      {
         if ($this->request->is('post'))
         {
            if ($this->Auth->login())
            {
               $this->Cookie->destroy();
               $this->Cookie->write('User', $this->data['User']['username']);
               return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
               $this->Session->setFlash(__('Username or password is incorrect'));
            }
         }
         $user = $this->Cookie->read('User');
         $this->set('user',$user);
      }
      
      public function logout()
      {
         $this->redirect($this->Auth->logout());
      }
}
?>