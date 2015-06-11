<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author Karen Fifi NKILI OBELE
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
   
   var $components = array(
      'Auth' => array(
         'authError' => "Etes-vous sûr(e) d'avoir l'autorisation pour y accéder?",
         'loginError' => "Votre pseudo ou votre mot de passe est incorrect",
         'loginAction' => array(
            'controller' => 'users',
            'action' => 'login'
         ),
         'loginRedirect' => array('controller' => 'etudiants', 'action' => 'liste'),
         'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
         'authenticate' => array(
            'Form' => array(
               'passwordHasher' => array(
                  'className' => 'Simple',
                  'hashType' => 'md5'
               )
            )
         ),
      ),
      'Cookie',
      'Session'
   );
   
   public function beforeFilter()
   {
      $this->Auth->allow('login');
   }
   
   public function beforeRender()
   {
      $this->set('auth', $this->Auth->loggedIn());
   }
}