<?php
/**
 * Vue liste_ens de Users
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
 
 <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

<?php
for ($i = 0; $i < count($liste_user); $i ++)
{
	if (($liste_user[$i]['User']['role'] == 'enseignant') || ($liste_user[$i]['User']['role'] == 'responsable'))
	{
		echo '<div id="accordeon' . $i . '">';
		echo '<h3>' . '<a href="#">' . $liste_user[$i]['User']['username'] . '</a>' . '</h3>';
		echo '<div>';
		echo '<table>';
		echo '<tr>';
		echo '<th>Nom</th>';
		echo '<th>Prenom</th>';
		echo '</tr>';
		echo '<tr>';
		echo '<td>' . $liste_user[$i]['User']['lastname'] . '</td>';
		echo '<td>' . $liste_user[$i]['User']['firstname'] . '</td>';
		echo '</tr>';
		echo '</table>';
		echo '</div>';
		echo '</div>';
	
		echo '<script>';
		echo	'$(function(){';
		echo		'$(\'#accordeon' . $i . '\').accordion();';
		echo	'});';

		echo	'$( "#accordeon' . $i . '" ).accordion({';
		echo		'collapsible: true';
		echo	'});';

		echo	'$( "#accordeon' . $i . '" ).accordion({';
		echo		'collapsible: true';
		echo	'});';

		echo	'$( "#accordeon' . $i . '" ).accordion({';
		echo		'active: false';
		echo	'});';
		echo '</script>';
	}
}
?><?php 
	//pr($liste_user);
	
	//echo $this->Js->writeBuffer(); // Écrit les scripts en mémoire cache

?>
