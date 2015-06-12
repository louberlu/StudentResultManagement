<?php
/**
 * Modèle de la table etudiants
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
 * Classe du Model Etudiant
 *
 *
 * @author        Karen Fifi NKILI OBELE
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
   class Etudiant extends AppModel
   {
      public $primary_key = 'user_id';
      
      public $hasOne = array(
         'User' => array(
            'dependent' => true
         )
      );
      
      public $hasMany = array(
         'EtudiantsUe',
         'EtudiantsSemestre',
         'EtudiantsTypesNotesUe',
         'AnneesEtudiants'
      );
      
      public $validate = array(
         'numero' => array(
            'rule' => array('lengthBetween',5,50),
            'message' => 'Entre 5 et 50 caractères'
         ),
         'remarque' => array(
            'rule' => array('lengthBetween',0,500),
            'message' => 'Ne pas dépasser 500',
            'allowEmpty' => true
         ),
         'dateNaissance' => array(
            'rule' => 'date',
            'message' => 'Donnez une date valide'
         )
      );
   }
?>
