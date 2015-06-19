<?php
/**
 * Vue add de Users
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Jonathan Brachet
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 * @version       1.0.0
 */
 ?>
 
 <div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Ajouter un utilisateur'); ?></legend>
        <?php 
			echo $this->Form->input('lastname', array('label' => 'Nom'));
			echo $this->Form->input('firstname', array('label' => 'Prénom'));
			echo $this->Form->input('username', array('label' => 'Pseudo'));
			echo $this->Form->input('password', array('label' => 'Mot de passe'));
			echo $this->Form->input('role', array(
				'options' => array('administrateur' => 'Administrateur', 'enseignant' => 'Enseignant', 'étudiant' => 'Etudiant', 'responsable' => 'Responsable')
			));
		?>
    </fieldset>
<?php echo $this->Form->end(__('Ajouter'));?>
</div>
