<?php
Login::restrictAdmin();

$action = Url::getParam('action');

switch($action) {
	
	case 'add':
	require_once('products/add.php');
	break;
	
	case 'added':
	require_once('products/added.php');
	break;
	
	case 'added-failed':
	require_once('products/added-failed.php');
	break;
	
	case 'added-no-upload':
	require_once('products/added-no-upload.php');
	break;
	
	case 'edit':
	require_once('products/edit.php');
	break;
	
	case 'edited':
	require_once('products/edited.php');
	break;
	
	case 'edited-failed':
	require_once('products/edited-failed.php');
	break;
	
	case 'edited-no-upload':
	require_once('products/edited-no-upload.php');
	break;
	
	case 'remove':
	require_once('products/remove.php');
	break;
	
	default:
	require_once('products/list.php');

}







