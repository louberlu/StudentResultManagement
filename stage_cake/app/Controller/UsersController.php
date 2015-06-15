<?php
/**
 * Controller du model User
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Karen Fifi NKILI OBELE
 * @author        Jonathan Brachet
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
 
 /**
 * Classe du Controller UsersController
 *
 *
 * @author        Karen Fifi NKILI OBELE
 * @author        Jonathan Brachet
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
 
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
            return $this->redirect($this->Auth->redirectUrl());
         }
         else
         {
            $this->Session->setFlash(__('Nom d\'utilisateur ou mot de passe incorrect'));
         }
      }
   }
   
   public function logout()
   {
      $this->redirect($this->Auth->logout());
   }
}
?>
