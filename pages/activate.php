<?php
$code = Url::getParam('code');

if (!empty($code)) {
	
	$objUser = new User();
	$user = $objUser->getUserByHash($code);
	
	if (!empty($user)) {
		
		if ($user['active'] == 0) {
			if ($objUser->makeActive($user['id'])) {
				$mess  = "<h1>Thank you</h1>";
				$mess .= "<p>Your account has now been successfully activated.<br />";
				$mess .= "You can now log in and continue with your order.</p>";
			} else {
				$mess  = "<h1>Activation unsuccessful</h1>";
				$mess .= "<p>There has been a problem activating your account.<br />";
				$mess .= "Please contact administrator.</p>";			
			}
		} else {
			$mess  = "<h1>Account already activated</h1>";
			$mess .= "<p>This account has already been activated.</p>";
		}
		
	} else {
		Helper::redirect("/?page=error");
	}
	
	require_once("_header.php");
	echo $mess;
	require_once("_footer.php");
	
} else {
	Helper::redirect("/?page=error");
}






