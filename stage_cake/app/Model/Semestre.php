<?php
/**
 * Modèles de la table semestres
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
 * Classe du Model Semestre
 *
 *
 * @author        Karen Fifi NKILI OBELE
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
   class Semestre extends AppModel
   {
      public $belongsTo = 'Diplome';
      public $hasMany = array(
         'Annee',
         'EtudiantsSemestre',
         'Ue'
      );
      
      public $validate = array(
         'numSem' => array(
            'rule' => 'numeric',
            'required' => true,
            'message' => 'Valeur incorrecte'
         ),
         'compensable' => array(
            'rule' => array('boolean'),
            'required' => true,
            'message' => 'Valeur incorrecte'
         )
      );
   }
?>
