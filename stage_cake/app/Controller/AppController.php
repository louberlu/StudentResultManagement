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
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @author     Karen NKILI OBELE
 * @package		app.Controller
 * @link		   http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 * @version    1.0.0
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
         'loginRedirect' => array('controller' => 'pages', 'action' => 'home'),
         'logoutRedirect' => array('controller' => 'users', 'action' => 'login'),
         'authenticate' => array(
            'Form' => array(
               'passwordHasher' => array(
                  'className' => 'Simple',
                  'hashType' => 'sha256'
               )
            )
         ),
      ),
      'Session'
   );
   
   public function beforeFilter()
   {
      $this->Auth->allow('login');
   }
   
   public function beforeRender()
   {
      $this->set('auth', $this->Auth->loggedIn()); //Pour la barre de menu
      $user = $this->Auth->user(); //L'id de l'utilisateur actuellement connecté
      $this->set('user', $user);
   }
}
