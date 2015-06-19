<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.12/jquery-ui.min.js"></script>

<div id="menu">
  <ul id="onglets">
    <li><a href="Accueil"> Accueil </a></li>
    <li class="active"><a href="liste"> Etudiants </a></li>
  </ul>
</div>

<?php
for ($i = 0; $i < count($liste_user); $i ++)
{
	if ($liste_user[$i]['User']['role'] == $liste_user[0]['User']['role']) //ne fonctionne que si le premier utilisateur de la liste d’utilisateurs est un étudiant
	{
	echo '<div id="accordeon' . $i . '">';
	echo '<h3>' . '<a href="#">' . $liste_user[$i]['User']['lastname'] . ' ' . $liste_user[$i]['User']['firstname'] . '</a>' . '</h3>';
	echo '<div>';
	echo '<table>';
	echo '<tr>';
	echo '<th>pseudo</th>';
	echo '<th>numero</th>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>' .  $this->Html->link($liste_user[$i]['User']['username'], array('controller' => 'etudiants', 'action' => 'liste')) . '</td>';
	echo '<td>' . $liste_user[$i]['Etudiant']['numero'] . '</td>';
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
?>

<?php 
	pr($liste_user);
	
	//echo $this->Js->writeBuffer(); // Écrit les scripts en mémoire cache

?>
