<?php
/**
 * Modèle de la table ues
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
 * Classe du Model Ue
 *
 *
 * @author        Karen Fifi NKILI OBELE
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
   class Ue extends AppModel
   {
      public $displayField = 'name';
      
      public $belongsTo = 'Semestre';
      
      public $hasMany = array(
         'Responsable',
         'EnseignantsUe',
         'EtudiantsUe'
      );
      
      public $validate = array(
         'name' => array(
            'rule' => array('lengthBetween', 1, 100),
            'required' => true,
            'message' => 'Entre 1 et 100 caractères'
         ),
         'sup1' => array(
            'rule' => array('boolean'),
            'required' => true,
            'message' => 'Valeur incorrecte'
         ),
         'sup2' => array(
            'rule' => array('boolean'),
            'required' => true,
            'message' => 'Valeur incorrecte'
         ),
         'obligatoire' => array(
            'rule' => array('boolean'),
            'required' => true,
            'message' => 'Valeur incorrecte'
         ),
         'coefUE' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => 'Valeur incorrecte'
         )
      );
   }
?>
