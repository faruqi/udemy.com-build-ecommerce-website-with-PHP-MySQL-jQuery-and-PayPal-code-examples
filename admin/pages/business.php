<?php
Login::restrictAdmin();

$action = Url::getParam('action');

switch($action) {
	
	case 'edited':
	require_once('business/edited.php');
	break;
	
	case 'edited-failed':
	require_once('business/edited-failed.php');
	break;
	
	default:
	require_once('business/edit.php');

}







