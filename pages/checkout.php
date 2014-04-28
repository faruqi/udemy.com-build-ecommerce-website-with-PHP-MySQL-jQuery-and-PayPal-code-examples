<?php 
Login::restrictFront();

$objUser = new User();
$user = $objUser->getUser(Session::getSession(Login::$_login_front));

if (!empty($user)) {

	$objForm = new Form();
	$objValid = new Validation($objForm);
	
	if ($objForm->isPost('first_name')) {
		
		$objValid->_expected = array(
			'first_name',
			'last_name',
			'address_1',
			'address_2',
			'town',
			'county',
			'post_code',
			'country',
			'email'
		);
		
		$objValid->_required = array(
			'first_name',
			'last_name',
			'address_1',
			'town',
			'county',
			'post_code',
			'country',
			'email'
		);
		
		$objValid->_special = array(
			'email' => 'email'
		);
		
		
		if ($objValid->isValid()) {
			
			if ($objUser->updateUser($objValid->_post, $user['id'])) {
				Helper::redirect('/?page=summary');
			} else {
				$mess  = "<p class=\"red\">There was a problem updating your details.<br />";
				$mess .= "Please contact administrator.</p>";
			}
			
		}
		
	}
	
	require_once('_header.php'); 
	?>
	
	<h1>Checkout</h1>
	
	<p>Please check your details and click <strong>Next</strong>.</p>
	
	<?php echo !empty($mess) ? $mess : null; ?>
	
	<form action="" method="post">
		<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
			
			<tr>
				<th><label for="first_name">First name: *</label></th>
				<td>
					<?php echo $objValid->validate('first_name'); ?>
					<input type="text" name="first_name"
						id="first_name" class="fld" 
						value="<?php echo $objForm->stickyText('first_name', $user['first_name']); ?>" />
				</td>
			</tr>
			
			<tr>
				<th><label for="last_name">Last name: *</label></th>
				<td>
					<?php echo $objValid->validate('last_name'); ?>
					<input type="text" name="last_name"
						id="last_name" class="fld" 
						value="<?php echo $objForm->stickyText('last_name', $user['last_name']); ?>" />
				</td>
			</tr>
			
			<tr>
				<th><label for="address_1">Address 1: *</label></th>
				<td>
					<?php echo $objValid->validate('address_1'); ?>
					<input type="text" name="address_1"
						id="address_1" class="fld" 
						value="<?php echo $objForm->stickyText('address_1', $user['address_1']); ?>" />
				</td>
			</tr>
			
			<tr>
				<th><label for="address_2">Address 2:</label></th>
				<td>
					<?php echo $objValid->validate('address_2'); ?>
					<input type="text" name="address_2"
						id="address_2" class="fld" 
						value="<?php echo $objForm->stickyText('address_2', $user['address_2']); ?>" />
				</td>
			</tr>
			
			<tr>
				<th><label for="town">Town: *</label></th>
				<td>
					<?php echo $objValid->validate('town'); ?>
					<input type="text" name="town"
						id="town" class="fld" 
						value="<?php echo $objForm->stickyText('town', $user['town']); ?>" />
				</td>
			</tr>
			
			<tr>
				<th><label for="county">County: *</label></th>
				<td>
					<?php echo $objValid->validate('county'); ?>
					<input type="text" name="county"
						id="county" class="fld" 
						value="<?php echo $objForm->stickyText('county', $user['county']); ?>" />
				</td>
			</tr>
			
			<tr>
				<th><label for="post_code">Post code: *</label></th>
				<td>
					<?php echo $objValid->validate('post_code'); ?>
					<input type="text" name="post_code"
						id="post_code" class="fld" 
						value="<?php echo $objForm->stickyText('post_code', $user['post_code']); ?>" />
				</td>
			</tr>
			
			<tr>
				<th><label for="country">Country: *</label></th>
				<td>
					<?php echo $objValid->validate('country'); ?>
					<?php echo $objForm->getCountriesSelect($user['country']); ?>
				</td>
			</tr>
			
			<tr>
				<th><label for="email">Email address: *</label></th>
				<td>
					<?php echo $objValid->validate('email'); ?>
					<input type="text" name="email"
						id="email" class="fld" 
						value="<?php echo $objForm->stickyText('email', $user['email']); ?>" />
				</td>
			</tr>
			
			<tr>
				<th>&nbsp;</th>
				<td>
					<label for="btn" class="sbm sbm_blue fl_l">
					<input type="submit"
						id="btn" class="btn" value="Next" />
					</label>
				</td>
			</tr>
			
		</table>
	</form>

<?php 
	require_once('_footer.php'); 
} else {

	Helper::redirect('/?page=error');

}
	
?>