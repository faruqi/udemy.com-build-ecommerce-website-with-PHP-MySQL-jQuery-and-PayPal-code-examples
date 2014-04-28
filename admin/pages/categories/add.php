<?php 
$objForm = new Form();
$objValid = new Validation($objForm);

if ($objForm->isPost('name')) {
	
	$objValid->_expected = array('name');	
	$objValid->_required = array('name');
	
	$objCatalogue = new Catalogue();
	
	$name = $objForm->getPost('name');
	
	if ($objCatalogue->duplicateCategory($name)) {
		$objValid->add2Errors('name_duplicate');
	}
	
	if ($objValid->isValid()) {
		
		if ($objCatalogue->addCategory($name)) {
		
			Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=added');
			
		} else {
			Helper::redirect('/admin'.Url::getCurrentUrl(array('action', 'id')).'&action=added-failed');
		}
		
	}
	
}

require_once('template/_header.php'); 
?>

<h1>Categories :: Add</h1>

<form action="" method="post">
	
	<table cellpadding="0" cellspacing="0" border="0" class="tbl_insert">
		
		<tr>
			<th><label for="name">Name: *</label></th>
			<td>
				<?php 
					echo $objValid->validate('name'); 
					echo $objValid->validate('name_duplicate'); 
				?>
				<input type="text" name="name" id="name" 
					value="<?php echo $objForm->stickyText('name'); ?>" 
					class="fld" />
			</td>
		</tr>
				
		<tr>
			<th>&nbsp;</th>
			<td>
				<label for="btn" class="sbm sbm_blue fl_l">
					<input type="submit" id="btn" class="btn" value="Add" />
				</label>
			</td>
		</tr>
		
		
	</table>
	
</form>

<?php require_once('template/_footer.php'); ?>



