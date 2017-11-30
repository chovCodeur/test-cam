<?php
function __autoload($classe) {
	$dossier = "classe/";
	require $dossier . $classe . ".class.php";
}
?>
