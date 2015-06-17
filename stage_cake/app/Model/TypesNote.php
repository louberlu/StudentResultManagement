<?php
/**
 * Modèle de la table types_notes
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
 * Classe du Model TypesNote
 *
 *
 * @author        Karen Fifi NKILI OBELE
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
   class TypesNote extends AppModel
   {
      public $displayField = 'name';
      
      public $hasMany = array(
         'TypesNotesUes',
         'EtudiantsTypesNotesUe'
      );
      
      public $validate = array(
         'name' => array(
            'rule' => array('lengthBetween', 1, 30),
            'required' => true,
            'message' => 'Entre 1 et 30 caractères'
         ),
         'sigle' => array(
            'rule' => array('lengthBetween', 2, 5),
            'required' => true,
            'message' => 'Entre 2 et 5 caractères'
         )
      );
   }
?>
