<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @author        Karen NKILI
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = __d('cake_dev', 'CakePHP: the rapid development php framework');
$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $this->fetch('title'); ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="container">
		<div id="header">
		   <!-- Ici, commence la partie que j'ai ajouté.-->
		   <div id="menu">
		   <?php
		      //pr($user);
		      
		      $listNoAuth = array(
		         $this->Html->link('Se connecter', array('controller' => 'users', 'action' => 'login'))//A supprimer après car la seule action dispo hors connexion sera celle-ci, donc il n'y aura besoin de la mettre dans la barre de menu
		      );
		      
		      $listAdmin = array(
		         $this->Html->link('Se déconnecter', array('controller' => 'users', 'action' => 'logout'))
		      );
		      
		      $listEtu = array(
		         $this->Html->link('Se déconnecter', array('controller' => 'users', 'action' => 'logout'))
		      );
		      
		      $listResp = array(
		         $this->Html->link('Se déconnecter', array('controller' => 'users', 'action' => 'logout'))
		      );
		      
		      $listEns = array(
		         $this->Html->link('Se déconnecter', array('controller' => 'users', 'action' => 'logout'))
		      );
		      
		      if($auth)
		      {
		         if($user['role'] == 'étudiant')
		         {
		            echo $this->Html->nestedList($listEtu);
		         }
		         elseif ($user['role'] == 'enseignant')
		         {
		            echo $this->Html->nestedList($listEns);
		         }
		         elseif ($user['role'] == 'responsable')
		         {
		            echo $this->Html->nestedList($listResp);
		         }
		         elseif ($user['role'] == 'administrateur')
		         {
		            echo $this->Html->nestedList($listAdmin);
		         }
		      }
		      else
		      {
		         echo $this->Html->nestedList($listNoAuth);
		      }
		   ?>
		   </div>
		   <!-- Ici, termine la partie que j'ai ajouté.-->
		</div>
		<div id="content">

			<?php echo $this->Session->flash(); ?>

			<?php echo $this->fetch('content'); ?>
		</div>
		<div id="footer">
			<?php echo $this->Html->link(
					$this->Html->image('cake.power.gif', array('alt' => $cakeDescription, 'border' => '0')),
					'http://www.cakephp.org/',
					array('target' => '_blank', 'escape' => false, 'id' => 'cake-powered')
				);
			?>
			<p>
				<?php echo $cakeVersion; ?>
			</p>
			<p>
			   <?php echo $this->Html->link($cakeDescription, 'http://cakephp.org'); ?>
			</p>
		</div>
	</div>
	<?php echo $this->element('sql_dump'); ?>
</body>
</html>
