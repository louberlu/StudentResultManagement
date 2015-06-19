<?php
/**
 * Vue add de Etudiants
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
 
 <div id="menu">
  <ul id="onglets">
    <li><a href="accueil"> Accueil </a></li>
    <li><a href="liste"> Etudiants </a></li>
	<li><a href="liste"> Enseignants </a></li>
	<li><a href="compte"> Compte </a></li>
  </ul>
</div>

<?php echo $this->Form->create('Etudiant');?>
    <fieldset>
        <?php 
			echo $this->Form->input('Etudiant.numero', array('label' => 'Numéro d\'étudiant : '));
			echo $this->Form->input('User.lastname', array('label' => 'Nom : '));
			echo $this->Form->input('User.firstname', array('label' => 'Prénom : '));
			echo $this->Form->input('User.username', array('label' => 'Nom d\'utilisateur : '));
			echo $this->Form->input('User.password', array('label' => 'Mot de passe : '));
			echo $this->Form->input('Etudiant.dateNaissance', array('label' => 'Date de naissance : '));
			echo $this->Form->input('Etudiant.remarque', array('type' => 'textarea', 'label' => 'Remarque(s) : '));
			$ls = array();
			for ($i = 0; $i < count($liste_semestre); $i ++)
			{
				array_push($ls, $liste_semestre[$i]['Semestre']['numSem']);
			}
			echo $this->Form->input('numero du semestre : ', array('options' => $ls));
		?>
    </fieldset>
	
	<p>les champs marqués d'une étoile rouge sont obligatoires</p>
<?php echo $this->Form->reset;?>
<?php echo $this->Form->end(__('Enregistrer'));?>
