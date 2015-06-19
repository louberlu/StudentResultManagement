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
