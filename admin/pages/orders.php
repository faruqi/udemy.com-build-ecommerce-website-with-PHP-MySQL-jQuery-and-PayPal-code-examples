<?php
Login::restrictAdmin();

$action = Url::getParam('action');

switch($action) {
	
	case 'edit':
	require_once('orders/edit.php');
	break;
	
	case 'edited':
	require_once('orders/edited.php');
	break;
	
	case 'edited-failed':
	require_once('orders/edited-failed.php');
	break;
	
	case 'remove':
	require_once('orders/remove.php');
	break;
	
	case 'invoice':
	require_once('orders/invoice.php');
	break;
	
	default:
	require_once('orders/list.php');

}







