script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
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
