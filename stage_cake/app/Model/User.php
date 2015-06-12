<?php
/**
 * Modèle de la table users 
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Karen Fifi NKILI OBELE
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
 
 /**
 * Classe du Model User
 *
 *
 * @author        Karen Fifi NKILI OBELE
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
   class User extends AppModel
   {
      public $hasOne = array(
         'Enseignant' => array(
            'dependent' => true
         ),
         'Etudiant' => array(
            'dependent' => true
         )
      );
      
      public $validate = array(
         'firstname' => array(
            'rule' => array('lengthBetween',1,50),
            'message' => 'Entre 1 et 50 caractères'
         ),
         'lastname' => array(
            'rule' => array('lengthBetween',1,50),
            'message' => 'Entre 1 et 50 caractères'
         ),
         'username' => array(
            'alphaNumeric' => array(
               'rule' => 'alphaNumeric',
               'required' > true,
               'message' => 'Lettre et nombre seulement'
            ),
            'between' => array(
               'rule' => array('lengthBetween',5,32),
               'message' => 'Entre 5 et 32 caractères'
            ),
         ),
         'password' => array(
            'rule' => array('minLength', '8'),
            'message' => 'Au moins une longueur de 8 caractères'
         )
      );
   }
?>
