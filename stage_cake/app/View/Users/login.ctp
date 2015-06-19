<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
    <fieldset>
        <?php echo $this->Form->input('username', array('label' => 'Numéro d\'utilisateur : '));
        echo $this->Form->input('password', array('label' => 'Mot de passe : '));
    ?>
    </fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>
