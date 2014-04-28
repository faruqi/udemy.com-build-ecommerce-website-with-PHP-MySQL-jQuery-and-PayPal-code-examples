<?php 
$id = Url::getParam('id');

if (!empty($id)) {

	$objUser = new User();
	$user = $objUser->getUser($id);
	
	if (!empty($user)) {
		
		$objOrder = new Order();
		$orders = $objOrder->getClientOrders($id);
		
		if (empty($orders)) {
		
			$yes = '/admin'.Url::getCurrentUrl().'&amp;remove=1';
			$no = 'javascript:history.go(-1)';
			
			$remove = Url::getParam('remove');
			
			if (!empty($remove)) {
				
				$objUser->removeUser($id);
				
				Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id', 'remove', 'srch', Paging::$_key)));
				
			}
			
			require_once('template/_header.php'); 
?>
<h1>Clients :: Remove</h1>
<p>Are you sure you want to remove this client (<?php echo $user['first_name']." ".$user['last_name']; ?>)?<br />
There is no undo!<br />
<a href="<?php echo $yes; ?>">Yes</a> | <a href="<?php echo $no; ?>">No</a></p>
<?php 
			require_once('template/_footer.php'); 
		}
	}	
}
?>