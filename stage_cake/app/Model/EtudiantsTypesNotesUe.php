<?php
/**
 * Modèle de la table etudiants_types_notes_ues
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
 * Classe du Model EtudiantsTypesNotesUe
 *
 *
 * @author        Karen Fifi NKILI OBELE
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Model
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
   class EtudiantsTypesNotesUe extends AppModel
   {
      public $belongsTo = array(
         'Ue',
         'Etudiant',
         'TypesNote'
      );
      
      public $validate = array(
         'absences' => array(
            'rule' => 'boolean',
            'required' => true,
            'message' => 'Valeur incorrecte'
         ),
         'session1' => array(
            'rule' => 'boolean',
            'required' => true,
            'message' => 'Valeur incorrecte'
         ),
         'note' => array(
            'numeric' => array(
               'rule' => 'numeric',
               'message' => 'Valeur incorrecte'
            ),
            'between' => array(
               'rule' => array('lengthBetween', 0, 20),
               'message' => 'Entre 0 et 20 caractères'
            )
         )
      );
   }
?>
