<div class="users form">
<?php echo $this->Form->create('User');?>
    <fieldset>
        <legend><?php echo __('Ajouter un utilisateur'); ?></legend>
        <?php 
			echo $this->Form->input('lastname');
			echo $this->Form->input('firstname');
			echo $this->Form->input('username');
			echo $this->Form->input('password');
			echo $this->Form->input('role', array(
				'options' => array('enseignant' => 'Enseignant', 'étudiant' => 'Etudiant')
			));
		?>
    </fieldset>
<?php echo $this->Form->end(__('Ajouter'));?>
</div>